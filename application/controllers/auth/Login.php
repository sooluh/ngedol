<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public CI_Input $input;
	public Users_model $users;
	public CI_Session $session;
	public CI_Security $security;
	public CI_Form_validation $form_validation;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model', 'users');
	}

	public function index()
	{
		if ($this->session->userdata('logged')) {
			return redirect('app/products');
		}

		$csrf = [
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		];

		$this->load->view('auth/login', [
			'page' => 'Masuk',
			'csrf' => $csrf,
		]);
	}

	public function process()
	{
		$this->form_validation->set_rules([
			[
				'field' => 'login',
				'label' => 'Nama Pengguna',
				'rules' => 'required|alpha_numeric',
				'errors' => [
					'required' => 'Nama Pengguna tidak boleh kosong',
					'alpha_numeric' => 'Nama Pengguna tidak valid.',
				],
			],
			[
				'field' => 'password',
				'label' => 'Kata Sandi',
				'rules' => 'required',
				'errors' => [
					'required' => 'Kata Sandi tidak boleh kosong',
				],
			],
		]);

		if (!$this->form_validation->run()) {
			$this->session->set_flashdata('failed', array_shift($this->form_validation->error_array()));
			return redirect('auth/login');
		}

		$password = $this->input->post('password');
		$login = $this->input->post('login');
		$check = $this->users->findBy('login', $login);

		if (!$check) {
			$this->session->set_flashdata('failed', 'Nama pengguna tidak dapat ditemukan.');
			return redirect('auth/login');
		}

		if (!password_verify($password, $check->password)) {
			$this->session->set_flashdata('failed', 'Kata sandi tidak benar.');
			return redirect('auth/login');
		}

		$this->session->set_userdata([
			'logged' => true,
			'userid' => $check->id,
		]);

		$this->session->set_flashdata('success', 'Selamat datang kembali!');
		return redirect('app/products');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		return redirect('auth/login');
	}
}
