<?php  if($_SESSION['usuarios'] == 1){ ?>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Usuarios</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <button type="button" data-toggle="modal" data-target="#modalAddUsers"
            class="btn btn-primary btn-icon-text mb-2 mb-md-0 mr-2">
            <i class="btn-icon-prepend mr-2" data-feather="plus-square"></i>
            Agregar usuario
        </button>
    </div>
</div>
<!-- row -->

<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTableUsers" class="table table-stripe table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Rol</th>
                                <th width="10px">Acción</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row -->


<!-- Modals -->

<div class="modal fade" id="modalAddUsers" tabindex="-1" role="dialog" aria-labelledby="modalAddUsers"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formAddUsers">
                <div class="modal-body">
                    <input type="hidden" value="insert" name="option">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="user" class="form-control" placeholder="Usuario">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Nombres">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="last_name" class="form-control" placeholder="Apellidos">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="rol">
                                    <option value="">Seleccione un rol</option>
                                    <option value="0">Administrador</option>
                                    <option value="1">Usuario</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <h6 class="mb-0">Permisos</h6>
                            <hr class="my-2">
                        </div>
                       
                        <div id="permissions" class="col-12">
                            
                        </div>
                        


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditUsers" tabindex="-1" role="dialog" aria-labelledby="modalEditUsers"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditUsers">
                <div class="modal-body">
                    <input type="hidden" value="update" name="option">
                    <input type="hidden" class="id" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="user" id="user" class="form-control" placeholder="Usuario">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombres">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="last_name" id="last_name" class="form-control"
                                    placeholder="Apellidos">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="rol" id="rol">
                                    <option value="">Seleccione un rol</option>
                                    <option value="0">Administrador</option>
                                    <option value="1">Usuario</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <h6 class="mb-0">Permisos</h6>
                            <hr class="my-2">
                        </div>
                       
                        <div id="permissions_edit" class="col-12">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDeleteUsers" tabindex="-1" role="dialog" aria-labelledby="modalDeleteUsers"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="formDeleteUsers">
                <div class="modal-body">
                    <input type="hidden" value="delete" name="option">
                    <input type="hidden" class="id" name="id">
                    <div class="d-flex justify-content-center align-items-center p-4">
                        <div class="mr-3">
                            <i class="fas fa-question-circle" style="color:#d03433; font-size:5em;"></i>
                        </div>
                        <div class="modal-icon">
                            <h4>Eliminar</h4>
                            <p>¿Estás seguro de querer borrar el registro?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }else{?>

<div class="d-flex justify-content-center align-items-center flex-wrap grid-margin p-5">
    <img src="assets/images/401.svg" width="100%" alt="security">
</div>


<?php } ?>