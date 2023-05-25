<?php

    class cuenta{

        //Atributos de la cuenta
        private $nombreCliente;
        private $numCuenta;
        private $saldoCuenta;
        private $passwordAccount;


        /*
            Funcion encargada de validar si la contraseña ingresada por el usuario, corresponde a la contraseña guardada al momento del instanciamiento de la cuenta
        */
        private function password_validate($password_account){

            //Variable contenedora del arreglo que contendra la respuesta de dicha validacion
            $info_retorno=[];

            //Validacion contraseña y guardado de la  respuesta
            if(password_verify($password_account,$this->passwordAccount)){
                $info_retorno['status']=true;
            }else{
                $info_retorno['status']=false;
                $info_retorno['desc_error']="Error, Contraseña invalida";
            }
             
            return $info_retorno;

        }

        //Funcion encargada del instanciamiento de la cuenta
        public function __construct($nombre_cliente,$numero_cuenta,$saldo_cuenta,$password_account){
            //Guardado Numero de la cuenta
            $this->nombreCliente=$nombre_cliente;

            //Guardado Numero de la cuenta
            $this->numCuenta=$numero_cuenta;

            //Guardado del Saldo de la Cuenta
            $this->saldoCuenta=$saldo_cuenta;

            //Hasheo y Guardado del numero de la cuenta
            $this->passwordAccount=password_hash($password_account,PASSWORD_DEFAULT);

        }

        //Funcion encargada de retornar informacion de la cuenta (Solo si se ha enviado correctamente la contraseña)
        public function show_attributes($datos_buscados){

            //Variable contendora de la informacion retornada por la funcion
            $info_retorno=[];

            foreach($datos_buscados as $dato_buscado){

                switch($dato_buscado){

                    case "nombre_cliente":
                        $info_retorno['nombre_cliente']=$this->nombreCliente;
                    break;

                    case "saldo":
                        $info_retorno['saldo']=$this->saldoCuenta;
                    break;

                }

            }

            //Retorno de la respuesta de dicha busqueda
            return $info_retorno;

        }

        
    }

?>