<?php
    $_SESSION['title_header']="Ejercicio Tienda";
    require("../../header.php");
    require("../../../addons/structures.php");
?>

<!--Calculo Area Triangulo-->
<?php
    forms_generate(
        [
            'route'=>"activity/tienda/manager.php",
            'prefix_controller'=>'../../../..'
        ],
        'Generar Nueva instancia de Tienda',
        [
            [
                'label'=>'Nombre Producto',
                'type'=>'text',
                'name'=>'producto[]'
            ],
            [
                'label'=>'Valor Unitario',
                'type'=>'number',
                'name'=>'valor_unitario[]'
            ],
            [
                'label'=>'Cantidad Almacenada',
                'type'=>'number',
                'name'=>'cantidad[]'
            ],
            [
                'label'=>'Cantidad Minima',
                'type'=>'number',
                'name'=>'cantidad_minima[]'
            ],
        ],
        [
            [
                'text'=>'Añadir Producto',
                'btn_class'=>'success',
                'onclick'=>"clonar_row('row_1','padre',8)",
                'id'=>'add_button'
            ],
            [
                'text'=>'Calcular'
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
    <a name="" id="" class="btn btn-success col-md-12" style="margin: 10px 0px 10px 0px;" href="../../../" role="button">Regresar al menu principal
    </a>
</div>

<?php
    require("../../footer.php");
?>