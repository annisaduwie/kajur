<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class pembeli extends REST_Controller  {

	function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_get()
    {
    	$username_pb = $this->get('username_pb');
        if (empty($username_pb)) {          
            $result = $this->db->get('pembeli');
            $num_row = $result->num_rows();
            $result = $result->result_array();
            
            for ($i=0; $i < $num_row ; $i++) { 
                $result[$i] += array();                
            }
            echo json_encode(array('data' => $result ));
        } else {
            $this->db->where('username_pb', $username_pb);
            $result = $this->db->get('pembeli');
            echo json_encode(array('data' => $result->result_array()));
        }
        
    }

    function index_post() {
        $data = array(
            'username_pb'   => $this->post('username'),
            'password_pb'   => $this->post('password'),
            'nama_pb'       => $this->post('nama'),
			'status_pb'    	=> $this->post('status_pb'));
        $insert = $this->db->insert('pembeli', $data);
        if ($insert) {
            echo json_encode(array('status' => True ));
        } 
    }
}