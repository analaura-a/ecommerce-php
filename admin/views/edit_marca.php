<?php
$id = $_GET['id'] ?? FALSE;
$marcas = (new Marca())->get_x_id($id);
?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Editar Marca</h1>
        <div class="row mb-5 d-flex align-items-center"></div>
        <form action="actions/edit_marca_action.php?id=<?= $marcas->getId() ?>" method="POST" enctype="multipart/form-data" class="row">

            <div class="col-6 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $marcas->getNombre() ?>">
            </div>

            <div class="col-6 mb-3">
                <label for="fundador" class="form-label">Fundador/a</label>
                <input type="text" class="form-control" id="fundador" name="fundador" value="<?= $marcas->getFundador() ?>">
            </div>

            <div class="col-6 mb-3">
                <label for="logo" class="form-label">Nuevo logo</label>
                <input type="file" class="form-control" id="logo" name="logo" accept="image/*" value="<?= $marcas->getLogo() ?>">
            </div>

            <div class="col-6 mb-3">
                <label for="antiguaImagen" class="form-label">Logo anterior</label>
                <img src="../img/logos/<?= $marcas->getLogo() ?>" alt="<?= $marcas->getNombre() ?>">
                <input class="form-control" type="hidden" id="antiguaImagen" name="antiguaImagen" value="<?= $marcas->getLogo() ?>">
            </div>


            <div class="mb-3">
                <label for="historia" class="form-label">Historia</label>
                <textarea name="historia" id="historia" cols="30" maxlength="260" rows="10" class="form-control"><?= $marcas->getHistoria() ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Editar Marca</button>

        </form>
    </div>
</div>