$(function(){
    cargar_configuraciones();
    edit_user();
    get_user_id();
})


const get_user_id = ()=>{

    $.ajax({
        url:"administrador/controller/miGarageController.php",
        method:"GET",
        data: 'option=get_user_id',
        success: function (response){
            const data = JSON.parse(response);
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
        const formData = new FormData($('#formAgregarCartel')[0]);
        $.ajax({
            
        })
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

            let html = ``;

            data.forEach((element) => {

                html += `<div class="col-md-3 mb-3"><a href="detalle?config_id=${element['mtmaca_id']}"><img src="assets/images/${element['imagen']}" width="100%" alt=""></a></div>`;

            })

            $("#configuraciones").html(html);

        }
    })

}