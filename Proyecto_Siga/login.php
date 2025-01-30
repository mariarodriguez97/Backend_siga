<?php
session_start();
require_once __DIR__ . '/crud/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $usuario = $_POST['usuario'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    // Validar que no esté vacío
    if (empty($usuario) || empty($contrasena)) {
        die('Error: El correo y la contraseña son obligatorios.');
    }

    // Consultar el usuario en la base de datos
    $sql = "SELECT u.ID_Usuario, u.estado, u.id_rol, d.Contraseña_Docente 
            FROM Usuario u
            INNER JOIN Docente d ON u.ID_Usuario = d.ID_Usuario
            WHERE d.Correo_Docente = :usuario AND u.estado = 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $stmt->execute();

    $usuarioDb = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si el usuario existe y la contraseña es correcta
    if ($usuarioDb && password_verify($contrasena, $usuarioDb['Contraseña_Docente'])) {
        // Autenticación exitosa: iniciamos sesión
        $_SESSION['user_id'] = $usuarioDb['ID_Usuario'];
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = $usuarioDb['id_rol']; // Almacenamos el rol del usuario

        // Verificar el rol del usuario
        if ($_SESSION['rol'] == 2) {  // Si es docente (id_rol = 2)
            header("Location: InicioAdmin.php");
            exit();
        } elseif ($_SESSION['rol'] == 4) {  // Si es administrativo (id_rol = 4)
            header("Location: InicioAdmin.php");
            exit();
        } else {
            echo 'Rol de usuario desconocido.';
        }
    } else {
        // Si las credenciales son incorrectas
        echo 'Credenciales incorrectas. Por favor, intente nuevamente.';
    }
} else {
    die('Método no permitido.');
}
?>
