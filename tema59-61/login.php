<?php
    require("usuarios.php");

    $login=new Usuarios();
    $user=isset($_POST["user"]) ? $_POST["user"] : NULL;
    $pass=isset($_POST["password"]) ? $_POST["password"] : NULL;
    $login->isLogin($user, $pass);
?>