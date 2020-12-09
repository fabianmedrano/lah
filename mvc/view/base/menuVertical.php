<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="btn btn-link text-muted" href="#"> NOSOTROS</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-link text-muted" href="#"> NOTICIAS</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-link text-muted" href="#"> PERSONAL</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-link text-muted" href="#"> SOLICITUDES</a>
            </li>
        </ul>

        <h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Estudiantes</span>
        </h4>
        <div id="accordion">

            <?php
                $grados = ["SÉPTIMO", "OCTAVO", "NOVENO", "DÉCIMO", "UNDÉCIMO"];
                for($i =0; $i<count($grados); $i++){
                    ?>
                    <div class="card item-vertical">
                        <div class="card-header " id="heading<?php echo ($i+7)?>">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-muted" data-toggle="collapse" data-target="#collapse<?php echo ($i+7)?>" aria-expanded="true" aria-controls="collapse<?php echo ($i+7)?>">
                                    <?php echo $grados[$i]?>
                                </button>
                            </h5>
                        </div>

                        <div id="collapse<?php echo ($i+7)?>" class="collapse" aria-labelledby="heading<?php echo ($i+7)?>" data-parent="#accordion">
                            <div class="card-body ml-3">
                                <button class="btn btn-link text-muted"><?php echo ($i+7)?>-1</button>
                                <button class="btn btn-link text-muted"><?php echo ($i+7)?>-2</button>
                                <button class="btn btn-link text-muted"><?php echo ($i+7)?>-3</button>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            ?>

        </div>
    </div>
</nav>

<style>
    .item-vertical{
        background: none;
        border: none
    }

    .item-vertical .card-header {
        background: none;
        border: none
    }

</style>
