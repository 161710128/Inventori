<?php
class M_DetailKeluar_elektro extends CI_Model {
	protected $_table = 'elektro_detail_keluar';

	public function tambah($data){
		return $this->db->insert_batch($this->_table, $data);
	}

	public function lihat_no_keluar($kode_transaksi){
		return $this->db->get_where($this->_table, ['kode_transaksi' => $kode_transaksi])->result();
	}

	public function hapus($kode_transaksi){
		return $this->db->delete($this->_table, ['kode_transaksi' => $kode_transaksi]);
	}
}