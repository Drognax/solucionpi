@extends('layout')

@section('ruta', 'Crear Empresa')

@section('content')

@include('errors')

<div class="card-block">
    <div class="card-body ">
    <form method="POST" action="{{URL('/empresas')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <fieldset class="form-group col-xl-6 col-lg-6 col-md-12">Nombre:
        <input type="text" class="form-control" name="name" id="mane" required>  
        </fieldset>
    	<fieldset class="form-group col-xl-6 col-lg-6 col-md-12">Rut:</label>
        <input type="text" class="form-control" name="rut" id="rut" required><br/>
    	</fieldset>
    	<fieldset class="form-group col-xl-6 col-lg-6 col-md-12">Giro:</label>
        <input type="text" class="form-control" name="giro" id="giro" required><br/>
        </fieldset>         
    	<fieldset class="form-group col-xl-6 col-lg-6 col-md-12">Representante:</label>
        <input type="text" class="form-control" name="representante" id="representante" required><br/>
        </fieldset>
    	<fieldset class="form-group col-xl-6 col-lg-6 col-md-12">Contacto:</label>
        <input type="text" class="form-control" name="contacto" id="contacto" required><br/>
    	</fieldset>
    	<fieldset class="form-group col-xl-6 col-lg-6 col-md-12">Dirección:</label>
        <input type="text" class="form-control" name="direccion" id="direccion" required><br/>
        </fieldset>
        <fieldset class="form-group col-xl-6 col-lg-6 col-md-12">Certificado:</label>
        <input type="file"name="certificado" id="certificado" required><br/>
    	</fieldset>
    	<fieldset class="form-group col-xl-6 col-lg-6 col-md-12">Cotización:</label>
        <input type="text" class="form-control" name="cotizacion" id="cotizacion" required><br/>
        </fieldset>
        <fieldset class="form-group col-xl-6 col-lg-6 col-md-12">Trabajadores:</label>
        <input type="number" class="form-control" name="trabajadores" id="trabajadores" value="0" required><br/>
        </fieldset>
        <fieldset class="form-group col-xl-6 col-lg-6 col-md-12">Contrato:</label>
        <input type="file" name="contrato" id="contrato" required><br/>
    </fieldset>
    	<button type="summit" class="btn btn-success btn-min-width mr-1 mb-1">Guardar</button>
    	<a href="{{ url('/usuarios') }}"><button type="button" class="btn btn-light btn-min-width mr-1 mb-1">Volver</button></a>
    </form>
    </div>
</div>

@endsection