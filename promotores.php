<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/promotores.css">
    <title>Promotores || Secretaría De Salud</title>
    <link rel="icon" href="img/icono.png">
</head>
<body>
    <?php 
        include("db/conexion.php");
        include ("nav_admin.html");
    ?>
    <h1>Tabla De Promotores</h1>
    <center>
    <a href="registrar_promotor.php">Registrar Nuevo</a>
    </center><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Acciones</th>
        </tr>
        <?php
        $query = "SELECT id_usuario, nombre, apellido, usuario, password FROM usuario";
        $resultado = $conex->query($query);

        if (!$resultado) {
            die("Error en la consulta: " . $conex->error);
        }

        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['id_usuario'] . "</td>";
            echo "<td>" . $fila['nombre'] . "</td>";
            echo "<td>" . $fila['apellido'] . "</td>";
            echo "<td>" . $fila['usuario'] . "</td>";
            echo "<td>" . $fila['password'] . "</td>";
            echo "<td><a href='#'>Editar</a><br>
            <a href='#'>Eliminar</a></td>";
            echo "</tr>";
        }
        $conex->close();
        ?>
    </table>
</body>
</html>