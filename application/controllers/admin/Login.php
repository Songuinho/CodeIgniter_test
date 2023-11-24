<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{



	public function index()
	{

		if(isset($_SESSION['user_id'])){

			redirect('admin/dashboard');
		}
		$data = [];
		if(isset($_SESSION['error'])){
			$data['error'] = $_SESSION['error'];
		}else{

			$data['error'] = 'NO ERROR';
		}

		$this->load->view('adminpanel/loginview', $data);
	}

	public function login_post(){
		// print_r($_POST);
		if(isset($_POST)){
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			$query = $this->db->query("SELECT * FROM `backenduser` WHERE username='$username' AND password='$password'");
			
			if($query->num_rows()){
				//Credentials are valid
				$result = $query->result_array();
				// echo '<pre>';
				// print_r($query); die();
				
				$this->session->set_userdata('user_id',$result[0]['user_id']);

				redirect('admin/dashboard');
			}else{
				//Credentials aren't valid
				$this->session->set_flashdata('error','Erreur sur vos informations, nom ou mot de passe incorrrect');
				redirect('admin/login');
			}
		}else{
			die('invalid input');
		}
	}


	public function logout(){
		session_destroy();
	}


}
