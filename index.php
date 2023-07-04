<?PHP

require_once "functions/autoload.php";

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

$session = $_SESSION['loggedIn'] ?? FALSE;

$seccion = $_GET['seccion'] ?? "home";
$whiteList = [
    "home" => [
        "titulo" => "LILAC | Tienda online de ropa femenina"
    ],
    "about" => [
        "titulo" => "Acerca de Lilac"
    ],
    "catalogo-completo" => [
        "titulo" => "Catálogo | Todas las prendas"
    ],
    "catalogo" => [
        "titulo" => "Catálogo | Categorías"
    ],
    "catalogo-prenda" => [
        "titulo" => "Catálogo | Prendas"
    ],
    "catalogo-marca" => [
        "titulo" => "Catálogo | Marcas"
    ],
    "product-detail" => [
        "titulo" => "Detalle de la prenda"
    ],
    "contacto" => [
        "titulo" => "¡Contactate con nosotras!"
    ],
    "datos-alumna" => [
        "titulo" => "Datos de la alumna"
    ],
    "login" => [
        "titulo" => "Iniciar sesión"
    ],
    "carrito" => [
        "titulo" => "Mi carrito"
    ]
];

$vista = "404";
$titulo = "404 | Página no encontrada";

if (array_key_exists($seccion, $whiteList)) {
    $vista = $seccion;
    $titulo = $whiteList[$seccion]["titulo"];
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
    <link href="css/styles.css" rel="stylesheet">
</head>

<body class="body">

    <p class="publicidad text-center py-1 fw-bold fs-7">3 cuotas sin interés</p>

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
    <?php require_once "includes/footer.php" ?>

    <!--JS Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>