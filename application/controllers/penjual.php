<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

// session_start();
// if($_SESSION["username"] ==  $_SESSION["usernameb"]){
//     unset($_SESSION['username']);
//     session_destroy();
//     redirect("Home");
// }

class Penjual extends REST_Controller  {

	function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_get()
    {
    	$username_pj = $this->get('username_pj');
        if (empty($username_pj)) {          
            $result = $this->db->get('penjual');
            $num_row = $result->num_rows();
            $result = $result->result_array();
            
                for ($i=0; $i < $num_row ; $i++) { 
                $result[$i] += array(
                    
                    "aksi" => '<center><button type="button" onclick="edit_data(\''.$result[$i]['username_pj'].'\')" class="btn btn-info" style="background-color:#00b686; color:#fff;">Ubah</button></center>'
                    );
            }
            echo json_encode(array('data' => $result ));    
  
        } else {
            $this->db->where('username_pj', $username_pj);
            $result = $this->db->get('penjual');
            echo json_encode(array('data' => $result->result_array()));
        }
        
    }
    function index_post() {
        $data = array(
            'username_pj'   => $this->post('username_pj'),
            'password_pj'   => $this->post('password_pj'),
            'nama_pj'       => $this->post('nama_pj'),
            'prodi'         => $this->post('prodi'),
            'saldo'         => $this->post('saldo'),
            'status_pj'     => 'Aktif');
        $insert = $this->db->insert('penjual', $data);
        if ($insert) {
            echo json_encode(array('status' => True ));
        } 
    }

    function index_put() {
        $id = $this->put('username_pj');
        $data = array(
         'status_pj'    => 'Aktif',
         'saldo'        => $this->put('saldo'),
     );

        $this->db->where('username_pj', $id);
        $update = $this->db->update('penjual', $data);
        if ($update) {
            echo json_encode(array('status' =>True));
        }
        
        
    }
}