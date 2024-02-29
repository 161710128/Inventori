<?php

use Dompdf\Dompdf;

class Unit_M extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->data['aktif'] = 'Unit_M';
		$this->load->model('M_barang_mekanik', 'm_barang_mekanik'); 
		$this->load->model('M_unit_mekanik', 'm_unit_mekanik');
		$this->load->model('M_dk_unit_mekanik', 'm_dk_unit_mekanik');
	}

	public function index(){
		$this->data['title'] = 'Transaksi Unit';
		$this->data['all_unit'] = $this->m_unit_mekanik->lihat();
		$this->data['no'] = 1;

		$this->load->view('Pengeluaran/unit/mekanik/lihat', $this->data);
	}

	public function tambah(){
		$this->data['title'] = 'Tambah Transaksi Unit';
		$this->data['all_komponen'] = $this->m_barang_mekanik->lihat_stok_komponen(); 
		
		$dariDB = $this->m_unit_mekanik->cekkodetransaksi(); 
        $nourut = substr($dariDB, 3, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->load->view('Pengeluaran/unit/mekanik/tambah', $this->data);
	}

	public function simpanData()
    {
		$jumlah = $this->input->post('total');
		$nama_komponen = $this->input->post('nama_komponen');
		$id_barang = 1;
		$this->m_unit->inputData();
		$this->m_unit->inputData1();
		$this->m_barang_mekanik->min_stok($jumlah, $nama_komponen, $id_barang);

		redirect('Unit_M'); 
    }

	public function proses_tambah(){
		$jumlah_barang_keluar = count($this->input->post('nama_komponen')); 

		$data_keluar = [
			'kode_transaksi' => $this->input->post('kode_transaksi'),
			'nama_pengguna' => $this->input->post('nama_pengguna'),
			'tanggal_keluar' => $this->input->post('tanggal_keluar'),
			'jam_keluar' => $this->input->post('jam_keluar'),
		];

		$data_detail_keluar = [];

		for($i = 0; $i < $jumlah_barang_keluar; $i++){
			array_push($data_detail_keluar, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_keluar[$i]['kode_komponen'] = $this->input->post('kode_komponen')[$i];
			$data_detail_keluar[$i]['nama_komponen'] = $this->input->post('nama_komponen')[$i];
			$data_detail_keluar[$i]['jumlah'] = $this->input->post('total')[$i];
			$data_detail_keluar[$i]['satuan'] = $this->input->post('satuan')[$i];
			$data_detail_keluar[$i]['id_barang'] = $this->input->post('id_barang') [$i];
		}

		if($this->m_unit_mekanik->tambah($data_keluar) && $this->m_dk_unit_mekanik->tambah($data_detail_keluar)){
			for ($i=0; $i < $jumlah_barang_keluar ; $i++) { 
				$this->m_barang_mekanik->min_stok($data_detail_keluar[$i]['jumlah'], $data_detail_keluar[$i]['kode_komponen'], $data_detail_keluar[$i]['id_barang']) or die('gagal min stok');
			}
			$this->session->set_flashdata('success', 'Invoice <strong>Pengeluaran</strong> Berhasil Dibuat!');
			redirect('Unit_M');
		}
	}

	public function detail($kode_transaksi){
		$this->data['title'] = 'Detail Pengeluaran';
		$this->data['unit'] = $this->m_unit_mekanik->lihat_no_keluar($kode_transaksi);
		$this->data['all_detail_unit'] = $this->m_dk_unit_mekanik->lihat_no_keluar($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('Pengeluaran/unit/mekanik/detail', $this->data);
	}

	public function hapus($kode_transaksi){
		if($this->m_unit_mekanik->hapus($kode_transaksi) && $this->m_dk_unit_mekanik->hapus($kode_transaksi)){
			$this->session->set_flashdata('success', 'Invoice Pengeluaran <strong>Berhasil</strong> Dihapus!');
			redirect('Unit_M');
		} else {
			$this->session->set_flashdata('error', 'Invoice Pengeluaran <strong>Gagal</strong> Dihapus!');
			redirect('Unit_M');
		}
	}

	public function get_all_barang(){
		$data = $this->m_barang_mekanik->lihat_nama_barang($_POST['kode_komponen']);
		echo json_encode($data);
	}

	public function keranjang_barang(){
		$this->load->view('Pengeluaran/unit/mekanik/keranjang');
	}

	public function export(){ 
		$this->data['all_unit'] = $this->m_unit_mekanik->lihat();
		$this->data['title'] = 'Laporan Data Pengeluaran Unit Barang';
		$this->data['no'] = 1; 
		$this->load->library('pdfgenerator');
        
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Data Pengeluaran Unit Barang';
        
        // filename dari pdf ketika didownload
		$file_pdf = 'Laporan Data Pengeluaran Unit Barang';
		
        // setting paper
		$paper = 'A4';
		
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('Pengeluaran/unit/mekanik/report',$this->data, true); 
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
	}

	public function export_detail($kode_transaksi){ 
		$this->data['unit'] = $this->m_unit_mekanik->lihat_no_keluar($kode_transaksi);
		$this->data['all_unit_keluar'] = $this->m_dk_unit_mekanik->lihat_no_keluar($kode_transaksi);
		$this->data['title'] = 'Laporan Detail Pengeluaran Unit Barang';
		$this->data['no'] = 1; 
		$this->load->library('pdfgenerator');
        
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Detail Pengeluaran Unit Barang';
        
        // filename dari pdf ketika didownload
		$file_pdf = 'Laporan Detail Pengeluaran Unit Barang';
		
        // setting paper
		$paper = 'A4';
		
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('Pengeluaran/unit/mekanik/detail_report',$this->data, true); 
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
	}

	public function hnfc_01(){
		$this->data['title'] = 'Tambah Transaksi Unit'; 
		$this->data['no'] = 1;

		$dariDB = $this->m_unit_mekanik->cekkodetransaksi2(); 
        $nourut = substr($dariDB, 3, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;

		$this->load->view('Pengeluaran/unit/mekanik/hnfc_01', $this->data);
	}
}