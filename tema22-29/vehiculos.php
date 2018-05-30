<?php

    class Coche {
        protected $ruedas;
        private $color;
        var $motor;

        // Metodo constructor
        function Coche() {
            // Se asignan valores a las variables con ->
            $this->ruedas=4;
            $this->color="";
            $this->motor=1600;
        }

        function getRuedas() {
            return $this->ruedas;
        }

        // Funcion de clase con parametros
        function setColor($color_coche, $nombre_coche) {
            $this->color=$color_coche;

            echo "<p>El color del coche ". $nombre_coche ." es: ". $this->color ."</p>";
        }

        function arrancar() {
            echo "<p>Estoy arrancando</p>";
        }

        function girar() {
            echo "<p>Estoy girando</p>";
        }

        function frenar() {
            echo "<p>Estoy frenando</p>";
        }
    }

    class Camion extends Coche {
        // Metodo constructor
        function Camion() {
            $this->ruedas=8;
            $this->color="Gris";
            $this->motor=2600;
        }

        // Al crear una funcion con el mismo nombre de la clase que se hereda, esta se sobreescribe
        function setColor($color_camion, $nombre_camion) {
            $this->color=$color_camion;

            echo "<p>El color del camion ". $nombre_camion ." es: ". $this->color ."</p>";
        }

        function arrancar() {
            // Ejecutar la funcion de la clase padre
            parent::arrancar();
            echo "<P>Camion arrancado</P>";
        }
    }

?>