<?php
    require("../../../addons/functions_global.php");
    $ruta_retorno="views/activity/aplications/ETB/";
    $ruta_result="views/result.php";

    $zonas=recuperacion_post('zonas');
    $minutos=recuperacion_post('minutos');

    type_validation(
        [
            [
                $zonas,
                'array'
            ],
            [
                $minutos,
                'array',
                [
                    ['min_equal',1]
                ]
            ]
        ],
        $ruta_retorno
    );

    $min_america_norte=0;
    $min_america_central=0;
    $min_america_sur=0;
    $min_europa=0;
    $min_asia=0;
    $min_africa=0;
    $min_oceania=0;

    for($registro=0;$registro<count($zonas);$registro++){
        $zona_llamada=$zonas[$registro];
        $minutos_llamada=$minutos[$registro];

        switch($zona_llamada){
            case "america_del_norte":
                $min_america_norte+=$minutos_llamada;
            break;

            case "america_central":
                $min_america_central+=$minutos_llamada;
            break;

            case "america_del_sur":
                $min_america_sur+=$minutos_llamada;
            break;

            case "europa":
                $min_europa+=$minutos_llamada;
            break;

            case "asia":
                $min_asia+=$minutos_llamada;
            break;

            case "africa":
                $min_africa+=$minutos_llamada;
            break;

            case "oceania":
                $min_oceania+=$minutos_llamada;
            break;
        };
    }

    $precio_america_norte=0;
    $precio_america_central=0;
    $precio_america_sur=0;
    $precio_europa=0;
    $precio_asia=0;
    $precio_africa=0;
    $precio_oceania=0;

    if($min_america_norte<>0){
        if($min_america_norte<=3){
            $precio_america_norte=$min_america_norte*1500;
        }else{
            $min_adicionales=$min_america_norte-3;
        
            $costo_base=3*1500;
            $costo_adicional=$min_adicionales*1000;

            $precio_america_norte=$costo_base+$costo_adicional;
        }
    }

    if($min_america_central<>0){
        if($min_america_central<=3){
            $precio_america_central=$min_america_central*2000;
        }else{
            $min_adicionales=$min_america_central-3;
        
            $costo_base=3*2000;
            $costo_adicional=$min_adicionales*1500;

            $precio_america_central=$costo_base+$costo_adicional;
        }
    }

    if($min_america_sur<>0){
        if($min_america_sur<=3){
            $precio_america_sur=$min_america_sur*3500;
        }else{
            $min_adicionales=$min_america_sur-3;
        
            $costo_base=3*3500;
            $costo_adicional=$min_adicionales*3000;

            $precio_america_sur=$costo_base+$costo_adicional;
        }
    }

    if($min_europa<>0){
        if($min_europa<=3){
            $precio_europa=$min_europa*3000;
        }else{
            $min_adicionales=$min_europa-3;
        
            $costo_base=3*3000;
            $costo_adicional=$min_adicionales*2500;

            $precio_europa=$costo_base+$costo_adicional;
        }
    }

    if($min_asia<>0){
        if($min_asia<=3){
            $precio_asia=$min_asia*6000;
        }else{
            $min_adicionales=$min_asia-3;
        
            $costo_base=3*6000;
            $costo_adicional=$min_adicionales*4500;

            $precio_asia=$costo_base+$costo_adicional;
        }
    }

    if($min_africa<>0){
        if($min_africa<=3){
            $precio_africa=$min_africa*5000;
        }else{
            $min_adicionales=$min_africa-3;
        
            $costo_base=3*5000;
            $costo_adicional=$min_adicionales*3000;

            $precio_africa=$costo_base+$costo_adicional;
        }
    }

    if($min_oceania<>0){
        if($min_oceania<=3){
            $precio_oceania=$min_oceania*4000;
        }else{
            $min_adicionales=$min_oceania-3;
        
            $costo_base=3*4000;
            $costo_adicional=$min_adicionales*2800;

            $precio_oceania=$costo_base+$costo_adicional;
        }
    }

    $costo_total=($precio_america_norte+$precio_america_sur+$precio_america_central+$precio_europa+$precio_asia+$precio_africa+$precio_oceania);

    $tiempo_total=($min_america_norte+$min_america_sur+$min_america_central+$min_europa+$min_asia+$min_africa+$min_oceania);

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
                    'content'=>'Detallado Minutos x Zona',
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
                ['content'=>'America del Norte'],
                ['content'=>"$min_america_norte min"]  
            ],
            [
                ['content'=>'America Central'],
                ['content'=>"$min_america_central min"]  
            ],
            [
                ['content'=>'America del Sur'],
                ['content'=>"$min_america_sur min"]  
            ],
            [
                ['content'=>'Europa'],
                ['content'=>"$min_europa min"]  
            ],
            [
                ['content'=>'Asia'],
                ['content'=>"$min_asia min"]  
            ],
            [
                ['content'=>'Africa'],
                ['content'=>"$min_africa min"]  
            ],
            [
                ['content'=>'Oceania'],
                ['content'=>"$min_oceania min"]  
            ],
            [
                [
                    'content'=>'Detallado Costo X zona',
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
                ['content'=>'America del Norte'],
                ['content'=>"$$precio_america_norte"]  
            ],
            [
                ['content'=>'America Central'],
                ['content'=>"$$precio_america_central"]  
            ],
            [
                ['content'=>'America del Sur'],
                ['content'=>"$$precio_america_sur"]  
            ],
            [
                ['content'=>'Europa'],
                ['content'=>"$$precio_europa"]  
            ],
            [
                ['content'=>'Asia'],
                ['content'=>"$$precio_asia"]  
            ],
            [
                ['content'=>'Africa'],
                ['content'=>"$$precio_africa"]  
            ],
            [
                ['content'=>'Oceania'],
                ['content'=>"$$precio_oceania"]  
            ],
            [
                [
                    'content'=>'Detallados finales',
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
                ['content'=>'Costo Total'],
                ['content'=>"$$costo_total"]  
            ],
            [
                ['content'=>'Tiempo Total'],
                ['content'=>"$tiempo_total"]  
            ]
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
                $zonas,
                'array'
            ],
            [
                $minutos,
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
