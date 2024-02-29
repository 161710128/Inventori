<?php
class M_barang_admin extends CI_Model{
	protected $_table = 'tabl_komponen';
	protected $_table1 = 'tbl_barang';
	protected $_table2 = 'tbl_pengambilan_hnfc01';
	public $kode_barang;

	public function lihat(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	// public function lihat_barang(){
		
	// 	$this->db->order_by("nama_barang","desc"); 
    //     return $this->db->get('tbl_barang')->row();
	// }

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_stok_komponen(){
		$query = $this->db->get_where($this->_table);
		return $query->result();
	}

	public function lihat_id($kode_barang){
		$query = $this->db->get_where($this->_table, ['kode_barang' => $kode_barang]);
		return $query->row();
	}

	public function lihat_nama_barang($kode_barang){
		$query = $this->db->select('*');
		$query = $this->db->where(['kode_barang' => $kode_barang]);
		$query = $this->db->get($this->_table);
		return $query->row();
	}

	

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
    }
    
    // public function tambah_pengambilan($data){
	// 	return $this->db->insert_batch($this->_table2, $data);
    // }
    
	public function plus_stok($total_stok, $kode_barang){
		$query = $this->db->set('total_stok', 'total_stok+' . $total_stok, false);
		$query = $this->db->where('kode_barang', $kode_barang); 
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function min_stok($total_stok, $kode_barang){
		$query = $this->db->set('total_stok', 'total_stok-' . $total_stok, false);
		$query = $this->db->where('kode_barang', $kode_barang); 
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function ubah($data, $kode_barang){
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_barang' => $kode_barang]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($kode_barang){
		return $this->db->delete($this->_table, ['kode_barang' => $kode_barang]);
    }
    
    // public function hapus_pengambilan($id_pengambilan){
	// 	return $this->db->delete($this->_table2, ['id_pengambilan' => $id_pengambilan]);
	// }

	public function cekkodebarang()
    {
        $query = $this->db->query("SELECT MAX(kode_barang) as kodebarang from tabl_komponen");
        $hasil = $query->row();
        return $hasil->kodebarang;
	}

	public function tampil_komponen(){
		$query = $this->db->get_where($this->_table, 'total_stok > 0');
		return $query->result();
	}

	// public function tampil_barang(){
	// 	$query = $this->db->get_where($this->_table1);
	// 	return $query->result();
	// }

	// public function get_arduino_NV3()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Arduino Nano V3'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_capasitor_100uF()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Capasitor Polar 100uF 40V'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }
	
	// public function get_IC_Regulator_L7805()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'IC Regulator L7805'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }
	
	// public function get_IC_Regulator_L7809()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'IC Regulator L7809'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Resistor_2K_ohm()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Resistor 2K ohm 1/4W'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }
	
	// public function get_Resistor_10K_ohm()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Resistor 10K ohm 1/4W'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_LED_3mm()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'LED 3mm'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Transistor_2N2222()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Transistor 2N2222'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Connector_Molex_2Pin()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Connector Molex 2 Pin'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Connector_Molex_3Pin()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Connector Molex 3 Pin'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Connector_Molex_4Pin()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Connector Molex 4 Pin'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Header_Female_1x16()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Header Female 1x16'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Power_Supply_12V_5A()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Power Supply 12V/5A'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Fuse_3A()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Fuse 3A'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_LED_5mm()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'LED 5mm'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// } 

	// public function get_Push_Button_OnOff_Stainless()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Push Button On/Off Stainless'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Potensio_10K()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Potensio 10K'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_ads1115()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'ads1115'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
    // }

	// public function get_Module_Display_Nextion35()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Module Display Nextion 3.5'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Stepdown_DCtoDC()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Stepdown DC to DC'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// } 

	// public function get_Cable_Power_3Pin_18m()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Cable Power 3 Pin 1,8 m'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Cable_awg22_Merah()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Cable awg 22 Merah'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Cable_awg22_Hitam()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Cable awg 22 Hitam'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Cable_awg22_Biru()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Cable awg 22 Biru'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Cable_awg22_Kuning()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Cable awg 22 Kuning'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Cable_pelangi_10pin()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Cable pelangi 10 pin'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Connector_AC_3pin_Fuse()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Connector AC 3 pin + Fuse'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Mounting_Cable()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Mounting Cable'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Heat_Sharink_2mm()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Heat Sharink 2 mm'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Heat_Shrink_4mm()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Heat Shrink 4 mm'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Nitecore_37V_3400mAh()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Nitecore 3.7V 3400 mAh'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_BMS_Module_3Cell()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'BMS Module 3 Cell'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Plat_Nikel()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Plat Nikel'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Holder_Battery()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Holder Battery'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function Flow_HNFC_PCB()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Flow HNFC PCB'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Flowmeter_GAIMC_GFS131()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Flowmeter GAIMC GFS131'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Oxygen_Sensor()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Oxygen Sensor'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Diode_IN_4007()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Diode IN 4007'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Spacer_1cm()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Spacer 1 cm'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function get_Header_Female_1x10()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Header Female 1x10'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }
	
	// public function get_Resistor_220Ohm()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Resistor 220 Ohm'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }
	
	// public function get_Resistor_2k2_Ohm()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Resistor 2k2 Ohm 1/4 Watt'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }
	
	// public function get_Dioda_6A()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Dioda 6A'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }
	
	// public function get_Knob_Potensio()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Knob Potensio'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }
	
	// public function get_Nitto_Tape()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Nitto Tape'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }
	
	// public function get_Timah_03mm()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Timah 0.3 mm'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }
	
	// public function get_3M_DoubleTape_Merah()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', '3M Double Tape Merah'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }
	
	// public function get_Seal_Tape()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Seal Tape'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }
	
	// public function get_Timah_06mm()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Timah 0.6 mm'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }
	
	// public function get_Connector_Push_Button()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Connector Push Button'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }
	
	// public function get_Terminal_Molex()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Terminal Molex'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }
	
	// public function get_Selang_Spiral()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Selang Spiral'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }
	
	// public function get_Buzzer_24Volt()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Buzzer 24 Volt'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }
	
	// public function get_Twistie()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Twistie'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }
	
	// public function get_Header_1x40()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Header 1x40'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }
	
	// public function get_Capasitor_Polar_100uF_35V()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Capasitor Polar 100uF 35V'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }
	
	// public function get_Fuse_5A()
    // {
    //     $this->db->select('total_stok');
    //     $this->db->from('tbl_komponen');
    //     $this->db->where('nama_komponen', 'Fuse 5A'); 
    //     $this->db->where('id_barang', '1'); 
    //     $query = $this->db->get();
    //     $result = $query->row();
    //     return $result->total_stok;
	// }

	// public function hnfc01()
    // {
    //     $query = $this->db->query("SELECT * FROM `tbl_komponen` WHERE keterangan ='hnfc01'");
    //     $hasil = $query->result();
	// 	return $hasil; 
	// }






	
	

}