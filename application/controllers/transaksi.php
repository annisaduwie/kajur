<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class transaksi extends REST_Controller  {

	function __construct($config = 'rest') {
        parent::__construct($config);
    }

      function index_post() {
        $data = array();
        $insert = $this->db->insert('transaksi', $data);
        if ($insert) {
            echo json_encode(array('status' => True ));
        } 
    }
	
}