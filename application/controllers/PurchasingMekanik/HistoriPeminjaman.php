<?php 
class HistoriPeminjaman extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'super' && $this->session->login['role'] != 'mekanik') redirect();
		$this->data['aktif'] = 'HistoriPeminjaman';
		$this->load->model('purchasingMekanik/M_HistoriPrint', 'm_histori_print'); 
	}

// 	public function index(){
// 		$this->data['title'] = 'Data Histori Print';
// 		$this->data['titleHead'] = 'Mekanik | HistoriPrint';
// 		$this->data['all_barang'] = $this->m_histori_print->lihat(); 
// 		$this->data['no'] = 1;

// 		$this->load->view('purchasingMekanik/inventaris/historiPeminjaman/lihat', $this->data);
// 	} 


	public function index(){
		$tanggalMulai = $this->input->post('tanggalMulai');
		$tanggalSelesai = $this->input->post('tanggalSelesai');

		$this->data['title'] = 'Data Histori Print';
		$this->data['titleHead'] = 'Mekanik | HistoriPrint';
		$this->data['no'] = 1;

		if ($tanggalMulai && $tanggalSelesai) {
			$this->data['all_barang'] = $this->m_histori_print->filterByDate($tanggalMulai, $tanggalSelesai);
		} else {
			$this->data['all_barang'] = $this->m_histori_print->lihat();
		}

		$this->load->view('purchasingMekanik/inventaris/historiPeminjaman/lihat', $this->data);
	}

	
}