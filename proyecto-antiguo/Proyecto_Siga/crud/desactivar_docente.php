<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    if ($id) {
        $sql = "UPDATE Usuario SET Estado = 0 WHERE ID_Usuario = (SELECT ID_Usuario FROM Docente WHERE ID_Docente = :id)";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute(['id' => $id]);
            header('Location: ../InicioAdmin.php');
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "ID de docente inválido.";
    }
}
?>