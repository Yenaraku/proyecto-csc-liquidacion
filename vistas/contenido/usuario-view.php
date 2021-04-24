<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="file"></i></div>
                        Gestion de Usuarios
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">Control de Sesion</div>
            </div>
        </div>
    </div>
</header>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <button class="btn btn-light btn-sm btn-opcion" type="button" data-opcion="registrar" data-toggle="modal" data-target="#modalAgregarUsuario">
                <i class="fas fa-plus-circle icon-text"></i> Agregar Usuario
            </button>
        </div>
        <div class="card-body">
            <!-- Modal Agregar Usuario -->
            <div class="modal fade" id="modalAgregarUsuario" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalAgregarUsuarioTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <form class="formularios_ajax" action="<?php echo SERVERURL;?>ajax/usuarioAjax.php" method="POST" data-form="save" autocomplete"off">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAgregarUsuarioTitle">Agregar Usuario</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="opcion" value="">
                                <input type="hidden" name="id" value="0">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1">Nombres*</label>
                                        <input class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ]{1,35}" maxlength="35" name="usuario_nombre_reg" type="text" placeholder="Digite Nombres" required="" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1">Apellido*</label>
                                        <input class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ]{1,35}" maxlength="35" name="usuario_apellido_reg"  type="text" placeholder="Digite Apellidos" required=""/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1">Cedula</label>
                                    <input class="form-control" pattern="[0-9-]{10,10}" name="usuario_cedula_reg" maxlength="10" type="text" placeholder="No. Cedula" required="" />
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1">Usuario*</label>
                                        <input class="form-control" patter="[a-zA-Z0-9]{1,35}" name="usuario_usuario_reg" type="text" placeholder="Nombre de Usuario" required="" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1">Tipo Usuario*</label>
                                        <select class="form-control" name="usuario_Tipo_reg" required="">
                                            <option value="1">Administrador</option>
                                            <option value="2">Auxiliar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1">Contraseña*</label>
                                        <input class="form-control" pattern="[a-zA-Z0-9]{7,50}" name="usuario_clave_reg" type="password" placeholder="Ingresa Contraseña" required="" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1">Repetir*</label>
                                        <input class="form-control" pattern="[a-zA-Z0-9]{7,50}" name="usuario_repetir_reg" type="password" placeholder="Repetir Contraseña" required="" />
                                    </div>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="usuario_estado_reg" type="checkbox" value="A" required="">
                                    <label class="form-check-label" >Activo</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-light" type="button" data-dismiss="modal">Cancelar</button>
                                <button class="btn btn-dark bg-vino" type="submit">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- Fin Modal Agregar Usuario -->

            <!-- Modal Actualizar Usuario -->
            <div class="modal fade" id="modalActualizarUsuario" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalActualizarUsuarioTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <form class="formularios_ajax" action="<?php echo SERVERURL;?>ajax/usuarioAjax.php" method="POST" data-form="update" autocomplete"off">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalActualizarUsuarioTitle">Actualizar Usuario</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="opcion" value="">
                                <input type="hidden" name="id" value="0">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1">Nombres*</label>
                                        <input class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ]{1,35}" maxlength="35" name="usuario_nombre_reg" type="text" placeholder="Digite Nombres" required="" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1">Apellido*</label>
                                        <input class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ]{1,35}" maxlength="35" name="usuario_apellido_reg"  type="text" placeholder="Digite Apellidos" required=""/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1">Cedula</label>
                                    <input class="form-control" pattern="[0-9-]{10,10}" name="usuario_cedula_reg" maxlength="10" type="text" placeholder="No. Cedula" required="" />
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1">Usuario*</label>
                                        <input class="form-control" patter="[a-zA-Z0-9]{1,35}" name="usuario_usuario_reg" type="text" placeholder="Nombre de Usuario" required="" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1">Tipo Usuario*</label>
                                        <select class="form-control" name="usuario_Tipo_reg" required="">
                                            <option value="1">Administrador</option>
                                            <option value="2">Auxiliar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1">Contraseña*</label>
                                        <input class="form-control" pattern="[a-zA-Z0-9]{7,50}" name="usuario_clave_reg" type="password" placeholder="Ingresa Contraseña" required="" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1">Repetir*</label>
                                        <input class="form-control" pattern="[a-zA-Z0-9]{7,50}" name="usuario_repetir_reg" type="password" placeholder="Repetir Contraseña" required="" />
                                    </div>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="usuario_estado_reg" type="checkbox" value="A" required="">
                                    <label class="form-check-label" >Activo</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-light" type="button" data-dismiss="modal">Cancelar</button>
                                <button class="btn btn-dark bg-vino" type="submit">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- Fin Modal Actualizar Usuario -->

            <div class="row">
                <div class="col-xl-12 mb-12">     
                    <div class="datatable">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre Apellido</th>
                                    <th>Cedula</th>
                                    <th>Usuario</th>
                                    <th>Tipo</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                
                                include_once './controladores/usuarioControlador.php';

                                $objControlador = new usuarioControlador();

                                $listar = $objControlador->listar_usuario_controlador();
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>