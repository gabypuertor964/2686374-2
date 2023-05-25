<?php

    require("cuenta.php");

    class cajero{

        private $cuenta;

        public function __construct(){
            $this->cuenta = new cuenta("Gaby Puerto",1019604622,10000);
        }

        public function realizar_consignacion($valor){
            $this->cuenta->ingresar_dinero(1019604622,$valor);
        }

        public function realizar_retiros($valor){
            $this->cuenta->retirar_dinero(1019604622,$valor);
        }

        public function show_attributes($datos_buscados){
            $datos_retorno=[];

            foreach($datos_buscados as $dato_buscar){
                switch($dato_buscar){
                    case "nombre_cliente":
                        array_push($datos_retorno,$this->cuenta->show_attributes(['nombre_cliente']));
                    break;

                    case "saldo":
                        array_push($datos_retorno,$this->cuenta->show_attributes(['saldo']));
                    break;

                    case "cod_cuenta":
                        array_push($datos_retorno,$this->cuenta->show_attributes(['cod_cuenta']));
                    break;
                }
            }

            return $datos_retorno;

        }

        public function update_attibutes($nombre_cliente=null,$codigo_cuenta=null){

            if($nombre_cliente<>null){
                $this->cuenta->update_attibutes($nombre_cliente);
                echo("La actualizacion del Nombre del cliente fue exitosa <br>");
            }

            if($codigo_cuenta<>null){
                $this->cuenta->update_attibutes(null,$codigo_cuenta);
                echo("La actualizacion del numero de cuenta del cliente fue exitosa <br>");
            }

        }
    }


?>