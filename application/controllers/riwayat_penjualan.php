<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class riwayat_penjualan extends REST_Controller  {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

     function index_get()
    {
        $id_kotak = $this->get('id_kotak');
        //inisialisasi username sesuai dengan username yang sedang aktif
        $username_pj = $_SESSION["username"];

         // Menampilkan agar data yang ditampilkan berdasarkan username 
        $id_barang = $this->get('id_barang');
        if ($id_barang == '') {

            $kotak['brg'] = $this->db->get('barang')->result();
            $this->db->where('username_pj', $username_pj);
        } else {
            $this->db->where('id_barang', $id_barang);
            $this->db->where('username_pj', $username_pj);
            $kotak['brg'] = $this->db->get('barang')->result();
        }

        if (empty($id_kotak)) {          
            $result = $this->db->get('kotak');
            $num_row = $result->num_rows();
            $result = $result->result_array();
            
            for ($i=0; $i < $num_row ; $i++) { 
                $result[$i] += array();                
            }
            echo json_encode(array('data' => $result, 'brg' => $kotak['brg'] ));
        } else {
            $this->db->where('id_kotak', $id_kotak);
            $result = $this->db->get('kotak');
            echo json_encode(array('data' => array($result->result_array())));
        }
        
    }

    function index_post() {

        $data = array(
            'id_kotak'   => $this->input->post('id_barang').'-'.$this->input->post('username_pj'),
            'jml_brg'   => $this->input->post('jumlahstok'),
            'id_barang'       => $this->input->post('id_barang'),
            'username_pj'     => $this->input->post('username_pj'),
            'status_kt'   => 'Keluar'
        );

        $insert = $this->db->insert('kotak', $data);
        if ($insert) {
            echo json_encode(array('status' => True ));
        } 
    }

}

    
