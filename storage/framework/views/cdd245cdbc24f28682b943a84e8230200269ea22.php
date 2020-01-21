<?php $__currentLoopData = $equip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->startSection('ruta', 'Detalle de Equipamento'); ?>


<?php $__env->startSection('content'); ?>
<?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e($equipo->nombre); ?>" readonly="readonly">
        	</fieldset>
        	<fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> Referencia:
            <input type="text" class="form-control" id="referencia" name="referencia" value="<?php echo e($equipo->referencia); ?>" readonly="readonly">
        	</fieldset>
        	<fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> Modelo:
            <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo e($equipo->modelo); ?>" readonly="readonly">
        	</fieldset>
        	<fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> Marca:
            <input type="text" class="form-control" id="marca" name="marca" value="<?php echo e($equipo->marca); ?>" readonly="readonly">
        	</fieldset>
        	<fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> Empresa:
            <input type="text" class="form-control" id="id" name="id" value="<?php echo e($equipo->empresa_id); ?>" readonly="readonly">
        	</fieldset>
            <fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> 
        	<a href="<?php echo e(url('/equipamento/'.$equipo->empresa_id)); ?>"><button type="button" class="btn btn-light btn-min-width mr-1 mb-1">Volver</button></a>
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
            <form method="POST" action="<?php echo e(URL('equipamento/update/'.$equipo->id)); ?>">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PUT')); ?>

                <fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> Nombres:
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e($equipo->nombre); ?>" >
                </fieldset>
                <fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> Rut:
                <input type="text" class="form-control" id="referencia" name="referencia" value="<?php echo e($equipo->referencia); ?>">
                </fieldset>
                <fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> Cargo:
                <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo e($equipo->modelo); ?>" >
                </fieldset>
                <fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> Actividades:
                <input type="text" class="form-control" id="marca" name="marca" value="<?php echo e($equipo->marca); ?>">
                </fieldset>
                <fieldset class="form-group col-xl-4 col-lg-6 col-md-12"> Empresa:
                <input type="text" class="form-control" id="empresa" name="empresa" value="<?php echo e($equipo->empresa_id); ?>" readonly="readonly" >
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
            <form method="POST" action="<?php echo e(URL('/documentosEquip')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

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
            <input type="hidden" name="dato" id="dato" value="<?php echo e($equipo->id); ?>">                    
          </div>
          <div class="modal-footer">   
            <button type="summit" class="btn btn-success">Guardar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </form>
        </div>
      </div>      
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content2'); ?>
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
                <?php $__empty_1 = true; $__currentLoopData = $doc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><b><?php echo e($documento->nombre); ?></b></td>
                    <td>
                        <?php if($documento->estado == "na"): ?>
                            <button type="button" class="btn btn-light btn-min-width"><i class="la la-times"></i> No Aplica</button>

                        <?php elseif($documento->estado == "norealizado"): ?>
                            <button type="button" class="btn btn-danger btn-min-width"><i class="la la-frown-o"></i> No Realizado</button>

                        <?php elseif($documento->estado == "realizado"): ?>
                            <button type="button" class="btn btn-success btn-min-width"><i class="la la-flag-checkered"></i> Realizado</button>

                        <?php elseif($documento->estado == "proceso"): ?>
                            <button type="button" class="btn btn-warning btn-min-width"><i class="la la-cogs"></i> En Proceso</button>
                        <?php endif; ?>

                    </td>
                    
                    <td>
                        <!--<button type="button" href="<?php echo e(asset("storage/$documento->actividad")); ?>">Ver</button>-->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo e($loop->index); ?>">
                          Ver Documento
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo e($loop->index); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel<?php echo e($loop->index); ?>"><?php echo e($documento->nombre); ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <embed src="<?php echo e(asset("storage/$documento->actividad")); ?>" type="application/pdf" width="100%" height="500px" />
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
                    

                    <td><?php echo e($documento->indicador); ?></td>
                    <td>
                        <?php if($segundosrestantes < "0"): ?>
                            <button type="button" class="btn btn-danger ">Vencido</i></button>

                        <?php elseif($segundosrestantes == "0"): ?>
                            <button type="button" class="btn btn-danger "></i><?php echo $segundosrestantes; ?></button>

                        <?php elseif($segundosrestantes < 29): ?>
                            <button type="button" class="btn btn-warning"></i><?php echo $segundosrestantes; ?></button>

                        <?php elseif($segundosrestantes >= 30): ?>
                            <button type="button" class="btn btn-success"></i><?php echo $segundosrestantes; ?></button>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($documento->observaciones); ?></td> 
                    
                    <td>
                        <div class="fonticon-container">
                            <button type="button" data-toggle="modal" data-target="#modalact<?php echo e($loop->index); ?>"  class="btn btn-icon btn-primary">
                                <i   class="la la-rotate-right" title="Actualizar"></i></button>
                        </div>
                            <div class="fonticon-container">
                            <form method="POST" action="<?php echo e(URL('/equipamento/delete')); ?>" id="eliminar">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('PUT')); ?>

                            <input type="hidden" id="id" name="id" value="<?php echo e($documento->id); ?>">
                            <input type="hidden" id="act" name="act" value="<?php echo e($documento->actividad); ?>">
                            <button type="submit" class="btn btn-icon btn-danger" onclick="return confirm('¿Está seguro de eliminar?')"><i class="la la-trash-o"></i></button> 
                            </form>
                        </div>

                         <div class="modal fade" id="modalact<?php echo e($loop->index); ?>" tabindex="-1" role="dialog" aria-labelledby="modalact" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modaldoc">Editar: </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="<?php echo e(URL('/equipamento/docs')); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>

                            <fieldset class="form-group col-xl-8 col-lg-6 col-md-12">Nombre documento:
                            <input type="text" class="form-control"  class="form-control" name="name" id="name" value="<?php echo e($documento->nombre); ?>" required>  
                            </fieldset>
                            <fieldset class="form-group col-xl-8 col-lg-6 col-md-12">Estado de Gestión:</label><br/>
                            <select class="form-control" name="gestion">
                            <?php if($documento->estado == "na"): ?>
                            <option value="na">N/A</option>
                            <option value="norealizado">No Realizado</option>
                            <option value="proceso">En Proceso</option>
                            <option value="realizado">Realizado</option> 

                            <?php elseif($documento->estado == "norealizado"): ?>
                            <option value="norealizado">No Realizado</option>
                            <option value="na">N/A</option>
                            <option value="proceso">En Proceso</option>
                            <option value="realizado">Realizado</option> 

                            <?php elseif($documento->estado == "realizado"): ?>
                            <option value="realizado">Realizado</option> 
                            <option value="na">N/A</option>
                            <option value="norealizado">No Realizado</option>
                            <option value="proceso">En Proceso</option>

                            <?php elseif($documento->estado == "proceso"): ?>
                            <option value="proceso">En Proceso</option>
                            <option value="na">N/A</option>
                            <option value="norealizado">No Realizado</option>
                            <option value="proceso">En Proceso</option>
                            <option value="realizado">Realizado</option>     
                            <?php endif; ?>
                                           
                            </select>
                            </fieldset>
                            <fieldset class="form-group col-xl-8 col-lg-6 col-md-12">Vigencia del documento:</label>
                            <input type="date" class="form-control" name="indicador" id="indicador" value="<?php echo e($documento->indicador); ?>" required><br/>
                            </fieldset>
                            <fieldset class="form-group col-xl-8 col-lg-6 col-md-12">Observaciones:</label>
                            <input type="text" class="form-control" name="observaciones" id="observaciones" value="<?php echo e($documento->observaciones); ?>" ><br/>
                            </fieldset>
                            <fieldset class="form-group col-xl-8 col-lg-6 col-md-12">Documento:</label>
                            <input type="file" name="docs" id="docs" ><br/>
                            </fieldset>      
                            <input type="hidden" name="dato" id="dato" value="<?php echo e($equipo->id); ?>"> 
                            <input type="hidden" name="documento" id="documento" value="<?php echo e($documento->id); ?>"> 
                            <input type="hidden" name="data" id="data" value="<?php echo e($equipo->empresa_id); ?>">                
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="alert alert-danger">
                <li>No hay Documentos.</li>
                </div>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>
</section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\enlace\resources\views/equipment/details.blade.php ENDPATH**/ ?>