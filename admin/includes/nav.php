<nav class="navbar navbar-expand-lg bg-nav-admin">
    <div class="container-fluid max-w">
        <a class="navbar-brand navbar-admin" href="index.php?seccion=dashboard">Lilac</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item <?= $session ?>">
                    <a class="nav-link" aria-current="page" href="index.php?seccion=admin_prendas">Prendas</a>
                </li>
                <li class="nav-item <?= $session ?>">
                    <a class="nav-link" aria-current="page" href="index.php?seccion=admin_marcas">Marcas</a>
                </li>
                <li class="nav-item <?= $session ?>">
                    <a class="nav-link" aria-current="page" href="index.php?seccion=admin_talles">Talles</a>
                </li>
                <li class="nav-item <?= $logout ?>">
                    <a class="nav-link" href="index.php?seccion=login">Iniciar sesión</a>
                </li>
                <li class="nav-item <?= $session ?>">
                    <a class="nav-link" href="actions/auth_logout.php">Cerrar sesión</a>
                </li>
            </ul>

            <span class="navbar-text <?= $session ?>">
                Panel administrativo de Lilac 💗
            </span>
        </div>
    </div>
</nav>