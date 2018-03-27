<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Operadores comparación</title>
</head>
<body>
<?php
    $variable1 = 8;
    $variable2 = "8";
    $variable3 = "Jorge";

    echo "<p>vb1 = 8<br>vb2 = '8'<br>vb3 = 'Jorge'</p>";

    echo "<p>vb1 == vb2 => ";
    if ($variable1 == $variable2) {
        echo "is true</p>";
    } else {
        echo "is false</p>";
    }
    echo "<p>vb1 == vb3 => ";
    if ($variable1 == $variable3) {
        echo "is true</p>";
    } else {
        echo "is false</p>";
    }
    echo "<p>vb1 === vb2 => ";
    if ($variable1 === $variable2) {
        echo "is true</p>";
    } else {
        echo "is false</p>";
    }
    echo "<p>vb1 != vb3 => ";
    if ($variable1 != $variable3) {
        echo "is true</p>";
    } else {
        echo "is false</p>";
    }
?>
</body>
</html>