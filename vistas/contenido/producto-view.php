<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="file"></i></div>
                        Gestion de Producto
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3"></div>
            </div>
        </div>
    </div>
</header>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <button class="btn btn-light btn-sm" type="button" data-toggle="modal" data-target="#modalProducto">
                <i class="fas fa-plus-circle icon-text"></i> Agregar Producto
            </button>
        </div>
        <div class="card-body">
            <!-- Modal -->
            <div class="modal fade" id="modalProducto" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalProductoTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form class="formularios_ajax" action="" method="POST" data-form="save">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalProductoTitle">Agregar Producto</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-row">
                                <!-- Form Group (organization name)-->
                                    <div class="form-group col-md-4">
                                        <label class="small mb-1" for="slTipoAnimal">Tipo Animal*</label>
                                            <select class="form-control" id="slTipoAnimal">
                                                <option value="">Res</option>
                                                <option value="">Cerdo</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label class="small mb-1" for="txCodigo">Codigo*</label>
                                        <input class="form-control" id="txCodigo" type="text" placeholder="Codigo del Producto" />
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="small mb-1" for="txProducto">Producto*</label>
                                        <input class="form-control" id="txProducto" type="text" placeholder="Nombre del Producto" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="small mb-1" for="slUnidad">Unidad Medida*</label>
                                            <select class="form-control" id="slUnidad">
                                                <option value="UND">Unidad</option>
                                                <option value="KG">Kilogramo</option>
                                            </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="chInventario">
                                            <label class="form-check-label" for="chInventario">Maneja Inventario*</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="txNota">Nota</label>
                                    <textarea class="form-control" id="txNota" rows="3"></textarea>
                                </div>
                                <div class="form-row">
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
                                    <th>Codigo</th>
                                    <th>Producto</th>
                                    <th>Tipo</th>
                                    <th>Medida</th>
                                    <th>Inventario</th>
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
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>