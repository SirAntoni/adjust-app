$(function() {
    login();
});

var login = function() {
    $("#formLogin").submit(function(e) {

        e.preventDefault();
        var data = $(this).serialize();
        console.log(data);
        $.ajax({
            method: "POST",
            url: "controller/userController.php",
            data: data,
            beforeSend: function() {
                Notiflix.Loading.Pulse("Procesando...");
            },
            success: function(data) {
                Notiflix.Loading.Remove();
                var response = JSON.parse(data);
                if (response.status == "success") {
                    window.location = response.url;
                }
                if (response.status == "error") {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            },
        });
    });
};