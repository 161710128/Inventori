<?php
class M_barang_mekanik extends CI_Model
{
	protected $_table = 'mekanik_komponen'; 
	protected $_table2 = 'mekanik_masuk';
	protected $_table3 = 'mekanik_keluar';
	protected $_table4 = 'mekanik_barang';
	public $kode_komponen;

	public function All()
	{ 
		// $query = $this->db->get_where($this->_table, 'total_stok < 5');
		// return $query->result();

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

	public function lihat()
	{
		// $query = $this->db->get($this->_table);
		// return $query->result();
		$query = $this->db->order_by('stok_alat', 'DESC')->get($this->_table);
		return $query->result();

	} 
	

	public function lihat_stok_komponen()
	{
		$query = $this->db->get_where($this->_table);
		return $query->result();
	}

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

	public function lihat_id($kode_komponen)
	{
		$query = $this->db->get_where($this->_table, ['kode_komponen' => $kode_komponen]);
		return $query->row();
	}

	public function lihat_id1($kode_transaksi)
	{
		$query = $this->db->get_where($this->_table2, ['kode_transaksi' => $kode_transaksi]);
		return $query->row();
	}

	public function lihat_id2($kode_transaksi)
	{
		$query = $this->db->get_where($this->_table3, ['kode_transaksi' => $kode_transaksi]);
		return $query->row();
	}
	
	public function countDuplicate1($querry = null)
	{
		$query = $this->db->get_where($this->_table3, ['tanggal_keluar' => $querry]);
		return $query->row();  

	} 


	public function lihat_nama_barang($kode_komponen)
	{
		$query = $this->db->select('*');
		$query = $this->db->where(['kode_komponen' => $kode_komponen]);
		$query = $this->db->get($this->_table);
		return $query->row();
	}
	
	public function tambah($data)
	{
		return $this->db->insert($this->_table, $data);
	}

	public function tambah_keluar($data)
	{
		return $this->db->insert($this->_table3, $data);
	}

	public function plus_stok($total_stok, $kode_komponen)
	{
		$query = $this->db->set('total_stok', 'total_stok+' . $total_stok, false);
		$query = $this->db->where('kode_komponen', $kode_komponen);
		// $query = $this->db->where('id_barangm', $id_barang);
		$query = $this->db->update($this->_table);
		return $query;
	}

	 

	public function min_stok($total_stok, $kode_komponen)
	{
		$query = $this->db->set('total_stok', 'total_stok-' . $total_stok, false);
		$query = $this->db->where('kode_komponen', $kode_komponen);
		// $query = $this->db->where('id_barangm', $id_barang);
		$query = $this->db->update($this->_table);
		return $query;
	}
	
	public function ubah($data, $kode_komponen)
	{
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_komponen' => $kode_komponen]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($kode_komponen)
	{
		return $this->db->delete($this->_table, ['kode_komponen' => $kode_komponen]);
	}

	public function cekkodebarang()
	{
		$query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from mekanik_komponen");
		$hasil = $query->row();
		return $hasil->kodebarang;
	}

	public function allAlat()
	{
		$query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from mekanik_komponen");
		$hasil = $query->row();
		return $hasil->kodebarang;
	}

	public function cekkodebarangHFNC()
	{
		$query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from mekanik_komponen WHERE id_barangm = '1'");
		$hasil = $query->row();
		return $hasil->kodebarang;
	}

	public function cekkodebarangAntropometri()
	{
		$query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from mekanik_komponen WHERE id_barangm = '2'");
		$hasil = $query->row();
		return $hasil->kodebarang;
	} 

	public function tampil_komponen()
	{
		$query = $this->db->get_where($this->_table, 'total_stok > 0');
		return $query->result();
	}

	public function tampil_barang()
	{
		$query = $this->db->get_where($this->_table4);
		return $query->result();
	} 

	public function AllBarang()
	{
		$query = $this->db->query("SELECT * FROM mekanik_barang");
		$hasil = $query->result();
		return $hasil;
	}

	public function AllPengambil()
	{
		$query = $this->db->query("SELECT * FROM tb_karyawan");
		$hasil = $query->result();
		return $hasil;
	}
	
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

	public function getNamaBarang()
	{
	    $query = $this->db->query("SELECT * FROM `mekanik_barang`");
	    $hasil = $query->result();
		return $hasil; 
	} 
}
