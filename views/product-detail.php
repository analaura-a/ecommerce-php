<?php

require_once "classes/Prenda.php";

$prendaSeleccionada = isset($_GET['id']) ? $_GET['id'] : false;

$catalogo = new Prenda();
$prenda = $catalogo->catalogo_por_id($prendaSeleccionada);

?>


<?php if (isset($prenda)) { ?>
    <div class="product-container my-5">

        <img src="img/productos/<?= $prenda->getImagen() ?>" class="img-product rounded" alt="<?= $prenda->getNombre(); ?>">

        <div class="product-info mt-3">
            <p class="fs-6 m-0 fw-subtitulo fs-4"><?= $prenda->getPrenda(); ?></p>
            <h2 class="h1 text-start"><?= $prenda->getNombre(); ?></h2>
            <p class="fs-6 mt-5 fw-bold fs-5">Descripción</p>
            <p><?= $prenda->getDescripcion(); ?></p>
            <p class="text-secondary fs-7 mt-1"><?= $prenda->getPublicacion(); ?></p>

            <p class="mt-5"><span class="fw-bold">Color:</span> <?= $prenda->getColor(); ?></p>
            <p class="mt-1"><span class="fw-bold">Talle:</span> <?= $prenda->getTalle(); ?></p>
            <p class="mt-1"><span class="fw-bold">Marca:</span> <?= $prenda->getMarca(); ?></p>

            <p class="mt-5 fw-bold fs-1"><span class="lilac-text">$ </span><?= $prenda->precio_formateado(); ?></p>
            <form action="admin/actions/add_item_carrito.php" method="GET" class="row ">
                <div class="d-flex flex-column flex-md-row" style="gap: 8px">
                    <div class="col-md-6 d-flex align-items-center" style="gap: 8px">
                        <label class="fw-bold" for="cantidad">Cantidad</label>
                        <input type="number" value="1" name="cantidad" id="cantidad" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <input type="submit" value="AGREGAR AL CARRITO" class="btn bg-black w-100 fw-bold lilac-text py-3 rounded-3 mb-0 mx-auto d-block letter-spacing-1">
                        <input type="hidden" value="<?= $prenda->getId() ?>" name="id" id="id">

                    </div>
                </div>



            </form>

        </div>

    </div>

<?PHP
} else { ?>
    <div class="container-error mt-5">
        <h2 class="text-center">¡Ups! El producto que estás buscando no existe.</h2>
        <a href="index.php?seccion=home" class="btn bg-black w-100 fw-bold lilac-text py-3 mt-5 rounded-3 mb-0 mx-auto d-block letter-spacing-1" style="max-width:350px">VOLVER AL INICIO</a>
    </div>
<?PHP } ?>