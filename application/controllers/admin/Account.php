<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('admin/Users_m', 'users');
		$this->load->model('admin/Role_m', 'role');
		$this->load->model('admin/Section_m', 'section');
		$this->session_data = $this->auth->logged_in();
		$this->segment_2 = $this->uri->segment('2');
		$this->segment_3 = $this->uri->segment('3');
	}

	public function index(){
		$data['session_data'] = $this->session_data;
		$data['getAllSection'] = $this->section->getAll();
		$role = $data['session_data']->role;
		$segment 			=	$this->segment_2;
		$data['segment']	=	$segment;
       	$data['title']		=	'List '.ucfirst($segment) ;
		$data['action']		=	'admin/'.$segment;
		$action 			=	$data['action'];
		
		$uri_segment = 3;
        $data['offset'] = ($this->uri->segment(3)) ? $this->uri->segment(3):'0';	
		//Penomoran baris data
		$offset = $this->uri->segment($uri_segment);
		//Penomoran baris data
		$i = 0 + $offset;
    	$allrecord = $this->users->record_count($role);
        $baseurl =  base_url().$data['action'];
        $paging=array();
        $paging['i'] = 0 + $offset;
        $paging['base_url'] =$baseurl;
        $paging['total_rows'] = $allrecord;
        $paging['per_page'] = 2;
        $paging['uri_segment']= $uri_segment;
        $paging['num_links'] = 2;
        $paging['first_link'] = 'First';
        $paging['first_tag_open'] = '<li>>';
        $paging['first_tag_close'] = '</li>';
        $paging['num_tag_open'] = '<li>';
        $paging['num_tag_close'] = '</li>';
        $paging['prev_link'] = 'Prev';
        $paging['prev_tag_open'] = '<li>';
        $paging['prev_tag_close'] = '</li>';
        $paging['next_link'] = 'Next';
        $paging['next_tag_open'] = '<li>';
        $paging['next_tag_close'] = '</li>';
        $paging['last_link'] = 'Last';
        $paging['last_tag_open'] = '<li>';
        $paging['last_tag_close'] = '</li>';
        $paging['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
        $paging['cur_tag_close'] = '</a></li>';
        $this->pagination->initialize($paging);
		$data['i'] = 0 + $offset;
        $data['limit'] = $paging['per_page'];
        $data['number_page'] = $paging['per_page'];         
        $data['nav'] = $this->pagination->create_links(); 
    	$data["getAll"] = $this->users->fetch_data($role, $data['limit'],$data['offset']);	
		
		$data['content']	=	$data['action'].'/index';
		$this->load->view('admin/layout/default', $data);				
	}

	public function create() {
		$data['session_data'] = $this->session_data;
		$data['getAllSection'] = $this->section->getAll();
		$segment 			=	$this->segment_2;
		$data['segment']	=	$segment;
       	$data['title']		=	'List '.ucfirst($segment) ;
		$data['action']		=	'admin/'.$segment;
		$config['upload_path'] =	'./assets/upload/'.$segment.'/';
		$data['filepath']	=	base_url('assets/upload/'.$segment);	
		$action 			=	$data['action'];
		$data['role']		=	$this->role->getAll();

		if(isset($_POST['submit'])) {
			$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[32]|is_unique[renzcms_users.username]',
				array(
					'required'	=>	"You Have not provided %s",
					'is_unique'	=>	"This %s already exist",
				)
			);
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[renzcms_users.email]');
			$this->form_validation->set_rules('firstname', 'Firstname', 'required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'required');

			$config['allowed_types']	=	'gif|jpg|png';
			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->form_validation->run() == TRUE) {
				$data = array(
						'username' 	=>	$this->input->post('username'),
						'password' 	=>	md5($this->input->post('password')),
						// $passconf	=	$this->input->post('passconf'),
						'email' 	=>	$this->input->post('email'),
						'firstname' =>	$this->input->post('firstname'),
						'lastname'	=>	$this->input->post('lastname'),
						'role'		=>	$this->input->post('role'),
						'created_at' =>	date('Y-m-d', strtotime(now()))
				);

				if ($this->upload->do_upload('photo')) {
					$photo = $this->upload->data();
					$data['photo'] = $photo['file_name'];
				} else {
					$photo = $this->upload->display_errors();
				}

				$this->users->create($data);
				$this->session->set_flashdata('message', 'Data Success Added');
				redirect($action);
			} else {
				$this->session->set_flashdata('message', 'Data Invalid');
				redirect($action.'/create');
			}		
		} else {

			$data['content']	=	$data['action'].'/create'; 
			$this->load->view('admin/layout/default', $data);		
		}
	}

	public function update($id) {
		$data['session_data'] = $this->session_data;
		$data['getAllSection'] = $this->section->getAll();
		$segment 			=	$this->segment_2;
		$data['segment']	=	$segment;
       	$data['title']		=	'List '.ucfirst($segment) ;
		$data['action']		=	'admin/'.$segment;
		$config['upload_path'] =	'./assets/upload/'.$segment.'/';
		$data['filepath']	=	base_url('assets/upload/'.$segment);	
		$action 			=	$data['action'];
		$data['role']		=	$this->role->getAll();
		$data['getDataById'] 	= $this->users->getDataById($id);
		$getDataById = $data['getDataById'];

		if(isset($_POST['submit'])) {
			if($this->input->post('username') != $data['getDataById']->username || $this->input->post('email') != $data['getDataById']->email )
			{
				$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[32]|is_unique[renzcms_users.username]',
					array(
						'required'	=>	"You Have not provided %s",
						'is_unique'	=>	"This %s already exist",
					)
				);
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[renzcms_users.email]');
			}
			if($this->input->post('new-password')) {
				$this->form_validation->set_rules('password', 'Password', 'required');
				$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
				$data['password'] = md5($this->input->post('new-password'));
			}

			$this->form_validation->set_rules('firstname', 'Firstname', 'required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'required');

			$config['allowed_types']	=	'gif|jpg|png';
			$this->load->library('upload');
			$this->upload->initialize($config);
			
			if ($this->form_validation->run() == TRUE) {
				$data = array(
						'username' 	=>	$this->input->post('username'),
						'password' 	=>	md5($this->input->post('new-password')),
						// $passconf	=	$this->input->post('passconf'),
						'email' 	=>	$this->input->post('email'),
						'firstname' =>	$this->input->post('firstname'),
						'lastname'	=>	$this->input->post('lastname'),
						'role'		=>	$this->input->post('role'),
						'created_at' =>	date('Y-m-d', strtotime(now()))
				);

				if ($this->upload->do_upload('photo')) {
					$getFile = $config['upload_path'].$getDataById->photo;
					unlink($getFile);
					$photo = $this->upload->data();
					$data['photo'] = $photo['file_name'];
				} else {
					$photo = $this->upload->display_errors();
				}

				$this->users->update($id, $data);
				$this->session->set_flashdata('message', 'Data Success Updated');
				redirect($action);

			} else {
				$this->session->set_flashdata('message', 'Invalid Data');
				redirect($action.'/update/'.$id);
			}		
		} else {
			$data['content']	=	$data['action'].'/edit'; 
			$this->load->view('admin/layout/default', $data);		
		}
	}

	public function delete($id) {	
		$data['session_data'] 	= $this->session_data;	
		$segment 			=	$this->segment_2;
		$data['segment']	=	$segment;
       	$data['title']		=	'List '.ucfirst($segment) ;
		$data['action']		=	'admin/'.$segment;
		$config['upload_path'] =	'./assets/upload/backend/'.$segment.'/';
		$data['filepath']	=	base_url('assets/upload/backend/'.$segment);	
		$action 			=	$data['action'];

		$data['getDataById']	=	$this->users->getDataById($id);
		$getDataById = $data['getDataById'];
		$getFile = $config['upload_path'].$getDataById->photo;
		unlink($getFile);

		$delete - $this->users->delete($id);
		$this->session->set_flashdata('message', 'Delete Success');
		redirect($action);
	}

}

/* End of file Account.php */
/* Location: ./application/controllers/admin/Account.php */