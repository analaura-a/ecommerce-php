<h1 class="text-center mb-5 mt-5 fw-bold">Agregar una nueva prenda
</h1>
<div class="row mb-5 d-flex align-items-center">

    <form class="row g-3" action="actions/add_prenda_action.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3 col-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3 col-6">
            <label for="categoria" class="form-label">Categoría</label>
            <input type="text" class="form-control" id="categoria" name="categoria" required>
        </div>
        <div class="mb-3 col-6">
            <label for="prenda" class="form-label">Prenda</label>
            <input type="text" class="form-control" id="prenda" name="prenda" required>
            <div id="textareaHelp" class="form-text">Tipo de prenda: remera, buzo, pantalón, etcétera.</div>
        </div>
        <div class="mb-3 col-6">
            <label for="marca" class="form-label">Marca</label>
            <input type="number" class="form-control" id="marca" name="marca_id" required>
        </div>
        <div class="mb-3 col-6">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" required>
        </div>
        <div class="mb-3 col-6">
            <label for="color" class="form-label">Color</label>
            <input type="text" class="form-control" id="color" name="color" required>
        </div>
        <div class="mb-3 col-6">
            <label for="talles" class="form-label">Talles</label>
            <input type="number" class="form-control" id="talles" name="talle_id" required>
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

        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>

</div>