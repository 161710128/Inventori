<?php 
class KemajuanProduksi extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta'); 
		$this->data['aktif'] = 'KemajuanProduksi';
		$this->load->model('produksi/M_HasilKerja', 'm_hasilkerja');  
		
		
		$this->load->model('purchasingElektro/M_barang_elektro', 'm_barang_elektro'); 
		$this->load->model('purchasingElektro/M_penerimaan_elektro', 'm_penerimaan_elektro');
		$this->load->model('purchasingElektro/M_DetailTerima_Elektro', 'm_detail_terima');
	
	}

	public function index(){
	    unset($_SESSION['error']); 
		$this->data['title'] = 'Kemajuan Produksi';
		$this->data['all_penerimaan'] = $this->m_hasilkerja->lihat();
		$this->data['no'] = 1;

		$this->load->view('produksi/hasilKerja/kemajuanProduksi/lihat', $this->data);
	}

	public function tambah(){
	    unset($_SESSION['error']); 
		$this->data['title'] = 'Tambah Transaksi';
		$this->data['titleHead'] = 'Tambah | Produksi';
		$this->data['all_barangHFNC'] = $this->m_hasilkerja->Stok_timbanganDewasa(); 
		$dariDB = $this->m_hasilkerja->cekkodetransaksi(); 
		
		if(empty($dariDB)){
    		$kodeBarangSekarang = '001'; 
    		$this->data['kode_transaksi'] = $kodeBarangSekarang;
    		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
    		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
    		$this->load->view('produksi/hasilKerja/kemajuanProduksi/tambah', $this->data);
		}else{
	    	$dariDB = $this->m_hasilkerja->cekkodetransaksi();
	    	$nourut = substr($dariDB, 2, 4);
    		$kodeBarangSekarang = $nourut + 1; 
    		$this->data['kode_transaksi'] = $kodeBarangSekarang;
    		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
    		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
    		$this->load->view('produksi/hasilKerja/kemajuanProduksi/tambah', $this->data);
		}
		
        //$nourut = substr($dariDB, 2, 4);
		//$kodeBarangSekarang = $nourut + 1; 
		//$this->data['kode_transaksi'] = $kodeBarangSekarang;
		//$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		//$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		//$this->load->view('produksi/hasilKerja/kemajuanProduksi/tambah', $this->data);
	}

	public function tambah_standingWeight(){

		$this->data['title'] = 'Tambah Standingweight';
		$this->data['titleHead'] = 'Tambah | Produksi';
		$this->data['all_barangHFNC'] = $this->m_hasilkerja->Stok_timbanganDewasa(); 
		$dariDB = $this->m_hasilkerja->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->load->view('produksi/hasilKerja/kemajuanProduksi/tambah_standingWeight', $this->data);
	}

	public function tambah_babyScale(){
		$this->data['title'] = 'Tambah Babyscale';
		$this->data['titleHead'] = 'Tambah | Produksi';
		$this->data['all_barangHFNC'] = $this->m_hasilkerja->Stok_timbanganBayi(); 
		$dariDB = $this->m_hasilkerja->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->load->view('produksi/hasilKerja/kemajuanProduksi/tambah_babyScale', $this->data);
	}

	public function tambah_stadioMeter(){
		$this->data['title'] = 'Tambah Stadiometer';
		$this->data['titleHead'] = 'Tambah | Produksi';
		$this->data['all_barangHFNC'] = $this->m_hasilkerja->Stok_stadioMeter(); 
		$dariDB = $this->m_hasilkerja->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->load->view('produksi/hasilKerja/kemajuanProduksi/tambah_stadioMeter', $this->data);
	}

	public function tambah_infantoMeter(){
		$this->data['title'] = 'Tambah Infantometer';
		$this->data['titleHead'] = 'Tambah | Produksi';
		$this->data['all_barangHFNC'] = $this->m_hasilkerja->Stok_infantoMeter(); 
		$dariDB = $this->m_hasilkerja->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->load->view('produksi/hasilKerja/kemajuanProduksi/tambah_infantoMeter', $this->data);
	}

	public function tambah_lila(){
		$this->data['title'] = 'Tambah Lila';
		$this->data['titleHead'] = 'Tambah | Produksi';
		$this->data['all_barangHFNC'] = $this->m_hasilkerja->Stok_lila(); 
		$dariDB = $this->m_hasilkerja->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->load->view('produksi/hasilKerja/kemajuanProduksi/tambah_lila', $this->data);
	}
	
	public function get_all_barang(){
		$data = $this->m_hasilkerja->lihat_nama_barang($_POST['kode_komponen']);
		echo json_encode($data);
	}

	public function keranjang_barang(){
		$this->load->view('produksi/hasilKerja/kemajuanProduksi/keranjang');
	}

	public function proses_tambah(){
	    
	    unset($_SESSION['error']); 

		$keyword = $this->input->post('tanggal_masuk'); 
		$countDuplicate = $this->m_hasilkerja->countDuplicate1($keyword);
		
		if(empty($countDuplicate)){

			$data_terima = [
				'kode_transaksi' => $this->input->post('kode_transaksi'),
				'tanggal' => $this->input->post('tanggal_masuk'),
				'jam' => $this->input->post('jam_masuk'), 
				'nama_pengguna' => $this->input->post('nama_pengguna'),
			];

			$this->m_hasilkerja->tambah($data_terima); 
			redirect('Produksi/KemajuanProduksi');
			
		} else {

			$this->session->set_flashdata('error', 'Tanggal Sudah Ada !'); 

			$this->data['title'] = 'Tambah Transaksi Standing Weight';
			$this->data['titleHead'] = 'Tambah | Produksi';
			$this->data['all_barangHFNC'] = $this->m_hasilkerja->Stok_timbanganDewasa(); 
			$dariDB = $this->m_hasilkerja->cekkodetransaksi(); 
			$nourut = substr($dariDB, 2, 4);
			$kodeBarangSekarang = $nourut + 1;
			$this->data['kode_transaksi'] = $kodeBarangSekarang;
			$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
			$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
			$this->load->view('produksi/hasilKerja/kemajuanProduksi/tambah', $this->data);
		}






 





		// $jumlah_barang_diterima = count($this->input->post('job_hidden'));
		
		// $data_terima = [
		// 	'kode_transaksi' => $this->input->post('kode_transaksi'),
		// 	'tanggal' => $this->input->post('tanggal_masuk'),
		// 	'jam' => $this->input->post('jam_masuk'), 
		// 	'nama_pengguna' => $this->input->post('nama_pengguna'),
		// ];

		// $data_detail_terima = [];

		// for($i = 0; $i < $jumlah_barang_diterima; $i++){
		// 	array_push($data_detail_terima, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
		// 	$data_detail_terima[$i]['kode_job'] = $this->input->post('kode_komponen_hidden')[$i];
		// 	$data_detail_terima[$i]['job'] = $this->input->post('job_hidden')[$i];
		// 	$data_detail_terima[$i]['part_name'] = $this->input->post('part_name_hidden')[$i];
		// 	$data_detail_terima[$i]['jobdesc'] = $this->input->post('jobdesc_hidden')[$i];
		// 	$data_detail_terima[$i]['nama_mp'] = $this->input->post('nama_mp_hidden')[$i];
		// 	$data_detail_terima[$i]['bagus'] = $this->input->post('jumlah_bagus_hidden')[$i];
		// 	$data_detail_terima[$i]['rijek'] = $this->input->post('jumlah_rijek_hidden')[$i];
		// 	$data_detail_terima[$i]['nama_shift'] = $this->input->post('nama_shift_hidden')[$i];
		// 	$data_detail_terima[$i]['catatan'] = $this->input->post('catatan_hidden')[$i];
		// 	$data_detail_terima[$i]['id_barang'] = $this->input->post('id_barang_hidden')[$i];
		// }

		// if($this->m_hasilkerja->tambah($data_terima) && $this->m_hasilkerja->tambahDetail($data_detail_terima)){
		// 	for ($i=0; $i < $jumlah_barang_diterima ; $i++) { 
		// 		$this->m_hasilkerja->plus_stok($data_detail_terima[$i]['bagus'], $data_detail_terima[$i]['kode_job'], $data_detail_terima[$i]['rijek'], $data_detail_terima[$i]['id_barang']) or die('gagal min stok');
		// 	}
		// 	$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
		// 	redirect('Produksi/KemajuanProduksi');
		// }
	} 

	public function detail($kode_transaksi){
		$this->data['title'] = 'Detail';
		$this->data['title1'] = 'Semua Alat';
		$this->data['titleHead'] = 'Progress Produksi';
		$this->data['penerimaan'] = $this->m_hasilkerja->lihat_no_terima($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_hasilkerja->lihat_no_terima_detail($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('produksi/hasilKerja/kemajuanProduksi/detail', $this->data);
	}

	public function detail_standingWeight($kode_transaksi){
		$this->data['title'] = 'Detail'; 
		$this->data['title1'] = 'Standingweight';
		$this->data['titleHead'] = 'Progress Produksi';
		$this->data['penerimaan'] = $this->m_hasilkerja->lihat_no_terima($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_hasilkerja->detail_standingWeight($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('Produksi/hasilKerja/kemajuanProduksi/detail', $this->data);
	}

	public function detail_babyScale($kode_transaksi){
		$this->data['title'] = 'Detail';
		$this->data['title1'] = 'Babyscale';
		$this->data['titleHead'] = 'Progress Produksi';

		$this->data['penerimaan'] = $this->m_hasilkerja->lihat_no_terima($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_hasilkerja->detail_babyScale($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('Produksi/hasilKerja/kemajuanProduksi/detail', $this->data);
	}

	public function detail_stadioMeter($kode_transaksi){
		$this->data['title'] = 'Detail';
		$this->data['title1'] = 'Stadiometer';
		$this->data['titleHead'] = 'Progress Produksi';

		$this->data['penerimaan'] = $this->m_hasilkerja->lihat_no_terima($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_hasilkerja->detail_stadioMeter($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('Produksi/hasilKerja/kemajuanProduksi/detail', $this->data);
	}

	public function detail_infantoMeter($kode_transaksi){
		$this->data['title'] = 'Detail';
		$this->data['title1'] = 'Infantometer';
		$this->data['titleHead'] = 'Progress Produksi';

		$this->data['penerimaan'] = $this->m_hasilkerja->lihat_no_terima($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_hasilkerja->detail_infantoMeter($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('Produksi/hasilKerja/kemajuanProduksi/detail', $this->data);
	}

	public function detail_lila($kode_transaksi){
		$this->data['title'] = 'Detail';
		$this->data['title1'] = 'Lila';
		$this->data['titleHead'] = 'Progress Produksi';

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

	public function detailHapus($kode_komponen)
	{
		$this->data['title'] = 'Hapus';
		$this->data['titleHead'] = 'Detail | Hapus Barang';
		$this->data['barang'] = $this->m_hasilkerja->lihat_id($kode_komponen);

		$this->load->view('produksi/hasilKerja/kemajuanProduksi/hapusDetail', $this->data);
	}

	public function proses_detailHapus()
    { 
        $id_detail = $this->input->post('id_detail');
        $total_stok = $this->input->post('bagus');
        $kode_komponen = $this->input->post('kode_job');
 
        if ($this->m_hasilkerja->hapusDetail($id_detail)) {
            
            $this->m_hasilkerja->min_stok($total_stok,$kode_komponen) or die('gagal min stok'); 
            redirect('Produksi/KemajuanProduksi');
        }
    }

	public function ubah($kode_transaksi){ 
		$this->data['title'] = 'Tambah'; 
		$this->data['barang'] = $this->m_hasilkerja->lihat_id1($kode_transaksi);

		$this->load->view('produksi/hasilKerja/kemajuanProduksi/TambahEdit', $this->data);
	}

	public function tambahEdit_standingWeight($kode_transaksi){   
		$this->data['title'] = 'Standingweight';
		$this->data['titleHead'] = 'Tambah | Produksi';
		$this->data['all_barangHFNC'] = $this->m_hasilkerja->Stok_timbanganDewasa(); 
		$this->data['barang'] = $this->m_hasilkerja->lihat_id1($kode_transaksi);
		$dariDB = $this->m_hasilkerja->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();

		$this->load->view('produksi/hasilKerja/kemajuanProduksi/tambahEdit_standingWeight', $this->data);
	}

	public function tambahEdit_babyScale($kode_transaksi){   
		$this->data['title'] = 'BabyScale';
		$this->data['titleHead'] = 'Tambah | Produksi';
		$this->data['all_barangHFNC'] = $this->m_hasilkerja->Stok_timbanganBayi(); 
		$this->data['barang'] = $this->m_hasilkerja->lihat_id1($kode_transaksi);
		$dariDB = $this->m_hasilkerja->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();

		$this->load->view('produksi/hasilKerja/kemajuanProduksi/tambahEdit_babyScale', $this->data);
	}

	public function tambahEdit_stadioMeter($kode_transaksi){   
		$this->data['title'] = 'Stadiometer';
		$this->data['titleHead'] = 'Tambah | Produksi';
		$this->data['all_barangHFNC'] = $this->m_hasilkerja->Stok_stadioMeter(); 
		$this->data['barang'] = $this->m_hasilkerja->lihat_id1($kode_transaksi);
		$dariDB = $this->m_hasilkerja->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();

		$this->load->view('produksi/hasilKerja/kemajuanProduksi/tambahEdit_stadioMeter', $this->data);
	}

	public function tambahEdit_infantoMeter($kode_transaksi){   
		$this->data['title'] = 'Infantometer';
		$this->data['titleHead'] = 'Tambah | Produksi';
		$this->data['all_barangHFNC'] = $this->m_hasilkerja->Stok_infantoMeter(); 
		$this->data['barang'] = $this->m_hasilkerja->lihat_id1($kode_transaksi);
		$dariDB = $this->m_hasilkerja->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();

		$this->load->view('produksi/hasilKerja/kemajuanProduksi/tambahEdit_infantoMeter', $this->data);
	}

	public function tambahEdit_lila($kode_transaksi){   
		$this->data['title'] = 'Lila';
		$this->data['titleHead'] = 'Tambah | Produksi';
		$this->data['all_barangHFNC'] = $this->m_hasilkerja->Stok_lila(); 
		$this->data['barang'] = $this->m_hasilkerja->lihat_id1($kode_transaksi);
		$dariDB = $this->m_hasilkerja->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();

		$this->load->view('produksi/hasilKerja/kemajuanProduksi/tambahEdit_lila', $this->data);
	}

	public function proses_tambahEdit(){
		$jumlah_barang_diterima = count($this->input->post('job_hidden'));
		 
		$data_detail_terima = [];

		for($i = 0; $i < $jumlah_barang_diterima; $i++){
			array_push($data_detail_terima, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_terima[$i]['kode_job'] = $this->input->post('kode_komponen_hidden')[$i];
			$data_detail_terima[$i]['job'] = $this->input->post('job_hidden')[$i];
			$data_detail_terima[$i]['part_name'] = $this->input->post('part_name_hidden')[$i];
			$data_detail_terima[$i]['jobdesc'] = $this->input->post('jobdesc_hidden')[$i];
			$data_detail_terima[$i]['nama_mp'] = $this->input->post('nama_mp_hidden')[$i];
			$data_detail_terima[$i]['bagus'] = $this->input->post('jumlah_bagus_hidden')[$i];
			$data_detail_terima[$i]['rijek'] = $this->input->post('jumlah_rijek_hidden')[$i];
			$data_detail_terima[$i]['nama_shift'] = $this->input->post('nama_shift_hidden')[$i];
			$data_detail_terima[$i]['catatan'] = $this->input->post('catatan_hidden')[$i];
			$data_detail_terima[$i]['id_barang'] = $this->input->post('id_barang_hidden')[$i];
		}

		if($this->m_hasilkerja->tambahDetail($data_detail_terima)){
			for ($i=0; $i < $jumlah_barang_diterima ; $i++) { 
				$this->m_hasilkerja->plus_stok($data_detail_terima[$i]['bagus'], $data_detail_terima[$i]['kode_job'], $data_detail_terima[$i]['rijek'], $data_detail_terima[$i]['id_barang']) or die('gagal min stok');
			}
			//$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('Produksi/KemajuanProduksi');
		}
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

	

	
	public function tambahEdit($kode_transaksi){ 
		$this->data['title'] = 'Tambah Barang'; 
		$this->data['titleHead'] = 'Tambah | Barang';
		$this->data['all_komponen'] = $this->m_barang_elektro->lihat_stok_komponen(); 
		$this->data['all_komponen_hfnc'] = $this->m_barang_elektro->lihat_stok_komponen_Hfnc(); 

		$this->data['all_komponen1'] = $this->m_barang_elektro->getNamaBarang();  
		$this->data['barang'] = $this->m_barang_elektro->lihat_id1($kode_transaksi);

		$this->data['all_penerimaan'] = $this->m_penerimaan_elektro->lihat();


		$this->load->view('purchasingElektro/transaksiMasuk/tambahEdit/TambahEdit', $this->data);
	}

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

			//$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
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
			
		//	$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('PurchasingElektro/PenerimaanElektro');
		}
	} 
}