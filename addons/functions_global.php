<?php

    //Recuperacion Valores POST
    function recuperacion_post($valor){
        if(isset($_POST["$valor"]) && $_POST["$valor"]<>null){
            return $_POST["$valor"];
        }else{
            return null;
        }
    }

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

                    //Validacion general
                    default:
                        if($type_data==$type_validation OR $type_validation=="all"){
                            $validation=TRUE;
                        }
                    break;
                }

            }
            
            //Adicion registro resultado validacion a historial
            array_push($history,$validation);        
        }
        
        /*
            1. array_unique(): Elimina los registros duplicados
            2. count(): Cuenta los elementos dentro de un arreglo

            Durante la primera etapa de validacion se eliminan los registros duplicados y se revisa que solo haya un unico registro, esto ya que si aun despues de simplificar, quedan dos registros diferentes es por que alguna validacion fallo.

            Asi mismo en caso de solo quedar un valor, se valida que este sea VERDADERO
        */
        if(count(array_unique($history))==1 && array_unique($history)[0]==TRUE){
            if($success_route<>null){
                header("Location: ../../../$success_route");
            }
        }else{
            header("Location: ../../../$failure_route");
        }

        
    
    } 
?>