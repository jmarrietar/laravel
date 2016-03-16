@extends('layouts.master')

@section('content')
    <h1>Iniciar Sesión</h1>
  
  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <form action="{{ route('doLogin') }}" method="post">
       {!! csrf_field() !!}
        <label for="email">Email:</label>
        <input class="form-control" type="text" name="email" value="{{ old('email') }}">
        <label for="password">Contraseña:</label>
        <input class="form-control" type="password" name="password">

      <br>

        <input class="btn btn-primary" type="submit" value="Iniciar">
    </form>

<a href="NewUser" class="btn btn-success">Add User</a>




@stop
