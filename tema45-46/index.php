<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizando registros</title>

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

    function conectar() {
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

        return $conexion;
    }

    function buscarDato($code) {
        $conexion=conectar();
        
        $registro="SELECT * FROM productos WHERE CÓDIGOARTÍCULO='$code' LIMIT 1";
        
        $resultados=mysqli_query($conexion, $registro);
        $rows=mysqli_affected_rows($conexion);
        mysqli_close($conexion);

        if (!$resultados) {
            echo "<p>Error en la búsqueda</p>";
        } else if($rows) {
            return mysqli_fetch_array($resultados, MYSQLI_ASSOC);
        } else {
            echo "<p>No existe ese código de artículo</p>";
        }
        return NULL;
    }

    function actualizarDatos($datos) {
        $conexion=conectar();

        $registro="UPDATE productos SET SECCIÓN='".$datos["seccion"]."', NOMBREARTÍCULO='".$datos["n_art"]."', PRECIO='".$datos["precio"].
                "', FECHA='".$datos["fecha"]."', IMPORTADO='".$datos["importado"]."', PAÍSDEORIGEN='".$datos["p_orig"]."' ".
                "WHERE CÓDIGOARTÍCULO='".$datos["c_art"]."'";
        
        $resultados=mysqli_query($conexion, $registro);
        $rows=mysqli_affected_rows($conexion);
        mysqli_close($conexion);

        if (!$resultados) {
            echo "<p>Error en la actualización</p>";
        } else if($rows) {
            echo "<p>Se han acualizado $rows registros</p>";
        } else {
            echo "<p>No se ha actualizado ninguna fila</p>";
        }
    }

    $miPag=$_SERVER["PHP_SELF"];
    $code=isset($_GET["code"]) ? $_GET["code"] : NULL;
    $datos=NULL;

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
        actualizarDatos($datos);
    } else {
        if(!is_null($code)) {
            $datos=buscarDato($code);
            if (!is_null($datos)) {
                require_once("form_actualizar.php");
            } else {
                require_once("form_buscar.php");
            }
        } else {
            require_once("form_buscar.php");
        }
    }
?>
</body>
</html>