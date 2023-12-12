<?php
$usuario = $_POST['user'];
$password = $_POST['pass'];
session_start();
$_SESSION['usuario'] = $usuario;
$conexion = new mysqli('localhost', 'root', '', 'secretaria_salud');

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta preparada
$consulta = "SELECT * FROM usuario WHERE usuario=? AND password=?";
$stmt = $conexion->prepare($consulta);
$stmt->bind_param("ss", $usuario, $password);
$stmt->execute();
$resultado = $stmt->get_result();
$filas = $resultado->num_rows;

if ($fila = $resultado->fetch_assoc()) {
    if ($fila['id_cargo'] == 2) {
        header("Location: promotor/index.php");
        exit();
    } elseif ($fila['id_cargo'] == 1) {
        header("Location: index.php");
        exit();
    } else {
        header("Location: login.php");
        exit();
    }
}

// Cierra la conexión
$stmt->close();
$conexion->close();
?>