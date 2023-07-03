<?php

require_once "../../functions/autoload.php";

$prenda = $_POST;
$fileData = $_FILES['imagen'];

try {
    $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/productos", $fileData);
    $prendaId = (new Prenda())->insert(
        $prenda['nombre'],
        $prenda['categoria'],
        $prenda['prenda'],
        $prenda['precio'],
        $prenda['color'],
        $prenda['talle_id'],
        $prenda['descripcion'],
        $imagen,
        $prenda['publicacion'],
        $prenda['marca_id'],
    );
    foreach ($prenda["talles_secundarios"] as $ps) {
        (new Prenda())->add_talles_sec($prendaId, $ps);
    }
    header('Location: ../index.php?seccion=admin_prendas');
} catch (\Exception $e) {
    die("No se pudo cargar el personaje =(");
}
