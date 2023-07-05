<?php

require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;
$marcas = $_POST;
$logo = $_FILES["logo"] ?? FALSE;

try {

    if (!empty($logo['tmp_name'])) {

        if (!empty($marcas['antiguaImagen'])) {
            (new Imagen())->borrarImagen(__DIR__ . "/../../img/logos/" . $marcas["antiguaImagen"]);
        }

        $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/logos", $logo);

        (new Marca())->reemplazar_imagen($imagen, $id);
    }


    (new Marca())->edit($marcas["nombre"], $marcas["historia"], $marcas["fundador"], $id);

    header("Location: ../index.php?seccion=admin_marcas");
} catch (Exception $e) {
    die("No se pudo editar la marca :(");
}
