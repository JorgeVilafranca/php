<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Declaración de constantes</title>
</head>
<body>
<?php
    // El nombre de las constantes en mayusculas, son de ambito global, el tercer parametro es un booleano ara permitir casi_sensitive con el nombre de la constante
    define("AUTOR", "Jorge");

    echo "<p>El autor es: " . AUTOR . "</p>";

    // stas son las llamadas constantes magicas
    echo "<p>La línea de esta instrucción es " . __LINE__ . "</p>";
    echo "<p>Estamos trabajando con este fichero " . __FILE__ . "</p>";
?>
</body>
</html>