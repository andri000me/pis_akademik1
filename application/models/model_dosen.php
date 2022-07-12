<?php

  class Model_dosen extends CI_Model
  {

    public $tableUser = "tbl_user";
    public $table = "tbl_dosen";

    function save($input)
    {

      $err = "";
      try {
        $dataUser = array(
          //tabel di database => name di form
          'nama_lengkap'  => $input->post('nama_dosen', TRUE),
          'username'      => $input->post('username', TRUE),
          'password'      => md5($input->post('password', TRUE)),
          'id_level_user' => 3,
          'gender'        => $input->post('gender', TRUE),
        );
  
        $this->db->insert($this->tableUser, $dataUser);
  
        $this->db->where('username', $dataUser['username']);
        $user = $this->db->get($this->tableUser)->row_array();
  
        $dataDosen = array(
          //tabel di database => name di form
          'id_user'     => $user['id_user'],
          'nidn'        => $input->post('nidn', TRUE),
          'kd_jurusan'  => $input->post('jurusan', TRUE),
        );
        $this->db->insert($this->table, $dataDosen);
      } catch (\Throwable $th) {
        $err = $th->getMessage();
      }
      return $err;
    }

    function update($input)
    {
      $dataUser = array(
        //tabel di database => name di form
        'nama_lengkap' => $input->post('nama_dosen', TRUE),
        'username' => $input->post('username', TRUE),
        'gender' => $input->post('gender', TRUE),
      );
      $id_user = $input->post('id_user');
      $this->db->where('id_user', $id_user);
      $this->db->update($this->tableUser, $dataUser);

      $dataDosen = array(
        'nidn' => $input->post('nidn', TRUE),
        'kd_jurusan'  => $input->post('jurusan', TRUE),
      );
      $id_dosen = $input->post('id_dosen');
      $this->db->where('id', $id_dosen);
      $this->db->update($this->table, $dataDosen);
    }

    function getAll($filter)
    {
      $sql = "SELECT td.id, td.nidn, td.kd_jurusan, tj.nama_jurusan as jurusan, tu.nama_lengkap, tu.gender
        FROM tbl_dosen td
        LEFT JOIN tbl_user tu ON tu.id_user = td.id_user
        LEFT JOIN tbl_jurusan tj ON tj.kd_jurusan = td.kd_jurusan
        WHERE 1=1
      ";

      if (array_key_exists('kd_jurusan', $filter)) {
        $sql = $sql." AND td.kd_jurusan='".$filter['kd_jurusan']."'";
      }

      $data = $this->db->query($sql);
			return $data;
    }
    
    function getOne($id_dosen)
    {
      $sql = "SELECT td.id, td.id_user, td.kd_jurusan, tj.nama_jurusan as jurusan, td.nidn, tu.nama_lengkap, tu.gender, tu.username
        FROM tbl_dosen td
        LEFT JOIN tbl_user tu ON tu.id_user = td.id_user
        LEFT JOIN tbl_jurusan tj ON tj.kd_jurusan = td.kd_jurusan
        WHERE td.id=".$id_dosen;
      $data = $this->db->query($sql);
			return $data;
    }
    
    function getOneByIdUser($id_user)
    {
      $sql = "SELECT td.id, td.id_user, td.kd_jurusan, td.nidn, tu.nama_lengkap, tu.gender, tu.username
        FROM tbl_dosen td
        LEFT JOIN tbl_user tu ON tu.id_user = td.id_user
        WHERE td.id_user=".$id_user;
      $data = $this->db->query($sql);
			return $data;
    }

    function delete($id_dosen)
    {
      $dataDosen = $this->getOne($id_dosen)->row_array();
      if (empty($dataDosen)) {
        return;
      }
      
      $this->db->where('id', $id_dosen);
      $this->db->delete($this->table);
      
      $this->db->where('id_user', $dataDosen['id_user']);
      $this->db->delete($this->tableUser);
    }
  }

?>