<link rel="stylesheet" href="style.css">

<?php

    if (isset($_POST["enviando"])) {
        $user = $_POST["nombre_usuario"];
        //$edad = $_POST["edad_usuario"];


        /*echo "<p>";
        if ($edad <= 18) {
            echo "Eres menor de edad";
        } elseif ($edad <= 40) {
            echo "Eres joven";
        } elseif ($edad <= 65) {
            echo "Eres maduro";
        } else {
            echo "Cuidate";
        }

        echo $edad < 18 ? "Eres menor de edad" : "Eres mayor de edad";

        echo "</p>";*/

        $pass = $_POST["pass_usuario"];

        /*$resultado = $user == "Jorge" && $pass == "1234" ? "<p class='validado'>Usuario correcto</p>" : "<p class='no_validado'>Usuario incorrecto</p>";
        echo $resultado;*/

        switch (true) {
            case $user == "Jorge" && $pass == "1234":
            case $user == "Juan" && $pass == "5555":
            case $user == "Maria" && $pass == "1111":
                echo "<p class='validado'>Usuario autorizado. Jola $user</p>";
                break;
            default:
                echo "<p class='no_validado'>Usuario no autorizado</p>";
        }

    }

?>