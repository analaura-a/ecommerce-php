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

}
