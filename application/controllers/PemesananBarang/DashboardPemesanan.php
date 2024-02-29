<?php

class DashboardPemesanan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'super' && $this->session->login['role'] != 'pemesanan'  && $this->session->login['role'] != 'gudang_bahan_tools') redirect();
		$this->data['aktif'] = 'DashboardPemesanan';  
		$this->load->model('pemesanan/M_Master', 'm_master');  
		$this->load->model('pemesanan/M_MasterNon', 'm_master1');  
	} 

	public function index(){
		$this->data['title'] = 'Halaman Dashboard';

		$this->data['jumlah_barang'] = $this->m_master->jumlahEkatalog(); 

		$this->data['jumlah_inventaris'] = $this->m_master1->jumlahNone(); 
   
		$this->data['no'] = 1; 
		$this->data['title'] = "Data Barang yang Kurang dari 20"; 

		$this->load->view('pemesananBarang/pemesananDashboard', $this->data);
	} 
}