<?php
 
	class Model_absensi extends CI_Model
	{

		function getAllAbsensiGrouped($filter)
		{
			$sql = "SELECT tab.id, tab.id_jadwal, tab.id_mahasiswa, tab.pertemuan, tab.keterangan, tab.tanggal
                FROM tbl_absensi AS tab
                WHERE tab.id_jadwal = " . $filter['id_jadwal'] .
                " GROUP BY tab.id_jadwal, tab.id_mahasiswa, tab.pertemuan";

			$data = $this->db->query($sql);
			return $data;
		}

        function insertBatch($list_absensi) {
			for ($i=0; $i < sizeof($list_absensi) ; $i++) { 
                $list_absensi[$i]->tanggal = date("Y-m-d");
            }
			 
			$this->db->insert_batch('tbl_absensi', $list_absensi);

            $new_pertemuan_ke = $list_absensi[0]->pertemuan + 1;
            $id_jadwal = $list_absensi[0]->id_jadwal;

            $this->db->set('pertemuan_ke', $new_pertemuan_ke, TRUE);
            $this->db->where('id', $id_jadwal);
            $this->db->update('tbl_jadwal');
		}
	}

?>