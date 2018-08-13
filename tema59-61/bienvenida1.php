<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title>
</head>
<body>
<?php

    // Miramos la sesion
    session_start();
    if(!isset($_SESSION["user"])) {
        header("location:index.php");
    }

?>
    <h1>Bienvenidos Usuarios</h1>
    <p><a href="unlogin.php">Cierra sesion</a></p>
    <h6>¡Hola, <?php echo $_SESSION["user"] ?>!</h6>
    <p>Esto es información sólo para usuarios registrados</p>
    <table>
        <tr>
            <td colspan="3">Zona usuarios Registrados</td>
        </tr>
        <tr>
            <td><a href="bienvenida2.php">Página 2</a></td>
            <td><a href="bienvenida3.php">Página 3</a></td>
            <td><a href="bienvenida4.php">Página 4</a></td>
        </tr>
    </table>
</body>
</html>