<?php

class M_penerimaan_mekanik extends CI_Model {
	protected $_table = 'mekanik_masuk'; 
	protected $_table1 = 'mekanik_komponen'; 
	public $kode_transaksi;


	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	} 
	public function lihat(){
		// return $this->db->get($this->_table)->result();
		$query = $this->db->query("SELECT * from mekanik_masuk ORDER BY kode_transaksi DESC");
        $hasil = $query->result();
        return $hasil;
	}  
	
	public function lihat_no_terima($kode_transaksi){
		return $this->db->get_where($this->_table, ['kode_transaksi' => $kode_transaksi])->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function update($data,$id_komponen){
		// return $this->db->update($this->$_table1, $data);
		// $this->db->where('kode_komponen', $kode_komponen);
    	// $this->db->update($this->$_table1,'dipakai_alat', $data);
		$query = $this->db->set($data);
		$query = $this->db->where($id_komponen);
		$query = $this->db->update($this->_table1); 
		return $query;
	}

	public function hapus($kode_transaksi){
		return $this->db->delete($this->_table, ['kode_transaksi' => $kode_transaksi]);
	}

	public function cekkodetransaksi()
    {
        $query = $this->db->query("SELECT MAX(kode_transaksi) as kodetransaksi FROM mekanik_masuk");
        $hasil = $query->row();
        return $hasil->kodetransaksi;
    }

	public function cekmaxTanggal()
    {
        $query = $this->db->query("SELECT MAX(tanggal_masuk) as tanggal from mekanik_masuk");
        $hasil = $query->row();
        return $hasil->tanggal;
	}
	
	public function lihatMerge(){
		// return $this->db->get($this->_table)->result();
		
		// $query = $this->db->query("SELECT * FROM tbl_mergecell ORDER BY kode_diagnosa");
        // $hasil = $query->result();
        // return $hasil;

		$result = $this->db->query("SELECT * FROM tbl_mergecell ORDER BY kode_diagnosa");

		$result = $result->result_array();

		//check for data and handle errors

		return $result;
	}  
	
	public function countDuplicate1($querry = null)
	{
		$query = $this->db->get_where($this->_table, ['tanggal_masuk' => $querry]);
		return $query->row();  

	} 
}