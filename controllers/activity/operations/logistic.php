<?php

    require("../../../addons/functions_global.php");

    $resultados=[];
    $ruta_retorno="views/activity/operations";

    validacion_datos($_GET,$ruta_retorno);

    function triangle($base,$altura){
        $area=($base*$altura)/2;

        echo($area);
    }

    function variables_return($primera_variable,$segunda_variable){
        echo($primera_variable."<br>".$segunda_variable);
    }

    switch($_GET['function']){

        case "triangle":
            $base=recuperacion_post("base_triangulo");
            $altura=recuperacion_post("altura_triangulo");

            validacion_datos([$base,$altura],$ruta_retorno);

            numeric_validation([$base,$altura],$ruta_retorno);
            triangle($base,$altura);
        break;

        case "variables_return":
            $primera_variable=recuperacion_post("primera_variable");
            $segunda_variable=recuperacion_post("segunda_variable");

            validacion_datos([$primera_variable,$segunda_variable],$ruta_retorno);
            variables_return($primera_variable,$segunda_variable);
        break;


    }



?>