<?php

    require("../../../addons/functions_global.php");

    //Guardado Valores POST en variables
    $cantidad_horas=recuperacion_post("cantidad_horas");
    $valor_hora=recuperacion_post("valor_hora");
    $dias_trabajados=recuperacion_post("dias_trabajados");

    type_validation(
        [
            [$cantidad_horas,"numeric"],
            [$valor_hora,"numeric"]
        ],
        "views/classnotes/25-04-23"
    );
    
    if($dias_trabajados==null){
        $dias_trabajados=5;
    }

    $salario_total=($dias_trabajados*$cantidad_horas*$valor_hora);

    session_start();

        $data=[
            'title_header'=>"Salario Trabajador",
            'title'=>"Conocer el Salario de un trabajador",
            'thead'=>[
                ['content'=>'Nombre Item'],
                ['content'=>'Valor Detallado']
            ],
            'rows'=>[
                [
                    ['content'=>'Dias Trabajados'],
                    ['content'=>$dias_trabajados]
                ],
                [
                    ['content'=>'Horas Dias trabajadas'],
                    ['content'=>$cantidad_horas]
                ],
                [
                    ['content'=>'Valor Hora'],
                    ['content'=>"$$valor_hora"]
                ],
                [
                    ['content'=>'Salario Total'],
                    ['content'=>"$$salario_total"]
                ],
            ],
            'addons'=>[
                [
                    'name'=>"prefix_route",
                    'value'=>"../"
                ]
            ],
            'route_return'=>"views/classnotes/25-04-23"
        ];


    $_SESSION['data']=$data;

    type_validation(
        [
            [$dias_trabajados,"numeric"],
            [$salario_total,"numeric"],
            [$data ,"all"]
        ],
        "views/classnotes/25-04-23",
        "views/result.php"
    );
?>