<?php

class Login extends CI_Controller{ 
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta'); 
		$this->load->model('M_elektro', 'm_elektro');
		$this->load->model('M_pengguna', 'm_pengguna');
		$this->load->model('M_mekanik', 'm_mekanik');
		$this->load->model('M_admin', 'm_admin');
		$this->load->model('M_admin', 'm_admin');
		$this->load->model('M_supervisor', 'm_supervisor');
		$this->load->model('M_manager', 'm_manager');
		$this->load->model('M_quality_control', 'm_quality'); 
		
	
		
	}

	public function index(){
	     unset($_SESSION['success']); 
		$this->load->view('login'); 
	}

	public function proses_login(){
		if($this->input->post('role') === 'elektro') $this->_proses_login_petugas($this->input->post('username'));
		elseif($this->input->post('role') === 'super') $this->_proses_login_super($this->input->post('username'));
		elseif($this->input->post('role') === 'mekanik') $this->_proses_login_mekanik($this->input->post('username'));
		elseif($this->input->post('role') === 'admin') $this->_proses_login_admin($this->input->post('username'));
		elseif($this->input->post('role') === 'supervisor') $this->_proses_login_supervisor($this->input->post('username'));
		elseif($this->input->post('role') === 'manager') $this->_proses_login_manager($this->input->post('username'));
		elseif ($this->input->post('role') === 'quality') $this->_proses_login_quality($this->input->post('username'));
		elseif ($this->input->post('role') === 'produksi') $this->_proses_login_produksi($this->input->post('username'));
		elseif ($this->input->post('role') === 'packing') $this->_proses_login_packing($this->input->post('username'));
		elseif ($this->input->post('role') === 'pemesanan') $this->_proses_login_pemesanan($this->input->post('username'));
		elseif ($this->input->post('role') === 'gudang_bahan_tools') $this->_proses_login_gudang_bahantools($this->input->post('username'));
		else {
			?> 
			<?php
			redirect('login');
		}
	}

	protected function _proses_login_gudang_bahantools($username)
	{
		$get_pengguna = $this->m_mekanik->lihat_username($username);
		if ($get_pengguna) {
			if ($get_pengguna->password == $this->input->post('password')) {
				$session = [
					'kode' => $get_pengguna->kode,
					'nama' => $get_pengguna->nama,
					'username' => $get_pengguna->username,
					'password' => $get_pengguna->password,
					'role' => $this->input->post('role'),
					'jam_masuk' => date('H:i:s')
				];

				$this->session->set_userdata('login', $session);
			//	$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');

				redirect('GudangBahanTools/DashboardGB_Tools');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}

	protected function _proses_login_pemesanan($username)
	{
		$get_pengguna = $this->m_pengguna->lihat_username_pemesanan($username);
		if ($get_pengguna) {
			if ($get_pengguna->password == $this->input->post('password')) {
				$session = [
					'kode' => $get_pengguna->kode,
					'nama' => $get_pengguna->nama,
					'username' => $get_pengguna->username,
					'password' => $get_pengguna->password,
					'role' => $this->input->post('role'),
					'jam_masuk' => date('H:i:s')
				];

				$this->session->set_userdata('login', $session);
			//	$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');

				redirect('PemesananBarang/DashboardPemesanan');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}

	protected function _proses_login_packing($username)
	{
		$get_pengguna = $this->m_pengguna->lihat_usernamePacking($username);
		if ($get_pengguna) {
			if ($get_pengguna->password == $this->input->post('password')) {
				$session = [
					'kode' => $get_pengguna->kode,
					'nama' => $get_pengguna->nama,
					'username' => $get_pengguna->username,
					'password' => $get_pengguna->password,
					'role' => $this->input->post('role'),
					'jam_masuk' => date('H:i:s')
				];

				$this->session->set_userdata('login', $session);
				//$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');

				redirect('Packing/DashboardPacking');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}

	protected function _proses_login_produksi($username)
	{
		$get_pengguna = $this->m_pengguna->lihat_usernameProduksi($username);
		if ($get_pengguna) {
			if ($get_pengguna->password == $this->input->post('password')) {
				$session = [
					'kode' => $get_pengguna->kode,
					'nama' => $get_pengguna->nama,
					'username' => $get_pengguna->username,
					'password' => $get_pengguna->password,
					'role' => $this->input->post('role'),
					'jam_masuk' => date('H:i:s')
				];

				$this->session->set_userdata('login', $session);
			//	$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');

				redirect('Produksi/DashboardProduksi');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}

	protected function _proses_login_quality($username)
	{
		$get_pengguna = $this->m_quality->lihat_username($username);
		if ($get_pengguna) {
			if ($get_pengguna->password == $this->input->post('password')) {
				$session = [
					'kode' => $get_pengguna->kode,
					'nama' => $get_pengguna->nama,
					'username' => $get_pengguna->username,
					'password' => $get_pengguna->password,
					'role' => $this->input->post('role'),
					'jam_masuk' => date('H:i:s')
				];

				$this->session->set_userdata('login', $session);
				//$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
				redirect('QualityControl/DashboardQc');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}
	
	protected function _proses_login_supervisor($username){
		$get_supervisor = $this->m_supervisor->lihat_username($username);
		if($get_supervisor){
			if($get_supervisor->password == $this->input->post('password')){
				$session = [
					'kode' => $get_supervisor->kode,
					'nama' => $get_supervisor->nama,
					'username' => $get_supervisor->username,
					'password' => $get_supervisor->password,
					'role' => $this->input->post('role'),
					'jam_masuk' => date('H:i:s')
				];

				$this->session->set_userdata('login', $session);
				//$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
				redirect('PurchasingElektro/DashboardElektro');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}

	protected function _proses_login_manager($username){
		$get_mekanik = $this->m_manager->lihat_username($username);
		if($get_mekanik){
			if($get_mekanik->password == $this->input->post('password')){
				$session = [
					'kode' => $get_mekanik->kode,
					'nama' => $get_mekanik->nama,
					'username' => $get_mekanik->username,
					'password' => $get_mekanik->password,
					'role' => $this->input->post('role'),
					'jam_masuk' => date('H:i:s')
				];

				$this->session->set_userdata('login', $session);
				//$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
				redirect('PurchasingMekanik/DashboardMekanik');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}
	
	protected function _proses_login_mekanik($username){
		$get_mekanik = $this->m_mekanik->lihat_username($username);
		if($get_mekanik){
			if($get_mekanik->password == $this->input->post('password')){
				$session = [
					'kode' => $get_mekanik->kode,
					'nama' => $get_mekanik->nama,
					'username' => $get_mekanik->username,
					'password' => $get_mekanik->password,
					'role' => $this->input->post('role'),
					'jam_masuk' => date('H:i:s')
				];

				$this->session->set_userdata('login', $session);
				//$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
				redirect('PurchasingMekanik/DashboardMekanik');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}

	protected function _proses_login_petugas($username){
		$get_petugas = $this->m_elektro->lihat_username($username);
		if($get_petugas){
			if($get_petugas->password == $this->input->post('password')){
				$session = [
					'kode' => $get_petugas->kode,
					'nama' => $get_petugas->nama,
					'username' => $get_petugas->username,
					'password' => $get_petugas->password,
					'role' => $this->input->post('role'),
					'jam_masuk' => date('H:i:s')
				];

				$this->session->set_userdata('login', $session);
			//	$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
				redirect('PurchasingElektro/DashboardElektro');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}

	protected function _proses_login_super($username){
		$get_pengguna = $this->m_pengguna->lihat_username($username);
		if($get_pengguna){
			if($get_pengguna->password == $this->input->post('password')){
				$session = [
					'kode' => $get_pengguna->kode,
					'nama' => $get_pengguna->nama,
					'username' => $get_pengguna->username,
					'password' => $get_pengguna->password,
					'role' => $this->input->post('role'),
					'jam_masuk' => date('H:i:s')
				];

				$this->session->set_userdata('login', $session);
			//	$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
				redirect('purchasingElektro/DashboardElektro');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}

	protected function _proses_login_admin($username){
		$get_pengguna = $this->m_admin->lihat_username($username);
		if($get_pengguna){
			if($get_pengguna->password == $this->input->post('password')){
				$session = [
					'kode' => $get_pengguna->kode,
					'nama' => $get_pengguna->nama,
					'username' => $get_pengguna->username,
					'password' => $get_pengguna->password,
					'role' => $this->input->post('role'),
					'jam_masuk' => date('H:i:s')
				];

				$this->session->set_userdata('login', $session);
			//	$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
				redirect('DashboardAdmin');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}
}