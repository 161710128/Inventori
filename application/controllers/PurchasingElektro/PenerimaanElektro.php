<?php 
class PenerimaanElektro extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta'); 
		$this->data['aktif'] = 'PenerimaanElektro';
		$this->load->model('purchasingElektro/M_barang_elektro', 'm_barang_elektro'); 
		$this->load->model('purchasingElektro/M_penerimaan_elektro', 'm_penerimaan_elektro');
		$this->load->model('purchasingElektro/M_DetailTerima_Elektro', 'm_detail_terima'); 
		$this->load->model('produksi/M_StokAlat', 'm_stok_alat');   

	}

	public function index(){
		$this->data['title'] = 'Transaksi Penerimaan Elektro';
		$this->data['all_penerimaan'] = $this->m_penerimaan_elektro->lihat();
		$this->data['no'] = 1;

		$this->load->view('purchasingElektro/transaksiMasuk/lihat', $this->data);
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

	public function detail($kode_transaksi){
		$this->data['title'] = 'Detail Penerimaan';
		$this->data['penerimaan'] = $this->m_penerimaan_elektro->lihat_no_terima($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_detail_terima->lihat_no_terima($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('purchasingElektro/transaksiMasuk/detail', $this->data);
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

	public function hapus($kode_transaksi){
		if($this->m_penerimaan_elektro->hapus($kode_transaksi) && $this->m_detail_terima->hapus($kode_transaksi)){
			$this->session->set_flashdata('success', 'Invoice Penerimaan <strong>Berhasil</strong> Dihapus!');
			redirect('purchasingElektro/PenerimaanElektro');
		} else {
			$this->session->set_flashdata('error', 'Invoice Penerimaan <strong>Gagal</strong> Dihapus!');
			redirect('purchasingElektro/PenerimaanElektro');
		}
	}
	
	public function tambahHfnc(){
		$this->data['title'] = 'Tambah Transaksi HFNC';
		$this->data['titleHead'] = 'Tambah | Elektro';
		$this->data['all_barangHFNC'] = $this->m_barang_elektro->Stok_Hfnc(); 
		$dariDB = $this->m_penerimaan_elektro->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->load->view('purchasingElektro/transaksiMasuk/tambahData/tambah_hfnc', $this->data);
	}

	public function tambahAntropometri(){




		$account = $this->input->post('tanggal_masuk');  
		$countDuplicate = $this->m_stok_alat->countDuplicate1($account);
		// $countDuplicate = $this->m_stok_alat->countDuplicate1($_POST['tanggal_masuk']);


		if(empty($countDuplicate)){
			$this->session->set_flashdata('sukses', 'Tanggal tidak Ada !');
			
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
		} else {
			$this->session->set_flashdata('gagal', 'Tanggal Sudah Ada !');

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



		// $this->data['title'] = 'Tambah Transaksi Antropometri';
		// $this->data['titleHead'] = 'Tambah | Antropometri';
		// $this->data['all_barangAntropometri'] = $this->m_barang_elektro->Stok_Antropometri(); 
		// $dariDB = $this->m_penerimaan_elektro->cekkodetransaksi(); 
        // $nourut = substr($dariDB, 2, 4);
		// $kodeBarangSekarang = $nourut + 1;
		// $this->data['kode_transaksi'] = $kodeBarangSekarang;
		// $this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		// $this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		
		// $this->load->view('purchasingElektro/transaksiMasuk/tambahData/tambah_antropometri', $this->data);
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



		// $keyword = $this->input->post('field_id'); 
		// $countDuplicate = $this->m_stok_alat->countDuplicate1($keyword);
		// // $countDuplicate = $this->m_stok_alat->countDuplicate1($_POST['tanggal_masuk']);


		// if(empty($countDuplicate)){
		// 	$this->session->set_flashdata('sukses', 'Tanggal tidak Ada !');
		// 	$this->data['title'] = 'Tambah Transaksi Timbangan Dewasa';
		// 	$this->data['titleHead'] = 'Tambah | Timbangan Dewasa';
		// 	$this->data['all_barangAntropometri'] = $this->m_barang_elektro->Stok_Antropometri(); 
		// 	$dariDB = $this->m_penerimaan_elektro->cekkodetransaksi(); 
		// 	$nourut = substr($dariDB, 2, 4);
		// 	$kodeBarangSekarang = $nourut + 1;
		// 	$this->data['kode_transaksi'] = $kodeBarangSekarang;
		// 	$this->data['all_barang'] = $this->m_barang_elektro->all_timbanganDewasa();
		// 	$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		// 	$this->load->view('purchasingElektro/transaksiMasuk/tambahData/tambah_timbanganDewasa', $this->data);
		// } else {
		// 	$this->session->set_flashdata('gagal', 'Tanggal Sudah Ada !');

		// 	$this->data['title'] = 'Tambah Transaksi Timbangan Dewasa';
		// 	$this->data['titleHead'] = 'Tambah | Timbangan Dewasa';
		// 	$this->data['all_barangAntropometri'] = $this->m_barang_elektro->Stok_Antropometri(); 
		// 	$dariDB = $this->m_penerimaan_elektro->cekkodetransaksi(); 
		// 	$nourut = substr($dariDB, 2, 4);
		// 	$kodeBarangSekarang = $nourut + 1;
		// 	$this->data['kode_transaksi'] = $kodeBarangSekarang;
		// 	$this->data['all_barang'] = $this->m_barang_elektro->all_timbanganDewasa();
		// 	$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		// 	$this->load->view('purchasingElektro/transaksiMasuk/tambahData/tambah_timbanganDewasa', $this->data);

		// }









		
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

	public function proses_tambah(){
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
			$data_detail_terima[$i]['stok_alat'] = $this->input->post('stok_alat_hidden')[$i];
			$data_detail_terima[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i];
		}

		if($this->m_penerimaan_elektro->tambah($data_terima) && $this->m_detail_terima->tambah($data_detail_terima)){
			for ($i=0; $i < $jumlah_barang_diterima ; $i++) {
				$this->m_barang_elektro->plus_stok($data_detail_terima[$i]['jumlah'], $data_detail_terima[$i]['kode_komponen'], $data_detail_terima[$i]['id_barang']) or die('gagal min stok');
			}
			$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('purchasingElektro/PenerimaanElektro');
		}
	}

	public function proses_tambahTransaksi(){ 

		$keyword = $this->input->post('tanggal_masuk'); 
		$countDuplicate = $this->m_penerimaan_elektro->countDuplicate1($keyword);
		// $countDuplicate = $this->m_stok_alat->countDuplicate1($_POST['tanggal_masuk']);

		if(empty($countDuplicate)){
			// $this->session->set_flashdata('sukses', 'Tanggal tidak Ada !');
			// redirect('purchasingElektro/PenerimaanElektro/tambahTransaksi');

			$data_terima = [
				'kode_transaksi' => $this->input->post('kode_transaksi'),
				'tanggal_masuk' => $this->input->post('tanggal_masuk'),
				'jam_masuk' => $this->input->post('jam_masuk'), 
				'nama_pengguna' => $this->input->post('nama_pengguna'),
			]; 
			$this->m_penerimaan_elektro->tambah($data_terima) ;
			redirect('purchasingElektro/PenerimaanElektro');

		} else {
			$this->session->set_flashdata('gagal', 'Tanggal Sudah Ada !');
			redirect('purchasingElektro/PenerimaanElektro/tambahTransaksi');

		}
		
		// $data_terima = [
		// 	'kode_transaksi' => $this->input->post('kode_transaksi'),
		// 	'tanggal_masuk' => $this->input->post('tanggal_masuk'),
		// 	'jam_masuk' => $this->input->post('jam_masuk'), 
		// 	'nama_pengguna' => $this->input->post('nama_pengguna'),
			
		// ]; 
		// $this->m_penerimaan_elektro->tambah($data_terima) ;
		// redirect('purchasingElektro/PenerimaanElektro');
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
			

			$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('purchasingElektro/PenerimaanElektro');

			
		}
	}


	// public function proses_tambahTimbanganDewasa1(){
		 
	// 	$keyword = $this->input->post('tanggal_masuk'); 
	// 	$countDuplicate = $this->m_stok_alat->countDuplicate1($keyword);
	// 	// $countDuplicate = $this->m_stok_alat->countDuplicate1($_POST['tanggal_masuk']);

	// 	// if(empty($countDuplicate)){
	// 	// 	$this->session->set_flashdata('sukses', 'Tanggal tidak Ada !');
	// 	// 	$this->data['title'] = 'Tambah Transaksi Timbangan Dewasa';
	// 	// 	$this->data['titleHead'] = 'Tambah | Timbangan Dewasa';
	// 	// 	$this->data['all_barangAntropometri'] = $this->m_barang_elektro->Stok_Antropometri(); 
	// 	// 	$dariDB = $this->m_penerimaan_elektro->cekkodetransaksi(); 
	// 	// 	$nourut = substr($dariDB, 2, 4);
	// 	// 	$kodeBarangSekarang = $nourut + 1;
	// 	// 	$this->data['kode_transaksi'] = $kodeBarangSekarang;
	// 	// 	$this->data['all_barang'] = $this->m_barang_elektro->all_timbanganDewasa();
	// 	// 	$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();

	// 	// 	$this->load->view('purchasingElektro/transaksiMasuk/tambahData/tambah_timbanganDewasa', $this->data);

	// 	// } else {
	// 	// 	$this->session->set_flashdata('gagal', 'Tanggal Sudah Ada !');

	// 	// 	$this->data['title'] = 'Tambah Transaksi Timbangan Dewasa';
	// 	// 	$this->data['titleHead'] = 'Tambah | Timbangan Dewasa';
	// 	// 	$this->data['all_barangAntropometri'] = $this->m_barang_elektro->Stok_Antropometri(); 
	// 	// 	$dariDB = $this->m_penerimaan_elektro->cekkodetransaksi(); 
	// 	// 	$nourut = substr($dariDB, 2, 4);
	// 	// 	$kodeBarangSekarang = $nourut + 1;
	// 	// 	$this->data['kode_transaksi'] = $kodeBarangSekarang;
	// 	// 	$this->data['all_barang'] = $this->m_barang_elektro->all_timbanganDewasa();
	// 	// 	$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
	// 	// 	$this->load->view('purchasingElektro/transaksiMasuk/tambahData/tambah_timbanganDewasa', $this->data);

	// 	// }





	// 	if(!empty($countDuplicate)){
	// 		$this->session->set_flashdata('gagal', 'Tanggal Sudah Ada !');

	// 		$this->data['title'] = 'Tambah Transaksi Timbangan Dewasa';
	// 		$this->data['titleHead'] = 'Tambah | Timbangan Dewasa';
	// 		$this->data['all_barangAntropometri'] = $this->m_barang_elektro->Stok_Antropometri(); 
	// 		$dariDB = $this->m_penerimaan_elektro->cekkodetransaksi(); 
	// 		$nourut = substr($dariDB, 2, 4);
	// 		$kodeBarangSekarang = $nourut + 1;
	// 		$this->data['kode_transaksi'] = $kodeBarangSekarang;
	// 		$this->data['all_barang'] = $this->m_barang_elektro->all_timbanganDewasa();
	// 		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
	// 		$this->load->view('purchasingElektro/transaksiMasuk/tambahData/tambah_timbanganDewasa', $this->data);
	// 	}  





	// }

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
			$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('PurchasingElektro/PenerimaanElektro'); 
		}
	}
	
	public function get_all_barang(){

		// // $keyword = $this->input->post('tanggal_masuk'); 
		// // $countDuplicate = $this->m_stok_alat->countDuplicate1($keyword);
		// $countDuplicate = $this->m_stok_alat->countDuplicate1($_POST['tanggal_masuk']);

		// if(empty($countDuplicate)){
		// 	$this->session->set_flashdata('sukses', 'Tanggal tidak Ada !');
		// 	// $this->data['title'] = 'Tambah Transaksi Timbangan Dewasa';
		// 	// $this->data['titleHead'] = 'Tambah | Timbangan Dewasa';
		// 	// $this->data['all_barangAntropometri'] = $this->m_barang_elektro->Stok_Antropometri(); 
		// 	// $dariDB = $this->m_penerimaan_elektro->cekkodetransaksi(); 
		// 	// $nourut = substr($dariDB, 2, 4);
		// 	// $kodeBarangSekarang = $nourut + 1;
		// 	// $this->data['kode_transaksi'] = $kodeBarangSekarang;
		// 	// $this->data['all_barang'] = $this->m_barang_elektro->all_timbanganDewasa();
		// 	// $this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		// 	// $this->load->view('purchasingElektro/transaksiMasuk/tambahData/tambah_timbanganDewasa', $this->data);
		// } else {
		// 	$this->session->set_flashdata('gagal', 'Tanggal Sudah Ada !');

		// 	// $this->data['title'] = 'Tambah Transaksi Timbangan Dewasa';
		// 	// $this->data['titleHead'] = 'Tambah | Timbangan Dewasa';
		// 	// $this->data['all_barangAntropometri'] = $this->m_barang_elektro->Stok_Antropometri(); 
		// 	// $dariDB = $this->m_penerimaan_elektro->cekkodetransaksi(); 
		// 	// $nourut = substr($dariDB, 2, 4);
		// 	// $kodeBarangSekarang = $nourut + 1;
		// 	// $this->data['kode_transaksi'] = $kodeBarangSekarang;
		// 	// $this->data['all_barang'] = $this->m_barang_elektro->all_timbanganDewasa();
		// 	// $this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		// 	// $this->load->view('purchasingElektro/transaksiMasuk/tambahData/tambah_timbanganDewasa', $this->data);

		// }

		$data = $this->m_barang_elektro->lihat_nama_barang($_POST['kode_komponen']);
		echo json_encode($data);
	}

	public function keranjang_barang(){
		
// $keyword = $this->input->post('tanggal_masuk'); 
		// $countDuplicate = $this->m_stok_alat->countDuplicate1($keyword);


		// $countDuplicate = $this->m_stok_alat->countDuplicate1($_POST['tanggal_masuk']);

		// if(empty($countDuplicate)){
		// 	$this->session->set_flashdata('sukses', 'Tanggal tidak Ada !');
		// 	$this->data['title'] = 'Tambah Transaksi Timbangan Dewasa';
		// 	$this->data['titleHead'] = 'Tambah | Timbangan Dewasa';
		// 	$this->data['all_barangAntropometri'] = $this->m_barang_elektro->Stok_Antropometri(); 
		// 	$dariDB = $this->m_penerimaan_elektro->cekkodetransaksi(); 
		// 	$nourut = substr($dariDB, 2, 4);
		// 	$kodeBarangSekarang = $nourut + 1;
		// 	$this->data['kode_transaksi'] = $kodeBarangSekarang;
		// 	$this->data['all_barang'] = $this->m_barang_elektro->all_timbanganDewasa();
		// 	$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		// 	$this->load->view('purchasingElektro/transaksiMasuk/tambahData/tambah_timbanganDewasa', $this->data);
		// } else {
		// 	$this->session->set_flashdata('gagal', 'Tanggal Sudah Ada !');

		// 	$this->data['title'] = 'Tambah Transaksi Timbangan Dewasa';
		// 	$this->data['titleHead'] = 'Tambah | Timbangan Dewasa';
		// 	$this->data['all_barangAntropometri'] = $this->m_barang_elektro->Stok_Antropometri(); 
		// 	$dariDB = $this->m_penerimaan_elektro->cekkodetransaksi(); 
		// 	$nourut = substr($dariDB, 2, 4);
		// 	$kodeBarangSekarang = $nourut + 1;
		// 	$this->data['kode_transaksi'] = $kodeBarangSekarang;
		// 	$this->data['all_barang'] = $this->m_barang_elektro->all_timbanganDewasa();
		// 	$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		// 	$this->load->view('purchasingElektro/transaksiMasuk/tambahData/tambah_timbanganDewasa', $this->data);

		// }





		$this->load->view('purchasingElektro/transaksiMasuk/keranjang');
	}

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

			$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
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
			$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
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
			
			$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('PurchasingElektro/PenerimaanElektro');
		}
	} 
}