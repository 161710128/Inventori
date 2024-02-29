<?php

use Dompdf\Dompdf;

class BarangMekanik extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->login['role'] != 'super' && $this->session->login['role'] != 'mekanik'  && $this->session->login['role'] != 'supervisor') redirect();
		$this->data['aktif'] = 'BarangMekanik'; 
		$this->load->model('purchasingMekanik/M_barang_mekanik', 'm_barang_mekanik');
	}

	public function index() 
	{
		$this->data['title'] = 'Data Semua Barang'; 
		$this->data['titleHead'] = 'Data Barang';
		$this->data['all_barang'] = $this->m_barang_mekanik->lihat(); 
		$this->data['no'] = 1;
		
		$this->load->view('purchasingMekanik/masterBarang/masterBarangMekanik/lihat', $this->data); 
	}

	public function hfnc(){
		$this->data['title'] = 'Data Barang HFNC';
		$this->data['titleHead'] = 'DataBarang | HFNC';
		$this->data['all_barang'] = $this->m_barang_mekanik->HFNC();
		$this->data['no'] = 1;
		
		$this->load->view('purchasingMekanik/masterBarang/masterBarangMekanik/DataMaster/hfnc', $this->data);
	}

	public function antropometri(){
		$this->data['title'] = 'Data Barang Antropometri';
		$this->data['titleHead'] = 'DataBarang | Antropometri';
		// $this->data['all_barang'] = $this->m_barang_mekanik->antropometri();
		$this->data['all_barang'] = $this->m_barang_mekanik->Antropometri();
		$this->data['no'] = 1;


		$this->load->view('purchasingMekanik/masterBarang/masterBarangMekanik/DataMaster/antropometri', $this->data);
	}

	public function tambah()
	{  
		$this->data['title'] = 'Tambah Barang';
		$this->data['titleHead'] = 'Tambah Barang';
		$dariDB = $this->m_barang_mekanik->cekkodebarang();
		// contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
		$nourut = substr($dariDB, 3, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_komponen'] = $kodeBarangSekarang;
		$role = $this->input->post("id_barang");
		$this->data['request'] = $role;

		$this->load->view('purchasingMekanik/masterBarang/masterBarangMekanik/tambah', $this->data);
	}

	public function tambahHfnc()
	{  
		$this->data['title'] = 'Tambah Barang HFNC';
		$this->data['titleHead'] = 'Tambah Barang | HFNC';
		$dariDB = $this->m_barang_mekanik->cekkodebarangHFNC();
		// contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
		$nourut = substr($dariDB, 3, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_komponen'] = $kodeBarangSekarang;
		$role = $this->input->post("id_barang");
		$this->data['request'] = $role;

		$this->load->view('purchasingMekanik/masterBarang/masterBarangMekanik/TambahData/tambahHFNC', $this->data);
	}

	public function tambahAntropometri()
	{  
		$this->data['title'] = 'Tambah Barang Antropometri';
		$this->data['titleHead'] = 'Tambah Barang | Antropometri';
		$dariDB = $this->m_barang_mekanik->cekkodebarangAntropometri();
		// contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
		$nourut = substr($dariDB, 3, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_komponen'] = $kodeBarangSekarang; 

		// $role = $this->input->post("id_barang");
		// $this->data['request'] = $role;

		$this->load->view('purchasingMekanik/masterBarang/masterBarangMekanik/TambahData/tambahAntropometri', $this->data);
	}

	public function ubah($kode_komponen)
	{
		$this->data['title'] = 'Ubah HFNC';
		$this->data['titleHead'] = 'Ubah | Barang HFNC';
		$this->data['barang'] = $this->m_barang_mekanik->lihat_id($kode_komponen);

		$this->load->view('purchasingMekanik/masterBarang/masterBarangMekanik/UbahData/ubahHfnc', $this->data);
	}

	public function ubahHfnc($kode_komponen)
	{
		$this->data['title'] = 'Ubah HFNC';
		$this->data['titleHead'] = 'Ubah | Barang HFNC';
		$this->data['barang'] = $this->m_barang_mekanik->lihat_id($kode_komponen);

		$this->load->view('purchasingMekanik/masterBarang/masterBarangMekanik/UbahData/ubahHfnc', $this->data);
	}

	public function ubahAntropometri($kode_komponen)
	{
		$this->data['title'] = 'Ubah Antropometri';
		$this->data['titleHead'] = 'Ubah | Barang Antropometri';
		$this->data['barang'] = $this->m_barang_mekanik->lihat_id($kode_komponen);

		$this->load->view('purchasingMekanik/masterBarang/masterBarangMekanik/UbahData/ubahAntropometri', $this->data);
	}

	public function proses_tambahHFNC()
	{
		$data = [
			'kode_komponen' => $this->input->post('kode_komponen'),
			'nama_komponen' => $this->input->post('nama_komponen'),
			'harga_satuan' => $this->input->post('harga_satuan'),
			'satuan' => $this->input->post('satuan'),
			'total_stok' => $this->input->post('total_stok'),
			'nama_toko' => $this->input->post('nama_toko'),
			'stok_alat' => $this->input->post('stok_alat'),
			'keterangan' => $this->input->post('keterangan'),
			'spesifikasi' => $this->input->post('spesifikasi'),
			'qty_unit' => $this->input->post('qty_unit'),
			'kebutuhan' => $this->input->post('kebutuhan'),
			'id_barangm' => $this->input->post('id_barang'),
		];

		if ($this->m_barang_mekanik->tambah($data)) {
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			redirect('PurchasingMekanik/BarangMekanik/hfnc');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('PurchasingMekanik/BarangMekanik/hfnc');
		}
	}

	public function proses_tambahAntropometri()
	{
		$data = [
			'kode_komponen' => $this->input->post('kode_komponen'),
			'nama_komponen' => $this->input->post('nama_komponen'),
			'harga_satuan' => $this->input->post('harga_satuan'),
			'satuan' => $this->input->post('satuan'),
			'total_stok' => $this->input->post('total_stok'),
			'nama_toko' => $this->input->post('nama_toko'),
			'stok_alat' => $this->input->post('stok_alat'),
			'keterangan' => $this->input->post('keterangan'),
			'spesifikasi' => $this->input->post('spesifikasi'),
			'qty_unit' => $this->input->post('qty_unit'),
			'kebutuhan' => $this->input->post('kebutuhan'),
			'type_barang' => $this->input->post('tipe_barang'),
			'stok_minimal' => $this->input->post('stok_minimal'),
			'id_barangm' => $this->input->post('id_barang'),
		];

		if ($this->m_barang_mekanik->tambah($data)) {
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			redirect('PurchasingMekanik/BarangMekanik/antropometri');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('PurchasingMekanik/BarangMekanik/antropometri');
		}
	}

	public function proses_ubah_hfnc($komponen)
	{
		$data = [
			'nama_komponen' => $this->input->post('nama_komponen'),
			'spesifikasi' => $this->input->post('spesifikasi'),
			'harga_satuan' => $this->input->post('harga_satuan'),
			'satuan' => $this->input->post('satuan'),
			'total_stok' => $this->input->post('total_stok'),
			'kebutuhan' => $this->input->post('kebutuhan'),
			'keterangan' => $this->input->post('keterangan'),
			'nama_toko' => $this->input->post('nama_toko'),
			// 'id_barangm' => $this->input->post('id_barang'),
		];

		if ($this->m_barang_mekanik->ubah($data, $komponen)) {
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('PurchasingMekanik/BarangMekanik/hfnc');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('PurchasingMekanik/BarangMekanik/hfnc');
		}
	}

	public function proses_ubah_antropometri($komponen)
	{
		$data = [
			'nama_komponen' => $this->input->post('nama_komponen'),
			'spesifikasi' => $this->input->post('spesifikasi'),
			'harga_satuan' => $this->input->post('harga_satuan'),
			'satuan' => $this->input->post('satuan'),
			'total_stok' => $this->input->post('total_stok'),
			'kebutuhan' => $this->input->post('kebutuhan'),
			'keterangan' => $this->input->post('keterangan'),
			'type_barang' => $this->input->post('tipe_barang'),
			'stok_minimal' => $this->input->post('stok_minimal'),
			'nama_toko' => $this->input->post('nama_toko'),
			// 'id_barangm' => $this->input->post('id_barang'),
		];

		if ($this->m_barang_mekanik->ubah($data, $komponen)) {
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('PurchasingMekanik/BarangMekanik/antropometri');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('PurchasingMekanik/BarangMekanik/antropometri');
		}
	}
	
	public function hapus($komponen){ 
		if($this->m_barang_mekanik->hapus($komponen)){
// 			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('PurchasingMekanik/BarangMekanik/antropometri');
		} else {
// 			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('PurchasingMekanik/BarangMekanik/antropometri');
		}
	}
	
}
