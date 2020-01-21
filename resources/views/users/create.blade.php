@extends('layout')

@section('ruta', 'Crear Usuario')

@section('content')

@include('errors')

<div class="card-block">
    <div class="card-body ">
    <form method="POST" action="{{URL('usuarios/store')}}">
        {{ csrf_field() }}
        <fieldset class="form-group col-xl-6 col-lg-6 col-md-12">Nombre:
        <input type="text" class="form-control" name="name" id="name" required="required">
    	</fieldset>
    	<fieldset class="form-group col-xl-6 col-lg-6 col-md-12">Apellido:
        <input type="text" class="form-control" name="apellidos" id="apellidos">
    	</fieldset>
    	<fieldset class="form-group col-xl-6 col-lg-6 col-md-12">Correo:
        <input type="email" class="form-control" name="email" id="email" placeholder="ejemplo@ejemplo.com" required="required">
        </fieldset>
    	<fieldset class="form-group col-xl-6 col-lg-6 col-md-12">Contraseña:
        <input type="password" class="form-control" name="password" id="password" placeholder="Mayor a 6 caracteres" required="required">
        </fieldset>
    	<fieldset class="form-group col-xl-6 col-lg-6 col-md-12">Cargo:
        <input type="text" class="form-control" name="cargo" id="cargo" required="required">
    	</fieldset>
    	<fieldset class="form-group col-xl-6 col-lg-6 col-md-12">Empresa:</label><br/>
            <select class="form-control" name="empresa">
                <option class="get-class" disabled selected>Seleccionar empresa</option>
                @foreach($empresas as $company)
                <option value="{{$company->id}}">{{$company->nombre}}</option>
                @endforeach          
            </select>
            </fieldset>   	
        <fieldset class="form-group col-xl-6 col-lg-6 col-md-12">
    	<button type="summit" class="btn btn-success btn-min-width mr-1 mb-1">Guardar</button>
    	<a href="{{ url('/usuarios') }}"><button type="button" class="btn btn-light btn-min-width mr-1 mb-1">Volver</button></a>
        </fieldset>
    </form>
    </div>
</div>

@endsection