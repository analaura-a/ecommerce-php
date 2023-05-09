<?php

class Prenda
{
    //Atributos
    public $id;
    public $categoria;
    public $nombre;
    public $prenda;
    public $color;
    public $talle;
    public $descripcion;
    public $imagen;
    public $precio;
    public $publicacion;

    //Métodos
    /**
     * Devuelve el catálogo de productos entero
     */
    public function catalogo_completo(): array
    {
        $catalogo = [];

        $datosJSON = file_get_contents(("JSON/productos.json"));
        $datosArray = json_decode($datosJSON);

        foreach ($datosArray as $value) {
            $prenda = new self();
            $prenda->id = $value->id;
            $prenda->categoria = $value->categoria;
            $prenda->nombre = $value->nombre;
            $prenda->prenda = $value->prenda;
            $prenda->color = $value->color;
            $prenda->talle = $value->talle;
            $prenda->descripcion = $value->descripcion;
            $prenda->imagen = $value->imagen;
            $prenda->precio = $value->precio;
            $prenda->publicacion = $value->publicacion;

            $catalogo[] = $prenda;
        }

        return $catalogo;
    }

    /**
     * Devuelve el catálogo de una categoría en particular
     * @param string $nombre_categoria nombre de la categoría a filtrar
     */
    public function catalogo_por_categoria(string $nombre_categoria): array
    {
        $catalogo_filtrado = [];

        $catalogo = $this->catalogo_completo();
        foreach ($catalogo as $prenda) {
            if ($prenda->categoria == $nombre_categoria) {
                $catalogo_filtrado[] = $prenda;
            }
        }

        return $catalogo_filtrado;
    }

    /**
     * Devuelve el catálogo de un tipo de prenda en particular
     * @param string $nombre_prenda nombre del tipo de prenda a filtrar
     */
    public function catalogo_por_prenda(string $nombre_prenda): array
    {
        $catalogo_filtrado = [];

        $catalogo = $this->catalogo_completo();
        foreach ($catalogo as $prenda) {
            if ($prenda->prenda == $nombre_prenda) {
                $catalogo_filtrado[] = $prenda;
            }
        }

        return $catalogo_filtrado;
    }

    /**
     * Devuelve el catálogo de una prenda en particular
     * @param int $id id del producto en particular
     */
    public function catalogo_por_id(int $id)
    {
        $catalogo = $this->catalogo_completo();

        foreach ($catalogo as $prenda) {
            if ($prenda->id == $id) {
                return $prenda;
            }
        }
        return null;
    }

    /**
     * Devuelve el precio de la prenda formateado como dinero
     */
    public function precio_formateado(): string
    {
        return number_format($this->precio, 2, ",", ".");
    }

    /**
     * Devuelve las primeras palabras de un párrafo (para las descripciones de las cards)
     * @param int $cantidad cantidad única de palabras del párrafo que vamos a mostrar
     */
    public function recortar_parrafo(int $cantidad = 18): string
    {
        $parrafo = $this->descripcion;
        $resultado = "";

        $array = explode(" ", $parrafo);
        if (count($array) <= $cantidad) {
            $resultado = $parrafo;
        } else {
            array_splice($array, $cantidad);
            $resultado = implode(" ", $array) . "...";
        }

        return $resultado;
    }
}
