<?php

require_once "classes/Prenda.php";

$prendaSeleccionada = isset($_GET['id']) ? $_GET['id'] : false;

$catalogo = new Prenda();
$prenda = $catalogo->catalogo_por_id($prendaSeleccionada);

?>

<div class="product-container my-5">

    <?php if (isset($prenda)) { ?>



        <img src="<?= $prenda->imagen ?>" class="img-product rounded" alt="<?= $prenda->nombre; ?>">


        <div class="product-info mt-3">
            <p class="fs-6 m-0 fw-subtitulo fs-4"><?= $prenda->prenda; ?></p>
            <h2 class="h1 text-start"><?= $prenda->nombre; ?></h2>
            <p class="fs-6 mt-5 fw-bold fs-5">Descripción</p>
            <p><?= $prenda->descripcion; ?></p>
            <p class="text-secondary fs-7 mt-1"><?= $prenda->publicacion; ?></p>

            <p class="mt-5"><span class="fw-bold">Color:</span> <?= $prenda->color; ?></p>
            <p class="mt-1"><span class="fw-bold">Talle:</span> <?= $prenda->talle; ?></p>

            <p class="mt-5 fw-bold fs-1"><span class="lilac-text">$ </span><?= $prenda->precio_formateado(); ?></p>
            <button class="btn bg-black w-100 fw-bold lilac-text py-3 mt-5 rounded-3 mb-0 mx-auto d-block" style="max-width:500px">AGREGAR AL CARRITO</button>
        </div>



    <?PHP
    } else { ?>
        <h2 class="text-center mt-3">¡Ups! El producto que estás buscando no existe.</h2>
        <a href="index.php?seccion=home" class="btn bg-black fw-bold lilac-text py-3 m-auto mt-5 rounded-pill" style="max-width:250px">VOLVER AL INICIO</a>
    <?PHP } ?>

</div>