<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADJUST APP | GALERIA</title>
    <link rel="stylesheet" href="assets/css/detalle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/808596313d.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="assets/js/360ImageRotate.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <style>
    body {
        background: url(assets/images/bg/bg-video.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        margin: 0;
        height: 100vh;
    }

    .carousel_categorias {
        background: #FFF;
    }

    .carousel_accesorios {
        background: #2C3E50;
    }


    .carousel-cell {
        width: 100%;
        height: 250px;
        background: #FFF;
        counter-increment: carousel-cell;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .carousel-cell img {
        width: 100%;
    }


    .carousel-cell-prod {
        width: 50%;
        height: 250px;
        background: #FFF;
        margin-right: 20px;
        counter-increment: carousel-cell;
        display: flex;
        align-items: center;
    }

    /* cell number
    .carousel-cell:before {
        display: block;
        text-align: center;
        content: counter(carousel-cell);
        line-height: 200px;
        font-size: 80px;
        color: white;
    }
  */
    </style>


</head>

<body>

    <?php if (isset($_GET['id'])) {?>
    <input type="hidden" id="tipo_config" name="tipo_config" value="1">
    <?php $id = $_GET['id'];}?>
    <?php if (isset($_GET['config_id'])) {?>
    <input type="hidden" id="tipo_config" name="tipo_config" value="2">


    <?php $id = $_GET['config_id'];}?>

    <input type="hidden" id="config_temporal" name="config_temporal" value="1">
    <input type="hidden" id="auto_id" name="auto_id" value="<?php echo $id; ?>">
    <input type="hidden" id="auto_id_config" name="auto_id_config" value="0">
    <input type="hidden" id="src_config" name="src_config" value="0">

    <div class="container h-100 d-flex align-items-center">


        <div class="row">
            <div class="col-md-12 name_auto">
                <h3 id="titulo">-</h3>
            </div>
            <div class="col-md-12 preview_auto">
                <div class="threesixty-image-rotate product">

                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4 p-0">
                        <div id="carousel_categorias" class="carousel_categorias">

                        </div>
                    </div>
                    <div class="col-md-8 p-0">
                        <div id="carousel_accesorios" class="carousel_accesorios">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 bg-info">
                <div class="row">

                    <div class="col-md-4 d-flex align-items-center"
                        style="height:70px;background:#546E7A;border-bottom: #eee solid 1px;">Accesorios</div>
                    <div id="accesorio_titulo" class="col-md-8 d-flex align-items-center"
                        style="height:70px;background:#607D8B;color:#fff;border-bottom: #eee solid 1px;">-</div>
                    <div class="col-md-4 d-flex align-items-center"
                        style="height:70px;background:#546E7A;border-bottom: #eee solid 1px;">Stock</div>
                    <div id="accesorio_stock" class="col-md-8 d-flex align-items-center"
                        style="height:70px;background:#607D8B;color:#fff;border-bottom: #eee solid 1px;">-
                    </div>
                    <div class="col-md-4 d-flex align-items-center"
                        style="height:110px;background:#546E7A;border-bottom: #eee solid 1px;">Contacto</div>
                    <div id="accesorio_contacto" class="col-md-8 d-flex align-items-center">




                    </div>

                </div>
            </div>

            <?php if (isset($_SESSION['email'])) {?>
            <div class="col-md-12 text-center py-4">
                <button id="guardar_configuracion" class="btn btn-success">Guardar configuración</button>
                <a href="index" class="btn btn-danger">volver</a>
            </div>

            <?php } else {?>
            <div class="col-md-12 text-center py-4">
                <a href="index" class="btn btn-danger">volver</a>
            </div>
            <?php }?>

        </div>




    </div>





    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    <script src="administrador/assets/js/notiflix.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script>
    $(document).ready(function() {
        // jQuery
        const id = $('#auto_id').val();

        if ($("#tipo_config").val() == 1) {

            $.ajax({
                url: 'administrador/controller/galeriaController.php',
                method: 'GET',
                data: 'option=get_auto&id=' + id,
                success: function(response) {
                    const data = JSON.parse(response);
                    $("#titulo").html(data['name_config']);
                    $('.product').TreeSixtyImageRotate({
                        totalFrames: 11,
                        endFrame: 11,
                        currentFrame: 0,
                        extension: ".jpeg",
                        imagesFolder: "assets/images/" + data['src_config'] + "/",
                        smallWidth: 450,
                        smallHeight: 350,
                        largeWidth: 1280,
                        largeHeight: 900,
                        imagePlaceholderClass: "images-placeholder"
                    }).initTreeSixty();
                }
            })

        } else {

            get_accesorio_detalle(id);

            $.ajax({
                url: "administrador/controller/galeriaController.php",
                method: "GET",
                data: "option=get_id_auto&id=" + id,
                success: function(response) {

                    const id = response;

                    $.ajax({
                        url: 'administrador/controller/galeriaController.php',
                        method: 'GET',
                        data: 'option=get_auto&id=' + id,
                        success: function(response) {
                            const data = JSON.parse(response);
                            $("#titulo").html(data['name_config']);
                        }
                    })

                    $.ajax({
                        url: 'administrador/controller/galeriaController.php',
                        method: 'GET',
                        data: 'option=get_categorias_auto&id=' + id,
                        success: function(response) {

                            const data = JSON.parse(response);
                            let html = ``;

                            const categoria_inicial = data[0]['id'];

                            $.ajax({
                                url: 'administrador/controller/galeriaController.php',
                                method: 'GET',
                                data: 'option=get_categorias_auto_accesorios&mtmac_id=' +
                                    categoria_inicial,
                                success: function(response) {
                                    let data = JSON.parse(response);

                                    let html = ``;

                                    data.forEach((element) => {
                                        html +=
                                            `<div class="carousel-cell-prod"><img src="assets/images/${element['image']}" class="products" data-target="${element['id']}" width="100%" alt="" onclick="get_accesorio_detalle(${element['id']})" ></div>`;
                                    })

                                    $("#carousel_accesorios").html(html);
                                    $("#carousel_accesorios").flickity({
                                        contain: true
                                    });

                                }


                            })

                            data.forEach((element) => {
                                html += `<div class="carousel-cell"><img src="assets/images/${element['image']}" class="category"
                data-target="" width="100%" alt="" onclick="get_accesorios(${element['id']})"></div>`;
                            })

                            $("#carousel_categorias").html(html);
                            $("#carousel_categorias").flickity();


                        }
                    })
                }
            })



        }


    });
    </script>
</body>

</html>