<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio || Secretaria De Salud</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="img/icono.png">
</head>
<body>
    <?php
        include("nav_admin.html");
    ?>
    <h1>Tabla de Pacientes</h1>

    <!-- Formulario de filtro por DNI -->
    
    <form method="GET">
        <label for="filtroDNI">Filtrar por DNI:</label>
        <input type="text" name="filtroDNI" id="filtroDNI">
        <button type="submit"><img src="img/busqueda.png" alt="lupa" class="lupa"></button><br><br>
    </form>
    

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Género</th>
            <th>Fecha Nacimiento</th>
            <th>Correo Electrónico</th>
            <th>Localidad</th>
            <th>Domicilio</th>
            <th>Obra Social</th>
            <th>Peso</th>
            <th>Talla</th>
            <th>Promotor</th>
            <th>VPH</th>
            <th>Mamografia</th>
            <th>TSOMF</th>
            <th>VIH</th>
            <th>SIFILIS</th>
            <th>Presión</th>
            <th>Glucemia</th>
            <th>Acciones</th>
        </tr>
        <?php
        include("db/conexion.php");

        // Verificar si se ha enviado un filtro por DNI
        if (isset($_GET['filtroDNI'])) {
            $filtroDNI = $_GET['filtroDNI'];
            $query = "SELECT id_paciente, nombre, apellido, genero, fecha_nacimiento, dni, correo_electronico, localidad,
            domicilio, obra_social, peso, talla, promotor FROM pacientes WHERE dni LIKE '%$filtroDNI%'";
        } else {
            $query = "SELECT id_paciente, nombre, apellido, genero, fecha_nacimiento, dni, correo_electronico, localidad,
            domicilio, obra_social, peso, talla, promotor FROM pacientes";
        }

        $resultado = $conex->query($query);

        if (!$resultado) {
            die("Error en la consulta: " . $conex->error);
        }

        // Iterar a través de los resultados y mostrar cada fila en la tabla
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['id_paciente'] . "</td>";
            echo "<td>" . $fila['nombre'] . "</td>";
            echo "<td>" . $fila['apellido'] . "</td>";
            echo "<td>" . $fila['dni'] . "</td>";
            echo "<td>" . $fila['genero'] . "</td>";
            echo "<td>" . $fila['fecha_nacimiento'] . "</td>";
            echo "<td>" . $fila['correo_electronico'] . "</td>";
            echo "<td>" . $fila['localidad'] . "</td>";
            echo "<td>" . $fila['domicilio'] . "</td>";
            echo "<td>" . $fila['obra_social'] . "</td>";
            echo "<td>" . $fila['peso'] . "</td>";
            echo "<td>" . $fila['talla'] . "</td>";
            echo "<td>" . $fila['promotor'] . "</td>";
            echo "<td><a href='vph.php?id=" . $fila['id_paciente'] . "' class='ver'>Ver</a></td>";
            echo "<td><a href='mamografia.php?id=" . $fila['id_paciente'] . "' class='ver'>Ver</a></td>";
            echo "<td><a href='sangre_oculta.php?id=" . $fila['id_paciente'] . "' class='ver'>Ver</a></td>";
            echo "<td><a href='vih.php?id=" . $fila['id_paciente'] . "' class='ver'>Ver</a></td>";
            echo "<td><a href='sifilis.php?id=" . $fila['id_paciente'] . "' class='ver'>Ver</a></td>";
            echo "<td><a href='presion.php?id=" . $fila['id_paciente'] . "' class='ver'>Ver</a></td>";
            echo "<td><a href='glucemia.php?id=" . $fila['id_paciente'] . "' class='ver'>Ver</a></td>";?>
            <td>
                <a href='editar_paciente.php?id=<?php echo $fila['id_paciente']; ?>' class='editar'>Editar</a><br>
                <a href='eliminar_pacientes.php?id=<?php echo $fila['id_paciente']; ?>' onclick='return confirm("¿Estás seguro de que deseas eliminar este paciente?")' class='eliminar'>Eliminar</a>
            </td>
            </tr>
        <?php 
        } 
        $conex->close();
        ?>
    </table>
</body>
</html>
