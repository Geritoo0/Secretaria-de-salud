<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mamografia</title>
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
                $turno = $_POST['turno'];
                $observacion = $_POST['observacion'];

                $query = "UPDATE mamografia SET turno='$turno', observacion ='$observacion' WHERE id_paciente=$id_paciente";

                if ($conex->query($query)) {
                    header("Location: mamografia.php?id=$id_paciente");
                    exit();
                } else {
                    echo "Error al actualizar los datos de VPH: " . $conex->error;
                }
            }

            $query_vph = "SELECT observacion, turno FROM mamografia WHERE id_paciente = $id_paciente";
            $resultado_vph = $conex->query($query_vph);

            if (!$resultado_vph) {
                die("Error en la consulta: " . $conex->error);
            }

            if ($fila_vph = $resultado_vph->fetch_assoc()) {
    ?>
                <h1>Editar Datos Mamografía</h1>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . "?id=$id_paciente"; ?>">
                    <label for="turno">Turno:</label>
                    <select name="turno" id="turno">
                        <option value="Si" <?php if ($fila_vph['turno'] == 'Si') echo 'selected'; ?>>Si</option>
                        <option value="No" <?php if ($fila_vph['turno'] == 'No') echo 'selected'; ?>>No</option>
                    </select><br>
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