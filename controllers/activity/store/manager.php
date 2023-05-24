<?php

    require("../../../addons/functions_global.php");
    require("tienda.php");

    $ruta_retorno="views/activity/store";
    $ruta_result="views/result.php";

    //Validar si se envio informacion por la URL del formulario
    type_validation([[$_GET['function'],"all"]],$ruta_retorno);

    switch($_GET['function']){

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

            //Activacion de Sesion y Guardado del objeto creado
            session_start();
            $_SESSION['object_store']=$store;

            //Validacion de estado de los datos a ingresar y posterior redireccion
            type_validation(
                [
                    [$store,"all"]
                ],
                $ruta_retorno,
                "views/activity/store/aplication.php"
            );

        break;
    }

    
?>