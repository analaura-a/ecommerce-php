<?php
$talles = (new Talle())->lista_completa();
?>

<div class="row my-5">
    <div class="col">

        <h1 class="text-center mb-5 fw-bold">Administración de la tabla de talles</h1>

        <div class="row mb-5 d-flex align-items-center">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" width="15%">ID</th>
                        <th scope="col">Talle</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($talles as $t) { ?>
                        <tr>
                            <td><?= $t->getId() ?></td>
                            <td><?= $t->getTalle() ?></td>

                            <td>
                                <a href="index.php?seccion=edit_talle&id=<?= $t->getId() ?>" role="button" class="d-block btn btn-sm btn-warning mb-1" style="max-width:300px">Editar</a>
                                <a href="actions/delete_talle_action.php?id=<?= $t->getId() ?>" role="button" class="d-block btn btn-sm btn-danger" style="max-width:300px">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>
                </tbody>
            </table>

            <a href="index.php?seccion=add_talle" class="btn btn-primary mt-5">Agregar nuevo talle</a>
        </div>


    </div>
</div>