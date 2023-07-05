<?PHP

require_once "../functions/autoload.php";

(new Autenticacion())->verify();

$identificado = $_SESSION['loggedIn'] ?? FALSE;
if ($identificado) {
    $usuarioPermitido = $_SESSION['loggedIn']['rol'] == 'superadmin' ?? FALSE;
}

$seccion = $_GET['seccion'] ?? "dashboard";
$whiteList = [
    "dashboard" => [
        "titulo" => "Panel de administración",
        "restringido" => TRUE
    ],
    "admin_talles" => [
        "titulo" => "Administración de talles",
        "restringido" => TRUE
    ],
    "add_talle" => [
        "titulo" => "Agregar nuevo talle",
        "restringido" => TRUE
    ],
    "edit_talle" => [
        "titulo" => "Editar un talle existente",
        "restringido" => TRUE
    ],
    "delete_talle" => [
        "titulo" => "Eliminar un talle existente",
        "restringido" => TRUE
    ],
    "admin_marcas" => [
        "titulo" => "Administración de marcas",
        "restringido" => TRUE
    ],
    "add_marca" => [
        "titulo" => "Agregar nueva marca",
        "restringido" => TRUE
    ],
    "edit_marca" => [
        "titulo" => "Editar una marca existente",
        "restringido" => TRUE
    ],
    "delete_marca" => [
        "titulo" => "Eliminar una marca existente",
        "restringido" => TRUE
    ],
    "admin_prendas" => [
        "titulo" => "Administración de prendas",
        "restringido" => TRUE
    ],
    "add_prenda" => [
        "titulo" => "Agregar nueva prenda",
        "restringido" => TRUE
    ],
    "edit_prenda" => [
        "titulo" => "Editar una prenda existente",
        "restringido" => TRUE
    ],
    "delete_prenda" => [
        "titulo" => "Eliminar una prenda existente",
        "restringido" => TRUE
    ],
    "login" => [
        "titulo" => "Login | Iniciar sesión",
        "restringido" => FALSE
    ],

];

$vista = "404";
$titulo = "404 | Página no encontrada";

if (array_key_exists($seccion, $whiteList)) {
    $vista = $seccion;
    $titulo = $whiteList[$seccion]["titulo"];
    if ($whiteList[$seccion]['restringido']) {
        if (!isset($_SESSION['loggedIn'])) {
            header('location: index.php?seccion=login');
        }

        if ($_SESSION['loggedIn']['rol'] == 'usuario') {
            header('location: index.php?seccion=login');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo ?></title>

    <!--CSS externo-->
    <link href="https://api.fontshare.com/v2/css?f[]=manrope@700,400,300,800,600,500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!--CSS de autora-->
    <link href="../css/styles.css" rel="stylesheet">
</head>

<body class="body">

    <header>
        <!--NAV que vamos a traer con require-->
        <?php require_once "includes/nav.php" ?>
    </header>

    <main class="container">
        <!--Contenido principal dinámico-->
        <?PHP
        file_exists("views/$vista.php")
            ?  require "views/$vista.php"
            :  require "views/404.php"
        ?>
    </main>

    <!--FOOTER que vamos a traer con require-->
    <?php //require_once "includes/footer.php" 
    ?>

    <!--JS Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>