<?php
class PenerimaanMekanik extends CI_Controller
{  
    public function __construct()
    {
        parent::__construct();
        if ($this->session->login['role'] != 'super' && $this->session->login['role'] != 'mekanik'  && $this->session->login['role'] != 'supervisor') redirect();
        date_default_timezone_set('Asia/Jakarta');
        $this->data['aktif'] = 'PenerimaanMekanik';
        $this->load->model('purchasingMekanik/M_barang_mekanik', 'm_barang_mekanik');
        $this->load->model('purchasingMekanik/M_penerimaan_mekanik', 'm_penerimaan_mekanik');
        $this->load->model('purchasingMekanik/M_DetailTerima_Mekanik', 'm_detailterima_mekanik');
    }

    public function index()
    {
        unset($_SESSION['errorStok']); 
        
        $this->data['title'] = 'Transaksi Masuk';
        $this->data['titleHead'] = 'Transaksi Masuk | Mekanik';
        $this->data['all_penerimaan'] = $this->m_penerimaan_mekanik->lihat();
        $this->data['all_test'] = $this->m_penerimaan_mekanik->cekmaxTanggal(); 
        $this->data['all_test1'] = date('d/m/Y');
        $this->data['no'] = 1;

        // $query = $this->m_penerimaan_mekanik->lihatMerge();
        // $this->data['arr'] = $this->m_penerimaan_mekanik->lihatMerge();
        // $this->data['arr'] = $this->m_penerimaan_mekanik->lihatMerge();

        // $conn = mysqli_connect('localhost', 'root', 'gerlinkju@r@', 'test');
        // $query = mysqli_query($conn, "SELECT * FROM tbl_mergecell ORDER BY kode_diagnosa");

        // $arr = array();
        // while ($row  = mysqli_fetch_object($query)) {
        //     $arr[$row->kode_diagnosa][] = $row;
        // }

        // $this->data['arr'] = $arr;



        // $this->data = array( 
        //     'galeri' => $galeri
        // );

        $this->load->view('purchasingMekanik/transaksiMasuk/komponenBarang/lihat', $this->data);
    }

	public function ubah($kode_transaksi){ 
		$this->data['title'] = 'Tambah Barang';
		$this->data['all_komponen'] = $this->m_barang_mekanik->lihat_stok_komponen();  
		$this->data['all_komponen1'] = $this->m_barang_mekanik->getNamaBarang();  
		$this->data['barang'] = $this->m_barang_mekanik->lihat_id1($kode_transaksi);

		$this->load->view('purchasingMekanik/transaksiMasuk/komponenBarang/tambahEdit/TambahEdit', $this->data);
	}

    
    public function detail($kode_transaksi)
    {
        $this->data['title'] = 'Detail Penerimaan';
        $this->data['titleHead'] = 'Detail Penerimaan | Mekanik';
        $this->data['penerimaan'] = $this->m_penerimaan_mekanik->lihat_no_terima($kode_transaksi);
        // $this->db->select('*');
        // $this->db->from('tb_detail_masuk');
        // $this->db->join('tb_barang', 'tb_detail_masuk.id_barangm = tb_barang.id_barangm');
        // $this->db->where('tb_detail_masuk.id_barangm', $kode_transaksi);
        // $query = $this->db->get()->result_array();
        $this->data['all_detail_terima'] = $this->m_detailterima_mekanik->lihat_no_terima($kode_transaksi);
        $this->data['no'] = 1;
        //$this->data['id'] = $this->m_penerimaan_mekanik->tipebarang($kode_transaksi);

        $this->load->view('purchasingMekanik/transaksiMasuk/komponenBarang/detail', $this->data);
    }
    
    public function detailHapus($kode_komponen)
	{
		$this->data['title'] = 'Ubah HFNC';
		$this->data['titleHead'] = 'Ubah | Barang HFNC';
		$this->data['barang'] = $this->m_detailterima_mekanik->lihat_id($kode_komponen);

		$this->load->view('purchasingMekanik/transaksiMasuk/komponenBarang/hapusDetail', $this->data);
	}
 
    public function proses_detailHapus()
    { 
        $id_detail = $this->input->post('id_detail');
        $total_stok = $this->input->post('jumlah');
        $kode_komponen = $this->input->post('kode_komponen');
 
        if ($this->m_detailterima_mekanik->hapusDetail($id_detail)) {
            
            $this->m_barang_mekanik->min_stok($total_stok,$kode_komponen) or die('gagal min stok'); 
            redirect('PurchasingMekanik/PenerimaanMekanik');
        }
    }

    
    public function tambah()
    {
        $this->data['title'] = 'Tambah Transaksi';
        $this->data['titleHead'] = 'Tambah Transaksi | Mekanik';
        $this->data['all_komponen'] = $this->m_barang_mekanik->lihat_stok_komponen();
        $dariDB = $this->m_penerimaan_mekanik->cekkodetransaksi(); 
        if(empty($dariDB)){
    		$kodeBarangSekarang = '001'; 
    		$this->data['kode_transaksi'] = $kodeBarangSekarang;
            $this->load->view('purchasingMekanik/transaksiMasuk/komponenBarang/tambahData/tambah', $this->data);
    		
        }else{
            $nourut = substr($dariDB, 2, 4);
            $kodeBarangSekarang = $nourut + 1; 
            $this->data['kode_transaksi'] = $kodeBarangSekarang;
            $this->load->view('purchasingMekanik/transaksiMasuk/komponenBarang/tambahData/tambah', $this->data);
        } 
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
    
    public function proses_tambah()
	{  
	     unset($_SESSION['errorStok']); 
	    
		$keyword = $this->input->post('tanggal_masuk'); 
		$timestamp = strtotime($keyword);
		$new_date_format = date('Y-m-d', $timestamp); 

		$countDuplicate = $this->m_penerimaan_mekanik->countDuplicate1($new_date_format); 

		if(empty($countDuplicate)){ 
			$data_terima = [
				'kode_transaksi' => $this->input->post('kode_transaksi'),
				'tanggal_masuk' => $new_date_format,
				// 'jam' => $this->input->post('jam_masuk'), 
				'nama_pengguna' => $this->input->post('nama_pengguna'),
			];  
				$this->m_penerimaan_mekanik->tambah($data_terima);
				redirect('PurchasingMekanik/PenerimaanMekanik'); 
		} else { 
			$this->session->set_flashdata('errorStok', 'Tanggal Sudah Ada !'); 
			redirect('PurchasingMekanik/PenerimaanMekanik/tambah');  
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
 
    public function tambahEdit_Hfnc($kode_transaksi){  
		$this->data['title'] = 'Tambah Barang HFNC';
		$this->data['titleHead'] = 'TambahBarang | HFNC ';
		$this->data['all_komponen'] = $this->m_barang_mekanik->lihat_stok_komponen_Hfnc();  
		$this->data['all_komponen1'] = $this->m_barang_mekanik->getNamaBarang();  
		$this->data['barang'] = $this->m_barang_mekanik->lihat_id1($kode_transaksi);

		$this->load->view('purchasingMekanik/transaksiMasuk/komponenBarang/tambahEdit/tambahEdit_hfnc', $this->data);
	}

    public function tambahEdit_Antropometri($kode_transaksi){  
		$this->data['title'] = 'Tambah Barang Antropometri';
		$this->data['titleHead'] = 'TambahBarang | Antropometri';
		$this->data['all_komponen'] = $this->m_barang_mekanik->lihat_stok_komponen_Antropometri();  
		$this->data['all_komponen1'] = $this->m_barang_mekanik->getNamaBarang();  
		$this->data['barang'] = $this->m_barang_mekanik->lihat_id1($kode_transaksi);

		$this->load->view('purchasingMekanik/transaksiMasuk/komponenBarang/tambahEdit/tambahEdit_antropometri', $this->data);
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
            $data_detail_terima[$i]['tanggal'] = $this->input->post('tanggal_masuk_hidden')[$i];
            $data_detail_terima[$i]['jam'] = $this->input->post('jam_masuk_hidden')[$i];
            $data_detail_terima[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
            $data_detail_terima[$i]['satuan'] = $this->input->post('satuan_hidden')[$i]; 
        } 
             if ($this->m_detailterima_mekanik->tambah($data_detail_terima)) {
            for ($i = 0; $i < $jumlah_barang_diterima; $i++) {
                 $this->m_barang_mekanik->plus_stok($data_detail_terima[$i]['jumlah'], $data_detail_terima[$i]['kode_komponen']) or die('gagal min stok');
            }
            $this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
            redirect('PurchasingMekanik/PenerimaanMekanik');
        }
    } 

    public function get_all_barang()
    {
        $data = $this->m_barang_mekanik->lihat_nama_barang($_POST['kode_komponen']);
        echo json_encode($data);
    }

    public function keranjang_barang()
    {
        $this->load->view('purchasingMekanik/transaksiMasuk/komponenBarang/keranjang');
    } 
}
