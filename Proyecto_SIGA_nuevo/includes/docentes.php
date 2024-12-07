<?php require_once __DIR__ . '/../crud/conexion.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php
$sql= "SELECT ID_Docente, Nombre_Docente, Apellido_Docente FROM Docente INNER JOIN Usuario ON Docente.ID_Usuario = Usuario.ID_Usuario WHERE Usuario.Estado=1";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$docentes=$stmt->fetchAll();
?>



<div class="container mt-4">
<h1 class="text-center mb-4">Docentes Registrados en la Base de Datos </h1>

<div class="text-end mb-3">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addDocenteModal">Agregar Docente</button>
    </div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID_Docente</th>
            <th>Nombre_Docente</th>
            <th>Apellido</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    <?php
    if ($docentes){
        foreach($docentes as $row){
            echo "<tr>
                <td>". $row["ID_Docente"] . "</td>
                <td>". $row["Nombre_Docente"] . "</td>
                <td>". $row["Apellido_Docente"] . "</td>
                <td>
                    <button class='btn btn-primary' 
                        data-bs-toggle='modal' 
                        data-bs-target='#editarModal' 
                        data-id='" . $row['ID_Docente'] . "' 
                        data-nombre='" . $row['Nombre_Docente'] . "' 
                        data-apellido='" . $row['Apellido_Docente'] . "'>
                        Editar
                    </button>
                    <button class='btn btn-danger'
                    data-bs-toggle='modal'
                    data-bs-target='#desactivarModal'
                    data-id='".$row['ID_Docente']."'
                    data-nombre='" .$row['Nombre_Docente'] ."'
                    data-apellido='". $row['Apellido_Docente'] ."'> 
                    Eliminar</button>
                </td>
            </tr>";
        }
    }else{
        echo "<tr><td colspan='4'> No se encontraron docentes activos.</td></tr>";
    }
    ?>
</tbody>

<div class="modal fade" id="addDocenteModal" tabindex="-1" aria-labelledby="addDocenteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../crud/crear_docente.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDocenteModalLabel">Agregar Nuevo Docente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombreDocente" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombreDocente" name="nombreDocente" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellidoDocente" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellidoDocente" name="apellidoDocente" required>
                    </div>
                    <div class="mb-3">
                        <label for="correoDocente" class="form-label">Correo</label>
                        <input type="text" class="form-control" id="correoDocente" name="correoDocente" required>
                    </div>
                    <div class="mb-3">
                        <label for="contrasenaDocente" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="contrasenaDocente" name="contrasenaDocente" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para Editar Docente -->
<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="crud/editar_docente.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel">Editar Docente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="editar-id">
                    <div class="mb-3">
                        <label for="editar-nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="editar-nombre" id="editar-nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="editar-apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="editar-apellido" id="editar-apellido" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para cambiar el estado de un docente -->
<div class="modal fade" id="desactivarModal" tabindex="-1" aria-labelledby="desactivarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="crud/desactivar_docente.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="desactivarModalLabel">Eliminar Docente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="desactivar-id">
                    <p>¿Estás seguro de que deseas eliminar este docente?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>

<script>
    var editarModal = document.getElementById('editarModal');
    editarModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Botón que abrió el modal
        var id = button.getAttribute('data-id');
        var nombre = button.getAttribute('data-nombre');
        var apellido = button.getAttribute('data-apellido');

        // Pasar los datos al formulario
        document.getElementById('editar-id').value = id;
        document.getElementById('editar-nombre').value = nombre;
        document.getElementById('editar-apellido').value = apellido;
    });
</script>

<script>
var desactivarModal = document.getElementById('desactivarModal');
desactivarModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget; // Botón que abrió el modal
    var id = button.getAttribute('data-id');
    var nombre = button.getAttribute('data-nombre');
    var apellido = button.getAttribute('data-apellido');

    // Pasar los datos al formulario
    document.getElementById('desactivar-id').value = id;
    document.getElementById('desactivar-nombre').value = nombre;
    document.getElementById('desactivar-apellido').value = apellido;
    });
</script>


</body>
</html>
