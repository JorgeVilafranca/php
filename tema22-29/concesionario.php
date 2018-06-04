<?php

    class CompraVehiculo {
        private $precioBase;
        private static $ayuda=0; // con static no es una constante, es la misma variable para todas las instancias

        function CompraVehiculo($gama) {
            if ($gama=="urbano") {
                $this->precioBase=10000;
            } else if($gama=="compacto") {
                $this->precioBase=20000;
            } else if($gama=="berlina") {
                $this->precioBase=30000;
            }
        }

        static function setDescuentoGobierno() {
            // Compraramos una fecha
            if (date("m-d-y")>"06-01-18") {
                self:: $ayuda=4500;
            }
        }

        function climatizador() {
            $this->precioBase+=2000;
        }

        function navegadorGPS() {
            $this->precioBase+=2500;
        }

        function tapiceriaCuero($color) {
            if ($color=="blanco") {
                $this->precioBase+=3000;
            } else if($color=="beige") {
                $this->precioBase+=3500;
            } else {
                $this->precioBase+=5000;
            }
        }

        function precioFinal() {
            // $this-> hacer referencia a variables o metodos de una clase
            // self:: hacer referencia a una variable static
            $valorFinal=$this->precioBase-self::$ayuda;
            return $valorFinal;
        }
    }

?>