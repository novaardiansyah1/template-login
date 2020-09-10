<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Level extends Seeder
{
	public function run()
	{
		$data = [
		  [
        'level'      => 'admin',
        'created_at' => Time::now(),
        'updated_at' => Time::now()
		  ],
		  [
		    'level'      => 'user',
		    'created_at' => Time::now(),
        'updated_at' => Time::now()
		  ]
		];
		
		$this->db->table('level')->insertBatch($data);
	}
}
