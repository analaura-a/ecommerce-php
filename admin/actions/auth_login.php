<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;

echo "<pre>";
print_r($postData);
echo "</pre>";


if ($login) {
    header('location: ../index.php?seccion=dashboard');
} else {
    header('location: ../index.php?seccion=login');
}
