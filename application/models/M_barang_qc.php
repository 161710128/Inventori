<?php

class M_barang_qc extends CI_Model
{
    protected $_table = 'tb_barang';

    public function lihat()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function tambah($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function cekkodebarang()
    {
        $query = $this->db->query("SELECT MAX(kode_barang) as kodebarang from tb_barang");
        $hasil = $query->row();
        return $hasil->kodebarang;
    }

    public function cekid()
    {
        $query = $this->db->query("SELECT MAX(id_barangm) as id from tb_barang");
        $hasil = $query->row();
        return $hasil->id;
    }

    public function lihat_stok_komponen()
    {
        $query = $this->db->get_where($this->_table);
        return $query->result();
    }

    public function ubah($data, $kode_barang)
    {
        $query = $this->db->set($data);
        $query = $this->db->where(['kode_barang' => $kode_barang]);
        $query = $this->db->update($this->_table);
        return $query;
    }

    public function hapus($kode_barang)
    {
        return $this->db->delete($this->_table, ['kode_barang' => $kode_barang]);
    }

    public function lihat_id($kode_barang)
    {
        return $this->db->get_where($this->_table, ['kode_barang' => $kode_barang])->row();
    }

    public function lihat_nama_barang($kode_barang)
    {
        $query = $this->db->select('*');
        $query = $this->db->where(['kode_barang' => $kode_barang]);
        $query = $this->db->get($this->_table);
        return $query->row();
    }

    public function plus_stok($stok_barang, $kode_barang, $id_barang)
    {
        $query = $this->db->set('stok_barang', 'stok_barang+' . $stok_barang, false);
        $query = $this->db->where('kode_barang', $kode_barang);
        // $query = $this->db->where('id_barang', $id_barang);
        $query = $this->db->update($this->_table);
        return $query;
    }

    public function min_stok($stok_barang, $kode_barang, $id_barang)
    {
        $query = $this->db->set('stok_barang', 'stok_barang-' . $stok_barang, false);
        $query = $this->db->where('kode_barang', $kode_barang);
        // $query = $this->db->where('id_barang', $id_barang);
        $query = $this->db->update($this->_table);
        return $query;
    }
}
