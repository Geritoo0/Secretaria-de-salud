<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Sífilis</title>
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

            // Consulta para obtener los datos actuales de sífilis
            $query_sifilis = "SELECT sifilis, observacion, derivacion FROM sifilis WHERE id_paciente = $id_paciente";
            $resultado_sifilis = $conex->query($query_sifilis);

            if (!$resultado_sifilis) {
                die("Error en la consulta: " . $conex->error);
            }

            if ($fila_sifilis = $resultado_sifilis->fetch_assoc()) {
    ?>
                <h1>Editar Datos SIFILIS</h1>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . "?id=$id_paciente"; ?>">
                    <input type="hidden" name="id_paciente" value="<?php echo $id_paciente; ?>">
                    <label for="sifilis">Sífilis:</label>
                    <select name="sifilis" id="sifilis">
                        <option value="Positivo" <?php if ($fila_sifilis['sifilis'] == 'Positivo') echo 'selected'; ?>>Positivo</option>
                        <option value="Negativo" <?php if ($fila_sifilis['sifilis'] == 'Negativo') echo 'selected'; ?>>Negativo</option>
                    </select><br>
                    <label for="observacion">Observación:</label>
                    <textarea name="observacion" id="observacion"><?php echo $fila_sifilis['observacion']; ?></textarea><br>
                    <label for="derivacion">Derivación:</label>
                    <select name="derivacion" id="derivacion">
                        <option value="Si" <?php if ($fila_sifilis['derivacion'] == 'Si') echo 'selected'; ?>>Si</option>
                        <option value="No" <?php if ($fila_sifilis['derivacion'] == 'No') echo 'selected'; ?>>No</option>
                    </select><br>
                    <button type="submit">Guardar Cambios</button>
                </form>
    <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $sifilis = $_POST['sifilis'];
                    $observacion = $_POST['observacion'];
                    $derivacion = $_POST['derivacion'];

                    $query = "UPDATE sifilis SET sifilis='$sifilis', observacion='$observacion', derivacion='$derivacion' WHERE id_paciente=$id_paciente";

                    if ($conex->query($query)) {
                        header("Location: sifilis.php?id=$id_paciente");
                        exit();
                    } else {
                        echo "Error al actualizar los datos de Sífilis: " . $conex->error;
                    }
                }

                $conex->close();
            } else {
                echo "No se encontraron datos de Sífilis para el paciente con ID $id_paciente.";
            }
        } else {
            echo "No se ha especificado un ID de paciente.";
        }
    ?>
    </center>
</body>
</html>
