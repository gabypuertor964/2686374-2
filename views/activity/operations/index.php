<?php
    $_SESSION['title']="Ejercicio Operaciones";
    require("../../header.php");
    require("../../../controllers/activity/operations/structures.php");
?>

    <!--Calculo Area Triangulo-->
    <?php
        forms_generate(
            "triangle",
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
            "Calcular"
        );
    ?>

    <!--Retorno Dos Variables-->
    <?php
        forms_generate(
            "variables_return",
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
            "Retornar"
        );
    ?>

    <!--Potenciacion sin restricciones-->
    <?php
        forms_generate(
            "empowerment",
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
            "Calcular"
        );
    ?>

    <!--Conversion Euros a Dolares-->
    <?php
        forms_generate(
            "trm",
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
            "Convertir"
        );
    ?>

    <!--Calculo Area Rectangulo-->
    <?php
        forms_generate(
            "rectangle",
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
            "Calcular"
        );
    ?>

    <!--Calculo Area y Perimetro de un cuadrado-->
    <?php
        forms_generate(
            "square",
            "Calcular Area y Perimetro de un cuadrado",
            [
                [
                    'label'=>"Logitud Lado",
                    'name'=>"lado_cuadrado",
                    'type'=>"float"
                ]
            ],
            "Calcular"
        );
    ?>

    <!--Calculo Area y Volumen Cilindro-->
    <?php
        forms_generate(
            "cylinder",
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
            "Calcular"
        );
    ?>

    <!--Calculo Promedio 3 digitos-->
    <?php
        forms_generate(
            "average",
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
            "Promediar"
        );
    ?>

    <!--Elevacion Potencia reales con naturales-->
    <?php
        forms_generate(
            "empowerment_conditional",
            "Potenciacion",
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
            "Calcular"
        );
    ?>

<?php
    require("../../footer.php");
?>




