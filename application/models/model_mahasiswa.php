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

			// ketika pengguna menginsert data siswa, maka data nim, kd_kelas dan tahun_akademik_aktif akan otomatis terinsert dengan sendirinya ke tbl_riwayat_kelas
			// $tahun_akademik = $this->db->get_where('tbl_tahun_akademik', array('is_aktif' => 'Y'))->row_array();
			// $riwayat = array(
			// 				'nim' 				=> $this->input->post('nim', TRUE),
			// 				'kd_kelas'			=> $this->input->post('kelas', TRUE),
			// 				'id_tahun_akademik'	=> $tahun_akademik['id_tahun_akademik']
			// 			); 
			// $this->db->insert('tbl_riwayat_kelas', $riwayat);
		}

		function update($foto)
		{
			$dataUser = array(
				//tabel di database => name di form
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

		// Fungsi untuk melakukan proses upload file
	  	public function upload_csv($filename){
		    $this->load->library('upload'); // Load librari upload
		    
		    $config['upload_path'] = './csv/';
		    $config['allowed_types'] = 'csv';
		    $config['max_size']  = '2048';
		    $config['overwrite'] = true;
		    $config['file_name'] = $filename;
		  
		    $this->upload->initialize($config); // Load konfigurasi uploadnya
		    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
		      // Jika berhasil :
		      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
		      return $return;
		    }else{
		      // Jika gagal :
		      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
		      return $return;
		    }
		  }
	  
		// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
		public function insert_multiple($data){
		    $this->db->insert_batch('tbl_mhs', $data);
		}

	}
	
?>
