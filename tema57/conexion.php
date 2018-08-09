<?php

    require("config.php");

    class Conexion {
        protected $conexion_db;

        public function Conexion() {
            $this->conexion_db=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if ($this->conexion_db->connect_errno) {
                echo "<p>Fallo al conectar a MySQL: ".$this->conexion_db->connect_errno."</p>";
                return;
            }
            $this->conexion_db->set_charset(DB_CHARSET);
        }
    }

?>