<?php
    $_SESSION['title_header']="Ejercicio Banco";
    require("../../header.php");
    require("../../../addons/structures.php");
?>

<?php

    //Construya el código para saber si un número es positivo o negativo.
    forms_generate(
        [
            'route'=>"activity/bank/manager.php",
            'function'=>'activation'
        ],
        'Crear una Nueva cuenta',
        [
            [
                'label'=>'Nombre del Cliente',
                'type'=>'text',
                'name'=>'nombre_cliente'
            ],
            [
                'label'=>'Numero de Cuenta',
                'type'=>'number',
                'name'=>'numero_cuenta'
            ],
            [
                'label'=>'Saldo inicial cuenta',
                'type'=>'number',
                'name'=>'saldo_cuenta'
            ],
            [
                'label'=>'Contraseña de la cuenta',
                'type'=>'password',
                'name'=>'password_account'
            ],
        ],
        [
            [
                'text'=>'Generar',
                'btn_class'=>'success'
            ]
        ]
    );

?>

<?php
    require("../../footer.php");
?>