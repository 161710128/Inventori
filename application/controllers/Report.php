<?php

use Dompdf\Dompdf;

class Report extends CI_Controller{ 
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->data['aktif'] = 'PengambilanElektro';
		$this->load->model('M_Report', 'm_report'); 
	}

	public function mingguan(){
		$this->data['title'] = 'Report Barang Mingguan';
		$this->data['report'] = $this->m_report->cek_minggu();
		$this->data['no'] = 1;

		$this->load->view('Report/ReportMingguan/tampil', $this->data);
	} 

	public function bulanan(){
		$this->data['title'] = 'Report Barang Bulanan';
		$this->data['report'] = $this->m_report->cek_bulan();
		$this->data['no'] = 1;

		$this->load->view('Report/ReportBulanan/tampil', $this->data);
	} 

	public function exportMingguan(){ 
		$this->data['report'] = $this->m_report->cek_minggu();
		$this->data['title'] = 'Report Barang Mingguan';
		$this->data['no'] = 1; 
		$this->load->library('pdfgenerator');
        
        // title dari pdf
        $this->data['title_pdf'] = 'Report Barang Mingguan';
        
        // filename dari pdf ketika didownload
		$file_pdf = 'Report Barang Mingguan';
		
        // setting paper
		$paper = 'A4';
		
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('Report/ReportMingguan/report',$this->data, true); 

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
	} 

	public function exportBulanan(){ 
		$this->data['report'] = $this->m_report->cek_bulan();
		$this->data['title'] = 'Report Barang Bulanan';
		$this->data['no'] = 1; 
		$this->load->library('pdfgenerator');
        
        // title dari pdf
        $this->data['title_pdf'] = 'Report Barang Bulanan';
        
        // filename dari pdf ketika didownload
		$file_pdf = 'Report Barang Bulanan';
		
        // setting paper
		$paper = 'A4';
		
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('Report/ReportBulanan/report',$this->data, true); 

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
	} 
}