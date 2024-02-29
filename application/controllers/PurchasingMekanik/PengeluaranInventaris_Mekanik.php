<?php 
class PengeluaranInventaris_Mekanik extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->data['aktif'] = 'PengeluaranInventaris_Mekanik';
		$this->load->model('purchasingMekanik/M_BarangInventaris_Mekanik', 'm_barang_inventaris');
		$this->load->model('purchasingMekanik/M_barang_mekanik', 'm_barang_mekanik');
		$this->load->model('purchasingMekanik/M_Inventaris_Mekanik', 'm_inventaris_mekanik');
		$this->load->model('purchasingMekanik/M_DK_Inventaris_Mekanik', 'm_dk_inventaris_mekanik');
	}

	public function index(){ 
	     unset($_SESSION['errorStok']); 
		$this->data['title'] = 'Transaksi Pengeluaran Mekanik';
		$this->data['titleHead'] = 'Transaksi | Pengeluaran Mekanik';
		$this->data['all_inventaris'] = $this->m_inventaris_mekanik->lihat();
		$this->data['no'] = 1;

		$this->load->view('purchasingMekanik/transaksiKeluar/barangInventaris/lihat', $this->data);
	}

	public function tambah(){
		$this->data['title'] = 'Tambah Transaksi';
		$this->data['titleHead'] = 'Tambah | Transaksi';
		$this->data['all_komponen'] = $this->m_barang_inventaris->tampil_komponen(); 
		$dariDB = $this->m_inventaris_mekanik->cekkodetransaksi1(); 
		
		if(empty($dariDB)){
    		$kodeBarangSekarang = '001';
    		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		    $this->data['all_pengambil'] = $this->m_barang_mekanik->AllPengambil();
		    $this->load->view('purchasingMekanik/transaksiKeluar/barangInventaris/tambah', $this->data);
		}else{
		    $nourut = substr($dariDB, 3, 4);
    		$kodeBarangSekarang = $nourut + 1;
    		$this->data['kode_transaksi'] = $kodeBarangSekarang;
    		$this->data['all_pengambil'] = $this->m_barang_mekanik->AllPengambil();
    		$this->load->view('purchasingMekanik/transaksiKeluar/barangInventaris/tambah', $this->data);
		} 
	}

	public function get_all_barang(){
		$data = $this->m_barang_inventaris->lihat_nama_barang($_POST['kode_part']);
		echo json_encode($data);
	}

	public function keranjang_barang(){
		$this->load->view('purchasingMekanik/transaksiKeluar/barangInventaris/keranjang');
	} 

	public function hapus($kode_transaksi){
		if($this->m_inventaris_mekanik->hapus($kode_transaksi) && $this->m_dk_inventaris_mekanik->hapus($kode_transaksi)){
			$this->session->set_flashdata('success', 'Invoice Pengeluaran <strong>Berhasil</strong> Dihapus!');
			redirect('purchasingMekanik/PengeluaranInventaris_Mekanik');
		} else {
			$this->session->set_flashdata('error', 'Invoice Pengeluaran <strong>Gagal</strong> Dihapus!');
			redirect('purchasingMekanik/PengeluaranInventaris_Mekanik');
		}
	}

	public function detail($kode_transaksi){
		$this->data['title'] = 'Detail Pengeluaran';
		$this->data['titleHead'] = 'Detail | Pengeluaran';
		$this->data['pengeluaran'] = $this->m_inventaris_mekanik->lihat_no_keluar($kode_transaksi);
		$this->data['all_detail_keluar'] = $this->m_dk_inventaris_mekanik->lihat_no_keluar($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('purchasingMekanik/transaksiKeluar/barangInventaris/detail', $this->data);
	}

	public function detailHapus($kode_komponen)
	{
		$this->data['title'] = 'Hapus Inventaris';
		$this->data['titleHead'] = 'Hapus | Barang Inventaris';
		$this->data['barang'] = $this->m_dk_inventaris_mekanik->lihat_id($kode_komponen);

		$this->load->view('purchasingMekanik/transaksiKeluar/barangInventaris/hapusDetail', $this->data);
	}

    public function proses_detailHapus()
    { 
        $id_detail = $this->input->post('id_detail');
        $total_stok = $this->input->post('jumlah');
        $kode_komponen = $this->input->post('kode_komponen');
 
        if ($this->m_dk_inventaris_mekanik->hapusDetail($id_detail)) {
            $this->m_barang_inventaris->plus_stok($total_stok,$kode_komponen) or die('gagal min stok'); 
            redirect('PurchasingMekanik/PengeluaranInventaris_Mekanik');
        }
    }

	public function ubah($kode_transaksi){ 
		$this->data['title'] = 'Tambah Barang';
		$this->data['titleHead'] = 'Tambah | Barang';
		$this->data['all_komponen'] = $this->m_barang_inventaris->lihat_stok_komponen();  
		$this->data['barang'] = $this->m_barang_inventaris->lihat_id2($kode_transaksi);
		$this->data['all_pengambil'] = $this->m_barang_mekanik->AllPengambil();

		$this->load->view('purchasingMekanik/transaksiKeluar/barangInventaris/tambahEdit', $this->data);
	} 

	public function proses_tambah(){
	    
	    unset($_SESSION['errorStok']); 
	    
		$keyword = $this->input->post('tanggal_keluar'); 
		$timestamp = strtotime($keyword);
		$new_date_format = date('Y-m-d', $timestamp); 

		$countDuplicate = $this->m_inventaris_mekanik->countDuplicate1($new_date_format); 

		if(empty($countDuplicate)){ 
			$data_terima = [
				'kode_transaksi' => $this->input->post('kode_transaksi'),
				'tanggal_keluar' => $new_date_format,
				// 'jam' => $this->input->post('jam_masuk'), 
				'nama_pengguna' => $this->input->post('nama_pengguna'),
			];  
				$this->m_inventaris_mekanik->tambah($data_terima);
				redirect('PurchasingMekanik/PengeluaranInventaris_Mekanik'); 
		} else { 
			$this->session->set_flashdata('errorStok', 'Tanggal Sudah Ada !'); 
			redirect('PurchasingMekanik/PengeluaranInventaris_Mekanik/tambah');  
		} 
	    
	    
	    
	    
// 		$jumlah_barang_dikeluar = count($this->input->post('nama_barang_hidden'));
		
// 		$data_keluar = [
// 			'kode_transaksi' => $this->input->post('kode_transaksi'),
// 			'tanggal_keluar' => $this->input->post('tanggal_keluar'),
// 			'jam_keluar' => $this->input->post('jam_keluar'), 
// 			'nama_pengguna' => $this->input->post('nama_pengguna'),
// 		];

// 		$data_detail_keluar = [];

// 		for($i = 0; $i < $jumlah_barang_dikeluar; $i++){
// 			array_push($data_detail_keluar, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
// 			$data_detail_keluar[$i]['kode_part'] = $this->input->post('kode_part_hidden')[$i];
// 			$data_detail_keluar[$i]['pengambil'] = $this->input->post('pengambil_hidden')[$i];
// 			$data_detail_keluar[$i]['nama_barang'] = $this->input->post('nama_barang_hidden')[$i];
// 			$data_detail_keluar[$i]['spesifikasi'] = $this->input->post('spesifikasi_hidden')[$i]; 
// 			$data_detail_keluar[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
// 			$data_detail_keluar[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
// 			$data_detail_keluar[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i];
// 			$data_detail_keluar[$i]['tanggal'] = $this->input->post('tanggal_keluar_hidden')[$i];
// 			$data_detail_keluar[$i]['jam'] = $this->input->post('jam_keluar_hidden')[$i];
// 		}

// 		if($this->m_inventaris_mekanik->tambah($data_keluar) && $this->m_dk_inventaris_mekanik->tambah($data_detail_keluar)){
// 			for ($i=0; $i < $jumlah_barang_dikeluar ; $i++) {
//  				$this->m_barang_inventaris->min_stok($data_detail_keluar[$i]['jumlah'], $data_detail_keluar[$i]['kode_part']) or die('gagal min stok');
// 			}
			
// 			$this->session->set_flashdata('success', 'Invoice <strong>Pengeluaran</strong> Berhasil Dibuat!');
// 			redirect('purchasingMekanik/PengeluaranInventaris_Mekanik');
// 		} 
	}
	
	public function proses_tambahTransaksi(){ 

		$keyword = $this->input->post('tanggal_keluar'); 
		$countDuplicate = $this->m_barang_mekanik->countDuplicate1($keyword);

		if(empty($countDuplicate)){
			// $this->session->set_flashdata('sukses', 'Tanggal tidak Ada !');
			// redirect('purchasingElektro/PengeluaranElektro/tambah');

			$data_keluar = [
			'kode_transaksi' => $this->input->post('kode_transaksi'),
			'tanggal_keluar' => $this->input->post('tanggal_keluar'),
			'jam_keluar' => $this->input->post('jam_keluar'), 
			'nama_pengguna' => $this->input->post('nama_pengguna'),
			]; 

			$this->m_barang_mekanik->tambah_keluar($data_keluar) ;
			redirect('PurchasingMekanik/PengeluaranMekanik');

		} else {
			$this->session->set_flashdata('gagal', 'Tanggal Sudah Ada !');
			redirect('PurchasingMekanik/PengeluaranMekanik/tambah');

		}
		
	} 
	public function proses_tambahEdit(){
		$jumlah_barang_dikeluar = count($this->input->post('nama_barang_hidden'));
		
		// $data_keluar = [
		// 	'kode_transaksi' => $this->input->post('kode_transaksi'),
		// 	'tanggal_keluar' => $this->input->post('tanggal_keluar'),
		// 	'jam_keluar' => $this->input->post('jam_keluar'), 
		// 	'nama_pengguna' => $this->input->post('nama_pengguna'),
		// ];

		$data_detail_keluar = [];

		for($i = 0; $i < $jumlah_barang_dikeluar; $i++){
			array_push($data_detail_keluar, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_keluar[$i]['kode_part'] = $this->input->post('kode_part_hidden')[$i];
			$data_detail_keluar[$i]['pengambil'] = $this->input->post('pengambil_hidden')[$i];
			$data_detail_keluar[$i]['nama_barang'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_keluar[$i]['spesifikasi'] = $this->input->post('spesifikasi_hidden')[$i]; 
			$data_detail_keluar[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_keluar[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_keluar[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i];
			$data_detail_keluar[$i]['tanggal'] = $this->input->post('tanggal_keluar_hidden')[$i];
			$data_detail_keluar[$i]['jam'] = $this->input->post('jam_keluar_hidden')[$i];
		}

		if($this->m_dk_inventaris_mekanik->tambah($data_detail_keluar)){
			for ($i=0; $i < $jumlah_barang_dikeluar ; $i++) {
 				$this->m_barang_inventaris->min_stok($data_detail_keluar[$i]['jumlah'], $data_detail_keluar[$i]['kode_part']) or die('gagal min stok');
			}

			$this->session->set_flashdata('success', 'Invoice <strong>Pengeluaran</strong> Berhasil Dibuat!');
			redirect('PurchasingMekanik/PengeluaranInventaris_Mekanik');
		} 
	} 
}