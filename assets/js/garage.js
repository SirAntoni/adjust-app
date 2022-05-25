$(function(){
    cargar_configuraciones();
})


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