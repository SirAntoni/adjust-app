<?php
session_start();
if(!isset($_SESSION['email'])){
    header('Location:login-register');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADJUST APP | GALERIA</title>
    <link rel="stylesheet" href="assets/css/mi-garage.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <style>
    body {
        background: url(assets/images/bg/bg-video.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        margin: 0;
        height: 100vh;
    }

    .config-garage{
        border: 4px #000 solid;
    }

    </style>

</head>

<body>

    <div class="container">
        <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['id']; ?>">
        <div id="user_navbar">
            <div class="row">
                <div class="col-md-6 p-4 d-flex align-items-center  text-white">
                    <div id="foto-perfil">
                        
                    </div>
                    <h6 id="nombre_usuario" class="mr-2"></h6><a href="#" data-toggle="modal" data-target="#edit-user"
                        style="color:#fff;margin-top:-5px;"> <i class='bx bx-edit bx-xs'></i></a><a href="#"
                        data-toggle="modal" data-target="#edit-password" style="color:#fff;margin-top:-5px;"> <i
                            class='bx bx-cog bx-xs'></i></a>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="edit-user" data-backdrop="static" data-keyboard="false" tabindex="-1"
                    aria-labelledby="edit-userLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="edit-userLabel">Editar Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="formEditUser">
                                <input type="hidden" name="option" value="update">
                                <div class="modal-body">


                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" id="edit_user_name" name="name" class="form-control"
                                            placeholder="Nombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Apellido</label>
                                        <input type="text" id="edit_user_last_name" name="last_name"
                                            class="form-control" placeholder="Apellido">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Foto</label>
                                        <input type="hidden" id="edit_user_img_temporal" name="archivo">
                                        <input type="file" class="form-control" name="imagen">
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Password -->
                <div class="modal fade" id="edit-password" data-backdrop="static" data-keyboard="false" tabindex="-1"
                    aria-labelledby="edit-userLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="edit-userLabel">Editar Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="formEditPassword">
                            <input type="hidden" name="option" value="reset">
                                <div class="modal-body">


                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input type="text" id="password" name="password" class="form-control"
                                            placeholder="Contraseña">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm-password">Confirmar contraseña</label>
                                        <input type="text" id="confirm_password" name="confirm_password"
                                            class="form-control" placeholder="Confirmar contraseña">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-4 d-flex align-items-center justify-content-end  text-white text-right">
                    <div class="codigo">
                        <h5>Codigo de usuario</h5>
                        <h6 id="codigo"></h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="warpper">
            <input class="radio" id="one" name="group" type="radio" checked>
            <input class="radio" id="two" name="group" type="radio">
            <input class="radio" id="three" name="group" type="radio">
            <div class="tabs">
                <label class="tab" id="one-tab" for="one">GARAGE</label>
                <label class="tab" id="two-tab" for="two">PUNTOS</label>
            </div>
            <div class="panels">
                <div class="panel" id="one-panel">
                    <div id="configuraciones" class="row">

                    </div>
                </div>
                <div class="panel" id="two-panel">
                    <!--div class="panel-title">Take-Away Skills</div-->
                    <p>...</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-4">
                <a href="index" class="text-center text-white">
                    <h5><i class="fas fa-chevron-left mr-2"></i>Volver</h5>
                </a>
                <a href="logout" class="text-center text-white">
                    <h5><i class="fas fa-chevron-left mr-2"></i>Cerrar sesión</h5>
                </a>

            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    <script src="administrador/assets/js/notiflix.js"></script>
    <script src="assets/js/garage.js"></script>
</body>

</html>