<?php

    //Importacion de la clase tienda (Esto con el fin de solucionar el error __PHP_Incomplete_Class)
    require("../../../controllers/activity/store/tienda.php");

    //Activacion de la Sesion
    session_start();

    //Guardado Objeto Tienda
    //$store = $_SESSION['object_store'];

    //Guardado Individual de los datos de cada producto
    $producto_1=$_SESSION['producto_1'];
    $producto_2=$_SESSION['producto_2'];
    $producto_3=$_SESSION['producto_3'];

    $_SESSION['title_header']="Sistema Compra/Venta";
    require("../../../addons/structures.php");
    require("../../header.php");

?>

<?php

    //Generacion Formulario de Movimientos (Compra/Venta)
    forms_generate(
        [
            'route'=>"activity/store/manager.php",
            'prefix_controller'=>'../../..',
            'function'=>'operations'
        ],
        'Nueva Factura',
        [
            [
                'label'=>'Nombre Producto',
                'type'=>'select',
                'values'=>[
                    str_replace("_"," ",$producto_1['nombre']),
                    str_replace("_"," ",$producto_2['nombre']),
                    str_replace("_"," ",$producto_3['nombre']),
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
