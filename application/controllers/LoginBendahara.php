<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';


class LoginBendahara extends REST_Controller  {

	    function __construct($config = 'rest') {
        parent::__construct($config);
       // in_access_b();
    }
    function index_get()
    {
    	
    	$username2 = $this->get('usernameb');
    	$password2 = $this->get('passwordb');
        

		$this->db->where('username_b', $username2);
		$this->db->where('password_b', md5($password2));
		$resultbendahara= $this->db->get('bendahara')->num_rows();


		// $this->db->where('username', $username);
		// $this->db->where('password', md5($password));
		// $this->db->where('peran', 'admin');
		// $this->db->where('status', 'aktif');
		// $resultadmin = $this->db->get('petugas')->num_rows();
		if($resultbendahara > 0 ){

			session_start();

			$_SESSION["usernameb"] = $username2;
		
			$this->session->set_userdata('bendahara', $username2);
			$this->session->set_userdata('status',"loginSuksesBendahara");
			redirect('HomeBendahara/kotak');

		}elseif($_SESSION["usernameb"] != $username1){
    	unset($_SESSION['usernameb']);
    	session_destroy();
    	redirect("Awal/loginbendahara");
		}

		
		elseif ($username2 =='' or $password2 == ''){
			$this->session->set_flashdata('error','Username atau password belum diisi');
			redirect('Awal/loginbendahara');
		}
		else{
			$this->session->set_flashdata('error','Username atau password salah');
			redirect('Awal/loginbendahara');
		}
        
    }

}


