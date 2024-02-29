<?php

class M_SisaBahan extends CI_Model {
	protected $_table = 'mekanik_sisa_bahan'; 
	public $kode_transaksi;

	public function lihat(){
		// return $this->db->get($this->_table)->result();
		$query = $this->db->query("SELECT * from mekanik_sisa_bahan WHERE status = 'free' ORDER BY id_komponen DESC");
        $hasil = $query->result();
        return $hasil;
	}
	
	public function lihatAll(){
		// return $this->db->get($this->_table)->result();
		$query = $this->db->query("SELECT * from mekanik_sisa_bahan ORDER BY id_komponen DESC");
        $hasil = $query->result();
        return $hasil;
	}

	public function cekkodetransaksi1()
    {
        $query = $this->db->query("SELECT MAX(kode_transaksi) as kodetransaksi from mekanik_sisa_bahan");
        $hasil = $query->row();
        return $hasil->kodetransaksi;
    }

	public function tambah($data){
		return $this->db->insert_batch($this->_table, $data);
	}

	public function ubah($data, $kode_komponen)
	{
		$query = $this->db->set($data);
		$query = $this->db->where(['id_komponen' => $kode_komponen]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function lihat_id($kode_komponen)
	{
		$query = $this->db->get_where($this->_table, ['id_komponen' => $kode_komponen]);
		return $query->row();
	}
}