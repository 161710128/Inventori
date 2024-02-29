<?php

use Dompdf\Dompdf;

class PengeluaranAdmin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->data['aktif'] = 'PengeluaranAdmin';
		$this->load->model('M_barang_admin', 'm_barang_admin');
		$this->load->model('M_pengeluaran_admin', 'm_pengeluaran_admin');
		$this->load->model('M_DetailKeluar_admin', 'm_detail_admin');
	}

	public function index(){
		$this->data['title'] = 'Transaksi Pengeluaran Elektro';
		$this->data['all_pengeluaran'] = $this->m_pengeluaran_admin->lihat();
		$this->data['no'] = 1;

		$this->load->view('Pengeluaran/satuan/admin/lihat', $this->data);
	}

	public function tambah(){
		$this->data['title'] = 'Tambah Transaksi';
		$this->data['all_komponen'] = $this->m_barang_admin->tampil_komponen(); 
		$dariDB = $this->m_pengeluaran_admin->cekkodetransaksi1(); 
        $nourut = substr($dariDB, 3, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->load->view('Pengeluaran/satuan/admin/tambah', $this->data);
	}

	public function proses_tambah(){
		$jumlah_barang_dikeluar = count($this->input->post('nama_barang_hidden'));
		
		$data_keluar = [
			'kode_transaksi' => $this->input->post('kode_transaksi'),
			'tanggal_keluar' => $this->input->post('tanggal_keluar'),
			'jam_keluar' => $this->input->post('jam_keluar'), 
			'nama_pengguna' => $this->input->post('nama_pengguna'),
		];

		$data_detail_keluar = [];

		for($i = 0; $i < $jumlah_barang_dikeluar; $i++){
			array_push($data_detail_keluar, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_keluar[$i]['kode_barang'] = $this->input->post('kode_barang_hidden')[$i];
			$data_detail_keluar[$i]['nama_barang'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_keluar[$i]['ref'] = $this->input->post('ref_hidden')[$i];
			$data_detail_keluar[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_keluar[$i]['satuan'] = $this->input->post('satuan_hidden')[$i]; 
		}

		if($this->m_pengeluaran_admin->tambah($data_keluar) && $this->m_detail_admin->tambah($data_detail_keluar)){
			for ($i=0; $i < $jumlah_barang_dikeluar ; $i++) {
				$this->m_barang_admin->min_stok($data_detail_keluar[$i]['jumlah'], $data_detail_keluar[$i]['kode_barang']) or die('gagal min stok');
			}
			$this->session->set_flashdata('success', 'Invoice <strong>Pengeluaran</strong> Berhasil Dibuat!');
			redirect('PengeluaranAdmin');
		}
	}

	public function detail($kode_transaksi){
		$this->data['title'] = 'Detail Pengeluaran';
		$this->data['pengeluaran'] = $this->m_pengeluaran_admin->lihat_no_keluar($kode_transaksi);
		$this->data['all_detail_keluar'] = $this->m_detail_admin->lihat_no_keluar($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('Pengeluaran/satuan/admin/detail', $this->data);
	}

	public function hapus($kode_transaksi){
		if($this->m_pengeluaran_admin->hapus($kode_transaksi) && $this->m_detail_admin->hapus($kode_transaksi)){
			$this->session->set_flashdata('success', 'Invoice Pengeluaran <strong>Berhasil</strong> Dihapus!');
			redirect('PengeluaranAdmin');
		} else {
			$this->session->set_flashdata('error', 'Invoice Pengeluaran <strong>Gagal</strong> Dihapus!');
			redirect('PengeluaranAdmin');
		}
	}

	public function get_all_barang(){
		$data = $this->m_barang_admin->lihat_nama_barang($_POST['kode_barang']);
		echo json_encode($data);
	}

	public function keranjang_barang(){
		$this->load->view('Pengeluaran/satuan/admin/keranjang');
	}

	public function export(){ 
		$this->data['all_pengeluaran'] = $this->m_pengeluaran_admin->lihat();
		$this->data['title'] = 'Laporan Data Pengeluaran Barang';
		$this->data['no'] = 1; 
		$this->load->library('pdfgenerator');
        
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Data Pengeluaran Barang';
        
        // filename dari pdf ketika didownload
		$file_pdf = 'Laporan Data Pengeluaran Barang';
		
        // setting paper
		$paper = 'A4';
		
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('Pengeluaran/satuan/admin/report',$this->data, true); 
		
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
	}

	public function export_detail($kode_transaksi){ 
		$this->data['pengeluaran'] = $this->m_pengeluaran_admin->lihat_no_keluar($kode_transaksi);
		$this->data['all_detail_keluar'] = $this->m_detail_admin->lihat_no_keluar($kode_transaksi);
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
        
		$html = $this->load->view('Pengeluaran/satuan/admin/detail_report',$this->data, true); 
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);		
	}
}