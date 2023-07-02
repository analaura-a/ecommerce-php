<?php

class Talle
{
    //Atributos
    protected $id;
    protected $talle;

    //Métodos
    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of talle
     */
    public function getTalle()
    {
        return $this->talle;
    }

    /**
     * Obtener todos los talles
     */
    public function lista_completa()
    {
        $resultado = [];

        $query = "SELECT * FROM talle";
        $conexion = (new Conexion())->getConexion();
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $resultado = $PDOStatement->fetchAll();

        return $resultado;
    }

    /**
     * Obtener talle por ID
     */
    public function get_x_id(int $id): ?Talle
    {
        $query = "SELECT * FROM talle WHERE id = $id";
        $conexion = (new Conexion())->getConexion();
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $resultado = $PDOStatement->fetch();

        return $resultado;
    }

    /**
     * Insertar en la tabla Talles un nuevo talle
     * @param string $talle talle nuevo a insertar
     */
    public function insert($talle)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "INSERT INTO talle VALUES(NULL, :talle)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'talle' => $talle,
        ]);
    }

    /**
     * Insertar en la tabla Talles un nuevo talle
     * @param string $talle talle nuevo a actualizar
     * @param number $id id del talle nuevo a actualizar
     */
    public function edit($talle, $id)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "UPDATE talle SET talle = :talle WHERE talle.id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'id' => $id,
            'talle' => $talle,
        ]);
    }
}
