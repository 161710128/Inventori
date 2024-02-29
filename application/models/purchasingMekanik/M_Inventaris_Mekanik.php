<?php

class M_Inventaris_Mekanik extends CI_Model {
	protected $_table = 'mekanik_keluar_inventaris';
	protected $_table1 = 'mekanik_inventaris';
	public $kode_transaksi;
 

	public function jumlahInventarisMasuk(){
		$query = $this->db->get($this->_table1);
		return $query->num_rows();
	}

	public function jumlahInventarisKeluar(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	} 

	

	public function lihat(){
		// return $this->db->get($this->_table)->result();
		$query = $this->db->query("SELECT * from mekanik_keluar_inventaris ORDER BY kode_transaksi DESC");
        $hasil = $query->result();
        return $hasil;
	} 
	
	public function lihat_no_keluar($kode_transaksi){
		return $this->db->get_where($this->_table, ['kode_transaksi' => $kode_transaksi])->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function hapus($kode_transaksi){
		return $this->db->delete($this->_table, ['kode_transaksi' => $kode_transaksi]);
	}

	public function cekkodetransaksi1()
    {
        $query = $this->db->query("SELECT MAX(kode_transaksi) as kodetransaksi from mekanik_keluar_inventaris");
        $hasil = $query->row();
        return $hasil->kodetransaksi;
    }

	public function status(){
		$query = $this->db->query("SELECT * FROM mekanik_inventaris_pinjam WHERE status = 'dipinjam' ");
        $hasil = $query->result();
        return $hasil;
	} 
	
	public function countDuplicate1($querry = null)
	{
		$query = $this->db->get_where($this->_table, ['tanggal_keluar' => $querry]);
		return $query->row();  

	} 
}