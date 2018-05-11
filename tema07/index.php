<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Variables estáticas</title>
</head>
<body>
<?php
    function incrementaVariable() {
        static $contador = 0; // solo se ejecuta la primera vez que se ejecuta la variable y su valor se conserva
        $contador++;
        echo $contador . "<br>";
    }

    incrementaVariable();
    incrementaVariable();
    incrementaVariable();
    incrementaVariable();
?>
</body>
</html>