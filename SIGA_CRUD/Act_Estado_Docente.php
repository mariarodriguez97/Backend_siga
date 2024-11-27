<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Estado Docente</title>
</head>
<body>
    
<h1>Activación o Desactivación de Docentes</h1>

<?php
include_once 'Conexion.php';

try {
    $database = new Database();
    $db = $database->getConnection();

    $query = "SELECT u.id_usuario, d.nombre_docente, d.apellido_docente FROM usuario u INNER JOIN docente d ON u.id_usuario = d.id_usuario WHERE u.estado = 1";

    $stmt = $db->prepare($query);
    $stmt->execute();
    $docentes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al cargar los docentes: " . $e->getMessage();
}
?>

<form action="Ejecutar.php" method="POST">
    <input type="hidden" name="accion" value="cambiar_estado">

    <label for="id_usuario">Seleccione el docente:</label><br>
    <select id="id_usuario" name="id_usuario" required>
        <?php if (!empty($docentes)): ?>
            <?php foreach ($docentes as $docente): ?>
                <option value="<?php echo $docente['id_usuario']; ?>">
                    <?php echo $docente['nombre_docente'] . " " . $docente['apellido_docente']; ?>
                </option>
            <?php endforeach; ?>
        <?php else: ?>
            <option value="">No hay docentes activos disponibles</option>
        <?php endif; ?>
    </select><br>

    <label for="nuevo_estado">Ingrese el estado (1 para activo, 0 para inactivo):</label><br>
    <input type="number" id="nuevo_estado" name="nuevo_estado" min="0" max="1" required><br>

    <input type="submit" value="Actualizar Datos">
</form>

</body>
</html>