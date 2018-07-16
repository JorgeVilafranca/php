<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conexión con POO</title>
</head>
<body>
<?php

    require("..\datos_conexion.php");

    $conexion= new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conexion->connect_errno) {
        echo "<p>Falló la conexión ".$conexion->connect_errno."</p>";
    }
    $conexion->set_charset("utf8");

    $sql="SELECT * FROM productos";
    $resultados=$conexion->query($sql);

    if ($conexion->errno) {
        die($conexion->error);
    }
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
    while ($fila=$resultados->fetch_assoc()) {
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

        $conexion->close();

?>
        </tbody>
    </table>
</body>
</html>