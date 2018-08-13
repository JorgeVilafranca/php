<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sesiones y PHP_SELF</title>
    <style>
        h1, h2 {
            text-align: center;
        }
        table {
            width: 25%;
            background-color: #FFC;
            border: 2px dotted #F00;
            margin: auto;
        }
        .izq {
            text-align: right;
        }
        .der {
            text-align: left;
        }
        td {
            text-align: center;
            padding: 10px;
        }
        .error {
            text-align: left;
            color: #F33;
        }
        .info {
            text-align: left;
            color: #0F0;
        }
    </style>
</head>
<body>
<?php

    $user=isset($_POST["user"]) ? $_POST["user"] : NULL;
    $pass=isset($_POST["password"]) ? $_POST["password"] : NULL;
    if (!(is_null($user) || is_null($pass))) {
        require("usuarios.php");

        $login=new Usuarios();
        $login->isLogin($user, $pass);
    }
    if (!isset($_SESSION["user"])) {
        include("login.php");
    } else {
        echo "<div class='info'>Usuario: ".$_SESSION["user"]."</div>";
    }
    
?>
    
    <h2>Contenido de la web</h2>
    <table width="800" border="0">
        <tr>
            <td><img src="img/bodegon01.jpg" alt="bodegon01" width="300"></td>
            <td><img src="img/bodegon02.jpg" alt="bodegon02" width="300"></td>
        </tr>
        <tr>
            <td><img src="img/bodegon03.jpg" alt="bodegon03" width="300"></td>
            <td><img src="img/bodegon04.jpg" alt="bodegon04" width="300"></td>
        </tr>
    </table>
</body>
</html>