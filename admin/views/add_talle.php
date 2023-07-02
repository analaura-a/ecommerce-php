<div class="row my-5">
    <div class="col">

        <h1 class="text-center mb-5 fw-bold">Agregar un nuevo talle</h1>
        <div class="row mb-5 d-flex align-items-center">

            <form class="row g-3" action="actions/add_talle_action.php" method="POST" enctype="multipart/form-data">
                <div class="col-md-6 mb-3">
                    <label for="talle" class="form-label">Talle</label>
                    <input type="text" class="form-control" id="talle" name="talle" required>
                </div>

                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>


        </div>


    </div>
</div>