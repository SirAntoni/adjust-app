<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location:main?modulo=dashboard');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Antony A. Culqui Carranza">
    <title>Iniciar sesión | Administrador | <?php echo date("Y"); ?></title>
    <!-- core:css -->
    <link rel="stylesheet" href="assets/vendors/core/core.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/estilos/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page login">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-5 pr-md-0">
                                    <div class="auth-left-wrapper">

                                    </div>
                                </div>
                                <div class="col-md-7 pl-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="index.php" class="text-center noble-ui-logo d-block mb-2">ADJUST-APP</a>
                                        <h5 class="text-muted text-center font-weight-normal mb-4">¡Bienvenido denuevo!
                                            Ingrese a su cuenta.
                                        </h5>
                                        <form id="formLogin">
                                            <input type="hidden" name="option" value="login-admin">
                                            <div class="form-group">
                                                <label for="user">usuario</label>
                                                <input type="text" name="user" class="form-control"
                                                    placeholder="Usuario">
                                            </div>
                                            <div class="form-group">
                                                <label for="contrasena">Contraseña</label>
                                                <input type="password" class="form-control" name="password"
                                                    id="contrasena" placeholder="Ingrese su contraseña">
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit"
                                                    class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Iniciar
                                                    sesión</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- core:js -->
    <script src="assets/vendors/core/core.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- end plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/vendors/feather-icons/feather.min.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="app/frontend.js"></script>
    <script src="assets/js/notiflix.js"></script>
    <!-- endinject -->
    <!-- custom js for this page -->
    <!-- end custom js for this page -->
</body>

</html>