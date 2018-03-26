<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ambitos de variables</title>
</head>
<body>
<?php
    $nombre = "Jorge";

    function dameNombre() {
        global $nombre; // convierte la variable en global
        $nombre = "El nombre es " . $nombre;
    }

    dameNombre();
    echo $nombre;
?>
</body>
</html>