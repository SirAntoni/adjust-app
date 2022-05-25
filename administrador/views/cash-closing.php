<?php  if($_SESSION['caja'] == 1){ ?>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Cierre de caja</h4>
    </div>
</div>
<!-- row -->

<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTableClosingCash" class="table table-stripe table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th width="10px">Fecha / Hora</th>
                                <th>Usuario</th>
                                <th>Caja inicial</th>
                                <th>Ingresos</th>
                                <th>Gastos</th>
                                <th>Total</th>
                                <th>Fecha/Cierre</th>
                                <th width="10px">Estado</th>
                                <th>created_at</th>
                                <th>updated_at</th>
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

<div class="modal fade" id="modalClosingCash" tabindex="-1" role="dialog" aria-labelledby="modalClosingCash"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cerrar caja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCloseBox">
                <div class="modal-body">
                    <input type="hidden" value="close_cash" name="option">
                    <input type="hidden" class="id" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="box_initial">Caja Inicial</label>
                                <input type="number" step="0.1" name="box_initial" id="box_initial" class="form-control" placeholder="Caja inicial">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="total_incomes">Total ingresos</label>
                                <input type="number" step="0.1" name="total_incomes" id="total_incomes" class="form-control" placeholder="Total ingresos">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total_expenses">Total gastos</label>
                                <input type="number" step="0.1" name="total_expenses" id="total_expenses" class="form-control" placeholder="Total gastos">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total_box">Total caja</label>
                                <input type="number" step="0.1" name="total_box" id="total_box" class="form-control" placeholder="Total caja">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Cerrar Caja</button>
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