@extends('layout')
@foreach ($company as $empresa)
@endforeach
@section('ruta', 'Añadir nueva Instalación')


@section('content')

@include('errors')

<div class="card-block">
    <div class="card-body ">
    <form method="POST" action="{{URL('/instalaciones')}}">
        {{ csrf_field() }}
        <fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Faena:</label>
        <input type="text" class="form-control" name="faena" id="faena" required><br/>
        </fieldset>
        <fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Dirección:</label>
        <input type="text" class="form-control" name="direccion" id="direccion" required><br/>
        </fieldset>
        <fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Área:</label>
        <input type="text" class="form-control" name="area" id="area" required><br/>
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
        <a href="{{ url('/instalaciones',$empresa->id) }}"><button type="button" class="btn btn-light btn-min-width mr-1 mb-1">Volver</button></a>
    </form>
    </div>
</div>

@endsection