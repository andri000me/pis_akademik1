<?php

  class Dosen extends CI_Controller
  {
    
    function __construct()
    {
      parent::__construct();
      $this->load->model('model_dosen');
    }

    function index()
    {
      $filter = [];
			
			if ($this->session->userdata('id_level_user') == 6) {
				$filter['kd_jurusan'] = $this->session->userdata('kd_jurusan');
			}

      $data['err'] = $this->session->flashdata('err');
      $data['id_level_user'] = $this->session->userdata('id_level_user');
      $data['dosen'] = $this->model_dosen->getAll($filter);
      $this->template->load('template', 'dosen/view', $data);
    }

    function add()
    {
      if (isset($_POST['submit'])) {
        $err = $this->model_dosen->save($this->input);
        $this->session->set_flashdata('err', $err);
        redirect('dosen');
      } else {
        $this->template->load('template', 'dosen/add');
      }
    }

    function edit()
    {
      if (isset($_POST['submit'])) {
        $this->model_dosen->update($this->input);
        redirect('dosen');
      } else {
        $id     = $this->uri->segment(3);
        $data['dosen']  = $this->model_dosen->getOne($id)->row_array();
        $this->template->load('template', 'dosen/edit', $data);
      }
    }

    function delete()
    {
      $id = $this->uri->segment(3);
      if (!empty($id)) {
        $this->model_dosen->delete($id);
      }
      redirect('dosen');
    }

  }

?>