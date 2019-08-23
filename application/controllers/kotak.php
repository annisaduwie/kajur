<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class kotak extends REST_Controller  {

	function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_get()
    {
    	$id_kotak = $this->get('id_kotak');
        
        $id_barang = $this->get('id_barang');
        if ($id_barang == '') {
            $kotak['brg'] = $this->db->get('barang')->result();
        } else {
            $this->db->where('id_barang', $id_barang);
            $kotak['brg'] = $this->db->get('barang')->result();
        }

        if (empty($id_kotak)) {          
            $result = $this->db->get('kotak');           
            $num_row = $result->num_rows();
            $result = $result->result_array();
            
            for ($i=0; $i < $num_row ; $i++) { 
                $result[$i] += array(
                    "aksi" => '<center><button type="button"  onclick="edit_kotak(\''.$result[$i]['id_kotak'].'\')" class="btn btn-info" style="background-color:#00b686; color:#fff;">Ubah</button>'
                    );                
            }
            echo json_encode(array('data' => $result, 'brg' => $kotak['brg']));
        } else {
            $this->db->where('id_kotak', $id_kotak);
            $result = $this->db->get('kotak');
            echo json_encode(array('data' => $result->result_array()));
        }
        
    }

    function index_post() {
        $data = array(
            'id_kotak'     => $this->post('id_kotak'),
            'id_barang'   => $this->post('id_barang'),
            'jml_brg'   => $this->post('jml_brg'),
            'terjual'   => $this->post('terjual'),
            'status_kt'   => $this->post('status_kt'),
            'username_pj'  => $this->post('username_pj'));
		$jum = $this->db->get('kotak')->num_rows();
		
		if ($jum > 0 ) {
            echo json_encode(array('status' => false));
        }else{
			$insert = $this->db->insert('kotak', $data);
            if ($insert) {
                echo json_encode(array('status' => true));
            }            
        }
    }
    // function index_delete($id_kotak){
    //     $this->db->where('id_kotak', $id_kotak);
    //     $delete = $this->db->delete('kotak');
    //     if ($delete) {
    //         echo json_encode(array('status' => True ));
    //     }
    
    // }

    function index_put() {
        $id = $this->put('id_kotak');
        $data = array(
            'id_kotak'     =>$this->put('id_kotak'),
            'jml_brg'     =>$this->put('jml_brg'),
            'status_kt'   => $this->put('status_kt'));
        $this->db->where('id_kotak', $id);
        $update = $this->db->update('kotak', $data);
		
		
        if ($update) {
            echo json_encode(array('status' =>True));
        }
    }
}
?>