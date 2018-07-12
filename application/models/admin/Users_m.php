<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_m extends CI_Model {
	protected $_table = 'renzcms_users';

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}	

	public function checkLogin($username, $password) {
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));

		$hasil = $this->db->get();
		if ($hasil->num_rows() == 1) {
			$row = $hasil->row_object();
			$sql = "UPDATE {$this->_table} SET last_login = ? WHERE id = ? LIMIT 1";
			$this->db->query($sql, array(
				date('Y-m-d H:m:s', strtotime('now')),
				$row->id
			));

			return $hasil->row();
		} else {
			return false;
		}
	}

	public function signUp($data) {
		$this->db->insert($this->_table, $data);
	}


	public function getAll() {
		 return $hasil = $this->db->get($this->_table)->result();
	}

	public function getAllByRole($role){
		return $hasil = $this->db->get_where($this->_table, array('role' => $role))->result();
	}

	public function create($data){
		$this->db->insert($this->_table, $data);
	}

	public function getDataById($id) {
		return $this->db->get_where($this->_table, array('id' => $id))->row();
	}

	public function update($id, $data) {
		$this->db->where('id', $id);
		$this->db->update($this->_table, $data);
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete($this->_table);
		return $this->db->affected_rows();
	}
	// Count all record of table "contact_info" in database.
	public function record_count($role) {
	 	if($role != 1) {
			$this->db->where('role', $role);
	 	}
		return $this->db->count_all($this->_table);
	}

	 public function fetch_data($role, $limit, $start) {
	 	if($role != 1) {
			$this->db->where('role', $role);
	 	}
        $this->db->limit($limit, $start);
        return $this->db->get($this->_table)->result();
   }
	

}

/* End of file Users_m.php */
/* Location: ./application/models/admin/Users_m.php */