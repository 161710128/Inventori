<?php

class M_pengguna extends CI_Model{
	protected $_table = 'tbl_pengguna';
	protected $_table1 = 'tbl_produksi';
	protected $_table2 = 'packing_pengguna';
	protected $_table3 = 'pemesanan_pengguna';
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
        $query = $this->db->query("SELECT MAX(kode) as kode from tbl_pengguna");
        $hasil = $query->row();
        return $hasil->kode;
	}
	public function LevelAdmin()
    {
        $query = $this->db->query("SELECT level FROM tbl_pengguna WHERE username='admin'");
        $hasil = $query->row();
        return $hasil->kode;
	}
	
	public function admin() 
    {
        $query = $this->db->query("SELECT username FROM tbl_pengguna WHERE level='admin'");
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
        $query = $this->db->query("SELECT username FROM tbl_pengguna WHERE level='admin'");
        $hasil = $query->row();
        return $hasil->kode;
	}

	public function lihat_usernameProduksi($username)
    {
        $query = $this->db->get_where($this->_table1, ['username' => $username]);
        return $query->row();
    }

	public function lihat_usernamePacking($username)
    {
        $query = $this->db->get_where($this->_table2, ['username' => $username]);
        return $query->row();
    }

	public function lihat_username_pemesanan($username)
    {
        $query = $this->db->get_where($this->_table3, ['username' => $username]);
        return $query->row();
    }


}