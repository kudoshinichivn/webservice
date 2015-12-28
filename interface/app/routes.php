<?php
session_start();
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

Route::get('/',function()
	{
		if(isset($_SESSION['login']))
			return View::make('index',array(
				'username'=>$_SESSION['login']->username,
				'password'=>$_SESSION['login']->password
				));
		else
			return View::make('login');
	});

Route::get('/logout',function()
	{
		if(isset($_SESSION['login']))
		{
			$_SESSION=array();
			session_destroy();
			
		}
		return View::make('login');
	});

Route::post('/','EmployeeController@index');
