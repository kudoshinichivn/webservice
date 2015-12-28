<?php


class EmployeeController extends BaseController{

	public function index()
	{
		

		if (Input::has("json_data")) 
		{

			$json_data=Input::get("json_data");

			$data=json_decode($json_data);
			try {

				$login = $data->login;
				$method = $data->method;
				$section = $data->section;
				$where = $data->where;
				$detail_data = $data->data;

				if(User::getLogin($login)!="[]")
				{
					if($method=="login")
					{
						$arr=array(
									"method"=>$method,
									"section"=>"user",
									"data"=>$login
									);
								return json_encode($arr);
					}
					if($method=="get")
					{
						if($section=="employee")
						{
							if($where=="")
							{
								$arr=array(
									"method"=>$method,
									"section"=>$section,
									"data"=>Employee::all()
									);
								return json_encode($arr);
							}
							else
							{
								$arr=array(
									"method"=>$method,
									"section"=>$section,
									"data"=>Employee::getEmployee($where)
									);
								return json_encode($arr);
							}
						}
						
					}
					if($method=="append")
					{
						if($section=="employee")
						{
							if(Employee::checkEmployee($detail_data->eid)=="")
							{
								Employee::appendEmployee($detail_data);
								$arr=array(
										"method"=>$method,
										"section"=>$section,
										"data"=>"Success"
										);
								return json_encode($arr);
							}
							else
							{
								$arr=array(
										"method"=>$method,
										"section"=>$section,
										"data"=>"Fail, Duplicate EID"
										);
								return json_encode($arr);
							}
						}

					}
					if($method=="update")
					{
						if($section=="employee")
						{
							if(Employee::checkEmployee($detail_data->eid)!="")
							{
								Employee::updateEmployee($detail_data);
								$arr=array(
										"method"=>$method,
										"section"=>$section,
										"data"=>"Success"
										);
								return json_encode($arr);
							}
							else
							{
								$arr=array(
										"method"=>$method,
										"section"=>$section,
										"data"=>"Fail, Wrong EID"
										);
								return json_encode($arr);
							}
						}

					}
					if($method=="remove")
					{
						if($section=="employee")
						{
							try {
								foreach ($where as $value) {
									Employee::removeEmployee($value);
								}
								$arr=array(
											"method"=>$method,
											"section"=>$section,
											"data"=>"Success"
											);
									return json_encode($arr);
								
							} catch (Exception $e) {
								return "Error: Can't remove, Employee is using!";
							}
							
						}

					}
				}
				else
					return "Error: Login fail!";
				

					
				
			} catch (Exception $e) {
				return "Error: JsonData is not correct!".$e;
			}
			

		}
		else
			return "Error: JsonData not found!";
	}
	
	



}