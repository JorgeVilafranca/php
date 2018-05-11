<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Strings</title>
    <style>
        .resaltar {
            color: #F00;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php
    $nombre = "Jorge";

    // puedes poner comillas simples o \"
    echo "<p class='resaltar'>Esto es un ejemplo de frase</p>";
    echo "<p>Hola $nombre</p>";

    $variable1 = "Casa";
    $variable2 = "CASA";

    // existe para comparar strings strcmp y strcasecmp
    $resultado = strcmp($variable1, $variable2); // devuelve 1 si no son iguales y 0 si son iguales
    echo "<p>El resultado es $resultado</p>";
    $resultado = strcasecmp($variable1, $variable2);
    echo "<p>El resultado es $resultado</p>";

    if ($resultado) {
        echo "<p>No coinciden</p>";
    } else {
        echo "<p>Coinciden</p>";
    }
?>
</body>
</html>