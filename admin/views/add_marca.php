<h1 class="text-center mb-5 mt-5 fw-bold">Agregar una nueva marca</h1>
<div class="row mb-5 d-flex align-items-center"></div>
<form action="actions/add_marca_action.php" method="POST" enctype="multipart/form-data">
    <div class="col-md-6 mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="logo" class="form-label">Logo</label>
        <input type="file" class="form-control" id="logo" name="logo" accept="image/*" required>
    </div>
    <div class="col-md-12 mb-3">
        <label for="historia" class="form-label">Historia</label>
        <input type="text" class="form-control" id="historia" name="historia" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="fundador" class="form-label">Fundador/a</label>
        <textarea name="fundador" id="fundador" cols="30" maxlength="260" rows="10" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Cargar</button>

</form>