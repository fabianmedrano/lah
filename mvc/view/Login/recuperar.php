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

    <title>RECUPERAR</title>
</head>
<body class="text-center">

<?php
    session_start();
    $_SESSION["admin"] = null;
    $letras = ["A", "B", "C", "D"];

    $lista = array();

    array_push($lista, (object)["x"=>rand (0,3),"y"=>rand (0,3)]);
    array_push($lista, (object)["x"=>rand (0,3),"y"=>rand (0,3)]);
    array_push($lista, (object)["x"=>rand (0,3),"y"=>rand (0,3)]);

    $_SESSION["coordenadas"] = $lista;

    if(isset($_SESSION["recuperar"])){
?>
<form class="form-signin" action="../../Controller/Login/Login_controller.php" method="post">
    <img class="mb-4" src="../../public/logo.png" alt="" width="200" height="100">
    <?php

    if(isset($_SESSION["alerta"])){
        ?>
        <div class="alert alert-warning" role="alert" id="alerta">
            Datos incorrectos!!
        </div>
        <?php
    }
    ?>
    <label for="inputUsuario" class="sr-only"></label>
    <input type="text" id="inputUsuario" class="form-control" placeholder="Nueva Contraseña" name="pass1"
       required minlength="6" maxlength="10">
    <label for="inputPassword" class="sr-only"></label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Confirmar Contraseña" name="pass2"
       required minlength="6" maxlength="10">
    <input class="btn btn-block btn-outline-success" type="submit" value="Validar Datos" name="cambiarPass">
</form>
<?php
    }else{
?>

<form class="form-signin" action="../../Controller/Login/Login_controller.php" method="post">
    <img class="mb-4" src="../../public/logo.png" alt="" width="200" height="100">
    <?php

    if(isset($_SESSION["alerta"])){
        ?>
        <div class="alert alert-warning" role="alert" id="alerta">
            Datos incorrectos!!
        </div>
        <?php
    }
    ?>
    <div class="row">
        <div class="col-md-4 form-group">
            <label for="titulo"><?php echo $letras[$lista[0]->x].($lista[0]->y+1)?></label>
            <input type="text" class="form-control text-center" name="dato1" required minlength="2" maxlength="2">
        </div>
        <div class="col-md-4 form-group">
            <label for="titulo"><?php echo $letras[$lista[1]->x].($lista[1]->y+1)?></label>
            <input type="text" class="form-control text-center" name="dato2" required minlength="2" maxlength="2">
        </div>
        <div class="col-md-4 form-group">
            <label for="titulo"><?php echo $letras[$lista[2]->x].($lista[2]->y+1)?></label>
            <input type="text" class="form-control text-center" name="dato3" required minlength="2" maxlength="2">
        </div>
    </div>
    <input class="btn btn-block btn-outline-success" type="submit" value="Validar Datos" name="validarDatos">
</form>
<?php }?>

</body>
</html>
