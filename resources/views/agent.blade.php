@extends('layouts.master')

@section('title') Users @stop

@section('content')

<div class="col-lg-10 col-lg-offset-1">

	<h1><i class="fa fa-users"></i> Agent Panel <a href="{{route('auth_show_path')}}" class="btn btn-default pull-right">Logout</a></h1>

	<div class="table-responsive">
		<table class="table table-bordered table-striped">

			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Rol</th>
					<th>Visible</th>
					<th></th>
				</tr>
			</thead>

			<tbody>

			
				
					@if (count($usuarios) > 0)
					<div class="panel panel-default">
						<div class="panel-heading">
							Current Users
						</div>

						<div class="table-responsive">
							<table class="table table-bordered table-striped">

								<!-- Table Headings -->
								<thead>
									<th>Users</th>
									<th>&nbsp;</th>
								</thead>

								<!-- Table Body -->
								<tbody>
									@foreach ($usuarios as $usuarios)
									<tr>
										<!-- Task Name -->
										<td class="table-text">
											<div>{{ $usuarios->name }}</div>
										</td>
										<td class="table-text">
											<div>{{ $usuarios->email }}</div>
										</td>
										<td class="table-text">
											<div>{{ $usuarios->rol }}</div>
										</td>
										<td class="table-text">
											<div>{{ $usuarios->visible }}</div>

										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						@endif


</div>

						@stop
