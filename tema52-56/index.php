<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDO</title>
</head>
<body>
<?php

    require("..\datos_conexion.php");

    try {
        $base=new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_pass);
        echo "<p>Conexión establecida</p>";
    } catch(Exception $e) {
        die("Error: ".$e->getMessage()  );
    } finally {
        $base=NULL;
    }

?>
</body>
</html>