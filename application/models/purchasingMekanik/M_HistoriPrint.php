<?php

class M_HistoriPrint extends CI_Model {
	protected $_table = 'mekanik_barang_pinjam';
	protected $_table1 = 'mekanik_detail_masuk_inventaris';
	protected $_table2 = 'mekanik_detail_pinjam';
	public $kode_transaksi;

	public function lihat(){
		// return $this->db->get($this->_table)->result();
		$query = $this->db->query("SELECT * from mekanik_detail_pinjam ORDER BY id_pinjam DESC");
        $hasil = $query->result();
        return $hasil;
	}  
	
	public function filterByDate($tanggalMulai, $tanggalSelesai) {
		$this->db->where('tanggal_pinjam >=', $tanggalMulai);
		$this->db->where('tanggal_pinjam <=', $tanggalSelesai);
		return $this->db->get('mekanik_detail_pinjam')->result();
	}
}