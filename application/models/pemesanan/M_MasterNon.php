<?php

class M_MasterNon extends CI_Model{ 
	protected $_table1 = 'pemesanan_non_ekatalog';  
	public $kode_komponen; 

	public function lihat(){
		$query = $this->db->get($this->_table1); 
		return $query->result();  
	}  

	public function cekkodebarang()
    {
        $query = $this->db->query("SELECT MAX(kode_pemesanan) as kodebarang from pemesanan_non_ekatalog");
        $hasil = $query->row();
        return $hasil->kodebarang;
	} 

	public function tambahAlat($data){
		return $this->db->insert($this->_table1, $data);
    }

	public function lihat_idAlat($kode_komponen){
		$query = $this->db->get_where($this->_table1, ['kode_pemesanan' => $kode_komponen]);
		return $query->row();
	}

	public function ubahAlat($data, $kode_komponen){
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_pemesanan' => $kode_komponen]);
		$query = $this->db->update($this->_table1);
		return $query;
	}

	public function hapusAlat($kode_komponen){
		return $this->db->delete($this->_table1, ['kode_pemesanan' => $kode_komponen]);
    }

	public function jumlahNone(){
		$query = $this->db->get($this->_table1);
		return $query->num_rows();
	} 
}