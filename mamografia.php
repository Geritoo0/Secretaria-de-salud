<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mamografia || Secretaría Salud</title>
    <link rel="icon" href="img/icono.png"> 
    <link rel="stylesheet" href="css/ver.css">
</head>
<body>
    <?php
        include("nav_admin.html");
        echo "<center>";
        echo "<h1>Mamografia</h1>";
        echo "</center>";
        include("db/conexion.php");

        if (isset($_GET['id'])) {
            $id_paciente = $_GET['id'];
            
            $query_paciente = "SELECT id_paciente, nombre, apellido, dni FROM pacientes WHERE id_paciente = $id_paciente";
            $resultado_paciente = $conex->query($query_paciente);
            
            $query_mamografia = "SELECT turno, observacion FROM mamografia WHERE id_paciente = $id_paciente";
            $resultado_mamografia = $conex->query($query_mamografia);

            if (!$resultado_paciente || !$resultado_mamografia) {
                die("Error en la consulta: " . $conex->error);
            }

            if ($fila_paciente = $resultado_paciente->fetch_assoc()) {
                echo "<table border=1>";
                echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido</th>";
                echo "<th>DNI</th>";
                echo "<th>Turno</th>";
                echo "<th>Observacion</th>";
                echo "<th>Acciones</th>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . $fila_paciente['id_paciente'] . "</td>";
                echo "<td>" . $fila_paciente['nombre'] . "</td>";
                echo "<td>" . $fila_paciente['apellido'] . "</td>";
                echo "<td>" . $fila_paciente['dni'] . "</td>";
                
                if ($fila_mamografia = $resultado_mamografia->fetch_assoc()) {
                    echo "<td>" . $fila_mamografia['turno'] . "</td>";
                    echo "<td>" . $fila_mamografia['observacion'] . "</td>";
                } else {
                    
                    echo "<td>Sin resultado</td>";
                    echo "<td>Sin datos</td>";
                }
                echo "<td>
                <a href='cargar_mam.php?id=" . $fila_paciente['id_paciente'] . "' class='editar'>Cargar</a><br>
                <a href='editar_mam.php?id=" . $fila_paciente['id_paciente'] . "'class='editar'>Editar</a><br>
                </td>";
                echo "</tr>";
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

