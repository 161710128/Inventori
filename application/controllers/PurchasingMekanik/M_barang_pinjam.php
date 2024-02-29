<?php

class M_barang_pinjam extends CI_Model
{
	protected $_table = 'mekanik_barang_pinjam';  
	protected $_table2 = 'mekanik_masuk';
	protected $_table3 = 'mekanik_keluar';
	protected $_table4 = 'mekanik_barang';
	protected $_table5 = 'mekanik_detail_pinjam'; 
	protected $_table6 = 'elektro_barang'; 
	public $kode_komponen;

	// public function lihat()
	// {
		// $query = $this->db->get($this->_table);
		// return $query->result();
	// } 
	public function lihat()
	{
		// Pilih kolom yang ingin diambil dari masing-masing tabel
		$this->db->select($this->_table . '.*, ' . $this->_table5 . '.keterangan');

		// Tentukan kondisi join
		$this->db->from($this->_table);
		$this->db->join($this->_table5, $this->_table . '.kode_part = ' . $this->_table5 . '.kode_part', 'left');
		$this->db->group_by($this->_table . '.kode_part');
		// Lakukan query
		$query = $this->db->get();

		// Kembalikan hasil query
		return $query->result();
	}

	public function lihat_stok()
	{
		$query = $this->db->get_where($this->_table, 'total_stok > 0');
		return $query->result();
	}
	
	public function lihat_alat()
	{
		$query = $this->db->get($this->_table6);
		return $query->result();
	}

	public function cekkodebarang()
	{
		$query = $this->db->query("SELECT MAX(kode_part) as kodebarang from mekanik_barang_pinjam");
		$hasil = $query->row();
		return $hasil->kodebarang;
	}

	public function tambah($data)
	{
		return $this->db->insert($this->_table, $data);
	}

	public function lihat_id($kode_komponen)
	{
		$query = $this->db->get_where($this->_table, ['kode_part' => $kode_komponen]);
		return $query->row();
	}

	public function lihat_id1($kode_komponen)
	{
		$query = $this->db->get_where($this->_table5, ['id_pinjam' => $kode_komponen]);
		return $query->row();
	}

	public function ubah($data, $kode_komponen)
	{
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_part' => $kode_komponen]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($kode_komponen)
	{
		return $this->db->delete($this->_table, ['kode_part' => $kode_komponen]);
	}
	
	public function jumlah()
	{
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_stok_komponen()
	{
		$query = $this->db->get_where($this->_table);
		return $query->result();
	}
	
	 

	public function lihat_id2($kode_transaksi)
	{
		$query = $this->db->get_where($this->_table3, ['kode_transaksi' => $kode_transaksi]);
		return $query->row();
	}

	public function lihat_nama_barang($kode_komponen)
	{
		$query = $this->db->select('*');
		$query = $this->db->where(['kode_komponen' => $kode_komponen]);
		$query = $this->db->get($this->_table);
		return $query->row();
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
	
	public function All()
	{ 
		$query = $this->db->get_where($this->_table, 'total_stok = 0');
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
		$query = $this->db->query("SELECT * FROM mekanik_karyawan");
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
		$query = $this->db->query("SELECT * FROM mekanik_komponen WHERE id_barangm = '2'");
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
