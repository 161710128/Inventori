<?php

class M_Master extends CI_Model{ 
	protected $_table1 = 'pemesanan_ekatalog';   
	public $kode_komponen;

	public function lihat(){ 
		$query = $this->db->query("SELECT pemesanan_ekatalog.kode_pemesanan,pemesanan_ekatalog.id_paket,pemesanan_ekatalog.pemesanan,pemesanan_ekatalog.distributor,pemesanan_ekatalog.nama_alat,
										  pemesanan_ekatalog.qty, pemesanan_ekatalog.tanggal_deadline, pemesanan_ekatalog.catatan, pemesanan_barang.nama_barang, pemesanan_ekatalog.status, 
										  pemesanan_ekatalog.tanggal_dikirim
									FROM `pemesanan_barang`
									JOIN `pemesanan_ekatalog`
									ON pemesanan_barang.id_barangpemesanan  = pemesanan_ekatalog.id_barangpemesanan
									ORDER BY pemesanan_ekatalog.id_barangpemesanan;");
								
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
 
	public function cekkodebarang()
    {
        $query = $this->db->query("SELECT MAX(kode_pemesanan) as kodebarang from pemesanan_ekatalog");
        $hasil = $query->row();
        return $hasil->kodebarang;
	}

	public function cekkodebarang1()
    {
        $query = $this->db->query("SELECT MAX(kode_pemesanan) as kodebarang from pemesanan_non_ekatalog");
        $hasil = $query->row();
        return $hasil->kodebarang;
	}

	public function tambahAlat($data){
		return $this->db->insert($this->_table1, $data);
    } 

	public function lihat_idAlat($kode_komponen){
		$query = $this->db->get_where($this->_table1, ['kode_pemesanan' => $kode_komponen]);
		return $query->row();
	}

	public function ubahAlat($data, $kode_komponen){
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_pemesanan' => $kode_komponen]);
		$query = $this->db->update($this->_table1);
		return $query;
	}

	public function hapusAlat($kode_komponen){
		return $this->db->delete($this->_table1, ['kode_pemesanan' => $kode_komponen]);
    }

	public function jumlahEkatalog(){
		$query = $this->db->get($this->_table1);
		return $query->num_rows();
	} 
}