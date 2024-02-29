<?php
class PenerimaanInventaris_Mekanik extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->data['aktif'] = 'PenerimaanInventaris_Mekanik';
		$this->load->model('purchasingMekanik/M_BarangInventaris_Mekanik', 'm_baranginventaris_mekanik');
		$this->load->model('purchasingMekanik/M_PenerimaanMekanik_Inventaris', 'm_penerimaanmekanik_inventaris');
		$this->load->model('purchasingMekanik/M_DT_Mekanik_Inventaris', 'm_dt_mekanik_inventaris');
		$this->load->model('purchasingMekanik/M_barang_mekanik', 'm_barang_mekanik');

	}

	public function index(){
	    
     unset($_SESSION['errorStok']); 
		$this->data['title'] = 'Transaksi Penerimaan Mekanik';
		$this->data['titleHead'] = 'PenerimaanInventaris';
		$this->data['all_penerimaan'] = $this->m_penerimaanmekanik_inventaris->lihat();
		$this->data['no'] = 1;

		$this->load->view('purchasingMekanik/transaksiMasuk/barangInventaris/lihat', $this->data);
	}

	public function proses_tambah(){
	    
	    unset($_SESSION['errorStok']); 
	    
		$keyword = $this->input->post('tanggal_masuk'); 
		$timestamp = strtotime($keyword);
		$new_date_format = date('Y-m-d', $timestamp); 

		$countDuplicate = $this->m_penerimaanmekanik_inventaris->countDuplicate1($new_date_format); 

		if(empty($countDuplicate)){ 
			$data_terima = [
				'kode_transaksi' => $this->input->post('kode_transaksi'),
				'tanggal_masuk' => $new_date_format,
				// 'jam' => $this->input->post('jam_masuk'), 
				'nama_pengguna' => $this->input->post('nama_pengguna'),
			];  
				$this->m_penerimaanmekanik_inventaris->tambah($data_terima);
				redirect('PurchasingMekanik/PenerimaanInventaris_Mekanik'); 
		} else { 
			$this->session->set_flashdata('errorStok', 'Tanggal Sudah Ada !'); 
			redirect('PurchasingMekanik/PenerimaanInventaris_Mekanik/tambah');  
		} 
	    
	    
	    
	    
	    
	    
	    
	    
// 		$jumlah_barang_diterima = count($this->input->post('nama_barang_hidden'));
		
// 		$data_terima = [
// 			'kode_transaksi' => $this->input->post('kode_transaksi'),
// 			'tanggal_masuk' => $this->input->post('tanggal_masuk'),
// 			'jam_masuk' => $this->input->post('jam_masuk'), 
// 			'nama_pengguna' => $this->input->post('nama_pengguna'),
// 		];

// 		$data_detail_terima = [];

// 		for($i = 0; $i < $jumlah_barang_diterima; $i++){
// 			array_push($data_detail_terima, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
// 			$data_detail_terima[$i]['kode_part'] = $this->input->post('kode_part_hidden')[$i];
// 			$data_detail_terima[$i]['nama_barang'] = $this->input->post('nama_barang_hidden')[$i];
// 			$data_detail_terima[$i]['spesifikasi'] = $this->input->post('spesifikasi_hidden')[$i]; 
// 			$data_detail_terima[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
// 			$data_detail_terima[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
// 			$data_detail_terima[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i]; 
// 			$data_detail_terima[$i]['tanggal'] = $this->input->post('tanggal_masuk_hidden')[$i];
// 			$data_detail_terima[$i]['jam'] = $this->input->post('jam_masuk_hidden')[$i];
// 		}

// 		if($this->m_penerimaanmekanik_inventaris->tambah($data_terima) && $this->m_dt_mekanik_inventaris->tambah($data_detail_terima)){
// 			for ($i=0; $i < $jumlah_barang_diterima ; $i++) {
// 				$this->m_baranginventaris_mekanik->plus_stok($data_detail_terima[$i]['jumlah'], $data_detail_terima[$i]['kode_part']) or die('gagal min stok');
// 			}
// 			$this->session->set_flashdata('success', 'Invoice <strong>Pengeluaran</strong> Berhasil Dibuat!');
// 			redirect('PurchasingMekanik/PenerimaanInventaris_Mekanik');
// 		}
	}

	public function detail($kode_transaksi){
		$this->data['title'] = 'Detail Penerimaan';
		$this->data['penerimaan'] = $this->m_penerimaanmekanik_inventaris->lihat_no_terima($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_dt_mekanik_inventaris->lihat_no_terima($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('purchasingMekanik/transaksiMasuk/barangInventaris/detail', $this->data);
	}

	public function detailHapus($kode_komponen)
	{
		$this->data['title'] = 'Ubah HFNC';
		$this->data['titleHead'] = 'Ubah | Barang HFNC';
		$this->data['barang'] = $this->m_dt_mekanik_inventaris->lihat_id($kode_komponen);

		$this->load->view('purchasingMekanik/transaksiMasuk/barangInventaris/hapusDetail', $this->data);
	}

    public function proses_detailHapus()
    { 
        $id_detail = $this->input->post('id_detail');
        $total_stok = $this->input->post('jumlah');
        $kode_komponen = $this->input->post('kode_komponen');
 
        if ($this->m_dt_mekanik_inventaris->hapusDetail($id_detail)) {
            
            $this->m_baranginventaris_mekanik->min_stok($total_stok,$kode_komponen) or die('gagal min stok'); 
            redirect('PurchasingMekanik/PenerimaanInventaris_Mekanik');
        }
    }
	
	public function ubah($kode_transaksi){ 
		$this->data['title'] = 'Tambah Barang';
		$this->data['all_komponen'] = $this->m_baranginventaris_mekanik->lihat_stok_komponen();  
		$this->data['barang'] = $this->m_baranginventaris_mekanik->lihat_id1($kode_transaksi);

		$this->load->view('purchasingMekanik/transaksiMasuk/barangInventaris/tambahEdit', $this->data);
	}

	public function tambah(){
		$this->data['title'] = 'Tambah Transaksi';
		$this->data['titleHead'] = 'Tambah | Transaksi';
		$this->data['all_komponen'] = $this->m_baranginventaris_mekanik->lihat_stok_komponen(); 
		$dariDB = $this->m_penerimaanmekanik_inventaris->cekkodetransaksi(); 
		
		if(empty($dariDB)){
    		$kodeBarangSekarang = '001'; 
			$this->data['kode_transaksi'] = $kodeBarangSekarang;
		    $this->load->view('purchasingMekanik/transaksiMasuk/barangInventaris/tambah', $this->data);
		}else{
	        $nourut = substr($dariDB, 3, 4);
    		$kodeBarangSekarang = $nourut + 1;
    		$this->data['kode_transaksi'] = $kodeBarangSekarang;
    		$this->load->view('purchasingMekanik/transaksiMasuk/barangInventaris/tambah', $this->data);
		}
		
		
		
		
       
	}

	public function get_all_barang(){
		$data = $this->m_baranginventaris_mekanik->lihat_nama_barang($_POST['kode_part']);
		echo json_encode($data);
	}

	public function keranjang_barang(){
		$this->load->view('purchasingMekanik/transaksiMasuk/barangInventaris/keranjang');
	}

	public function proses_tambah1(){
		$jumlah_barang_diterima = count($this->input->post('nama_barang_hidden'));
		
		// $data_keluar = [
		// 	'kode_transaksi' => $this->input->post('kode_transaksi'),
		// 	'tanggal_keluar' => $this->input->post('tanggal_keluar'),
		// 	'jam_keluar' => $this->input->post('jam_keluar'), 
		// 	'nama_pengguna' => $this->input->post('nama_pengguna'),
		// ];

		$data_detail_terima = [];

		for($i = 0; $i < $jumlah_barang_diterima; $i++){
			array_push($data_detail_terima, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_terima[$i]['kode_part'] = $this->input->post('kode_part_hidden')[$i]; 
			$data_detail_terima[$i]['nama_barang'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_terima[$i]['spesifikasi'] = $this->input->post('spesifikasi_hidden')[$i];
			$data_detail_terima[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_terima[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_terima[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i];
			$data_detail_terima[$i]['tanggal'] = $this->input->post('tanggal_masuk_hidden')[$i];
 			$data_detail_terima[$i]['jam'] = $this->input->post('jam_masuk_hidden')[$i];
		}

		if($this->m_dt_mekanik_inventaris->tambah($data_detail_terima)){
			for ($i=0; $i < $jumlah_barang_diterima ; $i++) {
				// $this->m_baranginventaris_mekanik->plus_stok($data_detail_terima[$i]['jumlah'], $data_detail_terima[$i]['kode_part'], $data_detail_terima[$i]['id_barang']) or die('gagal min stok');
				$this->m_baranginventaris_mekanik->plus_stok($data_detail_terima[$i]['jumlah'], $data_detail_terima[$i]['kode_part']) or die('gagal min stok');
			}
			$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('PurchasingMekanik/PenerimaanInventaris_Mekanik');
		}
	}
	
	public function hapus($kode_transaksi){
		if($this->m_penerimaanmekanik_inventaris->hapus($kode_transaksi) && $this->m_dt_mekanik_inventaris->hapus($kode_transaksi)){
			$this->session->set_flashdata('success', 'Invoice Penerimaan <strong>Berhasil</strong> Dihapus!');
			redirect('PurchasingMekanik/PenerimaanInventaris_Mekanik');
		} else {
			$this->session->set_flashdata('error', 'Invoice Penerimaan <strong>Gagal</strong> Dihapus!');
			redirect('PurchasingMekanik/PenerimaanInventaris_Mekanik');
		}
	} 
}