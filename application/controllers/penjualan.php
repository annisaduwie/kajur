<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class penjualan extends REST_Controller  {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_get()
    {
        $id_penjualan = $this->get('id_penjualan');
        if (empty($id_penjualan)) {          
            $result = $this->db->query("SELECT p.id_penjualan, b.nama_barang, p.jml_pb, b.harga_barang, p.harga_pb FROM barang b, kotak k, penjualan p where b.id_barang=k.id_barang AND k.id_kotak=p.id_kotak AND p.id_transaksi IN(SELECT MAX(t.id_transaksi) FROM transaksi t)");
            $num_row = $result->num_rows();
            $result = $result->result_array();

            for ($i=0; $i < $num_row ; $i++) { 
                $result[$i] += array(
                    "aksi" => '<center><button type="button" onclick="delete_penjualan(\''.$result[$i]['id_penjualan'].'\')" class="btn btn-danger">Hapus</button></center>'
                );                
            }
            
            echo json_encode(array('data' => $result));
        } else {
            $this->db->where('id_penjualan', $id_penjualan);
            $result = $this->db->get('penjualan');
            $namabarang = $this->db->query("SELECT b.nama_barang, p.jml_pb, b.harga_barang, p.harga_pb FROM barang b, kotak k, penjualan p where b.id_barang=k.id_barang AND k.id_kotak=p.id_kotak");

            echo json_encode(array('data' => array($result->result_array())));
        }
        
    }

    function index_post() {
        $id_kotak=$this->post('id_kotak');
        $hargabarang = $this->db->query("SELECT b.harga_barang AS harga_barang from barang b, kotak k, penjualan p where b.id_barang = k.id_barang AND k.id_kotak = '$id_kotak'")->row_array();
        $beli = $this->post('jml_pb');
        $totharga = $hargabarang['harga_barang']*$this->post('jml_pb');

        $dt=$this->db->query("SELECT id_transaksi FROM transaksi ORDER BY id_transaksi DESC LIMIT 1")->row();

        //select jml_brg dari kotak
        $stoksekarang = $this->db->query("SELECT jml_brg FROM kotak WHERE id_kotak = '$id_kotak'")->row_array();

        //cek jumlah barang yang tersedia
        if ($stoksekarang['jml_brg'] < $beli) {
            alert('Saldo tidak mencukupi');
        } else {    
            $data = array(
                'id_kotak'   => $this->post('id_kotak'),
                'jml_pb'   => $this->post('jml_pb'),
                'harga_pb' => $totharga,
                'id_transaksi' => $dt->id_transaksi);
            $insert = $this->db->insert('penjualan', $data);
            if ($insert) {
                echo json_encode(array('status' => True ));
            } 
        }
    }


        function index_delete($id_penjualan){
            $this->db->where('id_penjualan', $id_penjualan);
            $delete = $this->db->delete('penjualan');
            if ($delete) {
                echo json_encode(array('status' => True ));
            }

        }

        function index_put(){
        //Variabel untuk update harga transaksi
            $trans = $this->db->query("SELECT MAX(id_transaksi) AS id FROM transaksi")->row_array();
            $hrgtransaksi = $this->db->query("SELECT SUM(p.harga_pb) AS harga_total FROM penjualan p WHERE p.id_transaksi IN(SELECT MAX(p.id_transaksi) FROM penjualan p)")->row_array();

        //Variabel uutuk update saldo penjual
            $datapenjual = $this->db->query("SELECT DISTINCT pj.username_pj AS id2 FROM kotak k, penjual pj, penjualan p WHERE k.username_pj=pj.username_pj AND p.id_kotak = k.id_kotak");

            foreach ($datapenjual->result() as $dpj) {
            }

            $saldopenjual = $this->db->query("SELECT DISTINCT pj.saldo AS saldopnj FROM penjual pj, kotak k, penjualan p WHERE pj.username_pj = k.username_pj AND p.id_kotak=k.id_kotak");

            foreach ($saldopenjual->result() as $spnj) {
            }     

            $jmlpb=$this->db->query("SELECT pj.username_pj, sum(p.harga_pb) as total, pj.saldo FROM penjualan p, kotak k, penjual pj 
                WHERE k.id_kotak = p.id_kotak AND k.username_pj = pj.username_pj AND p.id_transaksi 
                IN(SELECT MAX(p.id_transaksi) FROM penjualan p) GROUP BY pj.username_pj");

            foreach ($jmlpb->result() as $jpb) {
                $jmlTmp = $jpb->total + $jpb->saldo;
                echo "hasil penjualan : ". $jpb->total . ", total penjumlahan : " . $jmlTmp;
                echo "<br>";
                $this->db->set('saldo', $jmlTmp);
                $this->db->where('username_pj', $jpb->username_pj);
                $this->db->update('penjual');
            }

            $data = array(
                'harga_tr' => $hrgtransaksi['harga_total']);

            $this->db->where('id_transaksi',$trans['id']);
            $update = $this->db->update('transaksi', $data);
            if ($update) {
                echo json_encode(array('status' =>True));
            }
        }
    }