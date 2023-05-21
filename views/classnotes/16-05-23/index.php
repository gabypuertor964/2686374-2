<?php 

    //Activacion Sesion y Declaracion Titulo Pagina
    session_start();
    $_SESSION['title_header']="Clase 16-05-23";
    $_SESSION['addons']=[
        [
            'name'=>"prefix_route",
            'value'=>"../../../"
        ]
    ];

    require("../../header.php");
    require("../../../addons/structures.php");

?>

<div class="container text-center">

    <h1>Definicion de Clases, Atributos y Metodos</h1>

</div>

<table class="table table-striped">

        <?php
            links_home(
                [
                    [
                        'card_title'=>"Clase Aprendiz",
                        'description'=>"Aplicacion de la clase Aprendiz",
                        'buttons'=>[
                            [
                                'text'=>"Revisar"
                            ]
                        ],
                        'data_route'=>[
                            'addons_route'=>[
                                'type'=>"absolute"
                            ],
                            'route'=>"aprendiz.php"
                        ]
                    ],

                    [
                        'card_title'=>"Clase Centro",
                        'description'=>"Aplicacion de la clase Centro",
                        'buttons'=>[
                            [
                                'text'=>"Revisar"
                            ]
                        ],
                        'data_route'=>[
                            'addons_route'=>[
                                'type'=>"absolute"
                            ],
                            'route'=>"centro.php"
                        ]
                    ],

                    [
                        'card_title'=>"Clase Ambiente",
                        'description'=>"Aplicacion de la clase Ambiente",
                        'buttons'=>[
                            [
                                'text'=>"Revisar"
                            ]
                        ],
                        'data_route'=>[
                            'addons_route'=>[
                                'type'=>"absolute"
                            ],
                            'route'=>"ambiente.php"
                        ]
                    ],

                    [
                        'card_title'=>"Clase Programa",
                        'description'=>"Aplicacion de la clase Programa",
                        'buttons'=>[
                            [
                                'text'=>"Revisar"
                            ]
                        ],
                        'data_route'=>[
                            'addons_route'=>[
                                'type'=>"absolute"
                            ],
                            'route'=>"programa.php"
                        ]
                    ],
                ]
            );

        ?>

    </table>

<?php
    require("../../footer.php");
?>
    
