<?php

require_once "../../functions/autoload.php";

$talle = $_POST;

// echo "<pre>";
// print_r($talle);
// echo "</pre>";

try {
    (new Talle())->insert($talle["talle"], $talle["centimetros"], $talle["tipo"]);
    header("Location: ../index.php?seccion=admin_talles");
} catch (Exception $e) {
    die("No se pudo cargar el talle :(");
}
