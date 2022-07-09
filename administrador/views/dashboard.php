<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4>Dashboard</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap mt-2 mt-md-0">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-outline-primary dropdown-toggle btn-icon-text mb-2 mb-md-0" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="btn-icon-prepend mr-2" data-feather="grid"></i> Accesos directos
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="main?module=marcas"><i data-feather="chevron-right" class="icon-dd"></i> Agregar marca</a>
                <a class="dropdown-item" href="main?module=tipos"><i data-feather="chevron-right" class="icon-dd"></i> Agregar tipo</a>
                <a class="dropdown-item" href="main?module=modelos"><i data-feather="chevron-right" class="icon-dd"></i> Agregar modelo</a>
                <a class="dropdown-item" href="main?module=anios"><i data-feather="chevron-right" class="icon-dd"></i> Agregar año</a>
            </div>
        </div>
    </div>
</div>

<!-- row -->
<div class="row">
    <div class="col-12 col-md-4 grid-margin stretch-card cantidad-alumnos">
        <div class="card overflow-hidden bg-primary text-dark">
            <div class="card-header">Autos</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 col-md-12 col-xl-8">
                        <h3 id="dashboard_autos" class="my-2 text-center text-dark"></h3>
                    </div>
                    <div class="col-6 col-md-12 col-xl-4 text-center">
                        <i class="fas fa-car fa-2x text-dark" style="font-size: 4em !important;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4 grid-margin stretch-card">
        <div class="card overflow-hidden bg-warning text-dark">
            <div class="card-header">
                Categorias Asginadas
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-6 col-md-12 col-xl-8">
                        <h3 id="dashboard_categorias" class="my-2 text-center text-dark"></h3>
                    </div>
                    <div class="col-6 col-md-12 col-xl-4 text-center">
                        <i class="fas fa-car fa-2x text-dark" style="font-size: 4em !important;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4 grid-margin stretch-card ">
        <div class="card overflow-hidden text-white bg-success">
            <div class="card-header">Autopartes asignadas</div>
            <div class="card-body">
                <div class="row">
                <div class="col-6 col-md-12 col-xl-8">
                        <h3 id="dashboard_partes" class="my-2 text-center text-dark"></h3>
                    </div>
                    <div class="col-6 col-md-12 col-xl-4 text-center">
                        <i class="fas fa-car fa-2x text-dark" style="font-size: 4em !important;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row -->
