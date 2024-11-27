<?php

echo "Script ejecutado correctamente.";


class Database
{
    private $host = 'localhost'; 
    private $db_name = 'SIGA'; 
    private $username = 'root'; 
    private $password = ''; 

    private $conn; 
    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if ($this->conn) {
                echo "conexion exitosa";
            }
        } catch (PDOException $exception) {
            echo "Error al conectar a la base de datos: " . $exception->getMessage();
        }

        return $this->conn;
    }

    public function closeConnection()
    {
        $this->conn = null;
    }
}

?>