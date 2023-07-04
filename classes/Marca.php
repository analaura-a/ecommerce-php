<?php

class Marca
{
    //Atributos
    protected $id;
    protected $nombre;
    protected $logo;
    protected $historia;
    protected $fundador;

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
     * Get the value of logo
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Get the value of historia
     */
    public function getHistoria()
    {
        return $this->historia;
    }

    /**
     * Get the value of fundador
     */
    public function getFundador()
    {
        return $this->fundador;
    }

    /**
     * Obtener marca por ID
     */
    public function get_x_id(int $id)
    {
        $query = "SELECT * FROM marca WHERE id = $id";
        $conexion = (new Conexion())->getConexion();
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $resultado = $PDOStatement->fetch();

        return $resultado;
    }

    /*
     * Obtener todas las marcas
     */
    public function lista_completa()
    {
        $resultado = [];

        $query = "SELECT * FROM marca";
        $conexion = (new Conexion())->getConexion();
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $resultado = $PDOStatement->fetchAll();

        return $resultado;
    }

    /*
     * Insertar un nuevo valor en la tabla Marca
     */
    public function insert($nombre, $logo, $historia, $fundador)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "INSERT INTO marca VALUES(NULL,:nombre,:logo,:historia,:fundador)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'nombre' => $nombre,
                'logo' => $logo,
                'historia' => $historia,
                'fundador' => $fundador,

            ]
        );
    }

    /*
     * Editar un valor existente en la tabla Marca
     */
    public function edit($nombre, $historia, $fundador, $id)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "UPDATE  marca SET nombre = :nombre,historia =:historia,fundador = :fundador WHERE marca.id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $id,
                'nombre' => $nombre,
                'historia' => $historia,
                'fundador' => $fundador,

            ]
        );
    }

    /*
     * Eliminar un valor existente en la tabla Marca
     */
    public function delete()
    {
        $conexion = (new Conexion())->getConexion();
        $query = "DELETE FROM marca WHERE id = ?;";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }
}
