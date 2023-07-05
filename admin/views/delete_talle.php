<?PHP

$id = $_GET['id'] ?? FALSE;
$talles = (new Talle())->get_x_id($id);

?>

<div class="row my-5 g-3">
    <h1 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar este Talle?</h1>
   
    <div class="col-12 col-md-6 m-auto">
    
                   

        <h2 class="fs-6 fw-bold">Talle</h2>
        <p class="mb-3"><?= $talles->getTalle()?></p>
        <h2 class="fs-6 fw-bold">Centimetros</h2>
        <p class="mb-3"><?= $talles->getCentimetros() ?></p>
        <h2 class="fs-6 fw-bold">Tipo</h2>
        <p class="mb-3"><?= $talles->getTipo()?></p>

        <a href="actions/delete_talle_action.php?id=<?= $talles->getId() ?>" role="button" class="d-block btn btn-danger mt-4 w-100 fw-bold py-3 mt-5 rounded-3 mb-0 mx-auto d-block letter-spacing-1">Eliminar</a>
    </div>

</div>