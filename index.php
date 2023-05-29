<?php
    
    session_start();
    $_SESSION['title_header']="Cuaderno Ficha";
    $_SESSION['addons']=[
        [
            'name'=>"prefix_route",
            'value'=>""
        ]
    ];

    require("views/header.php");
    require("addons/structures.php");
?>

    <section class="text-center">
        <h1 id="home_title">Apuntes Desarrollo Web en PHP</h1>
    </section>

    <table class="table table-striped">
            <?php
                links_home(
                [
                    //Link Actividad en clase (25-04-23): Operadores aritmeticos y Ejercicio Salario
                    [
                        'card_title'=>'Actividad Operaciones Artimeticas',
                        'description'=>'Esta actividad se realiza con el fin de repasar los operadores aritmeticos junto con su aplicacion en los ciclos de control',
                        'buttons'=>[
                            [
                                'text'=>'Revisar',
                                'btn_class'=>'success'
                            ]
                        ],
                        'data_route'=>[
                            'type_page'=>'classnotes',
                            'route'=>'25-04-23/'
                        ]
                    ],

                    //Link Tarea: Operadores Aritmeticos y Ejercicios
                    [
                        'card_title'=>'Actividad Operadores y Aplicacion',
                        'description'=>'Esta actividad se realiza con el fin de aplicar de manera mas profunda el concepto de operadores logicos y aritmeticos, asi como su implementacion en estructuras de control con un mayor nivel de dificultad',
                        'buttons'=>[
                            [
                                'text'=>'Revisar',
                                'btn_class'=>'success'
                            ]
                        ],
                        'data_route'=>[
                            'type_page'=>'activity',
                            'route'=>'operations/'
                        ]
                    ],

                    //Link Tarea: Condicionales y Ejercicios
                    [
                        'card_title'=>'Actividad Condicionales',
                        'description'=>'Esta actividad se realiza con el fin de aplicar de manera mas profunda el concepto condicionales, tanto simples como anidados, asi como su implementacion en estrucutras de control de tamaño aun mayor',
                        'buttons'=>[
                            [
                                'text'=>'Revisar',
                                'btn_class'=>'success'
                            ]
                        ],
                        'data_route'=>[
                            'type_page'=>'activity',
                            'route'=>'conditionals/'
                        ]
                    ],

                    //Link Tarea: Ejercicio Transmilenio
                    [
                        'card_title'=>'Ejercicios de aplicacion',
                        'description'=>'Esta actividad se realiza con el fin de aplicar los conocimientos sobre arreglos, ciclos de control y condicionales a un problemas de la vida real',
                        'buttons'=>[
                            [
                                'text'=>'Revisar',
                                'btn_class'=>'success'
                            ]
                        ],
                        'data_route'=>[
                            'type_page'=>'activity',
                            'route'=>'aplications/'
                        ]
                    ],

                    //Link Tarea: Actividad en clase: Clases, objetos, atributos y metodos
                    [
                        'card_title'=>'Actividad en Clase: Clases, Objetos, Atributos y Metodos',
                        'description'=>'Esta actividad se realiza en clase con el fin de conocer y aplicar los conocimientos basicos de las clases a su como sus respetivas partes y claro su gran aporte y avance',
                        'buttons'=>[
                            [
                                'text'=>'Revisar',
                                'btn_class'=>'success'
                            ]
                        ],
                        'data_route'=>[
                            'type_page'=>'classnotes',
                            'route'=>'16-05-23/'
                        ]
                    ],

                    //Link Tarea: Actividad -> Copa Pole Position 
                    [
                        'card_title'=>'Ejercicio: Copa Pole Position',
                        'description'=>'Esta actividad se realiza en clase con el fin de reforzar tanto el manejo como la construccion de matrices',
                        'buttons'=>[
                            [
                                'text'=>'Revisar',
                                'btn_class'=>'success'
                            ]
                        ],
                        'data_route'=>[
                            'type_page'=>'activity',
                            'route'=>'arrays/'
                        ]
                    ],

                    //Link Actividad: Ejercicio Tienda
                    [
                        'card_title'=>'Ejercicio: Tienda',
                        'description'=>'Esa actividad se realiza con el fin de aplicar los conceptos de POO, aplicadas a sucesos de la vida real, en este caso, una tienda de barrio',
                        'buttons'=>[
                            [
                                'text'=>'Revisar',
                                'btn_class'=>'success'
                            ]
                        ],
                        'data_route'=>[
                            'type_page'=>'activity',
                            'route'=>'store/'
                        ]
                    ],

                    //Link Actividad: Ejercicio Banco
                    [
                        'card_title'=>'Ejercicio: Banco',
                        'description'=>'Esa actividad se realiza con el fin de aplicar los conceptos de POO, aplicadas a sucesos de la vida real, en este caso, un banco',
                        'buttons'=>[
                            [
                                'text'=>'Revisar',
                                'btn_class'=>'success'
                            ]
                        ],
                        'data_route'=>[
                            'type_page'=>'activity',
                            'route'=>'bank/'
                        ]
                    ]


                ]
            );
        ?>
        
    </table>
<?php
    require("views/footer.php");
?>