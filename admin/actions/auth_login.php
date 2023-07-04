<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;

$login = (new Autenticacion())->log_in($postData['username'], $postData['pass']);

if ($login) {
    if ($login != "usuario")
        header('location: ../index.php?seccion=dashboard');
    else {
        header('location: ../../index.php');
    }
} else {
    header('location: ../../index.php?seccion=login');
}
