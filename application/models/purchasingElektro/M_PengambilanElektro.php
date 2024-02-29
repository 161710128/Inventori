<?php
class M_PengambilanElektro extends CI_Model {
	protected $_table = 'elektro_pengambilan';  
	public $kode_transaksi;

	public function lihat(){
		return $this->db->get($this->_table)->result();
	} 

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function cekkodetransaksi()
    {
        $query = $this->db->query("SELECT MAX(kode_transaksi) as kodetransaksi from elektro_pengambilan");
        $hasil = $query->row();
        return $hasil->kodetransaksi; 
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function lihat_id($kode_transaksi){
		$query = $this->db->get_where($this->_table, ['kode_transaksi' => $kode_transaksi]);
		return $query->row();
	}

	public function ubah($data, $id_pengambilan){
		$query = $this->db->set($data);
		$query = $this->db->where(['id_pengambilan' => $id_pengambilan]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function lihat_no_terima($kode_transaksi){
		return $this->db->get_where($this->_table, ['kode_transaksi' => $kode_transaksi])->row();
	}
	
	public function hapus($kode_transaksi){
		return $this->db->delete($this->_table, ['kode_transaksi' => $kode_transaksi]);
	} 

	public function countDuplicate1($querry = null)
	{
		$query = $this->db->get_where($this->_table, ['tanggal_keluar' => $querry]);
		return $query->row();  

	}
}