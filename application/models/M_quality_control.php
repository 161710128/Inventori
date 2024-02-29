<?php
class M_quality_control extends CI_Model
{
    protected $_table = 'tbl_quality_control';
 
    public function lihat_username($username)
    {
        $query = $this->db->get_where($this->_table, ['username' => $username]);
        return $query->row();
    }

    public function lihat_kode($kode)
    {
        $query = $this->db->get_where($this->_table, ['kode' => $kode]);
        return $query->row();
    }

    public function lihat()
    {
        return $this->db->get($this->_table)->result();
    }

    public function cekkodepenggguna()
    {
        $query = $this->db->query("SELECT MAX(kode) as kodepengguna from tbl_quality_control");
        $hasil = $query->row();
        return $hasil->kodepengguna;
    }

    public function tambah($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function ubah($data, $kode)
    {
        $query = $this->db->set($data);
        $query = $this->db->where(['kode' => $kode]);
        $query = $this->db->update($this->_table);
        return $query;
    }
}
