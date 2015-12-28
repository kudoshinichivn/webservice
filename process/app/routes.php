<?php
//header("Content-type: text/plain");
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','EmployeeController@index');
Route::post('/','EmployeeController@index');

Route::get('/test',function()
{
	
$login=array(
		'username'=>'admin',
		'password'=>'123456',
	);

$condition=array(
	'field'=>'eid',
	'compare'=>'=',
	'value'=>'1'
	);
$data=array();


$arr=array(
	'login'=>$login,
	'method'=>'get',
	'section'=>'employee',
	'filter'=>'true',
	'condition'=>$condition,
	'data'=>$data
	);
	$json_data=json_encode($arr);
	echo $json_data;
});