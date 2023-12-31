<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar VPH</title>
    <link rel="icon" href="img/icono.png"> 
    <link rel="stylesheet" href="css/editar.css">
</head>
<body>
    <center>
    <?php
        include("nav_admin.html");
        include("db/conexion.php");

        if (isset($_GET['id'])) {
            $id_paciente = $_GET['id'];

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Obtén los datos del formulario
                $estado = $_POST['estado'];
                $fecha = $_POST['fecha'];
                $observacion = $_POST['observacion'];

                // Actualiza los datos en la base de datos
                $query = "UPDATE vph SET estado='$estado', fecha='$fecha', observacion='$observacion' WHERE id_paciente=$id_paciente";

                if ($conex->query($query)) {
                    header("Location: vph.php?id=$id_paciente");
                    exit();
                } else {
                    echo "Error al actualizar los datos de VPH: " . $conex->error;
                }
            }

            // Consulta para obtener los datos actuales de VPH
            $query_vph = "SELECT estado, fecha, observacion FROM vph WHERE id_paciente = $id_paciente";
            $resultado_vph = $conex->query($query_vph);

            if (!$resultado_vph) {
                die("Error en la consulta: " . $conex->error);
            }

            if ($fila_vph = $resultado_vph->fetch_assoc()) {
    ?>
                <h1>Editar Datos VPH</h1>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . "?id=$id_paciente"; ?>">
                    <label for="estado">Estado:</label>
                    <select name="estado" id="estado">
                        <option value="Positivo" <?php if ($fila_vph['estado'] == 'Positivo') echo 'selected'; ?>>Positivo</option>
                        <option value="Negativo" <?php if ($fila_vph['estado'] == 'Negativo') echo 'selected'; ?>>Negativo</option>
                    </select><br>
                    <label for="fecha">Fecha:</label>
                    <input type="date" name="fecha" id="fecha" value="<?php echo $fila_vph['fecha']; ?>" required><br>
                    <label for="observacion">Observación:</label>
                    <textarea name="observacion" id="observacion" required><?php echo $fila_vph['observacion']; ?></textarea><br>
                    <button type="submit">Guardar Cambios</button>
                </form>
    <?php
            } else {
                echo "No se encontraron datos de VPH para el paciente con ID $id_paciente.";
            }

            $conex->close();
        } else {
            echo "No se ha especificado un ID de paciente.";
        }
    ?>
    </center>
</body>
</html>
