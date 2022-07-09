$(function(){
    cargar_configuraciones();
    edit_user();
    get_user_id();
    reset_password();
})


const get_user_id = ()=>{

    $.ajax({
        url:"administrador/controller/miGarageController.php",
        method:"GET",
        data: 'option=get_user_id',
        success: function (response){
            const data = JSON.parse(response);
            console.log(data);
            $("#foto-perfil").html(`<img src="assets/images/users/${data.imagen}" alt="${data.name} ${data.last_name}" width="60px" class="rounded-circle mr-3">`)
            $("#edit_user_name").val(data.name);
            $("#nombre_usuario").html(data.name + ' ' + data.last_name);
            $("#codigo").html(data.codigo);
            $("#edit_user_last_name").val(data.last_name);
            $("#edit_user_img_temporal").val(data.imagen);
        }

    })

}

var edit_user = ()=>{

    $("#formEditUser").submit(function(e){
        e.preventDefault();
        const formData = new FormData($('#formEditUser')[0]);
        
        
        $.ajax({
            url:"administrador/controller/userController.php",
            method:"POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                Notiflix.Loading.Standard('Editando usuario...');
            },
            complete: function() {
                Notiflix.Loading.Remove();
            },
            success: function(resp){
                const response = JSON.parse(resp);
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
                        ()=>{
                            get_user_id();
                            $("#edit-user").modal('hide');
                        }
                        );

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

var reset_password = ()=>{

    $("#formEditPassword").submit(function(e){
        e.preventDefault();
        const data = $(this).serialize();
        const password = $("#password").val();
        const confirm_password = $("#confirm_password").val();

        if(password === confirm_password){
            $.ajax({
                url:"administrador/controller/userController.php",
                method:"POST",
                data: data,
                beforeSend: function() {
                    Notiflix.Loading.Standard('Editando usuario...');
                },
                success: function(resp){
                    Notiflix.Loading.Remove();
                    const response = JSON.parse(resp);
                    console.log(response);
                    if (response.status == "error") {
    
                        Notiflix.Report.failure(
                            'Error',
                            response.message,
                            'Ok',
                            );
    
                    }else if(response.status == "success"){
                       
                        Notiflix.Report.Success(
                            'Success',
                            response.message,
                            'Ok',
                            ()=>{
                                get_user_id();
                                $("#edit-password").modal('hide');
                                $("#formEditPassword").trigger('reset');
                            }
                            );
    
                    }else{
                        Notiflix.Report.Failure(
                            'Error',
                            'Hubo un error en el servidor. Contactate con el administrador del sistema',
                            'Ok',
                            );
                    } 
                }
            })
        }else{
            Notiflix.Report.Failure(
                'Error',
                'Las contraseñas deben de ser iguales.',
                );
        }

        


    })

}

var cargar_configuraciones = () =>{
    

    let user_id = $("#user_id").val();

    $.ajax({
        url:'administrador/controller/miGarageController.php',
        method: 'GET',
        data:'option=get_garage&user_id=' + user_id,
        success: function(response){
            let data = JSON.parse(response);
            console.log(data);
            let html = ``;

            data.forEach((element) => {

                html += `<div class="col-md-3 mb-3"><a href="detalle?config_id=${element['mtmaca_id']}"><img src="assets/images/${element['imagen']}" width="100%" alt="" class="config-garage"></a><p class="text-center">${element['accesorio']}</p></div>`;

            })

            $("#configuraciones").html(html);

        }
    })

}