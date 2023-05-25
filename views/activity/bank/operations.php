<?php

    $_SESSION['title_header']="Realizar Transacciones";
    require("../../header.php");
    require("../../../addons/structures.php");

    session_start();
    $info_cuenta = $_SESSION['info_cuenta'];

?>

<div class="container text-center">

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Informacion de la cuenta</h4>
        </div>
        <div class="card-body">
            
            <table class="table table-bordered">

                <!--Cabecera Tabla de Datos-->
                <thead>
                    <tr>
                        <th>Nombre Cliente</th>
                        <th>Saldo Actual</th>
                    </tr>
                </thead>

                <!--Cuerpo Tabla de Datos-->
                <tbody>
                    <tr>
                        <td>
                            <?php echo($info_cuenta['nombre_cliente'])?>
                        </td>
                        <td>
                            <?php echo($info_cuenta['saldo'])?>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>

</div>

<?php

    //Construya el código para saber si un número es positivo o negativo.
    forms_generate(
        [
            'route'=>"activity/bank/manager.php",
            'function'=>'transactions'
        ],
        'Realizar Una Transaccion',
        [
            [
                'label'=>'Tipo de Transaccion',
                'type'=>'select',
                'values'=>[
                    'retiro',
                    'consigancion'
                ],
                'name'=>'tipo_transaccion'
            ],
            [
                'label'=>'Valor',
                'type'=>'float',
                'name'=>'valor_movimiento'
            ],
            [
                'label'=>'Contraseña',
                'type'=>'password',
                'name'=>'password_account'
            ]
        ],
        [
            [
                'text'=>'Realizar',
                'btn_class'=>'success'
            ]
        ]
    );

?>

<?php
    require("../../footer.php");
?>