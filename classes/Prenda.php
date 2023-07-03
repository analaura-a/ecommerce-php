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
    protected $talles_secundarios;
    protected $tiposDePrenda = ["Buzo", "Camisa", "Campera", "Chaleco", "Jumper", "Musculosa", "Pollera", "Remera", "Sweater", "Vestido"];


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
     * Get the value of talles_secundarios
     */
    public function getTalles_secundarios()
    {
        return $this->talles_secundarios;
    }

    /**
     * Get the value of tiposDePrenda
     */
    public function getTiposDePrenda()
    {
        return $this->tiposDePrenda;
    }

    /**
     * Devuelve el catálogo de productos entero
     */
    public function catalogo_completo(): array
    {
        $catalogo = [];

        $query = "SELECT prendas.*, GROUP_CONCAT(prenda_x_talle.id_talle) AS talles_secundarios FROM prendas LEFT JOIN prenda_x_talle ON prenda_x_talle.id_prenda = prendas.id GROUP BY prendas.id";
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
     * @param string $nombre nombre de la prenda
     * @param string $categoria categoria de la prenda
     * @param string $prenda tipo de prenda
     * @param int $precio
     * @param string $color
     * @param int $talle_id id del talle que tiene la prenda
     * @param string $descripcion 
     * @param string $imagen 
     * @param string $publicacion fecha de publicación
     * @param int $marca_id id de la marca que tiene la prenda
     */
    public function insert($nombre, $categoria, $prenda, $precio, $color, $talle_id, $descripcion, $imagen, $publicacion, $marca_id): int
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
        return $conexion->lastInsertId();
    }

    /**
     * Insertar en la tabla prendas una nueva prenda
     * @param string $nombre nombre de la prenda
     * @param string $categoria categoria de la prenda
     * @param string $prenda tipo de prenda
     * @param int $precio
     * @param string $color
     * @param int $talle_id id del talle que tiene la prenda
     * @param string $descripcion 
     * @param string $publicacion fecha de publicación
     * @param int $marca_id id de la marca que tiene la prenda
     * @param int $id id del producto a editar
     */
    public function edit($nombre, $categoria, $prenda, $precio, $color, $talle_id, $descripcion, $publicacion, $marca_id, $id)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "UPDATE prendas SET nombre = :nombre, categoria = :categoria, prenda = :prenda, precio = :precio, color = :color, talle_id = :talle_id, descripcion = :descripcion, publicacion = :publicacion, marca_id = :marca_id WHERE prendas.id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre,
            'categoria' => $categoria,
            'prenda' => $prenda,
            'precio' => $precio,
            'color' => $color,
            'talle_id' => $talle_id,
            'descripcion' => $descripcion,
            'publicacion' => $publicacion,
            'marca_id' => $marca_id,
            'id' => $id,
        ]);
    }

    /**
     * Elimina esta instancia de la base de datos (Prendas)
     */
    public function delete()
    {
        $conexion = (new Conexion())->getConexion();
        $query = "DELETE FROM prendas WHERE id = ?;";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }


    /**
     * Crea un vinculo de entre una prenda y talles secundarios
     * @param int $id_prenda ID de la prenda
     * @param int $id_talle ID del talle
     */
    public function add_talles_sec($id_prenda, $id_talle)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "INSERT INTO prenda_x_talle VALUES (NULL, :id_prenda, :id_talle)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id_prenda' => $id_prenda,
                'id_talle' => $id_talle
            ]
        );
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


//SELECT prendas.*, GROUP_CONCAT(prenda_x_talle.id_talle) AS talles_secundarios FROM prendas LEFT JOIN prenda_x_talle ON prenda_x_talle.id_prenda = prendas.id GROUP BY prendas.id;