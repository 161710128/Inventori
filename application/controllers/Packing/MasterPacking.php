<?php 
class MasterPacking extends CI_Controller{
	public function __construct(){ 
		parent::__construct();
		if($this->session->login['role'] != 'super' && $this->session->login['role'] != 'packing' && $this->session->login['role'] != 'quality') redirect();
		$this->data['aktif'] = 'MasterPacking';
		$this->load->model('packing/M_Master', 'm_master');
	}
 
	public function index(){
		$this->data['title'] = 'Semua Alat';
		$this->data['all_barang'] = $this->m_master->lihat(); 
		$this->data['no'] = 1;
		
		$this->load->view('packing/dataMaster/lihat', $this->data);
	}


	public function tambah(){ 
		$this->data['title'] = 'Tambah Alat';
		$dariDB = $this->m_master->cekkodebarang(); 
        $nourut = substr($dariDB, 2, 6);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_komponen'] = $kodeBarangSekarang;
		$this->data['all_barang'] = $this->m_master->AllBarang();

		$this->load->view('packing/dataMaster/tambah_alat', $this->data);
	}

	public function proses_tambah(){ 
		$data = [ 
			'kode_alat' => $this->input->post('kode_alat'),
			'nama_alat' => $this->input->post('nama_alat'),
			'total_stok' => $this->input->post('total_stok'), 
			'stok_alat' => $this->input->post('stok_alat'),
			'keterangan' => $this->input->post('keterangan'), 
		];

		if($this->m_master->tambahAlat($data)){
			//$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			redirect('Packing/MasterPacking');
		} else {
		//	$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('Packing/MasterPacking');
		}
	}

	public function ubah($kode_komponen){ 

		$this->data['title'] = 'Ubah Barang';
		$this->data['barang'] = $this->m_master->lihat_idAlat($kode_komponen); 

		$this->load->view('packing/dataMaster/ubah_alat', $this->data);
	}

	public function proses_ubah($kode_komponen){ 

		$data = [ 
			'kode_alat' => $this->input->post('kode_alat'),
			'nama_alat' => $this->input->post('nama_alat'),
			'total_stok' => $this->input->post('total_stok'), 
			'stok_alat' => $this->input->post('stok_alat'),
			'keterangan' => $this->input->post('keterangan'), 
		];

		if($this->m_master->ubahAlat($data, $kode_komponen)){
		//	$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('Packing/MasterPacking');
		} else {
		//	$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('Packing/MasterPacking');
		}
	}

	public function hapus($kode_komponen){ 
		
		if($this->m_master->hapusAlat($kode_komponen)){
			//$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('Packing/MasterPacking');
		} else {
			//$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('Packing/MasterPacking');
		}
	} 
}