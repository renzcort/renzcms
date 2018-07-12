<?php
/**
 * @author   Natan Felles <natanfelles@gmail.com>
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Migration_create_table_users
 *
 * @property CI_DB_forge         $dbforge
 * @property CI_DB_query_builder $db
 */
class Migration_create_table_renzcms_users extends CI_Migration {


	protected $table = 'renzcms_users';
	public function up()
	{
		$fields = array(
			'id'	=> [
				'type'          =>	'INT',
				'constraint'	=>	'11',
				'auto_increment'=>	TRUE,
				'unsigned'      =>	TRUE,
				'null'			=>	FALSE
			],
			'id_group'	=> [
				'type'        	=>	'INT',
				'constraint'	=>	'11',
				'unsigned'     	=>	TRUE,
				'null'			=>	TRUE
			],
			'username'	=>	[
				'type'		=>	'VARcHAR',
				'constraint'=>	'255',
				'null' 		=>	TRUE,
			],
			'email'	=> [
				'type'		=> 	'VARCHAR',
				'constraint'=>	'255',
				'unique'	=>	TRUE,
				'null' 		=>	TRUE,
			],
			'password'	=> [
				'type'		=>	'VARCHAR',
				'constraint'=>	'64',
				'null' 		=>	TRUE,
			],
			'firstname'	=> [
				'type' 		=>	'VARCHAR',
				'constraint'=>	'255',
				'null' 		=>	TRUE,
			],
			'lastname'	=> [
				'type'		=>	'VARCHAR',
				'constraint'=>	'255',
				'null' 		=>	TRUE,
			],
			'photo'   => [
				'type' 		=>	'VARCHAR',
				'constraint'=>	'255',
				'null' 		=>	TRUE,
			],
			'activation_code'	=> [
				'type' 		=>	'VARCHAR',
				'constraint'=>	'255',
				'null' 		=>	TRUE,
			],
			'forgotten_password_code'	=> [
				'type'		=>	'VARCHAR',
				'constraint'=>	'255',
				'null' 		=>	TRUE,
			],
			'forgotten_password_time'	=> [
				'type' 		=>	'INT',
				'constraint'=>	'11',
				'null' 		=>	TRUE,
			],
			'remember_code'	=> [
				'type' 		=>	'VARCHAR',
				'constraint'=>	'255',
				'null' 		=>	TRUE,
			],
			'actived'	=> [
				'type' 		=>	'tinyint',
				'constraint'=>	'1',
				'null' 		=>	TRUE,
			],
			'last_login'	=> [
				'type'	=> 'DATETIME',
			],
			'created_by'	=>	[
				'type'		=>	'INT',
				'constraint'=>	'11',
			],
			'updated_by'	=>	[
				'type'		=>	'INT',
				'constraint'=>	'11',
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


	public function down()
	{
		if ($this->db->table_exists($this->table))
		{
			$this->dbforge->drop_table($this->table);
		}
	}

}
