<?php 
class SisaBahan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'super' && $this->session->login['role'] != 'mekanik') redirect();
		$this->data['aktif'] = 'SisaBahan';
		$this->load->model('purchasingMekanik/M_SisaBahan', 'm_sisa_bahan');
		$this->load->model('purchasingMekanik/M_barang_mekanik', 'm_barang_mekanik');
		$this->load->model('purchasingMekanik/M_pengeluaran_mekanik', 'm_pengeluaran_mekanik');


	}

	public function index(){
		$this->data['title'] = 'Data Sisa Barang'; 
		$this->data['titleHead'] = 'Data Barang';
		$this->data['all_barang'] = $this->m_sisa_bahan->lihat(); 
		$this->data['no'] = 1;

		$this->load->view('purchasingMekanik/barangSisa/sisaBahan/lihat', $this->data); 
	} 

	public function tambah_hfnc()
	{
		$this->data['title'] = 'Sisa Bahan HFNC';
		$this->data['all_komponen'] = $this->m_barang_mekanik->tampil_komponen();
		$dariDB = $this->m_sisa_bahan->cekkodetransaksi1();
		
		if(empty($dariDB)){
    		$kodeBarangSekarang = '001'; 
    		$this->data['kode_transaksi'] = $kodeBarangSekarang;  
    		$this->data['titleHead'] = 'DataBarang | HFNC';
    		$this->data['all_barangHFNC'] = $this->m_barang_mekanik->HFNC();
    		$this->data['all_barang'] = $this->m_barang_mekanik->AllBarang();
    		$this->data['all_pengambil'] = $this->m_barang_mekanik->AllPengambil();
    		$this->data['no'] = 1;
    		
    		$this->load->view('purchasingMekanik/barangSisa/sisaBahan/tambahData/tambah_hfnc', $this->data);
		}else{
	    	$nourut = substr($dariDB, 2, 4);
    		$kodeBarangSekarang = $nourut + 1;
    		$this->data['kode_transaksi'] = $kodeBarangSekarang;  
    		$this->data['titleHead'] = 'DataBarang | HFNC';
    		$this->data['all_barangHFNC'] = $this->m_barang_mekanik->HFNC();
    		$this->data['all_barang'] = $this->m_barang_mekanik->AllBarang();
    		$this->data['all_pengambil'] = $this->m_barang_mekanik->AllPengambil();
    		$this->data['no'] = 1;
    		
    		$this->load->view('purchasingMekanik/barangSisa/sisaBahan/tambahData/tambah_hfnc', $this->data);
		}
		
		
	
	}

	public function tambah_antropometri()
	{
		$this->data['title'] = 'Sisa Bahan Antropometri';
		$this->data['all_komponen'] = $this->m_barang_mekanik->tampil_komponen();
		$dariDB = $this->m_sisa_bahan->cekkodetransaksi1();
		
		if(empty($dariDB)){
    		$kodeBarangSekarang = '001'; 
    		$this->data['kode_transaksi'] = $kodeBarangSekarang;  
    		$this->data['titleHead'] = 'DataBarang | Antropometri';
    		$this->data['all_barangHFNC'] = $this->m_barang_mekanik->Antropometri();
    		$this->data['all_barang'] = $this->m_barang_mekanik->AllBarang();
    		$this->data['all_pengambil'] = $this->m_barang_mekanik->AllPengambil();
    		$this->data['no'] = 1;
    		
    		$this->load->view('purchasingMekanik/barangSisa/sisaBahan/tambahData/tambah_antropometri', $this->data);
		}else{
		    $nourut = substr($dariDB, 2, 4);
    		$kodeBarangSekarang = $nourut + 1;
    		$this->data['kode_transaksi'] = $kodeBarangSekarang;  
    		$this->data['titleHead'] = 'DataBarang | Antropometri';
    		$this->data['all_barangHFNC'] = $this->m_barang_mekanik->Antropometri();
    		$this->data['all_barang'] = $this->m_barang_mekanik->AllBarang();
    		$this->data['all_pengambil'] = $this->m_barang_mekanik->AllPengambil();
    		$this->data['no'] = 1;
    		
    		$this->load->view('purchasingMekanik/barangSisa/sisaBahan/tambahData/tambah_antropometri', $this->data);
		} 
	}

	public function get_all_barang()
	{
		$data = $this->m_barang_mekanik->lihat_nama_barang($_POST['kode_komponen']);
		echo json_encode($data);
	}

	public function keranjang_barang()
	{
		$this->load->view('purchasingMekanik/barangSisa/sisaBahan/keranjang');
	} 

	public function proses_tambahBahan_hfnc()
	{
		$jumlah_barang_dikeluar = count($this->input->post('nama_barang_hidden'));

		// $data_keluar = [
		// 	'kode_transaksi' => $this->input->post('kode_transaksi'),
		// 	'tanggal_keluar' => $this->input->post('tanggal_keluar'),
		// 	'jam_keluar' => $this->input->post('jam_keluar'),
		// 	'nama_pengguna' => $this->input->post('nama_pengguna'),
		// 	//'keterangan' => $this->input->post('keterangan'),
		// ];

		$data_detail_keluar = []; 

		for ($i = 0; $i < $jumlah_barang_dikeluar; $i++) {
			array_push($data_detail_keluar, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_keluar[$i]['kode_komponen'] = $this->input->post('kode_barang_hidden')[$i];
			$data_detail_keluar[$i]['nama_komponen'] = $this->input->post('nama_barang_hidden')[$i];
			// $data_detail_keluar[$i]['pengambil'] = $this->input->post('pengambil_hidden')[$i]; 
			$data_detail_keluar[$i]['spesifikasi'] = $this->input->post('spesifikasi_hidden')[$i]; 
			$data_detail_keluar[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_keluar[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_keluar[$i]['tanggal'] = $this->input->post('tanggal_hidden')[$i];
			$data_detail_keluar[$i]['jam'] = $this->input->post('jam_hidden')[$i];
			// $data_detail_keluar[$i]['peruntukan'] = $this->input->post('peruntukan_hidden')[$i];
			$data_detail_keluar[$i]['id_barangm'] = $this->input->post('id_barang_hidden')[$i];
			$data_detail_keluar[$i]['status'] = "free";
			// $data_detail_keluar[$i]['stok_alat'] = "hfnc";
		}

		if ($this->m_sisa_bahan->tambah($data_detail_keluar)) {
			// for ($i = 0; $i < $jumlah_barang_dikeluar; $i++) {
 			// 	$this->m_barang_mekanik->min_stok($data_detail_keluar[$i]['jumlah'], $data_detail_keluar[$i]['kode_komponen']) or die('gagal min stok');
			// }
			// $this->session->set_flashdata('success', 'Invoice <strong>Pengeluaran</strong> Berhasil Dibuat!');
			redirect('PurchasingMekanik/SisaBahan');
		}
	}

	public function proses_tambahBahan_antropometri()
	{
		$jumlah_barang_dikeluar = count($this->input->post('nama_barang_hidden'));

		// $data_keluar = [
		// 	'kode_transaksi' => $this->input->post('kode_transaksi'),
		// 	'tanggal_keluar' => $this->input->post('tanggal_keluar'),
		// 	'jam_keluar' => $this->input->post('jam_keluar'),
		// 	'nama_pengguna' => $this->input->post('nama_pengguna'),
		// 	//'keterangan' => $this->input->post('keterangan'),
		// ];

		$data_detail_keluar = []; 

		for ($i = 0; $i < $jumlah_barang_dikeluar; $i++) {
			array_push($data_detail_keluar, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_keluar[$i]['kode_komponen'] = $this->input->post('kode_barang_hidden')[$i];
			$data_detail_keluar[$i]['nama_komponen'] = $this->input->post('nama_barang_hidden')[$i];
			// $data_detail_keluar[$i]['pengambil'] = $this->input->post('pengambil_hidden')[$i]; 
			$data_detail_keluar[$i]['spesifikasi'] = $this->input->post('spesifikasi_hidden')[$i]; 
			$data_detail_keluar[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_keluar[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_keluar[$i]['tanggal'] = $this->input->post('tanggal_hidden')[$i];
			$data_detail_keluar[$i]['jam'] = $this->input->post('jam_hidden')[$i];
			// $data_detail_keluar[$i]['peruntukan'] = $this->input->post('peruntukan_hidden')[$i];
			$data_detail_keluar[$i]['id_barangm'] = $this->input->post('id_barang_hidden')[$i];
			$data_detail_keluar[$i]['status'] = "free";
			// $data_detail_keluar[$i]['stok_alat'] = "antropometri";
		}

		if ($this->m_sisa_bahan->tambah($data_detail_keluar)) {
			// for ($i = 0; $i < $jumlah_barang_dikeluar; $i++) {
 			// 	$this->m_barang_mekanik->min_stok($data_detail_keluar[$i]['jumlah'], $data_detail_keluar[$i]['kode_komponen']) or die('gagal min stok');
			// }
			// $this->session->set_flashdata('success', 'Invoice <strong>Pengeluaran</strong> Berhasil Dibuat!');
			redirect('PurchasingMekanik/SisaBahan');
		}
	}









	// public function hapus($komponen)
	// {
	// 	$data = [
	// 		'status' => "dataAsup",
	// 		// 'spesifikasi' => $this->input->post('spesifikasi'),
	// 		// 'harga_satuan' => $this->input->post('harga_satuan'),
	// 		// 'satuan' => $this->input->post('satuan'),
	// 		// 'total_stok' => $this->input->post('total_stok'),
	// 		// 'kebutuhan' => $this->input->post('kebutuhan'),
	// 		// 'keterangan' => $this->input->post('keterangan'),
	// 		// 'nama_toko' => $this->input->post('nama_toko'),
	// 		// 'id_barangm' => $this->input->post('id_barang'),
	// 	];

	// 	if ($this->m_sisa_bahan->ubah($data, $komponen)) {
	// 		// $this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
	// 		redirect('PurchasingMekanik/SisaBahan');
	// 	} else {
	// 		// $this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
	// 		redirect('PurchasingMekanik/SisaBahan');
	// 	}
	// }

	public function ubahHfnc($kode_komponen)
	{
		$this->data['title'] = 'Pakai Sisa Bahan';
		$this->data['titleHead'] = 'PakaiSisa | Bahan';
		$this->data['barang'] = $this->m_sisa_bahan->lihat_id($kode_komponen);
		$this->data['all_barang'] = $this->m_barang_mekanik->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_mekanik->AllPengambil(); 

		$this->load->view('purchasingMekanik/barangSisa/sisaBahan/ubahData/ubahHfnc', $this->data);
	}
	
	public function proses_ubah_hfnc($komponen)
	{
		$data = [
			'pengambil' => $this->input->post('pengambil'),
			'peruntukan' => $this->input->post('peruntukan'),
			'status' => "dipakai",
			// 'harga_satuan' => $this->input->post('harga_satuan'),
			// 'satuan' => $this->input->post('satuan'),
			// 'total_stok' => $this->input->post('total_stok'),
			// 'kebutuhan' => $this->input->post('kebutuhan'),
			// 'keterangan' => $this->input->post('keterangan'),
			// 'nama_toko' => $this->input->post('nama_toko'),
			// 'id_barangm' => $this->input->post('id_barang'),
		];

		if ($this->m_sisa_bahan->ubah($data, $komponen)) {
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('PurchasingMekanik/SisaBahan');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('PurchasingMekanik/SisaBahan');
		}
	}
}