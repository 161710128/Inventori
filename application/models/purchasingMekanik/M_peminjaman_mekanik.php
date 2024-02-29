<?php
class M_peminjaman_mekanik extends CI_Model {
	protected $_table = 'mekanik_inventaris_pinjam';  
	protected $_table1 = 'mekanik_inventaris'; 
	public $kode_transaksi;

	public function lihat(){
		return $this->db->get($this->_table)->result();
	} 
	public function lihat1(){
		return $this->db->get($this->_table1)->result();
	} 
	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_no_terima($kode_transaksi){
		return $this->db->get_where($this->_table, ['id_pinjam' => $kode_transaksi])->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}
	
	public function lihat_id($kode_transaksi){
		$query = $this->db->get_where($this->_table, ['kode_transaksi' => $kode_transaksi]);
		return $query->row();
	}

	public function ubah($data, $kode_transaksi){
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_transaksi' => $kode_transaksi]);
		$query = $this->db->update($this->_table);
		return $query;
	}
	public function hapus($kode_transaksi){
		return $this->db->delete($this->_table, ['id_pinjam' => $kode_transaksi]);
	}

	public function cekkodetransaksi()
    {
        $query = $this->db->query("SELECT MAX(kode_transaksi) as kode_transaksi from mekanik_inventaris_pinjam");
        $hasil = $query->row();
        return $hasil->kode_transaksi; 
	}
	public function status(){
		// $query = $this->db->query("SELECT mekanik_inventaris.id_inventaris , mekanik_inventaris.kode_part , mekanik_inventaris.nama_barang, 
		// mekanik_inventaris.spesifikasi, mekanik_inventaris.total_stok, mekanik_inventaris.satuan, mekanik_inventaris.keterangan, mekanik_inventaris_pinjam.status, 
		// mekanik_inventaris.inventaris 
		// FROM mekanik_inventaris_pinjam 
		// INNER JOIN mekanik_inventaris 
		// ON mekanik_inventaris_pinjam.id_inventaris = mekanik_inventaris_pinjam.id_inventaris");
		$query = $this->db->query("SELECT * FROM mekanik_inventaris_pinjam WHERE status = 'pinjam'");
        $hasil = $query->result();
        return $hasil;

		// "SELECT *
		// FROM mekanik_inventaris
		// WHERE id_inventaris IN (
		// SELECT id_inventaris
		// FROM id_inventaris_pinjam
		// GROUP BY id_inventaris


		// SELECT mekanik_inventaris.id_inventaris , mekanik_inventaris.kode_part , mekanik_inventaris.nama_barang, mekanik_inventaris.spesifikasi, mekanik_inventaris.total_stok, mekanik_inventaris.satuan, 
		// mekanik_inventaris_pinjam.status, mekanik_inventaris.inventaris
		// FROM mekanik_inventaris_pinjam
		// INNER JOIN mekanik_inventaris ON mekanik_inventaris_pinjam.id_inventaris = mekanik_inventaris_pinjam.id_inventaris where mekanik_inventaris_pinjam.status = "pinjam";

	} 
}