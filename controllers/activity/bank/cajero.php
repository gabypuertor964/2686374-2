<?php

    require("cuenta.php");

    class cajero{

        private $cuenta;

        //Funcion encargada de la creacion de la cuenta
        public function __construct($nombre_cliente,$numero_cuenta,$saldo_cuenta,$password_account){
            $this->cuenta = new cuenta($nombre_cliente,$numero_cuenta,$saldo_cuenta,$password_account);
        }

        //Funcion encargada de consultar datos de la cuenta
        public function show_attibutes($datos_buscados){
            return $this->cuenta->show_attributes($datos_buscados);
        }

        //Funcion encargada de conectar la peticion de retiro desde el archivo manager, hasta el objeto cuenta y de forma inversa enviara los datos de respuesta de dicha transaccion
        public function retirar_dinero($password_account,$valor_movimiento){
            return $this->cuenta->retirar_dinero($password_account,$valor_movimiento);
        }

        //Funcion encargada de conectar la peticion de consignacion desde el archivo manager, hasta el objeto cuenta y de forma inversa enviara los datos de respuesta de dicha transaccion
        public function consignar_dinero($password_account,$valor_movimiento){
            return $this->cuenta->consignar_dinero($password_account,$valor_movimiento);
        }

    }


?>