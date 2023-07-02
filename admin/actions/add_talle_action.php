<?php

require_once "../../classes/Conexion.php";
require_once "../../classes/Talle.php";

$talle = $_POST;

// echo "<pre>";
// print_r($talle);
// echo "</pre>";

try {
    (new Talle())->insert($talle["talle"]);
    header("Location: ../index.php?seccion=admin_talles");
} catch (Exception $e) {
    die("No se pudo cargar el talle :(");
}
