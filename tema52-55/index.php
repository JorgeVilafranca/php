<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDO Parte 1</title>
    
    <style>
        h1{
            text-align:center;
            color:#00F;
            border-bottom:dotted #0000FF;
            width:50%;
            margin:auto;
        }

        table{
            border:1px solid #F00;
            padding:20px 50px;
            margin-top:50px;
        }

        body{
            background-color:#FFC;
        }
    </style>
</head>
<body>
<?php

    function getProductos($seccion, $origen) {
        require("..\datos_conexion.php");

        try {
            $base=new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_pass);
            //echo "<p>Conexión establecida</p>";

            // Establece como atributo de conexión el objeto error para poder capturarlo
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Establece como caracteres predeterminados UTF-8
            $base->exec("SET CHARACTER SET utf8");

            //$sql="SELECT CÓDIGOARTÍCULO, SECCIÓN, NOMBREARTÍCULO, PRECIO, PAÍSDEORIGEN FROM productos WHERE NOMBREARTÍCULO=?";

            // Marcador para varias restricciones
            $sql="SELECT CÓDIGOARTÍCULO, SECCIÓN, NOMBREARTÍCULO, PRECIO, PAÍSDEORIGEN FROM productos WHERE SECCIÓN=:seccion AND PAÍSDEORIGEN=:origen";
            // resultado es un objeto de tipo PDOStatement
            $resultado=$base->prepare($sql);
            //$resultado->execute(array($nombre));
            
            // con el uso de marcador creamos un array asociativo
            $resultado->execute(array(":seccion"=>$seccion, ":origen"=>$origen));
?>
<table>
    <thead>
        <tr>
            <th>Código Artículo</th>
            <th>Sección</th>
            <th>Nombre artículo</th>
            <th>Precio</th>
            <!-- <th>Fecha</th>
            <th>Importado</th> -->
            <th>País origen</th>
        </tr>
    </thead>
<tbody>
<?php
            while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>".$registro["CÓDIGOARTÍCULO"]."</td>";
                echo "<td>".$registro["SECCIÓN"]."</td>";
                echo "<td>".$registro["NOMBREARTÍCULO"]."</td>";
                echo "<td>".$registro["PRECIO"]."</td>";
                // echo "<td>".$registro["FECHA"]."</td>";
                // echo "<td>".$registro["IMPORTADO"]."</td>";
                echo "<td>".$registro["PAÍSDEORIGEN"]."</td>";
                echo "</tr>";
            }
            // Cerrar el cursor
            $resultado->closeCursor();
?>
    </tbody>
</table>
<?php

        } catch(Exception $e) {
            die("Error: ".$e->getMessage()  );
        } finally {
            $base=NULL;
        }
    }

    $miPag=$_SERVER["PHP_SELF"];
    $seccion=isset($_GET["seccion"]) ? $_GET["seccion"] : NULL;
    $origen=isset($_GET["origen"]) ? $_GET["origen"] : NULL;
    
    if (!(is_null($seccion) || empty($seccion))) {
        if (empty($origen)) $origen="España";
        getProductos($seccion, $origen);
    } else {
?>
<h1>Búsqueda de Artículos</h1>
<form name="form1" method="get" action="<?php echo $miPag; ?>">
    <table border="0" align="center">
        <tr>
            <td>    
                <label for="seccion">Sección</label>
            </td>
            <td>
                <input type="text" name="seccion" id="seccion">
            </td>
        </tr>
        <tr>
            <td>    
                <label for="origen">País origen</label>
            </td>
            <td>
                <input type="text" name="origen" id="origen" placeholder="España">
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="submit" id="Buscar" value="Buscar">
            </td>
        </tr>
    </table>
</form>
<?php } ?>
</body>
</html>