@extends('layout')
@foreach ($worker as $trabajador)
@endforeach


@section('ruta', 'Detalle de trabajador')



@section('content')
@include('errors')

<div class="card-block">
    <div class="card-body ">
        <fieldset class="form-group col-xl-4 col-lg-6 col-md-12">
        <div class="btn-group mr-1 mb-1">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modaledit" >Editar</button>
            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </button>
            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(120px, 39px, 0px); top: 0px; left: 0px; will-change: transform;">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modaldoc">Nuevo Documento</a>
            </div>
        </div>
        </fieldset>
        <fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> Nombres:
        <input type="text" class="form-control" id="basicInput" value="{{$trabajador->nombre}}" readonly="readonly">
    	</fieldset>
    	<fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> Rut:
        <input type="text" class="form-control" id="basicInput" value="{{$trabajador->rut}}" readonly="readonly">
    	</fieldset>
    	<fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> Cargo:
        <input type="text" class="form-control" id="basicInput" value="{{$trabajador->cargo}}" readonly="readonly">
    	</fieldset>
    	<fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> Actividades:
        <input type="text" class="form-control" id="basicInput" value="{{$trabajador->actividades}}" readonly="readonly">
    	</fieldset>
    	<fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> Empresa:
        <input type="text" class="form-control" id="basicInput" value="{{$trabajador->empresa_id}}" readonly="readonly">
    	</fieldset>
        <fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> 
    	<a href="{{ url('/trabajadores/'.$trabajador->empresa_id) }}"><button type="button" class="btn btn-light btn-min-width mr-1 mb-1">Volver</button></a>
        </fieldset>
    </div>
</div>

    <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="modaledit" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modaledit">Editar: </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{URL('trabajadores/update/'.$trabajador->id)}}">
                {{ csrf_field() }}
                {{method_field('PUT')}}
                <fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> Nombres:
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$trabajador->nombre}}" >
                </fieldset>
                <fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> Rut:
                <input type="text" class="form-control" id="rut" name="rut" value="{{$trabajador->rut}}">
                </fieldset>
                <fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> Cargo:
                <input type="text" class="form-control" id="cargo" name="cargo" value="{{$trabajador->cargo}}" >
                </fieldset>
                <fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> Actividades:
                <input type="text" class="form-control" id="actividades" name="actividades" value="{{$trabajador->actividades}}">
                </fieldset>
                <fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> Empresa:
                <input type="text" class="form-control" id="empresa" name="empresa" value="{{$trabajador->empresa_id}}" readonly="readonly" >
                </fieldset>            
          </div>
          <div class="modal-footer">   
            <button type="summit" class="btn btn-success">Guardar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </form>
        </div>
      </div>      
    </div>

    <div class="modal fade" id="modaldoc" tabindex="-1" role="dialog" aria-labelledby="modaldoc" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modaldoc">Nuevo Documento: </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{URL('/documentos')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Nombre documento:
            <input type="text" class="form-control"  class="form-control" name="name" id="name" required>  
            </fieldset>
            <fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Estado de Gestión:</label><br/>
            <select class="form-control" name="gestion">
                <option value="na">N/A</option>
                <option value="norealizado">No Realizado</option>
                <option value="proceso">En Proceso</option>
                <option value="realizado">Realizado</option>            
            </select>
            </fieldset>
            <fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Vigencia del documento:</label>
            <input type="date" class="form-control" name="indicador" id="indicador" required><br/>
            </fieldset>
            <fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Observaciones:</label>
            <input type="text" class="form-control" name="observaciones" id="observaciones" ><br/>
            </fieldset>
            <fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Documento:</label>
            <input type="file" name="docs" id="docs" required><br/>
            </fieldset>      
            <input type="hidden" name="dato" id="dato" value="{{$trabajador->rut}}">                    
          </div>
          <div class="modal-footer">   
            <button type="summit" class="btn btn-success">Guardar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </form>
        </div>
      </div>      
    </div>

@endsection

@section('content2')
<div class="content-body">
  <section id="basic-alerts">
  <div class="row match-height">
    <div class="col-xl-12 col-lg-12">
      <div class="card">
<div class="card-header">
    <h4 class="card-title">Documentos</h4>
    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
    <div class="heading-elements">
        <ul class="list-inline mb-0">
            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
            
            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
            
        </ul>
    </div>
</div>
<div class="card-content collapse show">
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark"> <!-- class=cabecera blaca o negra -->
                <tr>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Actividad</th>
                <th>Vigencia</th>
                <th>Días restantes</th>
                <th>Observaciones</th>
                <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($doc as $documento)
                <tr>
                    <td><b>{{ $documento->nombre }}</b></td>
                    <td>
                        @if ($documento->estado == "na")
                            <button type="button" class="btn btn-light btn-min-width"><i class="la la-times"></i> No Aplica</button>

                        @elseif ($documento->estado == "norealizado")
                            <button type="button" class="btn btn-danger btn-min-width"><i class="la la-frown-o"></i> No Realizado</button>

                        @elseif ($documento->estado == "realizado")
                            <button type="button" class="btn btn-success btn-min-width"><i class="la la-flag-checkered"></i> Realizado</button>

                        @elseif ($documento->estado == "proceso")
                            <button type="button" class="btn btn-warning btn-min-width"><i class="la la-cogs"></i> En Proceso</button>
                        @endif

                    </td>
                    
                    <td>
                        <!--<button type="button" href="{{ asset("storage/$documento->actividad") }}">Ver</button>-->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$loop->index}}">
                          Ver Documento
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$loop->index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel{{$loop->index}}">{{ $documento->nombre }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <embed src="{{asset("storage/$documento->actividad") }}" type="application/pdf" width="770px" height="500px" />
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </td>
                    <?php 
                    $segundosFechaActual = strtotime($documento->indicador);
                    $segundosFechaRegistro = strtotime($fecha);
                    $segundosrestantes = $segundosFechaActual - $segundosFechaRegistro;
                    $segundosrestantes = $segundosrestantes/ 86400; ?>
                    

                    <td>{{ $documento->indicador}}</td>
                    <td>
                        @if ($segundosrestantes < "0")
                            <button type="button" class="btn btn-danger ">Vencido</i></button>

                        @elseif ($segundosrestantes == "0")
                            <button type="button" class="btn btn-danger "></i><?php echo $segundosrestantes; ?></button>

                        @elseif ($segundosrestantes < 29)
                            <button type="button" class="btn btn-warning"></i><?php echo $segundosrestantes; ?></button>

                        @elseif ($segundosrestantes >= 30)
                            <button type="button" class="btn btn-success"></i><?php echo $segundosrestantes; ?></button>
                        @endif
                    </td>
                    <td>{{ $documento->observaciones }}</td> 
                    
                     <td>
                        <div class="fonticon-container">
                            <button type="button" data-toggle="modal" data-target="#modalact{{$loop->index}}"  class="btn btn-icon btn-primary">
                                <i   class="la la-rotate-right" title="Actualizar"></i></button>
                        </div>
                            <div class="fonticon-container">
                            <form method="POST" action="{{URL('/trabajadores/delete')}}" id="eliminar">
                                {{ csrf_field() }}
                                {{method_field('PUT')}}
                            <input type="hidden" id="id" name="id" value="{{ $documento->id}}">
                            <input type="hidden" id="act" name="act" value="{{ $documento->actividad}}">
                            <button type="submit" class="btn btn-icon btn-danger" onclick="return confirm('¿Está seguro de eliminar?')"><i class="la la-trash-o"></i></button> 
                            </form>
                        </div>

                         <div class="modal fade" id="modalact{{$loop->index}}" tabindex="-1" role="dialog" aria-labelledby="modalact" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modaldoc">Editar: </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="{{URL('/trabajadores/docs')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}
                            <fieldset class="form-group col-xl-8 col-lg-6 col-md-12">Nombre documento:
                            <input type="text" class="form-control"  class="form-control" name="name" id="name" value="{{ $documento->nombre }}" required>  
                            </fieldset>
                            <fieldset class="form-group col-xl-8 col-lg-6 col-md-12">Estado de Gestión:</label><br/>
                            <select class="form-control" name="gestion">
                            @if ($documento->estado == "na")
                            <option value="na">N/A</option>
                            <option value="norealizado">No Realizado</option>
                            <option value="proceso">En Proceso</option>
                            <option value="realizado">Realizado</option> 

                            @elseif ($documento->estado == "norealizado")
                            <option value="norealizado">No Realizado</option>
                            <option value="na">N/A</option>
                            <option value="proceso">En Proceso</option>
                            <option value="realizado">Realizado</option> 

                            @elseif ($documento->estado == "realizado")
                            <option value="realizado">Realizado</option> 
                            <option value="na">N/A</option>
                            <option value="norealizado">No Realizado</option>
                            <option value="proceso">En Proceso</option>

                            @elseif ($documento->estado == "proceso")
                            <option value="proceso">En Proceso</option>
                            <option value="na">N/A</option>
                            <option value="norealizado">No Realizado</option>
                            <option value="proceso">En Proceso</option>
                            <option value="realizado">Realizado</option>     
                            @endif
                                           
                            </select>
                            </fieldset>
                            <fieldset class="form-group col-xl-8 col-lg-6 col-md-12">Vigencia del documento:</label>
                            <input type="date" class="form-control" name="indicador" id="indicador" value="{{ $documento->indicador }}" required><br/>
                            </fieldset>
                            <fieldset class="form-group col-xl-8 col-lg-6 col-md-12">Observaciones:</label>
                            <input type="text" class="form-control" name="observaciones" id="observaciones" value="{{ $documento->observaciones }}" ><br/>
                            </fieldset>
                            <fieldset class="form-group col-xl-8 col-lg-6 col-md-12">Documento:</label>
                            <input type="file" name="docs" id="docs" ><br/>
                            </fieldset>      
                            <input type="hidden" name="dato" id="dato" value="{{$trabajador->id}}"> 
                            <input type="hidden" name="documento" id="documento" value="{{$documento->id}}"> 
                            <input type="hidden" name="data" id="data" value="{{$trabajador->empresa_id}}">                
                          </div>
                          <div class="modal-footer">   
                            <button type="summit" class="btn btn-success">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          </div>
                        </form>
                        </div>
                      </div>      
                    </div>
                    </td>
                </tr>
                @empty
                <div class="alert alert-danger">
                <li>No hay Documentos.</li>
                </div>
                @endforelse
            </tbody>
        </table>
    </div>
</div></div></div></div></section></div>
@endsection