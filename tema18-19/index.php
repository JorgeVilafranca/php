<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bucles</title>
</head>
<body>
<?php

    $var1 = 1;

    while ($var1 < 6) {
        echo "<p>Estamos ejecutando el código del bucle while</p>";
        $var1++;
    }
    echo "<p>Hemos salido del bucle while</p>";

    $var1 = 1;
    do {
        echo "<p>Estamos ejecutando el código del bucle do-while</p>";
        $var1++;
    } while ($var1 < 6);
    echo "<p>Hemos salido del bucle do-while</p>";

    for ($i=0; $i<=20;$i+=2) {
        echo "<p>Estamos ejecutando el código del bucle for</p>";
        if ($i==6) {
            echo "<p>Bucle interrumpido</p>";
            break;
        }
    }
    echo "<p>Hemos salido del bucle for</p>";

?>
</body>
</html>