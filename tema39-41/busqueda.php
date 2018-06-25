<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Busqueda</title>
    <style>
        table {
            width: 50%;
            border: 1px dotted #FF0000;
            margin: auto;
        }
    </style>
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

    // Obtener el parametro de GET
    $busqueda=$_GET["buscar"];

    //$consulta="SELECT * FROM productos WHERE NOMBREARTÍCULO='$busqueda'";
    $consulta="SELECT * FROM productos WHERE NOMBREARTÍCULO LIKE '%$busqueda%'";
    $resultados=mysqli_query($conexion, $consulta);
?>
    <table>
        <thead>
            <tr>
                <th>Código Artículo</th>
                <th>Sección</th>
                <th>Nombre artículo</th>
                <th>Precio</th>
                <th>Fecha</th>
                <th>Importado</th>
                <th>País origen</th>
            </tr>
        </thead>
    <tbody>
        
<?php
    while ($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)) {
        echo "<tr>";
        echo "<td>".$fila["CÓDIGOARTÍCULO"]."</td>";
        echo "<td>".$fila["SECCIÓN"]."</td>";
        echo "<td>".$fila["NOMBREARTÍCULO"]."</td>";
        echo "<td>".$fila["PRECIO"]."</td>";
        echo "<td>".$fila["FECHA"]."</td>";
        echo "<td>".$fila["IMPORTADO"]."</td>";
        echo "<td>".$fila["PAÍSDEORIGEN"]."</td>";
        echo "</tr>";
    }

    mysqli_close($conexion);

?>
        </tbody>
    </table>
</body>
</html>