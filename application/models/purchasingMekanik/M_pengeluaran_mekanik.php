<?php

class M_pengeluaran_mekanik extends CI_Model {
	protected $_table = 'mekanik_keluar'; 
	public $kode_transaksi;
	
	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}
	
	public function lihat(){
		// return $this->db->get($this->_table)->result();
		$query = $this->db->query("SELECT * from mekanik_keluar ORDER BY kode_transaksi DESC");
        $hasil = $query->result();
        return $hasil;
	} 
	public function lihatMesinLaser(){
		// return $this->db->get($this->_table)->result();
		$query = $this->db->query("SELECT * from mekanik_mesin_laser");
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
        $query = $this->db->query("SELECT MAX(kode_transaksi) as kodetransaksi from mekanik_keluar");
        $hasil = $query->row();
        return $hasil->kodetransaksi;
    }
    
    public function countDuplicate1($querry = null)
	{
		$query = $this->db->get_where($this->_table, ['tanggal_keluar' => $querry]);
		return $query->row();  

	} 
}