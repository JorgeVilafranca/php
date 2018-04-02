<?php
    function calcular($calculo) {
        global $numero1;
        global $numero2;

        echo "<p class='resultado'>";
        if (!strcmp("Suma", $calculo)) {
            echo "El resultado es: " . ($numero1+$numero2);
        } else if (!strcmp("Resta", $calculo)) {
            echo "El resultado es: " . ($numero1-$numero2);
        } else if (!strcmp("Multiplicación", $calculo)) {
            echo "El resultado es: " . ($numero1*$numero2);
        } else if (!strcmp("División", $calculo)) {
            echo "El resultado es: " . ($numero1/$numero2);
        } else if (!strcmp("Módulo", $calculo)) {
            echo "El resultado es: " . ($numero1%$numero2);
        } else if (!strcmp("Incremento", $calculo)) {
            echo "El resultado es: " . ++$numero1;
        } else if (!strcmp("Decremento", $calculo)) {
            echo "El resultado es: " . --$numero1;
        }
        echo "</p>";
    }

?>