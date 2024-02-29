<?php
class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'mekanik' && $this->session->login['role'] != 'super'  && $this->session->login['role'] != 'supervisor') redirect(); 

		$this->data['aktif'] = 'DashboardMekanik';
		$this->load->model('gudangBahan/M_gudangbahan_rm', 'm_gudangbahan_rm');
	}
 
	public function index(){
		$this->data['title'] = 'Halaman Dashboard';	
		$this->data['StokKurang'] = $this->m_gudangbahan_rm->dashboard(); 
		$this->data['no'] = 1;  


		$this->load->view('gudangbahan_rm/dashboard', $this->data); 
	}  

}