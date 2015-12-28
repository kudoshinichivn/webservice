<?php


class Employee extends Eloquent{

	protected $table = 'employees';
	public $timestamps = false;
	protected $primaryKey = 'eid';
	protected $fillable=array(
					'eid',
					'ename',
					'ebirth',
					'egender',
					'etel',
					'eemail',
					'eaddress',
					'dcode',
					'rcode',
				);

	public static function checkEmployee($key)
	{
		
		$data=Employee::find($key);
		return $data;
	} 
	
	public static function appendEmployee($data)
	{
		
		Employee::create(array(
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
		
		Employee::destroy($data);
		
	}  
	public static function updateEmployee($data)
	{
		
		Employee::find($data->eid)->update(array(
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
	public static function getEmployee($key)
	{
		
		$data=Employee::where('eid','=',$key)
						->orwhere('ename','like','%'.$key.'%')
						->orwhere('eemail','like','%'.$key.'%')
						->get();
		return $data;
	} 
  

}
