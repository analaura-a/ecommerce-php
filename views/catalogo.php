<?php

require_once "classes/Prenda.php";

$categoriaSeleccionada = isset($_GET['categoria']) ? $_GET['categoria'] : false;

$catalogo = new Prenda();

$categoria = $catalogo->catalogo_por_categoria($categoriaSeleccionada);

//echo "<pre>";
//print_r($categoria);
//echo "</pre>";

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
                                <img src="img/productos/<?= $prenda->getImagen(); ?>" class="card-img-top img-producto" alt="<?= $prenda->getNombre(); ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a href="index.php?seccion=catalogo-prenda&categoria=<?= $prenda->getPrenda(); ?>" class="fs-6 m-0 fw-subtitulo text-primary link-profile"><?= $prenda->getPrenda(); ?></a>
                                    <h2 class="card-title h2-card fs-4"><?= $prenda->getNombre(); ?></h2>
                                    <p class="card-text"><?= $prenda->recortar_parrafo(18); ?></p>
                                    <p class="card-text"><small class="text-body-secondary">Talles: <?php $talles_secundarios = $prenda->getTalles_secundarios();
                                                                                                    $talle_separado = empty($talles_secundarios) ? [] : explode(",", $talles_secundarios);

                                                                                                    if ($talle_separado > 1) {
                                                                                                        foreach ($talle_separado as $talle) {
                                                                                                            echo (new Talle())->get_x_id($talle)->getTalle() . ",";
                                                                                                        }
                                                                                                    } else {
                                                                                                        echo (new Talle())->get_x_id($talle_separado[0])->getTalle();
                                                                                                    }
                                                                                                    ?> </small></p>
                                    <p class="card-text"><small class="text-body-secondary">Color: <?= $prenda->getColor() ?></small></p>
                                    <p class="card-text"><small class="text-body-secondary">Marca: <?= $prenda->getMarca() ?></small></p>
                                    <div class="fs-3 mb-3 fw-bold text-left lilac-text">$<?= $prenda->precio_formateado(); ?></div>
                                    <a href="index.php?seccion=product-detail&id=<?= $prenda->getId() ?>" class="btn bg-black w-100 fw-bold lilac-text py-2 letter-spacing-1">VER MÁS</a>
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