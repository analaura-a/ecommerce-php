<h1 class="text-center mb-5 mt-5 fw-bold">Iniciar sesión</h1>

<form class="row g-3" action="actions/auth_login.php" method="POST">
    <div class="col-12 mb-3">
        <label for="username" class="form-label">Nombre de usuario</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>

    <div class="col-12 mb-3">
        <label for="pass" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="pass" name="pass" required>
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
</form>