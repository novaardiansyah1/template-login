<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
 	public function up()
	{
	  $this->forge->addField([
	    'id' => [
        'type'           => 'int',
        'unsigned'       => true,
        'auto_increment' => true
	    ],
	    'nama' => [
        'type'       => 'varchar',
        'constraint' => '60'
	    ],
	    'username' => [
        'type'       => 'varchar',
        'constraint' => '20'
	    ],
	    'password' => [
        'type'       => 'varchar',
        'constraint' => '255'
	    ],
	    'level_id' => [
        'type' => 'int'
	    ],
	    'created_at' => [
        'type' => 'datetime'
	    ],
	    'updated_at' => [
        'type' => 'datetime'
	    ],
	  ]);
	  
	  $this->forge->addKey('id', true);
	  $this->forge->addForeignKey('level_id','level','id');
	  $this->db->enableForeignKeyChecks();
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
