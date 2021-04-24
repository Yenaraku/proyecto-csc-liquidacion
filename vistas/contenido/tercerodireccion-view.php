<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="file"></i></div>
                        Gestion de Sucursales
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">Direcciones y Contactos</div>
            </div>
        </div>
    </div>
</header>
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Terceros</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sucursales</li>
        </ol>
    </nav>
    <div class="card card-header-actions mx-auto">
        <div class="card-header">
            <p class=".h3" style="margin-bottom: 0;">
                ALFREDO DE LA HOZ BELTRAN<br>
                <small class="text-muted">CC 1140987654</small>
            </p>
            <button class="btn btn-light btn-sm" type="button" data-toggle="modal" data-target="#modalTercero">
                <i class="fas fa-plus-circle icon-text"></i> Agregar Sucursal
            </button>
        </div>
        <div class="card-body">
            <!-- Modal -->
            <div class="modal fade" id="modalTercero" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalTerceroTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <form class="formularios_ajax" action="" method="POST" data-form="save">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTerceroTitle">Agregar Sucursal</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label class="small mb-1" for="txSec">Sec</label>
                                        <input class="form-control" id="txSec" type="text" placeholder="0" disabled/>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label class="small mb-1" for="txSucursal">Sucursal*</label>
                                        <input class="form-control" id="txSucursal" type="text" placeholder="Nombre de Sucursal" />
                                    </div>
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
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="chEstado">
                                    <label class="form-check-label" for="chEstado">Activo</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-light" type="button" data-dismiss="modal">Cancelar</button>
                                <button class="btn btn-dark bg-vino" type="button">Guardar</button>
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
                                    <th>Sec</th>
                                    <th>Sucursal</th>
                                    <th>Direccion</th>
                                    <th>Email</th>
                                    <th>Telefono</th>
                                    <th>Celular</th>
                                    <th>Contacto</th>
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