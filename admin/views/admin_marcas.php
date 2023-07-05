<?php
$marcas = (new Marca())->lista_completa();
?>

<h1 class="text-center mb-5 mt-5 fw-bold">Administración de las marcas</h1>

<div class="row mb-5 d-flex align-items-center">

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-header">
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
                        <td><img src="../img/logos/<?= $m->getLogo() ?>" alt="<?= $m->getNombre() ?>"></td>

                        <td>
                            <a href="index.php?seccion=edit_marca&id=<?= $m->getId() ?>" role="button" class="d-block btn btn-sm secondary-button mb-1" style="max-width:300px">Editar</a>
                            <a href="index.php?seccion=delete_marca&id=<?= $m->getId() ?>" role="button" class="d-block btn btn-sm btn-danger" style="max-width:300px">Eliminar</a>
                        </td>
                    </tr>
                <?PHP } ?>
            </tbody>
        </table>
    </div>

    <a href="index.php?seccion=add_marca" class="btn bg-black w-100 fw-bold lilac-text py-3 mt-5 rounded-3 mb-0 mx-auto d-block letter-spacing-1" style="max-width:350px">Agregar nueva marca</a>
</div>