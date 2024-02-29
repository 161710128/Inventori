<?php
class M_gudangbahan_rm extends CI_Model
{
	protected $_table = 'rawmat_komponen';
	protected $_table2 = 'rawmat_masuk';
	protected $_table3 = 'rawmat_detail_masuk';
	protected $_table4 = 'rawmat_keluar';
	protected $_table5 = 'rawmat_detail_keluar';
	protected $_table6 = 'rawmat_barang';
	public $kode_komponen;

	public function lihat()
	{
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function cekkodebarang()
	{
		$query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from rawmat_komponen_bautmur");
		$hasil = $query->row();
		return $hasil->kodebarang;
	}

	public function tambah($data)
	{
		return $this->db->insert($this->_table, $data);
	}

	public function lihat_id($kode_komponen)
	{
		$query = $this->db->get_where($this->_table, ['kode_komponen' => $kode_komponen]);
		return $query->row();
	}

	public function ubah($data, $kode_komponen)
	{
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_komponen' => $kode_komponen]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function getNextKomponenCode($selectedValue)
	{
		$kodeAwalan = '';
		switch ($selectedValue) {
			case 'perekat':
				$kodeAwalan = 'PK';
				break;
			case 'baut_mur':
				$kodeAwalan = 'BK';
				break;
			case 'raw_material':
				$kodeAwalan = 'RK';
				break;
			case 'komponen_elektro':
				$kodeAwalan = 'EK';
				break;
			case 'komponen_mekanik':
				$kodeAwalan = 'MK';
				break;
			case 'setjadi_pemesinan':
				$kodeAwalan = 'SK';
				break;
			case 'percetakan_pengecatan':
				$kodeAwalan = 'CK';
				break;
			default:
				$kodeAwalan = '';
		}

		$this->db->like('kode_komponen', $kodeAwalan);
		$this->db->order_by('kode_komponen', 'DESC');
		$query = $this->db->get('rawmat_komponen', 1);

		if ($query->num_rows() > 0) {
			$row = $query->row();
			$lastCode = $row->kode_komponen;
			$lastNumber = intval(substr($lastCode, 2));
			$nextNumber = $lastNumber + 1;
			$nextCode = $kodeAwalan . sprintf("%04d", $nextNumber);
		} else {
			$nextCode = $kodeAwalan . "0001";
		}

		return $nextCode;
	}

	public function hapus($kode_komponen)
	{
		return $this->db->delete($this->_table, ['kode_komponen' => $kode_komponen]);
	}

	public function dashboard()
	{
		// $query = $this->db->get_where($this->_table, 'total_stok < 5');
		// return $query->result();

		$query = $this->db->query("SELECT `id_komponen`, `kode_komponen`, `nama_komponen`, `spesifikasi`, `qty_unit`, `total_stok`,`keterangan_barang`, `satuan`, `keterangan`, `kebutuhan`,'turunan_alat', `stok_minimal`, 
									CASE 
										WHEN keterangan_barang = 'import' AND total_stok >= stok_minimal THEN 'cukup' 
										WHEN keterangan_barang = 'import' AND total_stok < stok_minimal THEN 'menipis' 
										WHEN keterangan_barang = 'local' AND total_stok < stok_minimal THEN 'menipis' 
									ELSE 'cukup' 
									END AS `keterangan_stok` 
									FROM rawmat_komponen WHERE (keterangan_barang = 'import') OR (keterangan_barang = 'local' AND total_stok < stok_minimal)
									ORDER by keterangan_barang DESC
									");
		$hasil = $query->result();
		return $hasil;
	}

	public function lihatPenerimaan()
	{
		$query = $this->db->query("SELECT * from rawmat_masuk ORDER BY kode_transaksi DESC");
		$hasil = $query->result();
		return $hasil;
	}

	public function cekmaxTanggalPenerimaan()
	{
		$query = $this->db->query("SELECT MAX(tanggal_masuk) as tanggal from rawmat_masuk");
		$hasil = $query->row();
		return $hasil->tanggal;
	}

	public function cekkodetransaksi()
	{
		$query = $this->db->query("SELECT MAX(kode_transaksi) as kodetransaksi FROM rawmat_masuk");
		$hasil = $query->row();
		return $hasil->kodetransaksi;
	}

	public function countDuplicatePenerimaan($querry = null)
	{
		$query = $this->db->get_where($this->_table2, ['tanggal_masuk' => $querry]);
		return $query->row();
	}

	public function tambahPenerimaan($data)
	{
		return $this->db->insert($this->_table2, $data);
	}

	public function lihat_no_penerimaan($kode_transaksi)
	{
		return $this->db->get_where($this->_table2, ['kode_transaksi' => $kode_transaksi])->row();
	}

	public function lihat_no_detailPenerimaan($kode_transaksi)
	{
		// return $this->db->get_where($this->_table3, ['kode_transaksi' => $kode_transaksi])->result(); 
		$this->db->select('kode_komponen, nama_komponen, spesifikasi,SUM(jumlah) as jumlah,  tanggal, id_detail, satuan, jam');
		$this->db->from('rawmat_detail_masuk');
		$this->db->where('kode_transaksi', $kode_transaksi); // Add this line to filter by kode_transaksi
		$this->db->group_by('kode_komponen, nama_komponen, spesifikasi,  tanggal');
		return $this->db->get()->result();
	}

	public function lihat_id_detailPenerimaan($kode_komponen)
	{
		$query = $this->db->get_where($this->_table3, ['id_detail' => $kode_komponen]);
		return $query->row();
	}

	public function hapusDetailPenerimaan($kode_transaksi)
	{
		return $this->db->delete($this->_table3, ['id_detail' => $kode_transaksi]);
	}

	public function min_stok($total_stok, $kode_komponen)
	{
		$query = $this->db->set('total_stok', 'total_stok-' . $total_stok, false);
		$query = $this->db->where('kode_komponen', $kode_komponen);
		// $query = $this->db->where('id_barangm', $id_barang);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function lihat_stok_komponen()
	{
		$query = $this->db->get_where($this->_table);
		return $query->result();
	}

	public function getNamaBarang()
	{
		$query = $this->db->query("SELECT * FROM `mekanik_barang`");
		$hasil = $query->result();
		return $hasil;
	}

	public function lihat_id1($kode_transaksi)
	{
		$query = $this->db->get_where($this->_table2, ['kode_transaksi' => $kode_transaksi]);
		return $query->row();
	}

	public function lihat_nama_barang($kode_komponen)
	{
		$query = $this->db->select('*');
		$query = $this->db->where(['kode_komponen' => $kode_komponen]);
		$query = $this->db->get($this->_table);
		return $query->row();
	}

	public function tambahDetailPenerimaan($data)
	{
		return $this->db->insert_batch($this->_table3, $data);
	}

	public function plus_stok($total_stok, $kode_komponen)
	{
		$query = $this->db->set('total_stok', 'total_stok+' . $total_stok, false);
		$query = $this->db->where('kode_komponen', $kode_komponen);
		// $query = $this->db->where('id_barangm', $id_barang);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function lihatPengeluaran()
	{
		// return $this->db->get($this->_table)->result();
		$query = $this->db->query("SELECT * from rawmat_keluar ORDER BY kode_transaksi DESC");
		$hasil = $query->result();
		return $hasil;
	}

	public function cekkodetransaksiPengeluaran()
	{
		$query = $this->db->query("SELECT MAX(kode_transaksi) as kodetransaksi from rawmat_keluar");
		$hasil = $query->row();
		return $hasil->kodetransaksi;
	}

	public function countDuplicatePengeluaran($querry = null)
	{
		$query = $this->db->get_where($this->_table4, ['tanggal_keluar' => $querry]);
		return $query->row();
	}

	public function tambahPengeluaran($data)
	{
		return $this->db->insert($this->_table4, $data);
	}

	public function lihat_no_keluar($kode_transaksi)
	{
		return $this->db->get_where($this->_table4, ['kode_transaksi' => $kode_transaksi])->row();
	}

	public function lihat_no_detailKeluar($kode_transaksi)
	{
		$this->db->select('nama_komponen, spesifikasi,SUM(jumlah) as jumlah, peruntukan, pengambil, tanggal, id_detail, satuan, jam, shift');
		$this->db->from('rawmat_detail_keluar');
		$this->db->where('kode_transaksi', $kode_transaksi); // Add this line to filter by kode_transaksi
		$this->db->group_by('nama_komponen, spesifikasi,peruntukan, pengambil, tanggal, shift');
		return $this->db->get()->result();
	}

	public function lihat_idPengeluaran($kode_komponen)
	{
		$query = $this->db->get_where($this->_table5, ['id_detail' => $kode_komponen]);
		return $query->row();
	}

	public function hapusDetailPengeluaran($kode_transaksi)
	{
		return $this->db->delete($this->_table5, ['id_detail' => $kode_transaksi]);
	}

	public function tampil_komponen()
	{
		$query = $this->db->get_where($this->_table, 'total_stok > 0');
		return $query->result();
	}

	public function tampil_barang()
	{
		$query = $this->db->get_where($this->_table6);
		return $query->result();
	}

	public function lihat_id2($kode_transaksi)
	{
		$query = $this->db->get_where($this->_table4, ['kode_transaksi' => $kode_transaksi]);
		return $query->row();
	}

	public function AllPengambil()
	{
		$query = $this->db->query("SELECT * FROM tb_karyawan");
		$hasil = $query->result();
		return $hasil;
	}

	public function tambahDetailKeluar($data)
	{
		return $this->db->insert_batch($this->_table5, $data);
	}

	public function perekat()
	{
		$query = $this->db->query("SELECT * FROM rawmat_komponen WHERE jenis_komponen = 'perekat'");
		$hasil = $query->result();
		return $hasil;
	}

	public function bautMur()
	{
		$query = $this->db->query("SELECT * FROM rawmat_komponen WHERE jenis_komponen = 'baut_mur'");
		$hasil = $query->result();
		return $hasil;
	}

	public function rawMaterial()
	{
		$query = $this->db->query("SELECT * FROM rawmat_komponen WHERE jenis_komponen = 'raw_material'");
		$hasil = $query->result();
		return $hasil;
	}

	public function komponenElektro()
	{
		$query = $this->db->query("SELECT * FROM rawmat_komponen WHERE jenis_komponen = 'komponen_elektro'");
		$hasil = $query->result();
		return $hasil;
	}

	public function komponenMekanik()
	{
		$query = $this->db->query("SELECT * FROM rawmat_komponen WHERE jenis_komponen = 'komponen_mekanik'");
		$hasil = $query->result();
		return $hasil;
	}

	public function setJadi()
	{
		$query = $this->db->query("SELECT * FROM rawmat_komponen WHERE jenis_komponen = 'setjadi_pemesinan'");
		$hasil = $query->result();
		return $hasil;
	}

	public function percetakan()
	{
		$query = $this->db->query("SELECT * FROM rawmat_komponen WHERE jenis_komponen = 'percetakan_pengecatan'");
		$hasil = $query->result();
		return $hasil;
	}










































	public function All()
	{
		$query = $this->db->query("SELECT `id_komponen`, `kode_komponen`, `nama_komponen`, `spesifikasi`, `qty_unit`, `total_stok`, `stok_alat`, `satuan`, `keterangan`, `kebutuhan`, `stok_minimal`, `id_barangm`, 
									CASE 
										WHEN type_barang = 'import' AND total_stok >= stok_minimal THEN 'cukup' 
										WHEN type_barang = 'import' AND total_stok < stok_minimal THEN 'menipis' 
										WHEN type_barang = 'local' AND total_stok < stok_minimal THEN 'menipis' 
									ELSE 'cukup' 
									END AS `keterangan_stok` 
									FROM mekanik_komponen WHERE (type_barang = 'import') OR (type_barang = 'local' AND total_stok < stok_minimal)
									ORDER by type_barang DESC
									");
		$hasil = $query->result();
		return $hasil;
	}

	public function jumlah()
	{
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}




	// public function lihat_stok_komponen()
	// {
	// 	$query = $this->db->get_where($this->_table);
	// 	return $query->result();
	// }

	public function lihat_stok_komponen_Hfnc()
	{
		$query = $this->db->query("SELECT * FROM mekanik_komponen WHERE id_barangm = '1'");
		$hasil = $query->result();
		return $hasil;
	}

	public function lihat_stok_komponen_Antropometri()
	{
		$query = $this->db->query("SELECT * FROM mekanik_komponen WHERE id_barangm = '2'");
		$hasil = $query->result();
		return $hasil;
	}



	// public function lihat_id1($kode_transaksi)
	// {
	// 	$query = $this->db->get_where($this->_table2, ['kode_transaksi' => $kode_transaksi]);
	// 	return $query->row();
	// }

	// public function lihat_id2($kode_transaksi)
	// {
	// 	$query = $this->db->get_where($this->_table3, ['kode_transaksi' => $kode_transaksi]);
	// 	return $query->row();
	// }

	public function countDuplicate1($querry = null)
	{
		$query = $this->db->get_where($this->_table3, ['tanggal_keluar' => $querry]);
		return $query->row();
	}


	// public function lihat_nama_barang($kode_komponen)
	// {
	// 	$query = $this->db->select('*');
	// 	$query = $this->db->where(['kode_komponen' => $kode_komponen]);
	// 	$query = $this->db->get($this->_table);
	// 	return $query->row();
	// }



	public function tambah_keluar($data)
	{
		return $this->db->insert($this->_table3, $data);
	}

	// public function plus_stok($total_stok, $kode_komponen)
	// {
	// 	$query = $this->db->set('total_stok', 'total_stok+' . $total_stok, false);
	// 	$query = $this->db->where('kode_komponen', $kode_komponen);
	// 	// $query = $this->db->where('id_barangm', $id_barang);
	// 	$query = $this->db->update($this->_table);
	// 	return $query;
	// }



	// public function min_stok($total_stok, $kode_komponen)
	// {
	// 	$query = $this->db->set('total_stok', 'total_stok-' . $total_stok, false);
	// 	$query = $this->db->where('kode_komponen', $kode_komponen);
	// 	// $query = $this->db->where('id_barangm', $id_barang);
	// 	$query = $this->db->update($this->_table);
	// 	return $query;
	// }





	// public function cekkodebarang()
	// {
	// 	$query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from mekanik_komponen");
	// 	$hasil = $query->row();
	// 	return $hasil->kodebarang;
	// }

	public function allAlat()
	{
		$query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from mekanik_komponen");
		$hasil = $query->row();
		return $hasil->kodebarang;
	}



	public function cekkodebarangAntropometri()
	{
		$query = $this->db->query("SELECT MAX(kode_komponen) as kodebarang from mekanik_komponen WHERE id_barangm = '2'");
		$hasil = $query->row();
		return $hasil->kodebarang;
	}

	// public function tampil_komponen()
	// {
	// 	$query = $this->db->get_where($this->_table, 'total_stok > 0');
	// 	return $query->result();
	// }

	// public function tampil_barang()
	// {
	// 	$query = $this->db->get_where($this->_table4);
	// 	return $query->result();
	// } 

	public function AllBarang()
	{
		$query = $this->db->query("SELECT * FROM mekanik_barang");
		$hasil = $query->result();
		return $hasil;
	}

	// public function AllPengambil()
	// {
	// 	$query = $this->db->query("SELECT * FROM tb_karyawan");
	// 	$hasil = $query->result();
	// 	return $hasil;
	// }

	public function HFNC()
	{
		$query = $this->db->query("SELECT * FROM mekanik_komponen WHERE id_barangm = '1'");
		$hasil = $query->result();
		return $hasil;
	}

	public function Antropometri()
	{
		$query = $this->db->query("SELECT * FROM mekanik_komponen WHERE id_barangm = '2' ORDER BY nama_komponen");
		$hasil = $query->result();
		return $hasil;
	}

	// public function getNamaBarang()
	// {
	//     $query = $this->db->query("SELECT * FROM `mekanik_barang`");
	//     $hasil = $query->result();
	// 	return $hasil; 
	// } 
}
