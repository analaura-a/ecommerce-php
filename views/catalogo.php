<?php
// require_once "includes/productos.php";

require_once "funciones/productos.php";
$productos = catalogo_completo();

$categoriaSeleccionada = isset($_GET['categoria']) ? $_GET['categoria'] : false;

// $categoria = $productos[$categoriaSeleccionada] ?? [];
// echo count($categoria);
$categoria = catalogo_por_categoria($categoriaSeleccionada);

//Función para recortar la longitud de las descripciones 
function recortar_parrafo($parrafo, $cantidad){
    $array = explode(" ", $parrafo);
    if (count($array)<=$cantidad){
        $resultado = $parrafo;
    } else {
        array_splice($array, $cantidad);
        $resultado = implode(" ", $array)."...";
    }
    
    return $resultado;
}
?>

<h1 class="h1 h1-catalogo my-5"><?= ucwords(str_replace("-", " ", $categoriaSeleccionada)); ?></h1>

<div class="contenedor-productos container-fluid">

    <div class="row">
        <?php if (count($categoria)) {

            foreach ($categoria as $prenda) { ?>

                <div class="col-12 col-lg-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?= $prenda['imagen'] ?>" class="card-img-top img-producto" alt="<?= $prenda['nombre']; ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="fs-6 m-0 fw-subtitulo text-primary"><?= $prenda['prenda'] ?></p>
                                    <h5 class="card-title h2-card"><?= $prenda['nombre']; ?></h5>
                                    <p class="card-text"><?= recortar_parrafo($prenda['descripcion'], 18); ?></p>
                                    <p class="card-text"><small class="text-body-secondary">Talle: <?= $prenda['talle'] ?></small></p>
                                    <p class="card-text"><small class="text-body-secondary">Color: <?= $prenda['color'] ?></small></p>
                                    <div class="fs-3 mb-3 fw-bold text-left lilac-text">$<?= $prenda['precio'] ?></div>
                                    <a href="#" class="btn bg-black w-100 fw-bold lilac-text py-2">COMPRAR</a>
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