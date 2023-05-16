<?php

    class Aprendiz{

        //Definir atributos y su tipo
        private $id;
        private $nombre_aprendiz;
        private $genero;
        private $fecha_nacimiento;
        private $edad;

        //Crear Objeto
        public function  __construct()
        {
            $this->id=null;
            $this->nombre_aprendiz=null;
            $this->genero=null;
            $this->fecha_nacimiento=null;
            $this->edad=null;

        }

        //Actualizar informacion Objeto
        public function agregar_datos($new_id=null,$new_name=null,$new_genero=null,$new_fecha_nacimiento=null,$new_edad=null){
            $this->id=$new_id;
            $this->nombre_aprendiz=$new_name;
            $this->genero=$new_genero;
            $this->fecha_nacimiento=$new_fecha_nacimiento;
            $this->edad=$new_edad;
        }

        public function conocer_nombre(){
            return $this->nombre_aprendiz;
        }

        public function actualizar_nombre($new_name){
            $this->nombre_aprendiz=$new_name;
        }
        
    }


?>