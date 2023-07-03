<?php

class Prenda
{
    //Atributos
    protected $id;
    protected $nombre;
    protected $categoria;
    protected $prenda;
    protected $precio;
    protected $color;
    protected $talle_id;
    protected $descripcion;
    protected $imagen;
    protected $publicacion;
    protected $marca_id;
    protected $tiposDePrenda = ["Buzo", "Camisa", "Campera", "Chaleco", "Jumper", "Musculosa", "Pollera", "Remera", "Sweater", "Vestido"];
    protected $categoriasDisponibles = ["verano-2023", "invierno-2023", "trending"];


    //Métodos
    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Get the value of prenda
     */
    public function getPrenda()
    {
        return $this->prenda;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Get the value of color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Getter del talle
     */
    public function getTalle()
    {
        $talle = (new Talle())->get_x_id($this->talle_id);
        $valor_talle = $talle->getTalle();
        return $valor_talle;
    }

    /**
     * Get the value of talle_id
     */
    public function getTalle_id()
    {
        return $this->talle_id;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Get the value of imagen
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Get the value of publicacion
     */
    public function getPublicacion()
    {
        return $this->publicacion;
    }

    /**
     * Getter de la marca
     */
    public function getMarca()
    {
        $marca = (new Marca())->get_x_id($this->marca_id);
        $nombre_marca = $marca->getNombre();
        return $nombre_marca;
    }

    /**
     * Get the value of marca_id
     */
    public function getMarca_id()
    {
        return $this->marca_id;
    }

    /**
     * Get the value of tiposDePrenda
     */
    public function getTiposDePrenda()
    {
        return $this->tiposDePrenda;
    }

    /**
     * Get the value of categoriasDisponibles
     */
    public function getCategoriasDisponibles()
    {
        return $this->categoriasDisponibles;
    }

    /**
     * Devuelve el catálogo de productos entero
     */
    public function catalogo_completo(): array
    {
        $catalogo = [];

        $query = "SELECT * FROM prendas";
        $conexion = (new Conexion())->getConexion();
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo = $PDOStatement->fetchAll();

        return $catalogo;
    }

    /**
     * Devuelve el catálogo de una categoría en particular
     * @param string $nombre_categoria nombre de la categoría a filtrar
     */
    public function catalogo_por_categoria(string $nombre_categoria): array
    {
        $catalogo_filtrado = [];

        $query = "SELECT * FROM prendas WHERE categoria = '$nombre_categoria'";
        $conexion = (new Conexion())->getConexion();
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo_filtrado = $PDOStatement->fetchAll();

        return $catalogo_filtrado;
    }

    /**
     * Devuelve el catálogo de un tipo de prenda en particular
     * @param string $nombre_prenda nombre del tipo de prenda a filtrar
     */
    public function catalogo_por_prenda(string $nombre_prenda): array
    {
        $catalogo_filtrado = [];

        $query = "SELECT * FROM prendas WHERE prenda = '$nombre_prenda'";
        $conexion = (new Conexion())->getConexion();
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo_filtrado = $PDOStatement->fetchAll();

        return $catalogo_filtrado;
    }

    /**
     * Devuelve el catálogo de un tipo de marca en particular
     * @param int $nombre_prenda id de la marca a filtrar
     */
    public function catalogo_por_marca(int $id): array
    {
        $catalogo_filtrado = [];

        $query = "SELECT * FROM prendas WHERE marca_id = $id";
        $conexion = (new Conexion())->getConexion();
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo_filtrado = $PDOStatement->fetchAll();


        return $catalogo_filtrado;
    }

    /**
     * Devuelve el detalle de una prenda en particular
     * @param int $id id del producto en particular
     */
    public function catalogo_por_id(int $id)
    {
        $query = "SELECT * FROM prendas WHERE id = $id";
        $conexion = (new Conexion())->getConexion();
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $prendaSeleccionada = $PDOStatement->fetch();
        return $prendaSeleccionada;
    }




    /**
     * Insertar en la tabla prendas una nueva prenda
     * @param string $nombre talle nuevo a insertar
     * @param string $categoria centimetros de la medida correspondiente al talle
     * @param string $prenda parte del cuerpo a la que hace referencia la medida
     * @param int $precio parte del cuerpo a la que hace referencia la medida
     * @param string $color parte del cuerpo a la que hace referencia la medida
     * @param int $talle_id parte del cuerpo a la que hace referencia la medida
     * @param string $descripcion parte del cuerpo a la que hace referencia la medida
     * @param string $imagen parte del cuerpo a la que hace referencia la medida
     * @param string $publicacion parte del cuerpo a la que hace referencia la medida
     * @param int $marca_id parte del cuerpo a la que hace referencia la medida
     */
    public function insert($nombre, $categoria, $prenda, $precio, $color, $talle_id, $descripcion, $imagen, $publicacion, $marca_id)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "INSERT INTO prendas VALUES(NULL, :nombre, :categoria, :prenda, :precio, :color, :talle_id, :descripcion, :imagen, :publicacion, :marca_id)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre,
            'categoria' => $categoria,
            'prenda' => $prenda,
            'precio' => $precio,
            'color' => $color,
            'talle_id' => $talle_id,
            'descripcion' => $descripcion,
            'imagen' => $imagen,
            'publicacion' => $publicacion,
            'marca_id' => $marca_id,
        ]);
    }












    /**
     * Devuelve el precio de la prenda formateado como dinero
     */
    public function precio_formateado(): string
    {
        return number_format($this->getPrecio(), 2, ",", ".");
    }

    /**
     * Devuelve las primeras palabras de un párrafo (para las descripciones de las cards)
     * @param int $cantidad cantidad única de palabras del párrafo que vamos a mostrar
     */
    public function recortar_parrafo(int $cantidad = 18): string
    {
        $parrafo = $this->getDescripcion();
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
