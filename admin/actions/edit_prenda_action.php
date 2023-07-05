<?php

require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;
$prenda = $_POST;
$fileData = $_FILES['imagen'] ?? FALSE;

echo "<pre>";
print_r($id);
echo "</pre>";

echo "<pre>";
print_r($prenda);
echo "</pre>";

echo "<pre>";
print_r($fileData);
echo "</pre>";

try {
    $prendaEditada = (new Prenda());

    if (!empty($fileData['tmp_name'])) {

        if (!empty($prenda['antiguaImagen'])) {
            (new Imagen())->borrarImagen(__DIR__ . "/../../img/productos/" . $prenda["antiguaImagen"]);
        }

        $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/productos", $fileData);

        (new Prenda())->reemplazar_imagen($imagen, $id);
    }

    (new Prenda())->clear_talles_sec($id);

    if (isset($prenda['talles_secundarios'])) {
        foreach ($prenda['talles_secundarios'] as $talle_id) {
            $prendaEditada->add_talles_sec($id, $talle_id);
        }
    }

    (new Prenda())->edit(
        $prenda['nombre'],
        $prenda['categoria'],
        $prenda['prenda'],
        $prenda['precio'],
        $prenda['color'],
        $prenda['talle_id'],
        $prenda['descripcion'],
        $prenda['publicacion'],
        $prenda['marca_id'],
        $id,
    );

    header('Location: ../index.php?seccion=admin_prendas');
} catch (\Exception $e) {
    die("No se pudo actualizar la prenda :(");
}
