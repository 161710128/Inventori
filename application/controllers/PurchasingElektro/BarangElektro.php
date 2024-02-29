<?php 
class BarangElektro extends CI_Controller{
	public function __construct(){ 
		parent::__construct();
		if($this->session->login['role'] != 'super' && $this->session->login['role'] != 'elektro' && $this->session->login['role'] != 'mekanik' && $this->session->login['role'] != 'supervisor') redirect();
		$this->data['aktif'] = 'BarangElektro';
		$this->load->model('purchasingElektro/M_barang_elektro', 'm_barang_elektro');
	}

	public function index(){
		$this->data['title'] = 'Data Komponen Semua Barang';
		$this->data['all_barang'] = $this->m_barang_elektro->lihat(); 
		$this->data['no'] = 1;
		
		$this->load->view('purchasingElektro/masterBarang/lihat', $this->data);
	}

	public function hnfc01(){ 
		$this->data['title'] = 'Data Komponen'; 
		$this->data['titleHead'] = 'Data Komponen HFNC'; 
		$this->data['all_barang'] = $this->m_barang_elektro->hnfc01(); 
		$this->data['no'] = 1; 
		$this->load->view('purchasingElektro/masterBarang/hnfc01', $this->data);
	}

	public function antropometri(){ 
		$this->data['title'] = 'Data Komponen Antropometri'; 
		$this->data['all_barang'] = $this->m_barang_elektro->antropometri(); 
		$this->data['no'] = 1; 
		$this->load->view('purchasingElektro/masterBarang/antropometri', $this->data);
	}

	public function tambah(){ 
		$this->data['title'] = 'Tambah Barang HFNC';
		$dariDB = $this->m_barang_elektro->cekkodebarang(); 
        $nourut = substr($dariDB, 2, 6);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_komponen'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();

		$this->load->view('purchasingElektro/masterBarang/tambahData/tambah', $this->data);
	}

	public function tambahhfnc(){ 
		$this->data['title'] = 'Tambah Barang HFNC';
		$dariDB = $this->m_barang_elektro->cekkodebarang_hfnc(); 
        $nourut = substr($dariDB, 2, 6);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_komponen'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();

		$this->load->view('purchasingElektro/masterBarang/tambahData/tambah_hfnc', $this->data);
	}

	public function tambahTimbanganDewasa(){ 
		$this->data['title'] = 'Tambah Timbangan Dewasa';
		$dariDB = $this->m_barang_elektro->cekkodebarang_timbanganDewasa(); 
        $nourut = substr($dariDB, 2, 6);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_komponen'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->load->view('purchasingElektro/masterBarang/tambahData/tambah_timbanganDewasa', $this->data);
	} 

	public function tambahTimbanganBayi(){ 
		$this->data['title'] = 'Tambah Timbangan Bayi';
		$dariDB = $this->m_barang_elektro->cekkodebarang_timbanganBayi(); 
        $nourut = substr($dariDB, 2, 6);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_komponen'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_barang_elektro->AllBarang();
		$this->load->view('purchasingElektro/masterBarang/tambahData/tambah_timbanganBayi', $this->data);
	}

	public function proses_tambah_hfnc(){ 
		$data = [ 
			'kode_komponen' => $this->input->post('kode_komponen'),
			'nama_komponen' => $this->input->post('nama_komponen'),
			'harga_satuan' => $this->input->post('harga_satuan'),
			'stok_alat' => $this->input->post('stok_alat'),
			'total_stok' => $this->input->post('total_stok'),
			'satuan' => $this->input->post('satuan'), 
			'keterangan' => $this->input->post('keterangan'),
			'nama_toko' => $this->input->post('nama_toko'),
			'id_barang' => $this->input->post('id_barang'),
		];

		if($this->m_barang_elektro->tambah($data)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			redirect('purchasingElektro/BarangElektro/hnfc01');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('purchasingElektro/BarangElektro/hnfc01');
		}
	}

	public function proses_tambah_timbanganDewasa(){ 
		$data = [ 
			'kode_komponen' => $this->input->post('kode_komponen'),
			'nama_komponen' => $this->input->post('nama_komponen'),
			'harga_satuan' => $this->input->post('harga_satuan'),
			'total_stok' => $this->input->post('total_stok'), 
			'satuan' => $this->input->post('satuan'), 
			'stok_alat' => $this->input->post('stok_alat'), 
			'nama_toko' => $this->input->post('nama_toko'), 
			'keterangan' => $this->input->post('keterangan'),
			'id_barang' => $this->input->post('id_barang'),
		];

		if($this->m_barang_elektro->tambah($data)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			redirect('purchasingElektro/BarangElektro/antropometriTimbanganDewasa');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('purchasingElektro/BarangElektro/antropometriTimbanganDewasa');
		}
	}

	public function proses_tambah_timbanganBayi(){ 
		$data = [ 
			'kode_komponen' => $this->input->post('kode_komponen'),
			'nama_komponen' => $this->input->post('nama_komponen'),
			'harga_satuan' => $this->input->post('harga_satuan'),
			'total_stok' => $this->input->post('total_stok'), 
			'satuan' => $this->input->post('satuan'), 
			'stok_alat' => $this->input->post('stok_alat'), 
			'nama_toko' => $this->input->post('nama_toko'), 
			'keterangan' => $this->input->post('keterangan'),
			'id_barang' => $this->input->post('id_barang'),
		];

		if($this->m_barang_elektro->tambah($data)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			redirect('purchasingElektro/BarangElektro/antropometriTimbanganBayi');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('purchasingElektro/BarangElektro/antropometriTimbanganBayi');
		}
	}

	public function antropometriTimbanganDewasa(){ 
		$this->data['title'] = 'Data Timbangan Dewasa'; 
		$this->data['all_barang'] = $this->m_barang_elektro->timbanganDewasa(); 
		$this->data['no'] = 1; 
		$this->load->view('purchasingElektro/masterBarang/antropometriTimbanganDewasa', $this->data);
	}

	public function antropometriTimbanganBayi(){ 
		$this->data['title'] = 'Data Timbangan Bayi'; 
		$this->data['all_barang'] = $this->m_barang_elektro->timbanganBayi(); 
		$this->data['no'] = 1; 
		$this->load->view('purchasingElektro/masterBarang/antropometriTimbanganBayi', $this->data);
	}

	public function ubah($kode_komponen){ 

		$this->data['title'] = 'Ubah Barang';
		$this->data['barang'] = $this->m_barang_elektro->lihat_id($kode_komponen); 

		$this->load->view('purchasingElektro/masterBarang/ubahData/ubah_hfnc', $this->data);
	}
	
	public function ubah_hfnc($kode_komponen){ 

		$this->data['title'] = 'Ubah Barang';
		$this->data['barang'] = $this->m_barang_elektro->lihat_id($kode_komponen); 

		$this->load->view('purchasingElektro/masterBarang/ubahData/ubah_hfnc', $this->data);
	}

	public function ubah_antropometri($kode_komponen){ 

		$this->data['title'] = 'Ubah Barang';
		$this->data['barang'] = $this->m_barang_elektro->lihat_id($kode_komponen); 

		$this->load->view('purchasingElektro/masterBarang/ubahData/ubah_antropometri', $this->data);
	}


	public function ubah_timbanganDewasa($kode_komponen){ 

		$this->data['title'] = 'Ubah Timbangan Dewasa';
		$this->data['barang'] = $this->m_barang_elektro->lihat_id($kode_komponen); 

		$this->load->view('purchasingElektro/masterBarang/ubahData/ubah_timbanganDewasa', $this->data);
	}

	public function ubah_timbanganBayi($kode_komponen){ 

		$this->data['title'] = 'Ubah Timbangan Dewasa';
		$this->data['barang'] = $this->m_barang_elektro->lihat_id($kode_komponen); 

		$this->load->view('purchasingElektro/masterBarang/ubahData/ubah_timbanganBayi', $this->data);
	}

	public function proses_ubah_hfnc($komponen){ 

		$data = [ 
			'nama_komponen' => $this->input->post('nama_komponen'),
			'harga_satuan' => $this->input->post('harga_satuan'),
			'satuan' => $this->input->post('satuan'),
			'total_stok' => $this->input->post('total_stok'),
			'stok_alat' => $this->input->post('stok_alat'),
			'keterangan' => $this->input->post('keterangan'),
			'nama_toko' => $this->input->post('nama_toko'),
			'id_barang' => $this->input->post('id_barang'),
		];

		if($this->m_barang_elektro->ubah($data, $komponen)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('purchasingElektro/BarangElektro/hnfc01');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('purchasingElektro/BarangElektro/hnfc01');
		}
	}

	 

	public function proses_ubah_timbanganDewasa($komponen){ 

		$data = [ 
			'nama_komponen' => $this->input->post('nama_komponen'),
			'harga_satuan' => $this->input->post('harga_satuan'),
			'satuan' => $this->input->post('satuan'),
			'total_stok' => $this->input->post('total_stok'),
			'stok_alat' => $this->input->post('stok_alat'),
			'keterangan' => $this->input->post('keterangan'),
			'nama_toko' => $this->input->post('nama_toko'),
			'id_barang' => $this->input->post('id_barang'),
		];

		if($this->m_barang_elektro->ubah($data, $komponen)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('purchasingElektro/BarangElektro/antropometriTimbanganDewasa');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('purchasingElektro/BarangElektro/antropometriTimbanganDewasa');
		}
	}

	public function proses_ubah_timbanganbayi($komponen){ 

		$data = [ 
			'nama_komponen' => $this->input->post('nama_komponen'),
			'harga_satuan' => $this->input->post('harga_satuan'),
			'satuan' => $this->input->post('satuan'),
			'total_stok' => $this->input->post('total_stok'),
			'stok_alat' => $this->input->post('stok_alat'),
			'keterangan' => $this->input->post('keterangan'),
			'nama_toko' => $this->input->post('nama_toko'),
			'id_barang' => $this->input->post('id_barang'),
		];

		if($this->m_barang_elektro->ubah($data, $komponen)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('purchasingElektro/BarangElektro/antropometriTimbanganBayi');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('purchasingElektro/BarangElektro/antropometriTimbanganBayi');
		}
	}

	public function hapusHfnc($komponen){ 
		
		if($this->m_barang_elektro->hapus($komponen)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('purchasingElektro/BarangElektro/hnfc01');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('purchasingElektro/BarangElektro/hnfc01');
		}
	}

	public function hapusAntropometri($komponen){ 
		
		if($this->m_barang_elektro->hapus($komponen)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('purchasingElektro/BarangElektro/antropometri');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('purchasingElektro/BarangElektro/antropometri');
		}
	}

	public function hapusTimbanganDewasa($komponen){ 
		
		if($this->m_barang_elektro->hapus($komponen)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('purchasingElektro/BarangElektro/antropometriTimbanganDewasa');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('purchasingElektro/BarangElektro/antropometriTimbanganDewasa');
		}
	}

	public function hapusTimbanganBayi($komponen){ 
		
		if($this->m_barang_elektro->hapus($komponen)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('purchasingElektro/BarangElektro/antropometriTimbanganBayi');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('purchasingElektro/BarangElektro/antropometriTimbanganBayi');
		}
	} 
}