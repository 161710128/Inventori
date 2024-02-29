<?php

class M_Master extends CI_Model{
	protected $_table = 'produksi_master_barang';

	protected $_table1 = 'pemesanan_non_ekatalog';
	protected $_table2 = 'pemesanan_ekatalog';   	
	
	// protected $_table2 = 'elektro_pengambilan';
	// protected $_table3 = 'elektro_masuk';
	// protected $_table4 = 'elektro_keluar';
	// protected $_table5 = 'elektro_inventaris';
	public $kode_komponen;

	public function lihat(){
		// $query = $this->db->get($this->_table); 
		// return $query->result();
		$query = $this->db->query("SELECT *
									FROM `qc_alat` 
									ORDER BY nama_alat;
								");
        $hasil = $query->result();
        return $hasil; 
	}
	
	public function lihatAntro(){ 
		$query = $this->db->query("SELECT pemesanan_ekatalog.kode_pemesanan,pemesanan_ekatalog.id_paket,pemesanan_ekatalog.pemesanan,pemesanan_ekatalog.distributor,pemesanan_ekatalog.nama_alat,
										  pemesanan_ekatalog.qty, pemesanan_ekatalog.tanggal_deadline, pemesanan_ekatalog.catatan, pemesanan_barang.nama_barang, pemesanan_ekatalog.status, 
										  pemesanan_ekatalog.tanggal_dikirim
									FROM `pemesanan_barang`
									JOIN `pemesanan_ekatalog`
									ON pemesanan_barang.id_barangpemesanan  = pemesanan_ekatalog.id_barangpemesanan
									WHERE pemesanan_ekatalog.id_barangpemesanan = '1'
									ORDER BY pemesanan_ekatalog.id_barangpemesanan;");
        $hasil = $query->result();
        return $hasil; 
	}  

	public function lihatLanKP(){ 
		$query = $this->db->query("SELECT pemesanan_ekatalog.kode_pemesanan,pemesanan_ekatalog.id_paket,pemesanan_ekatalog.pemesanan,pemesanan_ekatalog.distributor,pemesanan_ekatalog.nama_alat,
										  pemesanan_ekatalog.qty, pemesanan_ekatalog.tanggal_deadline, pemesanan_ekatalog.catatan, pemesanan_barang.nama_barang, pemesanan_ekatalog.status, 
										  pemesanan_ekatalog.tanggal_dikirim
									FROM `pemesanan_barang`
									JOIN `pemesanan_ekatalog`
									ON pemesanan_barang.id_barangpemesanan  = pemesanan_ekatalog.id_barangpemesanan
									WHERE pemesanan_ekatalog.id_barangpemesanan = '2'
									ORDER BY pemesanan_ekatalog.pemesanan;");
        $hasil = $query->result();
        return $hasil; 
	}  

	public function lihatEndosLL(){ 
		$query = $this->db->query("SELECT pemesanan_ekatalog.kode_pemesanan,pemesanan_ekatalog.id_paket,pemesanan_ekatalog.pemesanan,pemesanan_ekatalog.distributor,pemesanan_ekatalog.nama_alat,
										  pemesanan_ekatalog.qty, pemesanan_ekatalog.tanggal_deadline, pemesanan_ekatalog.catatan, pemesanan_barang.nama_barang, pemesanan_ekatalog.status, 
										  pemesanan_ekatalog.tanggal_dikirim
									FROM `pemesanan_barang`
									JOIN `pemesanan_ekatalog`
									ON pemesanan_barang.id_barangpemesanan  = pemesanan_ekatalog.id_barangpemesanan
									WHERE pemesanan_ekatalog.id_barangpemesanan = '3'
									ORDER BY pemesanan_ekatalog.pemesanan;"); 
        $hasil = $query->result();
        return $hasil; 
	}  

	public function lihatInfusSP(){ 
		$query = $this->db->query("SELECT pemesanan_ekatalog.kode_pemesanan,pemesanan_ekatalog.id_paket,pemesanan_ekatalog.pemesanan,pemesanan_ekatalog.distributor,pemesanan_ekatalog.nama_alat,
										  pemesanan_ekatalog.qty, pemesanan_ekatalog.tanggal_deadline, pemesanan_ekatalog.catatan, pemesanan_barang.nama_barang, pemesanan_ekatalog.status, 
										  pemesanan_ekatalog.tanggal_dikirim
									FROM `pemesanan_barang`
									JOIN `pemesanan_ekatalog`
									ON pemesanan_barang.id_barangpemesanan  = pemesanan_ekatalog.id_barangpemesanan
									WHERE pemesanan_ekatalog.id_barangpemesanan = '4'
									ORDER BY pemesanan_ekatalog.pemesanan;");
        $hasil = $query->result();
        return $hasil; 
	}  

	public function lihatHfnc(){ 
		$query = $this->db->query("SELECT pemesanan_ekatalog.kode_pemesanan,pemesanan_ekatalog.id_paket,pemesanan_ekatalog.pemesanan,pemesanan_ekatalog.distributor,pemesanan_ekatalog.nama_alat,
										  pemesanan_ekatalog.qty, pemesanan_ekatalog.tanggal_deadline, pemesanan_ekatalog.catatan, pemesanan_barang.nama_barang, pemesanan_ekatalog.status, 
										  pemesanan_ekatalog.tanggal_dikirim
									FROM `pemesanan_barang`
									JOIN `pemesanan_ekatalog`
									ON pemesanan_barang.id_barangpemesanan  = pemesanan_ekatalog.id_barangpemesanan
									WHERE pemesanan_ekatalog.id_barangpemesanan = '5'
									ORDER BY pemesanan_ekatalog.pemesanan;");
        $hasil = $query->result();
        return $hasil; 
	}  

	public function lihatUsg(){ 
		$query = $this->db->query("SELECT pemesanan_ekatalog.kode_pemesanan,pemesanan_ekatalog.id_paket,pemesanan_ekatalog.pemesanan,pemesanan_ekatalog.distributor,pemesanan_ekatalog.nama_alat,
										  pemesanan_ekatalog.qty, pemesanan_ekatalog.tanggal_deadline, pemesanan_ekatalog.catatan, pemesanan_barang.nama_barang, pemesanan_ekatalog.status, 
										  pemesanan_ekatalog.tanggal_dikirim
									FROM `pemesanan_barang`
									JOIN `pemesanan_ekatalog`
									ON pemesanan_barang.id_barangpemesanan  = pemesanan_ekatalog.id_barangpemesanan
									WHERE pemesanan_ekatalog.id_barangpemesanan = '6'
									ORDER BY pemesanan_ekatalog.pemesanan;");
        $hasil = $query->result();
        return $hasil; 
	}  

	public function lihatDexin(){ 
		$query = $this->db->query("SELECT pemesanan_ekatalog.kode_pemesanan,pemesanan_ekatalog.id_paket,pemesanan_ekatalog.pemesanan,pemesanan_ekatalog.distributor,pemesanan_ekatalog.nama_alat,
										  pemesanan_ekatalog.qty, pemesanan_ekatalog.tanggal_deadline, pemesanan_ekatalog.catatan, pemesanan_barang.nama_barang, pemesanan_ekatalog.status, 
										  pemesanan_ekatalog.tanggal_dikirim
									FROM `pemesanan_barang`
									JOIN `pemesanan_ekatalog`
									ON pemesanan_barang.id_barangpemesanan  = pemesanan_ekatalog.id_barangpemesanan
									WHERE pemesanan_ekatalog.id_barangpemesanan = '7'
									ORDER BY pemesanan_ekatalog.pemesanan;");
        $hasil = $query->result();
        return $hasil; 
	}  

	public function lihatPemesanan(){ 
		$query = $this->db->query("SELECT pemesanan_ekatalog.kode_pemesanan,pemesanan_ekatalog.id_paket,pemesanan_ekatalog.pemesanan,pemesanan_ekatalog.distributor,pemesanan_ekatalog.nama_alat,
										  pemesanan_ekatalog.qty, pemesanan_ekatalog.tanggal_deadline, pemesanan_ekatalog.catatan, pemesanan_barang.nama_barang, pemesanan_ekatalog.status, 
										  pemesanan_ekatalog.tanggal_dikirim
									FROM `pemesanan_barang`
									JOIN `pemesanan_ekatalog`
									ON pemesanan_barang.id_barangpemesanan  = pemesanan_ekatalog.id_barangpemesanan
									WHERE pemesanan_ekatalog.status = 'pesan'
									ORDER BY pemesanan_barang.nama_barang
									");
								
        $hasil = $query->result();
        return $hasil; 
	}  

	public function lihatNonEka(){ 
		// $query = $this->db->get($this->_table1); 
		// return $query->result(); 

		$query = $this->db->query("SELECT *
									FROM `pemesanan_non_ekatalog` 
									WHERE status = 'pesan' 
									");
								
        $hasil = $query->result();
        return $hasil; 

	}  

	public function lihatAllNonEka(){ 
		$query = $this->db->query("SELECT *
									FROM `pemesanan_non_ekatalog` 
									WHERE status = 'pesan' 
									ORDER BY status
									");
								
        $hasil = $query->result();
        return $hasil; 

	}

	public function lihatAllPemesanan(){ 
		$query = $this->db->query("SELECT pemesanan_ekatalog.kode_pemesanan,pemesanan_ekatalog.id_paket,pemesanan_ekatalog.pemesanan,pemesanan_ekatalog.distributor,pemesanan_ekatalog.nama_alat,
										  pemesanan_ekatalog.qty, pemesanan_ekatalog.tanggal_deadline, pemesanan_ekatalog.catatan, pemesanan_barang.nama_barang, pemesanan_ekatalog.status, 
										  pemesanan_ekatalog.tanggal_dikirim
									FROM `pemesanan_barang`
									JOIN `pemesanan_ekatalog`
									ON pemesanan_barang.id_barangpemesanan  = pemesanan_ekatalog.id_barangpemesanan 
									ORDER BY pemesanan_ekatalog.status
									");
								
        $hasil = $query->result();
        return $hasil; 
	}  

	public function cekkodebarang()
    {
        $query = $this->db->query("SELECT MAX(kode_alat) as kodebarang from qc_alat");
        $hasil = $query->row();
        return $hasil->kodebarang;
	}

	public function tambahAlat($data){
		return $this->db->insert($this->_table1, $data);
    }

	public function lihat_idAlat($kode_komponen){
		$query = $this->db->get_where($this->_table1, ['kode_alat' => $kode_komponen]);
		return $query->row();
	}

	public function lihat_idPemesanan($kode_komponen){
		$query = $this->db->get_where($this->_table2, ['kode_pemesanan' => $kode_komponen]);
		return $query->row();
	}

	public function ubahAlat($data, $kode_komponen){
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_alat' => $kode_komponen]);
		$query = $this->db->update($this->_table1);
		return $query;
	}

	public function ubahAlatPemesanan($data, $kode_komponen){
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_pemesanan' => $kode_komponen]);
		$query = $this->db->update($this->_table2);
		return $query;
	}

	public function hapusAlat($kode_komponen){
		return $this->db->delete($this->_table1, ['kode_alat' => $kode_komponen]);
    }

	public function jumlahAlat(){
		$query = $this->db->get($this->_table1);
		return $query->num_rows();
	}


































	public function jumlahProgress(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_stokALat(){
		$query = $this->db->get($this->_table1); 
		return $query->result();
	}

	// public function jumlahAlat(){
	// 	$query = $this->db->get($this->_table1);
	// 	return $query->num_rows();
	// }

	public function standingWeight(){
		// $query = $this->db->query("SELECT * FROM produksi_master_barang WHERE id_barang = '1' ORDER BY job");
		$query = $this->db->query("SELECT produksi_master_barang.kode_job, produksi_master_barang.job,produksi_master_barang.part_name, produksi_master_barang.jobdesc, produksi_master_barang.total_stok, produksi_barang.nama_barang
									FROM `produksi_barang`
									JOIN produksi_master_barang
									ON produksi_barang.id_barang = produksi_master_barang.id_barang
									WHERE produksi_master_barang.id_barang = 1
									ORDER BY job
								");
        $hasil = $query->result();
        return $hasil; 
	}

	public function babyScale(){
		// $query = $this->db->query("SELECT * FROM produksi_master_barang WHERE id_barang = '2' ORDER BY job");
		$query = $this->db->query("SELECT produksi_master_barang.kode_job, produksi_master_barang.job,produksi_master_barang.part_name, produksi_master_barang.jobdesc, produksi_master_barang.total_stok, produksi_barang.nama_barang
									FROM `produksi_barang`
									JOIN produksi_master_barang
									ON produksi_barang.id_barang = produksi_master_barang.id_barang
									WHERE produksi_master_barang.id_barang = 2
									ORDER BY job"
								);
        $hasil = $query->result();
        return $hasil;
	}

	public function stadioMeter(){
		// $query = $this->db->query("SELECT * FROM produksi_master_barang WHERE id_barang = '3' ORDER BY job");
		$query = $this->db->query("SELECT produksi_master_barang.kode_job, produksi_master_barang.job,produksi_master_barang.part_name, produksi_master_barang.jobdesc, produksi_master_barang.total_stok, produksi_barang.nama_barang
									FROM `produksi_barang`
									JOIN produksi_master_barang
									ON produksi_barang.id_barang = produksi_master_barang.id_barang
									WHERE produksi_master_barang.id_barang = 3
									ORDER BY job"
								);
        $hasil = $query->result();
        return $hasil;
	}

	public function infantometer(){
		// $query = $this->db->query("SELECT * FROM produksi_master_barang WHERE id_barang = '4' ORDER BY job");
		$query = $this->db->query("SELECT produksi_master_barang.kode_job, produksi_master_barang.job,produksi_master_barang.part_name, produksi_master_barang.jobdesc, produksi_master_barang.total_stok, produksi_barang.nama_barang
									FROM `produksi_barang`
									JOIN produksi_master_barang
									ON produksi_barang.id_barang = produksi_master_barang.id_barang
									WHERE produksi_master_barang.id_barang = 4
									ORDER BY job"
								);
        $hasil = $query->result();
        return $hasil;
	}

	public function lila(){
		// $query = $this->db->query("SELECT * FROM produksi_master_barang WHERE id_barang = '5' ORDER BY job");
		$query = $this->db->query("SELECT produksi_master_barang.kode_job, produksi_master_barang.job,produksi_master_barang.part_name, produksi_master_barang.jobdesc, produksi_master_barang.total_stok, produksi_barang.nama_barang
									FROM `produksi_barang`
									JOIN produksi_master_barang
									ON produksi_barang.id_barang = produksi_master_barang.id_barang
									WHERE produksi_master_barang.id_barang = 5
									ORDER BY job"
								);
        $hasil = $query->result();
        return $hasil;
	}

	
	public function cekkodebarang_standingWeight()
    {
        $query = $this->db->query("SELECT MAX(kode_job) as kodebarang from produksi_master_barang where id_barang= 1");
        $hasil = $query->row();
        return $hasil->kodebarang;
	}

	public function cekkodebarang_babyScale()
    {
        $query = $this->db->query("SELECT MAX(kode_job) as kodebarang from produksi_master_barang where id_barang= 2");
        $hasil = $query->row();
        return $hasil->kodebarang;
	}

	public function cekkodebarang_stadioMeter()
    {
        $query = $this->db->query("SELECT MAX(kode_job) as kodebarang from produksi_master_barang where id_barang= 3");
        $hasil = $query->row();
        return $hasil->kodebarang;
	}

	public function cekkodebarang_infantoMeter()
    {
        $query = $this->db->query("SELECT MAX(kode_job) as kodebarang from produksi_master_barang where id_barang= 4");
        $hasil = $query->row();
        return $hasil->kodebarang;
	}

	public function cekkodebarang_lila()
    {
        $query = $this->db->query("SELECT MAX(kode_job) as kodebarang from produksi_master_barang where id_barang= 5");
        $hasil = $query->row();
        return $hasil->kodebarang;
	}

	public function AllBarang()
	{
		$query = $this->db->query("SELECT * FROM produksi_barang");
		$hasil = $query->result();
		return $hasil;
	} 

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
    }

	
    

	public function lihat_id($kode_komponen){
		$query = $this->db->get_where($this->_table, ['kode_job' => $kode_komponen]);
		return $query->row();
	}

	

	public function ubah($data, $kode_komponen){
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_job' => $kode_komponen]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	
	public function hapus($kode_komponen){
		return $this->db->delete($this->_table, ['kode_job' => $kode_komponen]);
    }

	




























	




	public function lihat_hfnc(){
		$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = '1'");
        $hasil = $query->result();
        return $hasil;
	}

	public function lihat_antro(){
		$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = '2'");
        $hasil = $query->result();
        return $hasil;
	} 

	public function lihat_suction(){
		$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = '3'");
        $hasil = $query->result();
        return $hasil;
	}

	public function lihat_summit(){
		$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = '4'");
        $hasil = $query->result();
        return $hasil;
	}

	public function lihat_endos(){
		$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = '5'");
        $hasil = $query->result();
        return $hasil;
	}

	public function lihat_light(){
		$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = '6'");
        $hasil = $query->result();
        return $hasil;
	} 
	
	public function lihat_barang(){	
		$this->db->order_by("nama_barang","desc"); 
        return $this->db->get('elektro_barang')->row();
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_stok_komponen(){
		$query = $this->db->get_where($this->_table);
		return $query->result();
	} 

	public function lihat_stok_komponen_Hfnc(){
		$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = '1'");
        $hasil = $query->result();
        return $hasil;
	}

	public function lihat_stok_komponen_Antropometri(){
		$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = '2'");
        $hasil = $query->result();
        return $hasil;
	}

	public function lihatStokKomponen_timbanganDewasa(){
		$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = '7'");
        $hasil = $query->result();
        return $hasil;
	}

	public function lihatStokKomponen_timbanganBayi(){
		$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = '8'");
        $hasil = $query->result();
        return $hasil;
	}

	// public function lihat_id($kode_komponen){
	// 	$query = $this->db->get_where($this->_table, ['kode_komponen' => $kode_komponen]);
	// 	return $query->row();
	// }

	public function lihat_nama_barang($kode_komponen){
		$query = $this->db->select('*');
		$query = $this->db->where(['kode_komponen' => $kode_komponen]);
		$query = $this->db->get($this->_table);
		return $query->row();
	}

	
	// public function tambah($data){
	// 	return $this->db->insert($this->_table, $data);
    // }
    
    public function tambah_pengambilan($data){
		return $this->db->insert_batch($this->_table2, $data);
    }
    
	public function plus_stok($total_stok, $kode_komponen, $id_barang){
		$query = $this->db->set('total_stok', 'total_stok+' . $total_stok, false);
		$query = $this->db->where('kode_komponen', $kode_komponen);
		$query = $this->db->where('id_barang', $id_barang);
		$query = $this->db->update($this->_table);
		return $query;
	} 

	public function plus_stokTimbanganDewasa($total_stok, $nama_komponen, $id_barang){
		$query = $this->db->set('total_stok', 'total_stok+' . $total_stok, false);
		$query = $this->db->where('nama_komponen', $nama_komponen);
		$query = $this->db->where('id_barang', $id_barang);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function plus_stokTimbanganBayi($total_stok, $nama_komponen, $id_barang){
		$query = $this->db->set('total_stok', 'total_stok+' . $total_stok, false);
		$query = $this->db->where('nama_komponen', $nama_komponen);
		$query = $this->db->where('id_barang', $id_barang);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function min_stok($total_stok, $kode_komponen, $id_barang){
		$query = $this->db->set('total_stok', 'total_stok-' . $total_stok, false);
		$query = $this->db->where('kode_komponen', $kode_komponen);
		$query = $this->db->where('id_barang', $id_barang);
		$query = $this->db->update($this->_table);
		return $query;
	}
	
	public function minStok_timbangan($total_stok, $nama_komponen, $id_barang){
		$query = $this->db->set('total_stok', 'total_stok-' . $total_stok, false);
		$query = $this->db->where('nama_komponen', $nama_komponen);
		$query = $this->db->where('id_barang', $id_barang);
		$query = $this->db->update($this->_table);
		return $query;
	}

	

	// public function hapus($kode_komponen){
	// 	return $this->db->delete($this->_table, ['kode_komponen' => $kode_komponen]);
    // }
    
    public function hapus_pengambilan($kode_transaksi){
		return $this->db->delete($this->_table2, ['kode_transaksi' => $kode_transaksi]);
	}

	public function cekkodebarang_antro()
    {
        $query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from elektro_komponen where id_barang= 2");
        $hasil = $query->row();
        return $hasil->kodebarang;
	}

	public function cekkodebarang_timbanganDewasa()
    {
        $query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from elektro_komponen where id_barang= 7");
        $hasil = $query->row();
        return $hasil->kodebarang;
	}

	public function cekkodebarang_timbanganBayi()
    {
        $query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from elektro_komponen where id_barang= 8");
        $hasil = $query->row();
        return $hasil->kodebarang;
	}

	public function cekkodebarang_hfnc()
    {
        $query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from elektro_komponen where id_barang= 1");
        $hasil = $query->row();
        return $hasil->kodebarang;
	}
	public function cekkodebarang_suction()
    {
        $query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from elektro_komponen where id_barang= 3");
        $hasil = $query->row();
        return $hasil->kodebarang;
	}
	public function cekkodebarang_summit()
    {
        $query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from elektro_komponen where id_barang= 4");
        $hasil = $query->row();
        return $hasil->kodebarang;
	}
	public function cekkodebarang_endos()
    {
        $query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from elektro_komponen where id_barang= 5");
        $hasil = $query->row();
        return $hasil->kodebarang;
	}
	public function cekkodebarang_light()
    {
        $query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from elektro_komponen where id_barang= 6");
        $hasil = $query->row();
        return $hasil->kodebarang;
	}

	public function tampil_komponen(){
		$query = $this->db->get_where($this->_table);
		return $query->result();
	}

	public function tampil_barang(){
		$query = $this->db->get_where($this->_table1);
		return $query->result();
	}

	public function StokKurang(){
		$query = $this->db->query("SELECT * FROM elektro_komponen WHERE total_stok < '20'");
        $hasil = $query->result();
        return $hasil;
	}

	public function Stok_Hfnc(){
		$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang= 1");
        $hasil = $query->result();
        return $hasil;
	}

	public function Stok_Antropometri(){
		$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang= 2");
        $hasil = $query->result();
        return $hasil;
	}

	public function StokKurang_Hfnc(){
		$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang= 1 AND total_stok >= '1'");
        $hasil = $query->result();
        return $hasil;
	}

	public function StokKurang_TimbanganDewasa(){
		$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang= 7 AND total_stok >= '1'");
        $hasil = $query->result();
        return $hasil;
	}

	public function StokKurang_TimbanganBayi(){
		$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang= 8 AND total_stok >= '1'");
        $hasil = $query->result();
        return $hasil;
	}

	public function StokKurang_Antropometri(){
		$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang= 2 AND total_stok >= '20'");
        $hasil = $query->result();
        return $hasil;
	}

	public function hnfc01()
    {
        $query = $this->db->query("SELECT * FROM `elektro_komponen` WHERE keterangan ='hfnc'");
        $hasil = $query->result();
		return $hasil; 
	}
	public function hnfc02()
    {
        $query = $this->db->query("SELECT * FROM `elektro_komponen` WHERE keterangan ='hfnc02'");
        $hasil = $query->result();
		return $hasil; 
	}
	
	public function antropometri()
    {
        $query = $this->db->query("SELECT * FROM `elektro_komponen` WHERE keterangan ='antropometri'");
        $hasil = $query->result();
		return $hasil; 
	}
	
	public function timbanganDewasa()
    {
        $query = $this->db->query("SELECT * FROM `elektro_komponen` WHERE id_barang = 7");
        $hasil = $query->result();
		return $hasil; 
	}

	public function timbanganBayi()
    {
        $query = $this->db->query("SELECT * FROM `elektro_komponen` WHERE id_barang = 8");
        $hasil = $query->result();
		return $hasil; 
	}

	public function dentalsuction()
    {
        $query = $this->db->query("SELECT * FROM `elektro_komponen` WHERE keterangan ='dental suction'");
        $hasil = $query->result();
		return $hasil; 
	}
	public function dentalsummit()
    {
        $query = $this->db->query("SELECT * FROM `elektro_komponen` WHERE keterangan ='dental summit'");
        $hasil = $query->result();
		return $hasil; 
	}
	public function endoscopi()
    {
        $query = $this->db->query("SELECT * FROM `elektro_komponen` WHERE keterangan ='endoscopi'");
        $hasil = $query->result();
		return $hasil; 
	}
	public function lightsource()
    {
        $query = $this->db->query("SELECT * FROM `elektro_komponen` WHERE keterangan ='lightsource'");
        $hasil = $query->result();
		return $hasil; 
	}

	public function AllPengambil()
	{
		$query = $this->db->query("SELECT * FROM tb_karyawan");
		$hasil = $query->result();
		return $hasil;
	}

	// public function AllBarang()
	// {
	// 	$query = $this->db->query("SELECT * FROM elektro_barang");
	// 	$hasil = $query->result();
	// 	return $hasil;
	// } 

	public function all_timbanganDewasa()
	{
		$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = 7");
		$hasil = $query->result();
		return $hasil;
	}

	public function all_timbanganBayi()
	{
		$query = $this->db->query("SELECT * FROM elektro_komponen WHERE id_barang = 8");
		$hasil = $query->result();
		return $hasil;
	}

	public function getNamaBarang()
	{
	    $query = $this->db->query("SELECT * FROM `tb_barang`");
	    $hasil = $query->result();
		return $hasil; 
	}

	public function lihat_id1($kode_transaksi)
	{
		$query = $this->db->get_where($this->_table3, ['kode_transaksi' => $kode_transaksi]);
		return $query->row();
	}

	public function lihat_id2($kode_transaksi)
	{
		$query = $this->db->get_where($this->_table4, ['kode_transaksi' => $kode_transaksi]);
		return $query->row();
	}
	
	public function lihat_id3($kode_transaksi)
	{
		$query = $this->db->get_where($this->_table5, ['kode_transaksi' => $kode_transaksi]);
		return $query->row();
	} 
}