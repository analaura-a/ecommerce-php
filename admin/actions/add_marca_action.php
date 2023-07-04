<?php
require_once "../../functions/autoload.php";
$marcas = $_POST;
$logo = $_FILES["logo"];

//echo "<pre>";
//print_r($Marca);
//echo "</pre>";
echo "<pre>";
print_r($logo);
echo "</pre>";
try {
    $file_name = (new Imagen())->subirImagen(__DIR__ . "/../../img/logos", $logo);
    (new Marca())->insert($marcas["nombre"], $file_name, $marcas["historia"], $marcas["fundador"]);
    header("Location: ../index.php?seccion=admin_marcas");
} catch (Exception $e) {
    die("No se puede cargar la marca");
}
