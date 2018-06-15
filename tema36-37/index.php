<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conexion BBDD</title>
</head>
<body>
<?php

    require("datos_conexion.php");

    $conexion=mysqli_connect($db_host, $db_user, $db_pass);
    // Si habido un error en la conexion
    if (mysqli_connect_errno()) {
        echo "Fallo al conectar con la base de datos";
        exit();
    }

    mysqli_select_db($conexion, $db_name) or die ("No se encuentra la base de datos");
    mysqli_set_charset($conexion, "utf8");

    $consulta="SELECT * FROM datospersonales";
    $resultados=mysqli_query($conexion, $consulta);
    
    while ($fila=mysqli_fetch_row($resultados)) {
        echo $fila[0]." ";
        echo $fila[1]." ";
        echo $fila[2]." ";
        echo $fila[3]." ";
        echo "<br>";
    }

    mysqli_close($conexion);

?>
</body>
</html>