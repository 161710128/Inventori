<?php 
class Histori_SisaBahan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'super' && $this->session->login['role'] != 'mekanik') redirect();
		$this->data['aktif'] = 'Histori_SisaBahan';
		$this->load->model('purchasingMekanik/M_SisaBahan', 'm_sisa_bahan');
		$this->load->model('purchasingMekanik/M_barang_mekanik', 'm_barang_mekanik');
		$this->load->model('purchasingMekanik/M_pengeluaran_mekanik', 'm_pengeluaran_mekanik');


	}

	public function index(){
		$this->data['title'] = 'Histori Sisa Barang'; 
		$this->data['titleHead'] = 'Histori | SisaBarang';
		$this->data['all_barang'] = $this->m_sisa_bahan->lihatAll(); 
		$this->data['no'] = 1;

		$this->load->view('purchasingMekanik/barangSisa/historiSisaBahan/lihat', $this->data); 
	} 

	 
}