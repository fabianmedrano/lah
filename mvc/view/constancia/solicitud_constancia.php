<!doctype html>
<html lang="es">

<head>

    <?php require_once "../base/metadata.php" ?>
    <?php require_once "../base/template.php" ?>




    <script src="../../lib/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../lib/jquery-validation/additional-methods.min.js"></script>



    <script src="../../public/js/constancia/constancia_validate.js"></script>

    <script src="../../public/js/constancia/constancia.js"></script>

    <title>Nosotros</title>
</head>

<body class="text-center" cz-shortcut-listen="true">

    <?php require_once "../base/navbarCliente.php" ?>
    <div class="cover-container d-flex w-75 h-100 p-3 mx-auto flex-column">

        <main role="main" class="inner cover">
            <h1 class="cover-heading">Solicitar Constancia.</h1>
            <p class="lead">Este espacio es para sealizar la solicitud de constancia, que hace constar que el estudiante. se encuentra matriculado en el sistema educativo.Esta constancia debe de ser retirada en el sistema educativo durante el transcurso de esta semana</p>
            <form action="" name="form_constancia" id="form_constancia" method="post">


                <div>

                    <input class="form-control" type="text" name="input_solicitud_constancia" " placeholder=" Cedula del estudiante" />
                </div>

                <input type="button" class="btn btn-lg btn-secondary mt-4" onclick="realizarSolicitud()" value="Solicitar">

            </form>
        </main>


    </div>



</body>

</html>