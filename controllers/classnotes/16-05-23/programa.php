<?php
    class Programa{
        private $nombrePrograma;
        private $fechaRegistro;
        private $fechaCaducidad;
        private $tipo;

        //Creacion del Objeto (Con valores tanto personalizados como nulos)
        public function __construct($nombre_programa=null,$fecha_registro=null,$fecha_caducidad=null,$tipo=null){

            //Validacion existencia Datos
            if($nombre_programa<>null){
                $this->nombrePrograma=$nombre_programa;
            }else{
                $this->nombrePrograma=null;
            }

            //Validacion existencia Datos
            if($fecha_registro<>null){
                $this->fechaRegistro=$fecha_registro;
            }else{
                $this->fechaRegistro=null;
            }

            //Validacion existencia Datos
            if($fecha_caducidad<>null){
                $this->fechaCaducidad=$fecha_caducidad;
            }else{
                $this->fechaCaducidad=null;
            }

            //Validacion existencia Datos
            if($tipo<>null){
                $this->tipo=$tipo;
            }else{
                $this->tipo=null;
            }

        }

        //Actualizacion de los atributos
        public function update($nombre_programa=null,$fecha_registro=null,$fecha_caducidad=null,$tipo=null){

            //Validacion existencia Datos
            if($nombre_programa<>null){
                $this->nombrePrograma=$nombre_programa;
            }

            //Validacion existencia Datos
            if($fecha_registro<>null){
                $this->fechaRegistro=$fecha_registro;
            }

            //Validacion existencia Datos
            if($fecha_caducidad<>null){
                $this->fechaCaducidad=$fecha_caducidad;
            }

            //Validacion existencia Datos
            if($tipo<>null){
                $this->tipo=$tipo;
            }

        }

        //Mostrar valor individual de cada atributo
        public function show_attibutes($nombre_atributo){
            switch($nombre_atributo){

                case "nombre":
                    echo($this->nombrePrograma);
                break;

                case "fecha_registro":
                    echo($this->fechaRegistro);
                break;

                case "fecha_caducidad":
                    echo($this->fechaCaducidad);
                break;

                case "tipo":
                    echo($this->fechaCaducidad);
                break;

            }
        }
    }

?>