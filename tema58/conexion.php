<?php

    require("config.php");

    class Conexion {
        protected $conexion_db;

        public function Conexion() {
            try {
                $this->conexion_db=new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME, DB_USER, DB_PASS);
                $this->conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conexion_db->exec("SET CHARACTER SET ".DB_CHARSET);
                return $this->conexion_db;
            } catch(Exception $e) {
                echo "La línea de error es: ".$e->getLine();
            }
        }
    }

?>