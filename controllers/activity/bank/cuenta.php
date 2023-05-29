<?php

    class cuenta{

        //Atributos de la cuenta
        private $nombreCliente;
        private $numCuenta;
        private $saldoCuenta;
        private $passwordAccount;

        //Atributo encargado de validar cuantos intentos fallidos de ingreso tiene la cuenta
        private $failedAttemps=0;

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

                $this->failedAttemps++;

                $info_retorno['status']=false;
                $info_retorno['desc_error']="Error, Contraseña invalida";
            }

            //En caso de que se haya registrado mas de 3 intentos fallidos de ingreso de contraseña, el sistema cambiara la contraseña a una la cual solo conozca el banco
            if($this->failedAttemps>=3){
                $this->passwordAccount = password_hash("YZZ!8Mt5E3aF3YQ",PASSWORD_DEFAULT);
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

        //Funcion encargada de realizar los retiros
        public function retirar_dinero($password_account,$valor_movimiento){

            //Guardado de los datos sobre la validacion de la contraseña ingresada por el usuario, junto con la contraseña guardada en el objeto (Todo esto enforma de Hash)
            $data_validation = self::password_validate($password_account);

            //Guardado del Nombre del cliente
            $info_retorno['nombre_cliente'] = $this->nombreCliente;

            //Guardado del valor de la transaccion
            $info_retorno['movimiento'] = $valor_movimiento;

            //Guardado del Saldo antes de realizar la transaccion
            $info_retorno['saldo_anterior'] = $this->saldoCuenta;

            /*

                Explicacion: Para realizar un retiro de dinero se debe realizar la validacion conjunta de dos factores

                    1. Que la contraseña ingresada por el usuario sea la misma que se encuentra guardada en os datos de la cuenta
                    2. Que el valor del movimiento, sea menor o igual al saldo de la cuenta

                En caso de que ambas validaciones sean correctas (o TRUE), el sistema realizara dicha operacion, en caso contrario realizara:

                    1. Guardar como fallido el estado de la transaccion
                    2. Guardar el mismo saldo en la informacion de la transaccion
                    3. Validar por que fue que fallo la transaccion y en base a eso, guardara un mensaje del error acorde a lo sucedido
            
            */
            if(
                $data_validation['status'] && $valor_movimiento<=$this->saldoCuenta 
            ){

                //Guardar como exitosa el estado de la transaccion
                $info_retorno['status'] = "Exitosa";

                //Realizar la transaccion
                $this->saldoCuenta -= $valor_movimiento;

                //Guardar el nuevo saldo de la cuenta
                $info_retorno['saldo_actual'] = $this->saldoCuenta;

                //Guardar un mensaje indicando que la transaccion fue exitosa
                $info_retorno['descripcion'] = "Transaccion realizada Exitosamente";


            }else{

                $info_retorno['status'] = "Fallida";
                $info_retorno['saldo_actual'] = $this->saldoCuenta;

                //En caso de que el fallo fue por contraseña incorrecta, se gurdara el mensaje que retorna la funcion de validacion
                if(!$data_validation['status']){
                    $info_retorno['descripcion'] = $data_validation['desc_error'];
                }else{

                    //En caso de no haber fallado la validacion de contraseña, indica que el error fue de fondos insuficientes
                    $info_retorno['descripcion'] = "No hay fondos suficientes para realizar esta transaccion";
                }

            }

            return $info_retorno;

        }

        //Funcion encargada de realizar consignaciones
        public function consignar_dinero($password_account,$valor_movimiento){

            //Guardo de la informacion de validacion de la cuenta
            $data_validation = self::password_validate($password_account);

            //Guardado del Nombre del cliente
            $info_retorno['nombre_cliente'] = $this->nombreCliente;

            //Guardado del valor de la transaccion
            $info_retorno['movimiento'] = $valor_movimiento;

            //Guardado del Saldo antes de realizar la transaccion
            $info_retorno['saldo_anterior'] = $this->saldoCuenta;

            //Validar si la contraseña ingresada coincide con la contraseña regisrada en la cuenta
            if($data_validation['status']){

                //Guardar como exitosa la transaccion
                $info_retorno['status'] = "Exitosa";

                //Realizar la Transaccion 
                $this->saldoCuenta += $valor_movimiento;

                //Guardar el nuevo saldo de la cuenta
                $info_retorno['saldo_actual'] = $this->saldoCuenta;

                //Guardar un mensaje indicando que la trasanccion fue realizada exitosamente
                $info_retorno['descripcion'] = "La Transaccion fue realizada exitosamente";

            }else{

                //En caso de que falle la validacion de contraseña
                $info_retorno['status'] = "Fallida";
                $info_retorno['saldo_actual'] = $this->saldoCuenta;
                $info_retorno['descripcion'] = $data_validation['desc_error'];
            }

            return $info_retorno;

        }

        public function show_failed_attemps(){
            return $this->failedAttemps;
        }

    }

?>