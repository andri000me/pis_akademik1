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

			if (array_key_exists('id_dosen', $filter)) {
				$sql = $sql." AND tj.id_dosen=".$filter['id_dosen'];
			}
			
			if (array_key_exists('kd_kelas', $filter)) {
				$sql = $sql." AND tj.kd_kelas='".$filter['kd_kelas']."'";
			}

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

		function convertHari($hariKe) {
			switch ($hariKe) {
				case '0':
					return 'Senin';
					break;
				case '1':
					return 'Selasa';
					break;
				case '2':
					return 'Rabu';
					break;
				case '3':
					return 'Kamis';
					break;
				case '4':
					return 'Jumat';
					break;
				case '5':
					return 'Sabtu';
					break;
				case '6':
					return 'Minggu';
					break;
			}
		}

	 	function addJadwal()
	 	{
			$semester		 = $this->input->post('semester');
			// Ambil tahun akademik yang aktif
			$tahunakademik 	 = $this->db->get_where('tbl_tahun_akademik', array('is_aktif' => 'Y'))->row_array();

			// ambil kd_jurusan, kd_tingkatan dari tbl_kelas
			$kd_kelas = $this->input->post('kelas', TRUE);
			$kelas = $this->db->get_where('tbl_kelas', array('kd_kelas' => $kd_kelas), 1)->row();

			$data = array(
				'id_tahun_akademik' => $tahunakademik['id_tahun_akademik'], 
				'semester'			=> $semester,
				'kd_jurusan'		=> $kelas->kd_jurusan, 
				'kd_tingkatan'		=> $kelas->kd_tingkatan, 
				'kd_kelas'			=> $kd_kelas,
				'kd_mapel'			=> $this->input->post('mapel', TRUE),
				'id_dosen'			=> intval($this->input->post('dosen', TRUE)), 
				'kd_ruangan'		=> $this->input->post('ruangan', TRUE), 
				'jam'				=> $this->input->post('jam', TRUE), 
				'hari'				=> $this->convertHari($this->input->post('hari', TRUE)),
			);

			$this->db->insert('tbl_jadwal', $data);
	 	}

	}

?>