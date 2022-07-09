$(function() {
    list_users();
    add_user();
    edit_user();
    delete_user();
    list_clients();
    add_client();
    edit_client();
    delete_client();
    list_providers();
    add_provider();
    edit_provider();
    delete_provider();
    select_brands();
    select_categories();
    list_articles();
    add_article();
    edit_article();
    delete_article();
    list_categories();
    list_brands();
    add_category();
    edit_category();
    delete_category();
    add_brand();
    edit_brand();
    delete_brand();
    list_contacts();
    add_contact();
    edit_contact();
    delete_contact();

    list_paymentMethods();
    add_paymentMethod();
    edit_paymentMethod();
    delete_paymentMethod();

    select_paymentMethods();
    select_contacts();

    get_settings();
    update_settings();
    update_exchange_rate();

    list_cash();
    list_cash_all();
    validate_cash();
    open_cash();

    list_incomes();
    add_income();

    list_expenses();
    add_expense();

    list_purchases();
    select_providers();
    delete_purchase();

    list_add_articles();
    listar_cart_purchase();
    tax();
    purchase();
    select_clients();

    list_vouchers();
    add_voucher();
    edit_voucher();
    delete_voucher();
    select_voucher();
    get_voucher();

    list_sales();
    sale();
    delete_sale();
    get_cash_initial();
    get_cash_close();
    close_cash();

    //dashboard_cards();
    edit_price_article();


    report_daily();
    report_month();
    report_custom();
    permissions();
    on_price_delivery();

    apply_delivery();

    Notiflix.Loading.Init({ svgColor: "#ecf0f1" });
    Notiflix.Notify.Init({ position: "right-bottom", });
})

var apply_delivery = function() {
    $("#apply_delivery").click(function() {

        var price_delivery = $("#price_delivery").val();

        $.ajax({
            url: "controller/cartController.php",
            data: "option=apply_delivery&price_delivery=" + price_delivery,
            type: "POST",
            success: function(response) {

                Notiflix.Loading.Remove();
                var response = JSON.parse(response);
                if (response.status == "error") {

                    Swal.fire({
                        title: 'Error',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })

                } else {
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })
                    $("#validate_delivery").val("1");
                    listar_cart_purchase();
                }


            }
        })

    })
}

var on_price_delivery = function() {

    $("#delivery").click(function() {
        if ($('#delivery').prop('checked')) {
            $("#price_delivery").val("");
            $("#price_delivery").removeAttr('readonly');
            $("#apply_delivery").removeAttr('disabled');

        } else {

            $.ajax({
                url: "controller/cartController.php",
                data: "option=quit_delivery",
                type: "POST",
                success: function(response) {
                    Swal.fire({
                        title: 'Success',
                        text: 'Se quito el delivery',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })
                    $("#validate_delivery").val("0");
                    listar_cart_purchase();
                }
            })

            $("#price_delivery").val("");
            $('#price_delivery').prop('readonly', true);
            $('#apply_delivery').prop('disabled', true);
        }
    })

}

var permissions = function() {
    $.ajax({
        url: "controller/userController.php",
        data: "option=" + "permissions",
        method: "POST",
        success: function(response) {
            $("#permissions").html(response);
        }
    })
}

var report_daily = function() {

    $("#formReportDaily").submit(function(e) {

        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/reportController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Loading.Pulse("Generando reporte...");
            },
            success: function(response) {
                console.log(response);
                Notiflix.Loading.Remove();
                var response = JSON.parse(response);
                if (response.status == "error") {

                    Swal.fire({
                        title: 'Resultados de busqueda:',
                        text: response.message,
                        icon: 'info',
                        confirmButtonText: 'Ok'
                    })

                } else {
                    console.log(response);
                    window.open("report?" + data, "_blank");
                }

            }

        });

    });
}

var report_month = function() {

    $("#formReportMonth").submit(function(e) {

        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/reportController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Loading.Pulse("Generando reporte...");
            },
            success: function(response) {
                Notiflix.Loading.Remove();
                var response = JSON.parse(response);
                if (response.status == "error") {

                    Swal.fire({
                        title: 'Resultados de busqueda:',
                        text: response.message,
                        icon: 'info',
                        confirmButtonText: 'Ok'
                    })

                } else {
                    window.open("report?" + data, "_blank");
                }
            }

        });


    })

}

var report_custom = function() {

    $("#formReportCustom").submit(function(e) {

        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/reportController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Loading.Pulse("Generando reporte...");
            },
            success: function(response) {
                Notiflix.Loading.Remove();
                var response = JSON.parse(response);
                if (response.status == "error") {

                    Swal.fire({
                        title: 'Resultados de busqueda:',
                        text: response.message,
                        icon: 'info',
                        confirmButtonText: 'Ok'
                    })

                } else {
                    window.open("report?" + data, "_blank");
                }
            }

        });

    })

}

function get_edit_price_article(id) {
    $("#edit_price_id").val(id);
    $("#modalEditPriceArticle").modal('show');
}

var edit_price_article = function() {
    $("#formEditPriceArticle").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/cartController.php",
            method: "POST",
            data: data,
            success: function(response) {
                var response = JSON.parse(response);
                if (response.status == "success") {

                    Swal.fire({
                        title: 'success',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    listar_cart_purchase();
                    $("#formEditPriceArticle").trigger('reset');
                    $("#modalEditPriceArticle").modal('hide');

                } else {

                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })

                }
            }
        })
    })
}

var dashboard_cards = function() {

    $.ajax({
        url: "controller/dashboardController.php",
        beforeSend: function() {
            Notiflix.Loading.Pulse("Cargando datos...");
        },
        success: function(response) {
            Notiflix.Loading.Remove();
            var response = JSON.parse(response);
            $("#dashboard_articles").html(response.articles);
            $("#dashboard_clients").html(response.clients);
            $("#dashboard_providers").html(response.providers);
        }
    })

}

var close_cash = function() {

    $("#formCloseBox").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/cashController.php",
            method: "POST",
            data: data,
            success: function(response) {
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableClosingCash").DataTable().ajax.reload();
                    $("#formCloseBox").trigger('reset');
                    $("#modalClosingCash").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }

        })
    })
}

var get_cash_close = function() {

    $.ajax({
        url: "controller/cashController.php",
        method: "POST",
        data: "option=get_cash_close",
        success: function(response) {

            var response = JSON.parse(response);
            $("#box_initial").val(response.box_initial);
            $("#total_incomes").val(response.total_incomes);
            $("#total_expenses").val(response.total_expenses);
            $("#total_box").val(response.total_box);
            $("#dashboard_box").html('<span style="font-size:16px">S/.</span>' + parseFloat(response.total_box).toFixed(2));
            $("#dashboard_purchases").html('<span style="font-size:16px">$ </span>' + parseFloat(response.total_purchases).toFixed(2));
            $("#dashboard_sales").html('<span style="font-size:16px">S/.</span>' + parseFloat(response.total_sales).toFixed(2));

        }


    })

}

var get_cash_initial = function() {

    $.ajax({
        url: "controller/cashController.php",
        method: "POST",
        data: "option=get_cash_initial",
        success: function(response) {
            var response = JSON.parse(response);
            if (response.status == "success") {
                $("#get_initial").val(response.initial);
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: "Error al solicitar caja inicial",
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            }
        }
    })

}

var sale = function() {

    $("#formAddSales").submit(function(e) {

        e.preventDefault();

        var data = $(this).serialize();

        $.ajax({
            url: "controller/saleController",
            data: data,
            method: "POST",
            beforeSend: function() {
                Notiflix.Loading.Pulse("Procesando...");
            },
            success: function(response) {
                Notiflix.Loading.Remove();
                var response = JSON.parse(response);
                if (response.status == "success") {

                    Swal.fire({
                        title: 'success',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    listar_cart_purchase();
                    $("#dataTableAddArticles").DataTable().ajax.reload();
                    $("#formAddSales").trigger('reset');
                    $('#price_delivery').prop('readonly', true);
                    $('#apply_delivery').prop('disabled', true);
                    $("#validate_delivery").val("0");
                    window.open("invoices/invoice?id=" + response.last_id, "_blank");

                } else {

                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })

                }
            }
        })

    })
}

var delete_sale = function() {

    $("#formDeleteSales").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/saleController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                console.log(response);
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableSales").DataTable().ajax.reload();
                    $("#formDeleteSales").trigger('reset');
                    $("#modalDeleteSales").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var list_sales = function() {
    var table_sales = $("#dataTableSales").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        order: [0, 'desc'],
        destroy: true,
        iDisplayLength: 30,
        ajax: {
            url: "controller/saleController.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [1] },
            { bSearchable: false, bVisible: false, aTargets: [2] },
            { bSearchable: false, bVisible: false, aTargets: [3] },
            { bSearchable: false, bVisible: false, aTargets: [7] },
            { bSearchable: false, bVisible: false, aTargets: [12] },
            { bSearchable: false, bVisible: false, aTargets: [13] }
        ],
        columns: [
            { data: "id" },
            { data: "name_client" },
            { data: "name_user" },
            { data: "voucher_type" },
            { data: "name_client" },
            { data: "voucher_number" },
            { data: "date" },
            {
                data: "tax",
                render: function(data) {
                    return "S/. " + data;
                }
            },
            {
                data: "sale_total",
                render: function(data) {
                    return "S/. " + data;
                }
            },
            { data: "contact" },
            { data: "payment_method" },
            {
                data: "status",
                render: function(data) {
                    if (data == 0) {
                        return "<center><span class='badge badge-success'>Aceptado</span></center>";
                    } else {
                        return "<center><span class='badge badge-danger'>No Aceptado</span></center>";
                    }
                }
            },
            { data: "created_at" },
            { data: "updated_at" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Ver detalle' class='view mr-1 text-success'><i class='fas fa-eye fa-lg'></i></a><a title='Imprimir' class='print mr-1 text-dark'><i class='fas fa-print fa-lg'></i></a><a title='Eliminar venta' class='delete mr-1 text-danger'><i class='fas fa-times-circle fa-lg'></i></a></div>",
            }
        ],

        language: esp,
    });

    data_print_sale("#dataTableSales tbody", table_sales);
    data_view_sale("#dataTableSales tbody", table_sales);
    data_delete_sale("#dataTableSales tbody", table_sales);

    $("#dataTableSales").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_view_sale = function(tbody, table) {
    $(tbody).on("click", ".view", function() {
        var data = table.row($(this).parents("tr")).data();
        $.ajax({
            url: "controller/saleController.php",
            method: "POST",
            data: "sale_id=" + data.id + "&option=viewDetails",
            beforeSend: function() {
                Notiflix.Loading.Pulse("Procesando...");
            },
            success: function(response) {
                Notiflix.Loading.Remove();
                $("#viewDetail").html(response);
            }
        })

        $("#modalViewDetails").modal('show');
    })
}

var data_print_sale = function(tbody, table) {
    $(tbody).on("click", ".print", function() {
        var data = table.row($(this).parents("tr")).data();
        window.open('invoices/invoice?id=' + data.id, '_blank');
    })
}

var data_delete_sale = function(tbody, table) {
    $(tbody).on("click", ".delete", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalDeleteSales").modal("show");
    })
}

var get_voucher = function() {

    $("#vouchers").change(function() {
        var voucher_type = $(this).val();
        $.ajax({
            url: "controller/saleController.php",
            method: "POST",
            data: "voucher_type=" + voucher_type + "&option=get_voucher",
            success: function(response) {
                var response = JSON.parse(response);

                if (response.status == "success") {
                    $("#voucher_serie").val(response.serie);
                    $("#voucher_number").val("0000" + response.number);

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                    $("#voucher_serie").val("");
                    $("#voucher_number").val("");
                }

            }
        })
    })
}

var select_voucher = function() {
    $.ajax({
        url: "controller/voucherController",
        method: "POST",
        data: "option=" + "select_vouchers",
        success: function(response) {
            var response = JSON.parse(response);
            var html = "<option value=''>Seleccione un comprobante</option>";
            for (var i = 0; i < response.length; i++) {
                html = html + "<option value='" + response[i]['name'] + "'>" + response[i]['name'] + "</option>";
            }

            $("#vouchers").html(html);
        }
    })
}

var add_voucher = function() {
    $("#formAddVouchers").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/voucherController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableVouchers").DataTable().ajax.reload();
                    $("#formAddVouchers").trigger('reset');
                    $("#modalAddVouchers").modal("hide");

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })

    })
}

var edit_voucher = function() {

    $("#formEditVouchers").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/voucherController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableVouchers").DataTable().ajax.reload();
                    $("#formEditVouchers").trigger('reset');
                    $("#modalEditVouchers").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var delete_voucher = function() {

    $("#formDeleteVouchers").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/voucherController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableVouchers").DataTable().ajax.reload();
                    $("#formDeleteVouchers").trigger('reset');
                    $("#modalDeleteVouchers").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var list_vouchers = function() {
    var table_vouchers = $("#dataTableVouchers").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/voucherController.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [5] },
            { bSearchable: false, bVisible: false, aTargets: [6] }
        ],
        columns: [
            { data: "id" },
            { data: "name" },
            { data: "serie" },
            { data: "number" },
            {
                data: "status",
                render: function(data) {
                    if (data == 0) {
                        return "<center><span class='badge badge-success'>Acaeptado</span></center>";
                    } else {
                        return "<center><span class='badge badge-danger'>No Aceptado</span></center>";
                    }
                }
            },
            { data: "created_at" },
            { data: "updated_at" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='edit mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Eliminar' class='delete text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_edit_voucher("#dataTableVouchers tbody", table_vouchers);
    data_delete_voucher("#dataTableVouchers tbody", table_vouchers);

    $("#dataTableVouchers").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_edit_voucher = function(tbody, table) {
    $(tbody).on("click", ".edit", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#serie").val(data.serie);
        $("#number").val(data.number);
        $("#name").val(data.name);
        $("#modalEditVouchers").modal("show");
    })
}

var data_delete_voucher = function(tbody, table) {
    $(tbody).on("click", ".delete", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalDeleteVouchers").modal("show");

    })
}

var purchase = function() {

    $("#formAddPurchases").submit(function(e) {

        e.preventDefault();

        var data = $(this).serialize();

        $.ajax({
            url: "controller/purchaseController",
            data: data,
            method: "POST",
            beforeSend: function() {
                Notiflix.Loading.Pulse("Procesando...");
            },
            success: function(response) {
                Notiflix.Loading.Remove();
                var response = JSON.parse(response);

                if (response.status == "success") {

                    Swal.fire({
                        title: 'success',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    listar_cart_purchase();
                    $("#dataTableAddArticles").DataTable().ajax.reload();
                    $("#formAddPurchases").trigger('reset');

                } else {

                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })

                }
            }
        })

    })
}

var delete_purchase = function() {

    $("#formDeletePurchases").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/userController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableUsers").DataTable().ajax.reload();
                    $("#formDeleteUsers").trigger('reset');
                    $("#modalDeleteUsers").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

function add_cart_article(id) {

    var module = $("#module").val();
    $.ajax({
        url: "controller/cartController.php",
        data: "id=" + id + "&option=" + module,
        method: "POST",
        success: function(response) {
            var response = JSON.parse(response);

            if (response.status == "success") {

                Notiflix.Notify.Success(response.message);

                listar_cart_purchase();

            } else {
                Swal.fire({
                    title: 'Error!',
                    text: response.message,
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            }
        }
    })
}

function edit_cart_article(id) {

    var module = $("#edit").val();

    $.ajax({
        url: "controller/cartController.php",
        data: "id=" + id + "&option=" + module,
        method: "POST",
        success: function(response) {
            var response = JSON.parse(response);

            if (response.status == "success") {

                Notiflix.Notify.Success(response.message);

                listar_cart_purchase();

            } else {
                Swal.fire({
                    title: 'Error!',
                    text: response.message,
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            }
        }
    })
}

function delete_cart_article(id) {
    $.ajax({
        url: "controller/cartController.php",
        data: "id=" + id + "&option=delete",
        method: "POST",
        success: function(response) {
            var response = JSON.parse(response);

            if (response.status == "success") {

                Notiflix.Notify.Success(response.message);

                listar_cart_purchase();

            } else {
                Swal.fire({
                    title: 'Error!',
                    text: response.message,
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            }
        }
    })
}

var tax = function() {
    $("#tax").click(function() {

        if ($('#tax').prop('checked')) {
            var data = 1;
        } else {
            var data = 0;
        }

        var module = $("#module").val();

        $.ajax({
            type: "POST",
            url: "controller/cartController.php?module=" + module,
            data: "option=taxes&tax=" + data,
            success: function(response) {

                var response = JSON.parse(response);

                Swal.fire({
                    title: 'Success!',
                    text: response.message,
                    icon: 'success',
                    confirmButtonText: 'Ok'
                })

                listar_cart_purchase();
            }
        })

    })
}

var listar_cart_purchase = function() {

    var module = $("#module").val();
    $.ajax({
        type: "POST",
        url: "controller/cartController.php?module=" + module,
        success: function(r) {
            $('#cartArticles').html(r);
        }
    })
}

var list_add_articles = function() {
    var rol = $("#rolMain").val();
    var table_add_articles = $("#dataTableAddArticles").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/articleController.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [2] },
            (rol == 1) ? { bSearchable: false, bVisible: false, aTargets: [7] } : '',
        ],
        columns: [
            { data: "id" },
            { data: "name" },
            { data: "category" },
            { data: "brand" },
            { data: "detail" },
            { data: "sku" },
            {
                data: "stock",
                render: function(data) {
                    if (data == 0) {
                        return "<center><span class='badge badge-info'>" + data + "</span></center>";
                    } else if (data > 10) {
                        return "<center><span class='badge badge-success'>" + data + "</span></center>";
                    } else {
                        return "<center><span class='badge badge-danger'>" + data + "</span></center>";
                    }


                }
            },
            { data: "purchase_price" },
            { data: "sale_price" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='edit mr-1 text-success'><i class='fas fa-plus-circle fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_add_cart_article("#dataTableAddArticles tbody", table_add_articles);
    /*data_delete_article("#dataTableArticles tbody", table_articles); */

    $("#dataTableAddArticles").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_add_cart_article = function(tbody, table) {
    $(tbody).on("click", ".edit", function() {
        var data = table.row($(this).parents("tr")).data();

        add_cart_article(data.id);
        $("#modalAddNewArticles").modal("hide");

    })
}

var select_providers = function() {
    $.ajax({
        url: "controller/providerController",
        method: "POST",
        data: "option=" + "select_providers",
        success: function(response) {
            var response = JSON.parse(response);
            var html = "<option value=''>Seleccione un proveedor</option>";
            for (var i = 0; i < response.length; i++) {
                html = html + "<option value='" + response[i]['id'] + "'>" + response[i]['name'] + "</option>";
            }

            $("#providers").html(html);
        }
    })
}

var select_clients = function() {
    $.ajax({
        url: "controller/clientController",
        method: "POST",
        data: "option=" + "select_clients",
        success: function(response) {
            var response = JSON.parse(response);
            var html = "<option value=''>Seleccione un cliente</option>";
            for (var i = 0; i < response.length; i++) {
                html = html + "<option value='" + response[i]['id'] + "'>" + response[i]['name'] + "</option>";
            }

            $("#clients").html(html);
        }
    })
}

var list_purchases = function() {
    var table_purchases = $("#dataTablePurchases").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        order: [0, 'desc'],
        destroy: true,
        iDisplayLength: 30,
        ajax: {
            url: "controller/purchaseController.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [2] },
            { bSearchable: false, bVisible: false, aTargets: [3] },
            { bSearchable: false, bVisible: false, aTargets: [4] },
            { bSearchable: false, bVisible: false, aTargets: [5] },
            { bSearchable: false, bVisible: false, aTargets: [10] },
            { bSearchable: false, bVisible: false, aTargets: [11] }
        ],
        columns: [
            { data: "id" },
            { data: "name_provider" },
            { data: "name_user" },
            { data: "voucher_type" },
            { data: "voucher_serie" },
            { data: "voucher_number" },
            { data: "date" },
            {
                data: "tax",
                render: function(data) {
                    return "$ " + data;
                }
            },
            {
                data: "purchase_total",
                render: function(data) {
                    return "$ " + data;
                }
            },
            {
                data: "status",
                render: function(data) {
                    if (data == 0) {
                        return "<center><span class='badge badge-success'>Aceptado</span></center>";
                    } else {
                        return "<center><span class='badge badge-danger'>No Aceptado</span></center>";
                    }
                }
            },
            { data: "created_at" },
            { data: "updated_at" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Ver detalle' class='view mr-1 text-success'><i class='fas fa-eye fa-lg'></i></a><a title='Eliminar venta' class='delete mr-1 text-danger'><i class='fas fa-times-circle fa-lg'></i></a></div>",
            }
        ],

        language: esp,
    });

    data_delete_purchase("#dataTablePurchases tbody", table_purchases);
    data_view_purchase("#dataTablePurchases tbody", table_purchases);

    $("#dataTablePurchases").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_view_purchase = function(tbody, table) {
    $(tbody).on("click", ".view", function() {
        var data = table.row($(this).parents("tr")).data();

        $.ajax({
            url: "controller/purchaseController.php",
            method: "POST",
            data: "purchase_id=" + data.id + "&option=viewDetails",
            beforeSend: function() {
                Notiflix.Loading.Pulse("Procesando...");
            },
            success: function(response) {
                Notiflix.Loading.Remove();
                $("#viewDetail").html(response);
            }
        })

        $("#modalViewDetails").modal('show');
    })
}

var data_delete_purchase = function(tbody, table) {
    $(tbody).on("click", ".delete", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalDeletePurchases").modal("show");
    })
}

var delete_purchase = function() {

    $("#formDeletePurchases").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/purchaseController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                console.log(response);
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTablePurchases").DataTable().ajax.reload();
                    $("#formDeletePurchases").trigger('reset');
                    $("#modalDeletePurchases").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}



var list_expenses = function() {
    var table_expenses = $("#dataTableExpenses").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 30,
        ajax: {
            url: "controller/expenseController.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [6] },
            { bSearchable: false, bVisible: false, aTargets: [7] }
        ],
        columns: [
            { data: "id" },
            { data: "date" },
            { data: "name" },
            {
                data: "expense",
                render: function(data) {
                    return "S/. " + data;
                }
            },
            { data: "description" },
            {
                data: "status",
                render: function(data) {
                    if (data == 0) {
                        return "<center><span class='badge badge-success'>Aceptado</span></center>";
                    } else {
                        return "<center><span class='badge badge-danger'>No Aceptado</span></center>";
                    }
                }
            },
            { data: "created_at" },
            { data: "updated_at" }
        ],

        language: esp,
    });

    /*data_edit_expense("#dataTableExpenses tbody", table_expenses);
    data_delete_expense("#dataTableExpenses tbody", table_expenses);*/

    $("#dataTableExpenses").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var add_expense = function() {
    $("#formAddExpenses").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/expenseController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableExpenses").DataTable().ajax.reload();
                    $("#formAddExpenses").trigger('reset');
                    $("#modalAddExpenses").modal("hide");

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })
}

var list_incomes = function() {
    var table_incomes = $("#dataTableIncomes").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 30,
        ajax: {
            url: "controller/incomeController.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [6] },
            { bSearchable: false, bVisible: false, aTargets: [7] }
        ],
        columns: [
            { data: "id" },
            { data: "date" },
            { data: "name" },
            {
                data: "income",
                render: function(data) {
                    return "S/. " + data;
                }
            },
            { data: "description" },
            {
                data: "status",
                render: function(data) {
                    if (data == 0) {
                        return "<center><span class='badge badge-success'>Aceptado</span></center>";
                    } else {
                        return "<center><span class='badge badge-danger'>No Aceptado</span></center>";
                    }
                }
            },
            { data: "created_at" },
            { data: "updated_at" }
        ],

        language: esp,
    });

    /*data_edit_income("#dataTableIncomes tbody", table_incomes);
    data_delete_user("#dataTableIncomes tbody", table_incomes);*/

    $("#dataTableIncomes").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var add_income = function() {
    $("#formAddIncomes").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/incomeController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableIncomes").DataTable().ajax.reload();
                    $("#formAddIncomes").trigger('reset');
                    $("#modalAddIncomes").modal("hide");

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })
}

var open_cash = function() {
    $("#formAddCash").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();

        $.ajax({
            url: "controller/cashController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableCash").DataTable().ajax.reload();
                    $("#formAddCash").trigger('reset');
                    $("#modalOpenCash").modal("hide");

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }


        });
    });
}

var validate_cash = function() {
    $("#open-cash").click(function() {
        $.ajax({
            url: "controller/cashController.php",
            method: "POST",
            data: "option=" + "validate",
            beforeSend: function() {
                Notiflix.Loading.Pulse("Procesando...");
            },
            success: function(response) {
                Notiflix.Loading.Remove();
                var response = JSON.parse(response);

                if (response.status == "success") {
                    $("#modalOpenCash").modal("show");
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    });
}

var list_cash_all = function() {
    var table_cash_all = $("#dataTableClosingCash").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 30,
        ajax: {
            url: "controller/cashController.php?option=closing_cash",
            method: "POST",
        },
        "order": [
            [0, 'desc']
        ],
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [9] },
            { bSearchable: false, bVisible: false, aTargets: [10] }
        ],
        columns: [
            { data: "id" },
            { data: "date" },
            { data: "name" },
            { data: "initial" },
            { data: "income" },
            { data: "expenses" },
            { data: "total" },
            { data: "date_closing" },
            {
                data: "status",
                render: function(data) {
                    if (data == 0) {
                        return '<span class="badge badge-success">Abierto</span>';
                    } else {
                        return '<span class="badge badge-danger">Cerrado</span>';
                    }
                }
            },
            { data: "created_at" },
            { data: "updated_at" },
            {
                data: "status",
                render: function(data) {
                    if (data == 0) {
                        return "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Cerrar caja' class='delete text-danger' ><i class='fas fa-times-circle fa-lg'></i></a></div>"
                    } else {
                        return "";
                    }
                }
            },
        ],

        language: esp,
    });

    data_closing_cash("#dataTableClosingCash tbody", table_cash_all);
    /* data_delete_user("#dataTableUsers tbody", table_users); */

    $("#dataTableClosingCash").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_closing_cash = function(tbody, table) {
    $(tbody).on("click", ".delete", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalClosingCash").modal("show");
    })
}

var data_close_cash = function(tbody, table) {
    $(tbody).on("click", ".delete", function() {
        var data = table.row($(this).parents("tr")).data();
        window.location = "main?module=cash-closing"
    })
}

var list_cash = function() {
    var table_cash = $("#dataTableCash").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/cashController.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [4] },
            { bSearchable: false, bVisible: false, aTargets: [5] },
            { bSearchable: false, bVisible: false, aTargets: [6] },
            { bSearchable: false, bVisible: false, aTargets: [7] },
            { bSearchable: false, bVisible: false, aTargets: [9] },
            { bSearchable: false, bVisible: false, aTargets: [10] }
        ],
        columns: [
            { data: "id" },
            { data: "date" },
            { data: "name" },
            { data: "initial" },
            { data: "income" },
            { data: "expenses" },
            { data: "total" },
            { data: "date_closing" },
            {
                data: "status",
                render: function(data) {
                    if (data == 0) {
                        return '<span class="badge badge-success">Abierto</span>';
                    } else {
                        return '<span class="badge badge-danger">Cerrado</span>';
                    }
                }
            },
            { data: "created_at" },
            { data: "updated_at" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Cerrar Caja' class='delete text-danger' ><i class='fas fa-times-circle fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_close_cash("#dataTableCash tbody", table_cash);
    /* data_delete_user("#dataTableCash tbody", table_users); */

    $("#dataTableCash").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var get_settings = function() {
    $.ajax({
        url: "controller/settingController.php",
        success: function(response) {
            var settings = JSON.parse(response);
            $("#company").val(settings[0]['company']);
            $("#document_number").val(settings[0]['document_number']);
            $("#country").val(settings[0]['country']);
            $("#direction").val(settings[0]['direction']);
            $("#city").val(settings[0]['city']);
            $("#phone").val(settings[0]['phone']);
            $("#email").val(settings[0]['email']);
            $("#exchange_rate").val(settings[0]['exchange_rate']);
        }
    })
}

var update_settings = function() {

    $("#formUpdateSettings").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/settingController.php",
            method: "POST",
            data: data,
            success: function(response) {
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableUsers").DataTable().ajax.reload();
                    $("#formAddUsers").trigger('reset');
                    $("#modalAddUsers").modal("hide");

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }
        })

    })
}

var update_exchange_rate = function() {
    $("#formExchangeRate").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/settingController.php",
            method: "POST",
            data: data,
            success: function(response) {
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#modalExchangeRate").modal("hide");
                    get_settings();

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }
        })
    })
}

var list_users = function() {
    var table_users = $("#dataTableUsers").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/userController.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] }
        ],
        columns: [
            { data: "id" },
            { data: "user" },
            { data: "name" },
            { data: "last_name" },
            {
                data: "rol",
                render: function(data) {
                    if (data == 0) {
                        return "Administrador";
                    } else {
                        return "Usuario";
                    }
                }
            },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='edit mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Eliminar' class='delete text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_edit_user("#dataTableUsers tbody", table_users);
    data_delete_user("#dataTableUsers tbody", table_users);

    $("#dataTableUsers").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_edit_user = function(tbody, table) {
    $(tbody).on("click", ".edit", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#name").val(data.name);
        $("#last_name").val(data.last_name);
        $("#user").val(data.user);
        $("#rol").val(data.rol);

        $.ajax({
            url: "controller/userController.php",
            data: "option=permissions_edit&id=" + data.id,
            method: "POST",
            success: function(response) {
                $("#permissions_edit").html(response);
            }
        })


        $("#modalEditUsers").modal("show");
    })
}

var data_delete_user = function(tbody, table) {
    $(tbody).on("click", ".delete", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalDeleteUsers").modal("show");
    })
}

var add_user = function() {

    $("#formAddUsers").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/userController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableUsers").DataTable().ajax.reload();
                    $("#formAddUsers").trigger('reset');
                    $("#modalAddUsers").modal("hide");

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })
}

var edit_user = function() {

    $("#formEditUsers").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/userController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableUsers").DataTable().ajax.reload();
                    $("#formEditUsers").trigger('reset');
                    $("#modalEditUsers").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var delete_user = function() {

    $("#formDeleteUsers").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/userController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableUsers").DataTable().ajax.reload();
                    $("#formDeleteUsers").trigger('reset');
                    $("#modalDeleteUsers").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}


var list_clients = function() {
    var table_clients = $("#dataTableClients").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/clientController.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [4] },
            { bSearchable: false, bVisible: false, aTargets: [7] },
            { bSearchable: false, bVisible: false, aTargets: [8] }
        ],
        columns: [
            { data: "id" },
            { data: "document_number" },
            { data: "name" },
            { data: "document_type" },
            { data: "direction" },
            { data: "phone" },
            { data: "email" },
            { data: "created_at" },
            { data: "updated_at" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='edit mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Eliminar' class='delete text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_edit_client("#dataTableClients tbody", table_clients);
    data_delete_client("#dataTableClients tbody", table_clients);

    $("#dataTableClients").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_edit_client = function(tbody, table) {
    $(tbody).on("click", ".edit", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#document_number").val(data.document_number);
        $("#name").val(data.name);
        $("#document_type").val(data.document_type);
        $("#direction").val(data.direction);
        $("#phone").val(data.phone);
        $("#email").val(data.email);
        $("#modalEditClients").modal("show");
    })
}

var data_delete_client = function(tbody, table) {
    $(tbody).on("click", ".delete", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalDeleteClients").modal("show");
    })
}

var add_client = function() {

    $("#formAddClients").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/clientController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableClients").DataTable().ajax.reload();
                    $("#formAddClients").trigger('reset');
                    $("#modalAddClients").modal("hide");

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })
}

var edit_client = function() {

    $("#formEditClients").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/clientController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableClients").DataTable().ajax.reload();
                    $("#formEditClients").trigger('reset');
                    $("#modalEditClients").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var delete_client = function() {

    $("#formDeleteClients").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/clientController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableClients").DataTable().ajax.reload();
                    $("#formDeleteClients").trigger('reset');
                    $("#modalDeleteClients").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var list_providers = function() {
    var table_providers = $("#dataTableProviders").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/providerController.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [4] },
            { bSearchable: false, bVisible: false, aTargets: [7] },
            { bSearchable: false, bVisible: false, aTargets: [8] }
        ],
        columns: [
            { data: "id" },
            { data: "document_number" },
            { data: "name" },
            { data: "document_type" },
            { data: "direction" },
            { data: "phone" },
            { data: "email" },
            { data: "created_at" },
            { data: "updated_at" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='edit mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Eliminar' class='delete text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_edit_provider("#dataTableProviders tbody", table_providers);
    data_delete_provider("#dataTableProviders tbody", table_providers);

    $("#dataTableProviders").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_edit_provider = function(tbody, table) {
    $(tbody).on("click", ".edit", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#document_number").val(data.document_number);
        $("#name").val(data.name);
        $("#document_type").val(data.document_type);
        $("#direction").val(data.direction);
        $("#phone").val(data.phone);
        $("#email").val(data.email);
        $("#modalEditProviders").modal("show");
    })
}

var data_delete_provider = function(tbody, table) {
    $(tbody).on("click", ".delete", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalDeleteProviders").modal("show");
    })
}

var add_provider = function() {

    $("#formAddProviders").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/providerController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableProviders").DataTable().ajax.reload();
                    $("#formAddProviders").trigger('reset');
                    $("#modalAddProviders").modal("hide");

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })
}

var edit_provider = function() {

    $("#formEditProviders").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/providerController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableProviders").DataTable().ajax.reload();
                    $("#formEditProviders").trigger('reset');
                    $("#modalEditProviders").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var delete_provider = function() {

    $("#formDeleteProviders").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/providerController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableProviders").DataTable().ajax.reload();
                    $("#formDeleteProviders").trigger('reset');
                    $("#modalDeleteProviders").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var select_brands = function() {
    $.ajax({
        url: "controller/brandController",
        method: "POST",
        data: "option=" + "select_brands",
        success: function(response) {

            var response = JSON.parse(response);
            var html = "<option value=''>Seleccione una marca</option>";
            for (var i = 0; i < response.length; i++) {
                html = html + "<option value='" + response[i]['id'] + "'>" + response[i]['brand'] + "</option>";
            }

            $(".brands").html(html);
        }
    })
}

var select_contacts = function() {
    $.ajax({
        url: "controller/contactController",
        method: "POST",
        data: "option=" + "select_contacts",
        success: function(response) {

            var response = JSON.parse(response);
            var html = "<option value=''>Seleccione un contacto</option>";
            for (var i = 0; i < response.length; i++) {
                html = html + "<option value='" + response[i]['contact'] + "'>" + response[i]['contact'] + "</option>";
            }

            $(".contacts").html(html);
        }
    })
}

var select_paymentMethods = function() {
    $.ajax({
        url: "controller/paymentMethodController",
        method: "POST",
        data: "option=" + "select_paymentMethods",
        success: function(response) {

            var response = JSON.parse(response);
            var html = "<option value=''>Seleccione una método de pago</option>";
            for (var i = 0; i < response.length; i++) {
                html = html + "<option value='" + response[i]['payment_method'] + "'>" + response[i]['payment_method'] + "</option>";
            }

            $(".payment_methods").html(html);
        }
    })
}

var select_categories = function() {
    $.ajax({
        url: "controller/categoryController",
        method: "POST",
        data: "option=" + "select_categories",
        success: function(response) {

            var response = JSON.parse(response);
            var html = "<option value=''>Seleccione una categoría</option>";
            for (var i = 0; i < response.length; i++) {
                html = html + "<option value='" + response[i]['id'] + "'>" + response[i]['category'] + "</option>";
            }

            $(".categories").html(html);
        }
    })
}

var list_articles = function() {
    var rol = $("#rolMain").val();
    var table_articles = $("#dataTableArticles").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/articleController.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [5] },
            (rol == 1) ? { bSearchable: false, bVisible: false, aTargets: [8] } : '',
            (rol == 1) ? { bSearchable: false, bVisible: false, aTargets: [10] } : '',
        ],
        columns: [
            { data: "id" },
            { data: "name" },
            { data: "category" },
            { data: "detail" },
            { data: "brand" },
            { data: "description" },
            { data: "sku" },
            {
                data: "stock",
                render: function(data) {
                    if (data == 0) {
                        return "<center><span class='badge badge-info'>" + data + "</span></center>";
                    } else if (data > 10) {
                        return "<center><span class='badge badge-success'>" + data + "</span></center>";
                    } else {
                        return "<center><span class='badge badge-danger'>" + data + "</span></center>";
                    }


                }
            },
            { data: "purchase_price" },
            { data: "sale_price" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='edit mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Eliminar' class='delete text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_edit_article("#dataTableArticles tbody", table_articles);
    data_delete_article("#dataTableArticles tbody", table_articles);

    $("#dataTableArticles").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_edit_article = function(tbody, table) {
    $(tbody).on("click", ".edit", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#name").val(data.name);
        $("#category").val(data.id_category);
        $("#brand").val(data.id_brand);
        $("#description").val(data.description);
        $("#stock").val(data.stock);
        $("#purchase_price").val(data.purchase_price);
        $("#sale_price").val(data.sale_price);
        $("#modalEditArticles").modal("show");
    })
}

var data_delete_article = function(tbody, table) {
    $(tbody).on("click", ".delete", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalDeleteArticles").modal("show");
    })
}

var add_article = function() {

    $("#formAddArticles").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/articleController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableArticles").DataTable().ajax.reload();
                    $("#formAddArticles").trigger('reset');
                    $("#modalAddArticles").modal("hide");

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })
}

var edit_article = function() {

    $("#formEditArticles").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/articleController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableArticles").DataTable().ajax.reload();
                    $("#formEditArticles").trigger('reset');
                    $("#modalEditArticles").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var delete_article = function() {

    $("#formDeleteArticles").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/articleController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableArticles").DataTable().ajax.reload();
                    $("#formDeleteArticles").trigger('reset');
                    $("#modalDeleteArticles").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var list_brands = function() {
    var table_brands = $("#dataTableBrands").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/brandController.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [2] },
            { bSearchable: false, bVisible: false, aTargets: [3] },
            { bSearchable: false, bVisible: false, aTargets: [4] }
        ],
        columns: [
            { data: "id" },
            { data: "brand" },
            { data: "status" },
            { data: "created_at" },
            { data: "updated_at" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='edit mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Eliminar' class='delete text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_edit_brand("#dataTableBrands tbody", table_brands);
    data_delete_brand("#dataTableBrands tbody", table_brands);

    $("#dataTableBrands").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_edit_brand = function(tbody, table) {
    $(tbody).on("click", ".edit", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#brand").val(data.brand);
        $("#modalEditBrands").modal("show");
    })
}

var data_delete_brand = function(tbody, table) {
    $(tbody).on("click", ".delete", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalDeleteBrands").modal("show");
    })
}

var add_brand = function() {

    $("#formAddBrands").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/brandController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableBrands").DataTable().ajax.reload();
                    $("#formAddBrands").trigger('reset');
                    $("#modalAddBrands").modal("hide");

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var edit_brand = function() {

    $("#formEditBrands").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/brandController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableBrands").DataTable().ajax.reload();
                    $("#formEditBrands").trigger('reset');
                    $("#modalEditBrands").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var delete_brand = function() {

    $("#formDeleteBrands").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/brandController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableBrands").DataTable().ajax.reload();
                    $("#formDeleteBrands").trigger('reset');
                    $("#modalDeleteBrands").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var list_paymentMethods = function() {
    var table_paymentMethods = $("#dataTablePaymentMethods").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/paymentMethodController.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [2] },
            { bSearchable: false, bVisible: false, aTargets: [3] }
        ],
        columns: [
            { data: "id" },
            { data: "payment_method" },
            { data: "created_at" },
            { data: "updated_at" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='edit mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Eliminar' class='delete text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_edit_payment_method("#dataTablePaymentMethods tbody", table_paymentMethods);
    data_delete_payment_method("#dataTablePaymentMethods tbody", table_paymentMethods);

    $("#dataTablePaymentMethods").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_edit_payment_method = function(tbody, table) {
    $(tbody).on("click", ".edit", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#paymentMethod").val(data.payment_method);
        $("#modalEditPaymentMethods").modal("show");
    })
}

var data_delete_payment_method = function(tbody, table) {
    $(tbody).on("click", ".delete", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalDeletePaymentMethods").modal("show");
    })
}

var add_paymentMethod = function() {

    $("#formAddPaymentMethods").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/paymentMethodController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTablePaymentMethods").DataTable().ajax.reload();
                    $("#formAddPaymentMethods").trigger('reset');
                    $("#modalAddPaymentMethods").modal("hide");

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var edit_paymentMethod = function() {

    $("#formEditPaymentMethods").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/paymentMethodController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTablePaymentMethods").DataTable().ajax.reload();
                    $("#formEditPaymentMethods").trigger('reset');
                    $("#modalEditPaymentMethods").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var delete_paymentMethod = function() {

    $("#formDeletePaymentMethods").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/paymentMethodController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTablePaymentMethods").DataTable().ajax.reload();
                    $("#formDeletePaymentMethods").trigger('reset');
                    $("#modalDeletePaymentMethods").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var list_contacts = function() {
    var table_contacts = $("#dataTableContacts").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/contactController.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [2] },
            { bSearchable: false, bVisible: false, aTargets: [3] }
        ],
        columns: [
            { data: "id" },
            { data: "contact" },
            { data: "created_at" },
            { data: "updated_at" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='edit mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Eliminar' class='delete text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_edit_contact("#dataTableContacts tbody", table_contacts);
    data_delete_contact("#dataTableContacts tbody", table_contacts);

    $("#dataTableContacts").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_edit_contact = function(tbody, table) {
    $(tbody).on("click", ".edit", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#contact").val(data.contact);
        $("#modalEditContacts").modal("show");
    })
}

var data_delete_contact = function(tbody, table) {
    $(tbody).on("click", ".delete", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalDeleteContacts").modal("show");
    })
}

var add_contact = function() {

    $("#formAddContacts").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/contactController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableContacts").DataTable().ajax.reload();
                    $("#formAddContacts").trigger('reset');
                    $("#modalAddContacts").modal("hide");

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var edit_contact = function() {

    $("#formEditContacts").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/contactController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableContacts").DataTable().ajax.reload();
                    $("#formEditContacts").trigger('reset');
                    $("#modalEditContacts").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var delete_contact = function() {

    $("#formDeleteContacts").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/contactController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableContacts").DataTable().ajax.reload();
                    $("#formDeleteContacts").trigger('reset');
                    $("#modalDeleteContacts").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var list_categories = function() {
    var table_categories = $("#dataTableCategories").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/categoryController.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [2] },
            { bSearchable: false, bVisible: false, aTargets: [3] },
            { bSearchable: false, bVisible: false, aTargets: [4] }
        ],
        columns: [
            { data: "id" },
            { data: "category" },
            { data: "status" },
            { data: "created_at" },
            { data: "updated_at" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='edit mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Eliminar' class='delete text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_edit_category("#dataTableCategories tbody", table_categories);
    data_delete_category("#dataTableCategories tbody", table_categories);

    $("#dataTableCategories").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_edit_category = function(tbody, table) {
    $(tbody).on("click", ".edit", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#category").val(data.category);
        $("#modalEditCategories").modal("show");
    })
}

var data_delete_category = function(tbody, table) {
    $(tbody).on("click", ".delete", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalDeleteCategories").modal("show");
    })
}

var add_category = function() {

    $("#formAddCategories").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/categoryController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableCategories").DataTable().ajax.reload();
                    $("#formAddCategories").trigger('reset');
                    $("#modalAddCategories").modal("hide");

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var edit_category = function() {

    $("#formEditCategories").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/categoryController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableCategories").DataTable().ajax.reload();
                    $("#formEditCategories").trigger('reset');
                    $("#modalEditCategories").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var delete_category = function() {

    $("#formDeleteCategories").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/categoryController.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableCategories").DataTable().ajax.reload();
                    $("#formDeleteCategories").trigger('reset');
                    $("#modalDeleteCategories").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}


// TRADUCCIÓN DEL DATATABLE

var esp = {
    sProcessing: "Procesando...",
    search: "",
    sLengthMenu: "Mostrar _MENU_ registros",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sInfoPostFix: "",
    sUrl: "",
    sInfoThousands: ",",
    sLoadingRecords: "Cargando...",
    oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
    },
    oAria: {
        sSortAscending: ": Activar para ordenar la columna de manera ascendente",
        sSortDescending: ": Activar para ordenar la columna de manera descendente",
    },
};