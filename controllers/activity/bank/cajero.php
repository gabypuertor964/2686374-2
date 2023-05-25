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

        
    }


?>