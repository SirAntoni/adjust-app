<?php
session_start();
if(isset($_SESSION['correo'])){
    header('Location:principal?modulo=dashboard');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrate | Manejo de pedidos online | 2020</title>
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
    <script src="https://www.google.com/recaptcha/api.js?render=6LemzqUZAAAAAJBfNvqqpfNjx5CNZqTKDYsNgSma"></script>

</head>

<body>
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-9 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pr-md-0">
                                    <div class="auth-left-wrapper">

                                    </div>
                                </div>
                                <div class="col-md-8 pl-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="index.php" class="text-center noble-ui-logo d-block mb-2"><img
                                                width="100px" src="assets/images/logo.svg"></a>
                                        <h5 class="text-center text-muted font-weight-normal mb-4">Crea una nueva cuenta
                                        </h5>
                                        <form id="formRegistro">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="correo">Correo eléctronico:</label>
                                                        <input type="text" class="form-control" id="correo"
                                                            autocomplete="Username"
                                                            placeholder="Ingrese su correo eléctronico" name="correo">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="contrasena">Contraseña:</label>
                                                        <input type="password" class="form-control" id="contrasena"
                                                            placeholder="Ingrese su contraseña" name="contrasena">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre:</label>
                                                        <input type="text" class="form-control" id="nombre"
                                                            placeholder="Ingrese su nombre" name="nombre">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="primerapellido">Primero Apellido:</label>
                                                        <input type="text" class="form-control" id="primerapellido"
                                                            placeholder="Ingrese su primer apellido" name="primerapellido">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="segundoapellido">Segundo Apellido:</label>
                                                        <input type="text" class="form-control" id="segundoapellido"
                                                            placeholder="Ingrese su segundo apellido" name="segundoapellido">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tipoidentificacion">Tipo de identificación:</label>
                                                        <select name="tipoidentificacion">
                                                            <option value="DNI">DNI</option>
                                                            <option value="RUC">RUC</option>
                                                            <option value="CARNET DE ESTRANJERIA">CARNET DE ESTRANJERIA
                                                            </option>
                                                            <option value="PTP">PTP</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="identificacion">Identificación:</label>
                                                        <input type="text" class="form-control" id="identificacion"
                                                            placeholder="Ingrese su identificacion" name="identificacion">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="telefonocasa">Teléfono de casa:</label>
                                                        <input type="text" class="form-control" id="telefonocasa"
                                                            placeholder="Ingrese su teléfono" name="telefonocasa">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="telefonomovil">Teléfono móvil:</label>
                                                        <input type="text" class="form-control" id="telefonomovil"
                                                            placeholder="Ingrese su teléfono" name="telefonomovil">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="genero">Género:</label>
                                                        <select name="genero">
                                                            <option value="Masculino">Masculino</option>
                                                            <option value="Femenino">Femenino</option>
                                                            <option value="Otros">Otros</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="pais">Pais:</label>
                                                        <select name="pais">
                                                            <option value="Perú">Perú</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="departamento">Departamento:</label>
                                                        <select name="departamento">
                                                            <option value="Lima">Lima</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="provincia">Provincia:</label>
                                                        <select name="provincia">
                                                            <option value="Lima">Lima</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="distrito">Distrito:</label>
                                                        <select name="distrito">
                                                            <option value="Lurigancho">Lurigancho</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                    

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="direccion">Dirección:</label>
                                                        <input type="text" class="form-control" id="direccion"
                                                            autocomplete="Username"
                                                            placeholder="Ingrese su dirección" name="direccion">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="referencia">Referencia:</label>
                                                        <input type="test" class="form-control" id="referencia"
                                                            placeholder="Ingrese una referencia" name="referencia">
                                                            <input type="hidden" name="google-response-token" id="google-response-token">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="alert alert-warning" role="alert">
                                                        <div class="form-check form-check-flat form-check-primary">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" id="ch" class="form-check-input">
                                                                Acepto los términos y condiciones del Contrato de
                                                                Membresia de Shop4us.
                                                            </label>
                                                            <a href="terminosycondiciones"
                                                                style="font-size:0.85em;margin-left:2.5em !important;"
                                                                class="alert-link">*Ver terminos y condiciones</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-3">
                                                <button type="submit"
                                                    class="btn btn-primary text-white mr-2 mb-2 mb-md-0">Crear
                                                    cuenta</a>
                                            </div>
                                            <a href="index.php" class="d-block mt-3 text-muted">¿Ya tienes una cuenta?
                                                Inicia sesión</a>
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
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- end plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/vendors/feather-icons/feather.min.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="app/frontend.js"></script>
    <script src="assets/js/notiflix.js"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6LemzqUZAAAAAJBfNvqqpfNjx5CNZqTKDYsNgSma', { action: 'submit' }).then(function(token) {
                $("#google-response-token").val(token);
            });
        });
    </script>
    <!-- endinject -->
    <!-- custom js for this page -->
    <!-- end custom js for this page -->
</body>

</html>