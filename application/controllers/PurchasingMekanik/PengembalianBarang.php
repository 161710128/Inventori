<?php 
class PengembalianBarang extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'super' && $this->session->login['role'] != 'mekanik') redirect();
		$this->data['aktif'] = 'PengembalianBarang';
		$this->load->model('purchasingMekanik/M_PeminjamanBarang', 'm_peminjaman_barang');
		$this->load->model('purchasingMekanik/M_barang_pinjam', 'm_barang_pinjam');

	}

	public function index(){
		$this->data['title'] = 'Data Barang Pengembalian';
		$this->data['titleHead'] = 'Mekanik | Pengembalian Barang';
		$this->data['all_barang'] = $this->m_peminjaman_barang->lihatPeminjaman(); 
		$this->data['no'] = 1;

		$this->load->view('purchasingMekanik/inventaris/pengembalianBarang/lihat', $this->data);
	}

	public function tambah(){  
		$this->data['title'] = 'Tambah Peminjaman Barang';
		$this->data['all_pengambil'] = $this->m_peminjaman_barang->AllPengambil();
		// $dariDB = $this->m_peminjaman_barang->cekkodetransaksi(); 
		$this->data['all_barang'] = $this->m_barang_pinjam->lihat_stok(); 
        // $nourut = substr($dariDB, 3, 4);
		// $kodeBarangSekarang = $nourut + 1;
		// $this->data['kode_pinjam'] = $kodeBarangSekarang;
		$this->load->view('purchasingMekanik/transaksiMasuk/barangPinjam/tambah', $this->data);
	}


	public function get_all_barang()
    {
        $data = $this->m_peminjaman_barang->lihat_nama_barang($_POST['kode_part']);
        echo json_encode($data);
    }

    public function keranjang_barang()
    {
        $this->load->view('purchasingMekanik/transaksiMasuk/barangPinjam/keranjang');
    } 

	public function proses_tambah(){ 
		
		$jumlah_barang_dikeluar = count($this->input->post('nama_barang_hidden'));

		// $data = [ 
		// 	'kode_part' => $this->input->post('kode_part'),
		// 	'nama_barang' => $this->input->post('nama_barang'),
		// 	'spesifikasi' => $this->input->post('spesifikasi'), 
		// 	'jumlah' => $this->input->post('jumlah'), 
		// 	'satuan' => $this->input->post('satuan'),
		// 	'pengambil' => $this->input->post('pengambil'),
		// 	'tanggal_masuk' => $this->input->post('tanggal_masuk'), 
		// 	'jam_masuk' => $this->input->post('jam_masuk'), 
		// ];

		$data_detail_keluar = []; 

		for ($i = 0; $i < $jumlah_barang_dikeluar; $i++) {
			// array_push($data_detail_keluar, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_keluar[$i]['kode_part'] = $this->input->post('kode_part_hidden')[$i];
			$data_detail_keluar[$i]['nama_barang'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_keluar[$i]['spesifikasi'] = $this->input->post('spesifikasi_hidden')[$i]; 
			$data_detail_keluar[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_keluar[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_keluar[$i]['nama_peminjam'] = $this->input->post('pengambil_hidden')[$i];
			$data_detail_keluar[$i]['tanggal_pinjam'] = $this->input->post('tanggal_masuk_hidden')[$i];
			$data_detail_keluar[$i]['jam_pinjam'] = $this->input->post('jam_masuk_hidden')[$i]; 
			$data_detail_keluar[$i]['status'] = "pinjam"; 
		}


		if($this->m_peminjaman_barang->tambah($data_detail_keluar)){
			$this->session->set_flashdata('success', 'Data Barang <strong>Berhasil</strong> Ditambahkan!');
			for ($i = 0; $i < $jumlah_barang_dikeluar; $i++) {
				$this->m_peminjaman_barang->min_stok($data_detail_keluar[$i]['jumlah'], $data_detail_keluar[$i]['kode_part']) or die('gagal min stok');
		   } 
			redirect('PurchasingMekanik/peminjamanBarang');
		} else {
			$this->session->set_flashdata('error', 'Data Barang <strong>Gagal</strong> Ditambahkan!');
			redirect('PurchasingMekanik/peminjamanBarang');
		}






		// $jumlah_barang_dikeluar = count($this->input->post('nama_barang_hidden'));

		// $data_keluar = [
		// 	'kode_transaksi' => $this->input->post('kode_transaksi'),
		// 	'tanggal_keluar' => $this->input->post('tanggal_keluar'),
		// 	'jam_keluar' => $this->input->post('jam_keluar'),
		// 	'nama_pengguna' => $this->input->post('nama_pengguna'),
		// 	//'keterangan' => $this->input->post('keterangan'),
		// ];

		// $data_detail_keluar = []; 

		// for ($i = 0; $i < $jumlah_barang_dikeluar; $i++) {
		// 	array_push($data_detail_keluar, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
		// 	$data_detail_keluar[$i]['kode_komponen'] = $this->input->post('kode_barang_hidden')[$i];
		// 	$data_detail_keluar[$i]['nama_komponen'] = $this->input->post('nama_barang_hidden')[$i];
		// 	$data_detail_keluar[$i]['pengambil'] = $this->input->post('pengambil_hidden')[$i]; 
		// 	$data_detail_keluar[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
		// 	$data_detail_keluar[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
		// 	$data_detail_keluar[$i]['tanggal'] = $this->input->post('tanggal_hidden')[$i];
		// 	$data_detail_keluar[$i]['jam'] = $this->input->post('jam_hidden')[$i];
		// 	$data_detail_keluar[$i]['peruntukan'] = $this->input->post('peruntukan_hidden')[$i];
		// }

		// if ($this->m_pengeluaran_mekanik->tambah($data_keluar) && $this->m_detailkeluar_mekanik->tambah($data_detail_keluar)) {
		// 	for ($i = 0; $i < $jumlah_barang_dikeluar; $i++) {
 		// 		$this->m_barang_mekanik->min_stok($data_detail_keluar[$i]['jumlah'], $data_detail_keluar[$i]['kode_komponen']) or die('gagal min stok');
		// 	}
		// 	$this->session->set_flashdata('success', 'Invoice <strong>Pengeluaran</strong> Berhasil Dibuat!');
		// 	redirect('PurchasingMekanik/PengeluaranMekanik');
		// }


	}
	
	public function ubah($kode_part){ 
		$this->data['title'] = 'Ubah Barang Inventaris';
		$this->data['barang'] = $this->m_barang_pinjam->lihat_id1($kode_part);

		$this->load->view('purchasingMekanik/inventaris/pengembalianBarang/ubahPengembalian', $this->data);
	}
	








	

	

	

	public function proses_ubah($komponen){ 
		$keterangan = $this->input->post('keterangan'); 
		
		$jumlah1 = $this->input->post('jumlah'); 
		$kode_part = $this->input->post('kode_part'); 
		// var_dump(jumlah1);

		// if (($keterangan == "rusak")|| ($keterangan == "hilang")){

		if ($keterangan == "rusak"){
			$data = [ 
				'kode_part' => $this->input->post('kode_part'),
				'tanggal_pengembalian' => $this->input->post('tanggal'),
				'jam_pengembalian' => $this->input->post('jam'), 
				'id_pinjam' => $this->input->post('id_pinjam'), 
				'status' => '-',
				'keterangan' => 'rusak', 
			];
			
			if($this->m_peminjaman_barang->ubah($data,$komponen)){ 
				$this->m_peminjaman_barang->plus_stok($jumlah1,$kode_part);
				redirect('PurchasingMekanik/pengembalianBarang');
			} else { 
				redirect('PurchasingMekanik/pengembalianBarang'); 
			}

		}elseif (($keterangan == "hilang")) {
			$data = [ 
				'kode_part' => $this->input->post('kode_part'),
				'tanggal_pengembalian' => $this->input->post('tanggal'),
				'jam_pengembalian' => $this->input->post('jam'), 
				'id_pinjam' => $this->input->post('id_pinjam'), 
				'status' => '-',
				'keterangan' => 'hilang', 
			];
			
			if($this->m_peminjaman_barang->ubah($data,$komponen)){ 
				// $this->m_peminjaman_barang->plus_stok($jumlah1,$kode_part);
				redirect('PurchasingMekanik/pengembalianBarang');
			} else { 
				redirect('PurchasingMekanik/pengembalianBarang');
			}

		}else{
			$data = [ 
				'kode_part' => $this->input->post('kode_part'),
				'tanggal_pengembalian' => $this->input->post('tanggal'),
				'jam_pengembalian' => $this->input->post('jam'), 
				'id_pinjam' => $this->input->post('id_pinjam'), 
				'status' => 'dikembalikan',
				'keterangan' => 'bagus', 
			];
			
			if($this->m_peminjaman_barang->ubah($data,$komponen)){ 
				$this->m_peminjaman_barang->plus_stok($jumlah1,$kode_part);
				redirect('PurchasingMekanik/pengembalianBarang');
			} else { 
				redirect('PurchasingMekanik/pengembalianBarang');
			}
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