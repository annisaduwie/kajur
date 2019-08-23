<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class HomePenjual extends CI_Controller  {


	function __construct() {
        parent::__construct();
        no_access();
    }

	public function index()
	{		
		//$this->load->view('penjual/view_login');
		$this->load->view('penjual/view_jualan');
	}

	public function regispenjual(){
		$this->load->view('penjual/view_regispenjual');
	}
	
	public function jualan(){
		$this->load->view('penjual/view_jualan');
	}

	public function barangpenjual(){
		$this->load->view('penjual/view_barangpenjual');
	}
	
	public function riwayatsaldotarik(){
		$this->load->view('penjual/view_riwayatsaldo_tarik');
	}

	public function riwayatpenjualan(){
		$this->load->view('penjual/view_riwayatpenjualan');
	}


	function logout(){	
		session_start();
		unset($_SESSION['status']);

	 	$this->session->unset_userdata('penjual');
	 	$this->session->unset_userdata('statusL');	
	 	$this->session->set_flashdata('sukses', 'Terimakasih Telah Menggunakan Aplikasi ini sebagai Penjual');
	 	redirect('Awal');	
	}

}

