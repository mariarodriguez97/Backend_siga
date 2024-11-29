<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombreDocente'] ?? '';
    $apellido = $_POST['apellidoDocente'] ?? '';


    if (empty($nombre) || empty($apellido)) {
        die('Error: Nombre y apellido son obligatorios.');
    }


    try {
        $pdo->beginTransaction(); // Iniciar una transacción


        $sqlUsuario = "INSERT INTO Usuario (ID_Rol, Estado) VALUES (2, 1)"; // ID_Rol = 2 (Docente), Estado = 1 (Activo)
        $pdo->exec($sqlUsuario);
        $idUsuario = $pdo->lastInsertId(); 

        $sqlDocente = "INSERT INTO Docente (ID_Usuario, Nombre_Docente, Apellido_Docente) VALUES (:idUsuario, :nombre, :apellido)";
        $stmt = $pdo->prepare($sqlDocente);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $stmt->execute();

        $pdo->commit(); // Confirmar la transacción

        // Redirigir con mensaje de éxito
        header('Location: index.php?success=1');
    } catch (PDOException $e) {
        $pdo->rollBack(); // Revertir la transacción en caso de error
        die('Error al crear el docente: ' . $e->getMessage());
    }
} else {
    die('Método no permitido.');
}
?>
