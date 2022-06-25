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
      $data['dosen'] = $this->model_dosen->getAll();
      $this->template->load('template', 'dosen/view', $data);
    }

    function add()
    {
      if (isset($_POST['submit'])) {
        $this->model_dosen->save($this->input);
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
        $id_dosen     = $this->uri->segment(3);
        $data['dosen']  = $this->model_dosen->getOne($id_dosen)->row_array();
        $this->template->load('template', 'dosen/edit', $data);
      }
    }

    function delete()
    {
      $id_dosen = $this->uri->segment(3);
      if (!empty($id_dosen)) {
        $this->model_dosen->delete($id_dosen);
      }
      redirect('dosen');
    }

  }

?>