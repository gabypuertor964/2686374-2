<?php

    require("../../../addons/functions_global.php");
    require("tienda.php");

    $ruta_retorno="views/activity/store";

    //Validar si se envio informacion por la URL del formulario
    type_validation([[$_GET['function'],"all"]],$ruta_retorno);

    switch($_GET['function']){

        //Escenario de Instanciamiento del Objeto
        case "activation":

            //Recuperacion de informacion global de la tienda
            $nombre_tienda = recuperacion_post("nombre_tienda");
            $balance_inicial = recuperacion_post("balance_inicial");

            //Recuperacion de informacion de los Productos a Registrar
            $productos = recuperacion_post("producto");
            $valores_unitarios = recuperacion_post("valor_unitario");
            $cantidades = recuperacion_post("cantidad");
            $cantidades_minimas = recuperacion_post("cantidad_minima");
            $tipos_iva = recuperacion_post("tipo_iva");

            //Validar el buen estado de la informacion recuperada del formulario
            type_validation(
                [
                    [$nombre_tienda,"string"],
                    [$balance_inicial,"numeric"],
                    [$productos,"array"],
                    [
                        $valores_unitarios,
                        "array",
                        [
                            ['min_equal',1]
                        ]
                    ],
                    [
                        $cantidades,
                        "array",
                        [
                            ['min_equal',1]
                        ]
                    ],
                    [
                        $cantidades_minimas,
                        "array",
                        [
                            ['min_equal',1]
                        ]
                    ],
                    [$tipos_iva,"array"]

                ],
                $ruta_retorno
            );

            //Validacion envio de Datos el 3er Producto
            type_validation([[$productos[2],"all"]],$ruta_retorno);

            //Instanciamiento y creacion de la tienda 
            $store = new tienda(
                $balance_inicial,
                $nombre_tienda,
                [
                    //Producto 1
                    [
                        'nombre'=>$productos[0],
                        'precio'=>$valores_unitarios[0],
                        'cantidad'=>$cantidades[0],
                        'cantidad_min'=>$cantidades_minimas[0],
                        'tipo_iva'=>$tipos_iva[0]
                    ],

                    //Producto 2
                    [
                        'nombre'=>$productos[1],
                        'precio'=>$valores_unitarios[1],
                        'cantidad'=>$cantidades[1],
                        'cantidad_min'=>$cantidades_minimas[1],
                        'tipo_iva'=>$tipos_iva[1]
                    ],

                    //Producto 3
                    [
                        'nombre'=>$productos[2],
                        'precio'=>$valores_unitarios[2],
                        'cantidad'=>$cantidades[2],
                        'cantidad_min'=>$cantidades_minimas[2],
                        'tipo_iva'=>$tipos_iva[2]
                    ],
                ]
            );

            /*
                Activacion de sesion y posterior guardado tanto del objeto tienda como de la informacion a demanda de cada producto individual
            */
            session_start();

            $_SESSION['store']=$store;

            $_SESSION['producto_1']=$store->product_information(1,["nombre"]);
            $_SESSION['producto_2']=$store->product_information(2,["nombre"]);
            $_SESSION['producto_3']=$store->product_information(3,["nombre"]);

            //Validacion de estado de los datos a ingresar y posterior redireccion
            type_validation(
                [
                    [$store,"all"]
                ],
                $ruta_retorno,
                "views/activity/store/aplication.php"
            );

        break;

        //Escenario de Manejo de Operaciones ingresadas (Compra/Venta)
        case "operations": 

            //Recuperacion de la informacion recibida en el formulario
            $nombre_productos = recuperacion_post("nombre_producto");

            $tipos_operaciones = recuperacion_post("tipo_operacion");

            $num_unidades = recuperacion_post("num_unidades");

            //Validacion del buen estado de los datos
            type_validation(
                [
                    [$nombre_productos,"array"],
                    [$tipos_operaciones,"array"],
                    [
                        $num_unidades,
                        "array",
                        [
                            ['min_equal',1]
                        ]
                        
                    ]
                ],
                "views/activity/store/aplication.php"
            );

            session_start();

            //Recuperacion del Objeto tienda
            $store = $_SESSION['store'];

            //Definicion de Arreglo usado para enviar el resumen de las operaciones realizadas
            $data_result=[];

            //Ciclo Para acceder de forma individual a cada movimiento ingresado por el usuario
            for($id_producto=0; $id_producto<count($nombre_productos); $id_producto++){

                //Nombre individual del Producto a Afectar
                $nom_producto = $nombre_productos[$id_producto];

                //Tipo de Operacion a Realizar
                $tip_operacion = $tipos_operaciones[$id_producto];

                //Cantidad de unidades a operar
                $unidades = $num_unidades[$id_producto];

                //Segun el tipo de operacion indicara, use un metodo u otro
                switch($tip_operacion){

                    case "compra":

                        //Variable contenedora de la respuesta a n operacion solicitada
                        $info_operacion = $store->proceso_compra($nom_producto,$unidades);

                        
                    break;

                    case "venta":

                        //Variable contenedora de la respuesta a n operacion solicitada
                        $info_operacion = $store->proceso_venta($nom_producto,$unidades);
                        
                    break;

                    default:
                        $info_operacion['cant_anterior']=0;
                        $info_operacion['cant_actual']=0;
                        $info_operacion['estado']="Fallida";
                        $info_operacion['costo_total']=0;
                        $info_operacion['desc_operacion']="Error, la operacion $tip_operacion, no esta permitida";
                    break;
                }

                //Calculo del movimiento antes vs despues de realizar la operacion
                if(
                    $info_operacion['cant_anterior']>$info_operacion['cant_actual']
                ){
                    $movimiento=$info_operacion['cant_anterior']-$info_operacion['cant_actual'];
                }else{
                    $movimiento=$info_operacion['cant_actual']-$info_operacion['cant_anterior'];
                }

                //Ingreso de la informacion de cada operacion realizada
                array_push($data_result,
                    [
                        'nombre'=>$nom_producto,
                        'operacion'=>$tip_operacion,
                        'cant_anterior'=>$info_operacion['cant_anterior'],
                        'cant_actual'=>$info_operacion['cant_actual'],
                        'estado'=>$info_operacion['estado'],
                        'movimiento'=>$movimiento,
                        'costo_total'=>$info_operacion['costo_total'],
                        'descripcion'=>$info_operacion['desc_operacion']
                    ]
                );

            }

            $nombre_tienda = $store->show_attributes(['nombre_tienda'])['nombre_tienda'];

            $data=[
                'title_header'=>"Detallado Factura",
                'title'=>"Detallado Movimientos de la Tienda $nombre_tienda",
                'thead'=>[
                    ['content'=>'Nombre Producto'],
                    ['content'=>'Operacion'],
                    ['content'=>'Cantidad Anterior'],
                    ['content'=>'Cantidad Actual'],
                    ['content'=>'Estado'],
                    ['content'=>'Movimiento'],
                    ['content'=>'Costo Total'],
                    ['content'=>'Descripcion/Comentario'],
                ],
                'rows'=>[
                    [
                        [
                            'content'=>'Transaccion 1',
                            'addons'=>[
                                [
                                    'name'=>'colspan',
                                    'value'=>8
                                ],
                                [
                                    'name'=>'style',
                                    'value'=>'
                                        font-weight:bold;
                                        font-style:italic;
                                    '
                                ]
                            ]
                        ]
                        
                    ],
                    [
                        ['content'=>str_replace("_"," ",$data_result[0]['nombre'])],
                        ['content'=>$data_result[0]['operacion']],  
                        ['content'=>$data_result[0]['cant_anterior']],
                        ['content'=>$data_result[0]['cant_actual']],
                        ['content'=>$data_result[0]['estado']],
                        ['content'=>$data_result[0]['movimiento']],
                        ['content'=>$data_result[0]['costo_total']],
                        ['content'=>$data_result[0]['descripcion']],
                    ],
                    [
                        [
                            'content'=>'Transaccion 2',
                            'addons'=>[
                                [
                                    'name'=>'colspan',
                                    'value'=>8
                                ],
                                [
                                    'name'=>'style',
                                    'value'=>'
                                        font-weight:bold;
                                        font-style:italic;
                                    '
                                ]
                            ]
                        ]
                        
                    ],
                    [
                        ['content'=>str_replace("_"," ",$data_result[1]['nombre'])],
                        ['content'=>$data_result[1]['operacion']],  
                        ['content'=>$data_result[1]['cant_anterior']],
                        ['content'=>$data_result[1]['cant_actual']],
                        ['content'=>$data_result[1]['estado']],
                        ['content'=>$data_result[1]['movimiento']],
                        ['content'=>$data_result[1]['costo_total']],
                        ['content'=>$data_result[1]['descripcion']],
                    ],
                    [
                        [
                            'content'=>'Transaccion 3',
                            'addons'=>[
                                [
                                    'name'=>'colspan',
                                    'value'=>8
                                ],
                                [
                                    'name'=>'style',
                                    'value'=>'
                                        font-weight:bold;
                                        font-style:italic;
                                    '
                                ]
                            ]
                        ]
                        
                    ],
                    [
                        ['content'=>str_replace("_"," ",$data_result[2]['nombre'])],
                        ['content'=>$data_result[2]['operacion']],  
                        ['content'=>$data_result[2]['cant_anterior']],
                        ['content'=>$data_result[2]['cant_actual']],
                        ['content'=>$data_result[2]['estado']],
                        ['content'=>$data_result[2]['movimiento']],
                        ['content'=>$data_result[2]['costo_total']],
                        ['content'=>$data_result[2]['descripcion']],
                    ],
                ],
                'addons'=>[
                    [
                        'name'=>"prefix_route",
                        'value'=>"../"
                    ]
                ],
                'route_return'=>$ruta_retorno
            ];
            
            $_SESSION['data']=$data;
            $_SESSION['addons']=[
                [
                    'name'=>'prefix_route',
                    'value'=>'../../../'
                ]
            ];
    
            type_validation(
                [
                    [$data,'all']
                ],
                $ruta_retorno,
                "views/result.php"
            );
            

        break;
    }
?>