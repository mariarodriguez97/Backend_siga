<?php
require_once __DIR__ . '/../crud/conexion.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $Nuevo_Nombre=$_POST['editar-nombre']??'';
    $Nuevo_Apellido=$_POST['editar-apellido']??'';
    $ID_Docente = $_POST['id'] ?? '';

    if (empty($Nuevo_Nombre) || empty($Nuevo_Apellido)) {
        die('Error: Los nuevos nombres y apellidos son obligatorios.');
    }


try{
    $pdo->beginTransaction();

    $query="UPDATE docente SET nombre_docente=:nombre, apellido_docente=:apellido WHERE  ID_Docente=:ID_Docente";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':ID_Docente',$ID_Docente);
    $stmt->bindParam(':nombre', $Nuevo_Nombre);
    $stmt->bindParam(':apellido', $Nuevo_Apellido);
    
    $stmt->execute();

        $pdo->commit();


        header('Location: ../index.php');
        exit(); // 

    } catch (PDOException $e) {
        $pdo->rollBack(); // Revertir la transacción en caso de error
        die('Error al crear el docente: ' . $e->getMessage());
    }
}else {
        die('Método no permitido.');
    }
?>
