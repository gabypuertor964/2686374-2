<?php
    
    require("../../../addons/functions_global.php");
    $ruta_retorno="views/activity/aplications/TM/";
    $ruta_result="views/result.php";
    
    $routes_names=recuperacion_post("route_name");
    $passengers_numbers=recuperacion_post("passenger_number");
    $fuels=recuperacion_post("fuel");

    type_validation(
        [
            [
                $routes_names,
                'array'
            ],
            [
                $passengers_numbers,
                'array',
                [
                    ['min_equal',0]
                ]
            ],
            [
                $fuels,
                'array',
                [
                    ['min_equal',1]
                ]
            ]

        ],
        $ruta_retorno
    );

    $buses_ruta_a=0;
    $buses_ruta_b=0;
    $buses_ruta_c=0;

    $pasajeros_ruta_a=0;
    $pasajeros_ruta_b=0;
    $pasajeros_ruta_c=0;

    $combustible_ruta_a=0;
    $combustible_ruta_b=0;
    $combustible_ruta_c=0;


    for($registro=0; $registro<count($routes_names); $registro++){

        $route_name=$routes_names[$registro];
        $passgenger_number=$passengers_numbers[$registro];
        $fuel=$fuels[$registro];

        switch($route_name){
            case "a":
                $buses_ruta_a++;
                $pasajeros_ruta_a+=$passgenger_number;
                $combustible_ruta_a+=$fuel;
            break;

            case "b":
                $buses_ruta_b++;
                $pasajeros_ruta_b+=$passgenger_number;
                $combustible_ruta_b+=$fuel;
            break;

            case "c":
                $buses_ruta_c++;
                $pasajeros_ruta_c+=$passgenger_number;
                $combustible_ruta_c+=$fuel;
            break;

        }

    }

    session_start();
    $data=[
        'title_header'=>"Estadisticas TM",
        'title'=>"Detallado de Estadisticas rutas TM",
        'thead'=>[
            ['content'=>'Nombre Item'],
            ['content'=>'Valor Detallado']
        ],
        'rows'=>[
            [
                [
                    'content'=>'Detallado ruta A',
                    'addons'=>[
                        [
                            'name'=>'colspan',
                            'value'=>2
                        ],
                        [
                            'name'=>'style',
                            'value'=>'
                                font-weight:bold;
                                font-style:italic;
                            '
                        ]
                    ]
                ]
                
            ],
            [
                ['content'=>'Cantidad de Buses'],
                ['content'=>$buses_ruta_a]  
            ],
            [
                ['content'=>'Numero total de Pasajeros'],
                ['content'=>$pasajeros_ruta_a]  
            ],
            [
                ['content'=>'Galones Consumidos'],
                ['content'=>$combustible_ruta_a]  
            ],
            [
                [
                    'content'=>'Detallado ruta B',
                    'addons'=>[
                        [
                            'name'=>'colspan',
                            'value'=>2
                        ],
                        [
                            'name'=>'style',
                            'value'=>'
                                font-weight:bold;
                                font-style:italic;
                            '
                        ]
                    ]
                ]
                
            ],
            [
                ['content'=>'Cantidad de Buses'],
                ['content'=>$buses_ruta_b]  
            ],
            [
                ['content'=>'Numero total de Pasajeros'],
                ['content'=>$pasajeros_ruta_b]  
            ],
            [
                ['content'=>'Galones Consumidos'],
                ['content'=>$combustible_ruta_b]  
            ],
            [
                [
                    'content'=>'Detallado ruta C',
                    'addons'=>[
                        [
                            'name'=>'colspan',
                            'value'=>2
                        ],
                        [
                            'name'=>'style',
                            'value'=>'
                                font-weight:bold;
                                font-style:italic;
                            '
                        ]
                    ]
                ]
                
            ],
            [
                ['content'=>'Cantidad de Buses'],
                ['content'=>$buses_ruta_c]  
            ],
            [
                ['content'=>'Numero total de Pasajeros'],
                ['content'=>$pasajeros_ruta_c]  
            ],
            [
                ['content'=>'Galones Consumidos'],
                ['content'=>$combustible_ruta_c]  
            ],
        ],
        'addons'=>[
            [
                'name'=>"prefix_route",
                'value'=>"../"
            ]
        ],
        'route_return'=>$ruta_retorno
    ];

    $_SESSION['data']=$data;

    type_validation(
        [
            [
                $routes_names,
                'array'
            ],
            [
                $passengers_numbers,
                'array',
                [
                    ['min_equal',0]
                ]
            ],
            [
                $fuels,
                'array',
                [
                    ['min_equal',1]
                ]
            ],
            [$data,'all']
        ],
        $ruta_retorno,
        $ruta_result
    );

?>