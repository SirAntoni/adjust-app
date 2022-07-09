$(function(){
    select_categories();
    select_cars();
 })
 
 const select_categories = function(){
     $.ajax({
         url:"controller/categoryController.php",
         data:{option:"get_categories"},
         method:"POST",
         success: function(response){
            let html = `<option value="">Seleccione una categoria</option>`;
            response = JSON.parse(response);
            response.forEach(function(valor,indice,array){
             html = html + `<option value="${valor.id}">${valor.name}</option>`;
            });
            $(".categories").html(html);
         }
     })
 }
 
 const select_cars = function(){
     $.ajax({
         url:"controller/carController.php",
         data:{option:"get_cars"},
         method:"POST",
         success: function(response){
            console.log(response);
            let html = `<option value="">Seleccione un auto</option>`;
            response = JSON.parse(response);
            response.forEach(function(valor,indice,array){
             html = html + `<option value="${valor.id}">${valor.name}</option>`;
            });
            $(".cars").html(html);
         }
     })
 }
 