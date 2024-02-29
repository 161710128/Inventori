<?php

use Dompdf\Dompdf;

class Pengguna_S extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'supervisor' && $this->session->login['role'] != 'super') redirect();
		$this->data['aktif'] = 'Pengguna_s';
		$this->load->model('M_supervisor', 'm_supervisor');
	}

	public function index(){
		$this->data['title'] = 'Data Pengguna Supervisor';
		$this->data['all_petugas'] = $this->m_supervisor->lihat();
		$this->data['no'] = 1;

		$this->load->view('pengguna/supervisor/lihat', $this->data);
	}

	public function tambah(){
		// if ($this->session->login['role'] == 'Supervisor'){
		// 	$this->session->set_flashdata('error', 'Tambah data hanya untuk supervisor!');
		// 	redirect('DashboardSupervisor');
		// }

		$this->data['title'] = 'Tambah Pengguna Supervisor';

		$dariDB = $this->m_supervisor->cekkodepengguna(); 
        $nourut = substr($dariDB, 4, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode'] = $kodeBarangSekarang; 

		$this->load->view('pengguna/supervisor/tambah', $this->data);
	}

	public function proses_tambah(){
		// if ($this->session->login['role'] == 'Supervisor'){
		// 	$this->session->set_flashdata('error', 'Tambah data hanya untuk supervisor!');
		// 	redirect('DashboardSupervisor');
		// }

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		];

		if($this->m_supervisor->tambah($data)){
			$this->session->set_flashdata('success', 'Data Pengguna supervisor <strong>Berhasil</strong> Ditambahkan!');
			redirect('Pengguna_S');
		} else {
			$this->session->set_flashdata('error', 'Data Pengguna supervisor <strong>Gagal</strong> Ditambahkan!');
			redirect('Pengguna_S');
		}
	}

	public function ubah($id){
		if ($this->session->login['role'] == 'Supervisor'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk supervisor!');
			redirect('DashboardSupervisor');
		}

		$this->data['title'] = 'Ubah Pengguna Supervisor';
		$this->data['petugas'] = $this->m_supervisor->lihat_id($id);

		$this->load->view('pengguna/supervisor/ubah', $this->data);
	}

	public function proses_ubah($id){
		if ($this->session->login['role'] == 'Supervisor'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk supervisor!');
			redirect('DashboardSupervisor');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		];

		if($this->m_supervisor->ubah($data, $id)){
			$this->session->set_flashdata('success', 'Data Pengguna Supervisor <strong>Berhasil</strong> Diubah!');
			redirect('Pengguna_S');
		} else {
			$this->session->set_flashdata('error', 'Data Pengguna Supervisor <strong>Gagal</strong> Diubah!');
			redirect('Pengguna_S');
		}
	}

	public function hapus($id){
		if ($this->session->login['role'] == 'Supervisor'){
			$this->session->set_flashdata('error', 'Hapus data hanya untuk supervisor!');
			redirect('Pengguna_S');
		}

		if($this->m_supervisor->hapus($id)){
			$this->session->set_flashdata('success', 'Data Pengguna Supervisor <strong>Berhasil</strong> Dihapus!');
			redirect('Pengguna_S');
		} else {
			$this->session->set_flashdata('error', 'Data Pengguna Supervisor <strong>Gagal</strong> Dihapus!');
			redirect('Pengguna_S');
		}
	}

	public function export(){
		$dompdf = new Dompdf(); 
		$this->data['all_petugas'] = $this->m_supervisor->lihat();
		$this->data['title'] = 'Laporan Data Pengguna Supervisor';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('pengguna/supervisor/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Pengguna Supervisor Tanggal ' . date('d F Y'), array("Attachment" => false));
	}

	
}