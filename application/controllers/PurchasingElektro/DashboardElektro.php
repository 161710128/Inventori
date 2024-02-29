<?php

class DashboardElektro extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'super' && $this->session->login['role'] != 'elektro'  && $this->session->login['role'] != 'mekanik'  && $this->session->login['role'] != 'supervisor') redirect();
		$this->data['aktif'] = 'DashboardElektro';
		$this->load->model('purchasingElektro/M_barang_elektro', 'm_barang_elektro'); 
		$this->load->model('purchasingElektro/M_pengeluaran_elektro', 'm_pengeluaran_elektro');
		$this->load->model('purchasingElektro/M_penerimaan_elektro', 'm_penerimaan_elektro'); 
		$this->load->model('purchasingElektro/M_InventarisElektro', 'm_inventariselektro');
		$this->load->model('purchasingElektro/M_PengambilanElektro', 'm_pengambilanelektro');
	} 

	public function index(){
		$this->data['title'] = 'Halaman Dashboard Elektro';
		$this->data['jumlah_barang'] = $this->m_barang_elektro->jumlah(); 
		$this->data['jumlah_pengeluaran'] = $this->m_pengeluaran_elektro->jumlah();
		$this->data['jumlah_penerimaan'] = $this->m_penerimaan_elektro->jumlah(); 
		$this->data['jumlah_inventaris'] = $this->m_inventariselektro->jumlah(); 
		$this->data['jumlah_pengambilan'] = $this->m_pengambilanelektro->jumlah();  
		$this->data['no'] = 1;
		$this->data['StokKurang'] = $this->m_barang_elektro->StokKurang(); 
		$this->data['title'] = "Data Barang yang Kurang dari 20"; 

		$this->load->view('purchasingElektro/dashboard/elektro', $this->data);
	} 
}