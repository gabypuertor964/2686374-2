<?php

    class Centro{
        private $nombre;
        private $ubicacion;
        private $ip;

        //Crear Objeto (Con valores Nulos)
        public function __construct(){
            $this->nombre=null;
            $this->ubicacion=null;
            $this->ip=null;
        }

        //Actualizar los datos del Objeto
        public function update($nombre_centro=null,$ubicacion_centro=null,$ip_centro=null){

            //Validacion Existencia Datos
            if($nombre_centro<>null){
                $this->nombre=$nombre_centro;
            }

            //Validacion Existencia Datos
            if($ubicacion_centro<>null){
                $this->ubicacion=$ubicacion_centro;
            }

            //Validacion Existencia Datos
            if($ip_centro<>null){
                $this->ip=$ip_centro;
            }
        }

        //Mostrar Valor individual Atributo
        public function show_attribute($nombre_atributo){
            switch($nombre_atributo){

                case "nombre":
                    echo($this->nombre);
                break;

                case "ubicacion":
                    echo($this->ubicacion);
                break;

                case "ip":
                    echo($this->ip);
                break;
            }
        }

        //Imprimir mensaje donde se indique que se esta usando el centro de formacion
        public function usar_centro(){
            echo("Felicidades, estas usando el centro de formacion: ".$this->nombre);
        }
    }

?>