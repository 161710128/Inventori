<?php
class DashboardMekanik extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'mekanik' && $this->session->login['role'] != 'super'  && $this->session->login['role'] != 'supervisor') redirect(); 

		$this->data['aktif'] = 'DashboardMekanik';
		$this->load->model('purchasingMekanik/M_barang_mekanik', 'm_barang_mekanik'); 
		$this->load->model('purchasingMekanik/M_pengeluaran_mekanik', 'm_pengeluaran_mekanik');
		$this->load->model('purchasingMekanik/M_penerimaan_mekanik', 'm_penerimaan_mekanik');
		$this->load->model('purchasingMekanik/M_Inventaris_Mekanik', 'm_inventaris_mekanik');
		$this->load->model('purchasingMekanik/M_PenerimaanMekanik_Inventaris', 'm_penerimaanmekanik_inventaris');
		$this->load->model('M_pengguna', 'm_pengguna'); 
	}
 
	public function index(){
		$this->data['title'] = 'Halaman Dashboard Mekanik';
		$this->data['jumlah_barang'] = $this->m_barang_mekanik->jumlah(); 
		$this->data['jumlah_inventaris'] = $this->m_inventaris_mekanik->jumlahInventarisMasuk(); 
		$this->data['jumlah_penerimaan'] = $this->m_penerimaan_mekanik->jumlah(); 
		$this->data['jumlah_penerimaan_inventaris'] = $this->m_penerimaanmekanik_inventaris->jumlah();  
		$this->data['jumlah_pengeluaran'] = $this->m_pengeluaran_mekanik->jumlah();
		$this->data['jumlah_pengeluaran_inventaris'] = $this->m_inventaris_mekanik->jumlahInventarisKeluar(); 
		$this->data['no'] = 1;  
		
         $tanggalSekarang = date('y/m/d');
        $this->data['tanggalSekarang'] = $tanggalSekarang;
		
		$this->data['StokKurang'] = $this->m_barang_mekanik->All(); 


		$this->load->view('purchasingMekanik/dashboard/mekanik', $this->data); 
	}  

}