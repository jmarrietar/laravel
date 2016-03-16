<?php

namespace PlatziPHP\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Socialite;
use PlatziPHP\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use PlatziPHP\User; 



class HomeController extends BaseController
{
	public function showLogin(){
		return view('auth');
	}

	public function doLogin(Request $request){

		$rules = array(
			'email'    => 'required|email',
			'password' => 'required|alphaNum|' 
			);   

		$validator = Validator::make($request->all(), $rules);

if ($validator->fails()) {
    return Redirect::to('login')
        ->withErrors($validator);
} 


$usuarioDB=User::where('email', $request->get('email'))->first();




if (\Auth::attempt(['email'=>$usuarioDB['email'],'password'  => $request->get('password')])) {

     if ($usuarioDB['visible']=='0'){
     		return 'Usuario No tiene Visibilidad Aun -> Contactar Admin'; 
     }else if($usuarioDB['rol']=='3'){
		return view('customer',[
			'usuarioDB' => $usuarioDB
			]);

	}else if($usuarioDB['rol']=='1'){

		$usuarios=User::orderBy('created_at', 'asc')->get();

		return view('admin',[
			'usuarios' => $usuarios
			]); 

	}else if($usuarioDB['rol']=='2'){

		$usuarios=User::orderBy('created_at', 'asc')->get();

		return view('agent',[
			'usuarios' => $usuarios
			]); 
	}

	else{
		return 'otro rol'.$request->get('email'); 
	}

}else {

		//	return Redirect::to('/login');; 
	return 'No existe'.$usuarioDB['email'].gettype($usuarioDB['email']).$request->get('email').gettype($request->get('email')); 
}



}

}
