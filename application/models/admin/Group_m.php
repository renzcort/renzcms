<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_m extends CI_Model {
	protected $_table = 'renzcms_group';

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
  
  public function getDataByIdSection($id_section){
		return $this->db->get_where($this->_table, array('id_section' => $id_section))->result();
  }

	public function deleteByIdField($id_field){
		$this->db->where('id_field', $id_field);
		$this->db->delete($this->_table);
	}
	
	public function deleteByIdSection($id_section){
		$this->db->where('id_section', $id_section);
		$this->db->delete($this->_table);
	}

	// Count all record of table "contact_info" in database.
	public function record_count() {
		$this->db->group_by('id_section');
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

	
   public function getFieldByIdSection($id_section) {
		$this->db->select('b.name as field, b.label as label');
		$this->db->from($this->_table.' a');
		$this->db->join('renzcms_field b', 'b.id = a.id_field', 'left');
		$this->db->where('a.id_section', $id_section);
		return $this->db->get()->result();
	}

	public function getGroupByIdSection($id_section) {
		$this->db->select('c.id as id_section, b.name as field, b.label, b.type as type_field, c.name as section, c.type as type_section');
		$this->db->from($this->_table.' a');
		$this->db->join('renzcms_field b', 'b.id = a.id_field', 'left');
		$this->db->join('renzcms_section c', 'c.id = a.id_section', 'left');
		$this->db->where('a.id_section', $id_section);
		return $this->db->get()->result();
	}

}

/* End of file Group_m.php */
/* Location: ./application/models/admin/Group_m.php */