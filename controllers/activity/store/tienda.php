<?php

    require("producto.php");
    
    class tienda{

        //Defincion de Atributos 
        private $nombreTienda;
        private $balanceCaja;
        private $producto_1=null;
        private $producto_2=null;
        private $producto_3=null;

        //Funcion Constructora, tanto del balance actual de la caja como de los 3 productos a ofrecer
        public function __construct($caja_inicial=null,$nombre_tienda,$productos){

            //Definicion de Balance actual de la caja
            $this->balanceCaja=$caja_inicial;

            //Definicion del nombre de la tienda
            $this->nombreTienda=$nombre_tienda;

            //Acceder de Forma individual a cada Producto, para su posterior instanciamiento
            foreach($productos as $producto){

                //Instanciamiento Temporal de la clase, para su posterior guardado en su correspondiente atributo
                $instancia_tmp = new Producto($producto['nombre'],$producto['precio'],$producto['cantidad'],$producto['cantidad_min'],$producto['tipo_iva']);

                //Se realizara el instanciamiento del actual Producto en caso de no haberse realizado con anterioridad
                if($this->producto_1==null){

                    $this->producto_1 = $instancia_tmp;

                }elseif($this->producto_2==null){

                    $this->producto_2 = $instancia_tmp;

                }elseif($this->producto_3==null){

                    $this->producto_3 = $instancia_tmp;

                }
            }
        }

        /*
            Esta funcion tiene como fin, retornar cada uno de los productos, en forma de objeto
        */
        public function product_information($cod_producto,$datos_buscados){

            switch($cod_producto){
                case 1:
                    return $this->producto_1->show_attibutes($datos_buscados);
                break;

                case 2:
                    return $this->producto_2->show_attibutes($datos_buscados);
                break;

                case 3:
                    return $this->producto_3->show_attibutes($datos_buscados);
                break;

            }
        }

        /*
            Funcion intermediaria para evaluar y realizar el proceso de venta de n producto
        */
        public function proceso_venta($nombre_producto,$unidades){

            //Arreglo contendero de la respuesta al proceso de compra
            $info_operacion=[];

            //Validar si el nombre del producto ingresado, corresponde a algun producto ya registrado
            if($this->producto_1->validar_nombre($nombre_producto)){

                //Realizar la Operacion indicada y guardar su resultado
                $info_operacion=$this->producto_1->vender_producto($unidades);

            }elseif($this->producto_2->validar_nombre($nombre_producto)){

                //Realizar la Operacion indicada y guardar su resultado
                $info_operacion=$this->producto_2->vender_producto($unidades);

            }elseif($this->producto_3->validar_nombre($nombre_producto)){

                //Realizar la Operacion indicada y guardar su resultado
                $info_operacion=$this->producto_3->vender_producto($unidades);

            //En caso de no encontrar el Producto, retornara el mensaje de error
            }else{
                $info_operacion['cant_anterior']=0;
                $info_operacion['cant_actual']=0;
                $info_operacion['estado']="Fallida";
                $info_operacion['costo_total']=0;
                $info_operacion['desc_operacion']="Error, el producto $nombre_producto, no se encuentra registrado";
            }

            //Al haberse hecho una venta, se debe aumetar el dinero en caja
            $this->balanceCaja+=$info_operacion['costo_total'];

            //Retornar la Informacion
            return $info_operacion;

        }  

        /*
            Funcion intermediaria para evaluar y realizar el proceso de compra de n producto
        */
        public function proceso_compra($nombre_producto,$unidades){

            //Arreglo contendero de la respuesta al proceso de compra
            $info_operacion=[];

            //Guardado del balance actual de la caja, ya que se usara como argumento para validar la viabilidad del proceso de compra
            $balance_actual=$this->balanceCaja;

            //Validar si el nombre del producto ingresado, corresponde a algun producto ya registrado
            if($this->producto_1->validar_nombre($nombre_producto)){

                //Realizar la Operacion indicada y guardar su resultado
                $info_operacion=$this->producto_1->comprar_producto($unidades,$balance_actual);

            }elseif($this->producto_2->validar_nombre($nombre_producto)){

                //Realizar la Operacion indicada y guardar su resultado
                $info_operacion=$this->producto_2->comprar_producto($unidades,$balance_actual);

            }elseif($this->producto_3->validar_nombre($nombre_producto)){

                //Realizar la Operacion indicada y guardar su resultado
                $info_operacion=$this->producto_3->comprar_producto($unidades,$balance_actual);

            //En caso de no encontrar el Producto, retornara el mensaje de error
            }else{
                $info_operacion['cant_anterior']=0;
                $info_operacion['cant_actual']=0;
                $info_operacion['estado']="Fallida";
                $info_operacion['costo_total']=0;
                $info_operacion['desc_operacion']="Error, el producto $nombre_producto, no se encuentra registrado";
            }

            //Al haberse hecho una compra, se debe reducir el dinero en caja
            $this->balanceCaja-=$info_operacion['costo_total'];

            //Retornar la Informacion
            return $info_operacion;

        } 

        //Funcion encargada de retornar informacion de la tienda
        public function show_attributes($datos_buscados){
            $info_retorno=[];
            foreach($datos_buscados as $dato_buscado){

                switch($dato_buscado){
                    case "balance_caja":
                        $info_retorno['balance_caja']=$this->balanceCaja;
                    break;

                    case "nombre_tienda":
                        $info_retorno['nombre_tienda']=$this->nombreTienda;
                    break;
                }

            }

            return $info_retorno;
        }

    }

?>
