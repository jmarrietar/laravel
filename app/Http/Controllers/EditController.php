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


class EditController extends BaseController
{

	public function EditUser(User $user){


		return  view('EditUser')->with(['user'=>$user]); 

	}

	public function SaveEditUser(Request $request){

/*
$id=$request->get('id'); 
$user=User::where('id', $request->get('id'))->first();

					$rules = array(
			'name'=>'required',
			'email'    => 'required|email|',
			'password' => 'required|alphaNum|' , 
			'rol'=>'required|between:0,3|Integer',
			'visible'=>'required|between:0,1|Integer'

			);   

		$validator = Validator::make($request->all(), $rules);

if ($validator->fails()) {
    return Redirect::to('/edit/{$id}')
        ->withErrors($validator);
} 

*/

		
		$user=User::where('id', $request->get('id'))->first();
		$user->name = $request->get('name');
		$user->email = $request->get('email');
		$user->password = bcrypt($request->get('password'));
		$user->rol = $request->get('rol');
		$user->visible = $request->get('visible');
		$user->save();
		

	 //return redirect('/login');
		return  'Usuario con Id '.'"'. $user->id. '"'.'Modificado';

	}



}