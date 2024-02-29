<?php 
class NonEkatalog extends CI_Controller{
	public function __construct(){ 
		parent::__construct();
		if($this->session->login['role'] != 'super' && $this->session->login['role'] != 'pemesanan') redirect();
		$this->data['aktif'] = 'NonEkatalog';
		$this->load->model('pemesanan/M_MasterNon', 'm_master');
	}
 
	public function index(){
		$this->data['title'] = 'Semua Alat';
		$this->data['all_barang'] = $this->m_master->lihat(); 
		$this->data['no'] = 1;
		
		$this->load->view('pemesananBarang/lihat_none', $this->data);
	}

 
	public function tambah(){ 
		$this->data['title'] = 'Tambah Alat';
		$dariDB = $this->m_master->cekkodebarang(); 
        $nourut = substr($dariDB, 2, 6);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_komponen'] = $kodeBarangSekarang;
		// $this->data['all_barang'] = $this->m_master->AllBarang();

		$this->load->view('pemesananBarang/tambah_alatNone', $this->data);
	}

	public function proses_tambah(){ 
		$keyword = $this->input->post('reservationdate'); 
		$timestamp = strtotime($keyword);
		$new_date_format = date('Y-m-d', $timestamp); 
		$data = [ 
			'kode_pemesanan' => $this->input->post('kode_pemesanan'), 
			'no_order' => $this->input->post('no_order'), 
			'customer' => $this->input->post('customer'), 
			'jenis_barang' => $this->input->post('jenis_barang'),  
			'qty' => $this->input->post('quantity'), 
			'tanggal_deadline' => $new_date_format, 
			'catatan' => $this->input->post('catatan'),   
			'status' => $this->input->post('status'),   
		];

		if($this->m_master->tambahAlat($data)){
			//$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			redirect('PemesananBarang/NonEkatalog');
		} else {
		//	$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('PemesananBarang/NonEkatalog');
		}
	}

	public function ubah($kode_komponen){ 

		$this->data['title'] = 'Ubah Barang';
		$this->data['barang'] = $this->m_master->lihat_idAlat($kode_komponen); 

		$this->load->view('pemesananBarang/ubah_alatNone', $this->data);
	}

	public function proses_ubah($kode_komponen){ 
		$keyword = $this->input->post('tanggal_deadline'); 
		$timestamp = strtotime($keyword);
		$new_date_format = date('Y-m-d', $timestamp); 

		$data = [ 
			// 'kode_pemesanan' => $this->input->post('kode_pemesanan'), 
			'no_order' => $this->input->post('no_order'), 
			'customer' => $this->input->post('customer'), 
			'jenis_barang' => $this->input->post('jenis_barang'),  
			'qty' => $this->input->post('quantity'), 
			'tanggal_deadline' => $new_date_format, 
			'catatan' => $this->input->post('catatan'),   
			'status' => $this->input->post('status'), 
		];

		if($this->m_master->ubahAlat($data, $kode_komponen)){
		//	$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('PemesananBarang/NonEkatalog');
		} else {
		//	$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('PemesananBarang/NonEkatalog');
		}
	}

	public function hapus($kode_komponen){ 
		
		if($this->m_master->hapusAlat($kode_komponen)){
			//$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('PemesananBarang/NonEkatalog');
		} else {
			//$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('PemesananBarang/NonEkatalog');
		}
	} 
}