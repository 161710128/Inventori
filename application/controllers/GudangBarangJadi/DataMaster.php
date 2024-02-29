<?php 

class DataMaster extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->login['role'] != 'super' && $this->session->login['role'] != 'mekanik'  && $this->session->login['role'] != 'supervisor') redirect();
		$this->data['aktif'] = 'BarangJadi_DataMaster'; 
		$this->load->model('gudangBarangJadi/M_gudangBarangJadi', 'm_gudang_barang_jadi');
	}

	public function index() 
	{
		$this->data['title'] = 'Data Semua Barang'; 
		$this->data['titleHead'] = 'Data Barang';
		$this->data['all_barang'] = $this->m_gudang_barang_jadi->lihat(); 
		$this->data['no'] = 1;
		
		$this->load->view('gudangBarangJadi/lihatMaster', $this->data); 
	} 

	public function tambah()
	{  
		$this->data['title'] = 'Tambah Barang Baut dan Mur';
		$this->data['titleHead'] = 'Tambah Barang | BautMur';
		// $dariDB = $this->m_gudangbahan_rm->cekkodebarang();
		
		// // Jika $dariDB mengembalikan nilai tidak kosong
		// if (empty($dariDB)) {
		// 		// contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
		// 		$nourut = 0;
		// 		$kodeBarangSekarang = $nourut + 1;
		// 		$this->data['kode_komponen'] = $kodeBarangSekarang;
		// 		$role = $this->input->post("id_barang");
		// 		$this->data['request'] = $role;
		// }else{
		// 	$nourut = substr($dariDB, 3, 4);
		// 	$kodeBarangSekarang = $nourut + 1;
		// 	$this->data['kode_komponen'] = $kodeBarangSekarang;
		// 	$role = $this->input->post("id_barang");
		// 	$this->data['request'] = $role;
		// }

		$this->load->view('gudangBarangJadi/tambahMaster', $this->data);
	}

	public function getNextCode() {
        $selectedValue = $this->input->post('jenis_komponen');
        $nextCode = $this->m_gudang_barang_jadi->getNextKomponenCode($selectedValue);
        echo $nextCode;
    }

	public function proses_tambah()
	{ 

		 // Ambil data dari formulir
		 $data = array(
            'kode_komponen' => $this->input->post('kode_komponen'),
            'nama_komponen' => $this->input->post('nama_komponen'),
			'spesifikasi' => $this->input->post('spesifikasi'),
            'qty_unit' => $this->input->post('qty_unit'),
            // 'harga_satuan' => $this->input->post('harga_satuan'),
            'satuan' => $this->input->post('satuan'),
            'total_stok' => $this->input->post('total_stok'),  
            'keterangan' => $this->input->post('keterangan'), 
            // 'type_barang' => $this->input->post('tipe_barang'),
			// 'nama_toko' => $this->input->post('nama_toko'), 
			'stok_minimal' => $this->input->post('stok_minimal'), 
			'jenis_komponen' => $this->input->post('jenis_komponen'),
			'kebutuhan' => $this->input->post('kebutuhan'),
			'keterangan_barang' => $this->input->post('keterangan_barang'), 
			'keterangan_kode' => $this->input->post('keterangan_kode'), 
			'lokasi' => $this->input->post('lokasi'), 
        );
 

        // Panggil method di model untuk menyimpan data ke database
        // $this->load->model('m_gudangbahan_rm');
        if ($this->m_gudang_barang_jadi->tambah($data)) {
            $this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
            redirect('GudangBarangJadi/DataMaster');
        } else {
            $this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
            redirect('GudangBarangJadi/DataMaster');
        }
	}

	public function ubah($kode_komponen)
	{
		$this->data['title'] = 'Ubah Barang';
		$this->data['titleHead'] = 'Ubah Barang';
		$this->data['barang'] = $this->m_gudang_barang_jadi->lihat_id($kode_komponen);

		 

		$this->load->view('gudangBarangJadi/ubahMaster', $this->data);
	}


	public function proses_ubah($komponen)
	{
		$data = array(
			'kode_komponen' => $this->input->post('kode_komponen'),
            'nama_komponen' => $this->input->post('nama_komponen'),
			'spesifikasi' => $this->input->post('spesifikasi'),
            'qty_unit' => $this->input->post('qty_unit'),
            // 'harga_satuan' => $this->input->post('harga_satuan'),
            'satuan' => $this->input->post('satuan'),
            'total_stok' => $this->input->post('total_stok'),  
            'keterangan' => $this->input->post('keterangan'), 
            // 'type_barang' => $this->input->post('tipe_barang'),
			// 'nama_toko' => $this->input->post('nama_toko'), 
			'stok_minimal' => $this->input->post('stok_minimal'), 
			'jenis_komponen' => $this->input->post('jenis_komponen'),
			'kebutuhan' => $this->input->post('kebutuhan'),
			'keterangan_barang' => $this->input->post('keterangan_barang'), 
			'keterangan_kode' => $this->input->post('keterangan_kode'), 
			'lokasi' => $this->input->post('lokasi'), 
        );

		// Jika checkbox kebutuhan tidak dicentang, set 'kebutuhan' ke NULL
		// if (empty($this->input->post('kebutuhan'))) {
		// 	$data['kebutuhan'] = NULL;
		// }
	
		if ($this->m_gudang_barang_jadi->ubah($data, $komponen)) {
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('GudangBarangJadi/DataMaster');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('GudangBarangJadi/DataMaster');
		}
	} 

	public function hapus($komponen){ 
		if($this->m_gudang_barang_jadi->hapus($komponen)){
			// $this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('GudangBarangJadi/DataMaster');
		} else {
			// $this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('GudangBarangJadi/DataMaster');
		}
	}

	public function import(){
		$this->data['title'] = 'Data Import';
		$this->data['titleHead'] = 'DataBarang | Import';
		$this->data['all_barang'] = $this->m_gudang_barang_jadi->import();
		$this->data['no'] = 1;
		
		$this->load->view('gudangBarangJadi/lihatMasterSemua', $this->data);
	}

	public function entTHT(){
		$this->data['title'] = 'Data EntTHT';
		$this->data['titleHead'] = 'DataBarang | EntTHT';
		$this->data['all_barang'] = $this->m_gudang_barang_jadi->entTHT();
		$this->data['no'] = 1;
		
		$this->load->view('gudangBarangJadi/lihatMasterSemua', $this->data);
	}

	public function hysteroscopy(){
		$this->data['title'] = 'Data Hysteroscopy';
		$this->data['titleHead'] = 'DataBarang | Hysteroscopy';
		$this->data['all_barang'] = $this->m_gudang_barang_jadi->hysteroscopy();
		$this->data['no'] = 1;
		
		$this->load->view('gudangBarangJadi/lihatMasterSemua', $this->data);
	}

	public function laparoscopy(){
		$this->data['title'] = 'Data Laparoscopy';
		$this->data['titleHead'] = 'DataBarang | Laparoscopy';
		$this->data['all_barang'] = $this->m_gudang_barang_jadi->laparoscopy();
		$this->data['no'] = 1;
		
		$this->load->view('gudangBarangJadi/lihatMasterSemua', $this->data);
	}

	public function electricHysteriaCutter(){
		$this->data['title'] = 'Data ElectricHysteriaCutter';
		$this->data['titleHead'] = 'DataBarang | ElectricHysteriaCutter';
		$this->data['all_barang'] = $this->m_gudang_barang_jadi->electricHysteriaCutter();
		$this->data['no'] = 1;
		
		$this->load->view('gudangBarangJadi/lihatMasterSemua', $this->data);
	}

	public function vatsVideoAssisted(){
		$this->data['title'] = 'Data VatsVideoAssisted';
		$this->data['titleHead'] = 'DataBarang | VatsVideoAssisted';
		$this->data['all_barang'] = $this->m_gudang_barang_jadi->vatsVideoAssisted();
		$this->data['no'] = 1;
		
		$this->load->view('gudangBarangJadi/lihatMasterSemua', $this->data);
	}

	public function arthroscpoy(){
		$this->data['title'] = 'Data Arthroscpoy';
		$this->data['titleHead'] = 'DataBarang | Arthroscpoy';
		$this->data['all_barang'] = $this->m_gudang_barang_jadi->arthroscpoy();
		$this->data['no'] = 1;
		
		$this->load->view('gudangBarangJadi/lihatMasterSemua', $this->data);
	}

	public function spine(){
		$this->data['title'] = 'Data Spine';
		$this->data['titleHead'] = 'DataBarang | Spine';
		$this->data['all_barang'] = $this->m_gudang_barang_jadi->spine();
		$this->data['no'] = 1;
		
		$this->load->view('gudangBarangJadi/lihatMasterSemua', $this->data);
	}

	public function urology(){
		$this->data['title'] = 'Data Urology';
		$this->data['titleHead'] = 'DataBarang | Urology';
		$this->data['all_barang'] = $this->m_gudang_barang_jadi->urology();
		$this->data['no'] = 1;
		
		$this->load->view('gudangBarangJadi/lihatMasterSemua', $this->data);
	}

	public function endoscopyScope(){
		$this->data['title'] = 'Data Endoscopy Scope';
		$this->data['titleHead'] = 'DataBarang | Endoscopy Scope';
		$this->data['all_barang'] = $this->m_gudang_barang_jadi->endoscopyScope();
		$this->data['no'] = 1;
		
		$this->load->view('gudangBarangJadi/lihatMasterSemua', $this->data);
	}

	public function elektronik(){
		$this->data['title'] = 'Data Elektronik';
		$this->data['titleHead'] = 'DataBarang | Elektronik';
		$this->data['all_barang'] = $this->m_gudang_barang_jadi->elektronik();
		$this->data['no'] = 1;
		
		$this->load->view('gudangBarangJadi/lihatMasterSemua', $this->data);
	}

	public function nonElektronik(){
		$this->data['title'] = 'Data NonElektronik';
		$this->data['titleHead'] = 'DataBarang | NonElektronik';
		$this->data['all_barang'] = $this->m_gudang_barang_jadi->nonElektronik();
		$this->data['no'] = 1;
		
		$this->load->view('gudangBarangJadi/lihatMasterSemua', $this->data);
	}

	public function stainless(){
		$this->data['title'] = 'Data Stainless';
		$this->data['titleHead'] = 'DataBarang | Stainless';
		$this->data['all_barang'] = $this->m_gudang_barang_jadi->stainless();
		$this->data['no'] = 1;
		
		$this->load->view('gudangBarangJadi/lihatMasterSemua', $this->data);
	}

	public function bed(){
		$this->data['title'] = 'Data Bed';
		$this->data['titleHead'] = 'DataBarang | Bed';
		$this->data['all_barang'] = $this->m_gudang_barang_jadi->bed();
		$this->data['no'] = 1;
		
		$this->load->view('gudangBarangJadi/lihatMasterSemua', $this->data);
	}

	public function inventaris(){
		$this->data['title'] = 'Data Inventaris';
		$this->data['titleHead'] = 'DataBarang | Inventaris';
		$this->data['all_barang'] = $this->m_gudang_barang_jadi->inventaris();
		$this->data['no'] = 1;
		
		$this->load->view('gudangBarangJadi/lihatMasterSemua', $this->data);
	}

	public function barangJadi(){
		$this->data['title'] = 'Data Barang Jadi';
		$this->data['titleHead'] = 'DataBarang | Barang Jadi';
		$this->data['all_barang'] = $this->m_gudang_barang_jadi->barangJadi();
		$this->data['no'] = 1;
		
		$this->load->view('gudangBarangJadi/lihatMasterSemua', $this->data);
	}

	public function barangKemas(){
		$this->data['title'] = 'Data Barang Kemas';
		$this->data['titleHead'] = 'DataBarang | Barang Kemas';
		$this->data['all_barang'] = $this->m_gudang_barang_jadi->barangKemas();
		$this->data['no'] = 1;
		
		$this->load->view('gudangBarangJadi/lihatMasterSemua', $this->data);
	}
	 



















 


	

	public function hfnc(){
		$this->data['title'] = 'Data Barang HFNC';
		$this->data['titleHead'] = 'DataBarang | HFNC';
		$this->data['all_barang'] = $this->m_barang_mekanik->HFNC();
		$this->data['no'] = 1;
		
		$this->load->view('purchasingMekanik/masterBarang/masterBarangMekanik/DataMaster/hfnc', $this->data);
	}

	public function antropometri(){
		$this->data['title'] = 'Data Barang Antropometri';
		$this->data['titleHead'] = 'DataBarang | Antropometri';
		// $this->data['all_barang'] = $this->m_barang_mekanik->antropometri();
		$this->data['all_barang'] = $this->m_barang_mekanik->Antropometri();
		$this->data['no'] = 1;


		$this->load->view('purchasingMekanik/masterBarang/masterBarangMekanik/DataMaster/antropometri', $this->data);
	}

	public function tambahAntropometri()
	{  
		$this->data['title'] = 'Tambah Barang Antropometri';
		$this->data['titleHead'] = 'Tambah Barang | Antropometri';
		$dariDB = $this->m_barang_mekanik->cekkodebarangAntropometri();
		// contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
		$nourut = substr($dariDB, 3, 4);
		$kodeBarangSekarang = intval($nourut) + 1;

		$this->data['kode_komponen'] = $kodeBarangSekarang; 

		// $role = $this->input->post("id_barang");
		// $this->data['request'] = $role;

		$this->load->view('purchasingMekanik/masterBarang/masterBarangMekanik/TambahData/tambahAntropometri', $this->data);
	}

	

	public function ubahAntropometri($kode_komponen)
	{
		$this->data['title'] = 'Ubah Antropometri';
		$this->data['titleHead'] = 'Ubah | Barang Antropometri';
		$this->data['barang'] = $this->m_barang_mekanik->lihat_id($kode_komponen);

		$this->load->view('purchasingMekanik/masterBarang/masterBarangMekanik/UbahData/ubahAntropometri', $this->data);
	}

	

	public function proses_tambahAntropometri()
	{
		$data = [
			'kode_komponen' => $this->input->post('kode_komponen'),
			'nama_komponen' => $this->input->post('nama_komponen'),
			'harga_satuan' => $this->input->post('harga_satuan'),
			'satuan' => $this->input->post('satuan'),
			'total_stok' => $this->input->post('total_stok'),
			'nama_toko' => $this->input->post('nama_toko'),
			'stok_alat' => $this->input->post('stok_alat'),
			'keterangan' => $this->input->post('keterangan'),
			'spesifikasi' => $this->input->post('spesifikasi'),
			'qty_unit' => $this->input->post('qty_unit'),
			'kebutuhan' => $this->input->post('kebutuhan'),
			'type_barang' => $this->input->post('tipe_barang'),
			'stok_minimal' => $this->input->post('stok_minimal'),
			'id_barangm' => $this->input->post('id_barang'),
		];

		if ($this->m_barang_mekanik->tambah($data)) {
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			redirect('PurchasingMekanik/BarangMekanik/antropometri');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('PurchasingMekanik/BarangMekanik/antropometri');
		}
	}

	

	public function proses_ubah_antropometri($komponen)
	{
		$data = [
			'nama_komponen' => $this->input->post('nama_komponen'),
			'spesifikasi' => $this->input->post('spesifikasi'),
			'harga_satuan' => $this->input->post('harga_satuan'),
			'satuan' => $this->input->post('satuan'),
			'total_stok' => $this->input->post('total_stok'),
			'kebutuhan' => $this->input->post('kebutuhan'),
			'keterangan' => $this->input->post('keterangan'),
			'type_barang' => $this->input->post('tipe_barang'),
			'stok_minimal' => $this->input->post('stok_minimal'),
			'nama_toko' => $this->input->post('nama_toko'),
			// 'id_barangm' => $this->input->post('id_barang'),
		];

		if ($this->m_barang_mekanik->ubah($data, $komponen)) {
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('PurchasingMekanik/BarangMekanik/antropometri');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('PurchasingMekanik/BarangMekanik/antropometri');
		}
	}
	
	
	
}
