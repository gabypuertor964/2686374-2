<?php
    $_SESSION['title_header']="Transmilenio";

    $_SESSION['addons']=[
        [
            'name'=>"prefix_route",
            'value'=>'../../../../'
        ]
    ];

    require("../../../header.php");
    require("../../../../addons/structures.php");
?>

<div class="container text-center">
    <h1>Analisis de trafico y rutas Transmilenio</h1>
</div>

<?php
    forms_generate(
        [
            'route'=>"activity/aplications/TM.php",
            'prefix_controller'=>'../../../..'
        ],
        'Registrar Nuevo Viaje (Ida y Vuelta)',
        [
            [
                'label'=>'Nombre Ruta',
                'type'=>'select',
                'values'=>[
                    'a',
                    'b',
                    'c'
                ],
                'name'=>'route_name[]'
            ],
            [
                'label'=>'Numero de Pasajeros Transportados',
                'type'=>'number',
                'name'=>'passenger_number[]',
                'min'=>0
            ],
            [
                'label'=>'Galones Consumidos',
                'type'=>'float',
                'name'=>'fuel[]'
            ],
        ],
        [
            [
                'text'=>'Añadir Viaje',
                'btn_class'=>'success',
                'onclick'=>"clonar_row('row_1','padre')",
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









