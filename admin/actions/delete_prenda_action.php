<?php

require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;
$prenda = (new Prenda())->catalogo_por_id($id);

try {
    (new Prenda())->clear_talles_sec($id);
    if (!empty($prenda->getImagen())) {
        (new Imagen())->borrarImagen(__DIR__ . "/../../img/productos/" . $prenda->getImagen());
    }
    $prenda->delete();
    header("Location: ../index.php?seccion=admin_prendas");
} catch (\Exception $e) {
    die("No se pudo eliminar la prenda :(");
}
