<?php 
class PengirimanEkatalog extends CI_Controller{
	public function __construct(){ 
		parent::__construct();
		if($this->session->login['role'] != 'super' && $this->session->login['role'] != 'pemesanan' && $this->session->login['role'] != 'quality') redirect();
		$this->data['aktif'] = 'PengirimanEkatalog';
		$this->load->model('qualityControl/M_Master', 'm_master');
	}
 
	public function index(){
		$this->data['title'] = 'Semua Alat';
		$this->data['all_barang'] = $this->m_master->lihatPemesanan(); 
		$this->data['no'] = 1;
		
		$this->load->view('qualityControl/pengiriman/lihat', $this->data);
	}
	
	public function antropometri(){ 
		$this->data['title'] = 'Antropometri';
		$this->data['all_barang'] = $this->m_master->lihatAntro(); 
		$this->data['no'] = 1;
		
		$this->load->view('qualityControl/pengiriman/lihat', $this->data);
	}

	public function lanKP(){ 
		$this->data['title'] = 'Semua Alat';
		$this->data['all_barang'] = $this->m_master->lihatLanKP(); 
		$this->data['no'] = 1;
		
		$this->load->view('qualityControl/pengiriman/lihat', $this->data);
	}

	public function endosLL(){ 
		$this->data['title'] = 'Semua Alat';
		$this->data['all_barang'] = $this->m_master->lihatEndosLL(); 
		$this->data['no'] = 1;
		
		$this->load->view('qualityControl/pengiriman/lihat', $this->data);
	}

	public function infusSP(){ 
		$this->data['title'] = 'Semua Alat';
		$this->data['all_barang'] = $this->m_master->lihatInfusSP(); 
		$this->data['no'] = 1;
		
		$this->load->view('qualityControl/pengiriman/lihat', $this->data);
	}

	public function hfnc(){ 
		$this->data['title'] = 'Semua Alat';
		$this->data['all_barang'] = $this->m_master->lihatHfnc(); 
		$this->data['no'] = 1;
		
		$this->load->view('qualityControl/pengiriman/lihat', $this->data);
	}

	public function usg(){ 
		$this->data['title'] = 'Semua Alat';
		$this->data['all_barang'] = $this->m_master->lihatUsg(); 
		$this->data['no'] = 1;
		
		$this->load->view('qualityControl/pengiriman/lihat', $this->data);
	}
	
	public function dexin(){ 
		$this->data['title'] = 'Semua Alat';
		$this->data['all_barang'] = $this->m_master->lihatDexin(); 
		$this->data['no'] = 1;
		
		$this->load->view('qualityControl/pengiriman/lihat', $this->data);
	}

 
	// public function tambah(){ 
	// 	$this->data['title'] = 'Tambah Alat';
	// 	$dariDB = $this->m_master->cekkodebarang(); 
    //     $nourut = substr($dariDB, 2, 6);
	// 	$kodeBarangSekarang = $nourut + 1;
	// 	$this->data['kode_komponen'] = $kodeBarangSekarang;
	// 	// $this->data['all_barang'] = $this->m_master->AllBarang();

	// 	$this->load->view('pemesananBarang/tambah_alat', $this->data);
	// }

	// public function proses_tambah(){ 
	// 	$keyword = $this->input->post('reservationdate'); 
	// 	$timestamp = strtotime($keyword);
	// 	$new_date_format = date('Y-m-d', $timestamp); 
	// 	$data = [ 
	// 		'kode_pemesanan' => $this->input->post('kode_pemesanan'), 
	// 		'id_paket' => $this->input->post('id_paket'), 
	// 		'pemesanan' => $this->input->post('pemesanan'), 
	// 		'distributor' => $this->input->post('distributor'), 
	// 		'nama_alat' => $this->input->post('nama_alat'), 
	// 		'qty' => $this->input->post('quantity'), 
	// 		'tanggal_deadline' => $new_date_format, 
	// 		'catatan' => $this->input->post('catatan'), 
	// 		'id_barangpemesanan' => $this->input->post('id_barangpemesanan'), 
	// 		'status' => $this->input->post('status'),  
	// 	];

	// 	if($this->m_master->tambahAlat($data)){
	// 		//$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
	// 		redirect('PemesananBarang/Ekatalog');
	// 	} else {
	// 	//	$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
	// 		redirect('PemesananBarang/Ekatalog');
	// 	}
	// }

	public function ubah($kode_komponen){ 

		$this->data['title'] = 'Ubah Barang';
		$this->data['barang'] = $this->m_master->lihat_idPemesanan($kode_komponen); 

		$this->load->view('qualityControl/pengiriman/ubah_alat', $this->data);
	}

	public function proses_ubah($kode_komponen){ 
		$keyword = $this->input->post('reservationdate1'); 
		$timestamp = strtotime($keyword);
		$new_date_format = date('Y-m-d', $timestamp); 

		$data = [ 
			// 'kode_pemesanan' => $this->input->post('kode_pemesanan'), 
			// 'id_paket' => $this->input->post('id_paket'), 
			// 'pemesanan' => $this->input->post('pemesanan'), 
			// 'distributor' => $this->input->post('distributor'), 
			// 'nama_alat' => $this->input->post('nama_alat'), 
			// 'qty' => $this->input->post('quantity'), 
			'tanggal_dikirim' => $new_date_format, 
			// 'catatan' => $this->input->post('catatan'), 
			// 'id_barangpemesanan' => $this->input->post('id_barangpemesanan'), 
			'status' => $this->input->post('status'),  
		];

		if($this->m_master->ubahAlatPemesanan($data, $kode_komponen)){
		//	$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('QualityControl/PengirimanEkatalog');
		} else {
		//	$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('QualityControl/PengirimanEkatalog');
		}
	}

	public function hapus($kode_komponen){ 
		
		if($this->m_master->hapusAlat($kode_komponen)){
			//$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('PemesananBarang/Ekatalog');
		} else {
			//$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('PemesananBarang/Ekatalog');
		}
	} 
}