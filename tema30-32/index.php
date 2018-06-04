<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arrays</title>
</head>
<body>
<?php

    /*$semana[]="Lunes";
    $semana[]="Martes";
    $semana[]="Miercoles";*/

    // Array indexada
    $semana=array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");

    echo $semana[2]."<br>";

    // Array asociativa
    // Poner => para en un array asociar un valor a un nombre en vez de un indice por defecto
    $datos=array("Nombre"=>"Jorge","Apellidos"=>"v.","Edad"=>35);

    echo $datos["Nombre"]." - ".$datos["Edad"]."<br>";

    echo "<hr>";

    // Comprobar si es una array
    if (is_array($datos))
        echo "<p>Es array</p>";
    else
        echo "<p>No es array</p>";
    
    echo "<hr>";

    // Recorrer un array por clave
    foreach ($datos as $key=>$value) {
        echo "$key: $value<br>";
    }

    echo "<hr>";

    // Recorrer un array por indice
    for ($i=0; $i<count($semana) ; $i++) {
        echo $semana[$i]."<br>";
    }
    
    echo "<hr>";

    // Añadir un nuevo dato a un array asociativo
    $datos["Pais"]="España";
    
    foreach ($datos as $key=>$value) {
        echo "$key: $value<br>";
    }
    
    echo "<hr>";

    // Añadir un nuevo dato a un array indexado
    $semana[]="Domingo";
    // Ordenar alfabeticamente
    sort($semana);

    for ($i=0; $i<count($semana) ; $i++) {
        echo $semana[$i]."<br>";
    }
    
    echo "<hr>";

    // Array multidimensional
    $alimentos=array("fruta"=>array("tropical"=>"Kiwi",
                                    "citrico"=>"Mandarina",
                                    "otros"=>"Manzana"),
                    "leche"=>array("animal"=>"Vaca",
                                    "vegetal"=>"Coco"),
                    "carne"=>array("vacuno"=>"Lomo",
                                    "porcino"=>"Pata")
    );

    // Comprobar un valor del array de 2 dimensiones
    echo $alimentos["carne"]["vacuno"]."<br>";
    
    echo "<hr>";

    // Recorrer un array multidimensional
    /*foreach($alimentos as $keyAlim=>$valAlim) {
        echo $keyAlim.":<br>";
        while(list($key,$value)=each($valAlim)) {
            echo "$key = $value<br>";
        }
        echo "<br>";
    }*/

    echo var_dump($alimentos);

?>
</body>
</html>