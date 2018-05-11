<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Funciones matemáticas y casting</title>
</head>
<body>
<?php
    $num1 = rand();
    echo "<p>El número es: $num1</p>";

    $num1 = rand(10, 50); // numero entre 10 y 50
    echo "<p>El número es: $num1</p>";

    $num1 = pow(5, 3); // 5 elevado a 3
    echo "<p>El número es: $num1</p>";

    $num1 = 5.25;
    echo "<p>El número es: " . round($num1) . " " . round($num1, 1) . " " . round($num1, 3) . "</p>";

    // Casting implicito es el que hace php para evaluar de que tipo es el valor que introduces en una ariable
    // Casting explicito es el que se hace manualmente para pasar una variable de un tipo a otro
    $cast = "5";
    $num1 = (int) $cast;
    echo "<p>El número es: $num1</p>";

?>
</body>
</html>