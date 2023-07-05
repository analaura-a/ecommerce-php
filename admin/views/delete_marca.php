<?PHP

$id = $_GET['id'] ?? FALSE;
$marcas = (new Marca())->get_x_id($id);

?>

<div class="row my-5 g-3">
    <h1 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar esta Marca?</h1>
    <div class="col-12 col-md-6">
        <img src="../img/logos/<?= $marcas->getLogo() ?>" class="img-fluid rounded shadow-sm d-block mx-auto mb-3">
    </div>
    <div class="col-12 col-md-6">


        <h2 class="fs-6 fw-bold">Nombre</h2>
        <p class="mb-3"><?= $marcas->getNombre() ?></p>
        <h2 class="fs-6 fw-bold">Historia</h2>
        <p class="mb-3"><?= $marcas->getHistoria() ?></p>
        <h2 class="fs-6 fw-bold">Fundador</h2>
        <p class="mb-3"><?= $marcas->getFundador() ?></p>

        <a href="actions/delete_marca_action.php?id=<?= $marcas->getId() ?>" role="button" class="d-block btn btn-danger mt-4 w-100 fw-bold py-3 mt-5 rounded-3 mb-0 mx-auto d-block letter-spacing-1">Eliminar</a>
    </div>

</div>