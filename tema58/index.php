<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conexión a BBDD con POO y PDO</title>
    <?php
        require("productos.php");

        $productos=new Productos();
        $pais=isset($_GET["pais"]) ? $_GET["pais"] : NULL;
        $array_productos=$productos->getProductos($pais);

        $miPag=$_SERVER["PHP_SELF"];
    ?>
</head>
<body>
    <form action="<?php echo $miPag; ?>" method="get">
        <label for="pais">Introduce país: </label>
        <input type="text" name="pais" id="pais" placeholder="<?php echo $pais; ?>">
        <input type="submit" value="Buscar">
    </form>
<?php

    echo "<table><thead><tr><th>Código Artículo</th><th>Sección</th><th>Nombre artículo</th><th>Precio</th><th>Fecha</th><th>Importado</th><th>País origen</th></tr></thead><tbody>";
    foreach($array_productos as $producto) {
        echo "<tr>";
        echo "<td>".$producto["CÓDIGOARTÍCULO"]."</td>";
        echo "<td>".$producto["SECCIÓN"]."</td>";
        echo "<td>".$producto["NOMBREARTÍCULO"]."</td>";
        echo "<td>".$producto["PRECIO"]."</td>";
        echo "<td>".$producto["FECHA"]."</td>";
        echo "<td>".$producto["IMPORTADO"]."</td>";
        echo "<td>".$producto["PAÍSDEORIGEN"]."</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";

?>
</body>
</html>