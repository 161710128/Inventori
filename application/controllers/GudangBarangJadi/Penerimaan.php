<?php
class Penerimaan extends CI_Controller
{  
    public function __construct()
    {
        parent::__construct();
        if ($this->session->login['role'] != 'super' && $this->session->login['role'] != 'mekanik'  && $this->session->login['role'] != 'supervisor') redirect();
        date_default_timezone_set('Asia/Jakarta');
        $this->data['aktif'] = 'BarangJadi_Penerimaan';
		$this->load->model('gudangBarangJadi/M_gudangBarangJadi', 'm_gudang_barang_jadi'); 
    }

    public function index()
    {
        unset($_SESSION['errorStok']); 
        
        $this->data['title'] = 'Transaksi Masuk';
        $this->data['titleHead'] = 'Transaksi Masuk | Mekanik';
        $this->data['all_penerimaan'] = $this->m_gudang_barang_jadi->lihatPenerimaan();
        $this->data['all_test'] = $this->m_gudang_barang_jadi->cekmaxTanggalPenerimaan(); 
        $this->data['all_test1'] = date('d/m/Y');
        $this->data['no'] = 1; 
        
        $this->load->view('gudangBarangJadi/lihatPenerimaan', $this->data);
    }

    public function tambah()
    {
        $this->data['title'] = 'Tambah Transaksi';
        $this->data['titleHead'] = 'Tambah Transaksi';  
        $dariDB = $this->m_gudang_barang_jadi->cekkodetransaksi(); 
        if(empty($dariDB)){
    		$kodeBarangSekarang = '001'; 
    		$this->data['kode_transaksi'] = $kodeBarangSekarang;
            $this->load->view('gudangBarangJadi/tambahPenerimaan', $this->data);
    		
        }else{
            $nourut = substr($dariDB, 2, 4);
            $kodeBarangSekarang = $nourut + 1; 
            $this->data['kode_transaksi'] = $kodeBarangSekarang;
            $this->load->view('gudangBarangJadi/tambahPenerimaan', $this->data);
        } 
    }

    public function proses_tambah()
	{  
	     unset($_SESSION['errorStok']); 
	    
		$keyword = $this->input->post('tanggal_masuk'); 
		$timestamp = strtotime($keyword);
		$new_date_format = date('Y-m-d', $timestamp); 

		$countDuplicate = $this->m_gudang_barang_jadi->countDuplicatePenerimaan($new_date_format); 

		if(empty($countDuplicate)){ 
			$data_terima = [
				'kode_transaksi' => $this->input->post('kode_transaksi'),
				'tanggal_masuk' => $new_date_format,
				// 'jam' => $this->input->post('jam_masuk'), 
				'nama_pengguna' => $this->input->post('nama_pengguna'),
			];  
            $this->m_gudang_barang_jadi->tambahPenerimaan($data_terima);
            redirect('GudangBarangJadi/Penerimaan'); 
		} else { 
			$this->session->set_flashdata('errorStok', 'Tanggal Sudah Ada !'); 
			redirect('GudangBarangJadi/Penerimaan/tambah');  
		}  
	}

    public function detail($kode_transaksi)
    {
        $this->data['title'] = 'Detail Penerimaan';
        $this->data['titleHead'] = 'Detail Penerimaan | Mekanik';
        $this->data['penerimaan'] = $this->m_gudang_barang_jadi->lihat_no_penerimaan($kode_transaksi); 
        $this->data['all_detail_terima'] = $this->m_gudang_barang_jadi->lihat_no_detailPenerimaan($kode_transaksi);
        $this->data['no'] = 1; 

        $this->load->view('gudangBarangJadi/detailPenerimaan', $this->data);
    }

    public function detailHapus($kode_komponen)
	{
		$this->data['title'] = 'Detail Hapus';
		$this->data['titleHead'] = 'Detail Hapus';
		$this->data['barang'] = $this->m_gudang_barang_jadi->lihat_id_detailPenerimaan($kode_komponen);

		$this->load->view('gudangBarangJadi/hapusDetailPenerimaan', $this->data);
	}

    public function proses_detailHapus()
    { 
        $id_detail = $this->input->post('id_detail');
        $total_stok = $this->input->post('jumlah');
        $kode_komponen = $this->input->post('kode_komponen');
 
        if ($this->m_gudang_barang_jadi->hapusDetailPenerimaan($id_detail)) {
            
            $this->m_gudang_barang_jadi->min_stok($total_stok,$kode_komponen) or die('gagal min stok'); 
            redirect('GudangBarangJadi/Penerimaan');
        }
    }


	

    public function tambahUbah($kode_transaksi){  
		$this->data['title'] = 'Tambah Barang';
		$this->data['titleHead'] = 'TambahBarang';
		$this->data['all_komponen'] = $this->m_gudang_barang_jadi->lihat_stok_komponen();  
		$this->data['all_komponen1'] = $this->m_gudang_barang_jadi->getNamaBarang();  
		$this->data['barang'] = $this->m_gudang_barang_jadi->lihat_id1($kode_transaksi);

		$this->load->view('gudangBarangJadi/tambahEdit_penerimaan', $this->data);
	}
    
    public function get_all_barangPenerimaan()
    {
        $data = $this->m_gudang_barang_jadi->lihat_nama_barang($_POST['kode_komponen']);
        echo json_encode($data);
    }

    public function keranjang_barangPenerimaan()
    {
        $this->load->view('gudangBarangJadi/keranjangPenerimaan');
    } 

    public function proses_tambahEdit()
    {
        $jumlah_barang_diterima = count($this->input->post('nama_barang_hidden'));

        // $data_terima = [
        //     'kode_transaksi' => $this->input->post('kode_transaksi'),
        //     'tanggal_masuk' => $this->input->post('tanggal_masuk'),
        //     'jam_masuk' => $this->input->post('jam_masuk'),
        //     'nama_pengguna' => $this->input->post('nama_pengguna'),
        // ];


        $data_detail_terima = [];

        for ($i = 0; $i < $jumlah_barang_diterima; $i++) {
            array_push($data_detail_terima, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
            $data_detail_terima[$i]['kode_komponen'] = $this->input->post('kode_barang_hidden')[$i];
            $data_detail_terima[$i]['nama_komponen'] = $this->input->post('nama_barang_hidden')[$i];
            $data_detail_terima[$i]['spesifikasi'] = $this->input->post('spesifikasi_hidden')[$i];
            $data_detail_terima[$i]['tanggal'] = $this->input->post('tanggal_masuk_hidden')[$i];
            $data_detail_terima[$i]['jam'] = $this->input->post('jam_masuk_hidden')[$i];
            $data_detail_terima[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
            $data_detail_terima[$i]['satuan'] = $this->input->post('satuan_hidden')[$i]; 
        } 
             if ($this->m_gudang_barang_jadi->tambahDetailPenerimaan($data_detail_terima)) {
            for ($i = 0; $i < $jumlah_barang_diterima; $i++) {
                 $this->m_gudang_barang_jadi->plus_stok($data_detail_terima[$i]['jumlah'], $data_detail_terima[$i]['kode_komponen']) or die('gagal min stok');
            }
            $this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
            redirect('GudangBarangJadi/Penerimaan');
        }
    } 











    
   
 
    
    
    
    public function Ubah($kode_transaksi){ 
		$this->data['title'] = 'Tambah Barang';
		$this->data['all_komponen'] = $this->m_barang_mekanik->lihat_stok_komponen();  
		$this->data['all_komponen1'] = $this->m_barang_mekanik->getNamaBarang();  
		$this->data['barang'] = $this->m_barang_mekanik->lihat_id1($kode_transaksi);

		$this->load->view('gudangbahan_rm/tambahEdit_penerimaan', $this->data);
	}


    public function tambahHfnc()
    {
        $this->data['title'] = 'Tambah Transaksi HFNC';
        $this->data['titleHead'] = 'Tambah Transaksi | Mekanik';
        $this->data['all_barangHFNC'] = $this->m_barang_mekanik->lihat_stok_komponen_Hfnc();
        $dariDB = $this->m_penerimaan_mekanik->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
        $kodeBarangSekarang = $nourut + 1; 
        $this->data['kode_transaksi'] = $kodeBarangSekarang;
        $this->load->view('purchasingMekanik/transaksiMasuk/komponenBarang/tambahData/tambah_hfnc', $this->data);
    }

    public function tambahAntropometri()
    {
        $this->data['title'] = 'Tambah Transaksi Antropometri';
        $this->data['titleHead'] = 'Tambah Transaksi | Mekanik';
        $this->data['all_barangAntro'] = $this->m_barang_mekanik->lihat_stok_komponen_Antropometri();
        $dariDB = $this->m_penerimaan_mekanik->cekkodetransaksi(); 
        $nourut = substr($dariDB, 2, 4);
        $kodeBarangSekarang = $nourut + 1; 
        $this->data['kode_transaksi'] = $kodeBarangSekarang;
        $this->load->view('purchasingMekanik/transaksiMasuk/komponenBarang/tambahData/tambah_antropometri', $this->data);
    }
    
    public function proses_tambahHFNC()
    {
        $jumlah_barang_diterima = count($this->input->post('nama_barang_hidden'));

        $data_terima = [
            'kode_transaksi' => $this->input->post('kode_transaksi'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'jam_masuk' => $this->input->post('jam_masuk'),
            'nama_pengguna' => $this->input->post('nama_pengguna'),
        ];
        
        $data_detail_terima = [];

        for ($i = 0; $i < $jumlah_barang_diterima; $i++) {
            array_push($data_detail_terima, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
            $data_detail_terima[$i]['kode_komponen'] = $this->input->post('kode_barang_hidden')[$i];
            $data_detail_terima[$i]['nama_komponen'] = $this->input->post('nama_barang_hidden')[$i];
            $data_detail_terima[$i]['tanggal'] = $this->input->post('tanggal_masuk_hidden')[$i];
            $data_detail_terima[$i]['jam'] = $this->input->post('jam_masuk_hidden')[$i];
            $data_detail_terima[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
            $data_detail_terima[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
            // $data_detail_terima[$i]['catatan'] = $this->input->post('catatan_hidden')[$i];
        }
        // $id_komponen= [
            // 'kode_komponen' => $this->input->post('kode_komponen'),
            // 'id_komponen' => $this->input->post('id_komponen')
        // ];

        // $data= [
            // 'kode_komponen' => $this->input->post('kode_komponen'),
            // 'dipakai_alat' => $this->input->post('catatan')
        // ];

        // if ($this->m_penerimaan_mekanik->tambah($data_terima) && $this->m_detailterima_mekanik->tambah($data_detail_terima) && $this->m_penerimaan_mekanik->update($data,$id_komponen)) {
            if ($this->m_penerimaan_mekanik->tambah($data_terima) && $this->m_detailterima_mekanik->tambah($data_detail_terima)) {
            for ($i = 0; $i < $jumlah_barang_diterima; $i++) {
                // $this->m_barang_mekanik->plus_stok($data_detail_terima[$i]['jumlah'], $data_detail_terima[$i]['kode_komponen'], $data_detail_terima[$i]['id_barang']) or die('gagal min stok');
                $this->m_barang_mekanik->plus_stok($data_detail_terima[$i]['jumlah'], $data_detail_terima[$i]['kode_komponen']) or die('gagal min stok');
            }
            $this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
            redirect('PurchasingMekanik/PenerimaanMekanik');
        }
    }

    public function proses_tambahAntro()
    {
        $jumlah_barang_diterima = count($this->input->post('nama_barang_hidden'));

        $data_terima = [
            'kode_transaksi' => $this->input->post('kode_transaksi'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'jam_masuk' => $this->input->post('jam_masuk'),
            'nama_pengguna' => $this->input->post('nama_pengguna'),
        ];


        $data_detail_terima = [];

        for ($i = 0; $i < $jumlah_barang_diterima; $i++) {
            array_push($data_detail_terima, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
            $data_detail_terima[$i]['kode_komponen'] = $this->input->post('kode_barang_hidden')[$i];
            $data_detail_terima[$i]['nama_komponen'] = $this->input->post('nama_barang_hidden')[$i];
            $data_detail_terima[$i]['tanggal'] = $this->input->post('tanggal_masuk_hidden')[$i];
            $data_detail_terima[$i]['jam'] = $this->input->post('jam_masuk_hidden')[$i];
            $data_detail_terima[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
            $data_detail_terima[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
            // $data_detail_terima[$i]['catatan'] = $this->input->post('catatan_hidden')[$i];
        }
        // $id_komponen= [
            // 'kode_komponen' => $this->input->post('kode_komponen'),
            // 'id_komponen' => $this->input->post('id_komponen')
        // ];

        // $data= [
            // 'kode_komponen' => $this->input->post('kode_komponen'),
            // 'dipakai_alat' => $this->input->post('catatan')
        // ];

        // if ($this->m_penerimaan_mekanik->tambah($data_terima) && $this->m_detailterima_mekanik->tambah($data_detail_terima) && $this->m_penerimaan_mekanik->update($data,$id_komponen)) {
            if ($this->m_penerimaan_mekanik->tambah($data_terima) && $this->m_detailterima_mekanik->tambah($data_detail_terima)) {
            for ($i = 0; $i < $jumlah_barang_diterima; $i++) {
                // $this->m_barang_mekanik->plus_stok($data_detail_terima[$i]['jumlah'], $data_detail_terima[$i]['kode_komponen'], $data_detail_terima[$i]['id_barang']) or die('gagal min stok');
                $this->m_barang_mekanik->plus_stok($data_detail_terima[$i]['jumlah'], $data_detail_terima[$i]['kode_komponen']) or die('gagal min stok');
            }
            $this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
            redirect('PurchasingMekanik/PenerimaanMekanik');
        }
    }
    
    


    public function proses_tambah1(){
		$jumlah_barang_diterima = count($this->input->post('nama_barang_hidden'));
		
		// $data_terima = [
		// 	'kode_transaksi' => $this->input->post('kode_transaksi'),
		// 	'tanggal_masuk' => $this->input->post('tanggal_masuk'),
		// 	'jam_masuk' => $this->input->post('jam_masuk'), 
		// 	'nama_pengguna' => $this->input->post('nama_pengguna'),
		// ];
 
		$data_detail_terima = [];

		for($i = 0; $i < $jumlah_barang_diterima; $i++){
			array_push($data_detail_terima, ['kode_transaksi' => $this->input->post('kode_transaksi')]);
			$data_detail_terima[$i]['kode_komponen'] = $this->input->post('kode_barang_hidden')[$i];
			// $data_detail_terima[$i]['tanggal_masuk'] = $this->input->post('tanggal_masuk_hidden')[$i];
			$data_detail_terima[$i]['nama_komponen'] = $this->input->post('nama_barang_hidden')[$i];
			// $data_detail_terima[$i]['id_barang'] = $this->input->post('id_barang_hidden')[$i];
			$data_detail_terima[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_terima[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			// $data_detail_terima[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i];
		}

		if($this->m_detailterima_mekanik->tambah($data_detail_terima)){
			for ($i=0; $i < $jumlah_barang_diterima ; $i++) {
				$this->m_barang_mekanik->plus_stok($data_detail_terima[$i]['jumlah'], $data_detail_terima[$i]['kode_komponen']) or die('gagal min stok');
			}
			$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('PurchasingMekanik/PenerimaanMekanik');
		}
	}
    
    public function hapus($kode_transaksi)
    {
        if ($this->m_penerimaan_mekanik->hapus($kode_transaksi) && $this->m_detailterima_mekanik->hapus($kode_transaksi)) {
            $this->session->set_flashdata('success', 'Invoice Penerimaan <strong>Berhasil</strong> Dihapus!');
            redirect('PurchasingMekanik/PenerimaanMekanik');
        } else {
            $this->session->set_flashdata('error', 'Invoice Penerimaan <strong>Gagal</strong> Dihapus!');
            redirect('PurchasingMekanik/PenerimaanMekanik');
        }
    }
 
    

    public function tambahEdit_Antropometri($kode_transaksi){  
		$this->data['title'] = 'Tambah Barang Antropometri';
		$this->data['titleHead'] = 'TambahBarang | Antropometri';
		$this->data['all_komponen'] = $this->m_barang_mekanik->lihat_stok_komponen_Antropometri();  
		$this->data['all_komponen1'] = $this->m_barang_mekanik->getNamaBarang();  
		$this->data['barang'] = $this->m_barang_mekanik->lihat_id1($kode_transaksi);

		$this->load->view('purchasingMekanik/transaksiMasuk/komponenBarang/tambahEdit/tambahEdit_antropometri', $this->data);
	}

    

    
}
