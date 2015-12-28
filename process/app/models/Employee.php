<?php


class Employee extends Eloquent{

	protected $table = 'employees';
	public $timestamps = false;

	public static function checkEmployee($key)
	{
		
		$data=Employee::where('eid','=',$key)
						->get();
		return $data;
	} 
	public static function getEmployee($key)
	{
		
		$data=Employee::where('eid','=',$key)
						->orwhere('ename','like','%'.$key.'%')
						->orwhere('eemail','like','%'.$key.'%')
						->get();
		return $data;
	} 

	public static function appendEmployee($data)
	{
		
		Employee::insert(array(
					'eid'=>$data->eid,
					'ename'=>$data->ename,
					'ebirth'=>$data->ebirth,
					'egender'=>$data->egender,
					'etel'=>$data->etel,
					'eemail'=>$data->eemail,
					'eaddress'=>$data->eaddress,
					'dcode'=>$data->dcode,
					'rcode'=>$data->rcode,
				));

	}
	public static function removeEmployee($data)
	{
		
		Employee::where('eid', '=', $data)->delete();
		
	}  
	public static function updateEmployee($data)
	{
		
		Employee::where('eid', '=', $data->eid)->update(array(
					'ename'=>$data->ename,
					'ebirth'=>$data->ebirth,
					'egender'=>$data->egender,
					'etel'=>$data->etel,
					'eemail'=>$data->eemail,
					'eaddress'=>$data->eaddress,
					'dcode'=>$data->dcode,
					'rcode'=>$data->rcode,
				));
		
	}  

}
