<?php  
session_start();
if(isset($_SESSION['email'])){
    header('Location: mi-garage');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADJUST APP | GALERIA</title>
    <link rel="stylesheet" href="assets/css/login.css">
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
    #home{
        width: 55px;
        height: 55px;
        background:#2C3E50;
        cursor: pointer;
        position: absolute;
        top: 0;
        left: 0;
    }

    #home a{
        color: #fff;
    }
    </style>

</head>


<body class="d-flex align-items-center justify-content-center">

<div id="home" class="d-flex align-items-center justify-content-center">
    <a href="index"> <i class='bx bx-home-alt bx-md'></i></a>

</div>
    <section class="forms-section">

        <div class="forms">
            <div class="form-wrapper is-active">
                <button type="button" class="switcher switcher-login">
                    Acceder
                    <span class="underline"></span>
                </button>
                <form id="form-login" class="form form-login">
                    <input type="hidden" name="option" value="login">
                    <fieldset>
                        <legend>Please, enter your email and password for login.</legend>
                        <div class="input-block">
                            <label for="email">E-mail</label>
                            <input name="email" type="email" required>
                        </div>
                        <div class="input-block">
                            <label for="password">Password</label>
                            <input name="password" autocomplete="off" type="password" required>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn-login">Ingresar</button>
                </form>
            </div>
            <div class="form-wrapper">
                <button type="button" class="switcher switcher-signup">
                    Registrar
                    <span class="underline"></span>
                </button>
                <form id="form-signup" class="form form-signup">
                    <input type="hidden" name="option" value="insert">
                    <fieldset>
                        <div class="input-block">
                            <label for="email">E-mail</label>
                            <input name="email" type="email" required>
                        </div>
                        <div class="input-block">
                            <label for="name">Nombres</label>
                            <input name="name" type="text" required>
                        </div>
                        <div class="input-block">
                            <label for="last_name">Apellidos</label>
                            <input type="text" name="last_name" required>
                        </div>
                        <div class="input-block">
                            <label for="password">Password</label>
                            <input type="password" name="password" autocomplete="off" required>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn-signup">Registrar</button>
                </form>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="administrador/assets/js/notiflix.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
    const switchers = [...document.querySelectorAll('.switcher')]

    switchers.forEach(item => {
        item.addEventListener('click', function() {
            switchers.forEach(item => item.parentElement.classList.remove('is-active'))
            this.parentElement.classList.add('is-active')
        })
    })
    </script>
</body>

</html>