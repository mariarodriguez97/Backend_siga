<?php
require __DIR__ . '/../crud/conexion.php';

$sql = "SELECT d.ID_Docente, d.Nombre_Docente, d.Apellido_Docente, u.ID_Usuario, u.Correo
        FROM Docente d 
        INNER JOIN Usuario u ON d.ID_Usuario = u.ID_Usuario";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$docentes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-4">
<h1 class="text-center mb-4">Docentes Registrados en la Base de Datos </h1>

<div class="text-end mb-3">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearModal">Agregar Docente</button>
    </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($docentes as $docente): ?>
                    <tr>
                        <td><?= $docente['ID_Docente'] ?></td>
                        <td><?= $docente['Nombre_Docente'] ?></td>
                        <td><?= $docente['Apellido_Docente'] ?></td>
                        <td><?= $docente['Correo'] ?></td>
                        <td>
                            <button class="btn btn-primary" 
                                data-bs-toggle="modal" 
                                data-bs-target="#editarModal" 
                                data-id="<?= $docente['ID_Docente'] ?>" 
                                data-nombre="<?= $docente['Nombre_Docente'] ?>" 
                                data-apellido="<?= $docente['Apellido_Docente'] ?>" 
                                data-correo="<?= $docente['Correo'] ?>"
                                data-usuario="<?= $docente['ID_Usuario'] ?>">
                                Editar
                            </button>
                            <button class="btn btn-danger" 
                                data-bs-toggle="modal" 
                                data-bs-target="#desactivarModal" 
                                data-id="<?= $docente['ID_Docente'] ?>" 
                                data-nombre="<?= $docente['Nombre_Docente'] ?>" 
                                data-apellido="<?= $docente['Apellido_Docente'] ?>">
                                Desactivar
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

        <!-- Modal de Creación -->
        <div class="modal fade" id="crearModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Docente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="/Siga2823506/Proyecto_Siga/crud/crear_docente.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label>Apellido</label>
                            <input type="text" class="form-control" name="apellido" required>
                        </div>
                        <div class="mb-3">
                            <label>Correo</label>
                            <input type="email" class="form-control" name="correo" required>
                        </div>
                        <div class="mb-3">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" name="contrasena" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de Edición -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Docente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="/Siga2823506/Proyecto_Siga/crud/editar_docente.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" id="editar-id" name="editar-id">
                        <input type="hidden" id="editar-usuario" name="editar-usuario">

                        <div class="mb-3">
                            <label>Nombre</label>
                            <input type="text" class="form-control" id="editar-nombre" name="editar-nombre" required>
                        </div>

                        <div class="mb-3">
                            <label>Apellido</label>
                            <input type="text" class="form-control" id="editar-apellido" name="editar-apellido" required>
                        </div>

                        <div class="mb-3">
                            <label>Correo</label>
                            <input type="email" class="form-control" id="editar-correo" name="editar-correo" required>
                        </div>

                        <div class="mb-3">
                            <label>Nueva Contraseña (Opcional)</label>
                            <input type="password" class="form-control" id="editar-password" name="editar-password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de Desactivación -->
    <div class="modal fade" id="desactivarModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Desactivar Docente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="/Siga2823506/Proyecto_Siga/crud/desactivar_docente.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" id="desactivar-id" name="id">
                        <p>¿Seguro que deseas desactivar a <b id="desactivar-nombre-completo"></b>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Desactivar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
var editarModal = document.getElementById('editarModal');
if (editarModal) {
    editarModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        document.getElementById('editar-id').value = button.getAttribute('data-id');
        document.getElementById('editar-usuario').value = button.getAttribute('data-usuario');
        document.getElementById('editar-nombre').value = button.getAttribute('data-nombre');
        document.getElementById('editar-apellido').value = button.getAttribute('data-apellido');
        document.getElementById('editar-correo').value = button.getAttribute('data-correo');
    });
}

var desactivarModal = document.getElementById('desactivarModal');
if (desactivarModal) { // Verifica que el modal exista antes de asignarle el evento
    desactivarModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        if (!button) return; // Evita errores si no hay botón de activación
        
        var nombre = button.getAttribute('data-nombre') || '';
        var apellido = button.getAttribute('data-apellido') || '';
        var id = button.getAttribute('data-id') || '';

        // Asignar valores al modal
        document.getElementById('desactivar-id').value = id;
        document.getElementById('desactivar-nombre-completo').innerText = nombre + ' ' + apellido;
    });
}
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>