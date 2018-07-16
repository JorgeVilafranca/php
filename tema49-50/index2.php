<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultas preparadas</title>
    <style>
        table {
            width: 50%;
            border: 1px dotted #FF0000;
            margin: auto;
        }
    </style>
</head>
<body>
<?php $miPag=$_SERVER["PHP_SELF"]; ?>
<form action="<?php echo $miPag; ?>" method="GET">
    <label for="pais">Introduce País: </label></td>
    <input type="text" name="pais">
    <input type="submit" value="Buscar">
</form>
<?php

    /*
        PASOS A SEGUIR

        - SQL
        - Preparar
        - Unir parametros
        - Ejecutar SQL
        - Asociar variables
        - Leer resultados
    */
    $pais=isset($_GET["pais"]) ? $_GET["pais"] : NULL;
    
    if (is_null($pais)) { exit(); }

    require("..\datos_conexion.php");

    $conexion=mysqli_connect($db_host, $db_user, $db_pass);
    // Si habido un error en la conexion
    if (mysqli_connect_errno()) {
        echo "Fallo al conectar con la base de datos";
        exit();
    }

    mysqli_select_db($conexion, $db_name) or die ("No se encuentra la base de datos");
    mysqli_set_charset($conexion, "utf8");

    // Paso 1
    $sql="SELECT CÓDIGOARTÍCULO, NOMBREARTÍCULO, PRECIO, PAÍSDEORIGEN FROM productos WHERE PAÍSDEORIGEN=?";
    // Paso 2
    $resultados=mysqli_prepare($conexion, $sql);
    // Paso 3 ["s"-String, "i"-integer]
    $ok=mysqli_stmt_bind_param($resultados, "s", $pais);
    // Paso 4
    $ok=mysqli_stmt_execute($resultados);

    if (!$ok) {
        echo "<p>Error al ejecutar la consulta</p>";
    } else {
        // Paso 5
        $ok=mysqli_stmt_bind_result($resultados, $code, $name, $price, $country);
?>
<table>
    <thead>
        <tr>
            <th>Código Artículo</th>
            <!-- <th>Sección</th> -->
            <th>Nombre artículo</th>
            <th>Precio</th>
            <!-- <th>Fecha</th>
            <th>Importado</th> -->
            <th>País origen</th>
        </tr>
    </thead>
<tbody>
<?php
        // Paso 6
        while (mysqli_stmt_fetch($resultados)) {
            echo "<tr>";
            echo "<td>".$code."</td>";
            // echo "<td>".$section."</td>";
            echo "<td>".$name."</td>";
            echo "<td>".$price."</td>";
            // echo "<td>".$date."</td>";
            // echo "<td>".$imported."</td>";
            echo "<td>".$country."</td>";
            echo "</tr>";
        }
?>
    </tbody>
</table>
<?php
    }
    mysqli_close($conexion);
?>
</body>
</html>