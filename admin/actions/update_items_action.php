<?php 
require_once "../../functions/autoload.php";
$postData = $_POST;
if(!empty($postData)){
    (new Carrito())->update_cantidades($postData["cantidad"]);
    header ('Location:../../index.php?seccion=carrito');
}
//echo "<pre>";
//print_r ($_POST);
//echo "</pre>";