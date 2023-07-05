<?php
require_once "../../functions/autoload.php";

(new Carrito())->clear_items();
header('Location:../../index.php?seccion=carrito');
