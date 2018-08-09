<?php

    require("conexion.php");

    class Productos extends Conexion {
        
        public function Productos() {
            parent::__construct(); // Llamar al constructor del objeto padre
        }

        public function getProductos($pais=NULL) {
            $restriccion=is_null($pais) || empty($pais) ? "" : " WHERE PAÍSDEORIGEN='".$pais."'";
            $sql="SELECT * FROM productos".$restriccion;
            $sentencia=$this->conexion_db->prepare($sql);
            $sentencia->execute(array());
            $resultado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            $sentencia->closeCursor();
            $this->conexion_db=NULL;

            return $resultado;
        }
    }
    
?>