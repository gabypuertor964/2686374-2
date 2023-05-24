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
        public function product_information($cod_producto){
            switch($cod_producto){
                case 1:
                    return $this->producto_1->show_attibutes(['nombre','precio','cantidad','cantidad_min','tipo_iva']);
                break;

                case 2:
                    return $this->producto_2->show_attibutes(['nombre','precio','cantidad','cantidad_min','tipo_iva']);
                break;

                case 3:
                    return $this->producto_3->show_attibutes(['nombre','precio','cantidad','cantidad_min','tipo_iva']);
                break;

            }
        }

    }

?>
