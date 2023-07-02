<?php

require_once "../../functions/autoload.php";

$talle = $_POST;
$id = $_GET['id'] ?? FALSE;

echo "<pre>";
print_r($talle);
echo "</pre>";

try {
    (new Talle())->edit($talle["talle"], $talle["centimetros"], $talle["tipo"], $id);
    header("Location: ../index.php?seccion=admin_talles");
} catch (Exception $e) {
    die("No se pudo editar el talle :(");
}
