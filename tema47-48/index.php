<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inyección SQL</title>
</head>
<body>
<?php

    function login($user, $pass) {

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

        // Para evitar que usen la inyección SQL
        $user=mysqli_real_escape_string($conexion, $user);
        $pass=mysqli_real_escape_string($conexion, $pass);

        $consulta="SELECT * FROM usuarios WHERE user='$user' AND pass='$pass'";
        $resultados=mysqli_query($conexion, $consulta);

        echo "<p>$consulta</p>";
    ?>
        <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Password</th>
                    <th>Teléfono</th>
                    <th>Direccion</th>
                </tr>
            </thead>
        <tbody>
            
    <?php
        while ($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)) {
            echo "<tr>";
            echo "<td>".$fila["user"]."</td>";
            echo "<td>".$fila["pass"]."</td>";
            echo "<td>".$fila["tfno"]."</td>";
            echo "<td>".$fila["direccion"]."</td>";
            echo "</tr>";
        }

        mysqli_close($conexion);

    ?>
            </tbody>
        </table>
<?php
    }
    $miPag=$_SERVER["PHP_SELF"];
    $user=isset($_GET["user"]) ? $_GET["user"] : NULL;
    $pass=isset($_GET["pass"]) ? $_GET["pass"] : NULL;

    if (!(is_null($user) && is_null($pass))) {
        login($user, $pass);
    } else {
        // Para la inyección SQL poner [' OR '1'='1] en el cuadro de texto del pass
?>
        <form action="<?php echo $miPag; ?>" method="GET">
            <table>
                <tr>
                    <td><label for="user">Usuario: </label></td>
                    <td><input type="text" name="user"></td>
                </tr>
                <tr>
                    <td><label for="pass">Password: </label></td>
                    <td><input type="text" name="pass"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;"><input type="submit" value="Login"></td>
                </tr>
            </table>
        </form>
<?php } ?>
</body>
</html>