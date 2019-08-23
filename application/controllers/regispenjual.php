<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class regispenjual extends REST_Controller  {

	function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_post() {
        $data = array(
            'username_pj'   => $this->post('username_pj'),
            'password_pj'   => md5($this->post('password_pj')),
            'nama_pj'       => $this->post('nama_pj'),
			'prodi'    	=> $this->post('prodi'));
        $insert = $this->db->insert('penjual', $data);
        if ($insert) {
            echo json_encode(array('status' => True ));
        } 
    }
	
}