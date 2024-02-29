<?php

class M_StokAlat extends CI_Model{
	protected $_table = 'packing_masuk'; 
	protected $_table1 = 'packing_masteralat';
	protected $_table2 = 'packing_detail_masuk';
	
	protected $_table3 = 'packing_keluar'; 
	protected $_table4 = 'packing_detail_keluar';
	
	// protected $_table1 = 'elektro_barang';
	// protected $_table2 = 'elektro_pengambilan';
	// protected $_table3 = 'elektro_masuk';
	// protected $_table4 = 'elektro_keluar';
	// protected $_table5 = 'elektro_inventaris'; 
	public $kode_komponen;

	public function lihat(){
		$query = $this->db->get($this->_table); 
		return $query->result();
	}

	public function lihatPengiriman(){
		$query = $this->db->get($this->_table3); 
		return $query->result();
	}

	public function cekkodetransaksi()
    {
        $query = $this->db->query("SELECT MAX(kode_transaksi) as kodetransaksi from packing_masuk");
        $hasil = $query->row();
        return $hasil->kodetransaksi;
    }

	public function cekkodetransaksiPengiriman()
    {
        $query = $this->db->query("SELECT MAX(kode_transaksi) as kodetransaksi from packing_keluar");
        $hasil = $query->row();
        return $hasil->kodetransaksi;
    }

	public function countDuplicate1($querry = null)
	{
		$query = $this->db->get_where($this->_table, ['tanggal' => $querry]);
		return $query->row();  

	} 

	public function countDuplicate2($querry = null)
	{
		$query = $this->db->get_where($this->_table3, ['tanggal' => $querry]);
		return $query->row();  

	} 

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
    }

	public function tambahPengiriman($data){
		return $this->db->insert($this->_table3, $data);
    }

	public function lihat_nama_barang($kode_komponen){
		$query = $this->db->select('*');
		$query = $this->db->where(['kode_alat' => $kode_komponen]);
		$query = $this->db->get($this->_table1);
		return $query->row();
	}

	public function tambahDetail($data){
		return $this->db->insert_batch($this->_table2, $data);
	}

	public function tambahDetailPengiriman($data){
		return $this->db->insert_batch($this->_table4, $data);
	}

	public function plus_stok($total_stok, $kode_komponen){ 
		$query = $this->db->set('total_stok', 'total_stok+' . $total_stok, false);
		$query = $this->db->where('kode_alat', $kode_komponen); 
		$query = $this->db->update($this->_table1);
		return $query;
	} 

	public function min_stok($total_stok, $kode_komponen)
	{
		$query = $this->db->set('total_stok', 'total_stok-' . $total_stok, false);
		$query = $this->db->where('kode_alat', $kode_komponen);
		// $query = $this->db->where('id_barangm', $id_barang);
		$query = $this->db->update($this->_table1);
		return $query;
	}

	public function lihat_no_terima($kode_transaksi){
		return $this->db->get_where($this->_table, ['kode_transaksi' => $kode_transaksi])->row();
	}

	public function lihat_no_terimaPengiriman($kode_transaksi){
		return $this->db->get_where($this->_table3, ['kode_transaksi' => $kode_transaksi])->row();
	}

	public function lihat_no_terima_detail($kode_transaksi){ 
		return $this->db->query("SELECT * from packing_detail_masuk WHERE kode_transaksi='$kode_transaksi' ORDER BY nama_shift")->result(); 
	}

	public function lihat_no_terima_detailPengiriman($kode_transaksi){ 
		return $this->db->query("SELECT * from packing_detail_keluar WHERE kode_transaksi='$kode_transaksi' ORDER BY nama_shift")->result(); 
	}

	public function lihat_id($kode_komponen)
	{
		$query = $this->db->get_where($this->_table2, ['id_detail' => $kode_komponen]);
		return $query->row(); 
	}

	public function lihat_idPengiriman($kode_komponen)
	{
		$query = $this->db->get_where($this->_table4, ['id_detail' => $kode_komponen]);
		return $query->row(); 
	}
	
	public function count_sn($kode_transaksi)
	{
		$query = $this->db->get_where($this->_table2, ['kode_transaksi' => $kode_transaksi]);
		return $query->num_rows(); 
	}
	
	public function hapusDetail($kode_transaksi)
	{
		return $this->db->delete($this->_table2, ['id_detail' => $kode_transaksi]);
	}

	public function hapusDetailPengiriman($kode_transaksi)
	{
		return $this->db->delete($this->_table4, ['id_detail' => $kode_transaksi]);
	}

	public function jumlahMasuk(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}
	
	public function jumlahDetailMasuk(){
		$query = $this->db->get($this->_table2);
		return $query->num_rows();
	}
	
	public function stok_alat(){
		$query = $this->db->query("SELECT * FROM packing_masteralat");
        $hasil = $query->result();
        return $hasil;
	}

	public function jumlahAlatt(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}
	
	public function lihat_id1($kode_transaksi)
	{
		$query = $this->db->get_where($this->_table, ['kode_transaksi' => $kode_transaksi]);
		return $query->row();
	}
	
	public function lihat_id2($kode_transaksi)
	{
		$query = $this->db->get_where($this->_table3, ['kode_transaksi' => $kode_transaksi]);
		return $query->row();
	}
	
	public function countDuplicate(){ 
		return $this->db->query("SELECT COUNT(*) field FROM produksi_masukalat GROUP BY tanggal HAVING COUNT(tanggal) > 1")->result(); 
	} 
}