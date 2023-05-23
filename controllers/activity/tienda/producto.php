<?php

    class Producto{

        //Declaracion de Atributos como Privados
        private $nombreProducto;
        private $precio;
        private $cantidad;
        private $cantidadMin;
        private $tipoIVA;

        /*
            Explicacion: Funcion encargada de validar el numero actual de existencia de un producto, en caso de haber llegado al limite, enviara un mensaje al usuario indicandole dicho suceso
        */
        function notificar_existencia(){
            $cantidad_actual=$this->cantidad;
            $cantidad_minima=$this->cantidadMin;

            if($cantidad_actual<=$cantidad_minima){

                echo("¡Advertencia¡, Se ha alcanzado el limite minimo de productos. Esto ya que actualemente hay $cantidad_actual unidades y se establecio un limite de $cantidad_minima unidades <br>");
            }

        }

        //Funcion Constructora para valores personalizados asi como nulos
        public function __construct($nombre_producto=null,$precio_producto=null,$cantidad_producto=null,$cantidadMin_producto=null,$tipoIVA_producto=null){
            
            //Validar Declaracion de Atributo
            if($nombre_producto<>null){
                $this->nombreProducto=$nombre_producto;
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
                $this->tipoIVA=$tipoIVA_producto;
            }else{
                $this->tipoIVA=null;
            }

        }

        /*
            Explicacion: Funcion encargada de validar la existencia y el numero de unidades del producto, esto con el fin de permitir o rechazar la posibilidad de vender n unidades de dicho producto
        */
        public function vender_producto($nombre_producto,$cantidad_movimiento){

            if($nombre_producto==$this->nombreProducto){

                if($cantidad_movimiento<=$this->cantidad){
                    $this->cantidad-=$cantidad_movimiento;

                    echo("La venta de $cantidad_movimiento unidades de $nombre_producto, fue Exitosa <br>");

                    //Acceder a otro metodo dentro de la misma clase
                    self::notificar_existencia();

                }else{
                    echo("Error, Usted Desea Vender mas unidades de las que hay disponibles <br>");
                }

            }else{
                echo("Error, El nombre del producto no coincide <br>");
            }
        }

        /*
            Explicacion: Funcion encargada de validar la existencia y el numero de unidades del producto, esto con el fin de permitir o rechazar la posibilidad de comprar n unidades de dicho producto
        */
        public function comprar_producto($nombre_producto,$cantidad_movimiento){

            if($nombre_producto==$this->nombreProducto){

                echo("La compra de $cantidad_movimiento unidades de $nombre_producto, fue Exitosa <br>");

                //Acceder a otro metodo dentro de la misma clase
                self::notificar_existencia();

            }else{
                echo("Error, El nombre del producto no coincide <br>");
            }
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

                        $nombre=$this->nombreProducto;
                        $info_retornar["nombre"]=$nombre;

                    break;

                    case "precio":

                        $precio=$this->precio;
                        $info_retornar["precio"]=$precio;

                    break;

                    case "cantidad":

                        $cantidad=$this->cantidad;
                        $info_retornar["cantidad"]=$cantidad;

                    break;

                    case "cantidad_min":

                        $cantidadMin=$this->cantidadMin;
                        $info_retornar["cantidad_min"]=$cantidadMin;

                    break;

                    case "tipo_iva":

                        $tipo_iva=$this->tipoIVA;
                        $info_retornar["tipo_iva"]=$tipo_iva;

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