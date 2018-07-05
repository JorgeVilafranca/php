<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eliminando registros</title>

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

function eliminarDatos($code) {
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

    $registro="DELETE FROM productos WHERE CÓDIGOARTÍCULO='$code'";
    
    $resultados=mysqli_query($conexion, $registro);
    $rows=mysqli_affected_rows($conexion);

    if (!$resultados) {
        echo "<p>Error en la consulta</p>";
    } else if($rows) {
        echo "<p>Se han eliminado $rows registros</p>";
    } else {
        echo "<p>No existe ese código de artículo</p>";
    }

    mysqli_close($conexion);
}

$miPag=$_SERVER["PHP_SELF"];
$code=isset($_GET["c_art"]) ? $_GET["c_art"] : NULL;

if (!is_null($code)) {
    eliminarDatos($code);
} else {
?>
<h1>Eliminación de Artículos</h1>
<form name="form1" method="get" action="<?php echo $miPag; ?>">
    <table border="0" align="center">
        <tr>
            <td>Código Artículo</td>
            <td>
                <label for="c_art"></label>
                <input type="text" name="c_art" id="c_art">
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td align="center">
                <input type="submit" name="eliminar" id="eliminar" value="Eliminar">
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