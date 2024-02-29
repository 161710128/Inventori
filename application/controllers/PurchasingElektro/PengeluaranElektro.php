<?php  
class PengeluaranElektro extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->data['aktif'] = 'PengeluaranElektro';
		$this->load->model('purchasingElektro/M_barang_elektro', 'm_barang_elektro');
		$this->load->model('purchasingElektro/M_pengeluaran_elektro', 'm_pengeluaran_elektro');
		$this->load->model('purchasingElektro/M_DetailKeluar_elektro', 'm_detail_keluar');
	}
 
	public function index(){
		$this->data['title'] = 'Transaksi Pengeluaran Elektro';
		$this->data['all_pengeluaran'] = $this->m_pengeluaran_elektro->lihat();
		$this->data['no'] = 1;
		$this->data['all_test'] = $this->m_pengeluaran_elektro->cekmaxTanggal(); 
		$this->data['all_test1'] = date('d/m/Y'); 

		$this->load->view('purchasingElektro/transaksiKeluar/lihat', $this->data);
	}

	public function tambah(){ 
		$this->data['title'] = 'Tambah Transaksi';
		$this->data['all_komponen'] = $this->m_barang_elektro->tampil_komponen(); 
		$dariDB = $this->m_pengeluaran_elektro->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->load->view('purchasingElektro/transaksiKeluar/tambahData/tambah', $this->data);
	}

	public function tambahHfnc(){
		$this->data['title'] = 'Tambah Transaksi HFNC';
		$this->data['titleHead'] = 'PengeluaranElektro | HFNC';
		$this->data['all_barangHFNC'] = $this->m_barang_elektro->StokKurang_Hfnc(); 
		$dariDB = $this->m_pengeluaran_elektro->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->load->view('purchasingElektro/transaksiKeluar/tambahData/tambah_hfnc', $this->data);
	}

	public function tambahAntropometri(){
		$this->data['title'] = 'Tambah Transaksi Antropometri';
		$this->data['titleHead'] = 'PengeluaranElektro | Antropometri';
		$this->data['all_barangHFNC'] = $this->m_barang_elektro->StokKurang_Antropometri(); 
		$dariDB = $this->m_pengeluaran_elektro->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->load->view('purchasingElektro/transaksiKeluar/tambahData/tambah_Antropometri', $this->data);
	}

	public function tambahTimbanganDewasa(){
		$this->data['title'] = 'Tambah Transaksi Timbangan Dewasa';
		$this->data['titleHead'] = 'PengeluaranElektro | Timbangan Dewasa';
		$this->data['all_barangDewasa'] = $this->m_barang_elektro->all_timbanganDewasa(); 
		$dariDB = $this->m_pengeluaran_elektro->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->load->view('purchasingElektro/transaksiKeluar/tambahData/tambah_timbanganDewasa', $this->data);
	}

	public function tambahTimbanganBayi(){
		$this->data['title'] = 'Tambah Transaksi Timbangan Bayi';
		$this->data['titleHead'] = 'PengeluaranElektro | Timbangan Bayi'; 
		$this->data['all_barangDewasa'] = $this->m_barang_elektro->all_timbanganBayi(); 
		$dariDB = $this->m_pengeluaran_elektro->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->load->view('purchasingElektro/transaksiKeluar/tambahData/tambah_timbanganBayi', $this->data);
	}

	public function proses_tambahHFNC(){
		$jumlah_barang_dikeluar = count($this->input->post('nama_barang_hidden'));
		
		$data_keluar = [
			'kode_transaksi' => $this->input->post('kode_transaksi'),
			'tanggal_keluar' => $this->input->post('tanggal_keluar'),
			'jam_keluar' => $this->input->post('jam_keluar'), 
			'nama_pengguna' => $this->input->post('nama_pengguna'),
		];

		$data_detail_keluar = [];

		for($i = 0; $i < $jumlah_barang_dikeluar; $i++){
			array_push($data_detail_keluar, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_keluar[$i]['kode_komponen'] = $this->input->post('kode_barang_hidden')[$i];
			$data_detail_keluar[$i]['nama_komponen'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_keluar[$i]['id_barang'] = $this->input->post('id_barang_hidden')[$i];
			$data_detail_keluar[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_keluar[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_keluar[$i]['stok_alat'] = $this->input->post('stok_alat_hidden')[$i]; 
			$data_detail_keluar[$i]['pengambil'] = $this->input->post('pengambil_hidden')[$i];
			$data_detail_keluar[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i];
			$data_detail_keluar[$i]['peruntukan'] = $this->input->post('peruntukan_hidden')[$i];
		}

		if($this->m_pengeluaran_elektro->tambah($data_keluar) && $this->m_detail_keluar->tambah($data_detail_keluar)){
			for ($i=0; $i < $jumlah_barang_dikeluar ; $i++) {
				$this->m_barang_elektro->min_stok($data_detail_keluar[$i]['jumlah'], $data_detail_keluar[$i]['kode_komponen'], $data_detail_keluar[$i]['id_barang']) or die('gagal min stok');
			}
			$this->session->set_flashdata('success', 'Invoice <strong>Pengeluaran</strong> Berhasil Dibuat!');
			redirect('PurchasingElektro/PengeluaranElektro');
		}
	} 

	public function proses_tambahTransaksi(){ 

		$keyword = $this->input->post('tanggal_keluar'); 
		$countDuplicate = $this->m_pengeluaran_elektro->countDuplicate1($keyword);
		// $countDuplicate = $this->m_stok_alat->countDuplicate1($_POST['tanggal_masuk']);

		if(empty($countDuplicate)){
			// $this->session->set_flashdata('sukses', 'Tanggal tidak Ada !');
			// redirect('purchasingElektro/PengeluaranElektro/tambah');

			$data_keluar = [
			'kode_transaksi' => $this->input->post('kode_transaksi'),
			'tanggal_keluar' => $this->input->post('tanggal_keluar'),
			'jam_keluar' => $this->input->post('jam_keluar'), 
			'nama_pengguna' => $this->input->post('nama_pengguna'),
			]; 

			$this->m_pengeluaran_elektro->tambah($data_keluar) ;
			redirect('PurchasingElektro/PengeluaranElektro');

		} else {
			$this->session->set_flashdata('gagal', 'Tanggal Sudah Ada !');
			redirect('PurchasingElektro/PengeluaranElektro');

		}





		
		// $data_keluar = [
		// 	'kode_transaksi' => $this->input->post('kode_transaksi'),
		// 	'tanggal_keluar' => $this->input->post('tanggal_keluar'),
		// 	'jam_keluar' => $this->input->post('jam_keluar'), 
		// 	'nama_pengguna' => $this->input->post('nama_pengguna'),
		// ]; 

		// $this->m_pengeluaran_elektro->tambah($data_keluar) 
		// 	redirect('PurchasingElektro/PengeluaranElektro');
		
	} 

	public function prosesTambah_timbanganDewasa(){
		$jumlah_barang_dikeluar = count($this->input->post('nama_barang_hidden'));
		
		$data_keluar = [
			'kode_transaksi' => $this->input->post('kode_transaksi'),
			'tanggal_keluar' => $this->input->post('tanggal_keluar'),
			'jam_keluar' => $this->input->post('jam_keluar'), 
			'nama_pengguna' => $this->input->post('nama_pengguna'),
		];
 
		$data_detail_keluar = [];

		for($i = 0; $i < $jumlah_barang_dikeluar; $i++){
			array_push($data_detail_keluar, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_keluar[$i]['kode_komponen'] = $this->input->post('kode_barang_hidden')[$i];
			$data_detail_keluar[$i]['nama_komponen'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_keluar[$i]['id_barang'] = $this->input->post('id_barang_hidden')[$i];
			$data_detail_keluar[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_keluar[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_keluar[$i]['stok_alat'] = $this->input->post('stok_alat_hidden')[$i]; 
			$data_detail_keluar[$i]['pengambil'] = $this->input->post('pengambil_hidden')[$i];
			$data_detail_keluar[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i];
			$data_detail_keluar[$i]['peruntukan'] = $this->input->post('peruntukan_hidden')[$i];
		}

		// $total_stok = $this->input->post('jumlah3');  
		// $nama_komponen = 'Batre AAA';
		// $id_barang = 8 ;

		if($this->m_pengeluaran_elektro->tambah($data_keluar) && $this->m_detail_keluar->tambah($data_detail_keluar)){
			for ($i=0; $i < $jumlah_barang_dikeluar ; $i++) {
				$this->m_barang_elektro->min_stok($data_detail_keluar[$i]['jumlah'], $data_detail_keluar[$i]['kode_komponen'], $data_detail_keluar[$i]['id_barang']) or die('gagal min stok');
				// $this->m_barang_elektro->minStok_timbanganDewasa($data_detail_keluar[$i]['jumlah'], $nama_komponen, $id_barang);
			} 
			$this->session->set_flashdata('success', 'Invoice <strong>Pengeluaran</strong> Berhasil Dibuat!');
			redirect('PurchasingElektro/PengeluaranElektro');
		}
	}

	public function prosesTambah_timbanganBayi(){
		$jumlah_barang_dikeluar = count($this->input->post('nama_barang_hidden'));
		
		$data_keluar = [
			'kode_transaksi' => $this->input->post('kode_transaksi'),
			'tanggal_keluar' => $this->input->post('tanggal_keluar'),
			'jam_keluar' => $this->input->post('jam_keluar'), 
			'nama_pengguna' => $this->input->post('nama_pengguna'),
		];

		$data_detail_keluar = [];

		for($i = 0; $i < $jumlah_barang_dikeluar; $i++){
			array_push($data_detail_keluar, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_keluar[$i]['kode_komponen'] = $this->input->post('kode_barang_hidden')[$i];
			$data_detail_keluar[$i]['nama_komponen'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_keluar[$i]['id_barang'] = $this->input->post('id_barang_hidden')[$i];
			$data_detail_keluar[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_keluar[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_keluar[$i]['stok_alat'] = $this->input->post('stok_alat_hidden')[$i]; 
			$data_detail_keluar[$i]['pengambil'] = $this->input->post('pengambil_hidden')[$i];
			$data_detail_keluar[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i];
			$data_detail_keluar[$i]['peruntukan'] = $this->input->post('peruntukan_hidden')[$i];
		}

		// $total_stok = $this->input->post('jumlah3');  
		// $nama_komponen = 'Batre AAA';
		// $id_barang = 7 ;

		if($this->m_pengeluaran_elektro->tambah($data_keluar) && $this->m_detail_keluar->tambah($data_detail_keluar)){
			for ($i=0; $i < $jumlah_barang_dikeluar ; $i++) {
				$this->m_barang_elektro->min_stok($data_detail_keluar[$i]['jumlah'], $data_detail_keluar[$i]['kode_komponen'], $data_detail_keluar[$i]['id_barang']) or die('gagal min stok');
				// $this->m_barang_elektro->minStok_timbanganBayi($data_detail_keluar[$i]['jumlah'], $nama_komponen, $id_barang);
			} 
			$this->session->set_flashdata('success', 'Invoice <strong>Pengeluaran</strong> Berhasil Dibuat!');
			redirect('PurchasingElektro/PengeluaranElektro');
		}
	}
		// $keyword = $this->input->post('tanggal_keluar_hidden'); 
		// $timestamp = strtotime($keyword);
		// $new_date_format = date('Y-m-d', $timestamp);
	public function prosesTambahEdit()
	{
		$jumlah_barang_dikeluar = count($this->input->post('nama_barang_hidden')); 
		$data_detail_keluar = [];
		$keyword = $this->input->post('tanggal_keluar_hidden'); 
		// $timestamp = strtotime($keyword);
		// $new_date_format = date('Y-m-d', $timestamp); 
		// $keyword = $this->input->post('tanggal_masuk'); 
		// $timestamp = strtotime($keyword);
		// $new_date_format = date('Y/m/d', $timestamp);
		

		for ($i = 0; $i < $jumlah_barang_dikeluar; $i++) {
			array_push($data_detail_keluar, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_keluar[$i]['kode_komponen'] = $this->input->post('kode_barang_hidden')[$i];
			$data_detail_keluar[$i]['nama_komponen'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_keluar[$i]['id_barang'] = $this->input->post('id_barang_hidden')[$i];
			$data_detail_keluar[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_keluar[$i]['shift'] = $this->input->post('shift_hidden')[$i];
			$data_detail_keluar[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_keluar[$i]['stok_alat'] = $this->input->post('stok_alat_hidden')[$i]; 
			$data_detail_keluar[$i]['pengambil'] = $this->input->post('pengambil_hidden')[$i];
			$data_detail_keluar[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i];
			$data_detail_keluar[$i]['peruntukan'] = $this->input->post('peruntukan_hidden')[$i];
// 			$data_detail_keluar[$i]['tanggal_keluar'] = $keyword[$i];
// 			$data_detail_keluar[$i]['jam_keluar'] = $this->input->post('jam_keluar_hidden')[$i];
		} 

		if ($this->m_detail_keluar->tambah($data_detail_keluar)) {
			for ($i = 0; $i < $jumlah_barang_dikeluar; $i++) {
				$this->m_barang_elektro->min_stok($data_detail_keluar[$i]['jumlah'], $data_detail_keluar[$i]['kode_komponen'], $data_detail_keluar[$i]['id_barang']) or die('gagal min stok'); 
			}
			$this->session->set_flashdata('success', 'Invoice <strong>Pengeluaran</strong> Berhasil Dibuat!');
			redirect('PurchasingElektro/PengeluaranElektro');
		}
	}

	public function tambahUbah_Hfnc($kode_transaksi){ 
		$this->data['title'] = 'Tambah Barang HFNC';
		$this->data['titleHead'] = 'TambahBarang | HFNC ';
		$this->data['all_komponen'] = $this->m_barang_elektro->lihat_stok_komponen_Hfnc();  
		$this->data['all_komponen1'] = $this->m_barang_elektro->getNamaBarang();  		
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->data['all_barangHFNC'] = $this->m_barang_elektro->lihat_stok_komponen_Hfnc();
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['barang'] = $this->m_barang_elektro->lihat_id2($kode_transaksi);

		$this->load->view('purchasingElektro/transaksiKeluar/tambahEdit/TambahEdit_hfnc', $this->data);
	}
 
	public function tambahUbah_Antropometri($kode_transaksi){ 
		$this->data['title'] = 'Tambah Barang Antropometri';
		$this->data['titleHead'] = 'TambahBarang | Antropometri';
		$this->data['all_komponen'] = $this->m_barang_elektro->lihat_stok_komponen_Antropometri();  
		$this->data['all_komponen1'] = $this->m_barang_elektro->getNamaBarang();  
		$this->data['barang'] = $this->m_barang_elektro->lihat_id2($kode_transaksi);	
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->data['all_barangHFNC'] = $this->m_barang_elektro->lihat_antro();
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();

		$this->load->view('purchasingElektro/transaksiKeluar/tambahEdit/TambahEdit_antropometri', $this->data);
	}

	public function tambahUbah_timbanganDewasa($kode_transaksi){ 
		$this->data['title'] = 'Tambah Barang Timbangan Dewasa';
		$this->data['titleHead'] = 'TambahBarang | Timbangan Dewasa';
		$this->data['all_komponen'] = $this->m_barang_elektro->lihat_stok_komponen_Antropometri();  
		$this->data['all_komponen1'] = $this->m_barang_elektro->getNamaBarang();  
		$this->data['barang'] = $this->m_barang_elektro->lihat_id2($kode_transaksi);	
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->data['all_barangHFNC'] = $this->m_barang_elektro->lihatStokKomponen_timbanganDewasa();
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();

		$this->load->view('purchasingElektro/transaksiKeluar/tambahEdit/TambahEdit_timbanganDewasa', $this->data);
	}

	public function tambahUbah_timbanganBayi($kode_transaksi){ 
		$this->data['title'] = 'Tambah Barang Timbangan Bayi';
		$this->data['titleHead'] = 'TambahBarang | Timbangan Bayi';
		$this->data['all_komponen'] = $this->m_barang_elektro->lihat_stok_komponen_Antropometri();  
		$this->data['all_komponen1'] = $this->m_barang_elektro->getNamaBarang();  
		$this->data['barang'] = $this->m_barang_elektro->lihat_id2($kode_transaksi);	
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->data['all_barangHFNC'] = $this->m_barang_elektro->lihatStokKomponen_timbanganBayi();
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();

		$this->load->view('purchasingElektro/transaksiKeluar/tambahEdit/TambahEdit_timbanganBayi', $this->data);
	}

	public function detail($kode_transaksi){
		$this->data['title'] = 'Detail Pengeluaran';
		$this->data['pengeluaran'] = $this->m_pengeluaran_elektro->lihat_no_keluar($kode_transaksi);
		$this->data['all_detail_keluar'] = $this->m_detail_keluar->lihat_no_keluar($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('purchasingElektro/transaksiKeluar/detail', $this->data);
	}
	
	public function ubah($kode_transaksi){ 
		$this->data['title'] = 'Tambah Barang'; 
		$this->data['titleHead'] = 'Tambah | Barang';
		$this->data['all_komponen'] = $this->m_barang_elektro->lihat_stok_komponen(); 
		$this->data['all_komponen_hfnc'] = $this->m_barang_elektro->lihat_stok_komponen_Hfnc(); 

		$this->data['all_komponen1'] = $this->m_barang_elektro->getNamaBarang();  
		$this->data['barang'] = $this->m_barang_elektro->lihat_id2($kode_transaksi);

		$this->data['all_penerimaan'] = $this->m_pengeluaran_elektro->lihat();
		
		
		$this->load->view('purchasingElektro/transaksiKeluar/tambahEdit/TambahEdit', $this->data);
	}
	
	public function hapus($kode_transaksi){
		if($this->m_pengeluaran_elektro->hapus($kode_transaksi) && $this->m_detail_keluar->hapus($kode_transaksi)){
			$this->session->set_flashdata('success', 'Invoice Pengeluaran <strong>Berhasil</strong> Dihapus!');
			redirect('PurchasingElektro/PengeluaranElektro');
		} else {
			$this->session->set_flashdata('error', 'Invoice Pengeluaran <strong>Gagal</strong> Dihapus!');
			redirect('PurchasingElektro/PengeluaranElektro');
		}
	}

	public function get_all_barang(){
		$data = $this->m_barang_elektro->lihat_nama_barang($_POST['kode_komponen']);
		echo json_encode($data);
	}

	public function keranjang_barang(){
		$this->load->view('purchasingElektro/transaksiKeluar/keranjang');
	}  
	
}