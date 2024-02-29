<?php
class M_pengeluaran_qc extends CI_Model
{
    protected $_table = 'tb_barang';
    protected $_table1 = 'tb_keluar_qc';

    public function lihat()
    {
        $query = $this->db->get($this->_table1);
        return $query->result();
    }

    public function cekkodetransaksi()
    {
        $query = $this->db->query("SELECT MAX(kode_transaksi) as kodetransaksi from tb_keluar_qc");
        $hasil = $query->row();
        return $hasil->kodetransaksi;
    }

    public function tambah($data)
    {
        return $this->db->insert($this->_table1, $data);
    }

    public function hapus($kode_transaksi)
    {
        return $this->db->delete($this->_table1, ['kode_transaksi' => $kode_transaksi]);
    }

    public function lihat_no_terima($kode_transaksi)
    {
        return $this->db->get_where($this->_table1, ['kode_transaksi' => $kode_transaksi])->row();
    }
}
