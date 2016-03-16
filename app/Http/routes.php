<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



use PlatziPHP\User; 


Route::group(['middleware' => ['web']], function () {
    
Route::get('/', 'InicioController@inicio');

Route::post('/', [
    'uses' => 'InicioController@inicio',
    'as'   => 'homepost',
]);

Route::post('login', [
    'uses' => 'HomeController@doLogin',
    'as'   => 'doLogin',
]);


Route::get('login', [
    'uses' => 'HomeController@showLogin',
    'as'   => 'auth_show_path',
]);


Route::delete('/usuarios/{id}', function ($id) {

	$user = User::find($id);
    $user->delete();
    var_dump($user); 
    return redirect('/login');
});


Route::get('/edit/{id}', function ($id) {

	$user = User::find($id);
    return  view('EditUser')->with(['user'=>$user]); 
}
);


Route::post('SaveUser', [
    'uses' => 'EditController@SaveEditUser',
    'as'   => 'SaveUser',
]);


Route::post('NewUser', [
    'uses' => 'SaveController@SaveUser',
    'as'   => 'NewUser',
]);

Route::get('NewUser', [
    'uses' => 'SaveController@ShowSaveUser',
    'as'   => 'NewUser',
]);

Route::get('/auth/facebook', 'AuthController@redirectToProvider');
Route::get('/auth/facebook/callback', 'AuthController@handleProviderCallback');


});





/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
