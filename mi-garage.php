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
    <style>
    body {
        background: url(assets/images/bg/bg-video.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        margin: 0;
        height: 100vh;
    }
    </style>

</head>

<body>

    <div class="container">
        <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['id']; ?>">
        <div id="user_navbar">
            <div class="row">
                <div class="col-md-6 p-4 d-flex align-items-center  text-white">
                    <img src="assets/images/user.svg" alt="" width="60px" class="mr-3">
                    <h6><?php echo $_SESSION['name'] . " " . $_SESSION['last_name']; ?></h6>
                </div>
                <div class="col-md-6 p-4 d-flex align-items-center justify-content-end  text-white text-right">
                    <div class="codigo">
                        <h5>Codigo de usuario</h5>
                        <h6><?php echo $_SESSION['codigo'];  ?></h6>
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

    <script src="assets/js/garage.js"></script>
</body>

</html>