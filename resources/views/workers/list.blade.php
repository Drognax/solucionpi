@extends('layout')

@section('ruta', 'Trabajadores de '.$first->nombre)


@section('www')

<a href="{{url('/empresas',$first->id)}}" >Empresa </a>
/
@endsection

@section('boton')
<a href="{{ url('/trabajadores/create', $last->id) }}">Nuevo Trabajador </a>
@endsection

@section('content')

@include('errors')
<div class="card-header">
	<h4 class="card-title">Registro de Trabajadores</h4>
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
				<th>Rut</th>
				<th>Cargo</th>
				<th>Actividades</th>
				<th></th>
				<th>Acción</th>
				</tr>
			</thead>
			<tbody id="myTable">
				@forelse ($worker as $trabajador)
				<tr>
					<td onclick="window.location='{{ url('/trabajadores/show/'.$trabajador->id.'/') }}';">{{ $trabajador->nombre }}</td>
					<td>{{ $trabajador->rut }}</td>
					<td>{{ $trabajador->cargo }}</td>
					<td>{{ $trabajador->actividades }}</td>
					<td></td>
					
					<td>
	                    <form method="POST" action="{{URL('/trabajadores/delworker')}}" id="eliminar">
	                        {{ csrf_field() }}
	                        {{method_field('PUT')}}
	                    <input type="hidden" id="id" name="id" value="{{ $trabajador->id}}">
	                    <input type="hidden" id="act" name="empresa" value="{{ $trabajador->empresa_id}}">
	                    <button type="submit" class="btn btn-icon btn-danger" onclick="return confirm('¿Está seguro de eliminar?')"><i class="la la-trash-o"></i></button> 
	                    </form>
					</td>
				</tr>
				@empty
				<div class="alert alert-danger">
				<li>No hay trabajadores registrados.</li>
				</div>
				@endforelse
			</tbody>
		</table>
	</div>
</div>
@endsection