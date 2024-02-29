<?php

class M_DetailKeluar_mekanik extends CI_Model {
	protected $_table = 'mekanik_detail_keluar';

	public function tambah($data){
		return $this->db->insert_batch($this->_table, $data);
	}

	public function lihat_no_keluar($kode_transaksi) {
    $this->db->select('nama_komponen, SUM(jumlah) as jumlah, peruntukan, pengambil, tanggal, id_detail, satuan, jam, shift');
    $this->db->from('mekanik_detail_keluar');
    $this->db->where('kode_transaksi', $kode_transaksi); // Add this line to filter by kode_transaksi
    $this->db->group_by('nama_komponen, peruntukan, pengambil, tanggal, shift');
    return $this->db->get()->result();
	}



	public function hapus($kode_transaksi){
		return $this->db->delete($this->_table, ['kode_transaksi' => $kode_transaksi]);
	}

	public function lihat_id($kode_komponen)
	{
		$query = $this->db->get_where($this->_table, ['id_detail' => $kode_komponen]);
		return $query->row();
	}

	public function hapusDetail($kode_transaksi)
	{
		return $this->db->delete($this->_table, ['id_detail' => $kode_transaksi]);
	}

}