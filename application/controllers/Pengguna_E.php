<?php

use Dompdf\Dompdf;

class Pengguna_E extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'elektro' && $this->session->login['role'] != 'super') redirect();
		$this->data['aktif'] = 'Pengguna_E';
		$this->load->model('M_elektro', 'm_elektro');
	}

	public function index(){
		$this->data['title'] = 'Data Pengguna Elektro';
		$this->data['all_petugas'] = $this->m_elektro->lihat();
		$this->data['no'] = 1;

		$this->load->view('pengguna/elektro/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['role'] == 'elektro'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('DashboardElektro');
		}

		$this->data['title'] = 'Tambah Pengguna Elektro';

		$dariDB = $this->m_elektro->cekkodepetugas(); 
        $nourut = substr($dariDB, 4, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode'] = $kodeBarangSekarang; 

		$this->load->view('pengguna/elektro/tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['role'] == 'elektro'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('DashboardElektro');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		];

		if($this->m_elektro->tambah($data)){
			$this->session->set_flashdata('success', 'Data Pengguna Elektro <strong>Berhasil</strong> Ditambahkan!');
			redirect('Pengguna_E');
		} else {
			$this->session->set_flashdata('error', 'Data Pengguna Elektro <strong>Gagal</strong> Ditambahkan!');
			redirect('Pengguna_E');
		}
	}

	public function ubah($id){
		if ($this->session->login['role'] == 'elektro'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('DashboardElektro');
		}

		$this->data['title'] = 'Ubah Pengguna Elektro';
		$this->data['petugas'] = $this->m_elektro->lihat_id($id);

		$this->load->view('pengguna/elektro/ubah', $this->data);
	}

	public function proses_ubah($id){
		if ($this->session->login['role'] == 'elektro'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('DashboardElektro');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		];

		if($this->m_elektro->ubah($data, $id)){
			$this->session->set_flashdata('success', 'Data Pengguna Elektro <strong>Berhasil</strong> Diubah!');
			redirect('Pengguna_E');
		} else {
			$this->session->set_flashdata('error', 'Data Pengguna Elektro <strong>Gagal</strong> Diubah!');
			redirect('Pengguna_E');
		}
	}

	public function hapus($id){
		if ($this->session->login['role'] == 'elektro'){
			$this->session->set_flashdata('error', 'Hapus data hanya untuk admin!');
			redirect('Pengguna_E');
		}

		if($this->m_elektro->hapus($id)){
			$this->session->set_flashdata('success', 'Data Pengguna Elektro <strong>Berhasil</strong> Dihapus!');
			redirect('Pengguna_E');
		} else {
			$this->session->set_flashdata('error', 'Data Pengguna Elektro <strong>Gagal</strong> Dihapus!');
			redirect('Pengguna_E');
		}
	}

	public function export(){
		$dompdf = new Dompdf(); 
		$this->data['all_petugas'] = $this->m_elektro->lihat();
		$this->data['title'] = 'Laporan Data Pengguna Elektro';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('pengguna/elektro/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Pengguna Elektro Tanggal ' . date('d F Y'), array("Attachment" => false));
	}

	
}