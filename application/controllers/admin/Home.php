<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->check_session();
		$this->session_data = $this->auth->logged_in();
		$this->load->model('admin/Section_m', 'section');

	}

	public function index()
	{
		$data['getAllSection'] = $this->section->getAll();
		$data['session_data'] = $this->session_data;
		$data['content'] = 'admin/home';
		$this->load->view('admin/layout/default', $data);	
	}

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */