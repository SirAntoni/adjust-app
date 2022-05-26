<?php
if(!isset($_GET['start']) && $_GET['start'] !=true){
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adjust App | HOME</title>
    <link rel="stylesheet" href="assets/css/style-home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
    body {
        background: url(assets/images/bg/bg-home.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        margin: 0;
        height: 100vh;
    }

    @media (max-width: 600px) {
        .opcion-home {
            width: 220px !important;
        }
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="row text-center content">
            <div class="col-md-6">
                <a href="galeria"><img src="assets/images/galeria.png" class="opcion-home" alt=""></a>
            </div>
            <div class="col-md-6">
                <a href="videos"> <img src="assets/images/videos.png" class="opcion-home" alt=""></a>
            </div>
            <div class="col-md-6">
                <a href="login-register"><img src="assets/images/mi-garage.png" class="opcion-home" alt=""></a>
            </div>
        </div>
    </div>


</body>

</html>