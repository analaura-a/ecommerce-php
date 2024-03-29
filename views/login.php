<div style="max-width: 500px; margin: 0 auto">
    <h1 class="text-center mb-5 mt-5 fw-bold">Iniciar sesión</h1>

    <form class="row g-3" action="admin/actions/auth_login.php" method="POST">
        <div class="col-12 mb-3">
            <label for="username" class="form-label">Nombre de usuario<span class="lilac-text">*</span></label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="col-12 mb-3">
            <label for="pass" class="form-label">Contraseña<span class="lilac-text">*</span></label>
            <input type="password" class="form-control" id="pass" name="pass" required>
        </div>

        <button type="submit" class="btn bg-black w-100 fw-bold lilac-text py-3 mt-4 rounded-3 mb-0 mx-auto d-block letter-spacing-1">Login</button>
    </form>
    <div class="mt-5">
        <?= (new Alerta())->get_alertas() ?>
    </div>
</div>