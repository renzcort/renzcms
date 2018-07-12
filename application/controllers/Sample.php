<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sample extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		//
		$this->session_data = $this->auth->logged_in();
	}

	public function index()
	{
		$data['session_data']	=	$this->session_data;
		$data['content']	=	'sample';
		$this->load->view('admin/layout/default', $data);	
	}

}

/* End of file Sample.php */
/* Location: ./application/controllers/Sample.php */