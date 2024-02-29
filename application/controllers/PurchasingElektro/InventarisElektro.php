<?php 
class InventarisElektro extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->data['aktif'] = 'InventarisElektro'; 
		$this->load->model('purchasingElektro/M_InventarisElektro', 'm_inventariselektro');
		$this->load->model('purchasingElektro/M_barang_elektro', 'm_barang_elektro');
		$this->load->model('purchasingElektro/M_Detail_InventarisElektro', 'm_detail_inventaris_elektro');
	}

	public function index(){
		$this->data['title'] = 'Tabel Pengambilan HNFC01';
		$this->data['all_penerimaan'] = $this->m_inventariselektro->lihat();
		$this->data['all_test'] = $this->m_inventariselektro->cekmaxTanggal(); 
		$this->data['all_test1'] = date('d/m/Y'); 
		$this->data['no'] = 1;

		$this->load->view('purchasingElektro/InventarisElektro/lihat', $this->data);
	} 

	public function tambahUbah($kode_transaksi){ 
		$this->data['title'] = 'Tambah Barang Timbangan Dewasa';
		$this->data['titleHead'] = 'TambahBarang | Timbangan Dewasa';
		$this->data['all_komponen'] = $this->m_barang_elektro->lihat_stok_komponen_Antropometri();  
		$this->data['all_komponen1'] = $this->m_barang_elektro->getNamaBarang();  
		$this->data['barang'] = $this->m_barang_elektro->lihat_id3($kode_transaksi);	
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil();
		$this->data['all_barangHFNC'] = $this->m_barang_elektro->lihatStokKomponen_timbanganBayi();
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();

		$this->load->view('purchasingElektro/InventarisElektro/tambahEdit', $this->data);
	}

	public function tambah(){
		$this->data['title'] = 'Tambah Transaksi'; 

		$dariDB = $this->m_inventariselektro->cekkodetransaksi(); 
        $nourut = substr($dariDB, 3, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;  
		$this->data['all_pengambil'] = $this->m_barang_elektro->AllPengambil(); 
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();

		$this->load->view('purchasingElektro/InventarisElektro/tambah', $this->data);
	}

	public function keranjang_barang(){
		$this->load->view('purchasingElektro/InventarisElektro/keranjang');
	}

	public function detail($kode_transaksi){
		$this->data['title'] = 'Detail Keluar';
		$this->data['penerimaan'] = $this->m_inventariselektro->lihat_no_terima($kode_transaksi);
		$this->data['all_detail_terima'] = $this->m_detail_inventaris_elektro->lihat_no_terima($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('purchasingElektro/InventarisElektro/detail', $this->data);
	} 

	public function proses_tambah(){
		$jumlah_barang_diterima = count($this->input->post('nama_barang_hidden'));   
 

		$data_terima = [
			'kode_transaksi' => $this->input->post('kode_transaksi'),
			'jam' => $this->input->post('jam'),  
			'tanggal' => $this->input->post('tanggal'),
			'nama_pengguna' => $this->input->post('nama_pengguna'),
		];

		$data_detail_terima = [];

		for($i = 0; $i < $jumlah_barang_diterima; $i++){ 
			array_push($data_detail_terima, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_terima[$i]['nama_komponen'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_terima[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_terima[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_terima[$i]['peruntukan'] = $this->input->post('peruntukan_hidden')[$i];  
			$data_detail_terima[$i]['pengambil'] = $this->input->post('pengambil_hidden')[$i];  
		} 
		
		if($this->m_inventariselektro->tambah($data_terima) && $this->m_detail_inventaris_elektro->tambah($data_detail_terima)){ 
			$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('purchasingElektro/InventarisElektro');
		} 
	} 

	public function proses_tambahTransaksi(){
		$keyword = $this->input->post('tanggal_keluar'); 
		$countDuplicate = $this->m_inventariselektro->countDuplicate1($keyword);
		// $countDuplicate = $this->m_stok_alat->countDuplicate1($_POST['tanggal_masuk']);

		if(empty($countDuplicate)){
			// $this->session->set_flashdata('sukses', 'Tanggal tidak Ada !'); 
			$data_terima = [
				'kode_transaksi' => $this->input->post('kode_transaksi'),
				'jam' => $this->input->post('jam_keluar'),  
				'tanggal' => $this->input->post('tanggal_keluar'),
				'nama_pengguna' => $this->input->post('nama_pengguna'),
			];
			
			$this->m_inventariselektro->tambah($data_terima);
			redirect('purchasingElektro/InventarisElektro'); 

			// $data_terima = [
			// 	'kode_transaksi' => $this->input->post('kode_transaksi'),
			// 	'tanggal_masuk' => $this->input->post('tanggal_masuk'),
			// 	'jam_masuk' => $this->input->post('jam_masuk'), 
			// 	'nama_pengguna' => $this->input->post('nama_pengguna'),
			// ]; 
			// $this->m_penerimaan_elektro->tambah($data_terima) ;
			// redirect('purchasingElektro/PenerimaanElektro');

		} else {
			$this->session->set_flashdata('gagal', 'Tanggal Sudah Ada !');
			redirect('purchasingElektro/InventarisElektro/tambah');

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

	public function proses_tambahEdit(){
		$jumlah_barang_diterima = count($this->input->post('nama_barang_hidden'));   
  

		$data_detail_terima = [];

		for($i = 0; $i < $jumlah_barang_diterima; $i++){ 
			array_push($data_detail_terima, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_terima[$i]['nama_komponen'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_terima[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_terima[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_terima[$i]['peruntukan'] = $this->input->post('peruntukan_hidden')[$i];  
			$data_detail_terima[$i]['pengambil'] = $this->input->post('pengambil_hidden')[$i];  
		} 
		
		if($this->m_detail_inventaris_elektro->tambah($data_detail_terima)){ 
			$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('purchasingElektro/InventarisElektro');
		} 
	} 

	public function hapus($kode_transaksi){
		if($this->m_inventariselektro->hapus($kode_transaksi) && $this->m_detail_inventaris_elektro->hapus($kode_transaksi)){
			$this->session->set_flashdata('success', 'Invoice Penerimaan <strong>Berhasil</strong> Dihapus!');
			redirect('purchasingElektro/InventarisElektro');
		} else {
			$this->session->set_flashdata('error', 'Invoice Penerimaan <strong>Gagal</strong> Dihapus!');
			redirect('purchasingElektro/InventarisElektro');
		}
	} 
}