<?php

require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;
$marcas = $_POST;
// $logo = $_FILES["logo"];

// $marcasImg = (new Marca())->get_x_id($id);
//echo "<pre>";
//print_r($Marca);
//echo "</pre>";
//echo "<pre>";
//print_r($img);
//echo "</pre>";

try {

    // $file_name = (new Imagen())->subirLogo(__DIR__ . "/../../img/logos", $logo);
    // (new Imagen())->borrarImagen(__DIR__ . "/../../img/logos/" . $marcasImg->getLogo());

    (new Marca())->edit($marcas["nombre"], $marcas["historia"], $marcas["fundador"], $id);
    header("Location: ../index.php?seccion=admin_marcas");
} catch (Exception $e) {
    die("No se pudo editar la marca :(");
}
