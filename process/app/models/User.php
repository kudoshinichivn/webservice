<?php
class User extends Eloquent{

	protected $table = 'users';
	public $timestamps = false;

	public static function getLogin($data)
	{
		
		$data=User::where('user','=',$data->username)
						->where('pass','=',md5($data->password))
						->get();
		return $data;
	} 

	public static function addUser($data)
	{
		
		User::insert(array(
					'user'=>$data->username,
					'pass'=>$data->password,
					'eid'=>$data->eid,
					
				));

	}
	public static function removeUser($data)
	{
		
		User::where('user', '=', $data)->delete();
		
	}  
	public static function updateEmployee($data)
	{
		
		User::where('user', '=', $data->username)->update(array(
					'ename'=>$data->ename,
					'pass'=>$data->password,
					'eid'=>$data->eid,
				));
		
	}
}