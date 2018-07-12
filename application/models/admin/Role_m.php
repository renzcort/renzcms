<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_m extends CI_Model {

	protected $_table = 'renzcms_role';
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function getAll() {
		 return $hasil = $this->db->get($this->_table)->result();
	}
	
	public function create($data){
		$this->db->insert($this->_table, $data);
	}

	public function getDataById($id) {
		return $this->db->get_where($this->_table, array('id' => $id))->row();
	}

	
	public function getDataByName($name) {
		return $this->db->get_where($this->_table, array('name' => $name))->row();
	}

	public function update($id, $data) {
		$this->db->where('id', $id);
		$this->db->update($this->_table, $data);
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete($this->_table);
	}
	

}

/* End of file Role_m.php */
/* Location: ./application/models/admin/Customize/Role_m.php */