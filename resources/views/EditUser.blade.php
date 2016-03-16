@extends('layouts.master')

@section('content')

<p>Editar Usuario <p>
  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



 <form action="{{ route('SaveUser') }}" method="post">
       {!! csrf_field() !!}
        <label for="id">Id:</label>
        <input class="form-control" type="text" name="id" value={{ isset($user) ? $user->id : '' }} readonly>
      
        <label for="name">Name:</label>
        <input class="form-control" type="text" name="name" value={{ $user->name }} required>
      
        <label for="name">Email</label>
        <input class="form-control" type="text" name="email" value={{ $user->email }} required>
      
        <label for="password">Password:</label>
        <input class="form-control" type="text" name="password" value="" required>
     
        <label for="rol">Rol:</label>
        <input class="form-control" type="text" name="rol" value={{ $user->rol }} required>
     
        <label for="visible">Visibilidad:</label>
        <input class="form-control" type="text" name="visible" value={{ $user->visible }} required>
      
        <input class="btn btn-primary" type="submit" value="Editar">
    </form>


@stop
