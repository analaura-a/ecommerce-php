<?php

require_once "../../functions/autoload.php";

$prenda = $_POST;
$fileData = $_FILES['imagen'];

try {
    $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/productos", $fileData);
    (new Prenda())->insert(
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
    header('Location: ../index.php?sec=admin_personajes');
} catch (\Exception $e) {
    die("No se pudo cargar el personaje =(");
}
