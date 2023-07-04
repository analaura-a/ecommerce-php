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


        <h2 class="fs-6">Nombre</h2>
        <p><?= $marcas->getNombre() ?></p>
        <h2 class="fs-6">Historia</h2>
        <p><?= $marcas->getHistoria() ?></p>
        <h2 class="fs-6">Fundador</h2>
        <p><?= $marcas->getFundador() ?></p>

        <a href="actions/delete_marca_action.php?id=<?= $marcas->getId() ?>" role="button" class="d-block btn btn-sm btn-danger mt-4">Eliminar</a>
    </div>

</div>