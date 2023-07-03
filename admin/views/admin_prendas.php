<?php
$prendas = (new Prenda())->catalogo_completo();
?>

<h1 class="text-center mb-5 mt-5 fw-bold">Administración de las prendas</h1>

<div class="row mb-5 d-flex align-items-center">

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Prenda</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Color</th>
                    <th scope="col">Talle</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Publicación</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Imagen</th>

                </tr>
            </thead>
            <tbody>
                <?PHP foreach ($prendas as $p) { ?>
                    <tr>
                        <td class="fw-bold"><?= $p->getNombre() ?></td>
                        <td><?= $p->getCategoria() ?></td>
                        <td><?= $p->getPrenda() ?></td>
                        <td><?= $p->precio_formateado() ?></td>
                        <td><?= $p->getColor() ?></td>
                        <td><?= $p->getTalle() ?></td>
                        <td><?= $p->getDescripcion() ?></td>
                        <td><?= $p->getPublicacion() ?></td>
                        <td><?= $p->getMarca() ?></td>
                        <td><img src="../img/productos/<?= $p->getImagen() ?>" alt="<?= $p->getNombre() ?>" class="img-fluid rounded shadow-sm"></td>


                        <td>
                            <a href="index.php?seccion=edit_marca&id=<?= $p->getId() ?>" role="button" class="d-block btn btn-sm btn-warning mb-1" style="max-width:300px">Editar</a>
                            <a href="actions/delete_marca_action.php?id=<?= $p->getId() ?>" role="button" class="d-block btn btn-sm btn-danger" style="max-width:300px">Eliminar</a>
                        </td>
                    </tr>
                <?PHP } ?>
            </tbody>
        </table>
    </div>

    <a href="index.php?seccion=add_prenda" class="btn btn-primary mt-5">Agregar nueva prenda</a>
</div>