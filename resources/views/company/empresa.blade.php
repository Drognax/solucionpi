@extends('layout')

@section('ruta', 'Empresas del Sistema')


@section('boton')
<a href="{{url('empresas/create')}}"> Nueva Empresa </a>
@endsection


@section('content')
@include('errors')
<div class="card-header">
	<h4 class="card-title">Registro de Empresas</h4>
	<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
	<div class="heading-elements">
		<ul class="list-inline mb-0">
			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar"> <!-- buscador -->
			<li><a data-action="collapse"><i class="ft-minus"></i></a></li>		
			<li><a data-action="expand"><i class="ft-maximize"></i></a></li>

			
		</ul>
	</div>
</div>
<div class="card-content collapse show" >
	<div class="table-responsive">
		<table id="tablet" class="table table-hover table-fixed table-bordered table-sm">			
			<thead class="thead-dark"> <!-- class=cabecera blaca o negra -->
				<tr>
				<th>Nombre</th>
				<th>Rut</th>
				<th>Giro</th>
				<th>Representante</th>
				<th>Contacto</th>
				<th>Dirección</th>
				<th>Trabajadores</th>
				</tr>
			</thead>
			<tbody id="myTable">
				@forelse ($company as $empresa)
				<tr onclick="window.location='{{ url('/empresas/'.$empresa->id.'/') }}';" >
					<td>{{ $empresa->nombre }}</td>
					<td>{{ $empresa->rut }}</td>
					<td>{{ $empresa->giro }}</td>
					<td>{{ $empresa->representante }}</td>
					<td>{{ $empresa->contacto }}</td>
					<td>{{ $empresa->direccion }}</td>
					<td>{{ $empresa->trabajadores }}</td></a>
				</tr>
				@empty
				<div class="alert alert-danger">
				<li>No hay Empresas registradas.</li>
			</div>
				@endforelse
			</tbody>
		</table>
	</div>
</div>

@endsection

