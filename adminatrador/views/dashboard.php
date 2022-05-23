<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4>Dashboard</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap mt-2 mt-md-0">
        <button type="button" data-toggle="modal" data-target="#modalExchangeRate"
            class="btn btn-primary btn-icon-text mb-2 mb-md-0 mr-2">
            <i class="btn-icon-prepend mr-2" data-feather="dollar-sign"></i>
            Tipo de cambio
        </button>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-outline-primary dropdown-toggle btn-icon-text mb-2 mb-md-0" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="btn-icon-prepend mr-2" data-feather="grid"></i> Accesos directos
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="main?module=add-sale"><i data-feather="chevron-right" class="icon-dd"></i> Generar Venta</a>
                <?php  if($_SESSION['rol'] == 0) { ?><a class="dropdown-item" href="main?module=add-purchase"><i data-feather="chevron-right" class="icon-dd"></i> Generar Compra</a><?php } ?>
            </div>
        </div>
    </div>
</div>

<!-- row -->
<div class="row">
    <div class="col-12 col-md-4 grid-margin stretch-card cantidad-alumnos">
        <div class="card overflow-hidden bg-primary text-dark">
            <div class="card-header">Caja</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 col-md-12 col-xl-8">
                        <h3 id="dashboard_box" class="my-2 text-center text-dark"></h3>
                    </div>
                    <div class="col-6 col-md-12 col-xl-4 text-center">
                        <i class="fas fa-dollar-sign fa-2x text-dark" style="font-size: 4em !important;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4 grid-margin stretch-card">
        <div class="card overflow-hidden bg-warning text-dark">
            <div class="card-header">
                Compras
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-6 col-md-12 col-xl-8">
                        <h3 id="dashboard_purchases" class="my-2 text-center text-dark"></h3>
                    </div>
                    <div class="col-6 col-md-12 col-xl-4 text-center">
                        <i class="fas fa-cart-plus fa-2x text-dark" style="font-size: 4em !important;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4 grid-margin stretch-card ">
        <div class="card overflow-hidden text-white bg-success">
            <div class="card-header">Ventas</div>
            <div class="card-body">
                <div class="row">
                <div class="col-6 col-md-12 col-xl-8">
                        <h3 id="dashboard_sales" class="my-2 text-center text-dark"></h3>
                    </div>
                    <div class="col-6 col-md-12 col-xl-4 text-center">
                        <i class="fas fa-shopping-cart fa-2x text-dark" style="font-size: 4em !important;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row -->

<!-- row -->
<div class="row">
    <div class="col-12 col-md-4 grid-margin stretch-card cantidad-alumnos">
        <div class="card overflow-hidden bg-info text-dark">
            <div class="card-header">
                Clientes
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        <h3 id="dashboard_clients" class="my-2 text-center text-dark">0</h3>
                    </div>
                    <div class="col-6 col-md-12 col-xl-7 text-center">
                        <i class="fas fa-user-plus fa-2x text-dark" style="font-size: 4em !important;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4 grid-margin stretch-card">
        <div class="card overflow-hidden bg-danger text-white">
            <div class="card-header">
                Proveedores
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        <h3 id="dashboard_providers" class="my-2 text-center text-white">0</h3>
                    </div>
                    <div class="col-6 col-md-12 col-xl-7 text-center">
                        <i class="fas fa-users fa-2x text-white" style="font-size: 4em !important;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4 grid-margin stretch-card ">
        <div class="card overflow-hidden text-white bg-dark">
            <div class="card-header">Articulos</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        <h3 id="dashboard_articles" class="my-2 text-center text-white">0</h3>
                    </div>
                    <div class="col-6 col-md-12 col-xl-7 text-center">
                        <i class="fa fa-th fa-2x text-white" style="font-size: 4em !important;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row -->

<div class="modal fade" id="modalExchangeRate" tabindex="-1" role="dialog" aria-labelledby="modalExchangeRate"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tipo de cambio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formExchangeRate">
                <div class="modal-body">
                    <input type="hidden" value="update_exchange_rate" name="option">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" id="exchange_rate" name="exchange_rate" class="form-control" placeholder="Tipo de cambio">
                            </div>
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
