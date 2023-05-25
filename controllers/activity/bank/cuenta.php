<?php

    class cuenta{
        private $nombreCliente;
        private $codCuenta;
        private $saldo;

        public function __construct($nombre_cliente=null,$codigo_cuenta=null,$saldo_cuenta=null){

            if($nombre_cliente<>null){
                $this->nombreCliente=$nombre_cliente;
            }else{
                $this->nombreCliente=null;
            }

            if($saldo_cuenta<>null){
                $this->saldo=$saldo_cuenta;
            }else{
                $this->saldo=null;
            }

            if($codigo_cuenta<>null){
                $this->codCuenta=$codigo_cuenta;
            }else{
                $this->codCuenta=null;
            }

        }

        public function show_attributes($datos_buscados){
            $datos_retorno=[];

            foreach($datos_buscados as $dato_buscar){
                switch($dato_buscar){
                    case "nombre_cliente":
                        $datos_retorno['nombre_cliente']=$this->nombreCliente;
                    break;

                    case "cod_cuenta":
                        $datos_retorno['cod_cuenta']=$this->codCuenta;
                    break;

                    case "saldo":
                        $datos_retorno['saldo']=$this->saldo;
                    break;
                }
            }

            return $datos_retorno;

        }

        public function ingresar_dinero($codigo_cuenta,$cantidad){

            if($codigo_cuenta==$this->codCuenta){
                $this->saldo+=$cantidad;

                echo("El ingreso de Dinero se Realizo de Manera Satisfactoria");
            }else{

                echo("Error, El numero de cuenta ingresado no coincide");
            }
            
        }

        public function retirar_dinero($codigo_cuenta,$cantidad){

            if($codigo_cuenta==$this->codCuenta){

                if($cantidad<=$this->saldo){
                    $this->saldo-=$cantidad;
    
                    echo("El retirno de Dinero se Realizo de Manera Satisfactoria");
    
                }else{
                    echo("Error, Fondos Insuficientes");
                }

            }else{
                echo("Error, El numero de cuenta ingresado no coincide");
            }

            

        }

        public function update_attibutes($nombre_cliente=null,$codigo_cuenta=null){

            if($nombre_cliente<>null){
                $this->nombreCliente=$nombre_cliente;
            }

            if($codigo_cuenta<>null){
                $this->codCuenta=$codigo_cuenta;
            }

        }
    }

?>