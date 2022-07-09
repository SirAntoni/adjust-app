<?php
ob_start();
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:login');
}

if (!isset($_GET['module'])) {
    header('Location:main?module=dashboard');
}

require "config/conexion.php";

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DASHBOARD | Sistema Interno de control de stock | <?php echo date("Y"); ?></title>
    <!-- core:css -->
    <link rel="stylesheet" href="assets/vendors/core/core.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/estilos/style.css">
    <link rel="stylesheet" href="assets/css/estilos/custom.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    
</head>

<body>
    <input type="hidden" id="rolMain" value="<?php echo $_SESSION['rol'] ?>">
    <div class="main-wrapper">

        <!-- partial:partials/_navbar.html -->
        <div class="horizontal-menu">
            <?php include "include/header.php"; ?>
            <?php include "include/navbar.php"; ?>
        </div>
        <!-- partial -->

        <div class="page-wrapper">

            <div class="page-content">


                <?php

                if (isset($_GET['module'])) {
                    $module = $_GET['module'];
                } else {
                    $module = '';
                }

                switch ($module) {
                    case 'dashboard':
                        require_once "views/dashboard.php";
                        break;

                    case 'marcas':
                        require_once "views/marcas.php";
                        break;

                    case 'tipos':
                        require_once "views/tipos.php";
                        break;

                    case 'modelos':
                        require_once "views/modelos.php";
                        break;

                    case 'anios':
                        require_once "views/anios.php";
                        break;

                    case 'crear-auto':
                        require_once "views/crear-auto.php";
                        break;

                    case 'asignar-categoria':
                        require_once "views/asignar-categoria.php";
                        break;

                    case 'asignar-autoparte':
                        require_once "views/asignar-autoparte.php";
                        break;
                    
                    case 'categorias':
                            require_once "views/categorias.php";
                            break;

                    default:
                        require_once "views/dashboard.php";
                        break;
                }

                ?>

            </div>

            <?php include "include/footer.php"; ?>

        </div>
    </div>

    <!-- core:js -->
    <script src="assets/vendors/core/core.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="assets/vendors/moment/moment.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/vendors/select2/select2.min.js"></script>
    <!-- end plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/vendors/feather-icons/feather.min.js"></script>
    <script src="assets/js/template.js"></script>
    <!-- endinject -->
    <!-- custom js for this page -->
    <script src="assets/js/notiflix.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/select2.js"></script>
    <script src="assets/js/file-upload.js"></script>
    <script src="app/app.js"></script>

    <?php
    
    switch($module) {
        case 'crear-auto':
            echo "<script src='app/app-crear-auto.js'></script>";
            break;
        case 'asignar-categoria':
            echo "<script src='app/app-asignar-categoria.js'></script>";
            break;
        case 'asignar-autoparte':
            echo "<script src='app/app-asignar-autoparte.js'></script>";
            break;
        case 'dashboard':
                echo "<script src='app/app-dashboard.js'></script>";
                break;
        default:
            echo "";
            break;
    }
    
    ?>
    
    <!-- end custom js for this page -->
</body>

</html>