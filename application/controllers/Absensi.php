<?php

	class Absensi extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('model_absensi');
			$this->load->model('model_jadwal');
			$this->load->model('model_dosen');
			$this->load->model('model_mahasiswa');
		}

        function index()
        {
            $id_jadwal = $this->input->get('jadwal');

            $filter = [
                'id_jadwal' => $id_jadwal
            ];

            $mahasiswa = $this->model_jadwal->getListMahasiswa($filter)->result();
            $allAbsensi = $this->model_absensi->getAllAbsensiGrouped($filter)->result();

            $groupedAbsensi = [];
            foreach ($allAbsensi as $value) {
                $groupedAbsensi[$value->id_mahasiswa][$value->pertemuan] = $value;
            }

            $data['id_jadwal'] = $id_jadwal;
            $data['mahasiswa'] = $mahasiswa;
            $data['absensi'] = $groupedAbsensi;
            $data['id_level_user'] = $this->session->userdata('id_level_user');
            $data['id_mhs'] = $this->session->userdata('id_mhs');
            $this->template->load('template', 'absensi/view', $data);
        }

        function add()
        {
            $id_jadwal = $this->input->get('jadwal');
            $data['jadwal'] = $this->model_jadwal->getDetailJadwal($id_jadwal)->row_array();
            $data['list_mahasiswa'] = $this->model_jadwal->getListMahasiswa([
                'id_jadwal' => $id_jadwal,
            ]);
            $this->template->load('template', 'absensi/add', $data);
        }

        function save()
        {
            try {
				$stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
				$request = json_decode($stream_clean);
				$this->model_absensi->insertBatch($request);
                return $this->output
					->set_content_type('application/json')
                    ->set_header('Accept: application/json')
					->set_status_header(200)
					->set_output(json_encode(array(
							'status' => 'OK',
                            'data' => null,
					)));
			} catch (\Throwable $th) {
				return $this->output
					->set_content_type('application/json')
					->set_status_header(500)
					->set_output(json_encode(array(
							'error' => $th->getMessage(),
					)));
			}
        }
    }
?>
