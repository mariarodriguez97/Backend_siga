<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Docente</title>
</head>
<body>
    
<h1>Actualización de Datos Docente</h1>

<form action="Ejecutar.php" method="POST">
<input type="hidden" name="accion" value="editar">

<label for="id_docente">Ingrese el ID del pinche Docente del cual desea actualizar los datos:</label><br>
<input type="number" id="id_docente" name="id_docente" required><br>

<label for="id_docente">Ingrese el nuevo Nombre para el Docente seleccionado:</label><br>
<input type="text" id="nombre" name="nombre" required><br>

<label for="id_docente">Ingrese el nuevo Apellido para el Docente seleccionado:</label><br>
<input type="text" id="apellido" name="apellido" required><br><br>

<input type="submit" value="Actualizar Datos">


</form>

</body>
</html>
