<?php

use Dompdf\Dompdf;

class Pengguna_M extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'super' && $this->session->login['role'] != 'mekanik') redirect();
		$this->data['aktif'] = 'Pengguna_M';
		$this->load->model('M_mekanik', 'm_mekanik');
	}

	public function index(){
		$this->data['title'] = 'Data Pengguna Mekanik';
		$this->data['all_petugas'] = $this->m_mekanik->lihat();
		$this->data['no'] = 1;

		$this->load->view('pengguna/mekanik/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['role'] == 'mekanik'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('DashboardMekanik');
		}

		$this->data['title'] = 'Tambah Pengguna Mekanik';

		$dariDB = $this->m_mekanik->cekkodepetugas(); 
        $nourut = substr($dariDB, 4, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode'] = $kodeBarangSekarang; 

		$this->load->view('pengguna/mekanik/tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['role'] == 'mekanik'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('DashboardMekanik');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		];

		if($this->m_mekanik->tambah($data)){
			$this->session->set_flashdata('success', 'Data Pengguna Mekanik <strong>Berhasil</strong> Ditambahkan!');
			redirect('Pengguna_M');
		} else {
			$this->session->set_flashdata('error', 'Data Pengguna Mekanik <strong>Gagal</strong> Ditambahkan!');
			redirect('Pengguna_M');
		}
	}

	public function ubah($id){
		if ($this->session->login['role'] == 'elektro'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('DashboardMekanik');
		}

		$this->data['title'] = 'Ubah Pengguna Elektro';
		$this->data['petugas'] = $this->m_mekanik->lihat_id($id);

		$this->load->view('pengguna/mekanik/ubah', $this->data);
	}

	public function proses_ubah($id){
		if ($this->session->login['role'] == 'mekanik'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('DashboardMekanik');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		];

		if($this->m_mekanik->ubah($data, $id)){
			$this->session->set_flashdata('success', 'Data Pengguna Mekanik <strong>Berhasil</strong> Diubah!');
			redirect('Pengguna_M');
		} else {
			$this->session->set_flashdata('error', 'Data Pengguna Mekanik <strong>Gagal</strong> Diubah!');
			redirect('Pengguna_M');
		}
	}

	public function hapus($id){
		if ($this->session->login['role'] == 'mekanik'){
			$this->session->set_flashdata('error', 'Hapus data hanya untuk admin!');
			redirect('Pengguna_M');
		}

		if($this->m_mekanik->hapus($id)){
			$this->session->set_flashdata('success', 'Data Pengguna Mekanik <strong>Berhasil</strong> Dihapus!');
			redirect('Pengguna_M');
		} else {
			$this->session->set_flashdata('error', 'Data Pengguna Mekanik <strong>Gagal</strong> Dihapus!');
			redirect('Pengguna_M');
		}
	}

	public function export(){
		$dompdf = new Dompdf(); 
		$this->data['all_petugas'] = $this->m_mekanik->lihat();
		$this->data['title'] = 'Laporan Data Pengguna Elektro';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('pengguna/mekanik/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Pengguna Mekanik Tanggal ' . date('d F Y'), array("Attachment" => false));
	}

	
}