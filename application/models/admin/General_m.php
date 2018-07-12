<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_m extends CI_Model {
	protected $_table = 'renzcms_general';
	
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

	public function update($id, $data) {
		$this->db->where('id', $id);
		$this->db->update($this->_table, $data);
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete($this->_table);
	}

	public function getAllActived() {
		return $this->db->get_where($this->_table, array('status' => 1))->result();
	}
	
	// Count all record of table "contact_info" in database.
	public function record_count() {
		return $this->db->count_all($this->_table);
	}

	public function fetch_data($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->_table);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
}

/* End of file General_m.php */
/* Location: ./application/models/admin/general/General_m.php */