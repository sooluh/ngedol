<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public CI_Input $input;
	public CI_Output $output;
	public CI_Upload $upload;
	public Users_model $users;
	public CI_Session $session;
	public CI_Security $security;
	public CI_Form_validation $form_validation;
	public $userdata;

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('logged')) {
			return redirect('auth/login');
		}

		$this->load->model('Users_model', 'users');

		$id = $this->session->userdata('userid');
		$this->userdata = $this->users->find($id);
	}
}
