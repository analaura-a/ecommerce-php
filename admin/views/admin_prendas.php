<?php
$prendas = (new Prenda())->catalogo_completo();
?>

<h1 class="text-center mb-5 mt-5 fw-bold">Administración de las prendas</h1>

<div class="table-responsive mb-5">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Categoría</th>
                <th scope="col">Precio</th>
                <th scope="col">Color</th>
                <th scope="col">Talle</th>
                <th scope="col">Otros talles</th>
                <th scope="col">Descripción</th>
                <th scope="col">Publicación</th>
                <th scope="col">Marca</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?PHP foreach ($prendas as $p) { ?>
                <tr>
                    <td><img src="../img/productos/<?= $p->getImagen() ?>" alt="<?= $p->getNombre() ?>" class="img-fluid rounded shadow-sm">
                        <p class="fw-bold text-center mt-1"><?= $p->getNombre() ?></p>
                    </td>
                    <td><?= $p->getCategoria() ?></td>
                    <td><?= $p->precio_formateado() ?></td>
                    <td><?= $p->getColor() ?></td>
                    <td><?= $p->getTalle() ?></td>
                    <td><?php $talles_secundarios = $p->getTalles_secundarios();
                        $talle_separado = empty($talles_secundarios) ? [] : explode(",", $talles_secundarios);

                        if ($talle_separado > 1) {
                            foreach ($talle_separado as $talle) {
                                echo (new Talle())->get_x_id($talle)->getTalle() . ",";
                            }
                        } else {
                            echo (new Talle())->get_x_id($talle_separado[0])->getTalle();
                        }
                        ?>
                    </td>
                    <td><?= $p->getDescripcion() ?></td>
                    <td><?= $p->getPublicacion() ?></td>
                    <td><?= $p->getMarca() ?></td>


                    <td>
                        <a href="index.php?seccion=edit_prenda&id=<?= $p->getId() ?>" role="button" class="d-block btn btn-sm btn-warning mb-1" style="max-width:300px">Editar</a>
                        <a href="actions/delete_prenda_action.php?id=<?= $p->getId() ?>" role="button" class="d-block btn btn-sm btn-danger" style="max-width:300px">Eliminar</a>
                    </td>
                </tr>
            <?PHP } ?>
        </tbody>
    </table>
</div>

<a href="index.php?seccion=add_prenda" class="btn btn-primary mt-5">Agregar nueva prenda</a>