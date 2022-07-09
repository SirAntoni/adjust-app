$(function(){
    contadores_dashboard();
})

const contadores_dashboard = function(){
    $.ajax({
        url:'controller/dashboardController.php',
        method:'POST',
        success:function(response){
            let data = JSON.parse(response);
            $("#dashboard_autos").html(data['autos']);
            $("#dashboard_categorias").html(data['categorias']);
            $("#dashboard_partes").html(data['partes']);
        }
    })
}