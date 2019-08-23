<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Awal extends CI_Controller  {

	function __construct() {
        parent::__construct();
        //no_access();
        //in_access_b();
    }

	public function index()
	{
		//$this->load->view('bendahara/view_kotak');
		$this->load->view('view_home');
		
	}

	public function regispenjual(){
		$this->load->view('penjual/view_regispenjual');
	}

	public function penjualan(){
		$this->load->view('pembeli/view_penjualan');
	}

	public function loginpenjual(){
		$this->load->view('penjual/view_login');
	}

	public function loginbendahara(){
		$this->load->view('bendahara/view_login');
	}

}
