<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_table_renzcms_group extends CI_Migration {
protected $table = 'renzcms_group';

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$fields = array(
			'id'	=>	[
				'type'				=>	'INT',
				'constraint'		=>	'11',
				'auto_increment'	=>	TRUE,
				'unsigned'			=>	TRUE,
                'null' 				=> 	FALSE,
			],
			'id_section'	=>	[
				'type' 				=>	'INT',
				'constraint'		=>	'11',
				'unsigned'			=>	TRUE,
			],
			'id_field'	=>	[
				'type' 				=>	'INT',
				'constraint'		=>	'11',
				'unsigned'			=>	TRUE,
			],
			'name'	=>	[
				'type'		=>	'VARcHAR',
				'constraint'=>	'255',
                'null' 		=> TRUE,
			],
			'description'	=>	[
				'type' 		=> 'TEXT',
                'null' 		=> TRUE,
			],
			'slug'			=> [
				'type'		=>	'VARcHAR',
				'constraint'=>	'255',
				'null'		=>	TRUE
			],
			'created_by'	=>	[
				'type'		=>	'INT',
				'constraint'=>	'11',
			],
			'updated_by'	=>	[
				'type'		=>	'INT',
				'constraint'	=>	'11',
			],
			'created_at'	=>	[
				'type'		=>	'DATETIME',
			],
			'updated_at'	=>	[
				'type'		=>	'DATETIME',
			]
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($this->table, TRUE);
	}

	public function down() {
		if ($this->db->table_exist($this->table)) {
			$this->dbforge->drop_table($this->table);
		}
	}

}

/* End of file 040_create_table_general_section_temp.php */
/* Location: ./application/migrations/040_create_table_general_section_temp.php */