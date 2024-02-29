<?php

class M_supervisor extends CI_Model{
	protected $_table = 'tbl_supervisor';
	public $code;

	public function lihat(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_id($id){
		$query = $this->db->get_where($this->_table, ['id' => $id]);
		return $query->row();
	}

	public function lihat_username($username){
		$query = $this->db->get_where($this->_table, ['username' => $username]);
		return $query->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function ubah($data, $id){
		$query = $this->db->set($data);
		$query = $this->db->where(['id' => $id]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($id){
		return $this->db->delete($this->_table, ['id' => $id]);
	}

	public function cekkodepengguna()
    {
        $query = $this->db->query("SELECT MAX(kode) as kode from tbl_supervisor");
        $hasil = $query->row();
        return $hasil->kode;
	}
	public function LevelSupervisor()
    {
        $query = $this->db->query("SELECT level FROM tbl_pengguna WHERE username='supervisor'");
        $hasil = $query->row();
        return $hasil->kode;
	}
	
	public function supervisor()
    {
        $query = $this->db->query("SELECT username FROM tbl_pengguna WHERE level='supervisor'");
        $hasil = $query->row();
        return $hasil->kode;
	}
	public function LevelElektro()
    {
        $query = $this->db->query("SELECT level FROM tbl_pengguna WHERE username='elektro'");
        $hasil = $query->row();
        return $hasil->kode;
	}
	
	public function elektro()
    {
        $query = $this->db->query("SELECT username FROM tbl_pengguna WHERE level='supervisor'");
        $hasil = $query->row();
        return $hasil->kode;
	}
}