<?php

class DashboardProduksi extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'super' && $this->session->login['role'] != 'produksi' && $this->session->login['role'] != 'supervisor') redirect();
		$this->data['aktif'] = 'DashboardProduksi';
		$this->load->model('purchasingElektro/M_barang_elektro', 'm_barang_elektro'); 
		$this->load->model('purchasingElektro/M_pengeluaran_elektro', 'm_pengeluaran_elektro');
		$this->load->model('purchasingElektro/M_penerimaan_elektro', 'm_penerimaan_elektro'); 
		$this->load->model('purchasingElektro/M_InventarisElektro', 'm_inventariselektro');
		$this->load->model('purchasingElektro/M_PengambilanElektro', 'm_pengambilanelektro');
		$this->load->model('produksi/M_Master', 'm_master');
		$this->load->model('produksi/M_HasilKerja', 'm_hasil_kerja');
		$this->load->model('produksi/M_StokAlat', 'm_stok_alat');
	} 

	public function index(){
		$this->data['title'] = 'Halaman Dashboard Elektro';
		$this->data['jumlah_barang'] = $this->m_master->jumlahProgress(); 
		$this->data['jumlah_inventaris'] = $this->m_master->jumlahAlat();

		$this->data['jumlah_penerimaan'] = $this->m_hasil_kerja->jumlahProgresss();  
		$this->data['jumlah_pengambilan'] = $this->m_stok_alat->jumlahAlatt();  
		$this->data['no'] = 1; 
		$this->data['title'] = "Data Barang yang Kurang dari 20"; 

		$this->load->view('produksi/dashboard/produksi', $this->data);
	} 
}