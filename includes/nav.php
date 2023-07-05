<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid max-w">
        <a class="navbar-brand" href="index.php?seccion=home">Lilac</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php?seccion=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?seccion=about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?seccion=catalogo-completo">Productos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorías
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="index.php?seccion=catalogo&categoria=trending">Trending</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="index.php?seccion=catalogo&categoria=verano-2023">Verano '23</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="index.php?seccion=catalogo&categoria=invierno-2023">Invierno '23</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="index.php?seccion=catalogo-prenda&categoria=Remera">Remeras</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="index.php?seccion=catalogo-prenda&categoria=Musculosa">Musculosas</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="index.php?seccion=catalogo-prenda&categoria=Camisa">Camisas</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="index.php?seccion=catalogo-prenda&categoria=Chaleco">Chalecos</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="index.php?seccion=catalogo-prenda&categoria=Campera">Camperas</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="index.php?seccion=catalogo-prenda&categoria=Buzo">Buzos</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="index.php?seccion=catalogo-prenda&categoria=Sweater">Sweaters</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="index.php?seccion=catalogo-prenda&categoria=Pollera">Polleras</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="index.php?seccion=catalogo-prenda&categoria=Vestido">Vestidos</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="index.php?seccion=catalogo-prenda&categoria=Jumper">Jumpers</a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Marcas
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="index.php?seccion=catalogo-marca&categoria=1">TopShop</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="index.php?seccion=catalogo-marca&categoria=2">Rapsodia</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="index.php?seccion=catalogo-marca&categoria=3">Mango</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="index.php?seccion=catalogo-marca&categoria=4">Forever21</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="index.php?seccion=catalogo-marca&categoria=5">Cuesta Blanca</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?seccion=contacto">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?seccion=datos-alumna">Datos de las alumnas</a>
                </li>
                <li class="nav-item <?= $session ? "d-none" : "" ?>">
                    <a class="nav-link " href="index.php?seccion=login">Iniciar sesión</a>
                </li>
                <li class="nav-item <?= $session ? "" : "d-none" ?>">
                    <a class="nav-link" href="admin/actions/auth_logout.php">Cerrar sesión</a>
                </li>
            </ul>
            <span class="navbar-text">
                <!-- Envíos a toda la Argentina 💗 -->
                <a class="nav-link fs-4" href="index.php?seccion=carrito">&#128722;</a>
            </span>
        </div>
    </div>
</nav>