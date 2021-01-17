<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="btn btn-link text-muted" href="#"> NOTICIAS</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-link text-muted" href="../personal/personal_list.php"> PERSONAL</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-link text-muted" href="../constancia/constancia_list.php"> SOLICITUDES</a>
            </li>
        </ul>
    
        <div id="accordion-n">

         
                <div class="card item-vertical">
                    <div class="card-header card-header-nosotros" id="heading nosotros-n ?>">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-muted" data-toggle="collapse" data-target="#collapse-nosotros-n" aria-expanded="true" aria-controls="collapse-nosotros-n ?>">
                               NOSOTROS
                            </button>
                        </h5>
                    </div>

                    <div id="collapse-nosotros-n" class="collapse" aria-labelledby="heading  nosotros-n?>" data-parent="#accordion-n">
                        <div class="card-body ml-3">
                            <button  onclick="window.location='../nosotros/carrusel_admin.php'" class="btn btn-link text-muted">Carrusel</button>
                            <button onclick="window.location='../nosotros/contacto_admin.php'" class="btn btn-link text-muted">Contactos</button>
                            <button onclick="window.location='../nosotros/nosotros_edit.php'" class="btn btn-link text-muted">Nosotros</button>
                        </div>
                    </div>
                </div>
        

        </div>

        <h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Estudiantes</span>
        </h4>
        <div id="accordion">

            <?php
            $grados = ["SÉPTIMO", "OCTAVO", "NOVENO", "DÉCIMO", "UNDÉCIMO"];
            for ($i = 0; $i < count($grados); $i++) {
            ?>
                <div class="card item-vertical">
                    <div class="card-header ">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-muted" aria-expanded="true" onclick="estudiantesXGrados( <?php echo 7+$i ?>)">
                                <?php echo $grados[$i] ?>
                            </button>
                        </h5>
                    </div>

               
                </div>
            <?php
            }
            ?>

        </div>
    </div>
</nav>

<style>
    .item-vertical {
        background: none;
        border: none
    }

    .item-vertical .card-header {
        background: none;
        border: none
    }

    .card-header-nosotros{
    padding: 0px !important;
    font-weight: 400px;
}
</style>