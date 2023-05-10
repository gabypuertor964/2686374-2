<?php
    $_SESSION['title_header']="Ejercicios de Aplicacion";
    require("../../header.php");
    require("../../../addons/structures.php");
?>
<div class="container text-center">

    <h1>Ejercicios de Aplicacion en la vida Real</h1>

    <table class="table">

        <?php
            links_home(
                [
                    //Link Actividad TM: Lectura y conteo en arreglos
                    [
                        'card_title'=>'Estadisticas TM',
                        'description'=>'Se debe calcular valores estadisticos segun listado de rutas, asi como sus diferentes datos internos',
                        'buttons'=>[
                            [
                                'text'=>'Ver',
                            ]
                        ],
                        'data_route'=>[
                            'type_page'=>'activity',
                            'route'=>'TM/',
                            'addons_route'=>[
                                'type'=>'absolute'
                            ]
                        ]
                    ],

                    //Link actividad ETB: Ciclos de Control y manejo de arreglos
                    [
                        'card_title'=>'Facturas de Cobro ETB',
                        'description'=>'Partiendo de una tabla de valores fijos y dinamicos, se debe calcular la tarifa final de la llamada',
                        'buttons'=>[
                            [
                                'text'=>'Ver',
                            ]
                        ],
                        'data_route'=>[
                            'type_page'=>'activity',
                            'route'=>'ETB/',
                            'addons_route'=>[
                                'type'=>'absolute'
                            ]
                        ]
                    ]
                ]
            )
            
        ?>

    </table>

</div>
    


