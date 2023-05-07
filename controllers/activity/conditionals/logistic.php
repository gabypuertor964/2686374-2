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
        }elseif($numero<0){
            $signo="Negativo";
        }else{
            $signo="No tiene Signo";
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

        type_validation(
            [
                [$nombre,'string'],
                [$horas_trabajadas,'numeric']
            ],
            $ruta_retorno
        );

        $valor_hora=40000;

        if($horas_trabajadas>48){
            $horas_extra=$horas_trabajadas-48;
            $horas_estandar=48;

            $salario_base=$horas_estandar*$valor_hora;
            $salario_extra=$horas_extra*$valor_hora*2;
        }else{
            $horas_extra=0;
            $horas_estandar=$horas_trabajadas;

            $salario_base=$horas_estandar*$valor_hora;
            $salario_extra=0;
        }

        $salario=$salario_base+$salario_extra;

        session_start();
        $data=[
            'title_header'=>"Salario trabajador",
            'title'=>"Conocer el Salario del Trabajador",
            'thead'=>[
                'Dato',
                'Valor Ingresado'
            ],
            'rows'=>[
                ['Nombre',$nombre],
                ['Horas Estandar', $horas_estandar],
                ['Salario Base', "$ $salario_base"],
                ['Horas Extra',$horas_extra],
                ['Valor horas Extra',"$ $salario_extra"],
                ['Total',"$ $salario"]
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

    function quotient($dividendo,$divisor){
        global $ruta_retorno;
        global $ruta_result;

        type_validation(
            [
                [$divisor,"numeric",0]
            ],
            $ruta_retorno
        );

        $cociente=$dividendo/$divisor;
        
        if(is_float($cociente)){
            $separacion=explode(".",$cociente);

            //Obtencion Parte entera del cociente
            $parte_entera=$separacion[0];

            //Obtencion Parte decimal del cociente (Corresponde al residuo)
            $parte_decimal=$cociente-$parte_entera;

            //Sobreescritura valor cociente para su conversion a entero
            $cociente=$cociente-$parte_decimal;

            //Obtencion del residuo entero
            $residuo=$parte_decimal*$divisor;                
        }else{
            $residuo=0;
        }
        
        session_start();
        $data=[
            'title_header'=>"Detallado Division",
            'title'=>"Detallado division entre A y B",
            'thead'=>[
                'Dato',
                'Valor Ingresado'
            ],
            'rows'=>[
                ['Dividendo', $dividendo],
                ['Divisor',$divisor],
                ['Cociente',$cociente],
                ['Residuo',$residuo]
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
                [$dividendo,"numeric"],
                [$data,'all']
            ],
            $ruta_retorno,
            $ruta_result
        );

    }

    function day_week($num_day){

        global $ruta_retorno;
        global $ruta_result;

        switch($num_day){
            case 1:
                $dia="Lunes";
            break;

            case 2:
                $dia="Martes";
            break;

            case 3:
                $dia="Miercoles";
            break;

            case 4:
                $dia="Jueves";
            break;

            case 5:
                $dia="Viernes";
            break;

            case 6:
                $dia="Sabado";
            break;

            case 7:
                $dia="Domingo";
            break;
        }
        
        session_start();
        $data=[
            'title_header'=>"Dia Semana",
            'title'=>"Identificador Dia de la semana",
            'thead'=>[
                'Dato',
                'Valor Ingresado'
            ],
            'rows'=>[
                ['Numero del dia', $num_day],
                ['Nombre del dia',$dia]
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
                [
                    $num_day,
                    "integer",
                    [
                        ['min_equal',1],
                        ['max_equal',7]
                    ]
                ],
                [$data,'all']
            ],
            $ruta_retorno,
            $ruta_result
        );
        
    }

    function operations($num_a,$num_b){
        global $ruta_retorno;
        global $ruta_result;

        type_validation(
            [
                [$num_a,"numeric"],
                [$num_b,"numeric"],
            ],  
            $ruta_retorno
        );

        if($num_a<0 OR $num_b<0){
            $operacion="Suma";
            $resultado=$num_a+$num_b;
        }else{
            $operacion="Multiplicacion";
            $resultado=$num_a*$num_b;
        }

        session_start();
        $data=[
            'title_header'=>"Operaciones Aritmeticas",
            'title'=>"Operaciones Aritmeticas segun el signo",
            'thead'=>[
                'Dato',
                'Valor Ingresado'
            ],
            'rows'=>[
                ['Numero A', $num_a],
                ['Numero B', $num_b],
                ['Operacion', $operacion],
                ['Resultado',$resultado]
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
                [$num_a,"numeric"],
                [$num_b,"numeric"],
                [$data,'all']
            ],
            $ruta_retorno,
            $ruta_result
        );


        
    }

    function sign($dia,$mes){
        global $ruta_retorno;
        global $ruta_result;        

        type_validation(
            [
                [
                    $dia,
                    "integer",
                    [
                        ['min_equal',1],
                        ['max_equal',31]
                    ]
                ],
                [
                    $mes,
                    "integer",
                    [
                        ['min_equal',1],
                        ['max_equal',12]
                    ]
                ]
            ],
            $ruta_retorno
        );
        
        $numeric_date=($mes.$dia.)*1;

        if($numeric_date>=2103 && $numeric_date<=1904){

            $signo="Aries";
            $limite_inferior="21 de Marzo";
            $limite_superior="19 de Abril";

        }elseif($numeric_date>=2004 && $numeric_date<=2005){

            $signo="Tauro";
            $limite_inferior="20 de Abril";
            $limite_superior="20 de Mayo";

        }elseif($numeric_date>=2105 && $numeric_date<=2006){

            $signo="Geminis";
            $limite_inferior="21 de Mayo";
            $limite_superior="20 de Abril";

        }elseif($numeric_date>=2106 && $numeric_date<=2207){

            $signo="Cancer";
            $limite_inferior="21 de Junio";
            $limite_superior="22 de Julio";

        }elseif($numeric_date>=2307 && $numeric_date<=2208){

            $signo="Leo";
            $limite_inferior="21 de Julio";
            $limite_superior="22 de Agosto";

        }elseif($numeric_date>=2308 && $numeric_date<=2209){

            $signo="Virgo";
            $limite_inferior="23 de Agosto";
            $limite_superior="22 de Septiembre";
            
        }elseif($numeric_date>=2309 && $numeric_date<=2210){

            $signo="Libra";
            $limite_inferior="23 de Septiembre";
            $limite_superior="22 de Octubre";
            
        }elseif($numeric_date>=2310 && $numeric_date<=2111){

            $signo="Escorpio";
            $limite_inferior="23 de Octubre";
            $limite_superior="21 de Noviembre";
            
        }elseif($numeric_date>=2211 && $numeric_date<=2112){

            $signo="Sagitario";
            $limite_inferior="22 de Noviembre";
            $limite_superior="21 de Diciembre";
            
        }elseif($numeric_date>=2212 && $numeric_date<=1901){

            $signo="Sagitario";
            $limite_inferior="22 de Diciembre";
            $limite_superior="19 de Enero";
            
        }elseif($numeric_date>=2001 && $numeric_date<=1802){

            $signo="Acuario";
            $limite_inferior="20 de Enero";
            $limite_superior="18 de Febrero";
            
        }elseif($numeric_date>=1902 && $numeric_date<=2003){

            $signo="Piscis";
            $limite_inferior="29 de Febrero";
            $limite_superior="20 de Marzo";
            
        }else{
            echo($numeric_date);
        }

        /*['Fecha Inicial Signo',$limite_inferior],session_start();
        $data=[
            'title_header'=>"Signo Sodiacal",
            'title'=>"Identificar El signo sodiacal",
            'thead'=>[
                'Dato',
                'Valor Ingresado'
            ],
            'rows'=>[
                ['Numero del dia', $dia],
                ['Numero del Mes',$mes],
                ['Signo Sodiacal',$signo],
                ['Fecha Inicial Signo',$limite_inferior],
                ['Fecha Final Signo',$limite_superior],
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
                [
                    $dia,
                    "integer",
                    [
                        ['min_equal',1],
                        ['max_equal',31]
                    ]
                ],
                [
                    $mes,
                    "integer",
                    [
                        ['min_equal',1],
                        ['max_equal',12]
                    ]
                ],
                [$data,'all']
            ],
            $ruta_retorno,
            $ruta_result
        );*/
        
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

        case 'quotient':
            $dividendo=recuperacion_post("numero_a");
            $divisor=recuperacion_post("numero_b");

            quotient($dividendo,$divisor);
        break;

        case 'day_week':
            $num_day=recuperacion_post("num_dia");

            day_week($num_day);
        break;

        case 'operations':
            $num_a=recuperacion_post("numero_a");
            $num_b=recuperacion_post("numero_b");

            operations($num_a,$num_b);
        break;

        case "sign":
            $dia=recuperacion_post("dia_nacimiento");
            $mes=recuperacion_post("mes_nacimiento");

            sign($dia,$mes);
        break;
    }

    
?>