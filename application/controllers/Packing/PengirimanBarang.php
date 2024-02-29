<?php 
class PengirimanBarang extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta'); 
		$this->data['aktif'] = 'PengirimanBarang';

		$this->load->model('packing/M_StokAlat', 'm_stok_alat');

		$this->load->model('purchasingElektro/M_barang_elektro', 'm_barang_elektro'); 
		$this->load->model('purchasingElektro/M_penerimaan_elektro', 'm_penerimaan_elektro');
		$this->load->model('purchasingElektro/M_DetailTerima_Elektro', 'm_detail_terima');
	}

	public function index(){
	    // unset($_SESSION['errorStok']); 
	    
		$this->data['title'] = 'Stok Alat';
		$this->data['all_penerimaan'] = $this->m_stok_alat->lihatPengiriman();
		$this->data['no'] = 1; 
		
		$this->load->view('packing/transaksiPacking/lihatPengiriman', $this->data);
	}

	public function tambah(){ 
	    
		//unset($_SESSION['errorStok']);
		$this->data['title'] = 'Transaksi Alat';
		$this->data['titleHead'] = 'Tambah | Produksi';
		// $this->data['all_barangHFNC'] = $this->m_stok_alat->stok_alat(); 
		$dariDB = $this->m_stok_alat->cekkodetransaksiPengiriman();  
		
		
		if(empty($dariDB)){
    		$kodeBarangSekarang = '001'; 
    		$this->data['kode_transaksi'] = $kodeBarangSekarang;
    		// $this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
    		// $this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
    		$this->load->view('packing/transaksiPacking/tambah_alatPengiriman', $this->data);
		}else{
	        $dariDB = $this->m_stok_alat->cekkodetransaksiPengiriman();
	        $nourut = substr($dariDB, 2, 4);
    		$kodeBarangSekarang = $nourut + 1;
    		$this->data['kode_transaksi'] = $kodeBarangSekarang;
    		// $this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
    		// $this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
    		$this->load->view('packing/transaksiPacking/tambah_alatPengiriman', $this->data);
		} 
		//$nourut = substr($dariDB, 2, 4);
		//$kodeBarangSekarang = $nourut + 1;
		//$this->data['kode_transaksi'] = $kodeBarangSekarang;
		//$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		//$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		//$this->load->view('produksi/hasilKerja/stokAlat/tambah_alat', $this->data); 
	}

	public function proses_tambah(){
	    unset($_SESSION['errorStok']); 
	    
		$keyword = $this->input->post('tanggal_masuk'); 
		$timestamp = strtotime($keyword);
		$new_date_format = date('Y/m/d', $timestamp); 

		$countDuplicate = $this->m_stok_alat->countDuplicate2($new_date_format); 

		if(empty($countDuplicate)){ 
			$data_terima = [
				'kode_transaksi' => $this->input->post('kode_transaksi'),
				'tanggal' => $new_date_format, 
				'nama_pengguna' => $this->input->post('nama_pengguna'),
			];  
			$this->m_stok_alat->tambahPengiriman($data_terima);
			redirect('Packing/PengirimanBarang'); 
		} else { 
			$this->session->set_flashdata('errorStok', 'Tanggal Sudah Ada !'); 
			redirect('Packing/PengirimanBarang/tambah');  
		} 
	}

	public function tambahEdit($kode_transaksi){    

		$this->data['title'] = 'Tambah Alat';
		$this->data['titleHead'] = 'Tambah | Produksi';
		$this->data['all_barangHFNC'] = $this->m_stok_alat->stok_alat(); 
		$this->data['barang'] = $this->m_stok_alat->lihat_id2($kode_transaksi);
		$dariDB = $this->m_stok_alat->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
 
 
 		$this->data['penerimaan'] = $this->m_stok_alat->lihat_no_terima($kode_transaksi);
		$this->data['total_sn'] = $this->m_stok_alat->count_sn($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_stok_alat->lihat_no_terima_detail1($kode_transaksi);
		
		
		$this->load->view('packing/transaksiPacking/tambahEdit_pengiriman', $this->data);
	}

	public function get_all_barang(){
		$data = $this->m_stok_alat->lihat_nama_barang($_POST['kode_alat']);
		echo json_encode($data);
	}

	public function keranjang_barang(){
		$this->load->view('packing/transaksiPacking/keranjangPengiriman');
	} 

	public function proses_tambahEdit(){  
		$jumlah_barang_diterima = count($this->input->post('nama_alat_hidden'));
		$data_detail_terima = [];

		$keyword = $this->input->post('tanggal_masuk'); 
		$timestamp = strtotime($keyword);
		$new_date_format = date('Y-m-d', $timestamp); 

		for ($i = 0; $i < $jumlah_barang_diterima; $i++) {
			$total_stok = $this->input->post('total_stok_hidden')[$i];
			$kode_alat = $this->input->post('kode_alat_hidden')[$i];
			//$serial_number = $this->input->post('serial_number_hidden')[$i];

			// Retrieve data from _table2 based on total_stok and kode_alat
			$data_from_table2 = $this->m_stok_alat->getDataFromTable2($kode_alat,$kode_alat);

			// Check if data_from_table2 is not empty
			if (!empty($data_from_table2) && $total_stok > 0) {
				foreach ($data_from_table2 as $row) {
					if ($total_stok > 0) {
						// Calculate the quantity to transfer based on available total_stok
						$quantity_to_transfer = min($total_stok, 1); // Transfer 1 row at a time

						// Create a record for _table4
						$data_detail_terima[] = [
							'kode_transaksi' 		=> $this->input->post('kode_transaksi'),
							'kode_alat' 			=> $this->input->post('kode_alat_hidden')[$i],
							'nama_alat' 			=> $this->input->post('nama_alat_hidden')[$i],
							'total_stok' 			=> $quantity_to_transfer,
							'serial_number' 		=> $row['serial_number'],
							'nama_shift' 			=> $this->input->post('nama_shift_hidden')[$i], 
							'catatan' 				=> $this->input->post('catatan_hidden')[$i], 
							'tanggal' 				=> $this->input->post('tanggal_hidden')[$i],
							'keterangan' 			=> 'Dikirim',
							'kode_transaksi_masuk' 	=> $this->input->post('kode_transaksi_masuk_hidden')[$i],
						];

						// Update total_stok in _table2
						$this->m_stok_alat->min_stok($quantity_to_transfer, $row['kode_alat']);

						// Deduct transferred quantity from total_stok
						$total_stok -= $quantity_to_transfer;
					}
				}
			}
		}

		if($this->m_stok_alat->tambahDetailPengiriman($data_detail_terima)){
			// $this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('Packing/PengirimanBarang');
		}
	}
	
	public function updateKeterangan() {
        // Menerima data dari permintaan POST
        $id_detail = $this->input->post('id_detail');
        $keterangan = $this->input->post('keterangan');
		$kode_transaksi = $this->input->post('kode_transaksi');
		$kode_alat = $this->input->post('kode_alat'); 
        // Memperbarui keterangan di database menggunakan model
        $this->m_stok_alat->updateKeterangan($id_detail, $keterangan, $kode_transaksi);
		$this->m_stok_alat->kurangiTotalStokInTable1($kode_alat);
        // Mengirim respons JSON (opsional)
        $response = array('status' => 'success');
        echo json_encode($response);
    }
	
	public function updateKeteranganBatch() {
		// Menerima data dari permintaan POST
		$keterangan = $this->input->post('keterangan');
		$kode_transaksi = $this->input->post('kode_transaksi');
		$id_detail = $this->input->post('id_detail'); // Ambil id_detail dari permintaan POST
		$kode_alat_array = $this->input->post('kode_alat'); // Ambil kode_alat dalam bentuk array

		// Memperbarui keterangan di database menggunakan model
		$this->m_stok_alat->updateKeteranganBatch($id_detail, $keterangan, $kode_transaksi);

		// Kurangi total_stok berdasarkan setiap kode_alat yang ada dalam array
		foreach ($kode_alat_array as $kode_alat) {
			$this->m_stok_alat->kurangiTotalStokByKodeAlat($kode_alat);
		}

		// Mengirim respons JSON (opsional)
		$response = array('status' => 'success');
		echo json_encode($response);
	}

	
	// public function updateKeteranganBatch() {
		// // Menerima data dari permintaan POST
		// $keterangan = $this->input->post('keterangan');
		// $kode_transaksi = $this->input->post('kode_transaksi');
		// $id_detail = $this->input->post('id_detail'); // Ambil id_detail dari permintaan POST
		// $kode_alat_array = $this->input->post('kode_alat'); // Ambil kode_alat dalam bentuk array
		// $kode_alat = $this->input->post('kode_alat')[0];
		// // Memperbarui keterangan di database menggunakan model
		// $this->m_stok_alat->updateKeteranganBatch($id_detail, $keterangan, $kode_transaksi);

		// // Menghitung jumlah kode_alat dalam array
		// $total_kode_alat = count($kode_alat_array);

		// // Kurangi total_stok berdasarkan jumlah kode_alat
		// $this->m_stok_alat->kurangiTotalStokByJumlahKodeAlat($total_kode_alat, $kode_alat);

		// // Mengirim respons JSON (opsional)
		// $response = array('status' => 'success');
		// echo json_encode($response);
	// }
	

	public function hapusKeterangan() {
        // Menerima data dari permintaan POST
        $id_detail = $this->input->post('id_detail');
        $keterangan = $this->input->post('keterangan');
		$kode_transaksi = $this->input->post('kode_transaksi');
		$kode_alat = $this->input->post('kode_alat'); 
        // Memperbarui keterangan di database menggunakan model
        $this->m_stok_alat->hapusKeterangan($id_detail, $keterangan, $kode_transaksi);
		$this->m_stok_alat->tambahTotalStokInTable1($kode_alat);
        // Mengirim respons JSON (opsional)
        $response = array('status' => 'success');
        echo json_encode($response);
    }

	// public function hapusKeterangan() {
        // // Menerima data dari permintaan POST
        // $id_detail = $this->input->post('id_detail');
        // $keterangan = $this->input->post('keterangan');

        // // Memperbarui keterangan di database menggunakan model
        // $this->m_stok_alat->hapusKeterangan($id_detail, $keterangan);

        // // Mengirim respons JSON (opsional)
        // $response = array('status' => 'success');
        // echo json_encode($response);
    // }
	
	// public function hapusKeteranganBatch() {
        // // Menerima data dari permintaan POST
        // $id_detail = $this->input->post('id_detail');
        // $keterangan = $this->input->post('keterangan');

        // // Memperbarui keterangan di database menggunakan model
        // $this->m_stok_alat->hapusKeteranganBatch($id_detail, $keterangan);

        // // Mengirim respons JSON (opsional)
        // $response = array('status' => 'success');
        // echo json_encode($response);
    // }
	
	public function hapusKeteranganBatch() {
		// Menerima data dari permintaan POST
		$keterangan = $this->input->post('keterangan');
		$kode_transaksi = $this->input->post('kode_transaksi');
		$id_detail = $this->input->post('id_detail'); // Ambil id_detail dari permintaan POST
		$kode_alat_array = $this->input->post('kode_alat'); // Ambil kode_alat dalam bentuk array

		// Memperbarui keterangan di database menggunakan model
		$this->m_stok_alat->hapusKeteranganBatch($id_detail, $keterangan, $kode_transaksi);

		// Kurangi total_stok berdasarkan setiap kode_alat yang ada dalam array
		foreach ($kode_alat_array as $kode_alat) {
			$this->m_stok_alat->tambahTotalStokByKodeAlat($kode_alat);
		}

		// Mengirim respons JSON (opsional)
		$response = array('status' => 'success');
		echo json_encode($response);
	}

	public function detail($kode_transaksi){
		$this->data['title'] = 'Detail Alat';
		$this->data['titleHead'] = 'Stok Alat';
		$this->data['penerimaan'] = $this->m_stok_alat->lihat_no_terimaPengiriman($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_stok_alat->lihat_no_terima_detailPengiriman($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('packing/transaksiPacking/detailPengiriman', $this->data);
	}

	public function detailKembalikan($kode_komponen)
	{
		$this->data['title'] = 'Kembalikan Barang';
		$this->data['titleHead'] = 'Detail | Kembalikan Barang';
		$this->data['barang'] = $this->m_stok_alat->lihat_idPengiriman($kode_komponen);

		$this->load->view('packing/transaksiPacking/hapusDetailKembalikan', $this->data);
	}

public function proses_pengembalian() {
    // Ambil data dari formulir
    $data = array(
        'kode_alat' => $this->input->post('kode_alat'),
        'serial_number' => $this->input->post('serial_number'),
        'nama_alat' => $this->input->post('nama_alat'),
        'tanggal' => $this->input->post('tanggal'),
        'total_stok' => $this->input->post('total_stok'),
        'catatan' => $this->input->post('catatan'),
        'nama_shift' => $this->input->post('nama_shift'),
        'kode_transaksi' => $this->input->post('kode_transaksi_masuk')
    );

    // Data yang akan dihapus dari tabel packing_detail_keluar
    $hapus_data = array(
        'kode_alat' => $this->input->post('kode_alat'),
        'serial_number' => $this->input->post('serial_number')
    );

    $this->db->trans_start(); // Start a database transaction

    // Simpan data ke tabel packing_detail_masuk
    $insert_result = $this->m_stok_alat->Kembalikan($data);

    // Hapus data yang sesuai dari tabel packing_detail_keluar
    $delete_result = $this->m_stok_alat->hapusDataKeluar($hapus_data);

    $this->db->trans_complete(); // Complete the transaction

    if ($insert_result && $delete_result && $this->db->trans_status() !== FALSE) {
        // Both insertion and deletion were successful, and the transaction is complete
        redirect('Packing/PengirimanBarang');
    } else {
        // Handle errors or rollback the transaction if necessary
        redirect('Packing/PengirimanBarang');
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