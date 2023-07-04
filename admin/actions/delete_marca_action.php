<?php

require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;
$marcasImg = (new Marca())->get_x_id($id);

try {

    if (!empty($marcasImg->getLogo())) {
        (new Imagen())->borrarImagen(__DIR__ . "/../../img/logos/" . $marcasImg->getLogo());
    }
    $marcasImg->delete();

    header("Location: ../index.php?seccion=admin_marcas");
} catch (Exception $e) {
    die("No se pudo eliminar la marca :(");
}
