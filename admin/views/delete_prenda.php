<?PHP

$id = $_GET['id'] ?? FALSE;
$prenda = (new Prenda())->catalogo_por_id($id);

?>

<div class="row my-5 g-3">
    <h1 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar esta Prenda?</h1>
    <div class="col-12 col-md-6">
        <img src="../img/productos/<?= $prenda->getImagen() ?>" class="img-fluid rounded shadow-sm d-block mx-auto mb-3" alt="<?= $prenda->getNombre() ?>">
    </div>
    <div class="col-12 col-md-6">


        <h2 class="fs-6">Nombre:</h2>
        <p><?= $prenda->getNombre() ?></p>
        <h2 class="fs-6">Categoría:</h2>
        <p><?= $prenda->getCategoria()  ?></p>
        <h2 class="fs-6">Precio:</h2>
        <p><?= $prenda->precio_formateado() ?></p>
        <h2 class="fs-6">Color.</h2>
        <p><?= $prenda->getColor()?></p>
        <h2 class="fs-6">Talle.</h2>
        <p><?= $prenda->getTalle() ?></p>
        <h2 class="fs-6">Otros talles:</h2>
        <p><?php $talles_secundarios = $prenda->getTalles_secundarios();
                        $talle_separado = empty($talles_secundarios) ? [] : explode(",", $talles_secundarios);

                        if ($talle_separado > 1) {
                            foreach ($talle_separado as $talle) {
                                echo (new Talle())->get_x_id($talle)->getTalle() . ",";
                            }
                        } else {
                            echo (new Talle())->get_x_id($talle_separado[0])->getTalle();
                        }
                        ?></p>
        
        <h2 class="fs-6">Descripción:</h2>
        <p><?= $prenda->getDescripcion() ?></p>
        <h2 class="fs-6">Publicación.</h2>
        <p><?= $prenda->getPublicacion() ?></p>
        <h2 class="fs-6">Marca.</h2>
        <p><?= $prenda->getMarca() ?></p>
       

        <a href="actions/delete_prenda_action.php?id=<?= $prenda->getId() ?>" role="button" class="d-block btn btn-sm btn-danger mt-4">Eliminar</a>
    </div>

</div>