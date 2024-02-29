<?php 
class PengambilanElektro extends CI_Controller{
	public function __construct(){
		parent::__construct(); 
		date_default_timezone_set('Asia/Jakarta'); 
		$this->data['aktif'] = 'PengambilanElektro';
		$this->load->model('purchasingElektro/M_barang_elektro', 'm_barang_elektro');
		$this->load->model('purchasingElektro/M_PengambilanElektro', 'm_pengambilanelektro'); 
		$this->load->model('purchasingElektro/M_DetailTerima_Pengambilan', 'm_detailterima_pengambilan'); 
		$this->load->model('purchasingElektro/M_Report', 'm_report'); 
	}

	public function index(){
		$this->data['title'] = 'Tabel Pengambilan Komponen';
		$this->data['all_penerimaan'] = $this->m_pengambilanelektro->lihat();
		$this->data['no'] = 1;

		$this->load->view('purchasingElektro/pengambilan/lihat', $this->data);
	}

	public function tambah(){
		$this->data['title'] = 'Tambah Transaksi';
		$this->data['all_komponen'] = $this->m_barang_elektro->lihat_stok_komponen();  
		$dariDB = $this->m_pengambilanelektro->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = (int)$nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang; 

		$this->load->view('purchasingElektro/pengambilan/tambahData/tambah', $this->data);
	} 

	public function tambahHfnc(){
		$this->data['title'] = 'Tambah Transaksi HFNC';
		$this->data['titleHead'] = 'PengambilanElektro | HFNC';
		$this->data['all_barangHFNC'] = $this->m_barang_elektro->StokKurang_Hfnc(); 
		$dariDB = $this->m_pengambilanelektro->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->load->view('purchasingElektro/pengambilan/tambahData/tambah_hfnc', $this->data);
	}

	public function tambahAntropometri(){
		$this->data['title'] = 'Tambah Transaksi Antropometri';
		$this->data['titleHead'] = 'PengambilanElektro | Antropometri';
		$this->data['all_barangHFNC'] = $this->m_barang_elektro->StokKurang_Antropometri(); 
		$dariDB = $this->m_pengambilanelektro->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->load->view('purchasingElektro/pengambilan/tambahData/tambah_Antropometri', $this->data);
	}

	public function tambahTimbanganDewasa(){
		$this->data['title'] = 'Tambah Transaksi Timbangan Dewasa';
		$this->data['titleHead'] = 'PengambilanElektro | Timbangan Dewasa';
		$this->data['all_barangDewasa'] = $this->m_barang_elektro->all_timbanganDewasa(); 
		$dariDB = $this->m_pengambilanelektro->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->load->view('purchasingElektro/pengambilan/tambahData/tambah_timbanganDewasa', $this->data);
	}

	public function tambahTimbanganBayi(){
		$this->data['title'] = 'Tambah Transaksi Timbangan Bayi';
		$this->data['titleHead'] = 'PengambilanElektro | Timbangan Bayi';
		$this->data['all_barangDewasa'] = $this->m_barang_elektro->all_timbanganBayi(); 
		$dariDB = $this->m_pengambilanelektro->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang(); 
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->load->view('purchasingElektro/pengambilan/tambahData/tambah_timbanganBayi', $this->data);
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

		if($this->m_pengambilanelektro->tambah($data_keluar) && $this->m_detailterima_pengambilan->tambah($data_detail_keluar)){
			 
			$this->session->set_flashdata('success', 'Invoice <strong>Pengeluaran</strong> Berhasil Dibuat!');
			redirect('PurchasingElektro/PengambilanElektro');
		}
	} 

	

	public function proses_tambahTransaksi(){ 
		$keyword = $this->input->post('tanggal_keluar'); 
		$countDuplicate = $this->m_pengambilanelektro->countDuplicate1($keyword);

		if(empty($countDuplicate)){
			// $this->session->set_flashdata('sukses', 'Tanggal tidak Ada !');
			// redirect('purchasingElektro/PengambilanElektro/tambah');

			$data_keluar = [
			'kode_transaksi' => $this->input->post('kode_transaksi'),
			'tanggal_keluar' => $this->input->post('tanggal_keluar'),
			'jam_keluar' => $this->input->post('jam_keluar'), 
			'nama_pengguna' => $this->input->post('nama_pengguna'),
			]; 

			$this->m_pengambilanelektro->tambah($data_keluar) ;
			redirect('PurchasingElektro/PengambilanElektro');

		} else {
			$this->session->set_flashdata('gagal', 'Tanggal Sudah Ada !');
			redirect('purchasingElektro/PengambilanElektro/tambah');

		}



		
		// $data_keluar = [
		// 	'kode_transaksi' => $this->input->post('kode_transaksi'),
		// 	'tanggal_keluar' => $this->input->post('tanggal_keluar'),
		// 	'jam_keluar' => $this->input->post('jam_keluar'), 
		// 	'nama_pengguna' => $this->input->post('nama_pengguna'),
		// ]; 

		// $this->m_pengambilanelektro->tambah($data_keluar)
		// redirect('PurchasingElektro/PengambilanElektro');
		
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

		if($this->m_pengambilanelektro->tambah($data_keluar) && $this->m_detailterima_pengambilan->tambah($data_detail_keluar)){
			 
			$this->session->set_flashdata('success', 'Invoice <strong>Pengeluaran</strong> Berhasil Dibuat!');
			redirect('PurchasingElektro/PengambilanElektro');
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

		if($this->m_pengambilanelektro->tambah($data_keluar) && $this->m_detailterima_pengambilan->tambah($data_detail_keluar)){
			 
			$this->session->set_flashdata('success', 'Invoice <strong>Pengeluaran</strong> Berhasil Dibuat!');
			redirect('PurchasingElektro/PengambilanElektro');
		}
	}

	
	public function prosesTambahEdit()
	{
		$jumlah_barang_dikeluar = count($this->input->post('nama_barang_hidden')); 
		$data_detail_keluar = [];

		for ($i = 0; $i < $jumlah_barang_dikeluar; $i++) {
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

		if ($this->m_detailterima_pengambilan->tambah($data_detail_keluar)) {
			for ($i = 0; $i < $jumlah_barang_dikeluar; $i++) {
				// $this->m_barang_elektro->min_stok($data_detail_keluar[$i]['jumlah'], $data_detail_keluar[$i]['kode_komponen'], $data_detail_keluar[$i]['id_barang']) or die('gagal min stok'); 
			}
			$this->session->set_flashdata('success', 'Invoice <strong>Pengeluaran</strong> Berhasil Dibuat!');
			redirect('PurchasingElektro/PengambilanElektro');
		}
	} 
 
	public function ubah($kode_transaksi){ 

		$this->data['title'] = 'Ubah Barang';
		$this->data['barang'] = $this->m_pengambilanelektro->lihat_id($kode_transaksi);

		$this->load->view('purchasingElektro/pengambilan/tambahEdit/TambahEdit', $this->data);
	}

	public function tambahUbah_Hfnc($kode_transaksi){ 
		$this->data['title'] = 'Tambah Barang HFNC';
		$this->data['titleHead'] = 'TambahBarang | HFNC ';
		$this->data['all_komponen'] = $this->m_barang_elektro->lihat_stok_komponen_Hfnc();  
		$this->data['all_komponen1'] = $this->m_barang_elektro->getNamaBarang();  		
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->data['all_barangHFNC'] = $this->m_barang_elektro->StokKurang_Hfnc();
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['barang'] = $this->m_pengambilanelektro->lihat_id($kode_transaksi);

		$this->load->view('purchasingElektro/pengambilan/tambahEdit/TambahEdit_hfnc', $this->data);
	}

	public function tambahUbah_Antropometri($kode_transaksi){ 
		$this->data['title'] = 'Tambah Barang Antropometri';
		$this->data['titleHead'] = 'TambahBarang | Antropometri';  		
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->data['all_barangHFNC'] = $this->m_barang_elektro->StokKurang_Hfnc();
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['barang'] = $this->m_pengambilanelektro->lihat_id($kode_transaksi);

		$this->load->view('purchasingElektro/pengambilan/tambahEdit/TambahEdit_antropometri', $this->data);
	}

	public function tambahUbah_timbanganDewasa($kode_transaksi){ 
		$this->data['title'] = 'Tambah Barang Timbangan Dewasa';
		$this->data['titleHead'] = 'TambahBarang | Timbangan Dewasa';  		
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->data['all_barangHFNC'] = $this->m_barang_elektro->StokKurang_TimbanganDewasa();
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['barang'] = $this->m_pengambilanelektro->lihat_id($kode_transaksi);

		$this->load->view('purchasingElektro/pengambilan/tambahEdit/TambahEdit_timbanganDewasa', $this->data);
	}

	public function tambahUbah_timbanganBayi($kode_transaksi){ 
		$this->data['title'] = 'Tambah Barang Timbangan Bayi';
		$this->data['titleHead'] = 'TambahBarang | TimbanganBayi'; 		
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->data['all_barangHFNC'] = $this->m_barang_elektro->StokKurang_TimbanganBayi();
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->data['barang'] = $this->m_pengambilanelektro->lihat_id($kode_transaksi);

		$this->load->view('purchasingElektro/pengambilan/tambahEdit/TambahEdit_timbanganBayi', $this->data);
	}


	public function proses_ubah($komponen){ 

		$data = [ 
			'nama_komponen' => $this->input->post('nama_komponen'),
			'jumlah' => $this->input->post('jumlah'),
			'pengambil' => $this->input->post('pengambil'), 
		];

		if($this->m_pengambilanelektro->ubah($data, $komponen)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('PurchasingElektro/PengambilanElektro');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('PurchasingElektro/PengambilanElektro');
		}
	}
 
	public function hapus($kode_transaksi){
		if($this->m_pengambilanelektro->hapus($kode_transaksi) && $this->m_detailterima_pengambilan->hapus($kode_transaksi)){
			$this->session->set_flashdata('success', 'Invoice Penerimaan <strong>Berhasil</strong> Dihapus!');
			redirect('PurchasingElektro/PengambilanElektro');
		} else {
			$this->session->set_flashdata('error', 'Invoice Penerimaan <strong>Gagal</strong> Dihapus!');
			redirect('PurchasingElektro/PengambilanElektro');
		}
	}

	public function get_all_barang(){
		$data = $this->m_barang_elektro->lihat_nama_barang($_POST['kode_komponen']);
		echo json_encode($data);
	}

	public function keranjang_barang(){
		$this->load->view('purchasingElektro/pengambilan/keranjang');
	}

	public function detail($kode_transaksi){
		$this->data['title'] = 'Detail Pengeluaran';
		$this->data['penerimaan'] = $this->m_pengambilanelektro->lihat_no_terima($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_detailterima_pengambilan->lihat_no_terima($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('purchasingElektro/pengambilan/detail', $this->data);
	}  
}