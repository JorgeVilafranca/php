<link rel="stylesheet" href="style.css">
<?php
    // isset - Comprobar si se ha pulsado el boton de enviar
    if (isset($_POST["enviando"])) {
        $usuario = $_POST["nombre_usuario"];
        $edad = $_POST["edad_usuario"];

        if($usuario == "Jorge" && $edad >= 18) {
            echo "<p class='validado'>Puedes entrar</p>";
        } else {
            echo "<p class='no_validado'>No puedes entrar</p>";
        }
    }
?>