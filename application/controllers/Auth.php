<?php

	class Auth extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->model('model_user');
			$this->load->model('model_dosen');
			$this->load->model('model_mahasiswa');
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

				if ($loginUser['id_level_user']==5) {
					$dataMahasiswa = $this->model_mahasiswa->getOneByIdUser($loginUser['id_user'])->row_array();
					$loginUser['id_mhs'] = $dataMahasiswa['id'];
					$loginUser['kd_kelas'] = $dataMahasiswa['kd_kelas'];
				}
				
				if ($loginUser['id_level_user']==6) {
					$dataProdi = $this->model_user->getProdiByIdUser($loginUser['id_user'])->row_array();
					$loginUser['id_prodi'] = $dataProdi['id'];
					$loginUser['kd_jurusan'] = $dataProdi['kd_jurusan'];
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