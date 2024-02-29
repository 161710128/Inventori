<?php 
class HasilAlat extends CI_Controller{
	public function __construct(){ 
		parent::__construct();
		if($this->session->login['role'] != 'super' && $this->session->login['role'] != 'produksi') redirect();
		$this->data['aktif'] = 'HasilAlat';
		$this->load->model('produksi/M_MasterHasil', 'm_master_hasil');
	}

	
	public function index(){
	    unset($_SESSION['error']);
		$this->data['title'] = 'Hasil Alat';
		$this->data['alltransaksi'] = $this->m_master_hasil->lihat_hasil(); 
		$this->data['no'] = 1;
		
		$this->load->view('produksi/dataMaster/hasil/hasil_alat', $this->data);
	}
	
	
	public function detail($kode_transaksi)
	{
		$this->data['title'] = 'Detail Hasil';
		$this->data['pengeluaran'] = $this->m_master_hasil->lihat_kode_transaksi($kode_transaksi);
		$this->data['all_detail_keluar'] = $this->m_master_hasil->detail($kode_transaksi);
		$this->data['no'] = 1;

		$this->load->view('produksi/dataMaster/hasil/detail_hasil', $this->data);
	}
	

	
	public function detailHapus($id)
	{
		$this->data['title'] = 'Hapus Detail Hasil';
		$this->data['titleHead'] = 'Hapus | Hasil Alat';
		$this->data['barang'] = $this->m_master_hasil->lihat_id_detail($id);

		$this->load->view('produksi/dataMaster/hasil/hapus_detail', $this->data);
	}
	
	public function proses_detailHapus()
    { 
        $id_detail = $this->input->post('id_detail');
        $total_stok = $this->input->post('total_assy');
        $kode_komponen = $this->input->post('kode_alat');
 
        if ($this->m_master_hasil->hapusDetail($id_detail)) {
            $this->m_master_hasil->min_stok($total_stok,$kode_komponen) or die('gagal min stok'); 
            redirect('Produksi/HasilAlat');
        }
    }
	
	public function tambah()
	{
		$this->data['title'] = 'Tambah Hasil Alat';
		$dariDB = $this->m_master_hasil->cekkodetransaksi();
		
		if(empty($dariDB)){
    		$kodeBarangSekarang = '001';
    		$this->data['kode_transaksi'] = $kodeBarangSekarang;
		    $this->data['alltransaksi'] = $this->m_master_hasil->alltransaksi(); 
		    $this->load->view('produksi/dataMaster/hasil/tambah_hasil_alat', $this->data);
		}else{
		    $nourut = substr($dariDB, 2, 6);
    		$kode_transaksi = $nourut + 1;
    		$this->data['kode_transaksi'] = $kode_transaksi;
    		$this->data['alltransaksi'] = $this->m_master_hasil->alltransaksi();
    		
		    $this->load->view('produksi/dataMaster/hasil/tambah_hasil_alat', $this->data);
		}
		    
    		
		
	}
	
	public function proses_tambah(){ 
		// var_dump($countDuplicate);
		$keyword = $this->input->post('tanggal');
		$timestamp = strtotime($keyword);
		$new_date_format = date('Y-m-d', $timestamp); 
		 
		$countDuplicate = $this->m_master_hasil->countDuplicate1($new_date_format);   
		
// 		$jumlah_barang_diterima = count($this->input->post('nama_pengguna')); 
				
		if(empty($countDuplicate)){
		
    		$data = [
    			'kode_transaksi' => $this->input->post('kode_transaksi'),
    			'nama_pengguna' => $this->input->post('nama_pengguna'),
    			'tanggal' => $new_date_format,
    // 			'jam' => $this->input->post('jam'),
    		];	
    		$this->m_master_hasil->tambah_hasil_alat($data);
    		redirect('Produksi/HasilAlat');

		}else {
    		$this->session->set_flashdata('error', 'Tanggal Sudah Ada !');
    		redirect('Produksi/HasilAlat/tambah');
    
    // 		$this->data['title'] = 'Tambah Hasil Alat';
    // 		$dariDB = $this->m_master_hasil->cekkodetransaksi();
    // 		$nourut = substr($dariDB, 2, 6);
    // 		$kode_transaksi = $nourut + 1;
    // 		$this->data['kode_transaksi'] = $kode_transaksi;
    // 		$this->data['alltransaksi'] = $this->m_master_hasil->alltransaksi();
    
    
    // 		$this->load->view('produksi/dataMaster/hasil/tambah_hasil_alat', $this->data);
    	}
	}
	
	public function ubah($kode_transaksi){ 
		$this->data['title'] = 'Tambah Hasil Alat';
		$this->data['titleHead'] = 'Tambah | Hasil Alat';
		$this->data['all_komponen'] = $this->m_master_hasil->lihat_stok_komponen();  	
		$this->data['barang'] = $this->m_master_hasil->lihat_id2($kode_transaksi);
		$this->load->view('produksi/dataMaster/hasil/tambah_edit_hasil', $this->data);
	} 
	
	public function proses_tambahEdit(){
		$detail_hasil = count($this->input->post('kode_alat_hidden'));

		$data_detail_keluar = [];

		for($i = 0; $i < $detail_hasil; $i++){
			array_push($data_detail_keluar, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_keluar[$i]['kode_alat'] = $this->input->post('kode_alat_hidden')[$i];
			$data_detail_keluar[$i]['total_assy'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_keluar[$i]['shift'] = $this->input->post('shift_hidden')[$i];
			$data_detail_keluar[$i]['tanggal'] = $this->input->post('tanggal_keluar_hidden')[$i]; 
			$data_detail_keluar[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i];
			$data_detail_keluar[$i]['id_tindakan'] = $this->input->post('id_tindakan_hidden')[$i];
		}

		if($this->m_master_hasil->tambah1($data_detail_keluar)){
			for ($i=0; $i < $detail_hasil ; $i++) {
 				$this->m_master_hasil->plus_stok($data_detail_keluar[$i]['total_assy'], $data_detail_keluar[$i]['kode_alat']) or die('gagal min stok');
			}

			$this->session->set_flashdata('success', 'Invoice <strong>Pengeluaran</strong> Berhasil Dibuat!');
			redirect('Produksi/HasilAlat');
		} 
	} 
	
	public function get_all_barang()
	{
		$data = $this->m_master_hasil->lihat_nama_barang($_POST['kode_alat']);
		echo json_encode($data);
	}

	public function keranjang_barang()
	{
		$this->load->view('produksi/dataMaster/hasil/keranjang');
	} 

}