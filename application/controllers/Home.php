<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public MyParser $myparser;

	public function __construct()
	{
		parent::__construct();

		$this->load->library('MyParser');
	}

	public function index()
	{
		$file = file_exists(FCPATH . '/NGEDOL.md');
		$content = '';

		if ($file) {
			$content = file_get_contents(FCPATH . '/NGEDOL.md');
			$content = $this->myparser->parse($content);
		}

		$this->load->view('home', [
			'content' => trim($content),
		]);
	}
}
