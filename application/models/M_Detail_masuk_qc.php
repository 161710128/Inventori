<?php
class M_Detail_masuk_qc extends CI_Model
{
    protected $_table = 'tb_detail_masuk_qc';

    public function tambah($data)
    {
        return $this->db->insert_batch($this->_table, $data);
    }

    // belum edit
    public function lihat_no_terima($kode_transaksi)
    {
        return $this->db->get_where($this->_table, ['kode_transaksi' => $kode_transaksi])->result();
        // $this->db->select('*');
        // $this->db->from('tb_detail_masuk');
        // $this->db->join('tb_barang', 'tb_detail_masuk.id_barang = tb_barang.id_barangm');
        // $this->db->where('kode_transaksi', $kode_transaksi);
        // $query = $this->db->get();
        // return $query->result();
    }
    //belum edit
    public function hapus($kode_transaksi)
    {
        return $this->db->delete($this->_table, ['kode_transaksi' => $kode_transaksi]);
    }
}
