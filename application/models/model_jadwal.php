<?php
 
	class Model_jadwal extends CI_Model
	{
		
		function getJadwal($filter)
		{
			$sql = "SELECT tj.id, tj.kd_kelas, tju.nama_jurusan, tj.kd_mapel, 
						tm.nama as nama_matkul, tm.sks, tu.nama_lengkap as nama_dosen,
						tj.jam, tr.nama_ruangan, tj.hari, tj.semester 
					FROM tbl_jadwal AS tj
					LEFT JOIN tbl_jurusan AS tju ON tj.kd_jurusan = tju.kd_jurusan
					LEFT JOIN tbl_ruangan AS tr ON tj.kd_ruangan = tr.kd_ruangan
					LEFT JOIN tbl_mapel AS tm ON tj.kd_mapel = tm.kd_mapel
					LEFT JOIN tbl_tingkatan_kelas AS ttk ON tj.kd_tingkatan = ttk.kd_tingkatan
					LEFT JOIN tbl_dosen AS td ON td.id = tj.id_dosen
					LEFT JOIN tbl_user AS tu ON tu.id_user = td.id_user 
					WHERE tj.id_tahun_akademik = " . $filter['id_tahun_akademik'];

			$data = $this->db->query($sql);
			return $data;
		}

		function jamPelajaran() {
	 		 $jam_pelajaran	= array(
            	'07.15 - 08.00' => '07.15 - 08.00',
            	'08.00 - 08.45' => '08.00 - 08.45',
            	'08.45 - 09.30' => '08.45 - 09.30',
            	'09.30 - 10.00' => '09.30 - 10.00',
            	'10.00 - 10.45' => '10.00 - 10.45',
            	'10.45 - 11.30' => '10.45 - 11.30',
            	'11.30 - 12.15' => '11.30 - 12.15',
            	'12.15 - 13.00' => '12.15 - 13.00',
            	'13.00 - 13.30' => '13.00 - 13.30',
            	'13.30 - 14.15' => '13.30 - 14.15',
            	'14.15 - 15.00' => '14.15 - 15.00',
            );
	 		 return $jam_pelajaran;
	 	}

	 	function addJadwal()
	 	{
			$semester		 = $this->input->post('semester');
			// Ambil tahun akademik yang aktif
			$tahunakademik 	 = $this->db->get_where('tbl_tahun_akademik', array('is_aktif' => 'Y'))->row_array();

			// ambil kelas berdasarkan tingkatan dan jurusan
			$kelasnya = $this->db->get_where('tbl_kelas', array('kd_jurusan' => $row->kd_jurusan, 'kd_tingkatan' => $row->kd_tingkatan));

			foreach ($kelasnya->result() as $row_kelas) {
				$data = array(
					'id_tahun_akademik' => $tahunakademik['id_tahun_akademik'], 
					'semester'			=> $semester,
					'kd_jurusan'		=> $row->kd_jurusan, 
					'kd_tingkatan'		=> $row->kd_tingkatan, //sama seperti kelas di akademik
					'kd_kelas'			=> $row_kelas->kd_kelas, //sama seperti rombel di akademik
					'kd_mapel'			=> $row->kd_mapel, 
					'id_guru'			=> 0, 
					'jam'				=> '', 
					'kd_ruangan'		=> '000', 
					'hari'				=> ''
				);
				$this->db->insert('tbl_jadwal', $data);
			}
	 	}

	}

?>