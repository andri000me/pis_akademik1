<?php
 
	class Model_user extends CI_Model
	{

		public $tableProdi = "tbl_prodi";
		public $table = "tbl_user";

		function getAll($filter)
		{
			$sql = "SELECT * FROM `tbl_user` u 
				LEFT JOIN tbl_level_user lu ON lu.id_level_user = u.id_level_user
				WHERE 1=1
			";

			if (array_key_exists("id_level_user", $filter)) {
				$sql = $sql." AND lu.id_level_user IN (".implode(',',$filter["id_level_user"]).")";
			}

			$data = $this->db->query($sql);
			return $data;
		}

		function getProdiByIdUser($id_user)
		{
            $sql = "SELECT tp.id, tp.kd_jurusan, tu.nama_lengkap, tu.gender
            FROM tbl_prodi tp
            LEFT JOIN tbl_user tu ON tu.id_user = tp.id_user
            WHERE tp.id_user=".$id_user;
			
          	$data = $this->db->query($sql);
        	return $data;
		}
		
		// mengambil data $username & $password dari hasil parsing controller Auth function check_login() dan mencocokanya dengan data yang ada di database
		function login($username, $password)
		{
			$this->db->where('username', $username);
			$this->db->where('password', md5($password));
			$user = $this->db->get('tbl_user')->row_array();
			return $user;
		}

		function save($foto)
		{
			$level_user = $this->input->post('level_user', TRUE);
			$data = array(
				//tabel di database => name di form
				'nama_lengkap'            => $this->input->post('nama_lengkap', TRUE),
				'username'          	  => $this->input->post('username', TRUE),
				'password'          	  => md5( $this->input->post('password', TRUE) ),
				'id_level_user'           => $level_user,
				'foto'					  => $foto
			);

			$this->db->insert($this->table, $data);

			// Add Prodi
			if ($level_user == 6) {
				$this->db->where('username', $data['username']);
				$user = $this->db->get($this->table)->row_array();

				$dataProdi = array(
					'id_user' 		=> $user['id_user'],
					'kd_jurusan'    => $this->input->post('jurusan', TRUE),
				);
				$this->db->insert($this->tableProdi, $dataProdi);
			}

		}

		function update($foto)
		{
			if (empty($foto)) {
				$data = array(
					//tabel di database => name di form
					'nama_lengkap'            => $this->input->post('nama_lengkap', TRUE),
					'username'          	  => $this->input->post('username', TRUE),
					'password'          	  => md5( $this->input->post('password', TRUE) ),
					'id_level_user'           => $this->input->post('level_user', TRUE),
				);
			} else {
				$data = array(
					//tabel di database => name di form
					'nama_lengkap'            => $this->input->post('nama_lengkap', TRUE),
					'username'          	  => $this->input->post('username', TRUE),
					'password'          	  => md5( $this->input->post('password', TRUE) ),
					'id_level_user'           => $this->input->post('level_user', TRUE),
					'foto'					  => $foto
				);
			}		
			$id_user 	= $this->input->post('id_user', TRUE);
			$this->db->where('id_user', $id_user);
			$this->db->update($this->table, $data);
		}

	}

?>