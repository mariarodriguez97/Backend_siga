<?php

include_once 'Conexion.php';

class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function CrearUsuario($id_rol){
        $query = "INSERT INTO usuario (id_rol, estado) VALUES (:id_rol, 1)"; 
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':id_rol', $id_rol);
    
        if ($stmt->execute()) {
            return $this->conn->lastInsertId(); 
        }
        return false;
    }
    

    public function CrearDocente($nombre, $apellido) {

        $query= "SELECT id_rol FROM rol WHERE nombre_rol= 'Docente'";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
        $id_rol=$stmt->fetchColumn();

        $id_usuario = $this->CrearUsuario($id_rol);
        if (!$id_usuario) {
            return false; 
        }

        $query = "INSERT INTO docente (id_usuario, nombre_docente, apellido_docente) VALUES (:id_usuario, :nombre, :apellido)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function ActualizarDocente($id_docente, $nombre, $apellido){
        $query= "UPDATE docente SET nombre_docente= :nombre, apellido_docente= :apellido WHERE id_docente= :id_docente";
        $stmt= $this->conn->prepare($query);

        $stmt->bindParam(':id_docente', $id_docente);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function cambiar_estado($id_usuario, $nuevo_estado){
        if (!in_array($nuevo_estado, [0, 1])) {
            return false; 
        }
        $query="UPDATE usuario SET estado=:estado WHERE id_usuario= :id_usuario";
        $stmt= $this->conn->prepare($query);

        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':estado', $nuevo_estado);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
}
?>