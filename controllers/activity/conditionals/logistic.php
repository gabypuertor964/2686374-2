<?php

    require("../../../addons/functions_global.php");

    $ruta_retorno="views/activity/conditionals";
    $ruta_result="views/result.php";
    type_validation([[$_GET['function'],"all"]],$ruta_retorno);
    
    function positive_negative($numero){
        global $ruta_retorno;
        global $ruta_result;

        if($numero>0){
            $signo="Positivo";
        }else{
            $signo="Negativo";
        }

        session_start();
        $data=[
            'title_header'=>"Signo del Numero",
            'title'=>"Conocer el Signo de un numero",
            'thead'=>[
                'Dato',
                'Valor Ingresado'
            ],
            'rows'=>[
                ['Numero Ingresado',$numero],
                ['Signo',$signo]
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
                [$numero,'numeric'],
                [$data,'all']
            ],
            $ruta_retorno,
            $ruta_result
        );

    }

    function elderly($num_1,$num_2){
        global $ruta_retorno;
        global $ruta_result;

        $max=max($num_1,$num_2);
        $min=min($num_1,$num_2);

        switch($max){
            case $num_1:
                $numero_mayor="Primer Numero";
                $numero_menor="Segundo Numero";
            break;

            case $min:
                $numero_mayor="Son Iguales";
                $numero_menor="Son Iguales";
            break;

            case $num_2:
                $numero_mayor="Segundo Numero";
                $numero_menor="Primer Numero";
            break;
        }

        session_start();
        $data=[
            'title_header'=>"Identificar Mayor",
            'title'=>"Identificar el numero mayor",
            'thead'=>[
                'Dato',
                'Valor Ingresado'
            ],
            'rows'=>[
                ['Primer Numero',$num_1],
                ['Segundo Numero',$num_2],
                ['Numero mayor',$numero_mayor],
                ['Numero menor',$numero_menor]
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
                [$num_1,'numeric'],
                [$num_2,'numeric'],
                [$data,'all']
            ],
            $ruta_retorno,
            $ruta_result
        );

    }

    function elderly_minor($num_1,$num_2,$num_3){
        global $ruta_retorno;
        global $ruta_result;

        $max=max($num_1,$num_2,$num_3);
        $min=min($num_1,$num_2,$num_3);

        //Identificacion Numero Mayor
        switch($max){

            case $num_1:
                $numero_mayor="Primer Numero";
            break;

            case $num_2:
                $numero_mayor="Segundo Numero";
            break;

            case $num_3:
                $numero_mayor="Tercer Numero";
            break;
        }

        //Identificacion Numero menor
        switch($min){

            case $num_1:
                $numero_menor="Primer Numero";
            break;

            case $num_2:
                $numero_menor="Segundo Numero";
            break;

            case $num_3:
                $numero_menor="Tercer Numero";
            break;
        }

        //Excepcion Numeros iguales (Max)
        switch($max){
            case $num_1==$num_2:
                $numero_menor="El primer Y segundo numero son iguales";
            break;

            case $num_1==$num_3:
                $numero_menor="El primer Y tercer numero son iguales";
            break;

            case $num_2==$num_3:
                $numero_menor="El segundo Y tercer numero son iguales";
            break;

        }

        //Excepcion Numeros iguales (Min)
        switch($min){

            case $num_1==$num_2:
                $numero_menor="El primer Y segundo numero son iguales";
            break;

            case $num_1==$num_3:
                $numero_menor="El primer Y tercer numero son iguales";
            break;

            case $num_2==$num_3:
                $numero_menor="El segundo Y tercer numero son iguales";
            break;
        }

        //Excepcion todos los numeros iguales
        if($num_1==$num_2 && $num_2==$num_3){
            $numero_mayor="Los numeros son iguales";
            $numero_menor="Los numeros son iguales";
        }


        session_start();
        $data=[
            'title_header'=>"Identificar Mayor",
            'title'=>"Identificar el numero mayor",
            'thead'=>[
                'Dato',
                'Valor Ingresado'
            ],
            'rows'=>[
                ['Primer Numero',$num_1],
                ['Segundo Numero',$num_2],
                ['Tercer Numero',$num_3],
                ['Numero mayor',$numero_mayor],
                ['Numero menor',$numero_menor]
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
                [$num_1,'numeric',0],
                [$num_2,'numeric',0],
                [$num_3,'numeric',0],
                [$data,'all',0]
            ],
            $ruta_retorno,
            $ruta_result
        );

    }

    function salary($nombre,$horas_trabajadas){

        global $ruta_retorno;
        global $ruta_result;

        $valor_hora=40000;

        if($horas_trabajadas>48){
            $horas_extra=$horas_trabajadas-48;

            $salario_base=48*$valor_hora;
            $salario_extra=$horas_extra*$valor_hora;

            $salario=$salario_base+$salario_extra;
        }else{
            $salario=$horas_trabajadas*$valor_hora;
        }

        session_start();
        $data=[
            'title_header'=>"Identificar Mayor",
            'title'=>"Identificar el numero mayor",
            'thead'=>[
                'Dato',
                'Valor Ingresado'
            ],
            'rows'=>[
                ['Primer Numero',$salario]
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
                [$data,'all']
            ],
            $ruta_retorno,
            $ruta_result
        );
    }

    switch($_GET['function']){
        case 'positive_negative':
            $numero=recuperacion_post("numero");

            positive_negative($numero);
        break;

        case 'elderly':
            $num_1=recuperacion_post("primer_numero");
            $num_2=recuperacion_post("segundo_numero");

            elderly($num_1,$num_2);
        break;

        case 'elderly_minor':
            $num_1=recuperacion_post("primer_numero");
            $num_2=recuperacion_post("segundo_numero");
            $num_3=recuperacion_post("tercer_numero");

            elderly_minor($num_1,$num_2,$num_3);
        break;

        case 'salary':
            $nombre=recuperacion_post("nombre_trabajador");
            $horas_trabajadas=recuperacion_post("horas_trabajadas");

            salary($nombre,$horas_trabajadas);
        break;
    }

    
?>