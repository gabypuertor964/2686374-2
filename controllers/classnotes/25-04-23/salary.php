<?php

    require("../../../addons/functions_global.php");

    //Guardado Valores POST en variables
    $horas_diarias=recuperacion_post("horas_diarias");
    $salario_base=recuperacion_post("salario_base");


    if(isset($_POST['dias_trabajados']) && $_POST['dias_trabajados']<>null){
        $dias_trabajados=$_POST['dias_trabajados'];
    }else{
        $dias_trabajados=5;
    }

    $salario_total=($dias_trabajados*$horas_diarias*$salario_base);

    //Activacion session y guardado de valor calculado, listo para abrir en la nueva vista
    session_start();

    $data=[
        'title_header'=>"Salario Trabajador",
        'title'=>"Salario Trabajador",
        'thead'=>[
            'Dato',
            'Valor Ingresado'
        ],
        'rows'=>[
            ['Dias trabajados',$dias_trabajados],
            ['Horas Diarias Trabajadas',$horas_diarias],
            ['Salario base',"$$salario_base"],
            ['Salario total',"$$salario_total"],
        ]
    ];

    $_SESSION['data']=$data;

    type_validation(
        [
            [$horas_diarias,"numeric"],
            [$salario_base,"numeric"]
        ],
        "views/classnotes/26-04-23",
        "views/result.php"
    );
    

?>