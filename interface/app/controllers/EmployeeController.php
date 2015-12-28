<?php

class EmployeeController extends BaseController{

	public function index()
	{
		$json_data=Input::get("json_data");

		
		try {

			$data=json_decode($json_data);
			$method = $data->method;
			$section = $data->section;
			$detail_data = $data->data;

			if($method=="get")
			{
				if($section=="employee")
				{
					if($detail_data!=array())
					{
						return View::make('employee',array('data'=>$detail_data));
					}
					else
					{
						return View::make('notfound');
					}
				}
				
			}
			if($method=="login")
			{	
				$_SESSION['login']=$detail_data;
				return View::make('redirect');

			}
			if($method=="append" || $method=="update" ||$method=="remove")
			{
				if($section=="employee")
				{
					if($detail_data!=array())
					{
						return $detail_data;
					}
					else
					{
						return View::make('notfound');
					}
				}
			}

			
			

				
			
		} catch (Exception $e) {
			return $json_data;
		}	
		
			
	}
	

}