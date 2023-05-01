<?php

    require("../../../addons/functions_global.php");

    //Guardado Valores POST en variables
    $horas_diarias=recuperacion_post("horas_diarias");
    $salario_base=recuperacion_post("salario_base");

    type_validation(
        [
            [$horas_diarias,"numeric"],
            [$salario_base,"numeric"]
        ],
        "views/classnotes/25-04-23/"
    );

    if(isset($_POST['dias_trabajados']) && $_POST['dias_trabajados']<>null){
        $dias_trabajados=$_POST['dias_trabajados'];
    }else{
        $dias_trabajados=5;
    }

    $valor_total=($dias_trabajados*$horas_diarias*$salario_base);

    //Activacion session y guardado de valor calculado, listo para abrir en la nueva vista
    session_start();

    $_SESSION['valor_total']=$valor_total;
    $_SESSION['dias_trabajados']=$dias_trabajados;
    $_SESSION['horas_diarias']=$horas_diarias;
    $_SESSION['salario_base']=$salario_base;

    type_validation(
        [
            [$valor_total,"numeric"]
        ],
        "views/classnotes/25-04-23/",
        "views/classnotes/25-04-23/result.php"
    );
    

?>