<?php

    require("conexion.php");

    class Usuarios extends Conexion {
        
        public function Usuarios() {
            parent::__construct(); // Llamar al constructor del objeto padre
        }

        public function isLogin($user, $pass) {
            $sql="SELECT * FROM usuarios WHERE usuario=:user AND password=:pass";
            $resultado=$this->conexion_db->prepare($sql);
            // htmlentities - Convertir cualquier simbolo en html
            // addslashes - Escapar cualquier caracter extraño
            $user=htmlentities(addslashes($user));
            $pass=htmlentities(addslashes($pass));
            $resultado->bindValue(":user", $user);
            $resultado->bindValue(":pass", $pass);
            $resultado->execute();
            // Redirección
            if($resultado->rowCount() > 0) {
                // Crear sesion con el nombre de usuario logueado
                session_start();
                $_SESSION["user"]=$user;
                //header("location:bienvenida1.php");
            } else {
                //header("location:index.php");
                echo "<div class='error'>Error. Usuario o contraseña incorrectos</div>";
            }
            
            $resultado->closeCursor();
            $this->conexion_db=NULL;
        }
    }
    
?>