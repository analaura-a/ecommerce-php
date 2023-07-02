<?php

class Talle
{
    //Atributos
    protected $id;
    protected $talle;
    protected $centimetros;
    protected $tipo;

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
     * Get the value of centimetros
     */
    public function getCentimetros()
    {
        return $this->centimetros;
    }

    /**
     * Get the value of tipo
     */
    public function getTipo()
    {
        return $this->tipo;
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
     * @param number $centimetros centimetros de la medida correspondiente al talle
     * @param string $tipo parte del cuerpo a la que hace referencia la medida
     */
    public function insert($talle, $centimetros, $tipo)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "INSERT INTO talle VALUES(NULL, :talle, :centimetros, :tipo)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'talle' => $talle,
            'centimetros' => $centimetros,
            'tipo' => $tipo,
        ]);
    }

    /**
     * Editar en la tabla Talles un talle
     * @param string $talle talle a actualizar
     * @param number $centimetros centimetros de la medida correspondiente al talle
     * @param string $tipo parte del cuerpo a la que hace referencia la medida
     * @param number $id id del talle a actualizar
     */
    public function edit($talle, $centimetros, $tipo, $id)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "UPDATE talle SET talle = :talle, centimetros = :centimetros, tipo = :tipo WHERE talle.id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'id' => $id,
            'talle' => $talle,
            'centimetros' => $centimetros,
            'tipo' => $tipo,
        ]);
    }

    /**
     * Elimina esta instancia de la base de datos (talle)
     */
    public function delete()
    {
        $conexion = (new Conexion())->getConexion();
        $query = "DELETE FROM talle WHERE id = ?;";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }
}
