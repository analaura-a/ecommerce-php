<?PHP

$id = $_GET['id'] ?? FALSE;
$talles = (new Talle())->get_x_id($id);

?>

<div class="row my-5 g-3">
    <h1 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar este Talle?</h1>
   
    <div class="col-12 col-md-6">
    
                   

        <h2 class="fs-6">Talle</h2>
        <p><?= $talles->getTalle()?></p>
        <h2 class="fs-6">Centimetros</h2>
        <p><?= $talles->getCentimetros() ?></p>
        <h2 class="fs-6">Tipo</h2>
        <p><?= $talles->getTipo()?></p>

        <a href="actions/delete_talle_action.php?id=<?= $talles->getId() ?>" role="button" class="d-block btn btn-sm btn-danger mt-4 w-100">Eliminar</a>
    </div>

</div>