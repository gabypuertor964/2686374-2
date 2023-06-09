<?php
    $_SESSION['title_header']="Ejercicio Operaciones";
    require("../../header.php");
    require("../../../addons/structures.php");
?>

    <!--Calculo Area Triangulo-->
    <?php
        forms_generate(
            [
               'route'=>"activity/operations/logistic.php",
               'function'=>'triangle'
            ],
            "Calcular Area del Triangulo",
            [
                [
                    'label'=>"Logitud Base",
                    'type'=>"float",
                    'name'=>"base_triangulo"
                ],
                [   'label'=>"Logitud Altura",
                    'type'=>"float",
                    'name'=>"altura_triangulo"
                ]
            ],
            [
                [
                    'text'=>'Identificar'
                ]
            ]
        );
    ?>

    <!--Retorno Dos Variables-->
    <?php
        forms_generate(
            [
                'route'=>"activity/operations/logistic.php",
                'function'=>"variables_return"
            ],
            "Retorno de Variables",
            [
                [
                    'label'=>"Primera variable",
                    'name'=>"primera_variable",
                    'type'=>"text"
                ],
                [   'label'=>"Segunda Variable",
                    'name'=>"segunda_variable",
                    'type'=>"text"
                ]
            ],
            [
                [
                    'text'=>'Retornar'
                ]
            ]
        );
    ?>

    <!--Potenciacion sin restricciones-->
    <?php
        forms_generate(
            [
                'route'=>"activity/operations/logistic.php",
                'function'=>"empowerment"
            ],
            "Potenciacion",
            [
                [
                    'label'=>"Base de la potencia",
                    'name'=>"base_potencia",
                    'type'=>"float"
                ],
                [   'label'=>"Exponente de la potencia",
                    'name'=>"exponente_potencia",
                    'placeholder'=>'Por defecto se elevara al cuadrado',
                    'type'=>"number",
                    'min'=>2
                ]
            ],
        [
            [
                'text'=>'Identificar'
            ]
        ]
        );
    ?>

    <!--Conversion Euros a Dolares-->
    <?php
        forms_generate(
            [
                'route'=>"activity/operations/logistic.php",
                'function'=>"trm"
            ],
            "Convertidor de Divisas (EUR - USD)",
            [
                [
                    'label'=>"Cantidad Euros",
                    'name'=>"cantidad_euros",
                    'type'=>"float"
                ],
                [   'label'=>"Tasa de cambio",
                    'name'=>"tasa_cambio",
                    'type'=>"float"
                ]
            ],
            [
                [
                    'text'=>'Convertir'
                ]
            ]
        );
    ?>

    <!--Calculo Area Rectangulo-->
    <?php
        forms_generate(
            [
                'route'=>"activity/operations/logistic.php",
                'function'=>"rectangle"
            ],
            "Calcular Area del Rectangulo",
            [
                [
                    'label'=>"Longitud Base",
                    'name'=>"base_rectangulo",
                    'type'=>"float"
                ],
                [   'label'=>"Longitud Altura",
                    'name'=>"altura_rectangulo",
                    'type'=>"float"
                ]
            ],
            [
                [
                    'text'=>'Identificar'
                ]
            ]
        );
    ?>

    <!--Calculo Area y Perimetro de un cuadrado-->
    <?php
        forms_generate(
            [
                'route'=>"activity/operations/logistic.php",
                'function'=>"square"
            ],
            "Calcular Area y Perimetro de un cuadrado",
            [
                [
                    'label'=>"Logitud Lado",
                    'name'=>"lado_cuadrado",
                    'type'=>"float"
                ]
            ],
            [
                [
                    'text'=>'Identificar'
                ]
            ]
        );
    ?>

    <!--Calculo Area y Volumen Cilindro-->
    <?php
        forms_generate(
            [
                'route'=>"activity/operations/logistic.php",
                'function'=>"cylinder"
            ],
            "Calcular Area y Volumen del Cilindro",
            [
                [
                    'label'=>"Valor Radio",
                    'name'=>"radio_cilindro",
                    'type'=>"float"
                ],
                [
                    'label'=>"Valor Altura",
                    'name'=>"altura_cilindro",
                    'type'=>"float"
                ]
            ],
            [
                [
                    'text'=>'Identificar'
                ]
            ]
        );
    ?>

    <!--Calculo Longitud y Area Circunferencia-->
    <?php
        forms_generate(
            [
                'route'=>"activity/operations/logistic.php",
                'function'=>"circle"
            ],            
            "Calcular Longitud y Area Circunferencia",
            [
                [
                    'label'=>"Valor Radio",
                    'name'=>"radio_circulo",
                    'type'=>"float"
                ]
            ],
            [
                [
                    'text'=>'Identificar'
                ]
            ]
        );
    ?>

    <!--Calculo Promedio 3 digitos-->
    <?php
        forms_generate(
            [
                'route'=>"activity/operations/logistic.php",
                'function'=>"average"
            ],
            "Calcular Promedio de 3 Numeros",
            [
                [
                    'label'=>"Primer Numero",
                    'name'=>"primer_numero",
                    'type'=>"float"
                ],
                [
                    'label'=>"Segundo Numero",
                    'name'=>"segundo_numero",
                    'type'=>"float"
                ],
                [
                    'label'=>"Tercer Numero",
                    'name'=>"tercer_numero",
                    'type'=>"float"
                ]

            ],
            [
                [
                    'text'=>'Promediar'
                ]
            ]
        );
    ?>

    <!--Elevacion Potencia reales con naturales-->
    <?php
        forms_generate(
            [
                'route'=>"activity/operations/logistic.php",
                'function'=>"empowerment_conditional"
            ],
            "Potenciacion de Reales con Enteros",
            [
                [
                    'label'=>"Base de la potencia",
                    'name'=>"base_potencia",
                    'type'=>"float"
                ],
                [   'label'=>"Exponente de la potencia",
                    'name'=>"exponente_potencia",
                    'placeholder'=>'Ingresa Solo valores enteros',
                    'type'=>"number",
                ]
            ],
            [
                [
                    'text'=>'Identificar'
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
    




