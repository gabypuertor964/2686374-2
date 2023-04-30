<?php

    //Recuperacion Valores POST
    function recuperacion_post($valor){
        if(isset($_POST["$valor"]) && $_POST["$valor"]<>null){
            return $_POST["$valor"];
        }else{
            return null;
        }
    }

    function validacion_datos($elements,$failure_route,$success_route=null){

        $validation=TRUE;

        if(count($elements)==0){
            header("Location: ../../../$failure_route");
        }

        foreach($elements as $item){
            if(!isset($item)){
               $validation=FALSE;
            }
        }
        
        if($validation){
            if($success_route<>null){
                header("Location: ../../../$success_route");
            }
        }else{
            header("Location: ../../../$failure_route");
        }
    }

    function numeric_validation($variables,$failure_route){
        foreach($variables as $variable){
            if(!is_numeric($variable)){
                header("Location: ../../../$failure_route");
            }
        }
    }

    function integer_validation($variables,$failure_route){
        foreach($variables as $variable){

            $variable=$variable*1;

            if(!is_int($variable)){
                echo(gettype($variable));   
                //header("Location: ../../../$failure_route");
            }
        }
    }

    function float_validation($variables,$failure_route){
        foreach($variables as $variable){
            if(!is_float($variable)){
                header("Location: ../../../$failure_route");
            }
        }
    }

    

?>