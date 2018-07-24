<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sample extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    	$this->load->model('admin/Field_m', 'field');

		//Do your magic here
		//
		// $this->session_data = $this->auth->logged_in();
	}

	public function index()
	{
		$data['session_data']	=	$this->session_data;
		$data['content']	=	'sample';
		$this->load->view('admin/layout/default', $data);	
	}

  public function paging() {
    $this->load->library('pagination');
    $config['base_url'] = base_url('sample/paging');
    $config['total_rows'] = 200;
    $config['per_page'] = 20;
    $this->pagination->initialize($config);
    echo $this->pagination->create_links();
  }

  public function listjs(){
    $data['field'] = $this->field->getAll();
    $this->load->view('test', $data);
  }
}

/* End of file Sample.php */
/* Location: ./application/controllers/Sample.php */