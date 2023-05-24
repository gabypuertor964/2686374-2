<?php

    //Importacion de la clase tienda (Esto con el fin de solucionar el error __PHP_Incomplete_Class)
    require("../../../controllers/activity/store/tienda.php");

    //Activacion de la Sesion
    session_start();

    //Guardado Objeto Tienda
    $store = $_SESSION['object_store'];

    //Guardado Individual de los datos de cada producto
    $producto_1=$store->product_information(1);
    $producto_2=$store->product_information(2);
    $producto_3=$store->product_information(3);

    $_SESSION['title_header']="Sistema Compra/Venta";
    require("../../header.php");
    require("../../../addons/structures.php");

?>

<?php

    //Generacion Formulario de Movimientos (Compra/Venta)
    forms_generate(
        [
            'route'=>"activity/store/manager.php",
            'prefix_controller'=>'../../../..'
        ],
        'Registrar Llamada',
        [
            [
                'label'=>'Nombre Producto',
                'type'=>'select',
                'values'=>[
                    $producto_1['nombre'],
                    $producto_2['nombre'],
                    $producto_3['nombre']   
                ],
                'name'=>'nombre_producto[]'
            ],
            [
                'label'=>'Tipo de Operacion',
                'type'=>'select',
                'values'=>[
                    'Compra',
                    'Venta'
                ],
                'name'=>'tipo_operacion[]'
            ],
            [
                'label'=>'Numero de Unidades',
                'type'=>'number',
                'name'=>'num_unidades[]'
            ]

        ],
        [
            [
                'text'=>'Añadir Movimiento',
                'btn_class'=>'success',
                'onclick'=>"clonar_row('row_1','padre')",
                'id'=>'add_button'
            ],
            [
                'text'=>'Realizar Proceso'
            ]
        ],
        [
            [
                'name'=>'id',
                'value'=>'padre'
            ]
        ]
            
    );

?>

<div class="container" class="button_home">
    <a name="" id="" class="btn btn-success col-md-12" style="margin: 10px 0px 10px 0px;" href="../store" role="button">Regresar al Instanciamiento</a>
</div>

<?php
    require("../../footer.php");
?>
