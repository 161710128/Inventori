<?php 
class MasterStokAlat extends CI_Controller{
	public function __construct(){ 
		parent::__construct();
		if($this->session->login['role'] != 'super' && $this->session->login['role'] != 'produksi') redirect();
		$this->data['aktif'] = 'MasterStokAlat';
		$this->load->model('produksi/M_Master', 'm_master');
	}

	public function index(){
		$this->data['title'] = 'Semua Alat';
		$this->data['all_barang'] = $this->m_master->lihat_stokALat(); 
		$this->data['no'] = 1;
		
		$this->load->view('produksi/dataMaster/lihat', $this->data);
	}


	public function tambah(){ 
		$this->data['title'] = 'Tambah Alat';
		$dariDB = $this->m_master->cekkodebarang(); 
        $nourut = substr($dariDB, 2, 6);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_komponen'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_master->AllBarang();

		$this->load->view('produksi/dataMaster/tambah_alat', $this->data);
	}

	public function proses_tambah(){ 
		$data = [ 
			'kode_alat' => $this->input->post('kode_alat'),
			'nama_alat' => $this->input->post('nama_alat'),
			'jumlah_assy' => $this->input->post('jumlah_assembly'),
			'jumlah_qc' => $this->input->post('jumlah_qc'),
			'jumlah_rijek' => $this->input->post('jumlah_rijek'),  
			'status_alat' => $this->input->post('status_alat'),
			'keterangan' => $this->input->post('keterangan'), 
		];

		if($this->m_master->tambahAlat($data)){
			//$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			redirect('produksi/MasterStokAlat');
		} else {
		//	$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('produksi/MasterStokAlat');
		}
	}

	public function ubah($kode_komponen){ 

		$this->data['title'] = 'Ubah Barang';
		$this->data['barang'] = $this->m_master->lihat_idAlat($kode_komponen); 

		$this->load->view('produksi/dataMaster/ubah_alat', $this->data);
	}

	public function proses_ubah($kode_komponen){ 

		$data = [ 
			'nama_alat' => $this->input->post('nama_alat'),
			'nama_alat' => $this->input->post('nama_alat'), 
			'jumlah_assy' => $this->input->post('jumlah_assembly'), 
			'jumlah_qc' => $this->input->post('jumlah_qc'), 
			'jumlah_rijek' => $this->input->post('jumlah_rijek'),
			'status_alat' => $this->input->post('status_alat'),
			'keterangan' => $this->input->post('keterangan'),
		];

		if($this->m_master->ubahAlat($data, $kode_komponen)){
		//	$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('Produksi/MasterStokAlat');
		} else {
		//	$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('Produksi/MasterStokAlat');
		}
	}

	public function hapus($kode_komponen){ 
		
		if($this->m_master->hapusAlat($kode_komponen)){
			//$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('Produksi/MasterStokAlat');
		} else {
			//$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('Produksi/MasterStokAlat');
		}
	} 
}