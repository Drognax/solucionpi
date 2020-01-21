@extends('layout')

@section('ruta', 'Usuarios del Sistema')

@section('www')
<a href="{{url('usuarios/create')}}"> Nuevo Usuario </a>
@endsection


@section('content')
<div class="card-header">
	<h4 class="card-title">Registro de Usuarios</h4>
	<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
	<div class="heading-elements">
		<ul class="list-inline mb-0">
			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar">
			<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
			<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
		</ul>
	</div>
</div>
<div class="card-content collapse show">
	<div class="table-responsive">
		<table id="tablet" class="table table-hover table-fixed table-bordered table-sm">	
			<thead class="thead-dark"> <!-- class=cabecera blaca o negra -->
				<tr>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Cargo</th>
				<th>Correo</th>
				<th>Empresa</th>
				</tr>
			</thead>
			<tbody id="myTable">
				@forelse ($users as $user)
				<tr onclick="window.location='{{ url('/usuarios/'.$user->id.'/') }}';" >
					<td>{{ $user->nombre }}</td>
					<td>{{ $user->apellido }}</td>
					<td>{{ $user->cargo }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->empresa_id }}</td>
				</tr>
				@empty
				<div class="alert alert-danger">
				<li>No hay usuarios registrados.</li>
				</div>
				@endforelse
			</tbody>
		</table>
	</div>
</div>

@endsection