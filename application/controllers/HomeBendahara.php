<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class HomeBendahara extends CI_Controller  {


	function __construct() {
        parent::__construct();
        no_access_b();
    }

	public function index()
	{		

		//$this->load->view('bendahara/view_barangbendahara');
	}

	public function dashboardBendahara()
	{
		$this->load->view('bendahara/view_dashboard');
	}
	
	public function kotak()
	{
		$this->load->view('bendahara/view_kotak');
	}

	public function pembeli()
	{
		$this->load->view('bendahara/view_pembeli');
	}

	public function barangbendahara()
	{
		$this->load->view('bendahara/view_barangbendahara');
	}

	public function penjual()
	{
		$this->load->view('bendahara/view_penjual');
	}
	public function saldo()
	{
		$this->load->view('bendahara/view_riwayatsaldo_pembeli');
	}

	public function penarikansaldo()
	{
		$this->load->view('bendahara/view_riwayatpenarikan_penjual');
	}


	function logout(){	
		session_start();
	
		unset($_SESSION['status']);

	 	$this->session->unset_userdata('bendahara');
	 	$this->session->unset_userdata('statusL');	
	 	$this->session->set_flashdata('sukses', 'Terimakasih Telah Menggunakan Aplikasi ini sebagai bendahara');
	 	redirect('Awal');	
	}

}

