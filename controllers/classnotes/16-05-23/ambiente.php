<?php

    class Ambiente{

        //Definicion de atributos y tipo
        private $codigoAmbiente;
        private $capacidad;
        private $ubicacion;
        private $dimension;

        //Creacion del Objeto (Con datos Nulos)
        public function __construct()
        {
            $this->codigoAmbiente=null;
            $this->capacidad=null;
            $this->ubicacion=null;
            $this->dimension=null;
        }

        //Actualizar de Datos
        public function update($codigo_ambiente=null,$capacidad_ambiente=null,$ubicacion_ambiente=null,$dimension_ambiente=null)
        {

            //Verificacion existencia valor para actualizacion
            if($codigo_ambiente<>null){
                $this->codigoAmbiente=$codigo_ambiente;
            }

            //Verificacion existencia valor para actualizacion
            if($capacidad_ambiente<>null){
                $this->capacidad=$capacidad_ambiente;
            }

            //Verificacion existencia valor para actualizacion
            if($ubicacion_ambiente<>null){
                $this->ubicacion=$ubicacion_ambiente;
            }
            
            //Verificacion existencia valor para actualizacion
            if($dimension_ambiente<>null){
                $this->dimension=$dimension_ambiente;
            }
            
        }

        //Ver atributo especifico
        public function show_attribute($attribute_name){
           switch($attribute_name){

                case "codigo":
                    echo($this->codigoAmbiente);
                break;

                case "capacidad":
                    echo($this->capacidad);
                break;

                case "ubicacion":
                    echo($this->ubicacion);
                break;

                case "dimension":
                    echo($this->dimension);
                break;
           }
        }

    }

?>