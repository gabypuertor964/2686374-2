<?php

    require("producto.php");
    
    class tienda{

        //Defincion de Atributos 
        private $balance_caja;
        private $producto_1=null;
        private $producto_2=null;
        private $producto_3=null;

        //Funcion Constructora, tanto del balance actual de la caja como de los 3 productos a ofrecer
        public function __construct($caja_inicial=null,$productos){

            //Definicion de Balance actual de la caja
            $this->balance_caja=$caja_inicial;

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

    }

    $nueva_tienda= new tienda(2000,[
        [
            'nombre'=>'Arroz',
            'precio'=>2500,
            'cantidad'=>50,
            'cantidad_min'=>5,
            'tipo_iva'=>'Estandar'
        ],

        [
            'nombre'=>'Aguacate',
            'precio'=>3000,
            'cantidad'=>25,
            'cantidad_min'=>2,
            'tipo_iva'=>'Estandar'
        ],

        [
            'nombre'=>'Lechuga',
            'precio'=>2000,
            'cantidad'=>10,
            'cantidad_min'=>1,
            'tipo_iva'=>'Estandar'
        ],
    ]);

?>
