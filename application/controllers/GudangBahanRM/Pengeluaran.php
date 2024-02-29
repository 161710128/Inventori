<?php 
class Pengeluaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->data['aktif'] = 'PengeluaranMekanik';
		$this->load->model('gudangBahan/M_gudangbahan_rm', 'm_gudangbahan_rm');
		$this->load->model('purchasingMekanik/M_pengeluaran_mekanik', 'm_pengeluaran_mekanik');
		$this->load->model('purchasingMekanik/M_DetailKeluar_mekanik', 'm_detailkeluar_mekanik');
	}

	public function index()
	{
	    unset($_SESSION['errorStok']); 
	    
		$this->data['title'] = 'Transaksi Pengeluaran Mekanik';
		$this->data['all_pengeluaran'] = $this->m_gudangbahan_rm->lihatPengeluaran();
		$this->data['no'] = 1;

		$this->load->view('gudangbahan_rm/lihatPengeluaran', $this->data);
	}

	public function tambah()
	{
		$this->data['title'] = 'Tambah Transaksi';  
		$dariDB = $this->m_gudangbahan_rm->cekkodetransaksiPengeluaran();
		
		
		if(empty($dariDB)){
    		$kodeBarangSekarang = '001'; 
    		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		    $this->load->view('gudangbahan_rm/tambahPengeluaran', $this->data);
		}else{
		    $nourut = substr($dariDB, 2, 4);
    		$kodeBarangSekarang = $nourut + 1;
    		$this->data['kode_transaksi'] = $kodeBarangSekarang;
    		$this->load->view('gudangbahan_rm/tambahPengeluaran', $this->data);
		}
	}

	public function proses_tambah()
	{ 
	    
	     unset($_SESSION['errorStok']); 
	    
		$keyword = $this->input->post('tanggal_keluar'); 
		$timestamp = strtotime($keyword);
		$new_date_format = date('Y-m-d', $timestamp); 

		$countDuplicate = $this->m_gudangbahan_rm->countDuplicatePengeluaran($new_date_format); 

		if(empty($countDuplicate)){ 
			$data_terima = [
				'kode_transaksi' => $this->input->post('kode_transaksi'),
				'tanggal_keluar' => $new_date_format,
				// 'jam' => $this->input->post('jam_masuk'), 
				'nama_pengguna' => $this->input->post('nama_pengguna'),
			];  
				$this->m_gudangbahan_rm->tambahPengeluaran($data_terima);
				redirect('GudangBahanRM/Pengeluaran'); 
		} else { 
			$this->session->set_flashdata('errorStok', 'Tanggal Sudah Ada !'); 
			redirect('GudangBahanRM/Pengeluaran/tambah');  
		}  
	}

	public function detail($kode_transaksi)
	{
		$this->data['title'] = 'Detail Pengeluaran';
		$this->data['pengeluaran'] = $this->m_gudangbahan_rm->lihat_no_keluar($kode_transaksi);
		$this->data['all_detail_keluar'] = $this->m_gudangbahan_rm->lihat_no_detailKeluar($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('gudangbahan_rm/detailPengeluaran', $this->data);
	}

	public function detailHapus($kode_komponen)
	{
		$this->data['title'] = 'Detail Hapus';
		$this->data['titleHead'] = 'Hapus | Barang';
		$this->data['barang'] = $this->m_gudangbahan_rm->lihat_idPengeluaran($kode_komponen);

		$this->load->view('gudangbahan_rm/hapusDetailPengeluaran', $this->data);
	}

	public function proses_detailHapus()
    { 
        $id_detail = $this->input->post('id_detail');
        $total_stok = $this->input->post('jumlah');
        $kode_komponen = $this->input->post('kode_komponen');
 
        if ($this->m_gudangbahan_rm->hapusDetailPengeluaran($id_detail)) {
            
            $this->m_gudangbahan_rm->plus_stok($total_stok,$kode_komponen) or die('gagal min stok'); 
            redirect('GudangBahanRM/Pengeluaran');
        }
    }

	// public function tambahUbah($kode_transaksi)
	// {
	// 	$this->data['title'] = 'Tambah Barang';
	// 	$this->data['all_komponen'] = $this->m_gudangbahan_rm->tampil_komponen();
	// 	$this->data['all_barang'] = $this->m_gudangbahan_rm->tampil_barang(); 
	// 	$this->data['barang'] = $this->m_gudangbahan_rm->lihat_id2($kode_transaksi);

	// 	$this->load->view('gudangbahan_rm/tambahEdit_pengeluaran', $this->data);
	// }

	public function tambahUbah($kode_transaksi)
	{
		$this->data['title'] = 'Tambah Barang';
		$this->data['titleHead'] = 'Tambah Barang';
		$this->data['all_komponen'] = $this->m_gudangbahan_rm->tampil_komponen(); 
		$this->data['barang'] = $this->m_gudangbahan_rm->lihat_id2($kode_transaksi);  

		$this->data['all_barangHFNC'] = $this->m_gudangbahan_rm->lihat();
		$this->data['all_barang'] = $this->m_gudangbahan_rm->tampil_barang();
		$this->data['all_pengambil'] = $this->m_gudangbahan_rm->AllPengambil(); 

		$this->load->view('gudangbahan_rm/tambahEdit_pengeluaran', $this->data);
	}

	public function proses_tambahEdit()
	{
		$jumlah_barang_dikeluar = count($this->input->post('nama_barang_hidden'));

		// $data_keluar = [
		// 	'kode_transaksi' => $this->input->post('kode_transaksi'),
		// 	'tanggal_keluar' => $this->input->post('tanggal_keluar'),
		// 	'jam_keluar' => $this->input->post('jam_keluar'), 
		// 	'nama_pengguna' => $this->input->post('nama_pengguna'),
		// ];
 
		
		
		$data_detail_keluar = [];

		for ($i = 0; $i < $jumlah_barang_dikeluar; $i++) {
			array_push($data_detail_keluar, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_keluar[$i]['kode_komponen'] = $this->input->post('kode_barang_hidden')[$i];
			$data_detail_keluar[$i]['nama_komponen'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_keluar[$i]['spesifikasi'] = $this->input->post('spesifikasi_hidden')[$i];
			$data_detail_keluar[$i]['pengambil'] = $this->input->post('pengambil_hidden')[$i]; 
			$data_detail_keluar[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_keluar[$i]['shift'] = $this->input->post('shift_hidden')[$i];
			$data_detail_keluar[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
// 			$data_detail_keluar[$i]['tanggal'] = $this->input->post('tanggal_hidden')[$i];
			$data_detail_keluar[$i]['tanggal'] = $this->input->post('tanggal_hidden')[$i];
			$data_detail_keluar[$i]['jam'] = $this->input->post('jam_hidden')[$i];
			$data_detail_keluar[$i]['peruntukan'] = $this->input->post('peruntukan_hidden')[$i];
		}

		if ($this->m_gudangbahan_rm->tambahDetailKeluar($data_detail_keluar)) {
			for ($i = 0; $i < $jumlah_barang_dikeluar; $i++) {
				$this->m_gudangbahan_rm->min_stok($data_detail_keluar[$i]['jumlah'], $data_detail_keluar[$i]['kode_komponen']) or die('gagal min stok');
			}
			$this->session->set_flashdata('success', 'Invoice <strong>Pengeluaran</strong> Berhasil Dibuat!');
			redirect('GudangBahanRM/Pengeluaran');
		}
	} 

	public function get_all_barang()
	{
		$data = $this->m_gudangbahan_rm->lihat_nama_barang($_POST['kode_komponen']);
		echo json_encode($data);
	}

	public function keranjang_barang()
	{
		$this->load->view('gudangbahan_rm/keranjangPengeluaran');
	} 







	








	
























	public function tambah_hfnc()
	{
		$this->data['title'] = 'Transaksi Keluar HFNC';
		$this->data['all_komponen'] = $this->m_barang_mekanik->tampil_komponen();
		$dariDB = $this->m_pengeluaran_mekanik->cekkodetransaksi1();
		$nourut = substr($dariDB, 2, 4); 
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;  
		$this->data['titleHead'] = 'DataBarang | HFNC';
		$this->data['all_barangHFNC'] = $this->m_barang_mekanik->HFNC();
		$this->data['all_barang'] = $this->m_barang_mekanik->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_mekanik->AllPengambil();
		$this->data['no'] = 1;
		
		$this->load->view('purchasingMekanik/transaksiKeluar/komponenBarang/tambahData/tambah_hfnc', $this->data);
	}

	public function tambah_antropometri()
	{
		$this->data['title'] = 'Transaksi Keluar Antropometri';
		$this->data['all_komponen'] = $this->m_barang_mekanik->tampil_komponen();
		$dariDB = $this->m_pengeluaran_mekanik->cekkodetransaksi1();
		$nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$this->data['kode_transaksi'] = $kodeBarangSekarang;  
		$this->data['titleHead'] = 'DataBarang | Antropometri';
		$this->data['all_barangHFNC'] = $this->m_barang_mekanik->Antropometri();
		$this->data['all_barang'] = $this->m_barang_mekanik->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_mekanik->AllPengambil();
		$this->data['no'] = 1;
		
		$this->load->view('purchasingMekanik/transaksiKeluar/komponenBarang/tambahData/tambah_antropometri', $this->data);
	}
	
	public function hapus($kode_transaksi)
	{
		if ($this->m_pengeluaran_mekanik->hapus($kode_transaksi) && $this->m_detailkeluar_mekanik->hapus($kode_transaksi)) {
			$this->session->set_flashdata('success', 'Invoice Pengeluaran <strong>Berhasil</strong> Dihapus!');
			redirect('purchasingMekanik/PengeluaranMekanik');
		} else {
			$this->session->set_flashdata('error', 'Invoice Pengeluaran <strong>Gagal</strong> Dihapus!');
			redirect('purchasingMekanik/PengeluaranMekanik');
		}
	}
	
	

	// public function tambahEdit_hfnc($kode_transaksi)
	// {
	// 	$this->data['title'] = 'Tambah Barang';
	// 	$this->data['titleHead'] = 'Tambah Barang';
	// 	$this->data['all_komponen'] = $this->m_barang_mekanik->tampil_komponen(); 
	// 	$this->data['barang'] = $this->m_barang_mekanik->lihat_id2($kode_transaksi);  

	// 	$this->data['all_barangHFNC'] = $this->m_barang_mekanik->HFNC();
	// 	$this->data['all_barang'] = $this->m_barang_mekanik->AllBarang();
	// 	$this->data['all_pengambil'] = $this->m_barang_mekanik->AllPengambil(); 

	// 	$this->load->view('purchasingMekanik/transaksiKeluar/komponenBarang/tambahEdit/tambahEdit_hfnc', $this->data);
	// }
	
	public function tambahEdit_antropometri($kode_transaksi)
	{
		$this->data['title'] = 'Tambah Barang';
		$this->data['titleHead'] = 'Tambah Barang';
		$this->data['all_komponen'] = $this->m_barang_mekanik->tampil_komponen(); 
		$this->data['barang'] = $this->m_barang_mekanik->lihat_id2($kode_transaksi);  

		$this->data['all_barangHFNC'] = $this->m_barang_mekanik->Antropometri();
		$this->data['all_barang'] = $this->m_barang_mekanik->AllBarang();
		$this->data['all_pengambil'] = $this->m_barang_mekanik->AllPengambil(); 
		
		$this->load->view('purchasingMekanik/transaksiKeluar/komponenBarang/tambahEdit/tambahEdit_antropometri', $this->data);
	}

	
}
