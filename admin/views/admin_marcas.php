<?php
$marcas = (new Marca())->lista_completa();
?>

<h1 class="text-center mb-5 mt-5 fw-bold">Administración de las marcas</h1>

<div class="row mb-5 d-flex align-items-center">

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Historia</th>
                    <th scope="col">Fundador</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?PHP foreach ($marcas as $m) { ?>
                    <tr>
                        <td><?= $m->getId() ?></td>
                        <td><?= $m->getNombre() ?></td>
                        <td><?= $m->getHistoria() ?></td>
                        <td><?= $m->getFundador() ?></td>
                        <td><?= $m->getLogo() ?></td>

                        <td>
                            <a href="index.php?seccion=edit_marca&id=<?= $m->getId() ?>" role="button" class="d-block btn btn-sm btn-warning mb-1" style="max-width:300px">Editar</a>
                            <a href="actions/delete_marca_action.php?id=<?= $m->getId() ?>" role="button" class="d-block btn btn-sm btn-danger" style="max-width:300px">Eliminar</a>
                        </td>
                    </tr>
                <?PHP } ?>
            </tbody>
        </table>
    </div>

    <a href="index.php?seccion=add_marca" class="btn btn-primary mt-5">Agregar nueva marca</a>
</div>