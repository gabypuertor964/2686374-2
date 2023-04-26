<?php

    //Funcion Validadora Existencia POST
    function validar_post($valor){
        if(isset($_POST["$valor"]) && $_POST["$valor"]<>null){
            return $_POST["$valor"];
        }else{
            header("Location: ../../../views/classnotes/25-04-23/");
        }
    }

    //Guardado Valores POST en variables
    $horas_diarias=validar_post("horas_diarias");
    $salario_base=validar_post("salario_base");

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

    header("Location: ../../../views/classnotes/25-04-23/result.php");

?>