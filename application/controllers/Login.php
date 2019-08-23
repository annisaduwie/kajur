<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Login extends REST_Controller  {



	    function __construct($config = 'rest') {
        parent::__construct($config);
        //in_access();
    }
    function index_get()
    {
    	
    	$username1 = $this->get('username');
    	$password1 = $this->get('password');
        $this->db->where('username_pj', $username1);
		$this->db->where('password_pj', md5($password1));
		$this->db->where('status_pj', 'Aktif');
		$resultaktif = $this->db->get('penjual')->num_rows();

		$this->db->where('username_pj', $username1);
		$this->db->where('password_pj', md5($password1));
		$this->db->where('status_pj', 'Belum Aktif');
		$resultnonaktif = $this->db->get('penjual')->num_rows();

		// $this->db->where('username_b', $username);
		// $this->db->where('password_b', $password);
		// $resultbendahara= $this->db->get('bendahara')->num_rows();


		// $this->db->where('username', $username);
		// $this->db->where('password', md5($password));
		// $this->db->where('peran', 'admin');
		// $this->db->where('status', 'aktif');
		// $resultadmin = $this->db->get('petugas')->num_rows();
		if($resultaktif > 0 ){
			session_start();
			
			$_SESSION["username"] =  $username1;
			$this->session->set_userdata('penjual', $username1);
			$this->session->set_userdata('status',"loginSuksesPenjual");
			redirect('HomePenjual/jualan');

	}elseif($_SESSION["username"] != $username2){
    	unset($_SESSION['username']);
    	session_destroy();
    	redirect("Awal/loginpenjual");
		
		// }if($resultbendahara > 0 ){
			
		// 	$this->session->set_userdata('bendahara', $username);
		// 	$this->session->set_userdata('status',"loginSuksesPenjual");
		// 	redirect('HomeBendahara');
	
		}
		elseif ($username1 =='' or $password1 == ''){
			$this->session->set_flashdata('error','Username atau password belum diisi');
			redirect('Awal/loginpenjual');
		}elseif($resultnonaktif > 0 ){
			$this->session->set_flashdata('error', 'Anda Belum Bisa Login, Status Anda Masih Belum Dikonfirmasi, Silahkan Hubungi Admin ');
			redirect('Awal/loginpenjual');
		}
		else{
			$this->session->set_flashdata('error','Username atau password salah');
			redirect('Awal/loginpenjual');
		}
        
    }

}

