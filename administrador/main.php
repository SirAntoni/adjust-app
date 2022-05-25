<?php
ob_start();
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:login');
}
if(!isset($_SESSION["cart"])) $_SESSION["cart"] = [];

if (!isset($_GET['module'])) {
    header('Location:main?module=dashboard');
}else{
    if($_GET['module'] == 'add-purchase' || $_GET['module'] == 'add-sale'){
        unset($_SESSION["cart"]);
        unset($_SESSION['price_delivery']);
        $_SESSION["cart"] = [];
    }

    if($_GET['module'] == 'add-purchase'){
        $_SESSION['module'] = 'add-purchase';
    }elseif($_GET['module'] == 'add-sale'){
        $_SESSION['module'] = 'add-sale';
    }else{
        unset($_SESSION["module"]);
    }

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
    <script src="https://kit.fontawesome.com/7eddb11fcf.js" crossorigin="anonymous"></script>
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

                    case 'cash':
                        require_once "views/cash.php";
                        break;

                    case 'cash-closing':
                        require_once "views/cash-closing.php";
                        break;

                    case 'income':
                        require_once "views/income.php";
                        break;

                    case 'expenses':
                        require_once "views/expenses.php";
                        break;

                    case 'categories':
                        require_once "views/categories.php";
                        break;

                    case 'articles':
                        require_once "views/articles.php";
                        break;

                    case 'brands':
                        require_once "views/brands.php";
                        break;
                    
                    case 'add-purchase':
                        require_once "views/add-purchase.php";
                        break;

                    case 'purchases':
                        require_once "views/purchases.php";
                        break;

                    case 'providers':
                        require_once "views/providers.php";
                        break;

                    case 'sales':
                        require_once "views/sales.php";
                        break;

                    case 'add-sale':
                        require_once "views/add-sale.php";
                        break;

                    case 'clients':
                        require_once "views/clients.php";
                        break;
                    
                    case 'users':
                        require_once "views/users.php";
                        break;

                    case 'settings':
                        require_once "views/settings.php";
                        break;

                    case 'vouchers':
                        require_once "views/vouchers.php";
                        break;

                    case 'contacts':
                        require_once "views/contacts.php";
                        break;

                    case 'payment_methods':
                        require_once "views/payment_methods.php";
                        break;

                    case 'reports':
                        require_once "views/reports.php";
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

    <script src="app/app.js"></script>
    
    <!-- end custom js for this page -->
</body>

</html>