@extends('layouts.master')

@section('content')

<p>Nuevo Usuario <p>

  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


 <form action="{{ route('NewUser') }}" method="post">
       {!! csrf_field() !!}
        <label for="name">Name:</label>
        <input class="form-control" type="text" name="name" value="" required>
      
        <label for="name">Email</label>
        <input class="form-control" type="text" name="email" value="" required>
      
        <label for="password">Password:</label>
        <input class="form-control" type="text" name="password" value="" required>
     
      
        <input class="btn btn-primary" type="submit" value="Guardar">
    </form>


@stop
