<?php 
class StokAlat extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta'); 
		$this->data['aktif'] = 'StokAlat';
		$this->load->model('produksi/M_StokAlat', 'm_stok_alat');   
		$this->load->model('purchasingElektro/M_barang_elektro', 'm_barang_elektro'); 
		$this->load->model('purchasingElektro/M_penerimaan_elektro', 'm_penerimaan_elektro');
		$this->load->model('purchasingElektro/M_DetailTerima_Elektro', 'm_detail_terima');
	
	}

	public function index(){
	    unset($_SESSION['errorStok']); 
	    
		$this->data['title'] = 'Stok Alat';
		$this->data['all_penerimaan'] = $this->m_stok_alat->lihat();
		$this->data['no'] = 1; 
		
		$this->load->view('produksi/hasilKerja/stokAlat/lihat', $this->data);
	}

	public function tambah(){ 
	    
		//unset($_SESSION['errorStok']);
		$this->data['title'] = 'Transaksi Alat';
		$this->data['titleHead'] = 'Tambah | Produksi';
		$this->data['all_barangHFNC'] = $this->m_stok_alat->stok_alat(); 
		$dariDB = $this->m_stok_alat->cekkodetransaksi();  
		
		
		if(empty($dariDB)){
    		$kodeBarangSekarang = '001'; 
    		$this->data['kode_transaksi'] = $kodeBarangSekarang;
    		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
    		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
    		$this->load->view('produksi/hasilKerja/stokAlat/tambah_alat', $this->data);
		}else{
	        $dariDB = $this->m_stok_alat->cekkodetransaksi();
	        $nourut = substr($dariDB, 2, 4);
    		$kodeBarangSekarang = $nourut + 1;
    		$this->data['kode_transaksi'] = $kodeBarangSekarang;
    		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
    		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
    		$this->load->view('produksi/hasilKerja/stokAlat/tambah_alat', $this->data);
		}
		
		
		
		
		
		
		
		
		
		//$nourut = substr($dariDB, 2, 4);
		//$kodeBarangSekarang = $nourut + 1;
		//$this->data['kode_transaksi'] = $kodeBarangSekarang;
		//$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		//$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		//$this->load->view('produksi/hasilKerja/stokAlat/tambah_alat', $this->data);
			
	}

	public function get_all_barang(){
		$data = $this->m_stok_alat->lihat_nama_barang($_POST['kode_alat']);
		echo json_encode($data);
	}

	public function catatan()
	{
		// $this->data['kode_transaksi'] = $this->m_stok_alat->lihat_no_transaksi($kode_transaksi);
		// Check if the request is an AJAX request
		if ($this->input->is_ajax_request()) {
			// Get the values from the AJAX POST data
			
			// $kode_transaksi  =  $this->m_stok_alat->lihat_no_transaksi($kode_transaksi);
			$kode_transaksi = $this->input->post('kode_transaksi');
			$catatan_mekanik = $this->input->post('catatan_mekanik');
			$catatan_elektro = $this->input->post('catatan_elektro');
			
			// Assuming you have a database table to store these values, adjust this part accordingly
			// Example using CodeIgniter's Query Builder to insert data into a table named 'catatan_table'
			$data = array(
				'kode_transaksi' => $kode_transaksi,
				'catatan_mekanik' => $catatan_mekanik,
				'catatan_elektro' => $catatan_elektro
			);
			// Assuming you have already loaded the database library in your CodeIgniter project
			if($this->m_stok_alat->tambah_catatan($data)){
					$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
					// redirect('Produksi/StokAlat/detail');
				} else {
					$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
					// redirect('Produksi/StokAlat/detail');
				}
	
			// Send the response back to the AJAX request
			// You can send any relevant data as a response if needed
			$response = array('status' => 'success', 'message' => 'Data saved successfully.');
			echo json_encode($response);
		} else {
			// If it's not an AJAX request, handle the error accordingly
			show_error('Invalid request.', 400);
		}
	}

	public function tampilCatatan($kode_transaksi){
		
		$this->data['lihat_catatan'] = $this->m_stok_alat->lihat_catatan($kode_transaksi);
		
		$this->load->view('produksi/hasilKerja/stokAlat/detail', $this->data);
	}

	// public function proses_ubahCatatan(){ 

	// 	// $data = [ 
	// 	// 	'catatan_mekanik' => $this->input->post('catatan_mekanik'),
	// 	// 	'catatan_elektro' => $this->input->post('catatan_elektro'), 
	// 	// ];

	// 	// if($this->m_stok_alat->ubahCatatan($data, $kode_transaksi)){
	// 	// 	$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
	// 	// 	// redirect('Produksi/MasterStokAlat');
	// 	// } else {
	// 	// 	$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
	// 	// 	// redirect('Produksi/MasterStokAlat');
	// 	// }

	// 	if ($this->input->is_ajax_request()) {
	// 		// Get the values from the AJAX POST data
			
	// 		// $kode_transaksi  =  $this->m_stok_alat->lihat_no_transaksi($kode_transaksi);
	// 		$kode_transaksi = $this->input->post('kode_transaksi');
	// 		$catatan_mekanik = $this->input->post('catatan_mekanik');
	// 		$catatan_elektro = $this->input->post('catatan_elektro');
			
	// 		// Assuming you have a database table to store these values, adjust this part accordingly
	// 		// Example using CodeIgniter's Query Builder to insert data into a table named 'catatan_table'
	// 		$data = array(
	// 			'kode_transaksi' => $kode_transaksi,
	// 			'catatan_mekanik' => $catatan_mekanik,
	// 			'catatan_elektro' => $catatan_elektro
	// 		);
	// 		// Assuming you have already loaded the database library in your CodeIgniter project
	// 		if($this->m_stok_alat->ubahCatatan($data)){
	// 				$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
	// 				// redirect('Produksi/StokAlat/detail');
	// 			} else {
	// 				$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
	// 				// redirect('Produksi/StokAlat/detail');
	// 			}
	
	// 		// Send the response back to the AJAX request
	// 		// You can send any relevant data as a response if needed
	// 		$response = array('status' => 'success', 'message' => 'Data saved successfully.');
	// 		echo json_encode($response);
	// 	} else {
	// 		// If it's not an AJAX request, handle the error accordingly
	// 		show_error('Invalid request.', 400);
	// 	}
	// }

	public function proses_ubahCatatan(){ 

		if ($this->input->is_ajax_request()) {
			// Get the values from the AJAX POST data
			
			// $kode_transaksi  =  $this->m_stok_alat->lihat_no_transaksi($kode_transaksi);
			$kode_transaksi = $this->input->post('kode_transaksi');
			$catatan_mekanik = $this->input->post('catatan_mekanik');
			$catatan_elektro = $this->input->post('catatan_elektro');
			
			// Assuming you have a database table to store these values, adjust this part accordingly
			// Example using CodeIgniter's Query Builder to insert data into a table named 'catatan_table'
			$data = array(
				'kode_transaksi' => $kode_transaksi,
				'catatan_mekanik' => $catatan_mekanik,
				'catatan_elektro' => $catatan_elektro
			);
			// Assuming you have already loaded the database library in your CodeIgniter project
			if($this->m_stok_alat->ubahCatatan($data, $kode_transaksi)){
					$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
					// redirect('Produksi/StokAlat/detail');
				} else {
					$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
					// redirect('Produksi/StokAlat/detail');
				}
	
			// Send the response back to the AJAX request
			// You can send any relevant data as a response if needed
			$response = array('status' => 'success', 'message' => 'Data saved successfully.');
			echo json_encode($response);
		} else {
			// If it's not an AJAX request, handle the error accordingly
			show_error('Invalid request.', 400);
		}
	}

	public function keranjang_barang(){
		$this->load->view('produksi/hasilKerja/stokAlat/keranjang');
	} 
	

	public function proses_tambah(){
	    unset($_SESSION['errorStok']); 
	    
		$keyword = $this->input->post('tanggal_masuk');
		$timestamp = strtotime($keyword);
		$new_date_format = date('Y-d-m', $timestamp); 
		
		
		$countDuplicate = $this->m_stok_alat->countDuplicate1($new_date_format);
		
		 
	
		
		if(empty($countDuplicate)){
			//$jumlah_barang_diterima = count($this->input->post('nama_alat_hidden')); 
			$data_terima = [
				'kode_transaksi' => $this->input->post('kode_transaksi'),
				'tanggal' => $new_date_format,
				'jam' => $this->input->post('jam_masuk'), 
				'nama_pengguna' => $this->input->post('nama_pengguna'),
			];  
				$this->m_stok_alat->tambah($data_terima);
				redirect('Produksi/StokAlat');
			  
		} else {

			$this->session->set_flashdata('errorStok', 'Tanggal Sudah Ada !');
			
			//$this->data['title'] = 'Tambah Transaksi Alat';
			//$this->data['titleHead'] = 'Tambah | Produksi';
			//$this->data['all_barangHFNC'] = $this->m_stok_alat->stok_alat(); 
	
			//$dariDB = $this->m_stok_alat->cekkodetransaksi();  
		//	$nourut = substr($dariDB, 2, 4);
			//$kodeBarangSekarang = $nourut + 1;
			//$this->data['kode_transaksi'] = $kodeBarangSekarang;
			//$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
			//$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
			//$this->load->view('produksi/hasilKerja/stokAlat/tambah_alat', $this->data);
			
			redirect('Produksi/StokAlat/tambah'); 


		}

		// $jumlah_barang_diterima = count($this->input->post('nama_alat_hidden')); 

		// $data_terima = [
		// 	'kode_transaksi' => $this->input->post('kode_transaksi'),
		// 	'tanggal' => $this->input->post('tanggal_masuk'),
		// 	'jam' => $this->input->post('jam_masuk'), 
		// 	'nama_pengguna' => $this->input->post('nama_pengguna'),
		// ];

		// $data_detail_terima = [];

		// for($i = 0; $i < $jumlah_barang_diterima; $i++){
		// 	array_push($data_detail_terima, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
		// 	$data_detail_terima[$i]['kode_alat'] = $this->input->post('kode_alat_hidden')[$i];
		// 	$data_detail_terima[$i]['nama_alat'] = $this->input->post('nama_alat_hidden')[$i];
		// 	$data_detail_terima[$i]['status_alat'] = $this->input->post('status_alat_hidden')[$i];
		// 	$data_detail_terima[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i];
		// 	$data_detail_terima[$i]['jumlah_assy'] = $this->input->post('jumlah_hidden')[$i];
		// 	$data_detail_terima[$i]['nama_shift'] = $this->input->post('nama_shift_hidden')[$i];

		// 	// $data_detail_terima[$i]['rijek'] = $this->input->post('jumlah_rijek_hidden')[$i];
		// 	// $data_detail_terima[$i]['nama_shift'] = $this->input->post('nama_shift_hidden')[$i];
		// 	// $data_detail_terima[$i]['catatan'] = $this->input->post('catatan_hidden')[$i];
		// 	// $data_detail_terima[$i]['id_barang'] = $this->input->post('id_barang_hidden')[$i];
		// }

		// if($this->m_stok_alat->tambah($data_terima) && $this->m_stok_alat->tambahDetail($data_detail_terima)){
		// 	for ($i=0; $i < $jumlah_barang_diterima ; $i++) { 
		// 		$this->m_stok_alat->plus_stok($data_detail_terima[$i]['jumlah_assy'], $data_detail_terima[$i]['kode_alat']) or die('gagal min stok');
		// 	}
		// 	$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
		// 	redirect('Produksi/StokAlat');
		// }
	}

	public function detail($kode_transaksi){
		$this->data['title'] = 'Detail Alat';
		$this->data['titleHead'] = 'Stok Alat';
		$this->data['penerimaan'] = $this->m_stok_alat->lihat_no_terima($kode_transaksi);
		$this->data['lihat_catatan'] = $this->m_stok_alat->lihat_catatan($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_stok_alat->lihat_no_terima_detail($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('produksi/hasilKerja/stokAlat/detail', $this->data);
	}

	public function tambahEdit($kode_transaksi){    

		$this->data['title'] = 'Tambah Alat';
		$this->data['titleHead'] = 'Tambah | Produksi';
		$this->data['all_barangHFNC'] = $this->m_stok_alat->stok_alat(); 
		$this->data['barang'] = $this->m_stok_alat->lihat_id1($kode_transaksi);
		$dariDB = $this->m_stok_alat->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();

		$this->load->view('produksi/hasilKerja/stokAlat/tambahEdit', $this->data);
	}

	public function proses_tambahEdit(){  
		$jumlah_barang_diterima = count($this->input->post('nama_alat_hidden'));
		$data_detail_terima = [];

		for($i = 0; $i < $jumlah_barang_diterima; $i++){
			array_push($data_detail_terima, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_terima[$i]['kode_alat'] = $this->input->post('kode_alat_hidden')[$i];
			$data_detail_terima[$i]['nama_alat'] = $this->input->post('nama_alat_hidden')[$i];
			$data_detail_terima[$i]['status_alat'] = $this->input->post('status_alat_hidden')[$i];
			$data_detail_terima[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i];
			$data_detail_terima[$i]['jumlah_assy'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_terima[$i]['nama_shift'] = $this->input->post('nama_shift_hidden')[$i]; 
		}

		if($this->m_stok_alat->tambahDetail($data_detail_terima)){
			for ($i=0; $i < $jumlah_barang_diterima ; $i++) { 
				$this->m_stok_alat->plus_stok($data_detail_terima[$i]['jumlah_assy'], $data_detail_terima[$i]['kode_alat']) or die('gagal min stok');
			}
			// $this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('Produksi/StokAlat');
		}
	}

	public function detailHapus($kode_komponen)
	{
		$this->data['title'] = 'Hapus Barang';
		$this->data['titleHead'] = 'Detail | Hapus Barang';
		$this->data['barang'] = $this->m_stok_alat->lihat_id($kode_komponen);

		$this->load->view('produksi/hasilKerja/StokAlat/hapusDetail', $this->data);
	}

	public function proses_detailHapus()
    { 
        $id_detail = $this->input->post('id_detail');
        $total_stok = $this->input->post('jumlah_assy');
        $kode_komponen = $this->input->post('kode_alat');
 
        if ($this->m_stok_alat->hapusDetail($id_detail)) {
            
            $this->m_stok_alat->min_stok($total_stok,$kode_komponen) or die('gagal min stok'); 
            redirect('Produksi/StokAlat');
        }
    }






















	

	public function detail_standingWeight($kode_transaksi){
		$this->data['title'] = 'Detail Penerimaan';
		$this->data['penerimaan'] = $this->m_hasilkerja->lihat_no_terima($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_hasilkerja->detail_standingWeight($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('Produksi/hasilKerja/kemajuanProduksi/detail', $this->data);
	}

	public function detail_babyScale($kode_transaksi){
		$this->data['title'] = 'Detail Penerimaan';
		$this->data['penerimaan'] = $this->m_hasilkerja->lihat_no_terima($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_hasilkerja->detail_babyScale($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('Produksi/hasilKerja/kemajuanProduksi/detail', $this->data);
	}

	public function detail_stadioMeter($kode_transaksi){
		$this->data['title'] = 'Detail Penerimaan';
		$this->data['penerimaan'] = $this->m_hasilkerja->lihat_no_terima($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_hasilkerja->detail_stadioMeter($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('Produksi/hasilKerja/kemajuanProduksi/detail', $this->data);
	}

	public function detail_infantoMeter($kode_transaksi){
		$this->data['title'] = 'Detail Penerimaan';
		$this->data['penerimaan'] = $this->m_hasilkerja->lihat_no_terima($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_hasilkerja->detail_infantoMeter($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('Produksi/hasilKerja/kemajuanProduksi/detail', $this->data);
	}

	public function detail_lila($kode_transaksi){
		$this->data['title'] = 'Detail Penerimaan';
		$this->data['penerimaan'] = $this->m_hasilkerja->lihat_no_terima($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_hasilkerja->detail_lila($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('Produksi/hasilKerja/kemajuanProduksi/detail', $this->data);
	}


	// public function hapus_detail($id_detailmasuk){
	// 	if($this->m_hasilkerja->hapus($id_detailmasuk)){
	// 		$this->session->set_flashdata('success', 'Invoice Penerimaan <strong>Berhasil</strong> Dihapus!');
	// 		redirect('Produksi/KemajuanProduksi/detail');
	// 	} else {
	// 		$this->session->set_flashdata('error', 'Invoice Penerimaan <strong>Gagal</strong> Dihapus!');
	// 		redirect('Produksi/KemajuanProduksi/detail');
	// 	}
	// }

	

	public function ubah($kode_transaksi){ 
		$this->data['title'] = 'Tambah Barang'; 
		$this->data['barang'] = $this->m_hasilkerja->lihat_id1($kode_transaksi);

		$this->load->view('produksi/hasilKerja/kemajuanProduksi/TambahEdit', $this->data);
	}

	

	public function tambahEdit_babyScale($kode_transaksi){   
		$this->data['title'] = 'Tambah Transaksi Baby Scale';
		$this->data['titleHead'] = 'Tambah | Produksi';
		$this->data['all_barangHFNC'] = $this->m_hasilkerja->Stok_timbanganBayi(); 
		$this->data['barang'] = $this->m_hasilkerja->lihat_id1($kode_transaksi);
		$dariDB = $this->m_hasilkerja->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();

		$this->load->view('produksi/hasilKerja/kemajuanProduksi/TambahEdit_babyScale', $this->data);
	}

	public function tambahEdit_stadioMeter($kode_transaksi){   
		$this->data['title'] = 'Tambah Transaksi Stadio Meter';
		$this->data['titleHead'] = 'Tambah | Produksi';
		$this->data['all_barangHFNC'] = $this->m_hasilkerja->Stok_stadioMeter(); 
		$this->data['barang'] = $this->m_hasilkerja->lihat_id1($kode_transaksi);
		$dariDB = $this->m_hasilkerja->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();

		$this->load->view('produksi/hasilKerja/kemajuanProduksi/TambahEdit_stadioMeter', $this->data);
	}

	public function tambahEdit_infantoMeter($kode_transaksi){   
		$this->data['title'] = 'Tambah Transaksi Infanto Meter';
		$this->data['titleHead'] = 'Tambah | Produksi';
		$this->data['all_barangHFNC'] = $this->m_hasilkerja->Stok_infantoMeter(); 
		$this->data['barang'] = $this->m_hasilkerja->lihat_id1($kode_transaksi);
		$dariDB = $this->m_hasilkerja->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();

		$this->load->view('produksi/hasilKerja/kemajuanProduksi/TambahEdit_infantoMeter', $this->data);
	}

	public function tambahEdit_lila($kode_transaksi){   
		$this->data['title'] = 'Tambah Transaksi Lila';
		$this->data['titleHead'] = 'Tambah | Produksi';
		$this->data['all_barangHFNC'] = $this->m_hasilkerja->Stok_lila(); 
		$this->data['barang'] = $this->m_hasilkerja->lihat_id1($kode_transaksi);
		$dariDB = $this->m_hasilkerja->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();

		$this->load->view('produksi/hasilKerja/kemajuanProduksi/TambahEdit_lila', $this->data);
	}

	





























	public function tambahTransaksi(){
		$this->data['title'] = 'Tambah Transaksi';
		$this->data['titleHead'] = 'Tambah | Elektro';
		$this->data['all_komponen'] = $this->m_barang_elektro->lihat_stok_komponen(); 
		$dariDB = $this->m_penerimaan_elektro->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang; 
		$this->load->view('purchasingElektro/transaksiMasuk/tambahData/tambahTransaksi', $this->data);
	}

	

	
	// public function tambahEdit($kode_transaksi){ 
	// 	$this->data['title'] = 'Tambah Barang'; 
	// 	$this->data['titleHead'] = 'Tambah | Barang';
	// 	$this->data['all_komponen'] = $this->m_barang_elektro->lihat_stok_komponen(); 
	// 	$this->data['all_komponen_hfnc'] = $this->m_barang_elektro->lihat_stok_komponen_Hfnc(); 

	// 	$this->data['all_komponen1'] = $this->m_barang_elektro->getNamaBarang();  
	// 	$this->data['barang'] = $this->m_barang_elektro->lihat_id1($kode_transaksi);

	// 	$this->data['all_penerimaan'] = $this->m_penerimaan_elektro->lihat();


	// 	$this->load->view('purchasingElektro/transaksiMasuk/tambahEdit/TambahEdit', $this->data);
	// }

	public function tambahUbah_Hfnc($kode_transaksi){  
		$this->data['title'] = 'Tambah Barang HFNC';
		$this->data['titleHead'] = 'TambahBarang | HFNC ';
		$this->data['all_komponen'] = $this->m_barang_elektro->lihat_stok_komponen_Hfnc();  
		$this->data['all_komponen1'] = $this->m_barang_elektro->getNamaBarang();  
		$this->data['barang'] = $this->m_barang_elektro->lihat_id1($kode_transaksi);

		$this->load->view('purchasingElektro/transaksiMasuk/tambahEdit/TambahEdit_hfnc', $this->data);
	}

	public function tambahUbah_Antropometri($kode_transaksi){ 
		$this->data['title'] = 'Tambah Barang Antropometri';
		$this->data['titleHead'] = 'TambahBarang | Antropometri';
		$this->data['all_komponen'] = $this->m_barang_elektro->lihat_stok_komponen_Antropometri();  
		$this->data['all_komponen1'] = $this->m_barang_elektro->getNamaBarang();  
		$this->data['barang'] = $this->m_barang_elektro->lihat_id1($kode_transaksi);

		$this->load->view('purchasingElektro/transaksiMasuk/tambahEdit/TambahEdit_antropometri', $this->data);
	}

	public function tambahUbah_TimbanganDewasa($kode_transaksi){ 
		$this->data['title'] = 'Tambah Barang Timbangan Dewasa';
		$this->data['titleHead'] = 'Tambah | Timbangan Dewasa';
		$this->data['all_komponen'] = $this->m_barang_elektro->lihatStokKomponen_timbanganDewasa();  
		$this->data['all_komponen1'] = $this->m_barang_elektro->getNamaBarang();  
		$this->data['barang'] = $this->m_barang_elektro->lihat_id1($kode_transaksi);

		$this->load->view('purchasingElektro/transaksiMasuk/tambahEdit/TambahEdit_TimbanganDewasa', $this->data);
	}

	public function tambahUbah_TimbanganBayi($kode_transaksi){ 
		$this->data['title'] = 'Tambah Barang Timbangan Bayi';
		$this->data['titleHead'] = 'Tambah | Timbangan Bayi';
		$this->data['all_komponen'] = $this->m_barang_elektro->lihatStokKomponen_timbanganBayi();  
		$this->data['all_komponen1'] = $this->m_barang_elektro->getNamaBarang();  
		$this->data['barang'] = $this->m_barang_elektro->lihat_id1($kode_transaksi);

		$this->load->view('purchasingElektro/transaksiMasuk/tambahEdit/TambahEdit_TimbanganBayi', $this->data);
	}

	
	
	// public function tambahHfnc(){
	// 	$this->data['title'] = 'Tambah Transaksi HFNC';
	// 	$this->data['titleHead'] = 'Tambah | Elektro';
	// 	$this->data['all_barangHFNC'] = $this->m_barang_elektro->Stok_Hfnc(); 
	// 	$dariDB = $this->m_penerimaan_elektro->cekkodetransaksi(); 
    //     $nourut = substr($dariDB, 2, 4);
	// 	$kodeBarangSekarang = $nourut + 1;
	// 	$this->data['kode_transaksi'] = $kodeBarangSekarang;
	// 	$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
	// 	$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
	// 	$this->load->view('purchasingElektro/transaksiMasuk/tambahData/tambah_hfnc', $this->data);
	// }

	public function tambahAntropometri(){
		$this->data['title'] = 'Tambah Transaksi Antropometri';
		$this->data['titleHead'] = 'Tambah | Antropometri';
		$this->data['all_barangAntropometri'] = $this->m_barang_elektro->Stok_Antropometri(); 
		$dariDB = $this->m_penerimaan_elektro->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		
		$this->load->view('purchasingElektro/transaksiMasuk/tambahData/tambah_antropometri', $this->data);
	}

	public function tambahTimbanganDewasa(){
		$this->data['title'] = 'Tambah Transaksi Timbangan Dewasa';
		$this->data['titleHead'] = 'Tambah | Timbangan Dewasa';
		$this->data['all_barangAntropometri'] = $this->m_barang_elektro->Stok_Antropometri(); 
		$dariDB = $this->m_penerimaan_elektro->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->all_timbanganDewasa();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->load->view('purchasingElektro/transaksiMasuk/tambahData/tambah_timbanganDewasa', $this->data);
	}

	public function tambahTimbanganBayi(){
		$this->data['title'] = 'Tambah Transaksi Timbangan Bayi';
		$this->data['titleHead'] = 'Tambah | Timbangan Bayi';
		$this->data['all_barangAntropometri'] = $this->m_barang_elektro->Stok_Antropometri(); 
		$dariDB = $this->m_penerimaan_elektro->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->all_timbanganBayi();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->load->view('purchasingElektro/transaksiMasuk/tambahData/tambah_timbanganBayi', $this->data);
	}

	

	public function proses_tambahTimbanganDewasa(){
		$jumlah_barang_diterima = count($this->input->post('nama_barang_hidden'));
		
		$data_terima = [
			'kode_transaksi' => $this->input->post('kode_transaksi'),
			'tanggal_masuk' => $this->input->post('tanggal_masuk'),
			'jam_masuk' => $this->input->post('jam_masuk'), 
			'nama_pengguna' => $this->input->post('nama_pengguna'), 
		];

		$data_detail_terima = [];

		for($i = 0; $i < $jumlah_barang_diterima; $i++){
			array_push($data_detail_terima, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_terima[$i]['kode_komponen'] = $this->input->post('kode_barang_hidden')[$i];
			$data_detail_terima[$i]['nama_komponen'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_terima[$i]['id_barang'] = $this->input->post('id_barang_hidden')[$i];
			$data_detail_terima[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_terima[$i]['stok_alat'] = $this->input->post('stok_alat_hidden')[$i];
			$data_detail_terima[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_terima[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i];
		} 
 
		// $nama_komponen = 'Batre AAA'; 
		// $id_barang = 8 ; 

		if($this->m_penerimaan_elektro->tambah($data_terima) && $this->m_detail_terima->tambah($data_detail_terima)){
			for ($i=0; $i < $jumlah_barang_diterima ; $i++) {
				$this->m_barang_elektro->plus_stok($data_detail_terima[$i]['jumlah'], $data_detail_terima[$i]['kode_komponen'], $data_detail_terima[$i]['id_barang']) or die('gagal min stok');
				// $this->m_barang_elektro->plus_stokTimbanganDewasa($data_detail_terima[$i]['jumlah'], $nama_komponen, $id_barang); 
			} 
			

		//	$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('purchasingElektro/PenerimaanElektro');

			
		}
	}

	public function proses_tambahTimbanganBayi(){
		$jumlah_barang_diterima = count($this->input->post('nama_barang_hidden'));
		
		$data_terima = [
			'kode_transaksi' => $this->input->post('kode_transaksi'),
			'tanggal_masuk' => $this->input->post('tanggal_masuk'),
			'jam_masuk' => $this->input->post('jam_masuk'), 
			'nama_pengguna' => $this->input->post('nama_pengguna'), 
		];

		$data_detail_terima = [];

		for($i = 0; $i < $jumlah_barang_diterima; $i++){
			array_push($data_detail_terima, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_terima[$i]['kode_komponen'] = $this->input->post('kode_barang_hidden')[$i];
			$data_detail_terima[$i]['nama_komponen'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_terima[$i]['id_barang'] = $this->input->post('id_barang_hidden')[$i];
			$data_detail_terima[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_terima[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_terima[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i];
		} 

		// $total_stok = $this->input->post('jumlah3');  
		// $nama_komponen = 'Batre AAA';
		// $id_barang = 7 ;

		

		if($this->m_penerimaan_elektro->tambah($data_terima) && $this->m_detail_terima->tambah($data_detail_terima)){
			for ($i=0; $i < $jumlah_barang_diterima ; $i++) {
				$this->m_barang_elektro->plus_stok($data_detail_terima[$i]['jumlah'], $data_detail_terima[$i]['kode_komponen'], $data_detail_terima[$i]['id_barang']) or die('gagal min stok');
				// $this->m_barang_elektro->plus_stokTimbanganBayi($data_detail_terima[$i]['jumlah'], $nama_komponen, $id_barang);
			}  
			//$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('PurchasingElektro/PenerimaanElektro'); 
		}
	}
	
	// public function get_all_barang(){
	// 	$data = $this->m_barang_elektro->lihat_nama_barang($_POST['kode_komponen']);
	// 	echo json_encode($data);
	// }

	// public function keranjang_barang(){
	// 	$this->load->view('purchasingElektro/transaksiMasuk/keranjang');
	// }

	public function proses_tambahHFNC(){
		$jumlah_barang_diterima = count($this->input->post('nama_barang_hidden')); 

		$data_detail_terima = [];

		for($i = 0; $i < $jumlah_barang_diterima; $i++){
			array_push($data_detail_terima, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_terima[$i]['kode_komponen'] = $this->input->post('kode_barang_hidden')[$i];
			$data_detail_terima[$i]['nama_komponen'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_terima[$i]['id_barang'] = $this->input->post('id_barang_hidden')[$i];
			$data_detail_terima[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_terima[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_terima[$i]['stok_alat'] = $this->input->post('stok_alat_hidden')[$i];
			$data_detail_terima[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i];
		}
 
		if($this->m_detail_terima->tambah($data_detail_terima)){
			for ($i=0; $i < $jumlah_barang_diterima ; $i++) {
				$this->m_barang_elektro->plus_stok($data_detail_terima[$i]['jumlah'], $data_detail_terima[$i]['kode_komponen'], $data_detail_terima[$i]['id_barang']) or die('gagal min stok');
			} 

		//	$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('PurchasingElektro/PenerimaanElektro');
		}
	}

	public function proses_tambahEdit_timbanganDewasa(){
		$jumlah_barang_diterima = count($this->input->post('nama_barang_hidden'));
		 
		$data_detail_terima = [];

		for($i = 0; $i < $jumlah_barang_diterima; $i++){
			array_push($data_detail_terima, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_terima[$i]['kode_komponen'] = $this->input->post('kode_barang_hidden')[$i];
			$data_detail_terima[$i]['nama_komponen'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_terima[$i]['id_barang'] = $this->input->post('id_barang_hidden')[$i];
			$data_detail_terima[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_terima[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_terima[$i]['stok_alat'] = $this->input->post('stok_alat_hidden')[$i];
			$data_detail_terima[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i];
		}

		// $total_stok = $this->input->post('jumlah3');  
		// $nama_komponen = 'Batre AAA';
		// $id_barang = 8 ;

		if($this->m_detail_terima->tambah($data_detail_terima)){
			for ($i=0; $i < $jumlah_barang_diterima ; $i++) {
				$this->m_barang_elektro->plus_stok($data_detail_terima[$i]['jumlah'], $data_detail_terima[$i]['kode_komponen'], $data_detail_terima[$i]['id_barang']) or die('gagal min stok');
				// $this->m_barang_elektro->plus_stokTimbanganDewasa($data_detail_terima[$i]['jumlah'], $nama_komponen, $id_barang);
			} 
			//$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('PurchasingElektro/PenerimaanElektro');
		}
	}
 
	public function proses_tambahEdit_timbanganBayi(){
		$jumlah_barang_diterima = count($this->input->post('nama_barang_hidden'));
		
		$data_detail_terima = [];

		for($i = 0; $i < $jumlah_barang_diterima; $i++){
			array_push($data_detail_terima, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_terima[$i]['kode_komponen'] = $this->input->post('kode_barang_hidden')[$i];
			$data_detail_terima[$i]['nama_komponen'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_terima[$i]['id_barang'] = $this->input->post('id_barang_hidden')[$i];
			$data_detail_terima[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_terima[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_terima[$i]['stok_alat'] = $this->input->post('stok_alat_hidden')[$i];
			$data_detail_terima[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i];
		}

		// $total_stok = $this->input->post('jumlah3');  
		// $nama_komponen = 'Batre AAA';
		// $id_barang = 7 ;

		if($this->m_detail_terima->tambah($data_detail_terima)){
			for ($i=0; $i < $jumlah_barang_diterima ; $i++) {
				$this->m_barang_elektro->plus_stok($data_detail_terima[$i]['jumlah'], $data_detail_terima[$i]['kode_komponen'], $data_detail_terima[$i]['id_barang']) or die('gagal min stok');
				// $this->m_barang_elektro->plus_stokTimbanganDewasa($data_detail_terima[$i]['jumlah'], $nama_komponen, $id_barang);
			}
			
			//$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('PurchasingElektro/PenerimaanElektro');
		}
	} 
}