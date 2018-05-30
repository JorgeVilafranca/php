<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Funciones</title>
</head>
<body>
<?php

    $palabra = "JORGE";
    // Un texto en minusculas
    echo "<p>".strtolower($palabra)."</p>";

    // Parametros separados por coma
    function suma($num1, $num2) {
        $resultado = $num1+$num2;
        return $resultado;
    }
    echo "<p>3+2 = ".suma(3, 2)."</p>";

    // parametro por defecto
    function frase_mayus($frase, $conversion=true) {
        $frase = strtolower($frase);

        if ($conversion) {
            // Primera letra de cada palabra en mayusculas
            $resultado = ucwords($frase);
        } else {
            $resultado = strtoupper($frase);
        }

        return $resultado;
    }
    echo "<p>".frase_mayus("esto es una prueba")."</p>";

    $numero=5;
    // Paso de parametros por valor
    function incrementa($valor1) {
        $valor1++;
        return $valor1;
    }
    echo "<p>Por Valor: ".incrementa($numero)." => Numero: $numero</p>";

    // Paso de parametros por referencia
    function incrementa2(&$valor1) {
        $valor1++;
        return $valor1;
    }
    echo "<p>Por Referencia : ".incrementa2($numero)." => Numero: $numero</p>";

?>
</body>
</html>