<?php 
class BarangInventaris_Mekanik extends CI_Controller{
	public function __construct(){ 
		parent::__construct();
		if($this->session->login['role'] != 'super' && $this->session->login['role'] != 'mekanik') redirect();
		$this->data['aktif'] = 'BarangInventaris_Mekanik';
		$this->load->model('purchasingMekanik/M_BarangInventaris_Mekanik', 'm_barang_inventaris');
	}

	public function index(){
		$this->data['title'] = 'Data Barang Inventaris Gerlink';
		$this->data['titleHead'] = 'Inventaris Gerlink';
		$this->data['all_barang'] = $this->m_barang_inventaris->lihat(); 

		$this->data['no'] = 1;


		$this->load->view('purchasingMekanik/masterBarang/masterInventaris/lihat', $this->data);
	}

	public function tambah(){  
		$this->data['title'] = 'Tambah Barang Inventaris';
		$dariDB = $this->m_barang_inventaris->cekkodebarang(); 
		
		if(empty($dariDB)){
    		$kodeBarangSekarang = '001'; 
			$this->data['kode_part'] = $kodeBarangSekarang;
		    $this->load->view('purchasingMekanik/masterBarang/masterInventaris/TambahData/tambah', $this->data);
		}else{
	        $nourut = substr($dariDB, 3, 4);
    		$kodeBarangSekarang = $nourut + 1;
    		$this->data['kode_part'] = $kodeBarangSekarang;
    		$this->load->view('purchasingMekanik/masterBarang/masterInventaris/TambahData/tambah', $this->data);
		} 
	}

	public function proses_tambah(){ 
		$data = [ 
			'kode_part' => $this->input->post('kode_part'),
			'nama_barang' => $this->input->post('nama_barang'),
			'spesifikasi' => $this->input->post('spesifikasi'),
			'total_stok' => $this->input->post('total_stok'),
			'satuan' => $this->input->post('satuan'),
			'keterangan' => $this->input->post('keterangan'),
			// 'inventaris' => $this->input->post('inventaris'),
		];

		if($this->m_barang_inventaris->tambah($data)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			redirect('PurchasingMekanik/BarangInventaris_Mekanik');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('PurchasingMekanik/BarangInventaris_Mekanik');
		}
	}

	public function ubah($kode_part){ 
		$this->data['title'] = 'Ubah Barang Inventaris';
		$this->data['barang'] = $this->m_barang_inventaris->lihat_id($kode_part);

		$this->load->view('purchasingMekanik/masterBarang/masterInventaris/EditData/ubah', $this->data);
	}

	public function hapus($komponen){ 
		if($this->m_barang_inventaris->hapus($komponen)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('PurchasingMekanik/BarangInventaris_Mekanik');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('PurchasingMekanik/BarangInventaris_Mekanik');
		}
	} 


	public function proses_ubah($komponen){ 
		$data = [ 
			'kode_part' => $this->input->post('kode_part'),
			'nama_barang' => $this->input->post('nama_barang'),
			'spesifikasi' => $this->input->post('spesifikasi'),
			'total_stok' => $this->input->post('total_stok'),
			'satuan' => $this->input->post('satuan'),
			'keterangan' => $this->input->post('keterangan'),
			// 'id_barang' => $this->input->post('id_barang'),
		];

		if($this->m_barang_inventaris->ubah($data, $komponen)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('PurchasingMekanik/BarangInventaris_Mekanik');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('PurchasingMekanik/BarangInventaris_Mekanik');
		}
	} 
}