<?php

class DashboardPacking extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'super' && $this->session->login['role'] != 'packing' && $this->session->login['role'] != 'supervisor') redirect();
		$this->data['aktif'] = 'DashboardPacking';  
		$this->load->model('qualityControl/M_Master', 'm_master'); 
		$this->load->model('qualityControl/M_StokAlat', 'm_stok_alat');
	} 

	public function index(){
		$this->data['title'] = 'Halaman Dashboard';

		$this->data['jumlah_barang'] = $this->m_master->jumlahAlat(); 

		$this->data['jumlah_inventaris'] = $this->m_stok_alat->jumlahMasuk(); 

		$this->data['jumlah_penerimaan'] = $this->m_stok_alat->jumlahDetailMasuk();   
		$this->data['no'] = 1; 
		$this->data['title'] = "Data Barang yang Kurang dari 20"; 

		$this->load->view('packing/dashboard/packing', $this->data);
	} 
}