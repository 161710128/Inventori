<?php

use Dompdf\Dompdf;

class PenerimaanAdmin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->data['aktif'] = 'PenerimaanAdmin';
		$this->load->model('M_barang_admin', 'm_barang_admin');
		$this->load->model('M_penerimaan_admin', 'm_penerimaan_admin');
		$this->load->model('M_DetailTerima_Admin', 'm_detail_terima');
	}

	public function index(){
		$this->data['title'] = 'Transaksi Penerimaan Elektro';
		$this->data['all_penerimaan'] = $this->m_penerimaan_admin->lihat();
		$this->data['no'] = 1;

		$this->load->view('Penerimaan/Admin/lihat', $this->data);
	}

	public function tambah(){
		$this->data['title'] = 'Tambah Transaksi';
		$this->data['all_komponen'] = $this->m_barang_admin->lihat_stok_komponen(); 
		$dariDB = $this->m_penerimaan_admin->cekkodetransaksi(); 
        $nourut = substr($dariDB, 3, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->load->view('Penerimaan/Admin/tambah', $this->data);
	}

	public function proses_tambah(){
		$jumlah_barang_diterima = count($this->input->post('nama_barang_hidden'));
		
		$data_terima = [
			'kode_transaksi' => $this->input->post('kode_transaksi'),
			'tanggal_masuk' => $this->input->post('tanggal_masuk'),
			'jam_masuk' => $this->input->post('jam_masuk'), 
			'nama_pengguna' => $this->input->post('nama_pengguna'),
		];

		$data_detail_terima = [];

		for($i = 0; $i < $jumlah_barang_diterima; $i++){
			array_push($data_detail_terima, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_terima[$i]['kode_barang'] = $this->input->post('kode_barang_hidden')[$i];
			$data_detail_terima[$i]['nama_barang'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_terima[$i]['ref'] = $this->input->post('ref_hidden')[$i];
			$data_detail_terima[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_terima[$i]['satuan'] = $this->input->post('satuan_hidden')[$i]; 
		}

		if($this->m_penerimaan_admin->tambah($data_terima) && $this->m_detail_terima->tambah($data_detail_terima)){
			for ($i=0; $i < $jumlah_barang_diterima ; $i++) {
				$this->m_barang_admin->plus_stok($data_detail_terima[$i]['jumlah'], $data_detail_terima[$i]['kode_barang']) or die('gagal min stok');
			}
			$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('PenerimaanAdmin');
		}
	}

	public function detail($kode_transaksi){
		$this->data['title'] = 'Detail Penerimaan';
		$this->data['penerimaan'] = $this->m_penerimaan_admin->lihat_no_terima($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_detail_terima->lihat_no_terima($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('Penerimaan/Admin/detail', $this->data);
	}

	public function hapus($kode_transaksi){
		if($this->m_penerimaan_admin->hapus($kode_transaksi) && $this->m_detail_terima->hapus($kode_transaksi)){
			$this->session->set_flashdata('success', 'Invoice Penerimaan <strong>Berhasil</strong> Dihapus!');
			redirect('PenerimaanAdmin');
		} else {
			$this->session->set_flashdata('error', 'Invoice Penerimaan <strong>Gagal</strong> Dihapus!');
			redirect('PenerimaanAdmin');
		}
	}

	public function get_all_barang(){
		$data = $this->m_barang_admin->lihat_nama_barang($_POST['kode_barang']);
		echo json_encode($data);
	}

	public function keranjang_barang(){
		$this->load->view('Penerimaan/Admin/keranjang');
	}

	public function export(){ 
		$this->data['all_penerimaan'] = $this->m_penerimaan_admin->lihat();
		$this->data['title'] = 'Laporan Data Penerimaan Barang';
		$this->data['no'] = 1; 
		$this->load->library('pdfgenerator');
        
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Data Penerimaan Barang';
        
        // filename dari pdf ketika didownload
		$file_pdf = 'Laporan Data Penerimaan Barang';
		
        // setting paper
		$paper = 'A4';
		
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('Penerimaan/Admin/report',$this->data, true); 
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
	}

	public function export_detail($kode_transaksi){ 
		$this->data['penerimaan'] = $this->m_penerimaan_admin->lihat_no_terima($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_detail_terima->lihat_no_terima($kode_transaksi);
		$this->data['title'] = 'Laporan Detail Masuk Barang';
		$this->data['no'] = 1; 
		$this->load->library('pdfgenerator');
        
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Detail Masuk Barang';
        
        // filename dari pdf ketika didownload
		$file_pdf = 'Laporan Detail Masuk Barang';
		
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('Penerimaan/Admin/detail_report',$this->data, true); 
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);		
	}
}