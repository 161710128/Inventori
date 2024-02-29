<?php

class M_MasterHasil extends CI_Model{
	protected $_table = 'produksi_data_master';
	protected $_table1 = 'produksi_masuk';
	protected $_table2 = 'produksi_hasil_detail';
	protected $_table3 = 'produksi_masuk_tindakan';
	// protected $_table2 = 'elektro_pengambilan';
	// protected $_table3 = 'elektro_masuk';
	// protected $_table4 = 'elektro_keluar';
	// protected $_table5 = 'elektro_inventaris';
	public $kode_komponen;
	
	public function lihat()
	{
			$this->db->select('pdm.*, pt.nama_tindakan');
			$this->db->from('produksi_data_master pdm');
			$this->db->join('produksi_tindakan pt', 'pdm.id_tindakan = pt.id_tindakan', 'LEFT');
			$query = $this->db->get();
			return $query->result();
	}

	public function lihat_kode_transaksi($kode_transaksi){
		return $this->db->get_where($this->_table3, ['kode_transaksi' => $kode_transaksi])->row();
	}
	
	public function lihat_hasil()
	{
		$query = $this->db->get($this->_table3);
		return $query->result();
	}


    public function get_tindakan_options()
    {
        $this->db->select('id_tindakan, nama_tindakan');
        $query = $this->db->get('produksi_tindakan');
        return $query->result();
    }
	
	public function get_nama_tindakan_by_id($id_tindakan)
    {
        $this->db->select('nama_tindakan');
        $this->db->where('id_tindakan', $id_tindakan);
        $query = $this->db->get('produksi_tindakan');
        $result = $query->row();

        if ($result) {
            return $result->nama_tindakan;
        } else {
            return 'Tindakan not found';
        }
    }
	
	
// 	public function detail($kode_transaksi) {
// 		$this->db->select('pd.nama_tindakan, pdm.nama_alat, phd.*');
// 		$this->db->from('produksi_hasil_detail AS phd');
// 		$this->db->join('produksi_tindakan AS pd', 'phd.id_tindakan = pd.id_tindakan');
// 		$this->db->join('produksi_data_master AS pdm', 'pdm.kode_alat = phd.kode_alat');
// 		$this->db->where('phd.kode_transaksi', $kode_transaksi);
// 		$query = $this->db->get();
// 		return $query->result();
// 	}

    public function detail($kode_transaksi) {
    		$this->db->select('pd.nama_tindakan, pdm.nama_alat, phd.*');
    		$this->db->select_sum('phd.total_assy'); // Add sum of total_assy
    		$this->db->from('produksi_hasil_detail AS phd');
    		$this->db->join('produksi_tindakan AS pd', 'phd.id_tindakan = pd.id_tindakan');
    		$this->db->join('produksi_data_master AS pdm', 'pdm.kode_alat = phd.kode_alat');
    		$this->db->where('phd.kode_transaksi', $kode_transaksi);
    		$this->db->order_by('pdm.nama_alat', 'ASC'); // Order by nama_alat ascending
    		$this->db->order_by('pd.nama_tindakan', 'ASC'); // Then order by nama_tindakan ascending
    		$this->db->order_by('phd.shift', 'ASC'); // Then order by shift ascending
    		$this->db->group_by('pdm.nama_alat, pd.nama_tindakan, phd.shift'); // Group by columns
    		$query = $this->db->get();
    
    		return $query->result();
    }

	public function hapusDetail($id_detail)
	{
		return $this->db->delete($this->_table2, ['id_detail' => $id_detail]);
	}
	
	
	public function cekkodebarang()
    {
        $query = $this->db->query("SELECT MAX(kode_alat) as kodebarang from produksi_data_master");
        $hasil = $query->row();
        return $hasil->kodebarang;
	}
	
	public function cekkodetransaksi()
    {
        $query = $this->db->query("SELECT MAX(kode_transaksi) as kodebarang from produksi_masuk_tindakan");
        $hasil = $query->row();
        return $hasil->kodebarang;
	}
	
	public function Alltransaksi()
	{
		$query = $this->db->query("SELECT * FROM produksi_masuk");
		$hasil = $query->result();
		return $hasil;
	} 
	
	public function AllBarang()
	{
		$query = $this->db->query("SELECT * FROM produksi_data_master");
		$hasil = $query->result();
		return $hasil;
	} 
	
	public function tambah($data){
		return $this->db->insert($this->_table, $data);
    }
	
	public function tambah1($data){
		return $this->db->insert_batch($this->_table2, $data);
	}
	
	public function tembah_edit($data){
		return $this->db->insert($this->_table2, $data);
    }
	
	public function tambah_hasil_alat($data){
		return $this->db->insert($this->_table3, $data);
    }
	
	public function countDuplicate1($querry = null)
	{
		$query = $this->db->get_where($this->_table3, ['tanggal' => $querry]);
		return $query->row();  

	} 
	
	public function cek_data_by_tanggal($tanggal) {
        $this->db->where('tanggal', $tanggal);
        $query = $this->db->get('produksi_masuk'); // Ganti 'nama_tabel' dengan nama tabel yang sesuai
        return $query->num_rows() > 0;
    }
	
	public function plus_stok($total_assy, $kode_alat){
		$query = $this->db->set('total_assy', 'total_assy+' . $total_assy, false);
		$query = $this->db->where('kode_alat', $kode_alat);
		// $query = $this->db->where('id_barang', $id_barang);
		$query = $this->db->update($this->_table);
		return $query;
	}
	
	public function min_stok($total_assy, $kode_alat){
		$query = $this->db->set('total_assy', 'total_assy-' . $total_assy, false);
		$query = $this->db->where('kode_alat', $kode_alat);
		// $query = $this->db->where('id_barang', $id_barang);
		$query = $this->db->update($this->_table); 	
		return $query;
	}

	public function lihat_id($kode_komponen){
		$query = $this->db->get_where($this->_table, ['kode_alat' => $kode_komponen]);
		return $query->row();
	}
	
	public function lihat_id_detail($id_detail){
		$query = $this->db->get_where($this->_table2, ['id_detail' => $id_detail]);
		return $query->row();
	}
	
	public function lihat_id2($kode_transaksi){
		$query = $this->db->get_where($this->_table3, ['kode_transaksi' => $kode_transaksi]);
		return $query->row();
    }

	public function hapus($kode_alat){
		return $this->db->delete($this->_table, ['kode_alat' => $kode_alat]);
    }
	
	
	public function ubah($data, $kode_komponen){
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_alat' => $kode_komponen]);
		$query = $this->db->update($this->_table);
		return $query;
	}
	
	public function lihat_stok_komponen(){
// 		$query = $this->db->get_where($this->_table);
// 		return $query->result();


// 	$query = $this->db->query("SELECT produksi_data_master.kode_alat, produksi_data_master.nama_alat, produksi_data_master.id_tindakan, produksi_tindakan.nama_tindakan
//                                 FROM `produksi_data_master` 
//                                 JOIN produksi_tindakan
//                                 ON produksi_data_master.id_tindakan = produksi_tindakan.id_tindakan;");
//     return $query->result(); 


	$query = $this->db->select('*');
		$this->db->join('produksi_tindakan', 'produksi_data_master.id_tindakan = produksi_tindakan.id_tindakan');
// 		$query = $this->db->where(['kode_alat' => $kode_alat]);
		$query = $this->db->get($this->_table);
		return $query->result();




	}
	
	public function lihat_nama_barang($kode_alat)
	{
		$query = $this->db->select('*');
		$this->db->join('produksi_tindakan', 'produksi_data_master.id_tindakan = produksi_tindakan.id_tindakan');
		$query = $this->db->where(['kode_alat' => $kode_alat]);
		$query = $this->db->get($this->_table);
		return $query->row();

 

	}
	
}