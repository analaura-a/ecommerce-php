<?php

class Carrito
{
    /* Métodos */
    //Agregar items
    public function add_item(int $prendaID, int $cantidad)
    {
        $catalogo = new Prenda();
        $item = $catalogo->catalogo_por_id($prendaID);
        if ($item)
            $_SESSION["carrito"][$prendaID] = [
                "Producto" => $item->getNombre(),
                "imagen"  => $item->getImagen(),
                "Talle" => $item->getTalles_secundarios(),
                "Color" => $item->getColor(),
                "Precio" => $item->getPrecio(),
                "Cantidad" => $cantidad
            ];
    }

    //Vaciar carrito
    public function clear_items()
    {
        $_SESSION["carrito"] = [];
    }

    //Obtener carrito
    public function get_carrito()
    {
        if (!empty($_SESSION["carrito"])) {
            return $_SESSION["carrito"];
        } else {
            return [];
        }
    }

    //Precio total
    public function get_total()
    {
        $total = 0;
        if ($_SESSION["carrito"]) {
            foreach ($_SESSION["carrito"] as $item) {
                $total += $item["Precio"] * $item["Cantidad"];
            }
        }
        return $total;
    }

    //Modificar cantidad
    public function update_cantidades($cantidades)
    {
        foreach ($cantidades as $id => $cantidad) {
            if (isset($_SESSION["carrito"][$id])) {
                $_SESSION["carrito"][$id]["Cantidad"] = $cantidad;
            }
        }
    }

    //Eliminar item individual
    public function borrar_item(int $id)
    {
        if (isset($_SESSION["carrito"][$id])) {
            unset($_SESSION["carrito"][$id]);
        }
    }
}
