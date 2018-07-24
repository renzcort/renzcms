<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->session_data = $this->auth->logged_in();
		$this->load->model('admin/General_m', 'general');
		$this->load->model('admin/Section_m', 'section');
		$this->load->model('admin/Field_m', 'field');
		$this->load->model('admin/Entries_m', 'entries');
		$this->load->model('admin/Group_m', 'group');

		$this->segment_2 = $this->uri->segment('2');
		$this->segment_3 = $this->uri->segment('3');
		$this->segment_4 = $this->uri->segment('4');
	}

	public function index(){
		$data['session_data']	=	$this->session_data;
		if(empty($this->segment_4)) {
			var_dump('tes1');
			$uri_segment = 4;
			$data['offset'] = ($this->uri->segment(4)) ? $this->uri->segment(4):'0';
			$segment 			=	$this->segment_3;
		   	$data['title']		=	'List '.ucfirst($this->segment_2).' '.ucfirst($segment);
			$data['action']		=	'admin/'.$this->segment_2.'/'.$segment;
			$config['upload_path'] =	'./assets/upload/backend/'.$this->segment_2.'/'.$segment.'/';
			$data['filepath']	=	base_url('assets/upload/backend/'.$this->segment_2.'/'.$segment.'/');
		} else {
			if (in_array($this->segment_3, array('create', 'update', 'edit', 'delete'))) {
				var_dump('tes2');
				$uri_segment = 3;
				$data['offset'] = ($this->uri->segment(3)) ? $this->uri->segment(3):'0';
				$segment 			=	$this->segment_2;
		       	$data['title']		=	'List '.ucfirst($segment) ;
				$data['action']		=	'admin/'.$segment;
				$config['upload_path'] =	'./assets/upload/backend/'.$segment.'/';
				$data['filepath']	=	base_url('assets/upload/backend/'.$segment.'/');	
			} else {
				var_dump('tes3');
				$uri_segment = 4;
				$data['offset'] = ($this->uri->segment(4)) ? $this->uri->segment(4):'0';
				$segment 			=	$this->segment_3;
			   	$data['title']		=	'List '.ucfirst($this->segment_2).' '.ucfirst($segment);
				$data['action']		=	'admin/'.$this->segment_2.'/'.$segment;
				$config['upload_path'] =	'./assets/upload/backend/'.$this->segment_2.'/'.$segment.'/';
				$data['filepath']	=	base_url('assets/upload/backend/'.$this->segment_2.'/'.$segment.'/');
			}
		}
		
		$data['segment']	=	$segment;
       	$action 			=	$data['action'];

		//Penomoran baris data
		$offset = $this->uri->segment($uri_segment);
		//Penomoran baris data
		$i = 0 + $offset;
    	$allrecord = $this->$segment->record_count();
        $baseurl =  base_url().$data['action'];
        
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
        $this->pagination->initialize($paging);
		$data['i'] = 0 + $offset;
        $data['limit'] = $paging['per_page'];
        $data['number_page'] = $paging['per_page'];         
        $data['nav'] = $this->pagination->create_links();    
        $data['total_rows'] = $allrecord;

		$data['getAllSection'] = $this->section->getAll();
		$data['getAllField'] = $this->field->getAll();
    	$data["getAll"] = $this->$segment->fetch_data($data['limit'],$data['offset']);			

		// $data['getAll'] 	= 	$this->$segment->getAll();

		$data['content']	=	$data['action'].'/index';
		$this->load->view('admin/layout/default', $data);
	}

	public function create() {
		$data['session_data']	=	$this->session_data;
		if (empty($this->segment_3) || in_array($this->segment_3, array('create', 'edit', 'update', 'delete'))) {
			$segment 			=	$this->segment_2;
	       	$data['title']		=	'List '.ucfirst($segment) ;
			$data['action']		=	'admin/'.$segment;
			$config['upload_path'] =	'./assets/upload/backend/'.$segment.'/';
			$data['filepath']	=	base_url('assets/upload/backend/'.$segment.'/');	
		} else {
			$segment 			=	$this->segment_3;
	       	$data['title']		=	'List '.ucfirst($this->segment_2).' '.ucfirst($segment);
			$data['action']		=	'admin/'.$this->segment_2.'/'.$segment;
			$config['upload_path'] =	'./assets/upload/backend/'.$this->segment_2.'/'.$segment.'/';
			$data['filepath']	=	base_url('assets/upload/backend/'.$this->segment_2.'/'.$segment.'/');
		}
		$data['segment']	=	$segment;
		$action 			=	$data['action'];
		$data['getAllSection'] = $this->section->getAll();
		$data['getAllField'] = $this->field->getAll();
		$data['getAll'] = 	$this->$segment->getAll();

		if (isset($_POST['submit'])) {
			// $filename = $_FILES['photo']['name'];
			$config['allowed_types']	=	'gif|jpg|png';
			$this->load->library('upload');
			$this->upload->initialize($config);

			$this->form_validation->set_rules('name', 'Name', 'required');
			if ($this->form_validation->run() == TRUE) {				
				// SECTION PAGE
				if ($segment == 'section') {
					$data = array(	
						'name'			=>	$this->input->post('name'),
						'type' 			=> 	$this->input->post('type'),
						'description'	=>	$this->input->post('description'),
						'slug'			=>	url_title(strtolower($this->input->post('name'))),
						'created_by'	=>	$data['session_data']->id,
						'updated_by'	=>	$data['session_data']->id,
						'created_at'	=>	date('Y-m-d H:i:s'),
						'updated_at'	=>	date('Y-m-d H:i:s'),
					);
				} elseif ($segment == 'field') {
					$data = array(	
						'name'			=>	'field_'.str_replace(' ', '_', strtolower($this->input->post('name'))),
						'label' 		=> 	$this->input->post('name'),
						'type' 			=> 	$this->input->post('type'),
						'slug'			=>	url_title(strtolower($this->input->post('name'))),
						'created_by'	=>	$data['session_data']->id,
						'updated_by'	=>	$data['session_data']->id,
						'created_at'	=>	date('Y-m-d H:i:s'),
						'updated_at'	=>	date('Y-m-d H:i:s'),
					);
				} elseif($segment == 'group') {
					$data = array(	
						'id_section'	=>	$this->input->post('section'),
						'id_field'		=>	$this->input->post('field'),
					);
				} else {
					$entries = array();
					foreach($_POST as $key => $value){
						if (!in_array($key, array('entries', 'name', 'submit'))) {
						    // $data[$key] = $this->entries->input->post($key);
                 			$keys[] = $key;
                 			$values[] = $this->input->post($key);
						}
					}
   					$data = array_combine($keys, $values);
				}

				if($segment == 'field') {
					$column = array(
						'name'	=>	'field_'.str_replace(' ', '_', strtolower($this->input->post('name'))),
						'type'	=>	$this->input->post('type'),
					);
					if ($column['type'] == 'INT') {
						$column['constraint'] = 11;
					} elseif($column['type'] == 'VARCHAR') {
						$column['constraint'] = 255;
					} else {
						$column['constraint'] = '';
					}
					// add column in entries
					$this->entries->alterAddColumn($column);
				}
				$this->$segment->create($data);
				
				$this->session->set_flashdata('message', 'Data Success added');
				redirect($action);
			} else {
				$this->session->set_flashdata('message', 'Data Invalid');
				redirect($action.'/create');
			}
		}
		
		$data['content']	=	$data['action'].'/create';
		$this->load->view('admin/layout/default', $data);
	}


	public function update($id) {
		$data['session_data']	=	$this->session_data;
		if (empty($this->segment_3) || in_array($this->segment_3, array('create', 'edit', 'update', 'delete'))) {
			$segment 			=	$this->segment_2;
	       	$data['title']		=	'List '.ucfirst($segment) ;
			$data['action']		=	'admin/'.$segment;
			$config['upload_path'] =	'./assets/upload/backend/'.$segment.'/';
			$data['filepath']	=	base_url('assets/upload/backend/'.$segment.'/');	
		} else {
			$segment 			=	$this->segment_3;
	       	$data['title']		=	'List '.ucfirst($this->segment_2).' '.ucfirst($segment);
			$data['action']		=	'admin/'.$this->segment_2.'/'.$segment;
			$config['upload_path'] =	'./assets/upload/backend/'.$this->segment_2.'/'.$segment.'/';
			$data['filepath']	=	base_url('assets/upload/backend/'.$this->segment_2.'/'.$segment.'/');
		}
		$data['segment']	=	$segment;
		$action 			=	$data['action'];
		$data['getAllSection'] = $this->section->getAll();
		$data['getAllField'] = $this->field->getAll();
		$data['getAll'] = 	$this->$segment->getAll();
		$data['getDataById']	=	$this->$segment->getDataById($id);
		$getDataById = $data['getDataById'];
		
		if (isset($_POST['submit'])) {
			$config['allowed_types']	=	'gif|jpg|png';
			$this->load->library('upload');
			$this->upload->initialize($config);

			$this->form_validation->set_rules('name', 'Name', 'required');
			if ($this->form_validation->run() == TRUE) {
				// check if there is form entries
				if ($segment == 'section') {
					$data = array(	
						'name'			=>	$this->input->post('name'),
						'type' 			=> 	$this->input->post('type'),
						'description'	=>	$this->input->post('description'),
						'slug'			=>	url_title(strtolower($this->input->post('name'))),
						'created_by'	=>	$data['session_data']->id,
						'updated_by'	=>	$data['session_data']->id,
						'created_at'	=>	date('Y-m-d H:i:s'),
						'updated_at'	=>	date('Y-m-d H:i:s'),
					);
				} elseif ($segment == 'field') {
					$data = array(	
						'name'			=>	'field_'.str_replace(' ', '_', strtolower($this->input->post('name'))),
						'label' 		=> 	$this->input->post('name'),
						'type' 			=> 	$this->input->post('type'),
						'slug'			=>	url_title(strtolower($this->input->post('name'))),
						'created_by'	=>	$data['session_data']->id,
						'updated_by'	=>	$data['session_data']->id,
						'created_at'	=>	date('Y-m-d H:i:s'),
						'updated_at'	=>	date('Y-m-d H:i:s'),
					);
				} elseif($segment == 'group') {
					$data = array(	
						'id_section'	=>	$this->input->post('section'),
						'id_field'		=>	$this->input->post('field'),
					);
				} else {
					$entries = array();
					foreach($_POST as $key => $value){
						if (!in_array($key, array('entries', 'name', 'submit'))) {
						    // $data[$key] = $this->entries->input->post($key);
                 			$keys[] = $key;
                 			$values[] = $this->input->post($key);
						}
					}
   					$data = array_combine($keys, $values);
				}

				if($segment == 'field') {
					$column = array(
						'old_name' => strtolower($getDataById->name),
						'name'	=>	'field_'.str_replace(' ', '_', strtolower($this->input->post('name'))),
						'type'	=>	$this->input->post('type'),
					);
					if ($column['type'] == 'INT') {
						$column['constraint'] = 11;
					} elseif($column['type'] == 'VARCHAR') {
						$column['constraint'] = 255;
					} else {
						$column['constraint'] = '';
					}

					if ($column['old_name'] != $column['name']) {
						$fields = $this->db->list_fields('renzcms_entries');
						if (in_array($column['old_name'], $fields)) {
							$this->entries->alterChangeColumn($column);
						}
					}
				}
				
				$this->$segment->update($id, $data);
				$this->session->set_flashdata('message', 'Data Success added');
				redirect($action);
			} else {
				$this->session->set_flashdata('message', 'Invalid Data');
				redirect($action.'/edit/'.$id);
			}
		}
		
		$data['content']	=	$data['action'].'/edit'; 
		$this->load->view('admin/layout/default', $data);
	}

	public function delete($id){
		$data['session_data']	=	$this->session_data;
		
		if (empty($this->segment_3) || in_array($this->segment_3, array('create', 'edit', 'update', 'delete'))) {
			$segment 			=	$this->segment_2;
	       	$data['title']		=	'List '.ucfirst($segment) ;
			$data['action']		=	'admin/'.$segment;
			$config['upload_path'] =	'./assets/upload/backend/'.$segment.'/';
			$data['filepath']	=	base_url('assets/upload/backend/'.$segment.'/');	
		} else {
			$segment 			=	$this->segment_3;
	       	$data['title']		=	'List '.ucfirst($this->segment_2).' '.ucfirst($segment);
			$data['action']		=	'admin/'.$this->segment_2.'/'.$segment;
			$config['upload_path'] =	'./assets/upload/backend/'.$this->segment_2.'/'.$segment.'/';
			$data['filepath']	=	base_url('assets/upload/backend/'.$this->segment_2.'/'.$segment.'/');
		}
		$data['segment']	=	$segment;
		$action 			=	$data['action'];
		$data['getDataById']	=	$this->$segment->getDataById($id);
		$getDataById = $data['getDataById'];

		if($segment == 'field') {
			$column = array(
				'name' => strtolower($data['getDataById']->name),
			);
			$fields = $this->db->list_fields('renzcms_entries');
			foreach ($fields as $field){
				if($field == $column['name']){
					$this->entries->alterDropColumn($column);
				}
			}
			$id_field = $id;
			$delete - $this->group->deleteByIdField($id_field);
		} elseif($segment == 'section') {
			$id_section = $id;
			$delete - $this->group->deleteByIdSection($id_section);
		} 

		$delete - $this->$segment->delete($id);
		$this->session->set_flashdata('message', 'Delete Success');
		redirect($action);
	}

}

/* End of file General.php */
/* Location: ./application/controllers/admin/General.php */