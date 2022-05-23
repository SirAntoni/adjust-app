<?php  if($_SESSION['reportes'] == 1){ ?>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Reportes</h4>
    </div>
   <!--div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="main?module=purchases" class="btn btn-primary btn-icon-text mb-2 mb-md-0 mr-2">
            <i class="btn-icon-prepend mr-2" data-feather="arrow-left-circle"></i>
            Ir a compras
        </a>
        <a href="main?module=purchases" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0 mr-2">
            <i class="btn-icon-prepend mr-2" data-feather="shopping-cart"></i>
            Realizar compra
        </a>
    </div--> 

</div>
<!-- row -->
<div class="row">
    <div class="col-12 col-xl-4 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-header">
                Reporte Diario
            </div>
            <form id="formReportDaily">
                <input type="hidden" name="option" value="report_daily">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group date datepicker" id="report-daily-datepicker">
                                    <input type="text" name="date" class="form-control"><span class="input-group-addon"><i
                                            data-feather="calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block btn-icon-text mb-2 mb-md-0 mr-2"><i
                                    class="btn-icon-prepend mr-2 mt-0 pt-0" data-feather="file-text"></i>Generar
                                reporte</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-xl-4 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-header">
                Reporte Mensual
            </div>
            <form id="formReportMonth">
                <input type="hidden" name="option" value="report_month">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="month" id="month">
                                    <option value="01">Enero</option>
                                    <option value="02">Febrero</option>
                                    <option value="03">Marzo</option>
                                    <option value="04">Abril</option>
                                    <option value="05">Mayo</option>
                                    <option value="06">Junio</option>
                                    <option value="07">Julio</option>
                                    <option value="08">Agosto</option>
                                    <option value="09">Setiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="year" id="year">
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block btn-icon-text mb-2 mb-md-0 mr-2"><i
                                    class="btn-icon-prepend mr-2 mt-0 pt-0" data-feather="file-text"></i>Generar
                                reporte</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-xl-4 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-header">
                Reporte Personalizado
            </div>
            <form id="formReportCustom">
                <input type="hidden" name="option" value="report_custom">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group date datepicker" id="report-custom-start-datepicker">
                                    <input type="text" name="startDate" class="form-control"><span class="input-group-addon"><i
                                            data-feather="calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group date datepicker" id="report-custom-end-datepicker">
                                    <input type="text" name="endDate" class="form-control"><span class="input-group-addon"><i
                                            data-feather="calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="custom" class="btn btn-primary btn-block btn-icon-text mb-2 mb-md-0 mr-2"><i
                                    class="btn-icon-prepend mr-2 mt-0 pt-0" data-feather="file-text"></i>Generar
                                reporte</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- row -->

<?php }else{?>

<div class="d-flex justify-content-center align-items-center flex-wrap grid-margin p-5">
    <img src="assets/images/401.svg" width="100%" alt="security">
</div>


<?php } ?>