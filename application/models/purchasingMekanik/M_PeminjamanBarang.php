<?php

class M_PeminjamanBarang extends CI_Model {
	protected $_table = 'mekanik_barang_pinjam';
	protected $_table1 = 'mekanik_detail_masuk_inventaris';
	protected $_table2 = 'mekanik_detail_pinjam';
	public $kode_transaksi;

	public function lihat(){
		// return $this->db->get($this->_table)->result();
		$query = $this->db->query("SELECT * from mekanik_detail_pinjam WHERE status = 'pinjam'");
        $hasil = $query->result();
        return $hasil;
	} 
	
	public function lihatPeminjaman(){
		// return $this->db->get($this->_table)->result();
		$query = $this->db->query("SELECT * from mekanik_detail_pinjam WHERE status='pinjam'");
        $hasil = $query->result();
        return $hasil;
	} 

	public function cekkodetransaksi()
    {
        $query = $this->db->query("SELECT MAX(kode_transaksi) as kodetransaksi from mekanik_detail_pinjam");
        $hasil = $query->row();
        return $hasil->kodetransaksi;
    }
	

	public function lihat_nama_barang($kode_komponen)
	{
		$query = $this->db->select('*');
		$query = $this->db->where(['kode_part' => $kode_komponen]);
		$query = $this->db->get($this->_table);
		return $query->row();
	}

	public function AllPengambil()
	{
		$query = $this->db->query("SELECT * FROM tb_karyawan");
		$hasil = $query->result();
		return $hasil;
	}

	public function min_stok($total_stok, $kode_komponen)
	{
		$query = $this->db->set('total_stok', 'total_stok-' . $total_stok, false);
		$query = $this->db->where('kode_part', $kode_komponen);
		// $query = $this->db->where('id_barangm', $id_barang);
		$query = $this->db->update($this->_table);
		return $query;
	} 

	// public function plus_stok($total_stok, $kode_part)
	// {
	// 	$query = $this->db->set('total_stok', 'total_stok+' . $total_stok, false);
	// 	$query = $this->db->where('kode_part', $kode_part);
	// 	// $query = $this->db->where('id_barangm', $id_barang);
	// 	$query = $this->db->update($this->_table);
	// 	return $query;
	// } 

	public function plus_stok($jumlah, $kode_part)
	{
		$query = $this->db->set('total_stok', 'total_stok+' . $jumlah, false);
		$query = $this->db->where('kode_part', $kode_part);
		// $query = $this->db->where('id_barangm', $id_barang);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function ubah($data, $komponen)
	{
		$query = $this->db->set($data);
		$query = $this->db->where(['id_pinjam' => $komponen]);
		$query = $this->db->update($this->_table2);
		return $query;
	}

	public function tambah($data){
		return $this->db->insert_batch($this->_table2, $data); 
	}



	// public function tambah($data){
	// 	return $this->db->insert($this->_table2, $data);
	// }



	
	
	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	} 

	
	public function lihat_no_terima($kode_transaksi){
		return $this->db->get_where($this->_table, ['kode_transaksi' => $kode_transaksi])->row();
	}

	// public function tambah($data){
	// 	return $this->db->insert($this->_table, $data);
	// }

	public function hapus($kode_transaksi){
		return $this->db->delete($this->_table, ['kode_transaksi' => $kode_transaksi]);
	}

	

}