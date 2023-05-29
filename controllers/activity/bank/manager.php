<?php

    require("../../../addons/functions_global.php");
    require("cajero.php");

    $ruta_retorno="views/activity/bank";

    //Validar si se envio informacion por la URL del formulario
    type_validation([[$_GET['function'],"all"]],$ruta_retorno);

    switch($_GET['function']){

        //Escenario de Activacion de Cuenta y Su posterior instanciamiento
        case "activation":

            //Recuperacion y Guardado del nombre del cliente
            $nombre_cliente = recuperacion_post("nombre_cliente");

            //Recuperacion y Guardado del numero de la cuenta
            $numero_cuenta = recuperacion_post("numero_cuenta");

            //Recuperacion y Guardado del saldo de la cuenta
            $saldo_cuenta = recuperacion_post("saldo_cuenta");

            //Recuperacion y Guardado de la contraseña de la cuenta
            $password_account = recuperacion_post("password_account");

            //Validacion de los datos recibidos
            type_validation(
                [
                    [$nombre_cliente,"string"],
                    [$numero_cuenta,"integer"],
                    [$saldo_cuenta,"numeric"],
                    [$password_account,"string"],
                ],
                $ruta_retorno
            );

            //Instanciamiento del cajero (Junto con la cuenta), todo esto, haciendo uso de la informacion enviada y validada desde el formulario
            $cajero = new cajero($nombre_cliente,$numero_cuenta,$saldo_cuenta,$password_account);
            
            $info_cuenta = $cajero->show_attibutes(['nombre_cliente','saldo']);

            //Activacion de la Sesion
            session_start();

            //Guardado de la informacion del cajero
            $_SESSION['cajero'] = $cajero;
            $_SESSION['info_cuenta'] = $info_cuenta;

            //Validacion de los datos y posterior redireccion
            type_validation(
                [
                    [$cajero,'all'],
                    [$info_cuenta,'array']
                ],
                $ruta_retorno,
                "views/activity/bank/operations.php"
            );

        break;

        //Escenario de operaciones a la cuenta
        case "transactions":

            //Recuperacion y guardado tipo de Operacion (Retirar/Consignar)
            $tipo_transaccion = recuperacion_post("tipo_transaccion");

            //Recuperacion y Guardado Valor Movimiento
            $valor_movimiento = recuperacion_post("valor_movimiento");

            //Recuperacion y Guardado Contraseña Ingresada
            $password_account = recuperacion_post("password_account");

            type_validation(
                [
                    [$tipo_transaccion,"string"],
                    [$valor_movimiento,"numeric"],
                    [$password_account,"all"]
                ],
                $ruta_retorno
            );

            session_start();

            //Guardar el Objeto cajero junto con toda su informacion
            $cajero = $_SESSION['cajero'];

            //Segun el tipo de operacion, realizar:
            switch($tipo_transaccion){

                case "consigancion":

                    //Guardar los datos resultantes de realizar n transaccion
                    $info_transaccion = $cajero->consignar_dinero($password_account,$valor_movimiento);

                break;

                case "retiro":

                    //Guardar los datos resultantes de realizar n transaccion
                    $info_transaccion = $cajero->retirar_dinero($password_account,$valor_movimiento);

                break;

                //Redireccion por defecto en caso de que se ingrese un tipo de operacion diferente a las predefinidas
                default:
                    header("../../../views/activity/bank");
                break;
            }

            type_validation(
                [
                    [$info_transaccion,"array"]
                ],
                $ruta_retorno
            );

            //Guardado nombre cliente
            $nombre_cliente = $info_transaccion['nombre_cliente'];

            $data=[
                'title_header'=>"Detallado Transaccion ",
                'title'=>"Detallado Transaccion de $nombre_cliente",
                'thead'=>[
                    ['content'=>'Tipo Transaccion'],
                    ['content'=>'Estado'],
                    ['content'=>'Movimiento'],
                    ['content'=>'Saldo Anterior'],
                    ['content'=>'Saldo Actual'],
                    ['content'=>'Descripcion/Comentario'],
                ],
                'rows'=>[
                    [
                        ['content'=>$tipo_transaccion],
                        ['content'=>$info_transaccion['status']],  
                        ['content'=>$info_transaccion['movimiento']],
                        ['content'=>$info_transaccion['saldo_anterior']],
                        ['content'=>$info_transaccion['saldo_actual']],
                        ['content'=>$info_transaccion['descripcion']]
                    ]
                    
                ],
                'addons'=>[
                    [
                        'name'=>"prefix_route",
                        'value'=>"../"
                    ]
                ],
                'route_return'=>"views/activity/bank/operations.php"
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

        //Redireccion por defecto en caso, de que el valor de la variable funtion dentro de los datos GET, no sea un caso ya definido
        default:
            header("../../../views/activity/bank");
        break;

    }



?>