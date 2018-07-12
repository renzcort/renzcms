<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic herep
		$this->load->model('admin/Users_m', 'users');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$userdata = $this->session->userdata('logged_in');
			redirect(base_url().'admin/home', 'refresh');
		} else {	
			$data['content'] = 'admin/login'; 
			$this->load->view('admin/layout/login-template', $data);
		}	
	}

	public function cek_login() {
		if($this->input->post('sign-in')) {
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run()== TRUE) {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$result = $this->users->checkLogin($username, $password);
				if($result) {
					$session_data = $result;
					$this->session->set_userdata('logged_in', $session_data);
					redirect(base_url().'admin/home', 'refresh');
				} else {
					$this->session->set_flashdata('message', 'Invalid Username and Password');
					redirect('admin/login');	
				}
			} else {
				$this->session->set_flashdata('message', 'Fill Username and Password');
				redirect('admin/login');
			}
		} 
	}

	public function signup(){
		if($this->input->post('create')) {
			$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[32]|is_unique[users.username]',
				array(
					'required'	=>	"You Have not provided %s",
					'is_unique'	=>	"This %s already exist",
				)
			);
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

			if ($this->form_validation->run() == TRUE) {
				$data = array(
						'username' 	=>	$this->input->post('username'),
						'password' 	=>	md5($this->input->post('password')),
						// $passconf	=	$this->input->post('passconf'),
						'email' 	=>	$this->input->post('email'),
						'firstname' =>	$this->input->post('firstname'),
						'lastname'	=>	$this->input->post('lastname'),
						'created_at' =>	date('Y-m-d', strtotime(now()))
				);

				$this->users->signUp($data);
				redirect('admin/login', 'refresh');

			} else {
				$this->session->set_flashdata('message', 'Invalid Data');
				redirect('admin/login/signUp');
			}		
		} else {
			$data['content'] = 'admin/sign-up'; 
			$this->load->view('admin/layout/login-template', $data);	
		}	
	}

	public function signOut() {
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect(base_url().'admin/login');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/admin/Login.php */