$(function(){
    register();
    login();
    get_marcas();
    get_tipos();
    get_modelos();
    get_anios();
    buscar();
    get_categorias();
    guardar_configuracion();
    
})

const login = ()=>{

    $("#form-login").submit(function(e){

        e.preventDefault();

        const data = $(this).serialize();
        $.ajax({
            url:'administrador/controller/userController.php',
            method:'POST',
            data:data,
            beforeSend: function() {
                Notiflix.Loading.Standard('Iniciando sesión...');
            },
            success: function(response){
                Notiflix.Loading.Remove();
                var response = JSON.parse(response);
                if (response.status == "error") {

                    Notiflix.Report.Failure(
                        'Error',
                        response.message,
                        'Ok',
                        );

                }else if(response.status == "success"){
                   
                    $("#form-login").trigger('reset');
                    window.location = response.url;

                }else{
                    Notiflix.Report.Failure(
                        'Error',
                        'Hubo un error en el servidor. Contactate con el administrador del sistema',
                        'Ok',
                        );
                } 
            }

        })

    })
}

const register = ()=> {
    
    $("#form-signup").submit(function(e){
        
        e.preventDefault();
        const data = $(this).serialize();
        console.log(data);
        $.ajax({
            url:'administrador/controller/userController.php',
            method:'POST',
            data:data,
            beforeSend: function() {
                Notiflix.Loading.Standard('Registrandote...');
            },
            success: function(response){
                
                Notiflix.Loading.Remove();
                var response = JSON.parse(response);
                if (response.status == "error") {

                    Notiflix.Report.Failure(
                        'Error',
                        response.message,
                        'Ok',
                        );

                }else if(response.status == "success"){
                   
                    Notiflix.Report.Success(
                        'Success',
                        response.message,
                        'Ok',
                        );
                    
                    $("#form-signup").trigger('reset');

                }else{
                    Notiflix.Report.Failure(
                        'Error',
                        'Hubo un error en el servidor. Contactate con el administrador del sistema',
                        'Ok',
                        );
                }
            }
        })
    })

}

const get_marcas = ()=>{

    $.ajax({

        url:'administrador/controller/galeriaController',
        method:'GET',
        data:'option=get_marcas',
        success: function(response){

            const data = JSON.parse(response);
            let html = '<option value="">Seleccione una opción</option>';
            data.forEach((element) => {
                html += `<option value="${element['id']}">${element['mark']}</option>`;
            })

            $("#marcas").html(html);

        }

    })

}

const get_tipos = ()=>{

    $("#marcas").change(function(){

        const marca_id = $(this).val();
        const text_default = '<option value="">Seleccione una opción</option>';

        $.ajax({

            url:'administrador/controller/galeriaController',
            method:'GET',
            data:'option=get_tipos&marca_id=' + marca_id,
            success: function(response){
                const data = JSON.parse(response);
                let html = '<option value="">Seleccione una opción</option>';
                data.forEach((element) => {
                    html += `<option value="${element['id']}">${element['type']}</option>`;
                })
                $("#tipos").html(text_default);
                $("#modelos").html(text_default);
                $("#anios").html(text_default);
                $("#tipos").html(html);
    
            }
    
        })

    })

}

const get_modelos = ()=>{

    $("#tipos").change(function(){

        const marca_id = $('#marcas').val();
        const tipo_id = $('#tipos').val();
        const text_default = '<option value="">Seleccione una opción</option>';
        $.ajax({

            url:'administrador/controller/galeriaController',
            method:'GET',
            data:'option=get_modelos&marca_id=' + marca_id + '&tipo_id=' + tipo_id,
            success: function(response){
                
                const data = JSON.parse(response);
                let html = '<option value="">Seleccione una opción</option>';
                data.forEach((element) => {
                    html += `<option value="${element['id']}">${element['model']}</option>`;
                })
                $("#anios").html(text_default);
                $("#modelos").html(html);
    
            }
    
        })

    })

}

const get_anios = ()=>{

    $("#modelos").change(function(){

        const marca_id = $('#marcas').val();
        const tipo_id = $('#tipos').val();
        const model_id = $('#modelos').val();
        $.ajax({

            url:'administrador/controller/galeriaController',
            method:'GET',
            data:'option=get_anios&marca_id=' + marca_id + '&tipo_id=' + tipo_id + '&model_id=' + model_id,
            success: function(response){
                
                const data = JSON.parse(response);
                let html = '<option value="">Seleccione una opción</option>';
                data.forEach((element) => {
                    html += `<option value="${element['id']}">${element['anio']}</option>`;
                })
                $("#anios").html(html);
    
            }
    
        })

    })

}

const buscar = ()=> {

    $("#form-buscar").submit(function(e){
        e.preventDefault();
        const data = $(this).serialize();
        $.ajax({
            url:'administrador/controller/galeriaController.php',
            method:"GET",
            data:data,
            success: function(response){
                window.location = "detalle?id=" + response;
            }
        })
    })

}

const get_categorias = ()=>{

    const id = $("#auto_id").val();
    const tipo = $("#tipo_config").val();

    if(tipo == 1){
        $.ajax({
            url:'administrador/controller/galeriaController.php',
            method:'GET',
            data: 'option=get_categorias_auto&id=' + id,
            success: function(response){
    
                const data = JSON.parse(response);
                let html = ``;
                
                const categoria_inicial = data[0]['id'];
    
                $.ajax({
                    url:'administrador/controller/galeriaController.php',
                    method:'GET',
                    data: 'option=get_categorias_auto_accesorios&mtmac_id=' + categoria_inicial,
                    success: function(response){
                        let data = JSON.parse(response);
            
                        let html = ``;
            
                        data.forEach((element) =>{
                            html += `<div class="carousel-cell-prod"><img src="assets/images/categorias/${element['image']}" class="products" data-target="${element['id']}" width="100%" alt="" onclick="get_accesorio_detalle(${element['id']})" ></div>`;
                        })
                        
                        $("#carousel_accesorios").html(html);
                        $("#carousel_accesorios").flickity({
                            contain: true
                        });
            
                    }
            
            
                })
                
                data.forEach((element) => {
                    html += `<div class="carousel-cell"><img src="assets/images/categorias/${element['image']}" class="category"
                    data-target="" width="100%" alt="" onclick="get_accesorios(${element['id']})"></div>`;
                })          
    
                $("#carousel_categorias").html(html);
                $("#carousel_categorias").flickity();
                
    
            }
        })
    }
    
}

function get_accesorios (id){
    
    $.ajax({
        url:'administrador/controller/galeriaController.php',
        method:'GET',
        data: 'option=get_categorias_auto_accesorios&mtmac_id=' + id,
        success: function(response){
            let data = JSON.parse(response);

            let html = ``;
            
            data.forEach((element) =>{
                html += `<div class="carousel-cell-prod"><img src="assets/images/categorias/${element['image']}" class="products" data-target="${element['id']}" width="100%" alt="" onclick="get_accesorio_detalle(${element['id']})"></div>`;
            })
            
            $("#carousel_accesorios").flickity('destroy');
            $("#carousel_accesorios").html(html);
            $("#carousel_accesorios").flickity({
                contain: true
            });

        }


    })

}


function get_accesorio_detalle(id){
    
    

    $.ajax({
        url:'administrador/controller/galeriaController.php',
        method:'GET',
        data: 'option=get_accesorio_detalle&mtmaca_id=' + id,
        success: function(response){

            const data = JSON.parse(response);
            $(".product").html('');
            $("#accesorio_titulo").html(data['accesorio']);
            $("#accesorio_stock").html(data['stock']);

            $("#config_temporal").val(2);
            $("#auto_id_config").val(data['id']);
            $("#src_config").val(data['src']);
            let html = ``;
            $("#accesorio_contacto").html('');
            if(data['facebook'].length >= 0){
                html += `<a href="${data['facebook']}"><i class="fa-brands fa-facebook-square fa-xl mr-2"></i></a>`;
            }
            if(data['instagram'].length >= 0){
                html += `<a href="${data['instagram']}"><i class="fa-brands fa-instagram-square fa-xl mr-2"></i></a>`;
            }
            if(data['whatsapp'].length >= 0){
                html += `<a href="${data['whatsapp']}"><i class="fa-brands fa-whatsapp-square fa-xl mr-2"></i></a>`;
            }
            if(data['messenger'].length >= 0){
                html += `<a href="${data['messenger']}"><i class="fa-brands fa-facebook-messenger fa-xl"></i></a>`;
            }

            $("#accesorio_contacto").html(html);


            $('.product').TreeSixtyImageRotate({
                totalFrames: 11,
                endFrame: 11,
                currentFrame: 0,
                extension: ".jpeg",
                imagesFolder: "assets/images/" + data['src'] + "/",
                smallWidth: 450,
                smallHeight: 350,
                largeWidth: 1280,
                largeHeight: 900,
                imagePlaceholderClass: "images-placeholder"
            }).initTreeSixty();

        }
    })

}

var guardar_configuracion = ()=> {
    $("#guardar_configuracion").click(function(){

        let temporal = $("#config_temporal").val();
        let id = 0;
        let src_config;
        if(temporal == 1){
            Notiflix.Report.Failure(
                'Error',
                'Debe realizar una modificación',
                'Ok', 
                );
        }else{
            id = $("#auto_id_config").val();
            src_config = $("#src_config").val();

            $.ajax({
                url:"administrador/controller/galeriaController.php",
                data:"option=guardar_configuracion&id=" + id + "&src_config="+src_config,
                method:"GET",
                success: function(response){
                    Notiflix.Report.Success(
                        'Success',
                        'Configuración guardada',
                        'Ok', ()=>{
                            window.location = "mi-garage";
                        }
                        );
                }
            })

        }

    })
}