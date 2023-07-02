<div class="row my-5">
    <div class="col">

        <h1 class="text-center mb-5 fw-bold">Agregar un nuevo talle</h1>
        <div class="row mb-5 d-flex align-items-center">

            <form class="row g-3" action="actions/add_talle_action.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="talle" class="form-label">Talle</label>
                    <input type="text" class="form-control" id="talle" name="talle" required>
                </div>
                <div class="mb-3">
                    <label for="centimetros" class="form-label">Centimetros</label>
                    <input type="number" class="form-control" id="centimetros" name="centimetros" required>
                </div>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" required>
                    <div id="textareaHelp" class="form-text">¿A qué parte del cuerpo pertenecen las medidas? Por ejemplo: torso, cintura, cadera, etc.</div>
                </div>

                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>

        </div>

    </div>
</div>