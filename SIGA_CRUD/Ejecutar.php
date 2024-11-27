<?php
include_once 'Conexion.php';
include_once 'CRUD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion'] ?? '';

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);

    if ($accion === 'crear') {
        $nombre = $_POST['nombre'] ?? null;
        $apellido = $_POST['apellido'] ?? null;

        if ($nombre && $apellido) {
            if ($user->CrearDocente($nombre, $apellido)) {
                echo "Docente registrado con éxito.";
            } else {
                echo "Error al registrar el Docente.";
            }
        } else {
            echo "Faltan datos para registrar el docente.";
        }
    } elseif ($accion === 'editar') {
        $id_docente = $_POST['id_docente'] ?? null;
        $nombre = $_POST['nombre'] ?? null;
        $apellido = $_POST['apellido'] ?? null;

        if ($id_docente && $nombre && $apellido) {
            if ($user->ActualizarDocente($id_docente, $nombre, $apellido)) {
                echo "Docente actualizado con éxito.";
            } else {
                echo "Error al actualizar el docente.";
            }
        } else {
            echo "Faltan datos para actualizar el docente.";
        }
    } elseif ($accion === 'cambiar_estado') {
        $id_usuario = $_POST['id_usuario'] ?? null;
        $nuevo_estado = $_POST['nuevo_estado'] ?? null;

        if ($id_usuario && $nuevo_estado !== null) {
            if ($user->cambiar_estado($id_usuario, $nuevo_estado)) {
                echo "El estado del usuario se ha actualizado correctamente.";
            } else {
                echo "Error al actualizar el estado del usuario.";
            }
        } else {
            echo "Faltan datos para actualizar el estado.";
        }
    }

    $database->closeConnection();
}