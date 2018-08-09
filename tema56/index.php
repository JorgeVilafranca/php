<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDO Parte 2</title>

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

    function actualizarDatos($datos, $delete=false) {
        require("..\datos_conexion.php");

        try {
            $base=new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_pass);
            
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $base->exec("SET CHARACTER SET utf8");

            if ($delete) {
                $sql="DELETE FROM productos WHERE CÓDIGOARTÍCULO=:c_art";
            } else {
                $sql="INSERT INTO productos (CÓDIGOARTÍCULO, SECCIÓN, NOMBREARTÍCULO, PRECIO, FECHA, IMPORTADO,  PAÍSDEORIGEN) ".
                    "VALUES (:c_art, :seccion, :n_art, :precio, :fecha, :importado, :p_orig )";
            }
            $resultado=$base->prepare($sql);
            
            if ($delete) {
                $resultado->execute(array(":c_art"=>$datos["c_art"]));
                echo "<p>Registro ".$datos["c_art"]." eliminado</p>";
            } else {
                $resultado->execute(array(":c_art"=>$datos["c_art"], ":seccion"=>$datos["seccion"], ":n_art"=>$datos["n_art"], ":precio"=>$datos["precio"], 
                    ":fecha"=>$datos["fecha"], ":importado"=>$datos["importado"], ":p_orig"=>$datos["p_orig"]));
                echo "<p>Registro ".$datos["c_art"]." insertado</p>";
            }
        } catch(Exception $e) {
            die("Error: ".$e->getMessage()  );
        } finally {
            $base=NULL;
        }
    }

    $miPag=$_SERVER["PHP_SELF"];
    $datos=null;
    $delete=isset($_POST["delete"]);

    if (isset($_POST["c_art"])) {
        $datos["c_art"]=$_POST["c_art"];
        $datos["seccion"]=$_POST["seccion"];
        $datos["n_art"]=$_POST["n_art"];
        $datos["precio"]=$_POST["precio"];
        $datos["fecha"]=$_POST["fecha"];
        $datos["importado"]=isset($_POST["importado"]) ? "VERDADERO" : "FALSO";
        $datos["p_orig"]=$_POST["p_orig"];
    }

    if (!is_null($datos)) {
        actualizarDatos($datos, $delete);
    } else {
?>
    <h1>Registro de Artículos</h1>
    <form name="form1" method="post" action="<?php echo $miPag; ?>">
        <table border="0" align="center">
            <tr>
                <td>Código Artículo</td>
                <td>
                    <label for="c_art"></label>
                    <input type="text" name="c_art" id="c_art">
                    <input type="submit" name="delete" id="delete" value="X">
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