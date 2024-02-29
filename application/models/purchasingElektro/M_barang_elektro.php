<?php

class M_barang_elektro extends CI_Model{
	protected $_table = 'elektro_komponen';
	protected $_table1 = 'elektro_barang';
	protected $_table2 = 'elektro_pengambilan';
	protected $_table3 = 'elektro_masuk';
	protected $_table4 = 'elektro_keluar';
	protected $_table5 = 'elektro_inventaris';
	protected $_table6 = 'tb_karyawan';
	public $kode_komponen;

	public function lihat(){
		$query = $this->db->get($this->_table); 
		return $query->result();
	}

	public function lihatKaryawan(){
		$query = $this->db->query("SELECT * FROM tb_karyawan ORDER BY nama_karyawan");
        $hasil = $query->result();
        return $hasil;
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

	public function lihat_id($kode_komponen){
		$query = $this->db->get_where($this->_table, ['kode_komponen' => $kode_komponen]);
		return $query->row();
	}

	public function lihat_idKaryawan($kode_komponen){
		$query = $this->db->get_where($this->_table6, ['id' => $kode_komponen]);
		return $query->row();
	}

	public function lihat_nama_barang($kode_komponen){
		$query = $this->db->select('*');
		$query = $this->db->where(['kode_komponen' => $kode_komponen]);
		$query = $this->db->get($this->_table);
		return $query->row();
	}

	
	public function tambah($data){
		return $this->db->insert($this->_table, $data);
    }
    
	public function tambahKaryawan($data){
		return $this->db->insert($this->_table6, $data);
    }

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

	public function ubah($data, $kode_komponen){
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_komponen' => $kode_komponen]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function ubahKaryawan($data, $kode_komponen){
		$query = $this->db->set($data);
		$query = $this->db->where(['id' => $kode_komponen]);
		$query = $this->db->update($this->_table6);
		return $query;
	}

	public function hapus($kode_komponen){
		return $this->db->delete($this->_table, ['kode_komponen' => $kode_komponen]);
    }
    
    public function hapus_pengambilan($kode_transaksi){
		return $this->db->delete($this->_table2, ['kode_transaksi' => $kode_transaksi]);
	}

	public function hapusKaryawan($kode_komponen){
		return $this->db->delete($this->_table6, ['id' => $kode_komponen]);
    }

	public function cekkodebarang()
    {
        $query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from elektro_komponen");
        $hasil = $query->row();
        return $hasil->kodebarang;
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

	public function cekId_karyawan()
    {
        $query = $this->db->query("SELECT MAX(id) as kodebarang from tb_karyawan");
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
		$query = $this->db->query("SELECT * FROM tb_karyawan ORDER BY nama_karyawan");
		$hasil = $query->result();
		return $hasil;
	}

	public function AllBarang()
	{
		$query = $this->db->query("SELECT * FROM elektro_barang");
		$hasil = $query->result();
		return $hasil;
	} 

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
	    $query = $this->db->query("SELECT * FROM `elektro_barang`");
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