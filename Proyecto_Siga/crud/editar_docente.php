<?php
require 'conexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_docente = $_POST['editar-id'];
    $id_usuario = $_POST['editar-usuario'];
    $nombre = $_POST['editar-nombre'];
    $apellido = $_POST['editar-apellido'];
    $correo = $_POST['editar-correo'];
    $password = $_POST['editar-password'];

    try {
        $pdo->beginTransaction();

        // Actualizar datos en la tabla Docente
        $sql = "UPDATE Docente SET Nombre_Docente = ?, Apellido_Docente = ? WHERE ID_Docente = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nombre, $apellido, $id_docente]);

        // Actualizar correo en la tabla Usuario
        $sql = "UPDATE Usuario SET Correo = ? WHERE ID_Usuario = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$correo, $id_usuario]);

        // Si el usuario ingresó una nueva contraseña, la actualizamos
        if (!empty($password)) {
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE Usuario SET Contraseña = ? WHERE ID_Usuario = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$password_hashed, $id_usuario]);
        }

        $pdo->commit();
        header("Location: ../inicioAdmin.php?page=docentes.php&success=1");
        exit();        
    } catch (Exception $e) {
        $pdo->rollBack();
        die("Error al actualizar: " . $e->getMessage());
    }
} else {
    header("Location: ../inicioAdmin.php?page=docentes.php");
    exit();
}
