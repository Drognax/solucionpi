@extends('layouts.dashboard')

@section('ruta', 'Trabajadores de '.$first->nombre)


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
				<th></th>
				<th>Nombre</th>
				<th>Rut</th>
				<th>Cargo</th>
				<th>Actividades</th>
				<th>Documentación</th>				
				<th>Indicador</th>
				<th>Observaciones</th>
				</tr>
			</thead>
			<tbody id="myTable">
				@forelse ($worker as $trabajador)
				<tr>
					<?php $count= $loop->index ?>
          <td data-toggle="collapse" data-target=".order{{$loop->index}}">
          <button type="button" class="btn btn-icon btn-dark btn-sm"><i class="la la-plus"></i></button>
          </td>
					<td>{{ $trabajador->nombre }}</td>
					<td>{{ $trabajador->rut }}</td>
					<td>{{ $trabajador->cargo }}</td>
					<td>{{ $trabajador->actividades }}</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				</tr>			    	
			    		@foreach($documentos as $row)
			    		@if ($row->trabajador_id == $trabajador->id)
			    		<tr class="collapse order{{$count}} warning">
                	<td></td>
			          	<td>{{$row->nombre}}</td>
			          	<td></td>
			          	<td></td>
			          	<td></td>
			          	<td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal{{$loop->index}}">
                          Ver Documento
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$loop->index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel{{$loop->index}}">{{ $row->nombre }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <embed src="{{asset("storage/$row->actividad") }}" type="application/pdf" width="770px" height="500px" />
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div></td>
			          	<?php 
                    $segundosFechaActual = strtotime($row->indicador);
                    $segundosFechaRegistro = strtotime($fecha);
                    $segundosrestantes = $segundosFechaActual - $segundosFechaRegistro;
                    $segundosrestantes = $segundosrestantes/ 86400; ?>
                    

                  
                    <td>
                        @if ($segundosrestantes < "0")
                            <button type="button" class="btn btn-danger btn-sm">Vencido</i></button>

                        @elseif ($segundosrestantes == "0")
                            <button type="button" class="btn btn-danger btn-sm"></i><?php echo $segundosrestantes; ?> Días </button>

                        @elseif ($segundosrestantes < 29)
                            <button type="button" class="btn btn-warning btn-sm"></i><?php echo $segundosrestantes; ?> Días </button>

                        @elseif ($segundosrestantes >= 30)
                            <button type="button" class="btn btn-success btn-sm"></i><?php echo $segundosrestantes; ?></button>
                        @endif
                    </td>
			          	<td>{{$row->observaciones}}</td>
			        
						</tr>
					@endif
					@endforeach 
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