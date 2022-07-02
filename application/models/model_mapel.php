<?php

	class Model_mapel extends CI_Model
	{

		public $table ="tbl_mapel";

		function save()
		{
			$data = array(
				//tabel di database => name di form
				'kd_mapel'            => $this->input->post('kd_mapel', TRUE),
				'sks'          => $this->input->post('sks', TRUE),
				'nama'          => $this->input->post('nama', TRUE)
			);
			$this->db->insert($this->table, $data);
		}

		function update()
		{
			$data = array(
				'sks'          => $this->input->post('sks', TRUE),
				'nama'          => $this->input->post('nama', TRUE)
			);

			$kode_mapel	= $this->input->post('kd_mapel');
			$this->db->where('kd_mapel', $kode_mapel);
			$this->db->update($this->table, $data);
		}
		
	}

?>
