<?php
class M_DetailKeluar_elektro extends CI_Model {
	protected $_table = 'elektro_detail_keluar';

	public function tambah($data){
		return $this->db->insert_batch($this->_table, $data);
	}

	// public function lihat_no_keluar($kode_transaksi){
	// 	return $this->db->get_where($this->_table, ['kode_transaksi' => $kode_transaksi])->result();
	// }

	public function lihat_no_keluar($kode_transaksi){
		$this->db->select('nama_komponen, SUM(jumlah) as jumlah, peruntukan, pengambil, stok_alat, id_barang, satuan, shift, keterangan, tanggal_keluar, jam_keluar');
		$this->db->from('elektro_detail_keluar');
		$this->db->group_by('nama_komponen, peruntukan, pengambil, tanggal_keluar, shift');
		return $this->db->get()->result();
		}

	public function hapus($kode_transaksi){
		return $this->db->delete($this->_table, ['kode_transaksi' => $kode_transaksi]);
	}
}