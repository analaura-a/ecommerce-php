<?php
$items = (new Carrito())->get_carrito();
?>

<div class="mt-5">
    <?php if (count($items)) { ?>
        <h1 class="text-left fs-1 my-5 lilac-text fw-bold">Mi carrito</h1>
        <form action="admin/actions/update_items_action.php" method="POST">

            <div class="table-responsive">
                <table class="table mb-5">
                    <thead>
                        <tr>
                            <th scope="col" width="20%">Prenda</th>
                            <th scope="col">Talles</th>
                            <th scope="col">Color</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $key => $item) { ?>
                            <tr>
                                <td><img src="img/productos/<?= $item['imagen'] ?>" alt="Imágen Illustrativa de <?= $item['Producto'] ?>" class="img-fluid rounded shadow-sm">
                                    <p class="fw-bold text-center mt-1"><?= $item['Producto'] ?></p>
                                </td>
                                <td class="align-middle">
                                    <h2 class="h5"><?= $item['Talle'] ?></h2>
                                </td>
                                <td class="align-middle">
                                    <h2 class="h5"><?= $item['Color'] ?></h2>
                                </td>
                                <td class="align-middle">
                                    <label for="cantidad_<?= $key ?>" class="visually-hidden">Cantidad</label>
                                    <input type="number" class="form-control" value="<?= $item['Cantidad'] ?>" id="cantidad_<?= $key ?>" name="cantidad[<?= $key ?>]">
                                </td>
                                <td class="text-end align-middle">
                                    <p class="h5 py-3">$<?= number_format($item['Precio'], 2, ",", ".") ?></p>
                                </td>
                                <td class="text-end align-middle">
                                    <p class="h5 py-3"> $<?= number_format($item['Cantidad'] * $item['Precio'], 2, ",", ".") ?></p>
                                </td>
                                <td class="text-end align-middle">
                                    <a href="admin/actions/remove_item_action.php?id=<?= $key ?>" class="btn btn-sm btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="7" class="text-start">
                                <p class="h5 py-3">Total:</p>
                            </td>
                            <td class="text-end">
                                <p class="h5 py-3"> $<?= number_format((new Carrito())->get_total(), 2, ",", ".") ?></p>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <input type="submit" value="Actualizar Cantidades" class="btn secondary-button">
                <a href="admin/actions/clear_items_carrito.php" role="button" class="btn btn-danger">Vaciar Carrito</a>
                <a href="#" role="button" class="btn primary-button-color">Finalizar Compra</a>
            </div>
        </form>
    <?php } else {  ?>
        <h1 class="text-center fw-bold mt-5 mb-2 lilac-text">¡Tu carrito esta vacío!</h1>
        <p class="text-center fs-4">Explorá nuestra colección de prendas y llevate tus favoritas.</p>
        <a href="index.php?seccion=catalogo-completo" class="btn bg-black w-100 fw-bold lilac-text py-3 mt-5 rounded-3 mb-0 mx-auto d-block letter-spacing-1" style="max-width:350px">Explorar</a>
    <?php } ?>
</div>