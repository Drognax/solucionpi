@extends('layout')

@section('ruta', 'Instalación de '.$first->nombre)


@section('www')

<a href="{{url('/empresas',$first->id)}}" >Empresa </a>
/
@endsection

@section('boton')
<a href="{{ url('/instalaciones/create', $last->id) }}">Nueva Instalación </a>
@endsection

@section('content')

@include('errors')
<div class="card-header">
	<h4 class="card-title">Registro de Instalaciones</h4>
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
				<th>Faena</th>
				<th>Dirección</th>
				<th>Área</th>
				<th>Actividades</th>
				<th>Acción</th>
				</tr>
			</thead>
			<tbody id="myTable">
				@forelse ($plant as $local)
				<tr>
					<td onclick="window.location='{{ url('/instalaciones/show/'.$local->id.'/') }}';">{{ $local->faena }}</td>
					<td>{{ $local->direccion }}</td>
					<td>{{ $local->area }}</td>
					<td>{{ $local->actividades }}</td>
					
					<td>	
                           <form method="POST" action="{{URL('/instalaciones/delplan')}}" id="eliminar">
                                {{ csrf_field() }}
                                {{method_field('PUT')}}
                            <input type="hidden" id="id" name="id" value="{{ $local->id}}">
                            <input type="hidden" id="act" name="empresa" value="{{ $local->empresa_id}}">
                            <button type="submit" class="btn btn-icon btn-danger" onclick="return confirm('¿Está seguro de eliminar?')"><i class="la la-trash-o"></i></button> 
                            </form>
					</td>
				</tr>
				@empty
				<div class="alert alert-danger">
				<li>No hay Instalaciones registradas.</li>
				</div>
				@endforelse
			</tbody>
		</table>
	</div>
</div>
@endsection