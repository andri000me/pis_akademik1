<?php

	class Jadwal extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('model_jadwal');
			$this->load->model('model_dosen');
			$this->load->model('model_mahasiswa');
		}

		function index()
		{
			$filter = [
				'id_tahun_akademik' => get_tahun_akademik('id_tahun_akademik')
			];
			
			if ($this->session->userdata('id_level_user') == 5) {
				$filter['id_mahasiswa'] = $this->session->userdata('id_mhs');
				$data['jadwal'] = $this->model_jadwal->getJadwalMahasiswa($filter);
			} else {
				if ($this->session->userdata('id_level_user') == 3) {
					$filter['id_dosen'] = $this->session->userdata('id_dosen');
				}

				$data['jadwal'] = $this->model_jadwal->getJadwal($filter);
			}
			
			$data['id_level_user'] = $this->session->userdata('id_level_user');
			$this->template->load('template', 'jadwal/view', $data);
		}

		function add()
		{
			if (isset($_POST['submit'])) {
				$this->model_jadwal->addJadwal();
				redirect('jadwal');
			  } else {
				$data['list_dosen'] = $this->model_dosen->getAll([]);
				$this->template->load('template', 'jadwal/add', $data);
			  }
		}

		function detail()
		{
			$filter = [
				'id_jadwal' => $this->uri->segment(3),
			];
			
			$data['id_level_user'] = $this->session->userdata('id_level_user');
			$data['jadwal'] = $this->model_jadwal->getDetailJadwal($filter['id_jadwal'])->row_array();
			$data['mahasiswa'] = $this->model_jadwal->getListMahasiswa($filter);
			$this->template->load('template', 'jadwal/detail', $data);
		}

		function list_mahasiswa()
		{	
			$data['id_jadwal'] = $this->uri->segment(3);
			$data['list_mahasiswa'] = $this->model_mahasiswa->getAll([]);
			$this->template->load('template', 'jadwal/add-mahasiswa', $data);
		}

		function add_mahasiswa()
		{
			try {
				$stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
				$request = json_decode($stream_clean);
				$idJadwal = $request->id_jadwal;
				$this->model_jadwal->insertBatchJadwalMahasiswa($idJadwal, $request->list_mahasiswa);
				echo "OK";
			} catch (\Throwable $th) {
				return $this->output
					->set_content_type('application/json')
					->set_status_header(500)
					->set_output(json_encode(array(
							'error' => $th,
					)));
			}
		}

		function delete_mahasiswa() {
			$id = $this->uri->segment(3);
			$id_jadwal = $this->input->get('id_jadwal', TRUE);
			$this->model_jadwal->deleteJadwalMahasiswa($id);
			redirect('jadwal/detail/'.$id_jadwal);
		}

		function cetak_jadwal() {
	 		$kelas = $_POST['kelas'];
	 		$this->load->library('CFPDF');

	 		$days            = array(
								'SENIN'  => 'SENIN',
								'SELASA' => 'SELASA',
								'RABU'   => 'RABU',
								'KAMIS'  => 'KAMIS',
								'JUMAT'  => 'JUMAT',
								'SABTU'  => 'SABTU'
							 );

	 		$pdf = new FPDF('L', 'mm', 'A4');
	 		$pdf->AddPage();
	 		$pdf->SetFont('Arial','B',12);
        	$pdf->Cell(10,10,'NO',1,0,'L');
        	$pdf->Cell(30,10,'WAKTU',1,0,'L');

        	foreach ($days as $day) {
        		$pdf->Cell(40,10,$day,1,0,'L');
        	}
        	$pdf->Cell(30,10,'',0,1,'L');

        	$jam_ajar = $this->model_jadwal->jamPelajaran();
        	$no=1;

        	foreach ($jam_ajar as $jam) {
        		$pdf->Cell(10,10,$no,1,0,'L');
            	$pdf->Cell(30,10,$jam,1,0,'L');

            	foreach ($days as $day) {
            		$pdf->Cell(40,10,  $this->getPelajaran($jam, $day, $kelas),1,0,'L');
            	}
            	$pdf->Cell(30,10,'',0,1,'L');
            	$no++;
        	}

	 		$pdf->Output();
	 	}

	 	function getPelajaran($jam, $hari, $kelas) {
	 		$sql = "SELECT tj.*,tm.nama_mapel
                   FROM tbl_jadwal as tj, tbl_mapel as tm 
                   WHERE tj.kd_mapel=tm.kd_mapel and tj.kd_kelas='$kelas' and tj.hari='$hari' and tj.jam='$jam'";
	 		$pelajaran = $this->db->query($sql);
	 		if ($pelajaran->num_rows()>0) {
	 			$row = $pelajaran->row_array();
	 			return $row['nama_mapel'];
	 		} else {
	 			return '-';
	 		}
	 	}

	}

?>