<?php

class DashboardAdmin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'super' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'DashboardAdmin';
		$this->load->model('m_barang_admin', 'm_barang_admin'); 
		$this->load->model('M_pengeluaran_admin', 'm_pengeluaran_admin');
		$this->load->model('M_penerimaan_admin', 'm_penerimaan_admin');
		$this->load->model('M_pengguna', 'm_pengguna');
		$this->load->model('M_unit_elektro', 'm_unit_elektro');
	}

	public function index(){
		$this->data['title'] = 'Halaman Dashboard Elektro';
		$this->data['jumlah_barang'] = $this->m_barang_admin->jumlah(); 
		$this->data['jumlah_pengeluaran'] = $this->m_pengeluaran_admin->jumlah();
		$this->data['jumlah_penerimaan'] = $this->m_penerimaan_admin->jumlah();
		// $this->data['jumlah_pengguna'] = $this->m_pengguna->jumlah(); 

		// $this->data['arduino'] = $this->m_barang_admin->get_arduino_NV3();
		// $this->data['capasitor_100uF'] = $this->m_barang_admin->get_capasitor_100uF();
		// $this->data['IC_Regulator_L7805'] = $this->m_barang_admin->get_IC_Regulator_L7805();
		// $this->data['IC_Regulator_L7809'] = $this->m_barang_admin->get_IC_Regulator_L7809();
		// $this->data['Resistor_2K_ohm'] = $this->m_barang_admin->get_Resistor_2K_ohm();
		// $this->data['Resistor_10K_ohm'] = $this->m_barang_admin->get_Resistor_10K_ohm();
		// $this->data['LED_3mm'] = $this->m_barang_admin->get_LED_3mm();
		// $this->data['Transistor_2N2222'] = $this->m_barang_admin->get_Transistor_2N2222();
		// $this->data['Connector_Molex_2Pin'] = $this->m_barang_admin->get_Connector_Molex_2Pin();
		// $this->data['Connector_Molex_3Pin'] = $this->m_barang_admin->get_Connector_Molex_3Pin();
		// $this->data['Connector_Molex_4Pin'] = $this->m_barang_admin->get_Connector_Molex_4Pin();
		// $this->data['Header_Female_1x16'] = $this->m_barang_admin->get_Header_Female_1x16();
		// $this->data['Power_Supply_12V_5A'] = $this->m_barang_admin->get_Power_Supply_12V_5A();
		// $this->data['Fuse_3A'] = $this->m_barang_admin->get_Fuse_3A();
		// $this->data['LED_5mm'] = $this->m_barang_admin->get_LED_5mm();
		// $this->data['Push_Button_OnOff_Stainless'] = $this->m_barang_admin->get_Push_Button_OnOff_Stainless();
		// $this->data['Potensio_10K'] = $this->m_barang_admin->get_Potensio_10K();
		// $this->data['ads1115'] = $this->m_barang_admin->get_ads1115();
		// $this->data['Module_Display_Nextion35'] = $this->m_barang_admin->get_Module_Display_Nextion35();
		// $this->data['Stepdown_DCtoDC'] = $this->m_barang_admin->get_Stepdown_DCtoDC();
		// $this->data['Cable_Power_3Pin_18m'] = $this->m_barang_admin->get_Cable_Power_3Pin_18m();
		// $this->data['Cable_awg22_Merah'] = $this->m_barang_admin->get_Cable_awg22_Merah();
		// $this->data['Cable_awg22_Hitam'] = $this->m_barang_admin->get_Cable_awg22_Hitam();
		// $this->data['Cable_awg22_Biru'] = $this->m_barang_admin->get_Cable_awg22_Biru();
		// $this->data['Cable_awg22_Kuning'] = $this->m_barang_admin->get_Cable_awg22_Kuning();
		// $this->data['Cable_pelangi_10pin'] = $this->m_barang_admin->get_Cable_pelangi_10pin();
		// $this->data['Connector_AC_3pin_Fuse'] = $this->m_barang_admin->get_Connector_AC_3pin_Fuse();
		// $this->data['Mounting_Cable'] = $this->m_barang_admin->get_Mounting_Cable();
		// $this->data['Heat_Sharink_2mm'] = $this->m_barang_admin->get_Heat_Sharink_2mm();
		// $this->data['Heat_Shrink_4mm'] = $this->m_barang_admin->get_Heat_Shrink_4mm();
		// $this->data['Nitecore_37V_3400mAh'] = $this->m_barang_admin->get_Nitecore_37V_3400mAh();
		// $this->data['BMS_Module_3Cell'] = $this->m_barang_admin->get_BMS_Module_3Cell();
		// $this->data['Plat_Nikel'] = $this->m_barang_admin->get_Plat_Nikel();
		// $this->data['Holder_Battery'] = $this->m_barang_admin->get_Holder_Battery();
		// $this->data['Flow_HNFC_PCB'] = $this->m_barang_admin->Flow_HNFC_PCB();
		// $this->data['Flowmeter_GAIMC_GFS131'] = $this->m_barang_admin->get_Flowmeter_GAIMC_GFS131();
		// $this->data['Oxygen_Sensor'] = $this->m_barang_admin->get_Oxygen_Sensor();
		// $this->data['Diode_IN_4007'] = $this->m_barang_admin->get_Diode_IN_4007();
		// $this->data['Spacer_1cm'] = $this->m_barang_admin->get_Spacer_1cm();
		// $this->data['Header_Female_1x10'] = $this->m_barang_admin->get_Header_Female_1x10();
		// $this->data['Resistor_220Ohm'] = $this->m_barang_admin->get_Resistor_220Ohm();
		// $this->data['Resistor_2k2_Ohm'] = $this->m_barang_admin->get_Resistor_2k2_Ohm();
		// $this->data['Dioda_6A'] = $this->m_barang_admin->get_Dioda_6A();
		// $this->data['Knob_Potensio'] = $this->m_barang_admin->get_Knob_Potensio();
		// $this->data['Nitto_Tape'] = $this->m_barang_admin->get_Nitto_Tape();
		// $this->data['Timah_03mm'] = $this->m_barang_admin->get_Timah_03mm();
		// $this->data['M3_DoubleTape_Merah'] = $this->m_barang_admin->get_3M_DoubleTape_Merah();
		// $this->data['Seal_Tape'] = $this->m_barang_admin->get_Seal_Tape();
		// $this->data['Timah_06mm'] = $this->m_barang_admin->get_Timah_06mm();
		// $this->data['Connector_Push_Button'] = $this->m_barang_admin->get_Connector_Push_Button();
		// $this->data['Terminal_Molex'] = $this->m_barang_admin->get_Terminal_Molex();
		// $this->data['Selang_Spiral'] = $this->m_barang_admin->get_Selang_Spiral();
		// $this->data['Buzzer_24Volt'] = $this->m_barang_admin->get_Buzzer_24Volt();
		// $this->data['Twistie'] = $this->m_barang_admin->get_Twistie();
		// $this->data['Header_1x40'] = $this->m_barang_admin->get_Header_1x40();
		// $this->data['Capasitor_Polar_100uF_35V'] = $this->m_barang_admin->get_Capasitor_Polar_100uF_35V();
		// $this->data['Fuse_5A'] = $this->m_barang_admin->get_Fuse_5A();

		
		

		
		

		$this->load->view('dashboard/Admin/admin', $this->data);
	} 
}