<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home2 extends CI_Controller  {


	function __construct() {
        parent::__construct();
        //in_access();
    }

	public function index()
	{		
		$this->load->view('bendahara/view_login');
	}


	// public function jualan(){
	// 	$this->load->view('penjual/view_jualan');
	// }

	// public function barangpenjual(){
	// 	$this->load->view('penjual/view_barangpenjual');
	// }

	// public function pembeli()
	// {
	// 	$this->load->view('bendahara/view_pembeli');
	// }

	// public function barangbendahara()
	// {
	// 	$this->load->view('bendahara/view_barangbendahara');
	// }

	// public function penjual()
	// {
	// 	$this->load->view('bendahara/view_penjual');
	// }
	// public function saldo()
	// {
	// 	$this->load->view('bendahara/view_riwayatsaldo_pembeli');
	// }




	// function logout(){	
	//  	$this->session->unset_userdata('penjual');
	//  	$this->session->unset_userdata('statusL');	
	//  	$this->session->set_flashdata('sukses', 'Terimakasih Telah Menggunakan Aplikasi ini sebagai Petugas');
	//  	redirect('Awal');	
	// }

}

