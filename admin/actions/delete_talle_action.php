<?php

require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;
$talle = (new Talle())->get_x_id($id);

try {
    $talle->delete();
    header("Location: ../index.php?seccion=admin_talles");
} catch (\Exception $e) {
    die("No se pudo eliminar el talle :(");
}
