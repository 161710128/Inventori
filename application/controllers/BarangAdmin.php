<?php

use Dompdf\Dompdf;

class BarangAdmin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'super' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'BarangAdmin';
		$this->load->model('M_barang_admin', 'm_barang_admin');
	}

	public function index(){
		$this->data['title'] = 'Data Komponen';
		$this->data['all_barang'] = $this->m_barang_admin->lihat(); 

		$this->data['no'] = 1;


		$this->load->view('MasterBarang/Admin/lihat', $this->data);
	}

	public function tambah(){ 

		$this->data['title'] = 'Tambah Barang';
		$dariDB = $this->m_barang_admin->cekkodebarang(); 
        $nourut = substr($dariDB, 3, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_komponen'] = $kodeBarangSekarang;
		$this->load->view('MasterBarang/Admin/tambah', $this->data);
	}

	public function proses_tambah(){ 

		$data = [ 
			'kode_barang' => $this->input->post('kode_barang'),
			'nama_barang' => $this->input->post('nama_barang'),
			'ref' => $this->input->post('ref'),
			'total_stok' => $this->input->post('total_stok'),
			'satuan' => $this->input->post('satuan'),  
		];

		if($this->m_barang_admin->tambah($data)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			redirect('BarangAdmin');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('BarangAdmin');
		}
	}

	public function ubah($kode_barang){ 

		$this->data['title'] = 'Ubah Barang';
		$this->data['barang'] = $this->m_barang_admin->lihat_id($kode_barang);

		$this->load->view('MasterBarang/Admin/ubah', $this->data);
	}

	public function proses_ubah($komponen){ 
		$data = [ 
			'nama_barang' => $this->input->post('nama_barang'),
			'total_stok' => $this->input->post('total_stok'),
			'satuan' => $this->input->post('satuan'), 
			'ref' => $this->input->post('ref'),
		];

		if($this->m_barang_admin->ubah($data, $komponen)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('BarangAdmin');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('BarangAdmin');
		}
	}

	public function hapus($kode_barang){ 
		
		if($this->m_barang_admin->hapus($kode_barang)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('BarangAdmin');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('BarangAdmin');
		}
	}

	public function export(){ 
		$this->data['all_barang'] = $this->m_barang_admin->lihat();
		$this->data['title'] = 'Laporan Data Komponen';
		$this->data['no'] = 1; 

		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Data Komponen';
        
        // filename dari pdf ketika didownload
		$file_pdf = 'Laporan Data Komponen';
		
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('MasterBarang/Admin/report',$this->data, true); 
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
	}
	public function hnfc01(){ 
		$this->data['title'] = 'Data Komponen'; 
		$this->data['all_barang'] = $this->m_barang_admin->hnfc01(); 
		$this->data['no'] = 1; 
		$this->load->view('MasterBarang/Elektro/hnfc01', $this->data);
	}
	public function hnfc02(){ 
		$this->data['title'] = 'Data Komponen'; 
		$this->data['all_barang'] = $this->m_barang_admin->lihat(); 
		$this->data['no'] = 1; 
		$this->load->view('MasterBarang/Elektro/hnfc01', $this->data);
	}
	public function export_hnfc01(){ 
		$this->data['all_barang'] = $this->m_barang_admin->hnfc01();
		$this->data['title'] = 'Laporan Data Komponen HNFC01';
		$this->data['no'] = 1; 

		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Data Komponen HNFC01';
        
        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan Data Komponen HNFC01';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('MasterBarang/Admin/report_hnfc01',$this->data, true); 
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
	}
}