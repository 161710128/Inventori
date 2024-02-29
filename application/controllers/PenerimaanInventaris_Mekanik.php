<?php

use Dompdf\Dompdf;

class PenerimaanInventaris_Mekanik extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->data['aktif'] = 'InventarisMasuk';
		$this->load->model('M_BarangInventaris_Mekanik', 'm_baranginventaris_mekanik');
		$this->load->model('M_PenerimaanMekanik_Inventaris', 'm_penerimaanmekanik_inventaris');
		$this->load->model('M_DT_Mekanik_Inventaris', 'm_dt_mekanik_inventaris');
	}

	public function index(){
		$this->data['title'] = 'Transaksi Penerimaan Mekanik';
		$this->data['all_penerimaan'] = $this->m_penerimaanmekanik_inventaris->lihat();
		$this->data['no'] = 1;

		$this->load->view('InventarisMekanik/penerimaan/lihat', $this->data);
	}

	public function ubah($kode_transaksi){ 
		$this->data['title'] = 'Tambah Barang';
		$this->data['all_komponen'] = $this->m_baranginventaris_mekanik->lihat_stok_komponen();  
		$this->data['barang'] = $this->m_baranginventaris_mekanik->lihat_id1($kode_transaksi);

		$this->load->view('InventarisMekanik/penerimaan/TambahEdit', $this->data);
	}

	public function tambah(){
		$this->data['title'] = 'Tambah Transaksi';
		$this->data['all_komponen'] = $this->m_baranginventaris_mekanik->lihat_stok_komponen(); 
		$dariDB = $this->m_penerimaanmekanik_inventaris->cekkodetransaksi(); 
        $nourut = substr($dariDB, 3, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->load->view('InventarisMekanik/penerimaan/tambah', $this->data);
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
			$data_detail_terima[$i]['kode_part'] = $this->input->post('kode_part_hidden')[$i];
			// $data_detail_terima[$i]['pengambil'] = $this->input->post('pengambil_hidden')[$i];
			$data_detail_terima[$i]['nama_barang'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_terima[$i]['spesifikasi'] = $this->input->post('spesifikasi_hidden')[$i];
 			$data_detail_terima[$i]['id_barang'] = $this->input->post('id_barang_hidden')[$i];
			$data_detail_terima[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_terima[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_terima[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i];
		}

		if($this->m_penerimaanmekanik_inventaris->tambah($data_terima) && $this->m_dt_mekanik_inventaris->tambah($data_detail_terima)){
			for ($i=0; $i < $jumlah_barang_diterima ; $i++) {
				$this->m_baranginventaris_mekanik->plus_stok($data_detail_terima[$i]['jumlah'], $data_detail_terima[$i]['kode_part'], $data_detail_terima[$i]['id_barang']) or die('gagal min stok');
			}
			$this->session->set_flashdata('success', 'Invoice <strong>Pengeluaran</strong> Berhasil Dibuat!');
			redirect('PenerimaanInventaris_Mekanik');
		}
	}

	public function proses_tambah1(){
		$jumlah_barang_diterima = count($this->input->post('nama_barang_hidden'));
		
		// $data_keluar = [
		// 	'kode_transaksi' => $this->input->post('kode_transaksi'),
		// 	'tanggal_keluar' => $this->input->post('tanggal_keluar'),
		// 	'jam_keluar' => $this->input->post('jam_keluar'), 
		// 	'nama_pengguna' => $this->input->post('nama_pengguna'),
		// ];

		$data_detail_terima = [];

		for($i = 0; $i < $jumlah_barang_diterima; $i++){
			array_push($data_detail_terima, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_terima[$i]['kode_part'] = $this->input->post('kode_part_hidden')[$i];
			// $data_detail_terima[$i]['pengambil'] = $this->input->post('pengambil_hidden')[$i];
			$data_detail_terima[$i]['nama_barang'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_terima[$i]['spesifikasi'] = $this->input->post('spesifikasi_hidden')[$i];
 			$data_detail_terima[$i]['id_barang'] = $this->input->post('id_barang_hidden')[$i];
			$data_detail_terima[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_terima[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_terima[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i];
		}

		if($this->m_dt_mekanik_inventaris->tambah($data_detail_terima)){
			for ($i=0; $i < $jumlah_barang_diterima ; $i++) {
				$this->m_baranginventaris_mekanik->plus_stok($data_detail_terima[$i]['jumlah'], $data_detail_terima[$i]['kode_part'], $data_detail_terima[$i]['id_barang']) or die('gagal min stok');
			}
			$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('PenerimaanInventaris_Mekanik');
		}
	}

	public function detail($kode_transaksi){
		$this->data['title'] = 'Detail Penerimaan';
		$this->data['penerimaan'] = $this->m_penerimaanmekanik_inventaris->lihat_no_terima($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_dt_mekanik_inventaris->lihat_no_terima($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('InventarisMekanik/penerimaan/detail', $this->data);
	}

	public function hapus($kode_transaksi){
		if($this->m_penerimaanmekanik_inventaris->hapus($kode_transaksi) && $this->m_dt_mekanik_inventaris->hapus($kode_transaksi)){
			$this->session->set_flashdata('success', 'Invoice Penerimaan <strong>Berhasil</strong> Dihapus!');
			redirect('PenerimaanInventaris_Mekanik');
		} else {
			$this->session->set_flashdata('error', 'Invoice Penerimaan <strong>Gagal</strong> Dihapus!');
			redirect('PenerimaanInventaris_Mekanik');
		}
	}

	public function get_all_barang(){
		$data = $this->m_baranginventaris_mekanik->lihat_nama_barang($_POST['kode_part']);
		echo json_encode($data);
	}

	public function keranjang_barang(){
		$this->load->view('InventarisMekanik/penerimaan/keranjang');
	}

	public function export(){ 
		$this->data['all_penerimaan'] = $this->m_penerimaanmekanik_inventaris->lihat();
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
        
		$html = $this->load->view('InventarisMekanik/penerimaan/report',$this->data, true); 

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
	}

	public function export_detail($kode_transaksi){ 
		$this->data['penerimaan'] = $this->m_penerimaanmekanik_inventaris->lihat_no_terima($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_dt_mekanik_inventaris->lihat_no_terima($kode_transaksi);
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
        
		$html = $this->load->view('InventarisMekanik/penerimaan/detail_report',$this->data, true); 
		
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);		
	}
}