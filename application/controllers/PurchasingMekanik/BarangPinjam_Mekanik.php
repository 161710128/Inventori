<?php 
class BarangPinjam_Mekanik extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'super' && $this->session->login['role'] != 'mekanik') redirect();
		$this->data['aktif'] = 'BarangPinjam_Mekanik';
		$this->load->model('purchasingMekanik/M_barang_pinjam', 'm_barang_pinjam');
	}

	public function index(){
		$this->data['title'] = 'Data Barang Peminjaman';
		$this->data['titleHead'] = 'Mekanik | BarangPeminjaman';
		$this->data['all_barang'] = $this->m_barang_pinjam->lihat(); 
		$this->data['no'] = 1;

		$this->load->view('purchasingMekanik/masterBarang/masterPeminjaman/lihat', $this->data);
	}
	
	// public function tambah(){  
		// $this->data['title'] = 'Tambah Peminjaman Barang';
		// $dariDB = $this->m_barang_pinjam->cekkodebarang(); 
		
		// if(empty($dariDB)){
    		// $kodeBarangSekarang = '001'; 
			// $this->data['kode_part'] = $kodeBarangSekarang;
		    // $this->load->view('purchasingMekanik/masterBarang/masterPeminjaman/TambahData/tambah', $this->data);
		// }else{
		    // $nourut = substr($dariDB, 3, 4);
    		// $kodeBarangSekarang = $nourut + 1;
    		// $this->data['kode_part'] = $kodeBarangSekarang;
    		// $this->load->view('purchasingMekanik/masterBarang/masterPeminjaman/TambahData/tambah', $this->data);
		// }
    		
    		
        
	// }
	
	public function tambah() {
		$this->data['title'] = 'Tambah Peminjaman Barang';
		$nama_barang = $this->input->post('nama_barang');
		$nama_barang_prefix = strtoupper(substr($nama_barang, 0, 3));

		$count_barang = $this->cekkodebarang($nama_barang_prefix);

		if (empty($count_barang)) {
			$kodeBarangSekarang = '001'; 
		} else {
			$kodeBarangSekarang = $count_barang + 1;
		}

		$this->data['kode_part'] = $nama_barang_prefix . '_' . sprintf("%03s", $kodeBarangSekarang);
		$this->load->view('purchasingMekanik/masterBarang/masterPeminjaman/TambahData/tambah', $this->data);
	}

// 	public function cekkodebarang($prefix) {
// 		$query = $this->db->query("SELECT COUNT(*) as count FROM mekanik_barang_pinjam WHERE kode_part LIKE '$prefix%'");
// 		$hasil = $query->row();

// 		if ($hasil) {
// 			$response = array('success' => true, 'count' => $hasil->count);
// 			echo json_encode($response);
// 		} else {
// 			$response = array('success' => false);
// 			echo json_encode($response);
// 		}
// 	}

	public function cekkodebarang($prefix) {
		$query = $this->db->query("SELECT MAX(SUBSTRING(kode_part, -4)) as max_count FROM mekanik_barang_pinjam WHERE kode_part LIKE '$prefix%'");
		$hasil = $query->row();

		if ($hasil) {
			// Ubah response untuk mengembalikan count yang benar
			 $nextNumber = $hasil->max_count + 0;
			$response = array('success' => true, 'count' => $nextNumber);
			echo json_encode($response);
		} else {
			$response = array('success' => false);
			echo json_encode($response);
		}
	}


	public function proses_tambah(){ 
		$data = [ 
			'kode_part' => $this->input->post('kode_part'),
			'nama_barang' => $this->input->post('nama_barang'),
			'spesifikasi' => $this->input->post('spesifikasi'), 
			'merk' => $this->input->post('merk'),
			'satuan' => $this->input->post('satuan'),
			'total_stok' => $this->input->post('total_stok'),
			// 'status' => $this->input->post('status'),
			// 'keterangan' => $this->input->post('keterangan'), 
		];

		if($this->m_barang_pinjam->tambah($data)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			redirect('PurchasingMekanik/BarangPinjam_Mekanik');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('PurchasingMekanik/BarangPinjam_Mekanik');
		}
	}

	public function ubah($kode_part){ 
		$this->data['title'] = 'Ubah Barang Inventaris';
		$this->data['barang'] = $this->m_barang_pinjam->lihat_id($kode_part);

		$this->load->view('purchasingMekanik/masterBarang/masterPeminjaman/EditData/ubah', $this->data);
	}

	public function proses_ubah($komponen){ 
		$data = [ 
			'kode_part' => $this->input->post('kode_part'),
			'nama_barang' => $this->input->post('nama_barang'),
			'spesifikasi' => $this->input->post('spesifikasi'), 
			'satuan' => $this->input->post('satuan'),
			// 'status' => $this->input->post('status'),
			// 'keterangan' => $this->input->post('keterangan'), 
		];

		if($this->m_barang_pinjam->ubah($data, $komponen)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Diubah!');
			redirect('PurchasingMekanik/BarangPinjam_Mekanik');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Diubah!');
			redirect('PurchasingMekanik/BarangPinjam_Mekanik');
		}
	}

	public function hapus($komponen){ 
		if($this->m_barang_pinjam->hapus($komponen)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Dihapus!');
			redirect('PurchasingMekanik/BarangPinjam_Mekanik');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Dihapus!');
			redirect('PurchasingMekanik/BarangPinjam_Mekanik');
		}
	}  
}