<?php

    class Producto{

        //Declaracion de Atributos como Privados
        private $nombreProducto;
        private $precio;
        private $cantidad;
        private $cantidadMin;
        private $tipoIVA;

        /*
            Explicacion: Esta funcion esta encargada de informar del numero actual de unidades restantes de n producto
        */
        private function notificar_existencia(){
            $cantidad_actual=$this->cantidad;
            $cantidad_minima=$this->cantidadMin;

            if($cantidad_actual<=$cantidad_minima){

                return("¡Advertencia¡, Se ha alcanzado el limite minimo de productos. Esto ya que actualemente hay $cantidad_actual unidades y se establecio un limite de $cantidad_minima unidades");

            }else{
                return ("Transaccion Realizada Exitosamente, quedan $cantidad_actual unidades");
            }

        }

        //Funcion encargada de validar si el nombre del producto es el mismo al que se esta buscando
        public function validar_nombre($nombre_producto){
            if($this->nombreProducto==$nombre_producto){
                return true;
            }else{
                return false;
            }
        }

        //Funcion Constructora para valores personalizados asi como nulos
        public function __construct($nombre_producto=null,$precio_producto=null,$cantidad_producto=null,$cantidadMin_producto=null,$tipoIVA_producto=null){
            
            //Validar Declaracion de Atributo
            if($nombre_producto<>null){
               
                $this->nombreProducto=str_replace(" ","_",strtolower($nombre_producto));
                
            }else{
                $this->nombreProducto=null;
            }

            //Validar Declaracion de Atributo
            if($precio_producto<>null){
                $this->precio=$precio_producto;
            }else{
                $this->precio=null;
            }

            //Validar Declaracion de Atributo
            if($cantidad_producto<>null){
                $this->cantidad=$cantidad_producto;
            }else{
                $this->cantidad=null;
            }

            //Validar Declaracion de Atributo
            if($cantidadMin_producto<>null){
                $this->cantidadMin=$cantidadMin_producto;
            }else{
                $this->cantidadMin=null;
            }

            //Validar Declaracion de Atributo
            if($tipoIVA_producto<>null){
                $this->tipoIVA=str_replace(" ","_",strtolower($tipoIVA_producto));
            }else{
                $this->tipoIVA=null;
            }

        }

        /*
            Explicacion: Funcion encargada de validar la existencia y el numero de unidades del producto, esto con el fin de permitir o rechazar la posibilidad de vender n unidades de dicho producto
        */
        public function vender_producto($unidades_transaccion){

            //Variable contendora del resultado de esta operacion
            $info_operacion=[];

            //Si, el numero de unidades a vender sea menor o igual a la cantidad actual de unidades, entonces realiceme:
            if($unidades_transaccion<=$this->cantidad){

                //Guardado del valor antes de realizar la transaccion
                $info_operacion['cant_anterior']=$this->cantidad;

                //Realizar el cambio en la informacion de inventario
                $this->cantidad-=$unidades_transaccion;

                //Guardado de la nueva cantidad de unidades
                $info_operacion['cant_actual']=$this->cantidad;

                //Calcular y Guardar el Costo Total de la Operacion
                $info_operacion['costo_total']=($this->precio)*$unidades_transaccion; 
                
                //Guardar el Numero de unidades disponibles depues de la operacion
                $info_operacion['desc_operacion']=self::notificar_existencia();

                //Guardado del estado de la transaccion
                $info_operacion['estado']="exitosa";

            }else{
                
                //Guardado de la cantidad actual de unidades de n producto
                $cantidad_actual=$this->cantidad;
                $nombre_producto=$this->nombreProducto;

                //Guardado de los datos resultantes de la operacion
                $info_operacion['cant_anterior']=$cantidad_actual;
                $info_operacion['cant_actual']=$cantidad_actual;
                $info_operacion['estado']="Fallida";
                $info_operacion['costo_total']=0;
                $info_operacion['desc_operacion']="Error, No hay suficientes unidades de $nombre_producto para lleva a cabo dicha venta ";
            }

            
            //Retorno de la informacion del procedimiento
            return $info_operacion;
        }

        /*
            Explicacion: Funcion encargada de validar la cantidad actual de dinero en caja, esto con el fin de permitir o rechazar la posibilidad de comprar n unidades de dicho producto
        */
        public function comprar_producto($unidades_transaccion,$balance_actual){

            //Variable contendora del resultado de esta operacion
            $info_operacion=[];

            //Calcular el costo de la transaccion
            $costo_total=($this->precio)*$unidades_transaccion;

            //Validar si el costo de la transaccion es menor o igual al dinero en acja
            if($costo_total<=$balance_actual){

                //Guardado del valor antes de realizar la transaccion
                $info_operacion['cant_anterior']=$this->cantidad;

                //Realizar el cambio en la informacion de inventario
                $this->cantidad+=$unidades_transaccion;

                //Guardado de la nueva cantidad de unidades
                $info_operacion['cant_actual']=$this->cantidad;

                //Calcular y Guardar el Costo Total de la Operacion
                $info_operacion['costo_total']=$costo_total;
                
                //Guardar el Numero de unidades disponibles depues de la operacion
                $info_operacion['desc_operacion']=self::notificar_existencia();

                //Guardado del estado de la transaccion
                $info_operacion['estado']="exitosa";

            }else{
                
                //Guardado de la cantidad actual de unidades de n producto
                $cantidad_actual=$this->cantidad;
                $nombre_producto=$this->nombreProducto;

                //Guardado de los datos resultantes de la operacion
                $info_operacion['cant_anterior']=$cantidad_actual;
                $info_operacion['cant_actual']=$cantidad_actual;
                $info_operacion['estado']="Fallida";
                $info_operacion['costo_total']=0;
                $info_operacion['desc_operacion']="Error, No hay suficientes fondos para realizar dicha compra";
            }

            
            //Retorno de la informacion del procedimiento
            return $info_operacion;
        }


        /*
            Esta funcion tiene como fin comprender que datos se estan consultando especificamente y asi mismo retornarlo en forma de arreglo
        */
        public function show_attibutes($datos_buscados){

            //Arreglo Contenedor de la informacion solicitada
            $info_retornar=[];
            
            foreach($datos_buscados as $dato_buscado){

                //Segun La informacion Solicitada Consultame
                switch($dato_buscado){
                    case "nombre":
                        $info_retornar["nombre"]=$this->nombreProducto;
                    break;

                    case "precio":
                        $info_retornar["precio"]=$this->precio;
                    break;

                    case "cantidad":
                        $info_retornar["cantidad"]=$this->cantidad;
                    break;

                    case "cantidad_min":
                        $info_retornar["cantidad_min"]=$this->cantidadMin;
                    break;

                    case "tipo_iva":
                        $info_retornar["tipo_iva"]=$this->tipoIVA;
                    break;

                    case "*":

                        $info_retornar["nombre"]=$this->nombreProducto;

                        $info_retornar["precio"]=$this->precio;

                        $info_retornar["cantidad"]=$this->cantidad;

                        $info_retornar["cantidad_min"]=$this->cantidadMin;
                        
                        $info_retornar["tipo_iva"]=$this->tipoIVA;

                    break;
                }   
            }

            return $info_retornar;
            
        }

        /*
            Esta funcion tiene como fin actualizar manualmente la informacion del Producto (Solo si esta fue declarada)
        */
        public function update_attibutes($nombre_producto=null,$precio_producto=null,$tipoIVA_producto=null){
            
            //Validar Declaracion de Atributo
            if($nombre_producto<>null){
                $this->nombreProducto=$nombre_producto;
            }

            //Validar Declaracion de Atributo
            if($precio_producto<>null){
                $this->precio=$precio_producto;
            }

            //Validar Declaracion de Atributo
            if($tipoIVA_producto<>null){
                $this->tipoIVA=$tipoIVA_producto;
            }

        }

    }

?>