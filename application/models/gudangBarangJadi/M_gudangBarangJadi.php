<?php
class M_gudangBarangJadi extends CI_Model
{
	protected $_table = 'barangjadi_komponen'; 
	protected $_table2 = 'barangjadi_masuk';
	protected $_table3 = 'barangjadi_detail_masuk';
	protected $_table4 = 'barangjadi_keluar';
	protected $_table5 = 'barangjadi_detail_keluar';
	protected $_table6 = 'rawmat_barang';
	public $kode_komponen; 

	public function lihat()
	{
		$query = $this->db->get($this->_table);
		return $query->result();
	} 

	public function cekkodebarang()
	{
		$query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from rawmat_komponen_bautmur");
		$hasil = $query->row();
		return $hasil->kodebarang;
	}

	public function tambah($data)
	{
		return $this->db->insert($this->_table, $data);
	}

	public function lihat_id($kode_komponen)
	{
		$query = $this->db->get_where($this->_table, ['kode_komponen' => $kode_komponen]);
		return $query->row();
	}

	public function ubah($data, $kode_komponen)
	{
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_komponen' => $kode_komponen]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function getNextKomponenCode($selectedValue) {
        $kodeAwalan = '';
        switch ($selectedValue) {
            case 'Import':
                $kodeAwalan = 'IB';
                break;
            case 'Ent/THT':
                $kodeAwalan = 'EB';
                break;
			case 'Hysteroscopy':
				$kodeAwalan = 'HB';
				break;
			case 'Laparoscopy':
				$kodeAwalan = 'LB';
				break;
			case 'Electric hysteria cutter(morcellator)':
				$kodeAwalan = 'CB';
				break;
			case 'Vats video Assisted thoracoscopy':
				$kodeAwalan = 'VB';
				break;
			case 'Arthroscpoy':
				$kodeAwalan = 'AB';
				break;
			case 'Spine':
				$kodeAwalan = 'SB';
				break;
			case 'Urology':
				$kodeAwalan = 'UB';
				break;
			case 'Endoscopy Scope':
				$kodeAwalan = 'DB';
				break;
			case 'Elektronik':
				$kodeAwalan = 'TB';
				break;
			case 'Non Elektronik':
				$kodeAwalan = 'NB';
				break;
			case 'Stainless':
				$kodeAwalan = 'RB';
				break;
			case 'Bed':
				$kodeAwalan = 'BB';
				break;
			case 'Inventaris':
				$kodeAwalan = 'GB';
				break;
			case 'Barang Jadi':
				$kodeAwalan = 'JB';
				break;
			case 'Barang Kemas':
				$kodeAwalan = 'KB';
				break;
            default:
                $kodeAwalan = '';
        }

        $this->db->like('kode_komponen', $kodeAwalan);
        $this->db->order_by('kode_komponen', 'DESC');
        $query = $this->db->get('barangjadi_komponen', 1);

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $lastCode = $row->kode_komponen;
            $lastNumber = intval(substr($lastCode, 2));
            $nextNumber = $lastNumber + 1;
            $nextCode = $kodeAwalan . sprintf("%04d", $nextNumber);
        } else {
            $nextCode = $kodeAwalan . "0001";
        }

        return $nextCode;
    }

	public function hapus($kode_komponen)
	{
		return $this->db->delete($this->_table, ['kode_komponen' => $kode_komponen]);
	}

	public function dashboard()
	{ 
		// $query = $this->db->get_where($this->_table, 'total_stok < 5');
		// return $query->result();

		$query = $this->db->query("SELECT `id_komponen`, `kode_komponen`, `nama_komponen`, `spesifikasi`, `qty_unit`, `harga_satuan`, `total_stok`,`keterangan_barang`, `satuan`, `keterangan`, `nama_toko`, `kebutuhan`, `type_barang`, `stok_minimal`, 
									CASE 
										WHEN keterangan_barang = 'prioritas' AND total_stok >= stok_minimal THEN 'cukup' 
										WHEN keterangan_barang = 'prioritas' AND total_stok < stok_minimal THEN 'menipis' 
										WHEN keterangan_barang = '-' AND total_stok < stok_minimal THEN 'menipis' 
									ELSE 'cukup' 
									END AS `keterangan_stok` 
									FROM rawmat_komponen WHERE (keterangan_barang = 'prioritas') OR (keterangan_barang = '-' AND total_stok < stok_minimal)
									ORDER by keterangan_barang DESC
									");
        $hasil = $query->result();
        return $hasil; 
	}

	public function lihatPenerimaan(){  
		$query = $this->db->query("SELECT * from barangjadi_masuk ORDER BY kode_transaksi DESC");
        $hasil = $query->result();
        return $hasil;
	}  

	public function cekmaxTanggalPenerimaan()
    {
        $query = $this->db->query("SELECT MAX(tanggal_masuk) as tanggal from barangjadi_masuk");
        $hasil = $query->row();
        return $hasil->tanggal;
	}

	public function cekkodetransaksi()
    {
        $query = $this->db->query("SELECT MAX(kode_transaksi) as kodetransaksi FROM barangjadi_masuk");
        $hasil = $query->row();
        return $hasil->kodetransaksi;
    }

	public function countDuplicatePenerimaan($querry = null)
	{
		$query = $this->db->get_where($this->_table2, ['tanggal_masuk' => $querry]);
		return $query->row();  

	} 

	public function tambahPenerimaan($data){
		return $this->db->insert($this->_table2, $data);
	}

	public function lihat_no_penerimaan($kode_transaksi){
		return $this->db->get_where($this->_table2, ['kode_transaksi' => $kode_transaksi])->row();
	}

	public function lihat_no_detailPenerimaan($kode_transaksi)
	{
		// return $this->db->get_where($this->_table3, ['kode_transaksi' => $kode_transaksi])->result();  
		$this->db->select('kode_komponen, nama_komponen, spesifikasi,SUM(jumlah) as jumlah,  tanggal, id_detail, satuan, jam');
		$this->db->from('barangjadi_detail_masuk');
		$this->db->where('kode_transaksi', $kode_transaksi); // Add this line to filter by kode_transaksi
		$this->db->group_by('kode_komponen, nama_komponen, spesifikasi,  tanggal');
		return $this->db->get()->result();
	}

	public function lihat_id_detailPenerimaan($kode_komponen)
	{
		$query = $this->db->get_where($this->_table3, ['id_detail' => $kode_komponen]);
		return $query->row();
	}

	public function hapusDetailPenerimaan($kode_transaksi)
	{
		return $this->db->delete($this->_table3, ['id_detail' => $kode_transaksi]);
	}

	public function min_stok($total_stok, $kode_komponen)
	{
		$query = $this->db->set('total_stok', 'total_stok-' . $total_stok, false);
		$query = $this->db->where('kode_komponen', $kode_komponen);
		// $query = $this->db->where('id_barangm', $id_barang);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function lihat_stok_komponen()
	{
		$query = $this->db->get_where($this->_table);
		return $query->result();
	}

	public function getNamaBarang()
	{
	    $query = $this->db->query("SELECT * FROM `mekanik_barang`");
	    $hasil = $query->result();
		return $hasil; 
	} 
 
	public function lihat_id1($kode_transaksi)
	{
		$query = $this->db->get_where($this->_table2, ['kode_transaksi' => $kode_transaksi]);
		return $query->row();
	}

	public function lihat_nama_barang($kode_komponen)
	{
		$query = $this->db->select('*');
		$query = $this->db->where(['kode_komponen' => $kode_komponen]);
		$query = $this->db->get($this->_table);
		return $query->row();
	}

	public function tambahDetailPenerimaan($data)
	{
		return $this->db->insert_batch($this->_table3, $data);
	}

	public function plus_stok($total_stok, $kode_komponen)
	{
		$query = $this->db->set('total_stok', 'total_stok+' . $total_stok, false);
		$query = $this->db->where('kode_komponen', $kode_komponen);
		// $query = $this->db->where('id_barangm', $id_barang);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function lihatPengeluaran(){
		// return $this->db->get($this->_table)->result();
		$query = $this->db->query("SELECT * from barangjadi_keluar ORDER BY kode_transaksi DESC");
        $hasil = $query->result();
        return $hasil;
	} 

	public function cekkodetransaksiPengeluaran()
    {
        $query = $this->db->query("SELECT MAX(kode_transaksi) as kodetransaksi from barangjadi_keluar");
        $hasil = $query->row();
        return $hasil->kodetransaksi;
    }

	public function countDuplicatePengeluaran($querry = null)
	{
		$query = $this->db->get_where($this->_table4, ['tanggal_keluar' => $querry]);
		return $query->row();  

	} 

	public function tambahPengeluaran($data){
		return $this->db->insert($this->_table4, $data);
	}

	public function lihat_no_keluar($kode_transaksi){
		return $this->db->get_where($this->_table4, ['kode_transaksi' => $kode_transaksi])->row();
	}

	public function lihat_no_detailKeluar($kode_transaksi) {
		$this->db->select('nama_komponen, spesifikasi,SUM(jumlah) as jumlah, peruntukan, pengambil, tanggal, id_detail, satuan, jam, shift');
		$this->db->from('barangjadi_detail_keluar');
		$this->db->where('kode_transaksi', $kode_transaksi); // Add this line to filter by kode_transaksi
		$this->db->group_by('nama_komponen, spesifikasi,peruntukan, pengambil, tanggal, shift');
		return $this->db->get()->result();
	}
 
	

	public function lihat_idPengeluaran($kode_komponen)
	{
		$query = $this->db->get_where($this->_table5, ['id_detail' => $kode_komponen]);
		return $query->row();
	}

	public function hapusDetailPengeluaran($kode_transaksi)
	{
		return $this->db->delete($this->_table5, ['id_detail' => $kode_transaksi]);
	}

	public function tampil_komponen()
	{
		$query = $this->db->get_where($this->_table, 'total_stok > 0');
		return $query->result();
	}

	public function tampil_barang()
	{
		$query = $this->db->get_where($this->_table6);
		return $query->result();
	} 

	public function lihat_id2($kode_transaksi)
	{
		$query = $this->db->get_where($this->_table4, ['kode_transaksi' => $kode_transaksi]);
		return $query->row();
	}

	public function AllPengambil()
	{
		$query = $this->db->query("SELECT * FROM tb_karyawan");
		$hasil = $query->result();
		return $hasil;
	}

	public function tambahDetailKeluar($data){
		return $this->db->insert_batch($this->_table5, $data);
	}

	public function import()
	{
		$query = $this->db->query("SELECT * FROM barangjadi_komponen WHERE jenis_komponen = 'Import'");
		$hasil = $query->result();
		return $hasil;
	}

	public function entTHT()
	{
		$query = $this->db->query("SELECT * FROM barangjadi_komponen WHERE jenis_komponen = 'Ent/THT'");
		$hasil = $query->result();
		return $hasil;
	}

	public function hysteroscopy()
	{
		$query = $this->db->query("SELECT * FROM barangjadi_komponen WHERE jenis_komponen = 'Hysteroscopy'");
		$hasil = $query->result();
		return $hasil;
	}

	public function laparoscopy()
	{
		$query = $this->db->query("SELECT * FROM barangjadi_komponen WHERE jenis_komponen = 'Laparoscopy'");
		$hasil = $query->result();
		return $hasil;
	}

	public function electricHysteriaCutter()
	{
		$query = $this->db->query("SELECT * FROM barangjadi_komponen WHERE jenis_komponen = 'Electric hysteria cutter(morcellator)'");
		$hasil = $query->result();
		return $hasil;
	}

	public function vatsVideoAssisted()
	{
		$query = $this->db->query("SELECT * FROM barangjadi_komponen WHERE jenis_komponen = 'Vats video Assisted thoracoscopy'");
		$hasil = $query->result();
		return $hasil;
	}

	public function arthroscpoy()
	{
		$query = $this->db->query("SELECT * FROM barangjadi_komponen WHERE jenis_komponen = 'Arthroscpoy'");
		$hasil = $query->result();
		return $hasil;
	}

	public function spine()
	{
		$query = $this->db->query("SELECT * FROM barangjadi_komponen WHERE jenis_komponen = 'Spine'");
		$hasil = $query->result();
		return $hasil;
	}

	public function urology()
	{
		$query = $this->db->query("SELECT * FROM barangjadi_komponen WHERE jenis_komponen = 'Urology'");
		$hasil = $query->result();
		return $hasil;
	}

	public function endoscopyScope()
	{
		$query = $this->db->query("SELECT * FROM barangjadi_komponen WHERE jenis_komponen = 'Endoscopy Scope'");
		$hasil = $query->result();
		return $hasil;
	}

	public function elektronik()
	{
		$query = $this->db->query("SELECT * FROM barangjadi_komponen WHERE jenis_komponen = 'Elektronik'");
		$hasil = $query->result();
		return $hasil;
	}

	public function nonElektronik()
	{
		$query = $this->db->query("SELECT * FROM barangjadi_komponen WHERE jenis_komponen = 'Non Elektronik'");
		$hasil = $query->result();
		return $hasil;
	}

	public function stainless()
	{
		$query = $this->db->query("SELECT * FROM barangjadi_komponen WHERE jenis_komponen = 'Stainless'");
		$hasil = $query->result();
		return $hasil;
	}

	public function bed()
	{
		$query = $this->db->query("SELECT * FROM barangjadi_komponen WHERE jenis_komponen = 'Bed'");
		$hasil = $query->result();
		return $hasil;
	}

	public function inventaris()
	{
		$query = $this->db->query("SELECT * FROM barangjadi_komponen WHERE jenis_komponen = 'Inventaris'");
		$hasil = $query->result();
		return $hasil;
	}

	public function barangJadi()
	{
		$query = $this->db->query("SELECT * FROM barangjadi_komponen WHERE jenis_komponen = 'Barang Jadi'");
		$hasil = $query->result();
		return $hasil;
	}

	public function barangKemas()
	{
		$query = $this->db->query("SELECT * FROM barangjadi_komponen WHERE jenis_komponen = 'Barang Kemas'");
		$hasil = $query->result();
		return $hasil;
	}
 










































	public function All()
	{ 
		$query = $this->db->query("SELECT `id_komponen`, `kode_komponen`, `nama_komponen`, `spesifikasi`, `qty_unit`, `harga_satuan`, `total_stok`, `stok_alat`, `satuan`, `keterangan`, `nama_toko`, `kebutuhan`, `type_barang`, `stok_minimal`, `id_barangm`, 
									CASE 
										WHEN type_barang = 'prioritas' AND total_stok >= stok_minimal THEN 'cukup' 
										WHEN type_barang = 'prioritas' AND total_stok < stok_minimal THEN 'menipis' 
										WHEN type_barang = '-' AND total_stok < stok_minimal THEN 'menipis' 
									ELSE 'cukup' 
									END AS `keterangan_stok` 
									FROM mekanik_komponen WHERE (type_barang = 'prioritas') OR (type_barang = '-' AND total_stok < stok_minimal)
									ORDER by type_barang DESC
									");
        $hasil = $query->result();
        return $hasil; 
	}

	public function jumlah()
	{
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	} 

	
	

	// public function lihat_stok_komponen()
	// {
	// 	$query = $this->db->get_where($this->_table);
	// 	return $query->result();
	// }

	public function lihat_stok_komponen_Hfnc(){
		$query = $this->db->query("SELECT * FROM mekanik_komponen WHERE id_barangm = '1'");
        $hasil = $query->result();
        return $hasil;
	}

	public function lihat_stok_komponen_Antropometri(){
		$query = $this->db->query("SELECT * FROM mekanik_komponen WHERE id_barangm = '2'");
        $hasil = $query->result();
        return $hasil;
	}

	

	// public function lihat_id1($kode_transaksi)
	// {
	// 	$query = $this->db->get_where($this->_table2, ['kode_transaksi' => $kode_transaksi]);
	// 	return $query->row();
	// }

	// public function lihat_id2($kode_transaksi)
	// {
	// 	$query = $this->db->get_where($this->_table3, ['kode_transaksi' => $kode_transaksi]);
	// 	return $query->row();
	// }
	
	public function countDuplicate1($querry = null)
	{
		$query = $this->db->get_where($this->_table3, ['tanggal_keluar' => $querry]);
		return $query->row();  

	} 


	// public function lihat_nama_barang($kode_komponen)
	// {
	// 	$query = $this->db->select('*');
	// 	$query = $this->db->where(['kode_komponen' => $kode_komponen]);
	// 	$query = $this->db->get($this->_table);
	// 	return $query->row();
	// }
	
	

	public function tambah_keluar($data)
	{
		return $this->db->insert($this->_table3, $data);
	}

	// public function plus_stok($total_stok, $kode_komponen)
	// {
	// 	$query = $this->db->set('total_stok', 'total_stok+' . $total_stok, false);
	// 	$query = $this->db->where('kode_komponen', $kode_komponen);
	// 	// $query = $this->db->where('id_barangm', $id_barang);
	// 	$query = $this->db->update($this->_table);
	// 	return $query;
	// }

	 

	// public function min_stok($total_stok, $kode_komponen)
	// {
	// 	$query = $this->db->set('total_stok', 'total_stok-' . $total_stok, false);
	// 	$query = $this->db->where('kode_komponen', $kode_komponen);
	// 	// $query = $this->db->where('id_barangm', $id_barang);
	// 	$query = $this->db->update($this->_table);
	// 	return $query;
	// }
	
	

	

	// public function cekkodebarang()
	// {
	// 	$query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from mekanik_komponen");
	// 	$hasil = $query->row();
	// 	return $hasil->kodebarang;
	// }

	public function allAlat()
	{
		$query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from mekanik_komponen");
		$hasil = $query->row();
		return $hasil->kodebarang;
	}

	

	public function cekkodebarangAntropometri()
	{
		$query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from mekanik_komponen WHERE id_barangm = '2'");
		$hasil = $query->row();
		return $hasil->kodebarang;
	} 

	// public function tampil_komponen()
	// {
	// 	$query = $this->db->get_where($this->_table, 'total_stok > 0');
	// 	return $query->result();
	// }

	// public function tampil_barang()
	// {
	// 	$query = $this->db->get_where($this->_table4);
	// 	return $query->result();
	// } 

	public function AllBarang()
	{
		$query = $this->db->query("SELECT * FROM mekanik_barang");
		$hasil = $query->result();
		return $hasil;
	}

	// public function AllPengambil()
	// {
	// 	$query = $this->db->query("SELECT * FROM tb_karyawan");
	// 	$hasil = $query->result();
	// 	return $hasil;
	// }
	
	public function HFNC()
	{
		$query = $this->db->query("SELECT * FROM mekanik_komponen WHERE id_barangm = '1'");
		$hasil = $query->result();
		return $hasil;
	}

	public function Antropometri()
	{
		$query = $this->db->query("SELECT * FROM mekanik_komponen WHERE id_barangm = '2' ORDER BY nama_komponen");
		$hasil = $query->result();
		return $hasil;
	} 

	// public function getNamaBarang()
	// {
	//     $query = $this->db->query("SELECT * FROM `mekanik_barang`");
	//     $hasil = $query->result();
	// 	return $hasil; 
	// } 
}
