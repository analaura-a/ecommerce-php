<?PHP

$id = $_GET['id'] ?? FALSE;
$prenda = (new Prenda())->catalogo_por_id($id);

?>

<div class="row my-5 g-3">
    <h1 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar esta prenda?</h1>
    <div class="col-12 col-md-6">
        <img src="../img/productos/<?= $prenda->getImagen() ?>" class="img-fluid rounded shadow-sm d-block mx-auto mb-3" alt="<?= $prenda->getNombre() ?>">
    </div>
    <div class="col-12 col-md-6">


        <h2 class="fs-6 fw-bold">Nombre:</h2>
        <p class="mb-3"><?= $prenda->getNombre() ?></p>
        <h2 class="fs-6 fw-bold">Categoría:</h2>
        <p class="mb-3"><?= $prenda->getCategoria()  ?></p>
        <h2 class="fs-6 fw-bold">Precio:</h2>
        <p class="mb-3"><?= $prenda->precio_formateado() ?></p>
        <h2 class="fs-6 fw-bold">Color.</h2>
        <p class="mb-3"><?= $prenda->getColor()?></p>
        <h2 class="fs-6 fw-bold">Talles:</h2>
        <p class="mb-3"><?php $talles_secundarios = $prenda->getTalles_secundarios();
                        $talle_separado = empty($talles_secundarios) ? [] : explode(",", $talles_secundarios);

                        if ($talle_separado > 1) {
                            foreach ($talle_separado as $talle) {
                                echo (new Talle())->get_x_id($talle)->getTalle() . ",";
                            }
                        } else {
                            echo (new Talle())->get_x_id($talle_separado[0])->getTalle();
                        }
                        ?></p>
        
        <h2 class="fs-6 fw-bold">Descripción:</h2>
        <p class="mb-3"><?= $prenda->getDescripcion() ?></p>
        <h2 class="fs-6 fw-bold">Publicación.</h2>
        <p class="mb-3"><?= $prenda->getPublicacion() ?></p>
        <h2 class="fs-6 fw-bold">Marca.</h2>
        <p class="mb-3"><?= $prenda->getMarca() ?></p>
       

        <a href="actions/delete_prenda_action.php?id=<?= $prenda->getId() ?>" role="button" class="d-block btn btn-danger mt-4 w-100 fw-bold py-3 mt-5 rounded-3 mb-0 mx-auto d-block letter-spacing-1">Eliminar</a>
    </div>

</div>