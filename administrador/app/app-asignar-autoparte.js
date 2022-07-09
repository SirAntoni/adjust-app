$(function(){
    select_cars();
    select_categories();
})

const select_cars = function(){
    $.ajax({
        url:"controller/carController.php",
        data:{option:"get_cars"},
        method:"POST",
        success: function(response){
           let html = `<option value="">Seleccione un auto</option>`;
           response = JSON.parse(response);
           response.forEach(function(valor,indice,array){
            html = html + `<option value="${valor.id}">${valor.name}</option>`;
           });
           $(".cars").html(html);
        }
    })
}

const select_categories = function(){

    $("#cars").change(function(){
        
        const mtma_id = $("#cars").val();
        $.ajax({
            url:"controller/categoryToCarController.php",
            data:{option:"get_cars_mtma_id", mtma_id:mtma_id},
            method:"POST",
            success: function(response){
               let html = `<option value="">Seleccione una categoria</option>`;
               response = JSON.parse(response);
               response.forEach(function(valor,indice,array){
                html = html + `<option value="${valor.id}">${valor.name_config}</option>`;
               });
               $(".categories").html(html);
            }
        })


    })

}