<?php

require 'conexion.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';


    $contra_encrip = password_hash($contrasena, PASSWORD_DEFAULT);

    if (empty($nombre) || empty($apellido) || empty($correo) || empty($contrasena)) {
        throw new Exception('Error: Todos los campos son obligatorios.');
    }

    try {
        $pdo->beginTransaction();

        $sqlUsuario = "INSERT INTO Usuario (ID_Rol, Estado, Correo, Contraseña) VALUES (2, 1, :correo, :contrasena)"; // Rol 2: Docente Estado:1 Activo
        $stmt= $pdo->prepare($sqlUsuario);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':contrasena', $contra_encrip, PDO::PARAM_STR);
        $stmt->execute();

        $idUsuario = $pdo->lastInsertId(); // Obtenemos el último ID insertado
        if (!$idUsuario) {
            throw new Exception("Error al obtener el ID del usuario.");
        }

        // Inserción en la tabla Docente
        $sqlDocente = "INSERT INTO Docente (ID_Usuario, Nombre_Docente, Apellido_Docente) VALUES (:idUsuario, :nombre, :apellido)";
        $stmt = $pdo->prepare($sqlDocente);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);

        $stmt->execute();
        $pdo->commit();

        header('Location: ../InicioAdmin.php');
        exit(); 

    } catch (PDOException $e) {
        $pdo->rollBack(); // Revertir la transacción en caso de error
        die('Error al crear el docente: ' . $e->getMessage());
    }
} else {
    die('Método no permitido.');
}
?>
