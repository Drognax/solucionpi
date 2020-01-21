@extends('layout')

@section('ruta', 'Equipamento de '.$first->nombre)


@section('www')

<a href="{{url('/empresas',$first->id)}}" >Empresa </a>
/
@endsection

@section('boton')
<a href="{{ url('/equipamento/create', $last->id) }}">Nuevo Equipamento </a>
@endsection

@section('content')

@include('errors')
<div class="card-header">
	<h4 class="card-title">Registro de Equipamento</h4>
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
				<th>Referencia</th>
				<th>Modelo</th>
				<th>Marca</th>
				<th>Acción</th>
				</tr>
			</thead>
			<tbody id="myTable">
				@forelse ($equip as $equipo)
				<tr  >
					<td onclick="window.location='{{ url('/equipamento/show/'.$equipo->id.'/') }}';">{{ $equipo->nombre }}</td>
					<td>{{ $equipo->referencia }}</td>
					<td>{{ $equipo->modelo }}</td>
					<td>{{ $equipo->marca }}</td>			
					<td>	
                           <form method="POST" action="{{URL('/equipamento/delequip')}}" id="eliminar">
                                {{ csrf_field() }}
                                {{method_field('PUT')}}
                            <input type="hidden" id="id" name="id" value="{{ $equipo->id}}">
                            <input type="hidden" id="act" name="empresa" value="{{ $equipo->empresa_id}}">
                            <button type="submit" class="btn btn-icon btn-danger" onclick="return confirm('¿Está seguro de eliminar?')"><i class="la la-trash-o"></i></button> 
                            </form>
					</td>
				</tr>
				@empty
				<div class="alert alert-danger">
				<li>No hay equipamentos registrados.</li>
				</div>
				@endforelse
			</tbody>
		</table>
	</div>
</div>
@endsection