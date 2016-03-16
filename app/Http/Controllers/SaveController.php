<?php

namespace PlatziPHP\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use PlatziPHP\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use PlatziPHP\User; 


class SaveController extends BaseController
{


	public function SaveUser(Request $request){

			$rules = array(
			'name'=>'required',
			'email'    => 'required|email|unique:users',
			'password' => 'required|alphaNum|' 
			);   

		$validator = Validator::make($request->all(), $rules);

if ($validator->fails()) {
    return Redirect::to('NewUser')
        ->withErrors($validator);
} 
		
		$user=new User(); 
		$user->name = $request->get('name');
		$user->email = $request->get('email');
		$user->password = bcrypt($request->get('password'));
		$user->rol = 3;
		$user->visible = 0;
		$user->save();
		

		 //return redirect('/');
			return 'Nuevo Costumer Guardado!';

	}


	public function ShowSaveUser(Request $request){
		

		return view('NewUser');
	

	}



}