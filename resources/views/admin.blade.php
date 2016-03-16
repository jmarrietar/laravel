@extends('layouts.master')

@section('title') Users @stop

@section('content')
<div class="col-lg-10 col-lg-offset-1">

	<h1><i class="fa fa-users"></i> User Administration <a href="{{route('auth_show_path')}}" class="btn btn-default pull-right">Logout</a></h1>

	<p>SECCION ADMIN<p>

		<div class="table-responsive">loc
			<table class="table table-bordered table-striped">

				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Rol</th>
						<th>Visible</th>
						<th>id</th>
						<th></th>
					</tr>
				</thead>

				<tbody>


					<!-- Current Tasks -->
					@if (count($usuarios) > 0)
					<div class="panel panel-default">
						<div class="panel-heading">
							Current Users
						</div>

						<div class="panel-body">
							<table class="table table-striped task-table">

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
										</td>
										<td class="table-text">
											<div>{{ $usuarios->id }}</div>


											<td>
											<form action="{{ url('usuarios/'.$usuarios->id) }}" method="POST">
													{!! csrf_field() !!}
													{!! method_field('DELETE') !!}

													<button type="submit" class="btn btn-danger">
														<i class="fa fa-trash"></i> Delete
													</button>

												</td>

												</form>

											<td>
											<form action="{{ url('edit/'.$usuarios->id)}}" method="GET">
													{!! csrf_field() !!}
													{!! method_field('UPDATE') !!}

													<button type="submit" class="btn btn-warning">
														<i class="fa fa-trash"></i> Edit
													</button>

												</td>
												</form>

											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							@endif


						</div>

						@stop
