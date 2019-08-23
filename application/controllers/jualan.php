<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class jualan extends REST_Controller  {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    //function untuk menampilkan tabel kotak
    function index_get(){
        $id_kotak = $this->get('id_kotak');
        $username_pj = $_SESSION["username"];
        
        if (empty($id_kotak)) {
            //query untuk select data pada tabel yang akan ditampilkan sesuai username dan statusnya
            $result = $this->db->query("SELECT b.nama_barang, b.harga_barang, k.id_kotak, k.jml_brg, k.terjual, k.waktu_k, k.status_kt FROM barang b, kotak k WHERE b.id_barang = k.id_barang AND k.status_kt='Aktif' AND k.username_pj = '$username_pj'");
            $num_row = $result->num_rows();
            $result = $result->result_array();

            echo json_encode(array('data' => $result));
        } else {
            $this->db->where('id_kotak', $id_kotak);
            $result = $this->db->get('kotak');
            echo json_encode(array('data' => array($result->result_array())));
        }

    }
    //function untuk menambahkan data pada tabel
    function index_post() {
        $data = array(
            'id_kotak'   => $this->input->post('id_barang').'-'.$this->input->post('username_pj').'-'.date("Y-m-d"),
            'jml_brg'   => $this->input->post('jml_brg'),
            'id_barang'       => $this->input->post('id_barang'),
            'username_pj'     => $this->input->post('username_pj'));

        $insert = $this->db->insert('kotak', $data);
        if ($insert) {
            echo json_encode(array('status' => True ));
        } 
    }

}


