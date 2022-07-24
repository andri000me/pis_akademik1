<?php

	class Model_mahasiswa extends CI_Model
	{

		public $tableUser = "tbl_user";
		public $table ="tbl_mahasiswa";

		function getAll($filter)
		{
			$sql = "SELECT tm.id, tm.nim, tu.nama_lengkap, tu.gender, tm.kd_kelas, tm.angkatan
			FROM tbl_mahasiswa tm
			LEFT JOIN tbl_user tu ON tu.id_user = tm.id_user
			WHERE 1=1
			";
			
			if (array_key_exists('kd_kelas', $filter)) {
				$sql = $sql." AND tm.kd_kelas='".$filter['kd_kelas']."'";
			}

		  	$data = $this->db->query($sql);
			return $data;
		}

		function getListMahasiswaByIdDosen($id_dosen)
		{
			$sql = "SELECT tjm.id, tjm.id_jadwal, tjm.id_mahasiswa,
				tm.nim, tu.nama_lengkap, tu.gender, tm.kd_kelas, tm.angkatan
				FROM tbl_jadwal_mahasiswa AS tjm
				LEFT JOIN tbl_jadwal AS tj ON tj.id = tjm.id_jadwal
				LEFT JOIN tbl_mahasiswa AS tm ON tm.id = tjm.id_mahasiswa 
				LEFT JOIN tbl_user AS tu ON tu.id_user = tm.id_user 
				WHERE tj.id_dosen = " . $id_dosen;

			$data = $this->db->query($sql);
			return $data;
		}
		
		function getOne($id)
		{
		  	$sql = "SELECT tm.id, tm.id_user, tm.nim, tu.nama_lengkap, tu.gender, tm.tmpt_lahir, 
					tm.tgl_lahir, tm.kd_agama, tm.kd_kelas, tm.angkatan, tu.foto
				FROM tbl_mahasiswa tm
				LEFT JOIN tbl_user tu ON tu.id_user = tm.id_user
				WHERE tm.id=".$id;
		  	$data = $this->db->query($sql);
			return $data;
		}
		
		function getOneByIdUser($id_user)
		{
		  	$sql = "SELECT tm.id, tm.id_user, tm.nim, tu.nama_lengkap, tu.gender, tm.tmpt_lahir, 
					tm.tgl_lahir, tm.kd_agama, tm.kd_kelas, tm.angkatan, tu.foto
				FROM tbl_mahasiswa tm
				LEFT JOIN tbl_user tu ON tu.id_user = tm.id_user
				WHERE tu.id_user=".$id_user;
		  	$data = $this->db->query($sql);
			return $data;
		}

		function save($foto)
		{
			$dataUser = array(
				//tabel di database => name di form
				'nama_lengkap' 	=> $this->input->post('nama', TRUE),
				'username'    	=> $this->input->post('username', TRUE),
				'password'    	=> md5($this->input->post('password', TRUE)),
				'id_level_user' => 5,
				'gender'      	=> $this->input->post('gender', TRUE),
				'foto'			=> $foto,
			);
	
			$this->db->insert($this->tableUser, $dataUser);
	
			$this->db->where('username', $dataUser['username']);
			$user = $this->db->get($this->tableUser)->row_array();

			$data = array(
				'id_user' 		=> $user['id_user'],
				'nim'           => $this->input->post('nim', TRUE),
				'tgl_lahir' 	=> $this->input->post('tanggal_lahir', TRUE),
				'tmpt_lahir' 	=> $this->input->post('tempat_lahir', TRUE),
				'kd_agama'	    => $this->input->post('agama', TRUE),
				'kd_kelas'	    => $this->input->post('kelas', TRUE),
				'angkatan'	    => $this->input->post('angkatan', TRUE),

			);
			$this->db->insert($this->table, $data);
		}

		function update($foto)
		{
			$dataUser = array(
				'nama_lengkap' 	=> $this->input->post('nama', TRUE),
				'gender'      	=> $this->input->post('gender', TRUE),
				'foto'			=> $foto,
			);
	
			$id_user	= $this->input->post('id_user');
			$this->db->where('id_user', $id_user);
			$this->db->update($this->tableUser, $dataUser);

			$data = array(
				'nim'           => $this->input->post('nim', TRUE),
				'tgl_lahir' 	=> $this->input->post('tanggal_lahir', TRUE),
				'tmpt_lahir' 	=> $this->input->post('tempat_lahir', TRUE),
				'kd_agama'	    => $this->input->post('agama', TRUE),
				'kd_kelas'	    => $this->input->post('kelas', TRUE),
				'angkatan'	    => $this->input->post('angkatan', TRUE),

			);

			$id	= $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update($this->table, $data);
		}
	  
		// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
		public function insert_multiple($data){
		    $this->db->insert_batch('tbl_mhs', $data);
		}

	}
	
?>
