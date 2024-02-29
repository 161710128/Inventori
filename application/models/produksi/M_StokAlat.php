<?php

class M_StokAlat extends CI_Model{
	protected $_table = 'produksi_masukalat';
	protected $_table1 = 'produksi_masteralat';
	protected $_table2 = 'produksi_detailmasuk_alat';
	protected $_table3 = 'produksi_catatan';
	
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

	public function jumlahAlatt(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}
	
	public function stok_alat(){
		$query = $this->db->query("SELECT * FROM produksi_masteralat ORDER BY status_alat");
        $hasil = $query->result();
        return $hasil;
	}

	public function cekkodetransaksi()
    {
        $query = $this->db->query("SELECT MAX(kode_transaksi) as kodetransaksi from produksi_masukalat");
        $hasil = $query->row();
        return $hasil->kodetransaksi;
    }

	public function lihat_nama_barang($kode_komponen){
		$query = $this->db->select('*');
		$query = $this->db->where(['kode_alat' => $kode_komponen]);
		$query = $this->db->get($this->_table1);
		return $query->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
    }
	// public function tambah_catatan($data){
	// 	return $this->db->insert($this->_table2, $data);
	// }
	public function tambah_catatan($data){
		// Add the kode_transaksi data into the data array
		return $this->db->insert($this->_table3, $data);
		// return $query;
	}

	public function lihat_catatan($kode_transaksi){ 
		return $this->db->query("SELECT * from produksi_catatan WHERE kode_transaksi='$kode_transaksi'")->row(); 
	}

	public function ubahCatatan($data, $kode_transaksi){
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_transaksi' => $kode_transaksi]);
		$query = $this->db->update($this->_table3);
		return $query;
	}

	public function tambahDetail($data){
		return $this->db->insert_batch($this->_table2, $data);
	}

	public function plus_stok($total_stok, $kode_komponen){ 
		$query = $this->db->set('jumlah_assy', 'jumlah_assy+' . $total_stok, false);
		$query = $this->db->where('kode_alat', $kode_komponen); 
		$query = $this->db->update($this->_table1);
		return $query;
	} 

	public function lihat_no_terima($kode_transaksi){
		return $this->db->get_where($this->_table, ['kode_transaksi' => $kode_transaksi])->row();
	}

	public function lihat_no_terima_detail($kode_transaksi){ 
		return $this->db->query("SELECT * from produksi_detailmasuk_alat WHERE kode_transaksi='$kode_transaksi' ORDER BY nama_shift")->result(); 
	}

	public function lihat_no_transaksi($kode_transaksi){ 
		return $this->db->query("SELECT * from produksi_detailmasuk_alat WHERE kode_transaksi='$kode_transaksi'")->result(); 
	}


	public function lihat_id1($kode_transaksi)
	{
		$query = $this->db->get_where($this->_table, ['kode_transaksi' => $kode_transaksi]);
		return $query->row();
	}
	
	public function lihat_id($kode_komponen)
	{
		$query = $this->db->get_where($this->_table2, ['id_detail_alat' => $kode_komponen]);
		return $query->row(); 
	}
	
	public function hapusDetail($kode_transaksi)
	{
		return $this->db->delete($this->_table2, ['id_detail_alat' => $kode_transaksi]);
	}

	public function min_stok($total_stok, $kode_komponen)
	{
		$query = $this->db->set('jumlah_assy', 'jumlah_assy-' . $total_stok, false);
		$query = $this->db->where('kode_alat', $kode_komponen);
		// $query = $this->db->where('id_barangm', $id_barang);
		$query = $this->db->update($this->_table1);
		return $query;
	}
 
	public function countDuplicate(){ 
		return $this->db->query("SELECT COUNT(*) field FROM produksi_masukalat GROUP BY tanggal HAVING COUNT(tanggal) > 1")->result(); 
	}

	public function countDuplicate1($querry = null)
	{
		$query = $this->db->get_where($this->_table, ['tanggal' => $querry]);
		return $query->row();  

	} 
	
	// public function countDuplicate1($kode_transaksi){
	// 	return $this->db->get_where($this->_table, ['tanggal' => $kode_transaksi])->result();
	// }

	













	 

























	// public function Stok_timbanganBayi(){
	// 	$query = $this->db->query("SELECT * FROM produksi_master_barang WHERE id_barang= 2");
    //     $hasil = $query->result();
    //     return $hasil;
	// }

	// public function Stok_stadioMeter(){
	// 	$query = $this->db->query("SELECT * FROM produksi_master_barang WHERE id_barang= 3");
    //     $hasil = $query->result();
    //     return $hasil;
	// }

	// public function Stok_infantoMeter(){
	// 	$query = $this->db->query("SELECT * FROM produksi_master_barang WHERE id_barang= 4");
    //     $hasil = $query->result();
    //     return $hasil;
	// }

	// public function Stok_lila(){
	// 	$query = $this->db->query("SELECT * FROM produksi_master_barang WHERE id_barang= 5");
    //     $hasil = $query->result();
    //     return $hasil;
	// }
	
	// public function standingWeight(){
	// 	$query = $this->db->query("SELECT * FROM produksi_master_barang WHERE id_barang = '1'");
    //     $hasil = $query->result();
    //     return $hasil;
	// }

	// public function cekkodebarang_standingWeight()
    // {
    //     $query = $this->db->query("SELECT MAX(kode_job) as kodebarang from produksi_master_barang where id_barang= 1");
    //     $hasil = $query->row();
    //     return $hasil->kodebarang;
	// }

	// public function AllBarang()
	// {
	// 	$query = $this->db->query("SELECT * FROM produksi_barang");
	// 	$hasil = $query->result();
	// 	return $hasil;
	// } 

	

	

	

	
	

	// public function detail_standingWeight($kode_transaksi){ 
	// 	// return $this->db->query("SELECT * from produksi_detail_masuk WHERE kode_transaksi='$kode_transaksi' AND id_barang = 1 ORDER BY nama_shift")->result();
	// 	return $this->db->query("SELECT produksi_detail_masuk.id_detailmasuk, produksi_detail_masuk.kode_transaksi, produksi_detail_masuk.kode_job, 
	// 							produksi_detail_masuk.job, produksi_detail_masuk.part_name, produksi_detail_masuk.jobdesc, produksi_detail_masuk.nama_mp, 
	// 							produksi_detail_masuk.bagus, produksi_detail_masuk.rijek, produksi_detail_masuk.catatan, produksi_detail_masuk.nama_shift, produksi_barang.nama_barang
	// 							FROM produksi_barang
	// 							INNER JOIN produksi_detail_masuk
	// 							ON produksi_barang.id_barang = produksi_detail_masuk.id_barang
	// 							WHERE produksi_detail_masuk.kode_transaksi='$kode_transaksi' AND produksi_barang.id_barang = 1 
	// 							ORDER BY nama_shift;")->result();
	// }

	// public function detail_babyScale($kode_transaksi){ 
	// 	// return $this->db->query("SELECT * from produksi_detail_masuk WHERE kode_transaksi='$kode_transaksi' AND id_barang = 2 ORDER BY nama_shift")->result();
	// 	return $this->db->query("SELECT produksi_detail_masuk.id_detailmasuk, produksi_detail_masuk.kode_transaksi, produksi_detail_masuk.kode_job, 
	// 							produksi_detail_masuk.job, produksi_detail_masuk.part_name, produksi_detail_masuk.jobdesc, produksi_detail_masuk.nama_mp, 
	// 							produksi_detail_masuk.bagus, produksi_detail_masuk.rijek, produksi_detail_masuk.catatan, produksi_detail_masuk.nama_shift, produksi_barang.nama_barang
	// 							FROM produksi_barang
	// 							INNER JOIN produksi_detail_masuk
	// 							ON produksi_barang.id_barang = produksi_detail_masuk.id_barang
	// 							WHERE produksi_detail_masuk.kode_transaksi='$kode_transaksi' AND produksi_barang.id_barang = 2 
	// 							ORDER BY nama_shift;")->result();
	// }

	// public function detail_stadioMeter($kode_transaksi){ 
	// 	// return $this->db->query("SELECT * from produksi_detail_masuk WHERE kode_transaksi='$kode_transaksi' AND id_barang = 3 ORDER BY nama_shift")->result();
	// 	return $this->db->query("SELECT produksi_detail_masuk.id_detailmasuk, produksi_detail_masuk.kode_transaksi, produksi_detail_masuk.kode_job, 
	// 							produksi_detail_masuk.job, produksi_detail_masuk.part_name, produksi_detail_masuk.jobdesc, produksi_detail_masuk.nama_mp, 
	// 							produksi_detail_masuk.bagus, produksi_detail_masuk.rijek, produksi_detail_masuk.catatan, produksi_detail_masuk.nama_shift, produksi_barang.nama_barang
	// 							FROM produksi_barang
	// 							INNER JOIN produksi_detail_masuk
	// 							ON produksi_barang.id_barang = produksi_detail_masuk.id_barang
	// 							WHERE produksi_detail_masuk.kode_transaksi='$kode_transaksi' AND produksi_barang.id_barang = 3 
	// 							ORDER BY nama_shift;")->result();
	// }

	// public function detail_infantoMeter($kode_transaksi){ 
	// 	// return $this->db->query("SELECT * from produksi_detail_masuk WHERE kode_transaksi='$kode_transaksi' AND id_barang = 4 ORDER BY nama_shift")->result();
	// 	return $this->db->query("SELECT produksi_detail_masuk.id_detailmasuk, produksi_detail_masuk.kode_transaksi, produksi_detail_masuk.kode_job, 
	// 							produksi_detail_masuk.job, produksi_detail_masuk.part_name, produksi_detail_masuk.jobdesc, produksi_detail_masuk.nama_mp, 
	// 							produksi_detail_masuk.bagus, produksi_detail_masuk.rijek, produksi_detail_masuk.catatan, produksi_detail_masuk.nama_shift, produksi_barang.nama_barang
	// 							FROM produksi_barang
	// 							INNER JOIN produksi_detail_masuk
	// 							ON produksi_barang.id_barang = produksi_detail_masuk.id_barang
	// 							WHERE produksi_detail_masuk.kode_transaksi='$kode_transaksi' AND produksi_barang.id_barang = 4 
	// 							ORDER BY nama_shift;")->result();
	// }

	// public function detail_lila($kode_transaksi){ 
	// 	// return $this->db->query("SELECT * from produksi_detail_masuk WHERE kode_transaksi='$kode_transaksi' AND id_barang = 5 ORDER BY nama_shift")->result();
	// 	return $this->db->query("SELECT produksi_detail_masuk.id_detailmasuk, produksi_detail_masuk.kode_transaksi, produksi_detail_masuk.kode_job, 
	// 							produksi_detail_masuk.job, produksi_detail_masuk.part_name, produksi_detail_masuk.jobdesc, produksi_detail_masuk.nama_mp, 
	// 							produksi_detail_masuk.bagus, produksi_detail_masuk.rijek, produksi_detail_masuk.catatan, produksi_detail_masuk.nama_shift, produksi_barang.nama_barang
	// 							FROM produksi_barang
	// 							INNER JOIN produksi_detail_masuk
	// 							ON produksi_barang.id_barang = produksi_detail_masuk.id_barang
	// 							WHERE produksi_detail_masuk.kode_transaksi='$kode_transaksi' AND produksi_barang.id_barang = 5 
	// 							ORDER BY nama_shift;")->result();
	// }

	// public function hapus($id_detailmasuk){
	// 	return $this->db->delete($this->_table2, ['id_detailmasuk' => $id_detailmasuk]);
    // }


	




































	




	// public function lihat_hfnc(){
	// 	$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = '1'");
    //     $hasil = $query->result();
    //     return $hasil;
	// }

	// public function lihat_antro(){
	// 	$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = '2'");
    //     $hasil = $query->result();
    //     return $hasil;
	// } 

	// public function lihat_suction(){
	// 	$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = '3'");
    //     $hasil = $query->result();
    //     return $hasil;
	// }

	// public function lihat_summit(){
	// 	$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = '4'");
    //     $hasil = $query->result();
    //     return $hasil;
	// }

	// public function lihat_endos(){
	// 	$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = '5'");
    //     $hasil = $query->result();
    //     return $hasil;
	// }

	// public function lihat_light(){
	// 	$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = '6'");
    //     $hasil = $query->result();
    //     return $hasil;
	// } 
	
	// public function lihat_barang(){	
	// 	$this->db->order_by("nama_barang","desc"); 
    //     return $this->db->get('elektro_barang')->row();
	// }

	// public function jumlah(){
	// 	$query = $this->db->get($this->_table);
	// 	return $query->num_rows();
	// }

	// public function lihat_stok_komponen(){
	// 	$query = $this->db->get_where($this->_table);
	// 	return $query->result();
	// } 

	// public function lihat_stok_komponen_Hfnc(){
	// 	$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = '1'");
    //     $hasil = $query->result();
    //     return $hasil;
	// }

	// public function lihat_stok_komponen_Antropometri(){
	// 	$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = '2'");
    //     $hasil = $query->result();
    //     return $hasil;
	// }

	// public function lihatStokKomponen_timbanganDewasa(){
	// 	$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = '7'");
    //     $hasil = $query->result();
    //     return $hasil;
	// }

	// public function lihatStokKomponen_timbanganBayi(){
	// 	$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = '8'");
    //     $hasil = $query->result();
    //     return $hasil;
	// }

	// // public function lihat_id($kode_komponen){
	// // 	$query = $this->db->get_where($this->_table, ['kode_komponen' => $kode_komponen]);
	// // 	return $query->row();
	// // }

	// // public function lihat_nama_barang($kode_komponen){
	// // 	$query = $this->db->select('*');
	// // 	$query = $this->db->where(['kode_komponen' => $kode_komponen]);
	// // 	$query = $this->db->get($this->_table);
	// // 	return $query->row();
	// // }

	
	// // public function tambah($data){
	// // 	return $this->db->insert($this->_table, $data);
    // // }
    
    // public function tambah_pengambilan($data){
	// 	return $this->db->insert_batch($this->_table2, $data);
    // }
    
	// // public function plus_stok($total_stok, $kode_komponen, $id_barang){
	// // 	$query = $this->db->set('total_stok', 'total_stok+' . $total_stok, false);
	// // 	$query = $this->db->where('kode_komponen', $kode_komponen);
	// // 	$query = $this->db->where('id_barang', $id_barang);
	// // 	$query = $this->db->update($this->_table);
	// // 	return $query;
	// // } 

	// public function plus_stokTimbanganDewasa($total_stok, $nama_komponen, $id_barang){
	// 	$query = $this->db->set('total_stok', 'total_stok+' . $total_stok, false);
	// 	$query = $this->db->where('nama_komponen', $nama_komponen);
	// 	$query = $this->db->where('id_barang', $id_barang);
	// 	$query = $this->db->update($this->_table);
	// 	return $query;
	// }

	// public function plus_stokTimbanganBayi($total_stok, $nama_komponen, $id_barang){
	// 	$query = $this->db->set('total_stok', 'total_stok+' . $total_stok, false);
	// 	$query = $this->db->where('nama_komponen', $nama_komponen);
	// 	$query = $this->db->where('id_barang', $id_barang);
	// 	$query = $this->db->update($this->_table);
	// 	return $query;
	// }

	// // public function min_stok($total_stok, $kode_komponen, $id_barang){
	// // 	$query = $this->db->set('total_stok', 'total_stok-' . $total_stok, false);
	// // 	$query = $this->db->where('kode_komponen', $kode_komponen);
	// // 	$query = $this->db->where('id_barang', $id_barang);
	// // 	$query = $this->db->update($this->_table);
	// // 	return $query;
	// // }
	
	// public function minStok_timbangan($total_stok, $nama_komponen, $id_barang){
	// 	$query = $this->db->set('total_stok', 'total_stok-' . $total_stok, false);
	// 	$query = $this->db->where('nama_komponen', $nama_komponen);
	// 	$query = $this->db->where('id_barang', $id_barang);
	// 	$query = $this->db->update($this->_table);
	// 	return $query;
	// }

	// public function ubah($data, $kode_komponen){
	// 	$query = $this->db->set($data);
	// 	$query = $this->db->where(['kode_komponen' => $kode_komponen]);
	// 	$query = $this->db->update($this->_table);
	// 	return $query;
	// }

	
    
    // public function hapus_pengambilan($kode_transaksi){
	// 	return $this->db->delete($this->_table2, ['kode_transaksi' => $kode_transaksi]);
	// }

	// public function cekkodebarang_antro()
    // {
    //     $query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from elektro_komponen where id_barang= 2");
    //     $hasil = $query->row();
    //     return $hasil->kodebarang;
	// }

	// public function cekkodebarang_timbanganDewasa()
    // {
    //     $query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from elektro_komponen where id_barang= 7");
    //     $hasil = $query->row();
    //     return $hasil->kodebarang;
	// }

	// public function cekkodebarang_timbanganBayi()
    // {
    //     $query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from elektro_komponen where id_barang= 8");
    //     $hasil = $query->row();
    //     return $hasil->kodebarang;
	// }

	// public function cekkodebarang_hfnc()
    // {
    //     $query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from elektro_komponen where id_barang= 1");
    //     $hasil = $query->row();
    //     return $hasil->kodebarang;
	// }
	// public function cekkodebarang_suction()
    // {
    //     $query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from elektro_komponen where id_barang= 3");
    //     $hasil = $query->row();
    //     return $hasil->kodebarang;
	// }
	// public function cekkodebarang_summit()
    // {
    //     $query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from elektro_komponen where id_barang= 4");
    //     $hasil = $query->row();
    //     return $hasil->kodebarang;
	// }
	// public function cekkodebarang_endos()
    // {
    //     $query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from elektro_komponen where id_barang= 5");
    //     $hasil = $query->row();
    //     return $hasil->kodebarang;
	// }
	// public function cekkodebarang_light()
    // {
    //     $query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from elektro_komponen where id_barang= 6");
    //     $hasil = $query->row();
    //     return $hasil->kodebarang;
	// }

	// public function tampil_komponen(){
	// 	$query = $this->db->get_where($this->_table);
	// 	return $query->result();
	// }

	// public function tampil_barang(){
	// 	$query = $this->db->get_where($this->_table1);
	// 	return $query->result();
	// }

	// public function StokKurang(){
	// 	$query = $this->db->query("SELECT * FROM elektro_komponen WHERE total_stok < '20'");
    //     $hasil = $query->result();
    //     return $hasil;
	// }

	// public function Stok_Hfnc(){
	// 	$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang= 1");
    //     $hasil = $query->result();
    //     return $hasil;
	// }

	// public function Stok_Antropometri(){
	// 	$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang= 2");
    //     $hasil = $query->result();
    //     return $hasil;
	// }

	// public function StokKurang_Hfnc(){
	// 	$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang= 1 AND total_stok >= '1'");
    //     $hasil = $query->result();
    //     return $hasil;
	// }

	// public function StokKurang_TimbanganDewasa(){
	// 	$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang= 7 AND total_stok >= '1'");
    //     $hasil = $query->result();
    //     return $hasil;
	// }

	// public function StokKurang_TimbanganBayi(){
	// 	$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang= 8 AND total_stok >= '1'");
    //     $hasil = $query->result();
    //     return $hasil;
	// }

	// public function StokKurang_Antropometri(){
	// 	$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang= 2 AND total_stok >= '20'");
    //     $hasil = $query->result();
    //     return $hasil;
	// }

	// public function hnfc01()
    // {
    //     $query = $this->db->query("SELECT * FROM `elektro_komponen` WHERE keterangan ='hfnc'");
    //     $hasil = $query->result();
	// 	return $hasil; 
	// }
	// public function hnfc02()
    // {
    //     $query = $this->db->query("SELECT * FROM `elektro_komponen` WHERE keterangan ='hfnc02'");
    //     $hasil = $query->result();
	// 	return $hasil; 
	// }
	
	// public function antropometri()
    // {
    //     $query = $this->db->query("SELECT * FROM `elektro_komponen` WHERE keterangan ='antropometri'");
    //     $hasil = $query->result();
	// 	return $hasil; 
	// }
	
	// public function timbanganDewasa()
    // {
    //     $query = $this->db->query("SELECT * FROM `elektro_komponen` WHERE id_barang = 7");
    //     $hasil = $query->result();
	// 	return $hasil; 
	// }

	// public function timbanganBayi()
    // {
    //     $query = $this->db->query("SELECT * FROM `elektro_komponen` WHERE id_barang = 8");
    //     $hasil = $query->result();
	// 	return $hasil; 
	// }

	// public function dentalsuction()
    // {
    //     $query = $this->db->query("SELECT * FROM `elektro_komponen` WHERE keterangan ='dental suction'");
    //     $hasil = $query->result();
	// 	return $hasil; 
	// }
	// public function dentalsummit()
    // {
    //     $query = $this->db->query("SELECT * FROM `elektro_komponen` WHERE keterangan ='dental summit'");
    //     $hasil = $query->result();
	// 	return $hasil; 
	// }
	// public function endoscopi()
    // {
    //     $query = $this->db->query("SELECT * FROM `elektro_komponen` WHERE keterangan ='endoscopi'");
    //     $hasil = $query->result();
	// 	return $hasil; 
	// }
	// public function lightsource()
    // {
    //     $query = $this->db->query("SELECT * FROM `elektro_komponen` WHERE keterangan ='lightsource'");
    //     $hasil = $query->result();
	// 	return $hasil; 
	// }

	// public function AllPengambil()
	// {
	// 	$query = $this->db->query("SELECT * FROM tb_karyawan");
	// 	$hasil = $query->result();
	// 	return $hasil;
	// }

	// // public function AllBarang()
	// // {
	// // 	$query = $this->db->query("SELECT * FROM elektro_barang");
	// // 	$hasil = $query->result();
	// // 	return $hasil;
	// // } 

	// public function all_timbanganDewasa()
	// {
	// 	$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = 7");
	// 	$hasil = $query->result();
	// 	return $hasil;
	// }

	// public function all_timbanganBayi()
	// {
	// 	$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = 8");
	// 	$hasil = $query->result();
	// 	return $hasil;
	// }

	// public function getNamaBarang()
	// {
	//     $query = $this->db->query("SELECT * FROM `tb_barang`");
	//     $hasil = $query->result();
	// 	return $hasil; 
	// }

	// // public function lihat_id1($kode_transaksi)
	// // {
	// // 	$query = $this->db->get_where($this->_table3, ['kode_transaksi' => $kode_transaksi]);
	// // 	return $query->row();
	// // }

	// public function lihat_id2($kode_transaksi)
	// {
	// 	$query = $this->db->get_where($this->_table4, ['kode_transaksi' => $kode_transaksi]);
	// 	return $query->row();
	// }
	
	// public function lihat_id3($kode_transaksi)
	// {
	// 	$query = $this->db->get_where($this->_table5, ['kode_transaksi' => $kode_transaksi]);
	// 	return $query->row();
	// } 
}