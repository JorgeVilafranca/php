<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POO</title>
</head>
<body>
<?php

    include("vehiculos.php");

    // Instancias al objeto
    $renault = new Coche();
    $mazda = new Coche();
    $seat = new Coche();

    $mazda->girar();
    echo "<p>El mazda tiene: ". $mazda->getRuedas() ." ruedas</p>";

    $renault->setColor("Rojo", "Renault");

    $pegaso = new Camion();

    echo "<p>El camion pegaso tiene: ". $pegaso->getRuedas() ." ruedas</p>";
    $pegaso->setColor("Marron", "Hyundai");
    $pegaso->arrancar();

    echo "<hr>";

    include("concesionario.php");

    // De este modo podemos modificar una variable static
    //CompraVehiculo::$ayuda=10000;
    CompraVehiculo::setDescuentoGobierno();

    $compraAntonio=new CompraVehiculo("compacto");
    $compraAntonio->climatizador();
    $compraAntonio->tapiceriaCuero("blanco");
    echo "<p>Compra Antonio ".$compraAntonio->precioFinal()."</p>";

    $compraAna=new CompraVehiculo("compacto");
    $compraAna->climatizador();
    $compraAna->tapiceriaCuero("rojo");
    echo "<p>Compra Ana ".$compraAna->precioFinal()."</p>";
?>
</body>
</html>