<?php

    class Aprendiz{

        //Definir atributos y su tipo
        private $id;
        private $nombre_aprendiz;
        private $genero;
        private $fecha_nacimiento;
        private $edad;

        //Crear Objeto
        public function __construct($id_aprendiz=null,$nombre_aprendiz=null,$genero_aprendiz=null,$fecha_nacimiento=null,$edad_aprendiz=null)
        {
            //Validacion Declaracion de Datos
            if($id_aprendiz<>null){
                $this->id=$id_aprendiz;
            }else{
                $this->id=null;
            }

            //Validacion Declaracion de Datos
            if($nombre_aprendiz<>null){
                $this->nombre_aprendiz=$nombre_aprendiz;
            }else{
                $this->nombre_aprendiz=null;
            }

            //Validacion Declaracion de Datos
            if($genero_aprendiz<>null){
                $this->genero=$genero_aprendiz;
            }else{
                $this->genero=null;
            }

            //Validacion Declaracion de Datos
            if($fecha_nacimiento<>null){
                $this->fecha_nacimiento=$fecha_nacimiento;
            }else{
                $this->fecha_nacimiento=null;
            }

            //Validacion Declaracion de Datos
            if($edad_aprendiz<>null){
                $this->edad=$edad_aprendiz;
            }else{
                $this->edad=null;
            }

        }

        //Actualizar informacion Objeto
        public function agregar_datos($new_id=null,$new_name=null,$new_genero=null,$new_fecha_nacimiento=null,$new_edad=null){
            $this->id=$new_id;
            $this->nombre_aprendiz=$new_name;
            $this->genero=$new_genero;
            $this->fecha_nacimiento=$new_fecha_nacimiento;
            $this->edad=$new_edad;
        }

        //Conocer el nombre del aprendiz aunque esta propiedad sea privada
        public function conocer_nombre(){
            return $this->nombre_aprendiz;
        }

        //Actualizar el nombre del aprendiz
        public function actualizar_nombre($new_name){
            $this->nombre_aprendiz=$new_name;
        }
        
    }


?>