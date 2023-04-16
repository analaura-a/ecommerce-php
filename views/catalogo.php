<?php
require_once "includes/productos.php";

$categoriaSeleccionada = isset($_GET['categoria']) ? $_GET['categoria'] : false;
$categoria = $productos[$categoriaSeleccionada] ?? [];

// echo 
count($categoria); 
?>

<h1 class="h1 h1-catalogo my-5"><?= ucwords(str_replace("-", " ", $categoriaSeleccionada)); ?></h1>

<div class="contenedor-productos container-fluid">

    <div class="row">
        <?php if(count($categoria)){

        foreach ($categoria as $prenda) { ?>

            <div class="col-12 col-lg-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="<?= $prenda['imagen']?>" class="card-img-top img-producto" alt="<?= $prenda['nombre']; ?>">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <p class="fs-6 m-0 fw-subtitulo text-primary"><?= $prenda['prenda'] ?></p>
                            <h5 class="card-title h2-card"><?= $prenda['nombre']; ?></h5>
                            <p class="card-text"><?= $prenda['descripcion']; ?></p>
                            <p class="card-text"><small class="text-body-secondary">Talle: <?= $prenda['talle'] ?></small></p>
                            <p class="card-text"><small class="text-body-secondary">Color: <?= $prenda['color'] ?></small></p>
                            <div class="fs-3 mb-3 fw-bold text-left text-primary">$<?= $prenda['precio'] ?></div>
                            <a href="#" class="btn btn-primary w-100 fw-bold">COMPRAR</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

        <?PHP }  } else { ?>
            <h2>No hay prendas disponibles para esa categoría.</h2>
        <?PHP }?>
    </div>

</div>