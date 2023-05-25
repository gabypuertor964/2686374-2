<?php 
    $title_header=$_SESSION['title_header'];

    $prefix="../../../";

    if(isset($_SESSION['addons'])){

        var_dump($_SESSION['addons']);

        $addons=$_SESSION['addons'];

        foreach($addons as $addon){
            switch($addon['name']){
                case "prefix_route":
                    $prefix=$addon["value"];
                    
                break;
            }
        }
        
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

    <script>
        function clonar_row(elemento,id_padre){
            var padre=document.getElementById(elemento);
            var nuevo_hijo=padre.cloneNode(true);

            document.getElementById(id_padre).appendChild(nuevo_hijo);
        }
    </script>

</head>
<body>