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

    function empowerment($base,$exponente){
        $potencia=$base**$exponente;

        echo($potencia);
    }

    function trm($eur,$tasa_cambio){
        $dolares=$eur*$tasa_cambio;

        echo($dolares);
    }

    function rectangle($base,$altura){
        $area=$base*$altura;

        echo($area);
    }

    function square($lado){
        $area=$lado**2;
        $perimitero=$lado*4;

        echo($area."<br>".$perimitero);
    }

    function cylinder($radio,$altura){

        /*As=2πr(r+h)*/
        $area=2*pi()*$radio*($radio+$altura);

        /*V=πr^2h*/
        $volumen=pi()*$radio**2*$altura;

        echo($area."<br>".$volumen);
    }

    function average($primer_numero,$segundo_numero,$tercer_numero){
        $promedio=($primer_numero+$segundo_numero+$tercer_numero)/3;

        echo($promedio);
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

        case "empowerment":
            $base=recuperacion_post("base_potencia");
            
            if(isset($_POST['exponente_potencia']) && $_POST['exponente_potencia']<>null ){
               $exponente=$_POST['exponente_potencia'];
            }else{
                $exponente=2;
            }

            validacion_datos([$base,$exponente],$ruta_retorno);
            numeric_validation([$base,$exponente],$ruta_retorno);
            empowerment($base,$exponente);
        break;

        case "trm":
            $euros=recuperacion_post("cantidad_euros");
            $tasa_cambio=recuperacion_post("tasa_cambio");

            validacion_datos([$euros,$tasa_cambio],$ruta_retorno);
            numeric_validation([$euros,$tasa_cambio],$ruta_retorno);
            float_validation([$tasa_cambio],$ruta_retorno);
            trm($euros,$tasa_cambio);
        break;

        case "rectangle":
            $base=recuperacion_post("base_rectangulo");
            $altura=recuperacion_post("altura_rectangulo");

            validacion_datos([$base,$altura],$ruta_retorno);
            numeric_validation([$base,$altura],$ruta_retorno);
            float_validation([$altura],$ruta_retorno);
            rectangle($base,$altura);
        break;

        case "square":
            $lado=recuperacion_post("lado_cuadrado");

            validacion_datos([$lado],$ruta_retorno);
            numeric_validation([$lado],$ruta_retorno);
            square($lado);
        break;

        case "cylinder":
            $radio=recuperacion_post("radio_cilindro");
            $altura=recuperacion_post("altura_cilindro");

            validacion_datos([$radio,$altura],$ruta_retorno);
            numeric_validation([$radio,$altura],$ruta_retorno);
            cylinder($radio,$altura);
        break;

        case "average":
            $num_1=recuperacion_post("primer_numero");
            $num_2=recuperacion_post("segundo_numero");
            $num_3=recuperacion_post("tercer_numero");

            validacion_datos([$num_1,$num_2,$num_3],$ruta_retorno);
            numeric_validation([$num_1,$num_2,$num_3],$ruta_retorno);
            average($num_1,$num_2,$num_3);
        break;

        case "empowerment_conditional":
            $base=recuperacion_post("base_potencia");
            $exponente=recuperacion_post("exponente_potencia");

            validacion_datos([$base,$exponente],$ruta_retorno);
            numeric_validation([$base,$exponente],$ruta_retorno);
            integer_validation([$exponente],$ruta_retorno);
            
            empowerment($base,$exponente);
        break;

    }



?>