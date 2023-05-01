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

        //Variable de Control
        $validation=TRUE;

        
        foreach($elements_validations as $element_validation){

            //Guardado valor del dato para facilitar su manejo;
            $value=$element_validation[0];

            //Primera Validacion: Los datos estan definidos y no estan vacios (Aplica tanto a arreglos como a variables estandar)
            if(isset($value) && $value<>NULL)
            {

                //Excepcion 1: Validacion Existencia Contenido $_GET
                if(is_array($value) AND count($value)==0){
                   $validation=FALSE;
                }

                //Clasificacion del dato entrante (Number, String)
                if(is_numeric($value)){

                    //Una vez detectada la variable como number,se transformara de string a numeric, simplemente multiplicando por 1
                    $value=$value*1;

                    //Identificacion especifica tipo Dato
                    $type_variable=gettype($value);

                }else{
                    $type_variable="string";
                }


                //Guardado de Arreglo validations en una variable para facilitar su uso
                $type_validation=$element_validation[1];

                switch($type_validation){

                    //Caso excepcional 1 (numeric): Que la variable sea numerica sin definir si es integer o double
                    case 'numeric':
                        if(
                            !($type_validation=="numeric" && 
                            is_numeric($value))
                        ){
                            $validation=FALSE;
                        }
                    break;

                    //Validaciones estandar: Integer, Double, etc
                    default:

                        //En caso de no concordar el tipo de variable con los el tipo de dato ingresado, se informara que la validacion no fue exitosa

                        //Caso Excepcional 2 (all): Simplemente este definida, sin ningun tipo en especifico
                        if(
                            !($type_variable==$type_validation) && $type_validation<>"all"
                        ){
                            $validation=FALSE;
                        }

                    break;
                }
                
                if($validation){

                    if($addons['route_absolute']==true){
                        header("Location: $success_route");
                    }else{
    
                        //Si se definio una "success_route", en caso de que la validacion sea exitosa, el usuario sera redirigido a dicha ruta, en caso de no haber sido definida no pasara nada
                        if($success_route<>null){
                            header("Location: ../../../$success_route");
                        }
                    }

                //En caso de que la validacion no fuera exitosa se redigira al usuario a la "$failure_route"
                }else{
                    header("Location: ../../../$failure_route");
                }

            }else{

                //Excepcion: Definicion manual de ruta de retorno en caso de usar un sistema de directorios diferente
                if($addons['route_absolute']==true){
                    header("Location: $failure_route");
                }else{

                    //En caso de fallar la validacion sera retornada a la "$failure_route"
                    header("Location: ../../../$failure_route");
                }
            }
        }
        
    } 
?>