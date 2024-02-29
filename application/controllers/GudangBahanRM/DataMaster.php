<?php

class DataMaster extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->login['role'] != 'super' && $this->session->login['role'] != 'mekanik'  && $this->session->login['role'] != 'supervisor') redirect();
		$this->data['aktif'] = 'BautMur_DataMaster';
		$this->load->model('gudangBahan/M_gudangbahan_rm', 'm_gudangbahan_rm');
	}

	public function index()
	{
		$this->data['title'] = 'Data Semua Barang';
		$this->data['titleHead'] = 'Data Barang';
		$this->data['all_barang'] = $this->m_gudangbahan_rm->lihat();
		$this->data['no'] = 1;

		$this->load->view('gudangbahan_rm/lihatMaster', $this->data);
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

		$this->load->view('gudangbahan_rm/tambahMaster', $this->data);
	}

	public function getNextCode()
	{
		$selectedValue = $this->input->post('jenis_komponen');
		$nextCode = $this->m_gudangbahan_rm->getNextKomponenCode($selectedValue);
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
			'keterangan_barang' => $this->input->post('keterangan_barang'),
			'kebutuhan' => $this->input->post('kebutuhan'),

		);

		// Jika checkbox untuk kebutuhan alat dipilih, konversi ke JSON
		// if (!empty($this->input->post('kebutuhan'))) {
		// 	Menggabungkan elemen array menjadi satu string, dipisahkan dengan koma
		// 	$kebutuhan = implode(',', $this->input->post('kebutuhan'));
		// 	$data['kebutuhan'] = $kebutuhan;
		// }

		// Panggil method di model untuk menyimpan data ke database
		// $this->load->model('m_gudangbahan_rm');
		if ($this->m_gudangbahan_rm->tambah($data)) {
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			redirect('GudangBahanRM/DataMaster');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('GudangBahanRM/DataMaster');
		}
	}

	public function ubah($kode_komponen)
	{
		$this->data['title'] = 'Ubah Barang';
		$this->data['titleHead'] = 'Ubah Barang';
		$this->data['barang'] = $this->m_gudangbahan_rm->lihat_id($kode_komponen);



		$this->load->view('gudangbahan_rm/ubahMaster', $this->data);
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
			'kebutuhan' => implode(',', $this->input->post('kebutuhan')),
			'stok_minimal' => $this->input->post('stok_minimal'),
			'jenis_komponen' => $this->input->post('jenis_komponen'),
			'keterangan_barang' => $this->input->post('keterangan_barang'),
			'kebutuhan' => $this->input->post('kebutuhan'),
		);

		// Jika checkbox kebutuhan tidak dicentang, set 'kebutuhan' ke NULL
		// if (empty($this->input->post('kebutuhan'))) {
		// 	$data['kebutuhan'] = NULL;
		// }

		if ($this->m_gudangbahan_rm->ubah($data, $komponen)) {
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('GudangBahanRM/DataMaster');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('GudangBahanRM/DataMaster');
		}
	}

	public function hapus($komponen)
	{
		if ($this->m_gudangbahan_rm->hapus($komponen)) {
			// $this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('GudangBahanRM/DataMaster');
		} else {
			// $this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('GudangBahanRM/DataMaster');
		}
	}

	public function perekat()
	{
		$this->data['title'] = 'Data Perekat';
		$this->data['titleHead'] = 'DataBarang | perekat';
		$this->data['all_barang'] = $this->m_gudangbahan_rm->perekat();
		$this->data['no'] = 1;

		$this->load->view('gudangbahan_rm/lihatMasterPerekat', $this->data);
	}

	public function bautMur()
	{
		$this->data['title'] = 'Data Baut Mur';
		$this->data['titleHead'] = 'DataBarang Baut Mur';
		$this->data['all_barang'] = $this->m_gudangbahan_rm->bautMur();
		$this->data['no'] = 1;

		$this->load->view('gudangbahan_rm/lihatMasterBautMur', $this->data);
	}

	public function rawMaterial()
	{
		$this->data['title'] = 'Data Raw Material';
		$this->data['titleHead'] = 'DataBarang Raw Material';
		$this->data['all_barang'] = $this->m_gudangbahan_rm->rawMaterial();
		$this->data['no'] = 1;

		$this->load->view('gudangbahan_rm/lihatMasterRawMaterial', $this->data);
	}

	public function komponenElektro()
	{
		$this->data['title'] = 'Data Komponen Elektro';
		$this->data['titleHead'] = 'DataBarang Komponen Elektro';
		$this->data['all_barang'] = $this->m_gudangbahan_rm->komponenElektro();
		$this->data['no'] = 1;

		$this->load->view('gudangbahan_rm/lihatMasterKomponenElektro', $this->data);
	}

	public function komponenMekanik()
	{
		$this->data['title'] = 'Data Komponen Mekanik';
		$this->data['titleHead'] = 'DataBarang Komponen Mekanik';
		$this->data['all_barang'] = $this->m_gudangbahan_rm->komponenMekanik();
		$this->data['no'] = 1;

		$this->load->view('gudangbahan_rm/lihatMasterKomponenMekanik', $this->data);
	}

	public function setJadi()
	{
		$this->data['title'] = 'Data Set Jadi';
		$this->data['titleHead'] = 'DataBarang Set Jadi';
		$this->data['all_barang'] = $this->m_gudangbahan_rm->setJadi();
		$this->data['no'] = 1;

		$this->load->view('gudangbahan_rm/lihatMasterSetJadi', $this->data);
	}

	public function percetakan()
	{
		$this->data['title'] = 'Data Percetakan';
		$this->data['titleHead'] = 'DataBarang Percetakan';
		$this->data['all_barang'] = $this->m_gudangbahan_rm->percetakan();
		$this->data['no'] = 1;

		$this->load->view('gudangbahan_rm/lihatMasterPercetakan', $this->data);
	}
























	public function hfnc()
	{
		$this->data['title'] = 'Data Barang HFNC';
		$this->data['titleHead'] = 'DataBarang | HFNC';
		$this->data['all_barang'] = $this->m_barang_mekanik->HFNC();
		$this->data['no'] = 1;

		$this->load->view('purchasingMekanik/masterBarang/masterBarangMekanik/DataMaster/hfnc', $this->data);
	}

	public function antropometri()
	{
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
