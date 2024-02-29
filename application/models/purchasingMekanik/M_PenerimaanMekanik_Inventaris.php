<?php

class M_PenerimaanMekanik_Inventaris extends CI_Model {
	protected $_table = 'mekanik_masuk_inventaris';
	protected $_table1 = 'mekanik_detail_masuk_inventaris';
	public $kode_transaksi;

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	// ><><><><<><><><><><><><><><><><><

	public function lihat(){
		// return $this->db->get($this->_table)->result();
		$query = $this->db->query("SELECT * from mekanik_masuk_inventaris ORDER BY kode_transaksi DESC");
        $hasil = $query->result();
        return $hasil;
	}  
	
	public function lihat_no_terima($kode_transaksi){
		return $this->db->get_where($this->_table, ['kode_transaksi' => $kode_transaksi])->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function hapus($kode_transaksi){
		return $this->db->delete($this->_table, ['kode_transaksi' => $kode_transaksi]);
	}

	public function cekkodetransaksi()
    {
        $query = $this->db->query("SELECT MAX(kode_transaksi) as kodetransaksi from mekanik_masuk_inventaris");
        $hasil = $query->row();
        return $hasil->kodetransaksi;
    }
    
    public function countDuplicate1($querry = null)
	{
		$query = $this->db->get_where($this->_table, ['tanggal_masuk' => $querry]);
		return $query->row();  

	} 

}