<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}


	// Auth Masyarakat

	public function index()
	{
		// cek setup admin
		$check = $this->db->get('petugas')->num_rows();
		if ($check == 0) {

			redirect('setup_admin');
		}
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {

			// Gagal validasi

			$this->load->view('auth/v_firman_login');
		} else {

			// Lolos validasi
			$this->_login();
		}
	}


	public function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$masyarakat = $this->db->get_where('masyarakat', ['username' => $username])->row_array();

		// jika usernya ada


		if ($masyarakat) {

			// cek password
			if (password_verify($password, $masyarakat['password'])) {

				$data = [
					'username' => $username,
					'nama_lengkap' => $masyarakat,
					'nik' => $masyarakat
				];
				$this->session->set_userdata($data);
				if ($masyarakat['is_active'] == 'active') {
					redirect('dashboard_masyarakat');
				} elseif ($masyarakat['is_active'] == 'not_active') {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			This Account has been banned!
		  	</div>');
					redirect('login');
				}
			} else {
				
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Username tidak terdaftar !
		  	</div>');
			redirect('Auth');
		}
	}


	public function registrasi()
	{
		$this->form_validation->set_rules('nama_lengkap', 'Nama_lengkap', 'required|trim');
		$this->form_validation->set_rules('nik', 'Nik', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password tidak sesuai!',
			'min_length' => 'password terlalu pendek!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {

			$this->load->view('auth/v_firman_registrasi');
		} else {
			$data = [
				'nik' => htmlspecialchars($this->input->post('nik', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'telepon' => htmlspecialchars($this->input->post('telepon', true)),
			];

			$this->db->insert('masyarakat', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat anda sudah daftar, Silahkan login!</div>');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('nama_lengkap');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda sudah keluar, Silahkan login!</div>');
		redirect('login');
	}





	// Auth Petugas


	public function login_petugas()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {

			// Gagal validasi

			$this->load->view('admin_auth/v_firman_loginadmin');
		} else {

			// Lolos validasi
			$this->_loginadmin();
		}
	}


	public function _loginadmin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$petugas = $this->db->get_where('petugas', ['username' => $username])->row_array();

		// jika usernya ada


		if ($petugas) {

			// cek password
			if (password_verify($password, $petugas['password'])) {

				$data = [
					'username' => $username,
					'nama_petugas' => $petugas,
					'level'    => $petugas
				];


				$this->session->set_userdata($data);
				if ($petugas['level'] == 'admin') {
					redirect('dashboard_admin');
				} else if ($petugas['level'] == 'petugas') {
					redirect('dashboard_petugas');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Password Salah !
		  	</div>');
				redirect('Auth/login_petugas');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Username tidak terdaftar !
		  	</div>');
			redirect('Auth/login_petugas');
		}
	}


	public function registrasi_admin()
	{

		$this->load->model('M_firman_Admin');
		$this->form_validation->set_rules('nama_petugas', 'Nama_petugas', 'required|trim');
		$this->form_validation->set_rules('telpon', 'Telpon', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('level', 'Level', 'required|trim');

		$tambahPetugas = [
			'username' => htmlspecialchars($this->input->post('username', true)),
			'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'telpon' => htmlspecialchars($this->input->post('telpon', true)),
			'level' => htmlspecialchars($this->input->post('level', true)),
		];

		$this->M_firman_Admin->insertPetugas($tambahPetugas);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat anda sudah daftar, Silahkan login!</div>');
		redirect('petugas_admin');
	}

	public function logout_admin()
	{
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda sudah keluar, Silahkan login!</div>');
		redirect('login_admin');
	}


	// Setup Administrator
	public function setup_admin()
	{
		$this->load->model('M_firman_Admin');
		$this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]', [
			'matches' => 'password dont match !'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		$this->form_validation->set_rules('telpon', 'telpon', 'required|trim');


		if ($this->form_validation->run() == false) {
			$this->load->view('admin_auth/v_firman_setupadmin');
		} else {

			$tambahAdmin = array(
				'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'telpon' => htmlspecialchars($this->input->post('telpon', true)),
				'level' => 'admin'
			);

			$this->M_firman_Admin->insertAdmin($tambahAdmin);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Congratulation your account has been created !
		  	</div>');
			redirect('C_firman_Auth/login_petugas');
		}
	}
}
