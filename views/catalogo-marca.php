<?php

require_once "classes/Prenda.php";

$marcaSeleccionada = isset($_GET['categoria']) ? $_GET['categoria'] : false;
$marca = (new Marca())->get_x_id($marcaSeleccionada);

$catalogo = new Prenda();
$categoria = $catalogo->catalogo_por_marca($marcaSeleccionada);

echo "<pre>";
print_r($categoria);
echo "</pre>";

?>

<h1 class="h1 h1-catalogo my-5"><?= $marca->getNombre(); ?> &#128171;</h1>

<div class="contenedor-productos container-fluid">

    <div class="row">
        <?php if (count($categoria)) {

            foreach ($categoria as $prenda) { ?>

                <div class="col-12 col-lg-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="img/productos/<?= $prenda->getImagen(); ?>" class="card-img-top img-producto" alt="<?= $prenda->getNombre(); ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a href="index.php?seccion=catalogo-prenda&categoria=<?= $prenda->getPrenda(); ?>" class="fs-6 m-0 fw-subtitulo text-primary link-profile"><?= $prenda->getPrenda(); ?></a>
                                    <h2 class="card-title h2-card fs-4"><?= $prenda->getNombre(); ?></h2>
                                    <p class="card-text"><?= $prenda->recortar_parrafo(18); ?></p>
                                    <p class="card-text"><small class="text-body-secondary">Talle: <?= $prenda->getTalle() ?></small></p>
                                    <p class="card-text"><small class="text-body-secondary">Color: <?= $prenda->getColor() ?></small></p>
                                    <div class="fs-3 mb-3 fw-bold text-left lilac-text">$<?= $prenda->precio_formateado(); ?></div>
                                    <a href="index.php?seccion=product-detail&id=<?= $prenda->getId() ?>" class="btn bg-black w-100 fw-bold lilac-text py-2 letter-spacing-1">VER MÁS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?PHP }
        } else { ?>
            <h2 class="text-center mt-3">No hay prendas disponibles para esa marca.</h2>
        <?PHP } ?>
    </div>

</div>