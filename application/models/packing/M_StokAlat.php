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
	
	
	// public function getDataFromTable2($total_stok, $kode_alat) {
		// try {
			// $sql = "SELECT * FROM packing_detail_masuk WHERE total_stok >= ? AND kode_alat = ?";
			// $query = $this->db->query($sql, array($total_stok, $kode_alat));

			// if ($query->num_rows() > 0) {
				// return $query->result_array();
			// } else {
				// return [];
			// }
		// } catch (Exception $e) {
			// echo 'Error: ' . $e->getMessage();
		// }
	// }
	
	// public function getDataFromTable2($total_stok, $kode_alat) {
		// try {
			// $this->db->trans_start(); // Start a database transaction

			// // Select the rows to transfer
			// $sql = "SELECT * FROM packing_detail_masuk WHERE total_stok >= ? AND kode_alat = ?";
			// $query = $this->db->query($sql, array($total_stok, $kode_alat));

			// if ($query->num_rows() > 0) {
				// $data = $query->result_array();

				// // Get the serial_numbers of selected rows
				// $serial_numbers_to_delete = array();
				// foreach ($data as $row) {
					// $serial_numbers_to_delete[] = $row['serial_number'];
				// }

				// // Delete the selected rows based on serial_numbers
				// $this->db->where_in('serial_number', $serial_numbers_to_delete)
						 // ->delete('packing_detail_masuk');

				// $this->db->trans_complete(); // Complete the transaction

				// return $data;
			// } else {
				// return [];
			// }
		// } catch (Exception $e) {
			// echo 'Error: ' . $e->getMessage();
			// $this->db->trans_rollback(); // Rollback the transaction on error
		// }
	// }


// public function getDataFromTable2($total_stok, $kode_alat) {
    // try {
        // $this->db->trans_start(); // Start a database transaction

        // // Select the rows to transfer
        // $sql = "SELECT * FROM packing_detail_masuk WHERE total_stok >= ? AND kode_alat = ?";
        // $query = $this->db->query($sql, array($total_stok, $kode_alat));

        // if ($query->num_rows() > 0) {
            // $data = $query->result_array();

            // // Set the total_stok to 0 for selected rows
            // foreach ($data as &$row) {
                // $row['total_stok'] = 0;
            // }

            // // Delete the selected rows based on serial_numbers
            // $serial_numbers_to_delete = array();
            // foreach ($data as $row) {
                // $serial_numbers_to_delete[] = $row['serial_number'];
            // }

            // $this->db->where_in('serial_number', $serial_numbers_to_delete)
                     // ->update('packing_detail_masuk', array('total_stok' => 0));

            // $this->db->trans_complete(); // Complete the transaction

            // return $data;
        // } else {
            // return [];
        // }
    // } catch (Exception $e) {
        // echo 'Error: ' . $e->getMessage();
        // $this->db->trans_rollback(); // Rollback the transaction on error
    // }
// }

	public function getDataFromTable2($total_stok, $kode_alat) {
		try {
			$this->db->trans_start(); // Start a database transaction

			// Select the rows to transfer
			$sql = "SELECT * FROM packing_detail_masuk WHERE total_stok >= ? AND kode_alat = ?";
			$query = $this->db->query($sql, array($total_stok, $kode_alat));

			if ($query->num_rows() > 0) {
				$data = $query->result_array();

				$remaining_total_stok = $total_stok;

				// Loop through the selected rows and update total_stok to 0
				foreach ($data as $row) {
					if ($remaining_total_stok > 0) {
						$serial_number = $row['serial_number'];
						$quantity_to_update = min($row['total_stok'], $remaining_total_stok);

						// Update total_stok for the current row
						$update_sql = "UPDATE packing_detail_masuk SET total_stok = total_stok - ? WHERE serial_number = ?";
						$this->db->query($update_sql, array($quantity_to_update, $serial_number));

						// Deduct the updated quantity from remaining_total_stok
						$remaining_total_stok -= $quantity_to_update;
					} else {
						break; // Keluar dari loop jika remaining_total_stok telah habis
					}
				}

				$this->db->trans_complete(); // Complete the transaction

				return $data;
			} else {
				return [];
			}
		} catch (Exception $e) {
			echo 'Error: ' . $e->getMessage();
			$this->db->trans_rollback(); // Rollback the transaction on error
		}
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

	// public function tambahDetailPengiriman($data){
		// return $this->db->insert_batch($this->_table4, $data);
	// }


	public function tambahDetailPengiriman($data_detail_terima){
		$this->db->trans_start(); // Start a database transaction

		// Insert data into _table4
		$insert_result = $this->db->insert_batch($this->_table4, $data_detail_terima);

		// Get serial_numbers from the inserted data in _table4
		$inserted_serial_numbers = array_column($data_detail_terima, 'serial_number');

		// Delete rows in _table2 with serial_numbers that exist in _table4
		$this->db->where_in('serial_number', $inserted_serial_numbers)
				 ->delete('packing_detail_masuk');

		$this->db->trans_complete(); // Complete the transaction

		return $insert_result;
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
		return $this->db->query("SELECT * from packing_detail_masuk WHERE kode_transaksi='$kode_transaksi' and keterangan ='' ORDER BY nama_shift")->result(); 
	}
	
	public function lihat_no_terima_detail1($kode_transaksi){ 
		return $this->db->query("SELECT * from packing_detail_masuk WHERE keterangan=''")->result(); 
	}
	
	public function updateKeterangan($id_detail, $keterangan, $kode_transaksi) {
        // Memperbarui keterangan di tabel packin_detail_masuk berdasarkan id_detail
        $data = array(
            'keterangan' => $keterangan,
			'kode_kirim' => $kode_transaksi
        );

        $this->db->where('id_detail', $id_detail);
        $this->db->update('packing_detail_masuk', $data);
    }
		
	public function updateKeteranganBatch($id_detail, $keterangan, $kode_transaksi) {
		// Memperbarui keterangan di tabel packing_detail_masuk berdasarkan id_detail dan kode_transaksi
		$data = array(
			'keterangan' => $keterangan,
			'kode_kirim' => $kode_transaksi
		);

		//$this->db->where('kode_kirim', $kode_transaksi);
		$this->db->where_in('id_detail', $id_detail); // Menggunakan where_in untuk mengizinkan banyak id_detail
		$this->db->update('packing_detail_masuk', $data);
	}

	
	public function hapusKeterangan($id_detail, $keterangan) {
        // Memperbarui keterangan di tabel packin_detail_masuk berdasarkan id_detail
        $data = array(
            'keterangan' => $keterangan,
			'kode_kirim' => $kode_transaksi
        );

        $this->db->where('id_detail', $id_detail);
        $this->db->update('packing_detail_masuk', $data);
    }
	
		
	public function hapusKeteranganBatch($id_detail, $keterangan) {
        // Memperbarui keterangan di tabel packin_detail_masuk berdasarkan id_detail
        $data = array(
            'keterangan' => $keterangan,
			'kode_kirim' => $kode_transaksi
        );

        $this->db->where_in('id_detail', $id_detail);
        $this->db->update('packing_detail_masuk', $data);
    }

	// public function lihat_no_terima_detailPengiriman($kode_transaksi){ 
		// return $this->db->query("SELECT * from packing_detail_keluar WHERE kode_transaksi='$kode_transaksi' ORDER BY nama_shift")->result(); 
	// }
	public function lihat_no_terima_detailPengiriman($kode_transaksi){ 
		return $this->db->query("SELECT * from packing_detail_masuk WHERE kode_kirim='$kode_transaksi' ORDER BY nama_shift")->result(); 
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

	public function tambahKembalikan($data){
		return $this->db->insert($this->_table2, $data);
    }

	public function jumlahMasuk(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}
	
	public function jumlahDetailMasuk(){
		$query = $this->db->get($this->_table2);
		return $query->num_rows();
	}
	
	public function stok_alat_packing(){
		$query = $this->db->query("SELECT * FROM packing_masteralat");
        $hasil = $query->result();
        return $hasil;
	}
	
	public function stok_alat(){
		$query = $this->db->query("
			SELECT nama_alat, serial_number, kode_transaksi, tanggal, kode_alat, COUNT(*) as total_kemunculan
			FROM packing_detail_masuk
			GROUP BY tanggal, kode_alat
		");
		
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
	
	public function kembalikan($data) {
        return $this->db->insert('packing_detail_masuk', $data);
    }
	
	// Fungsi untuk menghapus data dari packing_detail_keluar berdasarkan kondisi tertentu
	public function hapusDataKeluar($data) {
		$this->db->where($data);
		$result = $this->db->delete('packing_detail_keluar');
		
		// Add some debugging
		if (!$result) {
			echo $this->db->last_query(); // Print the last executed query
			echo $this->db->error(); // Print any database errors
		}
		
		return $result;
	}

    public function kurangiTotalStokByKodeAlat($kode_alat) {
        $this->db->set('total_stok', 'total_stok - 1', FALSE); // Mengurangkan total_stok sebanyak 1
        $this->db->where('kode_alat', $kode_alat);
        $this->db->update('packing_masteralat'); // Ganti 'packing_masteralat' dengan nama tabel yang sesuai
    }
	
    public function kurangiTotalStokInTable1($kode_alat) {
        // Mengurangkan total_stok di _table1
        $this->db->set('total_stok', 'total_stok - 1', FALSE); // Mengurangkan total_stok sebanyak 1
        $this->db->where('kode_alat', $kode_alat);
        $this->db->update('packing_masteralat');
    }
	
	public function tambahTotalStokByKodeAlat($kode_alat) {
        $this->db->set('total_stok', 'total_stok + 1', FALSE); // Mengurangkan total_stok sebanyak 1
        $this->db->where('kode_alat', $kode_alat);
        $this->db->update('packing_masteralat'); // Ganti 'packing_masteralat' dengan nama tabel yang sesuai
    }
	
	public function tambahTotalStokInTable1($kode_alat) {
        // Mengurangkan total_stok di _table1
        $this->db->set('total_stok', 'total_stok + 1', FALSE); // Mengurangkan total_stok sebanyak 1
        $this->db->where('kode_alat', $kode_alat);
        $this->db->update('packing_masteralat');
    }
}