<?php

	class Auth extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->model('model_user');
			$this->load->model('model_dosen');
		}
		
		function index()
		{
			$this->load->view('auth/login');
		}

		function check_login()
		{
			if (isset($_POST['submit'])) {
				
				$username	= $this->input->post('username');
				$password 	= $this->input->post('password');
				
				$loginUser		= $this->model_user->login($username, $password);
				
				if (empty($loginUser)) {
					redirect('auth');
				}

				if ($loginUser['id_level_user']==3) {
					$dataDosen = $this->model_dosen->getOneByIdUser($loginUser['id_user'])->row_array();
					$loginUser['id_dosen'] = $dataDosen['id'];
					$loginUser['nidn'] = $dataDosen['nidn'];
				}

				$this->session->set_userdata($loginUser);
				redirect('tampilan_utama');
			} else {
				redirect('auth');
			}
		}

		function logout()
		{
			$this->session->sess_destroy();
			redirect('auth');
		}

	}

?>