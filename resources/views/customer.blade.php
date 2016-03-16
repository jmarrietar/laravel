@extends('layouts.master')

@section('content')

<p>Editar Informacion Customer  <p>

 <form action="{{ route('SaveUser') }}" method="post">
       {!! csrf_field() !!}

        <label for="id">Id:</label>
        <input class="form-control" type="text" name="id" value={{$usuarioDB->id}} readonly>
        <label for="name">Name:</label>
        <input class="form-control" type="text" name="name" value={{$usuarioDB->name}}>
        <label for="email">Email:</label>
        <input class="form-control" type="text" name="email" value={{$usuarioDB->email}}>
        <label for="password">Password:</label>
        <input class="form-control" type="text" name="password" value="">
            
      <br>

        <input class="btn btn-primary" type="submit" value="Editar">
    </form>


@stop
