<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Datos SIFILIS</title>
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
                $vih = $_POST['sifilis'];
                $derivacion = $_POST['derivacion'];
                $observacion = $_POST['observacion'];

                $query = "INSERT INTO sifilis (id_paciente, sifilis, observacion, derivacion) VALUES ('$id_paciente', '$vih', '$observacion', '$derivacion')";

                if ($conex->query($query)) {
                    header("Location: sifilis.php?id=$id_paciente");
                    exit();
                } else {
                    echo "Error al cargar los datos de VPH: " . $conex->error;
                }
            }

    ?>
            <h1>Cargar Datos SIFILIS</h1>
            <form method='POST' action='<?php echo $_SERVER['PHP_SELF'] . "?id=$id_paciente"; ?>'>
                <input type='hidden' name='id_paciente' value='<?php echo $id_paciente; ?>'>
                <label for='estado'>SIFILIS:</label>
                <select name='sifilis'>
                    <option value='Positivo'>Positivo</option>
                    <option value='Negativo'>Negativo</option>
                </select><br>
                <label for='observacion'>Observación:</label>
                <textarea name='observacion' id='observacion'></textarea><br>
                <label for='derivacion'>Derivación:</label>
                <select name='derivacion'>
                    <option value='Si'>Si</option>
                    <option value='No'>No</option>
                </select><br>
                <button type='submit'>Cargar Datos</button>
            </form>
    <?php
            $conex->close();
        } else {
            echo "No se ha especificado un ID de paciente.";
        }
    ?>
    </center>
</body>
</html>
