<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class barang extends REST_Controller  {

	function __construct($config = 'rest') {
        parent::__construct($config);
    }
    //function untuk menampilkan tabel barang
    function index_get(){
    	$id_barang = $this->get('id_barang');
        if (empty($id_barang)) {          
            $result = $this->db->get('barang');
            $num_row = $result->num_rows();
            $result = $result->result_array();
            
            for ($i=0; $i < $num_row ; $i++) { 
                $result[$i] += array(
                    "aksi" => '<center><button type="button"  onclick="edit_barang(\''.$result[$i]['id_barang'].'\')" class="btn btn-info" style="background-color:#00b686; color:#fff;">Ubah</button>' 
                    );                
            }
            echo json_encode(array('data' => $result ));
        } else {
            $this->db->where('id_barang', $id_barang);
            $result = $this->db->get('barang');
            echo json_encode(array('data' => $result->result_array()));
        }
        
    }

    function index_post() {
        $data = array(
            'id_barang'     => $this->post('id_barang'),
            'nama_barang'   => $this->post('nama_barang'),
            'harga_barang'  => $this->post('harga_barang'));
        $insert = $this->db->insert('barang', $data);
        if ($insert) {
            echo json_encode(array('status' => True ));
        } 
    }
    
    function index_put() {
        $id = $this->put('id_barang');
        $data = array(
            'nama_barang'   => $this->put('nama_barang'),
            'harga_barang'  => $this->put('harga_barang'));
        $this->db->where('id_barang', $id);
        $update = $this->db->update('barang', $data);
        if ($update) {
            echo json_encode(array('status' =>True));
        }
    }
}
?>