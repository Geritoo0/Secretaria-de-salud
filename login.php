<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="img/logo.png">
    <title>Log In || Secretaría Salud</title>
</head>
<body>
    <br>
    <center>
        <form action="datos.php" method="POST" class="form_login">
            <br>
            <!-- <img src="img/secretariasalud.png"> -->
            <h2>Inicie Sesion</h2>
            <label>Usuario</label><br>
            <input type="text" name="user" id="user" required placeholder="Usuario" autofocus><br>
            <label>Contraseña</label><br>
            <input type="password" name="pass" id="pass" required placeholder="Contraseña" min="4"><br>
            <button type="submit" name="enviar">Ingresar</button>
        </form>
    </center>
</body>
</html>