<?php

class M_DK_Inventaris_Mekanik extends CI_Model {
	protected $_table = 'mekanik_dk_mekanik_inventaris';

	public function tambah($data){
		return $this->db->insert_batch($this->_table, $data);
	}

	public function lihat_no_keluar($kode_transaksi){
		return $this->db->get_where($this->_table, ['kode_transaksi' => $kode_transaksi])->result();
	}

	public function hapus($kode_transaksi){
		return $this->db->delete($this->_table, ['kode_transaksi' => $kode_transaksi]);
	}

	public function hapusDetail($kode_transaksi)
	{
		return $this->db->delete($this->_table, ['id_detail' => $kode_transaksi]);
	}

	public function lihat_id($kode_komponen)
	{
		$query = $this->db->get_where($this->_table, ['id_detail' => $kode_komponen]);
		return $query->row();
	}
}