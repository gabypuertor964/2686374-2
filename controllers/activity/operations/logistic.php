<?php

    require("../../../addons/functions_global.php");

    $resultados=[];
    $ruta_retorno="views/activity/operations";
    type_validation([[$_GET,"all"]],$ruta_retorno);

    function triangle($base,$altura){
        //(bxh)/2
        $area=($base*$altura)/2;

        echo($area);
    }

    function variables_return($var_1,$var_2){
        echo($var_1."<br>".$var_2);
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
        //b*h
        $area=$base*$altura;

        echo($area);
    }

    function square($lado){
        //l²
        $area=$lado**2;

        //l*4
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

    function circle($radio){

        //2π*r.
        $longitud=2*pi()*$radio;

        //A = π r²
        $area=pi()*$radio**2;

        echo($longitud."<br>".$area);
    }

    function average($primer_numero,$segundo_numero,$tercer_numero){
        $promedio=($primer_numero+$segundo_numero+$tercer_numero)/3;

        echo($promedio);
    }

    switch($_GET['function']){

        case "triangle":
            $base=recuperacion_post("base_triangulo");
            $altura=recuperacion_post("altura_triangulo");

            type_validation(
                [
                    [$base,"numeric"],
                    [$altura,"numeric"]
                ],
                $ruta_retorno
            );

            triangle($base,$altura);
        break;

        case "variables_return":
            $var_1=recuperacion_post("primera_variable");
            $var_2=recuperacion_post("segunda_variable");

            type_validation(
                [
                    [$var_1,"all"],
                    [$var_2,"all"]
                ],
                $ruta_retorno
            );

            variables_return($var_1,$var_2);
        break;

        case "empowerment":
            $base=recuperacion_post("base_potencia");
            
            if(isset($_POST['exponente_potencia']) && $_POST['exponente_potencia']<>null ){
               $exponente=$_POST['exponente_potencia'];
            }else{
                $exponente=2;
            }

            type_validation(
                [
                    [$base,"numeric"]
                ],
                $ruta_retorno
            );

            empowerment($base,$exponente);
        break;

        case "trm":
            $euros=recuperacion_post("cantidad_euros");
            $tasa_cambio=recuperacion_post("tasa_cambio");

            type_validation(
                [
                    [$euros,"double"],
                    [$tasa_cambio,"numeric"],
                ],
                $ruta_retorno
            );


            trm($euros,$tasa_cambio);
        break;

        case "rectangle":
            $base=recuperacion_post("base_rectangulo");
            $altura=recuperacion_post("altura_rectangulo");

            type_validation(
                [
                    [$base,"double"],
                    [$altura,"double"],
                ],
                $ruta_retorno
            );

            rectangle($base,$altura);
        break;

        case "square":
            $lado=recuperacion_post("lado_cuadrado");

            type_validation(
                [
                    [$lado,"numeric"]
                ],
                $ruta_retorno
            );

            square($lado);
        break;

        case "cylinder":
            $radio=recuperacion_post("radio_cilindro");
            $altura=recuperacion_post("altura_cilindro");

            type_validation(
                [
                    [$radio,"numeric"],
                    [$altura,"numeric"],
                ],
                $ruta_retorno
            );

            cylinder($radio,$altura);
        break;

        case "circle":
            $radio_circulo=recuperacion_post("radio_circulo");

            type_validation(
                [
                    [$radio_circulo,"numeric"]
                ],
                $ruta_retorno
            );

            circle($radio_circulo);

        break;

        case "average":
            $num_1=recuperacion_post("primer_numero");
            $num_2=recuperacion_post("segundo_numero");
            $num_3=recuperacion_post("tercer_numero");

            type_validation(
                [
                    [$num_1,"numeric"],
                    [$num_2,"numeric"],
                    [$num_3,"numeric"]
                ],
                $ruta_retorno
            );

            average($num_1,$num_2,$num_3);
        break;

        case "empowerment_conditional":
            $base=recuperacion_post("base_potencia");
            $exponente=recuperacion_post("exponente_potencia");

            type_validation(
                [
                    [$base,"numeric"],
                    [$exponente,"integer"]
                ],
                $ruta_retorno
            );

            empowerment($base,$exponente);
        break;

        //En caso de que el valor enviado por la variable GET, no represente una funcion definida, este enviara al usuario nuevamente a la pagina de formularios
        default:
            header("Location: ../../../$ruta_retorno");
        break;


    }



?>