<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Primera pagina PHP</title>
</head>
<body>
<?php
    // Escribimos un texto con print
    print "<p>Bienvenidos al curso de PHP <br>";
    print "Hola a todos <br>";
    print "Hasta la próxima</p>";

    $nombre = "Jorge";
    $edad = 35;

    // Se concatena con . no es igual poner una cadena de texto con comillas dobles que con comillas simples
    print "<p>El nombre de usuario es $nombre</p>";
    print '<p>El nombre de usuario es $nombre</p>';

    /*
        print es una funcion y echo una expresion, por lo que para que no evalue se usa mas echo para imprimir por pantalla,
        ademas echo deja pasar las variables como parametros
    */
    echo $nombre,$edad;

    /*
        con include si el archivo falta dara error pero seguira ejecutando el codigo
        require ademas del error no ejecutara mas codigo
    */
    include ("./funciones.php");
    
    dameDatos();
?>
</body>
</html>