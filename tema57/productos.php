<?php

    require("conexion.php");

    class Productos extends Conexion {
        
        public function Productos() {
            parent::__construct(); // Llamar al constructor del objeto padre
        }

        public function getProductos($pais=NULL) {
            $restriccion=is_null($pais) || empty($pais) ? "" : " WHERE PAÍSDEORIGEN='".$pais."'";
            $resultado=$this->conexion_db->query("SELECT * FROM productos".$restriccion);
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
    }
    
?>