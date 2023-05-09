<?php

require_once "classes/Prenda.php";

$catalogo = new Prenda();

$categoria = $catalogo->catalogo_completo();

?>

<h1 class="h1 h1-catalogo mt-5">Productos más destacados</h1>
<p class="mb-5 h1-catalogo fs-5">Descubrí los mejores looks y prendas de Lilac.</p>

<div class="contenedor-productos container-fluid">

    <div class="row">
        <?php foreach ($categoria as $prenda) { ?>

            <div class="col-12 col-lg-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= $prenda->imagen; ?>" class="card-img-top img-producto" alt="<?= $prenda->nombre; ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <a href="index.php?seccion=catalogo-prenda&categoria=<?= $prenda->prenda; ?>" class="fs-6 m-0 fw-subtitulo text-primary link-profile"><?= $prenda->prenda; ?></a>
                                <h2 class="card-title h2-card fs-4"><?= $prenda->nombre; ?></h2>
                                <p class="card-text"><?= $prenda->recortar_parrafo(18); ?></p>
                                <p class="card-text"><small class="text-body-secondary">Talle: <?= $prenda->talle ?></small></p>
                                <p class="card-text"><small class="text-body-secondary">Color: <?= $prenda->color ?></small></p>
                                <div class="fs-3 mb-3 fw-bold text-left lilac-text">$<?= $prenda->precio_formateado(); ?></div>
                                <a href="index.php?seccion=product-detail&id=<?= $prenda->id ?>" class="btn bg-black w-100 fw-bold lilac-text py-2 letter-spacing-1">VER MÁS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?PHP } ?>
    </div>

</div>