<?PHP

require_once "../functions/autoload.php";

$prenda = (new Prenda());
$marcas = (new Marca())->lista_completa();
$talles = (new Talle())->lista_completa();

?>

<h1 class="text-center mb-5 mt-5 fw-bold">Agregar una nueva prenda</h1>
<div class="row mb-5 d-flex align-items-center">

    <form class="row g-3" action="actions/add_prenda_action.php" method="POST" enctype="multipart/form-data">

        <div class="mb-3 col-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3 col-6">
            <label for="categoria" class="form-label">Categoría</label>
            <select class="form-select" name="categoria" id="categoria" required>
                <option value="" selected disabled>Elegí una opción</option>
                <option value="verano-2023">Temporada primavera/verano</option>
                <option value="invierno-2023">Temporada otoño/invierno</option>
                <option value="trending">Trending</option>
            </select>
        </div>

        <div class="mb-3 col-6">
            <label for="prenda" class="form-label">Tipo de prenda</label>
            <select class="form-select" name="prenda" id="prenda" required>
                <option value="" selected disabled>Elegí una opción</option>
                <?php foreach ($prenda->getTiposDePrenda() as $tipoDePrenda) {  ?>
                    <option value="<?= $tipoDePrenda ?>"><?= $tipoDePrenda ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3 col-6">
            <label for="marca" class="form-label">Marca</label>
            <select class="form-select" name="marca_id" id="marca" required>
                <option value="" selected disabled>Elegí una opción</option>
                <?php foreach ($marcas as $m) {  ?>
                    <option value="<?= $m->getId() ?>"><?= $m->getNombre() ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3 col-6">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" required>
        </div>

        <div class="mb-3 col-6">
            <label for="color" class="form-label">Color</label>
            <input type="text" class="form-control" id="color" name="color" required>
        </div>

    

        <div class="col-6">
            <label class="form-label d-block">Talles disponibles</label>
            <?PHP foreach ($talles as $t) {    ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="talles_secundarios[]" id="talles_secundarios_<?= $t->getId() ?>" value="<?= $t->getId() ?>">
                    <label class="form-check-label mb-2" for="talles_secundarios_<?= $t->getId() ?>"><?= $t->getTalle() ?></label>
                </div>
            <?PHP } ?>
        </div>

        <div class="mb-3 col-6">
            <label for="publicacion" class="form-label">Publicación</label>
            <input type="text" class="form-control" id="publicacion" name="publicacion" required>
            <div id="textareaHelp" class="form-text">En formato YYYY-MM-DD.</div>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen" required>
        </div>

        <button type="submit" class="btn bg-black w-100 fw-bold lilac-text py-3 mt-5 rounded-3 mb-0 mx-auto d-block letter-spacing-1">Agregar</button>
    </form>

</div>