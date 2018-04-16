<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Condicionales</title>
</head>
<body>
<?php

    $var1 = true;
    $var2 = false;
    $resultado = $var1 && $var2;

    if ($resultado) {
        echo "<p>Correcto</p>";
    } else {
        echo "<p>Incorrecto</p>";
    }

    // Orden de prioridad && = and
    // $resultado = $var1 lo de detras del and es como si no lo evaluara
    $resultado = $var1 and $var2;

    if ($resultado) {
        echo "<p>Correcto</p>";
    } else {
        echo "<p>Incorrecto</p>";
    }

?>

    <form action="validacion.php" method="post" name="datos_usuario" id="datos_usuario">
        <table width="15%" align="center">
            <tr>
                <td>Nombre:</td>
                <td>
                    <label for="nombre_usuario"></label>
                    <input type="text" name="nombre_usuario" id="nombre_usuario">
                </td>
            </tr>
            <!-- <tr>
                <td>Edad:</td>
                <td>
                    <label for="edad_usuario"></label>
                    <input type="text" name="edad_usuario" id="edad_usuario">
                </td>
            </tr> -->
            <tr>
                <td>Contraseña:</td>
                <td>
                    <label for="pass_usuario"></label>
                    <input type="password" name="pass_usuario" id="pass_usuario">
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="enviando" id="enviando" value="Enviar">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>