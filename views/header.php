<?php 
    $title_header=$_SESSION['title_header'];
    $addons=$_SESSION['addons'];

    //Generacion de prefijo segun ubicacion manual de ruta
    if(isset($addons) && $addons['type']=='route_absolute'){
        $prefix=$addons['route'];
    }else{
        $prefix="../../../";
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel='stylesheet' href='<?php echo($prefix)?>addons/style.css'>


    <title><?php echo($title_header)?></title>

</head>
<body>