# ClickDelivery : User Management System 
---------------------- 

##INTRODUCTION 
Here is my  Solution to a User Management implementation Test I did in PHP.  I will talk about my solution , the problems  I encounter and what I learned. 

First of all, I have Used another MVC Framework before to make a web app application, this framework is called GLITE , but it is a purely academic framework to implement a Library System [Biblioteca](https://github.com/isaac9422/Diseno_Biblioteca) [G Framework](http://www.frameworkg.com)

For this test, I wanted to learn some new Framework , so due the great popularity of Laravel I choose it. The first thing I did was watch video tutorials about larvel and its oficial documentation. 

Once I figured out the way laravel's MVC works, I started Coding. 

##DATABASE

The Laravel Framework make Database creation and administration with PHP code is really easy with what they call ‘migrations’.

Here I make  a user with email,password, rol and visible attribute(to know if it can login).

3 code is for Customer
2 code is for Agent 
1 code is for Admin 

```php
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('rol');
            $table->integer('visible');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
```

Laravel implements a seeder and create some users to the data base. 

```php
class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


 		DB::table('users')->insert([	
				'name' => 'Jose',
				'email'      => 'jmarrietar@gmail.com',
				'password'   => Hash::make('123abc'),
				'rol'      => 3,
				'visible'      => 1,
				'created_at' => new DateTime(),
				'updated_at' => new DateTime()
			]);

 		DB::table('users')->insert([	
				'name' => 'Miguel',
				'email'      => 'Miguel@gmail.com',
				'password'   => Hash::make('123abc'),
				'rol'      => 3,
				'visible'      => 1,
				'created_at' => new DateTime(),
				'updated_at' => new DateTime()
			]);

 		DB::table('users')->insert([	
				'name' => 'admin',
				'email'      => 'admin@gmail.com',
				'password'   => Hash::make('123abc'),
				'rol'      => 1,
				'visible'      => 1,
				'created_at' => new DateTime(),
				'updated_at' => new DateTime()
			]);

 		DB::table('users')->insert([	
				'name' => 'agent',
				'email'      => 'agent@gmail.com',
				'password'   => Hash::make('123abc'),
				'rol'      => 2,
				'visible'      => 1,
				'created_at' => new DateTime(),
				'updated_at' => new DateTime()
			]);
 		

         $this->call(UserTableSeeder::class);
    }
}


```


I implemented some get and post routes depending on the rol and what the action could be. Some routes with redirect to create, delete, edit users, authenticate or show login page. 


##LOGIN
The login will request an email and a password. 

In case the user doesn't exist or the email or password are invalid , it will display some errors. 

######controler

```php
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

```
		
######view 



