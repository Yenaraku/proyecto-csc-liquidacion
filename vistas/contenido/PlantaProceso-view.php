<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="file"></i></div>
                        Gestion Planta De Proceso
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
        <button class="btn btn-light btn-sm" type="button" data-toggle="modal" data-target="#modalPlantaProceso">
            <i class="fas fa-plus-circle icon-text"></i> Agregar Planta de proceso
        </button>
    </div>
    <div class="card-body">
    <!-- Modal -->
        <div class="modal fade" id="modalPlantaProceso" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalPlantaProcesoTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <form class="formularios_ajax" action="" method="POST" data-form="save">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalPlantaProcesoTitle">Agregar Planta de Proceso</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="small mb-1" for="txCodigo">Codigo*</label>
                                    <input class="form-control" id="txCodigo" type="text" placeholder="Codigo de la planta" />
                                </div>
                                <div class="form-group col-md-9">
                                    <label class="small mb-1" for="txreginvima">Registro Invima*</label>
                                    <input class="form-control" id="txreginvima" type="text" placeholder="Registro Invima" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-9">
                                    <label class="small mb-1" for="txplantaproceso">Nombre de Planta*</label>
                                    <input class="form-control" id="txplantaproceso" type="text" placeholder="Nombre de Planta" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="small mb-1" for="slCiudad">Ciudad*</label>
                                    <select class="form-control" id="slCiudad">
                                        <option value="UND">Barranquilla</option>
                                        <option value="KG">Bucaramanga</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="small mb-1" for="txVSacrificio">Valor Sacrificio*</label>
                                    <input class="form-control" id="txVSacrificio" type="text" placeholder="Valor Sacrificio" />
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
                                <th>Planta</th>
                                <th>Registro Invima</th>
                                <th>Ciudad</th>
                                <th>Valor</th>
                                <th>Nota</th>
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