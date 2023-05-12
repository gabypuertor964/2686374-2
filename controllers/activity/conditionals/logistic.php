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
                ['content'=>'Nombre Item'],
                ['content'=>'Valor Detallado']
            ],
            'rows'=>[
                [
                    ['content'=>'Numero Ingresado'],
                    ['content'=>$numero]
                ],
                [
                    ['content'=>'Signo'],
                    ['content'=>$signo]
                ],
            ],
            'addons'=>[
                [
                    'name'=>"prefix_route",
                    'value'=>"../"
                ]
            ],
            'route_return'=>$ruta_retorno
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
                ['content'=>'Nombre Item'],
                ['content'=>'Valor Detallado']
            ],
            'rows'=>[
                [
                    ['content'=>'Primer Numero'],
                    ['content'=>$num_1]
                ],
                [
                    ['content'=>'Segundo Numero'],
                    ['content'=>$num_2]
                ],
                [
                    ['content'=>'Numero Mayor'],
                    ['content'=>$numero_mayor]
                ],
                [
                    ['content'=>'Numero Menor'],
                    ['content'=>$numero_menor],
                ],
            ],
            'addons'=>[
                [
                    'name'=>"prefix_route",
                    'value'=>"../"
                ]
            ],
            'route_return'=>$ruta_retorno
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
                ['content'=>'Nombre Item'],
                ['content'=>'Valor Detallado']
            ],
            'rows'=>[
                [
                    ['content'=>'Primer Numero'],
                    ['content'=>$num_1]
                ],
                [
                    ['content'=>'Segundo Numero'],
                    ['content'=>$num_2]
                ],
                [
                    ['content'=>'Tercer Numero'],
                    ['content'=>$num_3]
                ],
                [
                    ['content'=>'Numero Mayor'],
                    ['content'=>$numero_mayor]
                ],
                [
                    ['content'=>'Numero Menor'],
                    ['content'=>$numero_menor],
                ],
            ],
            'addons'=>[
                [
                    'name'=>"prefix_route",
                    'value'=>"../"
                ]
            ],
            'route_return'=>$ruta_retorno
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
                ['content'=>'Nombre Item'],
                ['content'=>'Valor Detallado']
            ],
            'rows'=>[
                [
                    ['content'=>'Nombre'],
                    ['content'=>$nombre]
                ],
                [
                    ['content'=>'Horas estandar'],
                    ['content'=>$horas_estandar]
                ],
                [
                    ['content'=>'Salario base'],
                    ['content'=>"$ $salario_base"]
                ],
                [
                    ['content'=>'Horas extra'],
                    ['content'=>$horas_extra]
                ],
                [
                    ['content'=>'Valor horas extra'],
                    ['content'=>"$ $salario_extra"],
                ],
                [
                    ['content'=>'Salario Total'],
                    ['content'=>"$ $salario"],
                ],
            ],
            'addons'=>[
                [
                    'name'=>"prefix_route",
                    'value'=>"../"
                ]
            ],
            'route_return'=>$ruta_retorno
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
                ['content'=>'Nombre Item'],
                ['content'=>'Valor Detallado']
            ],
            'rows'=>[
                [
                    ['content'=>'Dividendo'],
                    ['content'=>$dividendo]
                ],
                [
                    ['content'=>'Divisor'],
                    ['content'=>$divisor]
                ],
                [
                    ['content'=>'Cociente'],
                    ['content'=>"$cociente"]
                ],
                [
                    ['content'=>'Residuo'],
                    ['content'=>$residuo]
                ]
            ],
            'addons'=>[
                [
                    'name'=>"prefix_route",
                    'value'=>"../"
                ]
            ],
            'route_return'=>$ruta_retorno
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
            'title_header'=>"Detallado Division",
            'title'=>"Detallado division entre A y B",
            'thead'=>[
                ['content'=>'Nombre Item'],
                ['content'=>'Valor Detallado']
            ],
            'rows'=>[
                [
                    ['content'=>'Numero de Dia'],
                    ['content'=>$num_day]
                ],
                [
                    ['content'=>'Nombre del Dia'],
                    ['content'=>$dia]
                ]
            ],
            'addons'=>[
                [
                    'name'=>"prefix_route",
                    'value'=>"../"
                ]
            ],
            'route_return'=>$ruta_retorno
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
                ['content'=>'Nombre Item'],
                ['content'=>'Valor Detallado']
            ],
            'rows'=>[
                [
                    ['content'=>'Numero A'],
                    ['content'=>$num_a]
                ],
                [
                    ['content'=>'Numero B'],
                    ['content'=>$num_b]
                ],
                [
                    ['content'=>'Operacion'],
                    ['content'=>"$operacion"]
                ],
                [
                    ['content'=>'Resultado'],
                    ['content'=>$resultado]
                ]
            ],
            'addons'=>[
                [
                    'name'=>"prefix_route",
                    'value'=>"../"
                ]
            ],
            'route_return'=>$ruta_retorno
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
        
        //Adicion Ceros a la izquierda en caso de que el numero de dia sea de una sola cifra
        if(strlen($dia)==1){
            $dia="0".$dia;
        }

        //Concatenacion fecha y dia
        $date=create_date($dia,$mes);

        if($date>=create_date(21,03) && $date<=create_date(19,04)){

            $signo="Aries";
            $limite_inferior="21 de Marzo";
            $limite_superior="19 de Abril";

        }elseif($date>=create_date(20,4) && $date<=create_date(20,5)){

            $signo="Tauro";
            $limite_inferior="20 de Abril";
            $limite_superior="20 de Mayo";

        }elseif($date>=create_date(21,5) && $date<=create_date(20,6)){

            $signo="Geminis";
            $limite_inferior="21 de Mayo";
            $limite_superior="20 de Abril";

        }elseif($date>=create_date(21,6) && $date<=create_date(22,7)){

            $signo="Cancer";
            $limite_inferior="21 de Junio";
            $limite_superior="22 de Julio";

        }elseif($date>=create_date(23,7) && $date<=create_date(22,8)){

            $signo="Leo";
            $limite_inferior="21 de Julio";
            $limite_superior="22 de Agosto";

        }elseif($date>=create_date(23,8) && $date<=create_date(22,9)){

            $signo="Virgo";
            $limite_inferior="23 de Agosto";
            $limite_superior="22 de Septiembre";
            
        }elseif($date>=create_date(23,9) && $date<=create_date(22,10)){

            $signo="Libra";
            $limite_inferior="23 de Septiembre";
            $limite_superior="22 de Octubre";
            
        }elseif($date>=create_date(23,10) && $date<=create_date(21,11)){

            $signo="Escorpio";
            $limite_inferior="23 de Octubre";
            $limite_superior="21 de Noviembre";
            
        }elseif($date>=create_date(22,11) && $date<=create_date(21,12)){

            $signo="Sagitario";
            $limite_inferior="22 de Noviembre";
            $limite_superior="21 de Diciembre";

        }elseif($date>=create_date(20,1) && $date<=create_date(18,2)){

            $signo="Acuario";
            $limite_inferior="20 de Enero";
            $limite_superior="18 de Febrero";

        }elseif($date>=create_date(19,2) && $date<=create_date(20,3)){

            $signo="Piscis";
            $limite_inferior="29 de Febrero";
            $limite_superior="20 de Marzo";

        }else{
            redireccion_rapida($ruta_retorno);
        }

        session_start();

        $data=[
            'title_header'=>"Signo Zodiacal",
            'title'=>"Conocer el signo zodical",
            'thead'=>[
                ['content'=>'Nombre Item'],
                ['content'=>'Valor Detallado']
            ],
            'rows'=>[
                [
                    ['content'=>'Dia Nacimiento'],
                    ['content'=>$dia]
                ],
                [
                    ['content'=>'Mes Nacimiento'],
                    ['content'=>$mes]
                ],
                [
                    ['content'=>'Signo Zodiacal'],
                    ['content'=>"$signo"]
                ],
                [
                    ['content'=>'Limte Inferior'],
                    ['content'=>$limite_inferior]
                ],
                [
                    ['content'=>'Limte Superior'],
                    ['content'=>$limite_superior]
                ],
            ],
            'addons'=>[
                [
                    'name'=>"prefix_route",
                    'value'=>"../"
                ]
            ],
            'route_return'=>$ruta_retorno
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
        );
        
    }

    function discount($precio){
        global $ruta_result;
        global $ruta_retorno;

        type_validation(
            [
                [$precio,"numeric"]
            ],
            $ruta_retorno
        );

        if($precio<100000){
            $descuento=5;
        }elseif($precio>=100000 && $precio<200000){  
            $descuento=10;
        }else{
            $descuento=15;
        }

        $valor_final=$precio-($precio*($descuento/100));

        session_start();

        $data=[
            'title_header'=>"Descuentos",
            'title'=>"Aplicar escuento segun el precio",
            'thead'=>[
                ['content'=>'Nombre Item'],
                ['content'=>'Valor Detallado']
            ],
            'rows'=>[
                [
                    ['content'=>'Precio Inicial'],
                    ['content'=>"$$precio"]
                ],
                [
                    ['content'=>'Descuento'],
                    ['content'=>"$descuento%"]
                ],
                [
                    ['content'=>'Valor Final'],
                    ['content'=>"$$valor_final"]
                ]
            ],
            'addons'=>[
                [
                    'name'=>"prefix_route",
                    'value'=>"../"
                ]
            ],
            'route_return'=>$ruta_retorno
        ];

        $_SESSION['data']=$data;

        type_validation(
            [
                [$precio,"numeric"],
                [$data,'all']
            ],
            $ruta_retorno,
            $ruta_result
        );

    }

    function classify_births($days,$moths,$years,$genders){
        global $ruta_result;
        global $ruta_retorno;

        type_validation(
            [
                [
                    $days,
                    "array",
                    [
                        ['min_equal',1],
                        ['max_equal',31]
                    ]
                ],
                [
                    $moths,
                    "array",
                    [
                        ['min_equal',1],
                        ['max_equal',12]
                    ]
                ],
                [
                    $years,
                    "array",
                    [
                        ['min_equal',2004],
                        ['max_equal',date('Y')]
                    ]
                ],
                [
                    $genders,
                    "array"
                ]

            ],
            $ruta_retorno
        );

        $male=0;
        $female=0;

        foreach($genders as $gender){
            if($gender=="masculino"){
                $male++;
            }elseif($gender=="femenino"){
                $female++;
            }
        }

        session_start();

        $data=[
            'title_header'=>"Clasificacion Nacimientos",
            'title'=>"Clasificacion de Nacimientos por Sexo",
            'thead'=>[
                ['content'=>'Nombre Item'],
                ['content'=>'Valor Detallado']
            ],
            'rows'=>[
                [
                    ['content'=>'Sexo Masculino'],
                    ['content'=>$male]
                ],
                [
                    ['content'=>'Sexo Femenino'],
                    ['content'=>$female]
                ],
                [
                    ['content'=>'Total de nacimientos'],
                    ['content'=>count($genders)]
                ]
            ],
            'addons'=>[
                [
                    'name'=>"prefix_route",
                    'value'=>"../"
                ]
            ],
            'route_return'=>$ruta_retorno
        ];


        $_SESSION['data']=$data;

        type_validation(
            [
                [
                    $days,
                    "array",
                    [
                        ['min_equal',1],
                        ['max_equal',31]
                    ]
                ],
                [
                    $moths,
                    "array",
                    [
                        ['min_equal',1],
                        ['max_equal',12]
                    ]
                ],
                [
                    $years,
                    "array",
                    [
                        ['min_equal',2004],
                        ['max_equal',date('Y')]
                    ]
                ],
                [
                    $genders,
                    "array"
                ],
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

        case "discount":
            $precio=recuperacion_post("precio");
    
            discount($precio);
        break;

        case "classify_births":
            $days=recuperacion_post("dia_nacimiento");
            $moths=recuperacion_post("mes_nacimiento");
            $years=recuperacion_post("año_nacimiento");
            $genders=recuperacion_post("sexo_nacimiento");
            
            classify_births($days,$moths,$years,$genders);
        break;

        default:
            redireccion_rapida($ruta_retorno);
        break;

    }
?>