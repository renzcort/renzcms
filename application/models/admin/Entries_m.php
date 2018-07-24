<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entries_m extends CI_Model {
	protected $_table = 'renzcms_entries';

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function getAll() {
		 return $hasil = $this->db->get($this->_table)->result();
	}

	public function create($data = array()){
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

// Count all record of table "contact_info" in database.
	public function record_count() {
		return $this->db->count_all($this->_table);
	}

	public function fetch_data($id_section, $limit, $start) {
		$this->db->where('id_section', $id_section);
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

	public function alterAddColumn($data) {
		if($data['type'] == 'VARCHAR' || $data['type'] == 'INT' ) {
			$addSql = $data['name'].' '.$data['type'].'('.$data['constraint'].')';
		} else {
			$addSql = $data['name'].' '.$data['type'];
		}
		$sql = "ALTER TABLE {$this->_table} ADD {$addSql}";
		$query = $this->db->query($sql);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function alterChangeColumn($data){
		if($data['type'] == 'VARCHAR' || $data['type'] == 'INT' ) {
			$addSql = $data['old_name'].' '.$data['name'].' '.$data['type'].'('.$data['constraint'].')';
		} else {
			$addSql = $data['name'].' '.$data['type'];
		}
		$sql = "ALTER TABLE {$this->_table} CHANGE {$addSql}";
		$query = $this->db->query($sql);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function alterDropColumn($data){
		$sql = "ALTER TABLE {$this->_table} DROP COLUMN {$data['name']}";
		$query = $this->db->query($sql);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	
}

/* End of file Entries_m.php */
/* Location: ./application/models/Entries_m.php */