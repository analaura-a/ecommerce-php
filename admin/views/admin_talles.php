<?php
$talles = (new Talle())->lista_completa();
?>


<h1 class="text-center mb-5 mt-5 fw-bold">Administración de la tabla de talles</h1>

<div class="row mb-5 d-flex align-items-center">

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-header">
                <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col">Talle</th>
                    <th scope="col">Centímetros</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?PHP foreach ($talles as $t) { ?>
                    <tr>
                        <td><?= $t->getId() ?></td>
                        <td><?= $t->getTalle() ?></td>
                        <td><?= $t->getCentimetros() ?></td>
                        <td><?= $t->getTipo() ?></td>

                        <td>
                            <a href="index.php?seccion=edit_talle&id=<?= $t->getId() ?>" role="button" class="d-block btn btn-sm secondary-button mb-1" style="max-width:300px">Editar</a>
                            <a href="index.php?seccion=delete_talle&id=<?= $t->getId() ?>" role="button" class="d-block btn btn-sm btn-danger" style="max-width:300px">Eliminar</a>
                        </td>
                    </tr>
                <?PHP } ?>
            </tbody>
        </table>
    </div>

    <a href="index.php?seccion=add_talle" class="btn bg-black w-100 fw-bold lilac-text py-3 mt-5 rounded-3 mb-0 mx-auto d-block letter-spacing-1" style="max-width:350px">Agregar nuevo talle</a>
</div>