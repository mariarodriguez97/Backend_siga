<?php
include_once 'Conexion.php';
include_once 'CRUD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_REQUEST['accion'];  
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);


    if($accion== 'crear'){
    if ($user->CrearDocente($nombre, $apellido)) {
        echo "Docente registrado con éxito.";
    } else {
        echo "Error al registrar el Docente.";
    }
}elseif ($accion== 'editar') {
    $id_docente=$_REQUEST['id_docente'];
    if($user->ActualizarDocente($id_docente, $nombre, $apellido )){
        echo "Docente actualizado con éxito";
    }else{
        echo "Error al actualizar el docente.";
    }
    
}

    $database->closeConnection();
}