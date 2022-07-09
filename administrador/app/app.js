$(function(){

    //Marcas

    list_brands();
    add_brand();
    edit_brand();
    delete_brand();

    //Tipos

    list_types();
    add_type();
    edit_type();
    delete_type();

    //modelos

    list_models();
    add_model();
    edit_model();
    delete_model();

    //Años

    list_anios();
    add_anio();
    edit_anio();
    delete_anio();

    //Crear auto

    list_cars();
    add_car();
    delete_car();

    //Categorias

    list_categories();
    add_category();
    edit_category();
    delete_category();

    //Asignar Categorias

    list_category_to_car();
    add_category_to_car();
    edit_category_to_car();
    delete_category_to_car();

    //Asignar autopartes
    list_part_to_category();
    add_part();
    delete_part();

})

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
            { data: "mark" },
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
        $("#brand").val(data.mark);
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


var list_types = function() {
    var table_types = $("#dataTableTypes").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/typeController.php",
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
            { data: "type" },
            { data: "status" },
            { data: "created_at" },
            { data: "updated_at" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='edit mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Eliminar' class='delete text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_edit_type("#dataTableTypes tbody", table_types);
    data_delete_type("#dataTableTypes tbody", table_types);

    $("#dataTableTypes").each(function() {
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

var data_edit_type = function(tbody, table) {
    $(tbody).on("click", ".edit", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#type").val(data.type);
        $("#modalEditTypes").modal("show");
    })
}

var data_delete_type = function(tbody, table) {
    $(tbody).on("click", ".delete", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalDeleteTypes").modal("show");
    })
}

var add_type = function() {

    $("#formAddTypes").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/typeController.php",
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

                    $("#dataTableTypes").DataTable().ajax.reload();
                    $("#formAddTypes").trigger('reset');
                    $("#modalAddTypes").modal("hide");

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

var edit_type = function() {

    $("#formEditTypes").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/typeController.php",
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

                    $("#dataTableTypes").DataTable().ajax.reload();
                    $("#formEditTypes").trigger('reset');
                    $("#modalEditTypes").modal("hide");


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

var delete_type = function() {

    $("#formDeleteTypes").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/typeController.php",
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

                    $("#dataTableTypes").DataTable().ajax.reload();
                    $("#formDeleteTypes").trigger('reset');
                    $("#modalDeleteTypes").modal("hide");


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


var list_models = function() {
    var table_models = $("#dataTableModels").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/modelController.php",
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
            { data: "model" },
            { data: "status" },
            { data: "created_at" },
            { data: "updated_at" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='edit mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Eliminar' class='delete text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_edit_model("#dataTableModels tbody", table_models);
    data_delete_model("#dataTableModels tbody", table_models);

    $("#dataTableModels").each(function() {
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

var data_edit_model = function(tbody, table) {
    $(tbody).on("click", ".edit", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#model").val(data.model);
        $("#modalEditModels").modal("show");
    })
}

var data_delete_model = function(tbody, table) {
    $(tbody).on("click", ".delete", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalDeleteModels").modal("show");
    })
}

var add_model = function() {

    $("#formAddModels").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/modelController.php",
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

                    $("#dataTableModels").DataTable().ajax.reload();
                    $("#formAddModels").trigger('reset');
                    $("#modalAddModels").modal("hide");

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

var edit_model = function() {

    $("#formEditModels").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/modelController.php",
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

                    $("#dataTableModels").DataTable().ajax.reload();
                    $("#formEditModels").trigger('reset');
                    $("#modalEditModels").modal("hide");


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

var delete_model = function() {

    $("#formDeleteModels").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/modelController.php",
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

                    $("#dataTableModels").DataTable().ajax.reload();
                    $("#formDeleteModels").trigger('reset');
                    $("#modalDeleteModels").modal("hide");


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



var list_anios = function() {
    var table_anios = $("#dataTableAnios").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/anioController.php",
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
            { data: "anio" },
            { data: "status" },
            { data: "created_at" },
            { data: "updated_at" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='edit mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Eliminar' class='delete text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_edit_anio("#dataTableAnios tbody", table_anios);
    data_delete_anio("#dataTableAnios tbody", table_anios);

    $("#dataTableAnios").each(function() {
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

var data_edit_anio = function(tbody, table) {
    $(tbody).on("click", ".edit", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#anio").val(data.anio);
        $("#modalEditAnios").modal("show");
    })
}

var data_delete_anio = function(tbody, table) {
    $(tbody).on("click", ".delete", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalDeleteAnios").modal("show");
    })
}

var add_anio = function() {

    $("#formAddAnios").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/anioController.php",
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

                    $("#dataTableAnios").DataTable().ajax.reload();
                    $("#formAddAnios").trigger('reset');
                    $("#modalAddAnios").modal("hide");

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

var edit_anio = function() {

    $("#formEditAnios").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/anioController.php",
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

                    $("#dataTableAnios").DataTable().ajax.reload();
                    $("#formEditAnios").trigger('reset');
                    $("#modalEditAnios").modal("hide");


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

var delete_anio = function() {

    $("#formDeleteAnios").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/anioController.php",
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

                    $("#dataTableAnios").DataTable().ajax.reload();
                    $("#formDeleteAnios").trigger('reset');
                    $("#modalDeleteAnios").modal("hide");


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

var list_cars = function() {
    var table_cars = $("#dataTableCars").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/carController.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] }
        ],
        columns: [
            { data: "id" },
            { data: "mark" },
            { data: "type" },
            { data: "model" },
            { data: "anio" },
            { data: "name" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Eliminar' class='delete text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_delete_car("#dataTableCars tbody", table_cars);

    $("#dataTableCars").each(function() {
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

var data_delete_car = function(tbody, table) {
    $(tbody).on("click", ".delete", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalDeleteCars").modal("show");
    })
}

var add_car = function(){

    $("#formAddCars").submit(function(e){
        e.preventDefault();
        const formData = new FormData($('#formAddCars')[0]);
        $.ajax({
            url:"controller/carController.php",
            method:"POST",
            data:formData,
            contentType:false,
            cache:false,
            processData:false,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            complete: function() {
                Notiflix.Block.Remove('.modal-content');
            },
            success: function(response) {
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableCars").DataTable().ajax.reload();
                    $("#formAddCars").trigger('reset');
                    $("#modalAddCars").modal("hide");


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

var delete_car = function() {

    $("#formDeleteCars").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/carController.php",
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

                    $("#dataTableCars").DataTable().ajax.reload();
                    $("#formDeleteCars").trigger('reset');
                    $("#modalDeleteCars").modal("hide");


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
    var table_category = $("#dataTableCategories").DataTable({
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
            { bSearchable: false, bVisible: false, aTargets: [4] },
            { bSearchable: false, bVisible: false, aTargets: [5] }
        ],
        columns: [
            { data: "id" },
            { data: "name" },
            { data: "image" },
            { data: "status" },
            { data: "created_at" },
            { data: "updated_at" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='edit mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Eliminar' class='delete text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_edit_category("#dataTableCategories tbody", table_category);
    data_delete_category("#dataTableCategories tbody", table_category);

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
        $("#category").val(data.name);
        $("#archivo").val(data.image);
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

var add_category = function(){

    $("#formAddCategories").submit(function(e){
        e.preventDefault();
        const formData = new FormData($('#formAddCategories')[0]);
        $.ajax({
            url:"controller/categoryController.php",
            method:"POST",
            data:formData,
            contentType:false,
            cache:false,
            processData:false,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            complete: function() {
                Notiflix.Block.Remove('.modal-content');
            },
            success: function(response) {
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

var edit_category = function(){

    $("#formEditCategories").submit(function(e){
        e.preventDefault();
        const formData = new FormData($('#formEditCategories')[0]);
        $.ajax({
            url:"controller/categoryController.php",
            method:"POST",
            data:formData,
            contentType:false,
            cache:false,
            processData:false,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            complete: function() {
                Notiflix.Block.Remove('.modal-content');
            },
            success: function(response) {
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

var list_category_to_car = function() {
    var table_category_to_car = $("#dataTableCategoryToCar").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/categoryToCarController.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] }
        ],
        columns: [
            { data: "id" },
            { data: "category" },
            { data: "automovil" },
            { data: "name_config" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='edit mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Eliminar' class='delete text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_edit_category_to_car("#dataTableCategoryToCar tbody", table_category_to_car);
    data_delete_category_to_car("#dataTableCategoryToCar tbody", table_category_to_car);

    $("#dataTableCategoryToCar").each(function() {
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

var data_edit_category_to_car = function(tbody, table) {
    $(tbody).on("click", ".edit", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#category_id").val(data.category_id);
        $("#mtma_id").val(data.mtma_id);
        $("#name").val(data.name_config);
        $("#modalEditCategoryToCar").modal("show");
    })
}

var data_delete_category_to_car = function(tbody, table) {
    $(tbody).on("click", ".delete", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalDeleteCategoryToCar").modal("show");
    })
}

var add_category_to_car = function() {

    $("#formAddCategoryToCar").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/categoryToCarController.php",
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

                    $("#dataTableCategoryToCar").DataTable().ajax.reload();
                    $("#formAddCategoryToCar").trigger('reset');
                    $("#modalAddCategoryToCar").modal("hide");

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

var edit_category_to_car = function() {

    $("#formEditCategoryToCar").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/categoryToCarController.php",
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

                    $("#dataTableCategoryToCar").DataTable().ajax.reload();
                    $("#formEditCategoryToCar").trigger('reset');
                    $("#modalEditCategoryToCar").modal("hide");


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

var delete_category_to_car = function() {

    $("#formDeleteCategoryToCar").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/categoryToCarController.php",
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

                    $("#dataTableCategoryToCar").DataTable().ajax.reload();
                    $("#formDeleteCategoryToCar").trigger('reset');
                    $("#modalDeleteCategoryToCar").modal("hide");


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

var list_part_to_category = function() {
    var table_part_to_category = $("#dataTablePartToCategory").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/partToCategoryController.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [3] },
            { bSearchable: false, bVisible: false, aTargets: [9] }
            


        ],
        columns: [
            { data: "id" },
            { data: "category" },
            { data: "accesorio" },
            { data: "image" },
            { data: "stock" },
            { data: "facebook" },
            { data: "instagram" },
            { data: "whatsapp" },
            { data: "messenger" },
            { data: "src" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Eliminar' class='delete text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_delete_part_to_category("#dataTablePartToCategory tbody", table_part_to_category);

    $("#dataTablePartToCategory").each(function() {
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

var data_delete_part_to_category = function(tbody, table) {
    $(tbody).on("click", ".delete", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalDeletePartToCategory").modal("show");
    })
}

var add_part = function(){

    $("#formAddPartToCategory").submit(function(e){
        e.preventDefault();
        const formData = new FormData($('#formAddPartToCategory')[0]);
        $.ajax({
            url:"controller/partToCategoryController.php",
            method:"POST",
            data:formData,
            contentType:false,
            cache:false,
            processData:false,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            complete: function() {
                Notiflix.Block.Remove('.modal-content');
            },
            success: function(response) {
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTablePartToCategory").DataTable().ajax.reload();
                    $("#formAddPartToCategory").trigger('reset');
                    $("#modalAddPartToCategory").modal("hide");


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

var delete_part = function() {

    $("#formDeletePartToCategory").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/partToCategoryController.php",
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

                    $("#dataTablePartToCategory").DataTable().ajax.reload();
                    $("#formDeletePartToCategory").trigger('reset');
                    $("#modalDeletePartToCategory").modal("hide");


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