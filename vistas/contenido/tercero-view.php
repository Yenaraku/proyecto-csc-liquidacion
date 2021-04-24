<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="file"></i></div>
                        Gestion de Tercero
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">Clientes y Proveedores</div>
            </div>
        </div>
    </div>
</header>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <button class="btn btn-light btn-sm" type="button" data-toggle="modal" data-target="#modalTercero">
                <i class="fas fa-plus-circle icon-text"></i> Agregar Tercero
            </button>
        </div>
        <div class="card-body">
            <!-- Modal -->
            <div class="modal fade" id="modalTercero" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalTerceroTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <form class="formularios_ajax" action="" method="POST" data-form="save">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTerceroTitle">Agregar Tercero</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-row">
                                    <!-- Form Group (organization name)-->
                                    <div class="form-group col-md-3">
                                        <label class="small mb-1" for="slTipoDoc">Tipo Doc*</label>
                                        <select class="form-control" id="slTipoDoc">
                                            <option value="">NIT</option>
                                            <option value="">CC</option>
                                        </select>
                                    </div>
                                    <!-- Form Group (location)-->
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1" for="txIdentificacion">Identificacion*</label>
                                        <input class="form-control" id="txIdentificacion" type="text" placeholder="Numero de Identificacion" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="txNombreCliente">Razon Social*</label>
                                    <input class="form-control" id="txNombreCliente" type="text" placeholder="Nombre del Cliente" />
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1" for="txTelefono">Telefono*</label>
                                        <input class="form-control" id="txTelefono" type="text" placeholder="Numero de Telefono" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1" for="txCelular">Celular</label>
                                        <input class="form-control" id="txCelular" type="text" placeholder="Numero de Celular" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1" for="txTelefono">Direccion*</label>
                                        <input class="form-control" id="txTelefono" type="text" placeholder="Direccion" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="small mb-1" for="txCelular">E-Mail</label>
                                        <input class="form-control" id="txCelular" type="text" placeholder="Correo Electronico" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="txNombreCliente">Contacto</label>
                                    <input class="form-control" id="txNombreCliente" type="text" placeholder="Contacto" />
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 border rounded">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="chCliente" value="option1">
                                            <label class="form-check-label" for="chCliente">Cliente</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="chPorveedor" value="option2">
                                            <label class="form-check-label" for="chPorveedor">Proveedor</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="chEstado">
                                            <label class="form-check-label" for="chEstado">Activo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-light" type="button" data-dismiss="modal">Cancelar</button>
                                <button class="btn btn-dark bg-vino" type="submit">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 mb-12">     
                    <div class="datatable">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Doc</th>
                                    <th>Identificacion</th>
                                    <th>Razon Social</th>
                                    <th>Tercero</th>
                                    <th># Sucursales</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>