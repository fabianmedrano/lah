 <?php

  include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

  require_once CONTROLLER_PATH . "/noticia/noticia_controller.php";

  ?>
 <!DOCTYPE html>
 <html lang="es">

 <head>

   <?php include(TEMPLATES_PATH . "/metadata.php") ?>
   <!-- CSS FILES START-->
   <link href="<?php echo PUBLIC_PATH ?>/css/general.css" rel="stylesheet">

   <link href="<?php echo PUBLIC_PATH ?>/css/noticias/noticias.css" rel="stylesheet">
   <!-- CSS FILES START-->
   <link href="<?php echo LIB_PATH ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">



   <!--  CSS FILES End -->

   <!--   JS Files Start  -->

   <!--   JS Files END  -->


 </head>

 <body>
   <?php include(TEMPLATES_PATH . "/header.php");

    $controlador_noticia = new NoticiaController();
    $noticia = $controlador_noticia->getNoticiaID($_GET["noticia"]);

    ?>

   <div class="container-flex">
     <section class="wrapper news-posts ">
       <div class="row">
         <div class="col-md-7">
           <div class="card shadow p-3 mb-5 bg-white ">
             <div class="page-header">
               <ul class="post-meta">
                 <li id="docFecha">
                   <i class="fas fa-calendar-alt"></i>
                   <?php
                    echo  date("d/m/Y", strtotime($noticia['fecha']));
                    ?></li>
                 <li id="docAutor">
                   <i class="fas fa-user-tie"></i>
                   <?php
                    echo ($noticia['autor']);
                    ?></li>
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
                echo ($noticia['descripcion']);
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