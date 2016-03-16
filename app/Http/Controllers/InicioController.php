<?php 

namespace PlatziPHP\Http\Controllers;

use Illuminate\Support\Facades\View; 

use PlatziPHP\User; 

class InicioController extends Controller{
	public function inicio(){


		return view('home');
	}

	public function guardarUsuario(){

		/*
		$user=User::create(['Firstname'=>'Jose']); 

		$user->save(); 

		*/

/*
		$user=new User(); 

		$user->FirstName='Juan'; 
		$user->email='juan@gmail.com';
		$user->save();  */


		$user=User::find(1); 
		$user->LastName='Arrieta'; 
		$user->email='Jose2@gmail.com';
		$user->save(); 

		//dd($user);

		return $user; 
	}

}

