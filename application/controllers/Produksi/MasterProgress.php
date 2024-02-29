<?php 
class MasterProgress extends CI_Controller{
	public function __construct(){ 
		parent::__construct();
		if($this->session->login['role'] != 'super' && $this->session->login['role'] != 'produksi') redirect();
		$this->data['aktif'] = 'MasterProgress';
		$this->load->model('produksi/M_Master', 'm_master');
	}

	public function index(){
		$this->data['title'] = 'Semua Produksi';
		$this->data['all_barang'] = $this->m_master->lihat(); 
		$this->data['no'] = 1;
		
		$this->load->view('produksi/dataMaster/progress/lihat', $this->data);
	}
	
	public function standingWeight(){ 
		$this->data['title'] = 'Standingweight'; 
		$this->data['titleHead'] = 'Data | Standing Weight'; 
		$this->data['all_barang'] = $this->m_master->standingWeight(); 
		$this->data['no'] = 1; 
		$this->load->view('produksi/dataMaster/progress/standingWeight', $this->data);
	}

	public function babyScale(){ 
		$this->data['title'] = 'Babyscale'; 
		$this->data['titleHead'] = 'Data | Baby Scale'; 
		$this->data['all_barang'] = $this->m_master->babyScale(); 
		$this->data['no'] = 1; 
		$this->load->view('produksi/dataMaster/progress/babyScale', $this->data);
	}

	public function stadiometer(){ 
		$this->data['title'] = 'Stadiometer'; 
		$this->data['titleHead'] = 'Data | Stadiometer'; 
		$this->data['all_barang'] = $this->m_master->stadioMeter(); 
		$this->data['no'] = 1; 
		$this->load->view('produksi/dataMaster/progress/stadiometer', $this->data);
	}

	public function infantometer(){ 
		$this->data['title'] = 'Infantometer'; 
		$this->data['titleHead'] = 'Data | Infantometer'; 
		$this->data['all_barang'] = $this->m_master->infantometer(); 
		$this->data['no'] = 1; 
		$this->load->view('produksi/dataMaster/progress/infantometer', $this->data);
	}

	public function lila(){ 
		$this->data['title'] = 'Lila'; 
		$this->data['titleHead'] = 'Data | Lila'; 
		$this->data['all_barang'] = $this->m_master->lila(); 
		$this->data['no'] = 1; 
		$this->load->view('produksi/dataMaster/progress/lila', $this->data);
	}
	
	public function tambah_standingWeight(){ 
		$this->data['title'] = 'Standingweight';
		$dariDB = $this->m_master->cekkodebarang_standingWeight(); 
        $nourut = substr($dariDB, 2, 6);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_komponen'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_master->AllBarang();

		$this->load->view('produksi/dataMaster/progress/tambah_standingWeight', $this->data);
	}

	public function tambah_babyScale(){ 
		$this->data['title'] = 'Babyscale';
		$dariDB = $this->m_master->cekkodebarang_babyScale(); 
        $nourut = substr($dariDB, 2, 6);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_komponen'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_master->AllBarang();

		$this->load->view('produksi/dataMaster/progress/tambah_babyScale', $this->data);
	}

	public function tambah_stadioMeter(){ 
		$this->data['title'] = 'Stadiometer';
		$dariDB = $this->m_master->cekkodebarang_stadioMeter(); 
        $nourut = substr($dariDB, 2, 6);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_komponen'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_master->AllBarang();

		$this->load->view('produksi/dataMaster/progress/tambah_stadioMeter', $this->data);
	}
 
	public function tambah_infantoMeter(){ 
		$this->data['title'] = 'Infantometer';
		$dariDB = $this->m_master->cekkodebarang_infantoMeter(); 
        $nourut = substr($dariDB, 2, 6);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_komponen'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_master->AllBarang();

		$this->load->view('produksi/dataMaster/progress/tambah_infantoMeter', $this->data);
	}

	public function tambah_lila(){ 
		$this->data['title'] = 'Lila';
		$dariDB = $this->m_master->cekkodebarang_lila(); 
        $nourut = substr($dariDB, 2, 6);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_komponen'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_master->AllBarang();

		$this->load->view('produksi/dataMaster/progress/tambah_lila', $this->data);
	}
	
	public function proses_tambah_standingWeight(){ 
		$data = [ 
			'kode_job' => $this->input->post('kode_job'),
			'job' => $this->input->post('job'),
			'part_name' => $this->input->post('part_name'),
			'jobdesc' => $this->input->post('jobdesc'),
			'total_stok' => $this->input->post('total_stok'), 
			// 'total_rijek' => $this->input->post('total_rijek'), 
			'id_barang' => $this->input->post('id_barang'),
		];

		if($this->m_master->tambah($data)){
		//	$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			redirect('produksi/MasterProgress/standingWeight');
		} else {
		//	$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('produksi/MasterProgress/standingWeight');
		}
	}

	public function proses_tambah_babyScale(){ 
		$data = [ 
			'kode_job' => $this->input->post('kode_job'),
			'job' => $this->input->post('job'),
			'part_name' => $this->input->post('part_name'),
			'jobdesc' => $this->input->post('jobdesc'),
			'total_stok' => $this->input->post('total_stok'), 
			// 'total_rijek' => $this->input->post('total_rijek'), 
			'id_barang' => $this->input->post('id_barang'),
		];

		if($this->m_master->tambah($data)){
			//$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			redirect('produksi/MasterProgress/babyScale');
		} else {
			//$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('produksi/MasterProgress/babyScale');
		}
	}

	public function proses_tambah_stadioMeter(){ 
		$data = [ 
			'kode_job' => $this->input->post('kode_job'),
			'job' => $this->input->post('job'),
			'part_name' => $this->input->post('part_name'),
			'jobdesc' => $this->input->post('jobdesc'),
			'total_stok' => $this->input->post('total_stok'), 
			// 'total_rijek' => $this->input->post('total_rijek'), 
			'id_barang' => $this->input->post('id_barang'),
		];

		if($this->m_master->tambah($data)){
			//$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			redirect('produksi/MasterProgress/stadioMeter');
		} else {
			//$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('produksi/MasterProgress/stadioMeter');
		} 
	}

	public function proses_tambah_infantoMeter(){ 
		$data = [ 
			'kode_job' => $this->input->post('kode_job'),
			'job' => $this->input->post('job'),
			'part_name' => $this->input->post('part_name'),
			'jobdesc' => $this->input->post('jobdesc'),
			'total_stok' => $this->input->post('total_stok'), 
			// 'total_rijek' => $this->input->post('total_rijek'), 
			'id_barang' => $this->input->post('id_barang'),
		];

		if($this->m_master->tambah($data)){
			//$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			redirect('produksi/MasterProgress/infantoMeter');
		} else {
			//$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('produksi/MasterProgress/infantoMeter');
		}
	}

	public function proses_tambah_lila(){ 
		$data = [ 
			'kode_job' => $this->input->post('kode_job'),
			'job' => $this->input->post('job'),
			'part_name' => $this->input->post('part_name'),
			'jobdesc' => $this->input->post('jobdesc'),
			'total_stok' => $this->input->post('total_stok'), 
			// 'total_rijek' => $this->input->post('total_rijek'), 
			'id_barang' => $this->input->post('id_barang'),
		];

		if($this->m_master->tambah($data)){
			//$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			redirect('produksi/MasterProgress/lila');
		} else {
			//$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('produksi/MasterProgress/lila');
		}
	}

	public function ubah_standingWeight($kode_komponen){ 

		$this->data['title'] = 'Ubah Barang';
		$this->data['barang'] = $this->m_master->lihat_id($kode_komponen); 

		$this->load->view('produksi/dataMaster/progress/ubah_standingWeight', $this->data);
	}

	public function proses_ubah_standingWeight($kode_komponen){ 

		$data = [ 
			'job' => $this->input->post('job'),
			'part_name' => $this->input->post('part_name'), 
			'jobdesc' => $this->input->post('jobdesc'), 
			'total_stok' => $this->input->post('total_stok'), 
			'id_barang' => $this->input->post('id_barang'),
		];

		if($this->m_master->ubah($data, $kode_komponen)){
			//$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('Produksi/MasterProgress/standingWeight');
		} else {
			//$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('Produksi/MasterProgress/standingWeight');
		}
	}

	public function hapus_standingWeight($kode_komponen){ 
		
		if($this->m_master->hapus($kode_komponen)){
			//$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('Produksi/MasterProgress/standingWeight');
		} else {
			//$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('Produksi/MasterProgress/standingWeight');
		}
	}

	public function ubah_babyScale($kode_komponen){ 

		$this->data['title'] = 'Ubah Barang';
		$this->data['barang'] = $this->m_master->lihat_id($kode_komponen); 

		$this->load->view('produksi/dataMaster/progress/ubah_babyScale', $this->data);
	}

	public function proses_ubah_babyScale($kode_komponen){ 

		$data = [ 
			'job' => $this->input->post('job'),
			'part_name' => $this->input->post('part_name'), 
			'jobdesc' => $this->input->post('jobdesc'), 
			'total_stok' => $this->input->post('total_stok'), 
			'id_barang' => $this->input->post('id_barang'),
		];

		if($this->m_master->ubah($data, $kode_komponen)){
			//$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('Produksi/MasterProgress/babyScale');
		} else {
			//$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('Produksi/MasterProgress/babyScale');
		}
	}

	public function hapus_babyScale($kode_komponen){ 
		
		if($this->m_master->hapus($kode_komponen)){
			//$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('Produksi/MasterProgress/babyScale');
		} else {
			//$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('Produksi/MasterProgress/babyScale');
		}
	}

	public function ubah_stadioMeter($kode_komponen){ 

		$this->data['title'] = 'Ubah Barang';
		$this->data['barang'] = $this->m_master->lihat_id($kode_komponen); 

		$this->load->view('produksi/dataMaster/progress/ubah_stadioMeter', $this->data);
	}

	public function proses_ubah_stadioMeter($kode_komponen){ 

		$data = [ 
			'job' => $this->input->post('job'),
			'part_name' => $this->input->post('part_name'), 
			'jobdesc' => $this->input->post('jobdesc'), 
			'total_stok' => $this->input->post('total_stok'), 
			'id_barang' => $this->input->post('id_barang'),
		];

		if($this->m_master->ubah($data, $kode_komponen)){
			//$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('Produksi/MasterProgress/stadioMeter');
		} else {
			//$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('Produksi/MasterProgress/stadioMeter');
		}
	}

	public function hapus_stadioMeter($kode_komponen){ 
		
		if($this->m_master->hapus($kode_komponen)){
			//$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('Produksi/MasterProgress/stadioMeter');
		} else {
			//$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('Produksi/MasterProgress/stadioMeter');
		}
	}

	public function ubah_infantoMeter($kode_komponen){ 

		$this->data['title'] = 'Ubah Barang';
		$this->data['barang'] = $this->m_master->lihat_id($kode_komponen); 

		$this->load->view('produksi/dataMaster/progress/ubah_infantoMeter', $this->data);
	}

	public function proses_ubah_infantoMeter($kode_komponen){ 

		$data = [ 
			'job' => $this->input->post('job'),
			'part_name' => $this->input->post('part_name'), 
			'jobdesc' => $this->input->post('jobdesc'), 
			'total_stok' => $this->input->post('total_stok'), 
			'id_barang' => $this->input->post('id_barang'),
		];

		if($this->m_master->ubah($data, $kode_komponen)){
			//$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('Produksi/MasterProgress/infantoMeter');
		} else {
			//$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('Produksi/MasterProgress/infantoMeter');
		}
	}

	public function hapus_infantoMeter($kode_komponen){ 
		
		if($this->m_master->hapus($kode_komponen)){
			//$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('Produksi/MasterProgress/infantoMeter');
		} else {
			//$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('Produksi/MasterProgress/infantoMeter');
		}
	}

	public function ubah_lila($kode_komponen){ 

		$this->data['title'] = 'Ubah Barang';
		$this->data['barang'] = $this->m_master->lihat_id($kode_komponen); 

		$this->load->view('produksi/dataMaster/progress/ubah_lila', $this->data);
	}

	public function proses_ubah_lila($kode_komponen){ 

		$data = [ 
			'job' => $this->input->post('job'),
			'part_name' => $this->input->post('part_name'), 
			'jobdesc' => $this->input->post('jobdesc'), 
			'total_stok' => $this->input->post('total_stok'), 
			'id_barang' => $this->input->post('id_barang'),
		];

		if($this->m_master->ubah($data, $kode_komponen)){
		//	$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('Produksi/MasterProgress/lila');
		} else {
		//	$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('Produksi/MasterProgress/lila');
		}
	}

	public function hapus_lila($kode_komponen){ 
		
		if($this->m_master->hapus($kode_komponen)){
		//	$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('Produksi/MasterProgress/lila');
		} else {
		//	$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('Produksi/MasterProgress/lila');
		}
	} 
}