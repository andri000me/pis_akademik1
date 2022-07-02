<?php
 
	class Model_kelas extends CI_Model
	{
		
		public $table = "tbl_kelas";
		
		function getAll() {
			$sql = "
			SELECT * FROM `tbl_kelas` k LEFT JOIN tbl_tingkatan_kelas tk ON tk.kd_tingkatan = k.kd_tingkatan LEFT JOIN tbl_jurusan j ON j.kd_jurusan = k.kd_jurusan;
			";
			$data = $this->db->query($sql);
			return $data;
		}
		function save()
		{
			$data = array(
				//tabel di database => name di form
				'kd_kelas'            => $this->input->post('kd_kelas', TRUE),
				'nama_kelas'          => $this->input->post('nama_kelas', TRUE),
				'kd_tingkatan'		  => $this->input->post('tingkatan', TRUE),
				'kd_jurusan'		  => $this->input->post('jurusan', TRUE)
			);
			$this->db->insert($this->table, $data);
		}

		function update()
		{
			$data = array(
				//tabel di database => name di form
				'nama_kelas'          => $this->input->post('nama_kelas', TRUE),
				'kd_tingkatan'		  => $this->input->post('tingkatan', TRUE),
				'kd_jurusan'		  => $this->input->post('jurusan', TRUE)
			);
			$kode_kelas	= $this->input->post('kd_kelas');
			$this->db->where('kd_kelas', $kode_kelas);
			$this->db->update($this->table, $data);
		}

	}

?>