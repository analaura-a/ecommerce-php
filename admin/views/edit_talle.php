<?php

$id = $_GET['id'] ?? FALSE;
$talle = (new Talle())->get_x_id($id);
?>

<div class="row my-5">
    <div class="col">

        <h1 class="text-center mb-5 fw-bold">Editar un talle existente</h1>
        <div class="row mb-5 d-flex align-items-center">

            <form class="row g-3" action="actions/edit_talle_action.php?id=<?= $talle->getId() ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="talle" class="form-label">Talle</label>
                    <input type="text" class="form-control" id="talle" name="talle" value="<?= $talle->getTalle() ?>" required>
                </div>
                <div class="mb-3">
                    <label for="centimetros" class="form-label">Centimetros</label>
                    <input type="number" class="form-control" id="centimetros" name="centimetros" value="<?= $talle->getCentimetros() ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" value="<?= $talle->getTipo() ?>" required>
                    <div id="textareaHelp" class="form-text">¿A qué parte del cuerpo pertenecen las medidas? Por ejemplo: torso, cintura, cadera, etc.</div>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>

        </div>


    </div>
</div>