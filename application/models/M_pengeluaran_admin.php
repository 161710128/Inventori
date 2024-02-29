<?php

class M_pengeluaran_admin extends CI_Model {
	protected $_table = 'tabl_keluar';
	public $kode_transaksi;


	public function lihat(){
		return $this->db->get($this->_table)->result();
	} 

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
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
        $query = $this->db->query("SELECT MAX(kode_transaksi) as kodetransaksi from tabl_keluar");
        $hasil = $query->row();
        return $hasil->kodetransaksi;
    }
}