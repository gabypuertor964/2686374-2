<?php

    require("../../../addons/functions_global.php");

    $ruta_retorno="views/activity/arrays/";
    $ruta_result="views/result.php";

    /*

        Explicacion: Funcion en cargada de calcular de forma automatica tiempo promedio de vueltas x dia, este proceso se llevara a cabo independiente del numero de vueltas
    
    */
    function promediar_dia($vueltas_dia){

        //Conocer el numero de vueltas realizada
        $total_vueltas=count($vueltas_dia);

        //Variable contenedora del acumulado del tiempo de todas las vueltas
        $acumulado=0;

        //Adicion del tiempo x vuelta a la variable acumuladora
        foreach($vueltas_dia as $tiempo_vuelta){
            $acumulado+=$tiempo_vuelta;
        }

        //Retornar el Promedio final del tiempo de todas las vueltas
        return ($acumulado/$total_vueltas);
    }

    //Definicion del numero de pilotos como constante
    define("NUM_PILOTOS",23);

    //Guardado de los Datos de las vueltas de los pilotos en forma de matriz
    $vueltas_pilotos=[
        //Informacion Piloto posicion 0
        [
            'dia_1'=>[
                'vuelta_1'=>65.234,
                'vuelta_2'=>63.234
            ],
            'dia_2'=>[
                'vuelta_1'=>69.234,
                'vuelta_2'=>68.234
            ]
        ],

        //Informacion Piloto posicion 1
        [
            'dia_1'=>[
                'vuelta_1'=>68.345,
                'vuelta_2'=>70.345
            ],
            'dia_2'=>[
                'vuelta_1'=>68.215,
                'vuelta_2'=>66.345
            ]
        ],

        //Informacion Piloto posicion 22
        [
            'dia_1'=>[
                'vuelta_1'=>67.876,
                'vuelta_2'=>69.876
            ],
            'dia_2'=>[
                'vuelta_1'=>65.776,
                'vuelta_2'=>67.200
            ]
        ],

    ];

    //Definicion de Matriz contenedora de los promedios diarios de cada piloto
    $promedios_pilotos=[];

    foreach($vueltas_pilotos as $vueltas){

        //Guardado de los promedios de tiempos de vuelta X Dia
        $promedio_dia_1=promediar_dia($vueltas['dia_1']);
        $promedio_dia_2=promediar_dia($vueltas['dia_2']);

        //Insercion de los promedios calculados al arreglo contenedor
        array_push($promedios_pilotos,[
            'dia_1'=>$promedio_dia_1,
            'dia_2'=>$promedio_dia_2
        ]);

    }

    //Definicion de Matriz contenedora del mejor tiempo obtenido x cada piloto
    $vuelta_ideal_pilotos=[];

    //Generar un ciclo for para acceder de forma individual a la informacion de cada piloto
    for($id_piloto=0; $id_piloto<count($vueltas_pilotos); $id_piloto++){

        //Guardado de la informacion personal de cada piloto
        $info_vueltas_piloto=$vueltas_pilotos[$id_piloto];

        //Guardado del menor promedio registrado por el piloto
        $menor_promedio=min($promedios_pilotos[$id_piloto]);

        //Acceder de forma individual a cada uno de los dias de practica del piloto
        foreach($info_vueltas_piloto as $info_dia){
            
            //Acceder de forma individual a cada vuelta de cada dia de practica del piloto
            foreach($info_dia as $info_vuelta){

                /*
                    En caso de que el valor iterado actual sea menor a la mejor vuelta registrada, el valor de la vuelta actual debera actualizarse, en caso contrario no hara nada.

                    Este proceso lo realizara por cada vuelta de cada dia n*n
                */
                if($info_vuelta<$menor_promedio){
                    $mejor_vuelta=$info_vuelta;
                }

            }

        }

        //Insercion del valor de la vuelta ideal de cada piloto en un arreglo contenedor
        array_push($vuelta_ideal_pilotos,$mejor_vuelta);

    }

    //Obtencion de la vuelta ideal con el menor tiempo
    $menor_tiempo=min($vuelta_ideal_pilotos);

    //Guardado de la posicion del piloto con el menor tiempo en su vuelta ideal de todos
    $id_piloto_ganador=array_search($menor_tiempo,$vuelta_ideal_pilotos);

    session_start();

    $data=[
        'title_header'=>"Ganador Premio",
        'title'=>"Ganador de la Pole Position",
        'thead'=>[
            ['content'=>'Nombre Item'],
            ['content'=>'Valor Detallado']
        ],
        'rows'=>[
            [
                ['content'=>'Posicion del Jugador'],
                ['content'=>$id_piloto_ganador]
            ],
            [
                ['content'=>'Mejor Tiempo'],
                ['content'=>$menor_tiempo]
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
            [$data,'all']
        ],
        $ruta_retorno,
        $ruta_result
    );

?>