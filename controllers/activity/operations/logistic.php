<?php

    require("../../../addons/functions_global.php");

    $ruta_retorno="views/activity/operations";
    $ruta_result="views/result.php";
    type_validation([[$_GET,"all"]],$ruta_retorno);

    function triangle($base,$altura){

        global $ruta_retorno;
        global $ruta_result;

        type_validation(
            [
                [$base,"numeric"],
                [$altura,"numeric"]
            ],
            $ruta_retorno
        );

        //(bxh)/2
        $area=($base*$altura)/2;

        session_start();
        $data=[
            'title_header'=>"Area Triangulo",
            'title'=>"Calcular el Area de un Triangulo",
            'thead'=>[
                'Dato',
                'Valor Ingresado'
            ],
            'rows'=>[
                ['Base',$base],
                ['Altura',$altura],
                ['Area Final',$area]
            ],
            'addons'=>[
                [
                    'name'=>"prefix_route",
                    'value'=>"../"
                ]
            ]
        ];

        $_SESSION['data']=$data;

        type_validation(
            [
                [$base,"numeric"],
                [$altura,"numeric"],
                [$data,"all"]
            ],
            $ruta_retorno,
            $ruta_result
        );
    }

    function variables_return($var_1,$var_2){
        
        global $ruta_retorno;
        global $ruta_result;

        type_validation(
            [
                [$var_1,"all"],
                [$var_2,"all"]
            ],
            $ruta_retorno
        );

        session_start();
        $data=[
            'litle_header'=>"Retorno Variables",
            'title'=>"Ingresar y retornar dos variables",
            'thead'=>[
                'Dato',
                'Valor Ingresado'
            ],
            'rows'=>[
                ["Primera Variable",$var_1],
                ["Segunda Variable",$var_2]
            ],
            'addons'=>[
                [
                    'name'=>'prefix_route',
                    'value'=>'../'
                ]
            ]
        ];

        $_SESSION['data']=$data;

        type_validation(
            [
                [$var_1,"all"],
                [$var_2,"all"],
                [$data,"all"],
            ],
            $ruta_retorno,
            $ruta_result
        );

    }

    function empowerment($base,$exponente){
        
        global $ruta_retorno;
        global $ruta_result;

        type_validation(
            [
                [$base,"numeric"],
                [$exponente,"all"]
            ],
            $ruta_retorno
        );

        $potencia=$base**$exponente;

        session_start();
        $data=[
            'title_header'=>"Potenciacion Estandar",
            'title'=>"Potenciacion",
            'thead'=>[
                'Dato',
                'Valor_ingresado'
            ],
            'rows'=>[
                ['Base',$base],
                ['Exponente',$exponente],
                ['Potencia',$potencia]

            ],
            'addons'=>[
                [
                    'name'=>'prefix_route',
                    'value'=>'../'
                ]
            ]
        ];

        $_SESSION['data']=$data;

        type_validation(
            [
                [$base,"all"],
                [$exponente,"all"],
                [$data,"all"]
            ],
            $ruta_retorno,
            $ruta_result
        );
    }

    function trm($eur,$tasa_cambio){

        global $ruta_retorno;
        global $ruta_result;

        type_validation(
            [
                [$eur,"double"],
                [$tasa_cambio,"numeric"]
            ],
            $ruta_retorno
        );

        $dolares=$eur*$tasa_cambio;

        $data=[
            'title_header'=>'TRM EUR-USD',
            'title'=>'Conversion de Divisas EURO - DOLAR',
            'thead'=>[
                'Dato',
                'Valor Ingresado'
            ],
            'rows'=>[
                ['Euros',$eur],
                ['Tasa de Cambio',$tasa_cambio],
                ['Total Dolares',$dolares]
            ],
            'addons'=>[
                [
                    'name'=>'prefix_route',
                    'value'=>'../'
                ]
            ]
        ];

        session_start();
        $_SESSION['data']=$data;

        type_validation(
            [
                [$eur,"double"],
                [$tasa_cambio,"numeric"],
                [$data,"all"]
            ],
            $ruta_retorno,
            $ruta_result
        );

    }

    function rectangle($base,$altura){

        global $ruta_retorno;
        global $ruta_result;

        type_validation(
            [
                [$base,"numeric"],
                [$altura,"numeric"],
            ],
            $ruta_retorno
        );
        
        //b*h
        $area=$base*$altura;

        session_start();
        $data=[
            'title_header'=>"Area Rectangulo",
            'title'=>"Calcular el Area de un Rectangulo",
            'thead'=>[
                'Dato',
                'Valor Ingresado'
            ],
            'rows'=>[
                ['Base',$base],
                ['Altura',$altura],
                ['Area Final',$area]
            ],
            'addons'=>[
                [
                    'name'=>"prefix_route",
                    'value'=>"../"
                ]
            ]
        ];

        $_SESSION['data']=$data;

        type_validation(
            [
                [$base,"numeric"],
                [$altura,"numeric"],
                [$data,"all"]
            ],
            $ruta_retorno,
            $ruta_result
        );

        echo($area);
    }

    function square($lado){

        global $ruta_retorno;
        global $ruta_result;

        type_validation(
            [
                [$lado,"numeric"]
            ],
            $ruta_retorno
        );

        //l²
        $area=$lado**2;
        //l*4
        $perimitero=$lado*4;

        session_start();
        $data=[
            'title_header'=>"Logitudes Cuadrado",
            'title'=>"Calcular el Area y Perimetro de un cuadrado",
            'thead'=>[
                'Dato',
                'Valor Ingresado'
            ],
            'rows'=>[
                ['Logitud Lado',$lado],
                ['Area',$area],
                ['Perimetro',$perimitero]
            ],
            'addons'=>[
                [
                    'name'=>"prefix_route",
                    'value'=>"../"
                ]
            ]
        ];

        $_SESSION['data']=$data;

        type_validation(
            [
                [$lado,"numeric"],
                [$data,"all"]
            ],
            $ruta_retorno,
            $ruta_result
        );
    }

    function cylinder($radio,$altura){

        global $ruta_retorno;
        global $ruta_result;

        type_validation(
            [
                [$radio,"numeric"],
                [$altura,"numeric"]
            ],
            $ruta_retorno
        );

        /*As=2πr(r+h)*/
        $area=2*pi()*$radio*($radio+$altura);

        /*V=πr^2h*/
        $volumen=pi()*$radio**2*$altura;

        session_start();
        $data=[
            'title_header'=>"Logitudes Cilindro",
            'title'=>"Calcular el Area y Volumen de un Cilindro",
            'thead'=>[
                'Dato',
                'Valor Ingresado'
            ],
            'rows'=>[
                ['Radio',$radio],
                ['Altura',$altura],
                ['Area',$area],
                ['Volumen',$volumen]
            ],
            'addons'=>[
                [
                    'name'=>"prefix_route",
                    'value'=>"../"
                ]
            ]
        ];

        $_SESSION['data']=$data;

        type_validation(
            [
                [$radio,"numeric"],
                [$altura,"numeric"],
                [$data,"all"]
            ],
            $ruta_retorno,
            $ruta_result
        );
    }

    function circle($radio){

        global $ruta_retorno;
        global $ruta_result;

        type_validation(
            [
                [$radio,"numeric"],
            ],
            $ruta_retorno
        );

        //2π*r.
        $longitud=2*pi()*$radio;

        //A = π r²
        $area=pi()*$radio**2;

        session_start();
        $data=[
            'title_header'=>"Logitudes Circulo",
            'title'=>"Calcular el area y la longitud de un Circulo",
            'thead'=>[
                'Dato',
                'Valor Ingresado'
            ],
            'rows'=>[
                ['Radio',$radio],
                ['Area',$area],
                ['Logitud',$longitud]
            ],
            'addons'=>[
                [
                    'name'=>"prefix_route",
                    'value'=>"../"
                ]
            ]
        ];

        $_SESSION['data']=$data;

        type_validation(
            [
                [$radio,"numeric"],
                [$data,'all']
            ],
            $ruta_retorno,
            $ruta_result
        );
    }

    function average($num_1,$num_2,$num_3){

        global $ruta_retorno;
        global $ruta_result;

        type_validation(
            [
                [$num_1,"numeric"],
                [$num_2,"numeric"],
                [$num_3,"numeric"]
            ],
            $ruta_retorno
        );
        
        $promedio=($num_1+$num_2+$num_3)/3;

        session_start();
        $data=[
            'title_header'=>"Promedio Numerico",
            'title'=>"Promedio de 3 numeros",
            'thead'=>[
                'Dato',
                'Valor Ingresado'
            ],
            'rows'=>[
                ['Numero 1',$num_1],
                ['Numero 2',$num_2],
                ['Numero 3',$num_3],
                ['Promedio',$promedio]
            ],
            'addons'=>[
                [
                    'name'=>"prefix_route",
                    'value'=>"../"
                ]
            ]
        ];

        $_SESSION['data']=$data;

        var_dump($data);

        type_validation(
            [
                [$num_1,"numeric"],
                [$num_2,"numeric"],
                [$num_3,"numeric"],
                [$data,'all']
            ],
            $ruta_retorno,
            $ruta_result
        );
    }

    function empowerment_conditional($base,$exponente){
        
        global $ruta_retorno;
        global $ruta_result;

        type_validation(
            [
                [$base,"numeric"],
                [$exponente,"integer"]
            ],
            $ruta_retorno
        );

        $potencia=$base**$exponente;

        session_start();
        $data=[
            'title_header'=>"Potenciacion Condicional",
            'title'=>"Potenciacion de Reales con enteros",
            'thead'=>[
                'Dato',
                'Valor_ingresado'
            ],
            'rows'=>[
                ['Base',$base],
                ['Exponente',$exponente],
                ['Potencia',$potencia]

            ],
            'addons'=>[
                [
                    'name'=>'prefix_route',
                    'value'=>'../'
                ]
            ]
        ];

        $_SESSION['data']=$data;

        type_validation(
            [
                [$base,"numeric"],
                [$exponente,"integer"],
                [$data,"all"]
            ],
            $ruta_retorno,
            $ruta_result
        );
    }

    switch($_GET['function']){

        case "triangle":
            $base=recuperacion_post("base_triangulo");
            $altura=recuperacion_post("altura_triangulo");

            triangle($base,$altura);
        break;

        case "variables_return":
            $var_1=recuperacion_post("primera_variable");
            $var_2=recuperacion_post("segunda_variable");

            variables_return($var_1,$var_2);
        break;

        case "empowerment":
            $base=recuperacion_post("base_potencia");
            $exponente=recuperacion_post("exponente_potencia");
            
            if($exponente==null){
                $exponente=2;
            }

            empowerment($base,$exponente);
        break;

        case "trm":
            $euros=recuperacion_post("cantidad_euros");
            $tasa_cambio=recuperacion_post("tasa_cambio");

            trm($euros,$tasa_cambio);
        break;

        case "rectangle":
            $base=recuperacion_post("base_rectangulo");
            $altura=recuperacion_post("altura_rectangulo");

            rectangle($base,$altura);
        break;

        case "square":
            $lado=recuperacion_post("lado_cuadrado");

            square($lado);
        break;

        case "cylinder":
            $radio=recuperacion_post("radio_cilindro");
            $altura=recuperacion_post("altura_cilindro");

            cylinder($radio,$altura);
        break;

        case "circle":
            $radio=recuperacion_post("radio_circulo");

            circle($radio);
        break;

        case "average":
            $num_1=recuperacion_post("primer_numero");
            $num_2=recuperacion_post("segundo_numero");
            $num_3=recuperacion_post("tercer_numero");

            average($num_1,$num_2,$num_3);
        break;

        case "empowerment_conditional":
            $base=recuperacion_post("base_potencia");
            $exponente=recuperacion_post("exponente_potencia");

            empowerment_conditional($base,$exponente);
        break;

        //En caso de que el valor enviado por la variable GET, no represente una funcion definida, este enviara al usuario nuevamente a la pagina de formularios
        default:
            redireccion_rapida($ruta_retorno);
        break;


    }



?>