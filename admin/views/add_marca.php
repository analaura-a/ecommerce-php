<h1 class="text-center mb-5 mt-5 fw-bold">Agregar una nueva marca</h1>
<div class="row mb-5 d-flex align-items-center"></div>
<form action="actions/add_marca_action.php" method="POST" enctype="multipart/form-data" class="row">
    <div class="col-md-6 mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="fundador" class="form-label">Fundador</label>
        <input type="text" class="form-control" id="fundador" name="fundador" required>
    </div>
    <div class="col-md-12 mb-3">
        <label for="logo" class="form-label">Logo</label>
        <input type="file" class="form-control" id="logo" name="logo" accept="image/*" required>
    </div>
    <div class="col-md-12 mb-3">
        <label for="historia" class="form-label">Historia</label>
        <textarea name="historia" id="historia" cols="30" maxlength="260" rows="10" class="form-control w-100"></textarea>
    </div>
    <button type="submit" class="btn bg-black w-100 fw-bold lilac-text py-3 mt-5 rounded-3 mb-0 mx-auto d-block letter-spacing-1">Agregar</button>

</form>