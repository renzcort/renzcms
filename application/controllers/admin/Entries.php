<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entries extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->session_data = $this->auth->logged_in();
		$this->load->model('admin/Section_m', 'section');
		$this->load->model('admin/Field_m', 'field');
		$this->load->model('admin/Entries_m', 'entries');
		$this->load->model('admin/Group_m', 'group');
    $keyword = array_keys($this->input->get());
    foreach ($keyword as $key => $value) {
      if (in_array($value, array('id'))) {
        $this->keys = $value;
        $this->val = $this->input->get($value);
      }
    }

	}

	public function index(){
		$data['session_data']	=	$this->session_data;
		
		$data['id_section']     = $this->val;
		$data['getAllSection']  = $this->section->getAll();
		$data['getSectionById'] = $this->section->getDataById($this->val);
		$data['nameSection']    = strtolower($data['getSectionById']->name);
   	$data['title']	=	'List '.ucfirst($data['nameSection']);
		$data['action']	=	'admin/entries';
		$action =	$data['action'];

		$uri_segment    = 4;
		$data['offset'] = ($this->uri->segment(4)) ? $this->uri->segment(4):'0';
			//Penomoran baris data
		$offset = $this->uri->segment($uri_segment);
		//Penomoran baris data
		$i = 0 + $offset;
    $allrecord = $this->entries->record_count($this->val);
    $baseurl =  base_url().'frontend/product/group/?'.$this->keys.'='.$this->val;

    $paging=array();
    $paging['i'] = 0 + $offset;
    $paging['base_url'] =$baseurl;
    $paging['total_rows'] = $allrecord;
    $paging['per_page'] = 5;
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
    $paging['use_page_numbers'] = TRUE;
    $paging['page_query_string'] = TRUE;
  	$paging['enable_query_strings'] = TRUE;
    $paging['query_string_segment'] = 'page';
   	$data['offset'] = ($this->input->get('page')) ? ( ( $this->input->get('page') - 1 ) * $paging["per_page"] ) : 0;
    $this->pagination->initialize($paging);
		$data['i'] = 0 + $offset;
    $data['limit'] = $paging['per_page'];
    $data['number_page'] = $paging['per_page'];         
    $data['nav'] = $this->pagination->create_links();
    $data['total_rows'] = $allrecord;
  	$data["getAllEntries"] = $this->entries->fetch_data($this->val, $data['limit'],$data['offset']);

		$data['getFieldByIdSection'] = $this->group->getFieldByIdSection($this->val);
		$data['fields'] = $this->db->list_fields('renzcms_entries');
		$data['getGroupByIdSection'] = $this->group->getGroupByIdSection($this->val);
		// $data['getEntriesBySection'] = $this->entries->getEntriesBySection($id_section);

		$data['content']	=	$data['action'].'/index';
		$this->load->view('admin/layout/default', $data);
	}

	public function create() {
    $segment = $this->uri->segment(3);
    $data['id_section'] = $this->val;
		$data['session_data']	=	$this->session_data;
    $data['segment']  = $segment;
   	$data['title']		=	'List '.ucfirst($this->uri->segment(3)); 
		$data['action']		=	'admin/'.$this->uri->segment(2);
		$action   = $data['action'];
		$config['upload_path']  = './assets/upload/'.$segment.'/';
		$data['filepath']	      =	base_url('assets/upload/'.$segment.'/');	

		$data['getAllSection'] = $this->section->getAll();
		foreach ($data['getAllSection'] as  $key) {
			if ($segment == strtolower($key->name)) {
				$id_section = $key->id; 
			}
		}

		$data['getGroupByIdSection'] = $this->group->getGroupByIdSection($id_section);
		$data['getAllField']  = $this->field->getAll();
		$data['id_section']   = $id_section;

		if (isset($_POST['submit'])) {
			$config['allowed_types']	=	'gif|jpg|png';
			$this->load->library('upload');
			$this->upload->initialize($config);

			$this->form_validation->set_rules('title', 'Title', 'required');
			if ($this->form_validation->run() == TRUE) {
				// check if there is form entries
				foreach($_POST as $key => $value){
					if (!in_array($key, array('submit'))) {
             			$keys[] = $key;
             			$values[] = $this->input->post($key);
					}
				}
				$data = array_combine($keys, $values);
        $data['created_by'] = $this->session_data->id;
        $data['updated_by'] = $this->session_data->id;
        $data['created_at'] = date('Y-m-d');
        $data['updated_at'] = date('Y-m-d');
	            
      	if ($this->upload->do_upload('field_photo')) {
      		$photo = $this->upload->data();
					$data['field_photo'] = $photo['file_name'];
				}
				$this->entries->create($data);
				$this->session->set_flashdata('message', 'Data Success added');
				redirect($action.'/?id='.$id_section);
			} else {
				$this->session->set_flashdata('message', 'Data Invalid');
				redirect($action.'/'.$segment.'/create');
			}
		}
		
		$data['content']	=	$data['action'].'/create';
		$this->load->view('admin/layout/default', $data);
	}


	public function update($id) {
    $segment = $this->uri->segment(3);
    $data['session_data'] = $this->session_data;
    $data['segment']  = $segment;
    $data['title']    = 'List '.ucfirst($this->uri->segment(3)); 
    $data['action']   = 'admin/'.$this->uri->segment(2);
    $action   = $data['action'];
    $config['upload_path']  = './assets/upload/'.$segment.'/';
    $data['filepath']       = base_url('assets/upload/'.$segment.'/');  

		$data['getAllSection'] = $this->section->getAll();
		foreach ($data['getAllSection'] as  $key) {
			if ($segment == strtolower($key->name)) {
				$id_section = $key->id; 
			}
		}

		$data['getGroupByIdSection'] = $this->group->getGroupByIdSection($id_section);
		$data['getAllField'] = $this->field->getAll();
		$data['id_section'] = $id_section;
		$data['getDataById'] = $this->entries->getDataById($id);

		if (isset($_POST['submit'])) {
			$config['allowed_types']	=	'gif|jpg|png';
			$this->load->library('upload');
			$this->upload->initialize($config);

			$this->form_validation->set_rules('title', 'Title', 'required');
			if ($this->form_validation->run() == TRUE) {
				// check if there is form entries
				foreach($_POST as $key => $value){
					if (!in_array($key, array('submit'))) {
             			$keys[] = $key;
             			$values[] = $this->input->post($key);
					}
				}
				$data = array_combine($keys, $values);
	            
            	if ($this->upload->do_upload('field_photo')) {
            		$photo = $this->upload->data();
					$data['field_photo'] = $photo['file_name'];
				}
				$this->entries->update($id, $data);
				$this->session->set_flashdata('message', 'Data Success added');
				redirect($action.'/?id='.$id_section);
			} else {
				$this->session->set_flashdata('message', 'Data Invalid');
				redirect($action.'/'.$segment.'/edit/'.$id);
			}
		}
		
		$data['content']	=	$data['action'].'/edit';
		$this->load->view('admin/layout/default', $data);
	}

	public function delete($id){
		$data['session_data']	=	$this->session_data;
		
		$segment 			=	$this->segment_3;
		$data['segment']	=	$segment;
       	$data['title']		=	'List '.ucfirst($segment) ;
		$data['action']		=	'admin/'.$this->segment_2;
		$action 			=	$data['action'];

		$data['getAllSection'] = $this->section->getAll();
		foreach ($data['getAllSection'] as  $key) {
			if ($segment == strtolower($key->name)) {
				$id_section = $key->id; 
			}
		}
		$data['getDataById']	=	$this->entries->getDataById($id);
		$getDataById = $data['getDataById'];

		$getFile = $config['upload_path'].$getDataById->field_photo;
		unlink($getFile);
		$delete - $this->entries->delete($id);

		$this->session->set_flashdata('message', 'Delete Success');
		redirect($action.'/?id='.$id_section);
	}

}

/* End of file General.php */
/* Location: ./application/controllers/admin/General.php */