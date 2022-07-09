$(function(){
   select_brands();
   select_types();
   select_models();
   select_anios();
})

const select_brands = function(){
    $.ajax({
        url:"controller/brandController.php",
        data:{option:"get_brands"},
        method:"POST",
        success: function(response){
           let html = `<option value="">Seleccione una marca</option>`;
           response = JSON.parse(response);
           response.forEach(function(valor,indice,array){
            html = html + `<option value="${valor.id}">${valor.mark}</option>`;
           });
           $("#brands").html(html);
        }
    })
}

const select_types = function(){
    $.ajax({
        url:"controller/typeController.php",
        data:{option:"get_types"},
        method:"POST",
        success: function(response){
           let html = `<option value="">Seleccione un tipo</option>`;
           response = JSON.parse(response);
           response.forEach(function(valor,indice,array){
            html = html + `<option value="${valor.id}">${valor.type}</option>`;
           });
           $("#types").html(html);
        }
    })
}

const select_models = function(){
    $.ajax({
        url:"controller/modelController.php",
        data:{option:"get_models"},
        method:"POST",
        success: function(response){
           let html = `<option value="">Seleccione un modelo</option>`;
           response = JSON.parse(response);
           response.forEach(function(valor,indice,array){
            html = html + `<option value="${valor.id}">${valor.model}</option>`;
           });
           $("#models").html(html);
        }
    })
}

const select_anios = function(){
    $.ajax({
        url:"controller/anioController.php",
        data:{option:"get_anios"},
        method:"POST",
        success: function(response){
           let html = `<option value="">Seleccione un año</option>`;
           response = JSON.parse(response);
           response.forEach(function(valor,indice,array){
            html = html + `<option value="${valor.id}">${valor.anio}</option>`;
           });
           $("#anios").html(html);
        }
    })
}