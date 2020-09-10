<?php namespace App\Models;

use CodeIgniter\model;

class AuthModel extends Model
{
  protected $table         = 'users';
  protected $allowedFields = ['nama','username','password','level_id'];
  protected $useTimestamps = true;
	//--------------------------------------------------------------------//
	
	public function getAuth($username = null) 
	{
	  if($username !== null) {
  	  $builder = $this->db->table('users');
  	  return $builder->getWhere(['username' => $username])->getRowArray();
	  }
	  
	  return false;
	}
}