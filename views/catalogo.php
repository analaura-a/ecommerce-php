<?php

require_once "classes/Prenda.php";

$categoriaSeleccionada = isset($_GET['categoria']) ? $_GET['categoria'] : false;

$catalogo = new Prenda();

$categoria = $catalogo->catalogo_por_categoria($categoriaSeleccionada);

?>

<h1 class="h1 h1-catalogo my-5"><?= ucwords(str_replace("-", " ", $categoriaSeleccionada)) ?> &#128293;</h1>

<div class="contenedor-productos container-fluid">

    <div class="row">
        <?php if (count($categoria)) { 

            foreach ($categoria as $prenda) { ?>

                <div class="col-12 col-lg-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?= $prenda->imagen; ?>" class="card-img-top img-producto" alt="<?= $prenda->nombre; ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="fs-6 m-0 fw-subtitulo text-primary"><?= $prenda->prenda; ?></p>
                                    <h2 class="card-title h2-card fs-4"><?= $prenda->nombre; ?></h2>
                                    <p class="card-text"><?= $prenda->recortar_parrafo(18); ?></p>
                                    <p class="card-text"><small class="text-body-secondary">Talle: <?= $prenda->talle ?></small></p>
                                    <p class="card-text"><small class="text-body-secondary">Color: <?= $prenda->color ?></small></p>
                                    <div class="fs-3 mb-3 fw-bold text-left lilac-text">$<?= $prenda->precio_formateado(); ?></div>
                                    <a href="index.php?seccion=product-detail&id=<?= $prenda->id ?>" class="btn bg-black w-100 fw-bold lilac-text py-2">VER MÁS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?PHP }
        } else { ?>
            <h2 class="text-center mt-3">No hay prendas disponibles para esa categoría.</h2>
        <?PHP } ?>
    </div>

</div>