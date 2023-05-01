<?php

    require("../../../addons/functions_global.php");

    //Guardado Valores POST en variables
    $horas_diarias=recuperacion_post("horas_diarias");
    $salario_base=recuperacion_post("salario_base");

    var_dump($horas_diarias);
    var_dump($salario_base);

    type_validation(
        [
            [$salario_base,"numeric"],
            [$horas_diarias,"numeric"]
            

        ],
        "views/classnotes/25-04-23",
        "../"
    );

    /*
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
            [$salario_base,"numeric"],
            [$horas_diarias,"numeric"],
        ],
        "views/classnotes/25-04-23",
        "views/result.php"
    );*/
    

?>