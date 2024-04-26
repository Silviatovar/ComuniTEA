<?php
class conectarPDO
{
    // Propiedades
    private $db;
    private $host;
    private $user;
    private $pass;
    private $port;
    private $conexion;

    // Constructor
    public function __construct(string $db, string $host, string $user, string $pass, int $port)
    {
        $this->db = $db;
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->port = $port;

        // Establecer la conexion
        try {
            $mysql = "mysql:host=$host;dbname=$db;charset=UTF8;port=$port";
            $this->conexion = new PDO($mysql, $user, $pass);
            echo "<p>Conectado a la BBDD</p>";
        } catch (PDOException $e) {
            // Mostramos mensaje en caso de error
            die($e->getMessage());
        }
    }

    public function consulta(string $sql): PDOStatement
    {
        return $this->conexion->query($sql);
    }
}