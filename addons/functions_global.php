<?php

    //Recuperacion Valores POST
    function recuperacion_post($valor){
        if(isset($_POST["$valor"]) && $_POST["$valor"]<>null){
            return $_POST["$valor"];
        }else{
            return null;
        }
    }

    //Validacion Datos
    function type_validation($elements_validations,$failure_route,$success_route=null,$addons=null){

        $history=[];

        foreach($elements_validations as $element_validation){

            //Definicion Variable de control
            $validation=FALSE;

            //Obtencion y guardado del dato a validar
            $valor=$element_validation[0];

            if(isset($valor) && $valor<>null){

                //En caso de ser posible se realiza la respectiva conversion de string a numeric (Tanto integer como float)
                if(is_numeric($valor)){
                    $valor=$valor*1;
                }

                //Guardado tipo de dato
                $type_data=gettype($valor);

                //Almacena tipo de dato a validar
                $type_validation=$element_validation[1];

                //Validaciones general y especificas
                switch($type_validation){

                    //Validacion Solo numerica (integer,double)
                    case "numeric":
                        if(is_numeric($valor)){
                            $validation=TRUE;
                        }
                    break;

                    case "array":

                        $history_array=[];

                        foreach($valor as $item){
                            if(is_null($item) OR $item==""){
                                array_push($history_array,FALSE);
                            }else{
                                array_push($history_array,TRUE);
                            }
                        }

                        if(count(array_unique($history_array))==1 && array_unique($history_array)[0]==TRUE){
                            $validation=TRUE;   
                        }

                    break;

                    //Validacion general
                    default:
                        if($type_data==$type_validation OR $type_validation=="all"){
                            $validation=TRUE;
                        }
                    break;
                }
            
                //VALIDACIONES ESPECIALIZADAS
                if(isset($element_validation[2])){

                    $addons_validation=$element_validation[2];
                    $history_addons=[];

                    foreach($addons_validation as $addon){

                        $validation_addons=FALSE;
                        $name_addon=$addon[0];
                        $value_addon=$addon[1];

                        switch($name_addon){
                            case 'min':

                                if(is_array($valor)){

                                    $history_array_addons=[];

                                    foreach($valor as $item){
                                        if($item>$value_addon){
                                            array_push($history_array_addons,TRUE);
                                        }else{
                                            array_push($history_array_addons,FALSE); 
                                        }
                                    }

                                    if((
                                        count(array_unique($history_array_addons))==1 && 
                                        
                                        array_unique($history_array_addons)[0]==TRUE
                                    )){
                                        $validation_addons=TRUE;
                                    }

                                }else{
                                    if($valor>$value_addon){
                                        $validation_addons=TRUE;
                                    }
                                }

                            break;

                            case 'min_equal':
                                if($valor>=$value_addon){
                                    $validation_addons=TRUE;
                                }
                            break;

                            case 'max_equal':
                                if($valor<=$value_addon){
                                    $validation_addons=TRUE;
                                }
                            break;

                            case 'max':
                                if($valor<$value_addon){
                                    $validation_addons=TRUE;
                                }
                            break;
                        }

                        array_push($history_addons,$validation_addons);
                    }


                    if(!(count(array_unique($history_addons))==1 && array_unique($history_addons)[0]==TRUE)){
                        $validation=FALSE;   
                    }
                    
                }
                
            }

            echo(var_dump($element_validation)."<br>");
            echo(var_dump($validation)."<br>");
            echo("<br>");
            
            //Adicion registro resultado validacion a historial
            array_push($history,$validation);    
            
            echo(var_dump($element_validation)."<br>");
            echo(var_dump($history)."<br>");
            echo("<br>");
        }

        if($addons<>null && is_array($addons)){
            foreach($addons as $addon){

                switch($addon['name']){
                    case "route_absolute":
                        $prefix="";
                    break;
                }

            }
        }else{
            $prefix="../../../";
        }

        /*
            1. array_unique(): Elimina los registros duplicados
            2. count(): Cuenta los elementos dentro de un arreglo

            Durante la primera etapa de validacion se eliminan los registros duplicados y se revisa que solo haya un unico registro, esto ya que si aun despues de simplificar, quedan dos registros diferentes es por que alguna validacion fallo.

            Asi mismo en caso de solo quedar un valor, se valida que este sea VERDADERO
        */

        if(count(array_unique($history))==1 && array_unique($history)[0]==TRUE){
            if($success_route<>null){
                //header("Location: $prefix$success_route");
            }
        }else{
            //header("Location: $prefix$failure_route");
        }
    
    }

    //Creacion Fechas
    function create_date($day,$moth,$year=null){

        //Definicion Zona Horaria Bogota
        date_default_timezone_set("America/Bogota");

        //En caso de no definir el año por defecto tomara el valor de 2000
        if(is_null($year)){
            $year="2000";
        }

        //Validar si la fecha ingresada existe
        if(checkdate($moth,$day,$year)){
            //Generacion fecha y posterior retorno
            $fecha_generada=new DateTime("$day-$moth-$year");
            return $fecha_generada;    
        }else{
            return null;
        }
        
    }

    //Redireccion Rapida para else
    function redireccion_rapida($ruta){
        header("Location: ../../../$ruta");
    }    
?>