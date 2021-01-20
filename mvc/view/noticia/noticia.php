 <?php

  require_once "../../controller/noticia/noticia_controller.php";

  ?>
 <!DOCTYPE html>
 <html lang="es">

 <head>

   <?php require_once "../base/metadata.php" ?>


   <link rel="stylesheet" href="../../public/css/dashboard.css">
   <!-- CSS FILES START-->
<link href="../../public/css/noticias/noticias.css" rel="stylesheet">

 </head>

 <body>
   <?php include("../../view/base/navbarCliente.php");

    $controlador_noticia = new noticia_controller();
    $noticia = $controlador_noticia->getNoticiaID($_GET["noticia"]);

    ?>
   


   <div class="container-flex">
     <section class="wrapper news-posts ">
       <div class="row">
         <div class="col-md-7 mx-auto">
           <div class="card shadow p-3 mb-5 bg-white ">
             <div class="page-header">
               <ul class="post-meta">
                 <li id="docFecha">
                   <i class="fas fa-calendar-alt"></i>
                   <?php
                    echo  date("d/m/Y", strtotime($noticia['fecha']));
                    ?>
                 </li>
                 <li id="docAutor">
                   <i class="fas fa-user-tie"></i>
                   <?php
                    echo ($noticia['autor']);
                    ?>
                 </li>
               </ul>
               <hr />

               <h2>
                 <?php
                  echo ($noticia['titulo']);
                  ?>
                 </h1>
             </div>

             <div class="cuerpo">
               <?php
                echo ($noticia['texto']);
                ?>
             </div>
             <input type="button" onclick="history.back()" style='width:110px; ' name="volver atrás" class="btn btn-success " value="volver atrás">

           </div>
         </div>

       </div>
     </section>


   </div>


   <?php include(TEMPLATES_PATH . "/footer.php") ?>
 </body>

 </html> -->