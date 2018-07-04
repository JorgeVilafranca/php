<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insertando registros</title>

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

    function insertarDatos($datos) {
        // Conexion con la BBDD 
        require("..\datos_conexion.php");

        $conexion=mysqli_connect($db_host, $db_user, $db_pass);
        // Si habido un error en la conexion
        if (mysqli_connect_errno()) {
            echo "Fallo al conectar con la base de datos";
            exit();
        }

        mysqli_select_db($conexion, $db_name) or die ("No se encuentra la base de datos");
        mysqli_set_charset($conexion, "utf8");

        $registro="INSERT INTO productos (CÓDIGOARTÍCULO, SECCIÓN, NOMBREARTÍCULO, PRECIO, FECHA, IMPORTADO,  PAÍSDEORIGEN) ".
                "VALUES ('".$datos["c_art"]."', '".$datos["seccion"]."', '".$datos["n_art"]."', '".$datos["precio"]."', DATE_FORMAT('".
                $datos["fecha"]."', '%d/%m/%Y'), '".$datos["importado"]."', '".$datos["p_orig"]."')";
        
        $resultados=mysqli_query($conexion, $registro);

        if (!$resultados) {
            echo "<p>Error en la consulta</p>";
        } else {
            echo "<p>Registro guardado</p>";
        }

        mysqli_close($conexion);
    }

    $miPag=$_SERVER["PHP_SELF"];
    $datos=null;

    if (isset($_GET["c_art"])) {
        $datos["c_art"]=$_GET["c_art"];
        $datos["seccion"]=$_GET["seccion"];
        $datos["n_art"]=$_GET["n_art"];
        $datos["precio"]=$_GET["precio"];
        $datos["fecha"]=$_GET["fecha"];
        $datos["importado"]=isset($_GET["importado"]) ? "VERDADERO" : "FALSO";
        $datos["p_orig"]=$_GET["p_orig"];
    }

    if (!is_null($datos)) {
        insertarDatos($datos);
    } else {
?>
    <h1>Registro de Artículos</h1>
    <form name="form1" method="get" action="<?php $miPag ?>">
        <table border="0" align="center">
            <tr>
                <td>Código Artículo</td>
                <td>
                    <label for="c_art"></label>
                    <input type="text" name="c_art" id="c_art">
                </td>
            </tr>
            <tr>
                <td>Sección</td>
                <td>
                    <label for="seccion"></label>
                    <input type="text" name="seccion" id="seccion">
                </td>
            </tr>
            <tr>
                <td>Nombre artículo</td>
                <td>
                    <label for="n_art"></label>
                    <input type="text" name="n_art" id="n_art">
                </td>
            </tr>
            <tr>
                <td>Precio</td>
                <td>
                    <label for="precio"></label>
                    <input type="text" name="precio" id="precio">
                </td>
            </tr>
            <tr>
                <td>Fecha</td>
                <td>
                    <label for="fecha"></label>
                    <input type="date" name="fecha" id="fecha">
                    <date-util format="dd/MM/yyyy"></date-util>
                </td>
            </tr>
            <tr>
                <td>Importado</td>
                <td>
                    <label for="importado"></label>
                    <input type="checkbox" name="importado" id="importado">
                </td>
            </tr>
            <tr>
                <td>País de Origen</td>
                <td>
                    <label for="p_orig"></label>
                    <input type="text" name="p_orig" id="p_orig">
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="center">
                    <input type="submit" name="enviar" id="enviar" value="Enviar">
                </td>
                <td align="center">
                    <input type="reset" name="Borrar" id="Borrar" value="Borrar">
                </td>
            </tr>
        </table>
    </form>
<?php } ?>
</body>
</html>