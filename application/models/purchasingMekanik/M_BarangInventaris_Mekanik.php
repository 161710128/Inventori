<?php
class M_BarangInventaris_Mekanik extends CI_Model{
	protected $_table = 'mekanik_inventaris'; 
    protected $_table1 = 'mekanik_masuk_inventaris';
    protected $_table2 = 'mekanik_keluar_inventaris'; 
	public $kode_part;

	public function lihat(){
		$query = $this->db->get($this->_table);
		return $query->result();
	} 

    public function cekkodebarang()
    {
        $query = $this->db->query("SELECT MAX(kode_part) as kode_part from mekanik_inventaris");
        $hasil = $query->row();
        return $hasil->kode_part;
	}

    public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

    public function lihat_id($kode_part){
		$query = $this->db->get_where($this->_table, ['kode_part' => $kode_part]);
		return $query->row();
	}

    public function hapus($kode_part){
		return $this->db->delete($this->_table, ['kode_part' => $kode_part]);
	}

    public function ubah($data, $kode_part){
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_part' => $kode_part]);
		$query = $this->db->update($this->_table);
		return $query;
	}
    
	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_stok_komponen(){
		$query = $this->db->get_where($this->_table);
		return $query->result();
	}
    
	public function lihat_id1($kode_transaksi){
		$query = $this->db->get_where($this->_table1, ['kode_transaksi' => $kode_transaksi]);
		return $query->row();
    }

    public function lihat_id2($kode_transaksi){
		$query = $this->db->get_where($this->_table2, ['kode_transaksi' => $kode_transaksi]);
		return $query->row();
    }

	public function lihat_nama_barang($kode_part){
		$query = $this->db->select('*');
		$query = $this->db->where(['kode_part' => $kode_part]);
		$query = $this->db->get($this->_table);
		return $query->row();
	}
    
	public function plus_stok($total_stok, $kode_part){
		$query = $this->db->set('total_stok', 'total_stok+' . $total_stok, false);
		$query = $this->db->where('kode_part', $kode_part);
		// $query = $this->db->where('id_barang', $id_barang);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function min_stok($total_stok, $kode_part){
		$query = $this->db->set('total_stok', 'total_stok-' . $total_stok, false);
		$query = $this->db->where('kode_part', $kode_part);
		// $query = $this->db->where('id_barang', $id_barang);
		$query = $this->db->update($this->_table);
		return $query;
	}
    
	public function tampil_komponen(){
		$query = $this->db->get_where($this->_table, 'total_stok > 0');
		return $query->result();
	}

	public function tampil_barang(){
		$query = $this->db->get_where($this->_table1);
		return $query->result();
	}

	public function hnfc01()
    {
        $query = $this->db->query("SELECT * FROM `mekanik_inventaris` WHERE keterangan ='hnfc01'");
        $hasil = $query->result();
		return $hasil; 
	} 
}