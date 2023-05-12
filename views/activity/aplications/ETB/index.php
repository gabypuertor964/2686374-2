<?php
    $_SESSION['title_header']="ETB - Llamadas";

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
    <h1>Calculo Precio Llamada Internacional</h1>
</div>

<?php
    forms_generate(
        [
            'route'=>"activity/aplications/ETB.php",
            'prefix_controller'=>'../../../..'
        ],
        'Registrar Llamada',
        [
            [
                'label'=>'Zona',
                'type'=>'select',
                'values'=>[
                    'America del Norte',
                    'America Central',
                    'America del Sur',
                    'Europa',
                    'Asia',
                    'Africa',
                    'Oceania'
                ],
                'name'=>'zonas[]'
            ],
            [
                'label'=>'Cantidad de minutos',
                'type'=>'float',
                'name'=>'minutos[]'
            ]
        ],
        [
            [
                'text'=>'Añadir Llamada',
                'btn_class'=>'success',
                'onclick'=>"clonar_row('row_1','padre')",
                'id'=>'add_button'
            ],
            [
                'text'=>'Calcular Precio'
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
    <a name="" id="" class="btn btn-success col-md-12" style="margin: 10px 0px 10px 0px;" href="../" role="button">Regresar al menu principal
    </a>
</div>

<?php  require("../../../footer.php");?>