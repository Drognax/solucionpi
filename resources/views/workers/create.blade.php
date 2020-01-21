@extends('layout')
@foreach ($company as $empresa)
@endforeach
@section('ruta', 'Añadir nuevo Trabajador')


@section('content')

@include('errors')

<div class="card-block">
    <div class="card-body ">
    <form method="POST" action="{{URL('/trabajadores')}}">
        {{ csrf_field() }}
        <fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Nombre:</label>
        <input type="text" class="form-control" name="name" id="mane" required><br/>
    	</fieldset>
    	<fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Rut:</label>
        <input type="text" class="form-control" name="rut" id="rut" required><br/>
    	</fieldset>
    	<fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Cargo:</label>
        <input type="text" class="form-control" name="cargo" id="cargo" required><br/>
        </fieldset>
    	<fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Actividades:</label>
        <input type="text" class="form-control" name="actividades" id="actividades" required><br/>
    	</fieldset>
    	<fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Empresa:</label>
        <input type="text" class="form-control" class="empresa" id="nombre" value="{{$empresa->nombre}}" readonly><br/>
        <input type="hidden" id="id" value="{{$empresa->rut}}" name="id" readonly><br/>
        <input type="hidden" id="empresa" value="{{$empresa->id}}" name="empresa" readonly><br/>
    	</fieldset>    	

    	<button type="summit" class="btn btn-success btn-min-width mr-1 mb-1">Guardar</button>
    	<a href="{{ url('/trabajadores',$empresa->id) }}"><button type="button" class="btn btn-light btn-min-width mr-1 mb-1">Volver</button></a>
    </form>
    </div>
</div>

@endsection