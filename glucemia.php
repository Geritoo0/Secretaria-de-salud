<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glucemia || Secretaría Salud</title>
    <link rel="icon" href="img/icono.png"> 
    <link rel="stylesheet" href="css/ver.css">
</head>
<body>
<?php
include("nav_admin.html");
echo "<center>";
echo "<h1>Presión</h1>";

if (isset($_GET['id'])) {
    $id_paciente = $_GET['id'];
    echo "<a href='cargar_glu.php?id=" . $id_paciente . "'>Registrar Nueva Medición</a>";
    include("db/conexion.php");

    // Consulta para obtener información del paciente
    $query_paciente = "SELECT id_paciente, nombre, apellido, dni FROM pacientes WHERE id_paciente = $id_paciente";
    $resultado_paciente = $conex->query($query_paciente);

    // Consulta para obtener registros de presión relacionados con el paciente
    $query_presion = "SELECT sede, localidad, estado, derivacion, observacion, fecha FROM glucemia WHERE id_paciente = $id_paciente";
    $resultado_presion = $conex->query($query_presion);

    if (!$resultado_paciente || !$resultado_presion) {
        die("Error en la consulta: " . $conex->error);
    }

    if ($fila_paciente = $resultado_paciente->fetch_assoc()) {
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Nombre</th>";
        echo "<th>Apellido</th>";
        echo "<th>DNI</th>";
        echo "<th>Sede</th>";
        echo "<th>Localidad</th>";
        echo "<th>Estado</th>";
        echo "<th>Derivación</th>";
        echo "<th>Observación</th>";
        echo "<th>Fecha</th>";
        echo "</tr>";

        // Utiliza un bucle while para recorrer las filas de presión
        while ($fila_presion = $resultado_presion->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila_paciente['id_paciente'] . "</td>";
            echo "<td>" . $fila_paciente['nombre'] . "</td>";
            echo "<td>" . $fila_paciente['apellido'] . "</td>";
            echo "<td>" . $fila_paciente['dni'] . "</td>";
            echo "<td>" . $fila_presion['sede'] . "</td>";
            echo "<td>" . $fila_presion['localidad'] . "</td>";
            echo "<td>" . $fila_presion['estado'] . "</td>";
            echo "<td>" . $fila_presion['derivacion'] . "</td>";
            echo "<td>" . $fila_presion['observacion'] . "</td>";
            echo "<td>" . $fila_presion['fecha'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron datos para el paciente con ID $id_paciente.";
    }

    $conex->close();
} else {
    echo "No se ha especificado un ID de paciente.";
}
?>
</body>
</html>

