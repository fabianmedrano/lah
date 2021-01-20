<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../../lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/signin.css">

    <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>

    <title>Login</title>
</head>
<body class="text-center">

<form class="form-signin" action="../../Controller/Login/Login_controller.php" method="post">
    <img class="mb-4" src="../../public/logo.png" alt="" width="200" height="100">
    <?php
    session_start();

    if(isset($_SESSION["admin"])){
        ?>
        <div class="alert alert-warning" role="alert" id="alerta">
            Contraseña incorrecta!!
        </div>
        <?php
    }
    ?>

    <label for="inputUsuario" class="sr-only"></label>
    <input type="text" id="inputUsuario" class="form-control" placeholder="Usuario" name="user" required>
    <label for="inputPassword" class="sr-only">Contraseña</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" name="pass" required>

    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Inicio Sesión" name="submit">
    <hr>
    <a href="recuperar.php">Recuperar Contraseña</a>
    <p class="mt-5 mb-3 text-muted">&copy; <script>document.write(new Date().getFullYear());</script> - ASIREA</p>
</form>


</body>
</html>