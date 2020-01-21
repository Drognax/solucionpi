@extends('layout')
@foreach ($company as $empresa)
@endforeach
@section('ruta', 'Añadir nuevo Equipamento')


@section('content')

@include('errors')

<div class="card-block">
    <div class="card-body ">
    <form method="POST" action="{{URL('/equipamento')}}">
        {{ csrf_field() }}
        <fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Nombre:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" required><br/>
        </fieldset>
        <fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Referencia:</label>
        <input type="text" class="form-control" name="referencia" id="referencia" required><br/>
        </fieldset>
        <fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Modelo:</label>
        <input type="text" class="form-control" name="modelo" id="modelo" required><br/>
        </fieldset>
        <fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Marca:</label>
        <input type="text" class="form-control" name="marca" id="marca" required><br/>
        </fieldset>
        <fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Empresa:</label>
        <input type="text" class="form-control" class="empresa" id="nombre" value="{{$empresa->nombre}}" readonly><br/>
        <input type="hidden" id="id" value="{{$empresa->rut}}" name="id" readonly><br/>
        <input type="hidden" id="empresa" value="{{$empresa->id}}" name="empresa" readonly><br/>
        </fieldset>     

        <button type="summit" class="btn btn-success btn-min-width mr-1 mb-1">Guardar</button>
        <a href="{{ url('/equipamento',$empresa->id) }}"><button type="button" class="btn btn-light btn-min-width mr-1 mb-1">Volver</button></a>
    </form>
    </div>
</div>

@endsection