<?php
    $_SESSION['title_header']="Ejercicio Condicionales";
    require("../../header.php");
    require("../../../addons/structures.php");
?>

<?php

    //Construya el código para saber si un número es positivo o negativo.
    forms_generate(
        [
            'route'=>"activity/conditionals/logistic.php",
            'function'=>'positive_negative'
        ],
        'Conocer el signo de un numero',
        [
            [
                'label'=>'Ingrese el numero',
                'type'=>'float',
                'name'=>'numero',
                'min'=>''
            ]
        ],
        [
            [
                'text'=>'Identificar'
            ]
        ]
    );

    //Escribir un programa en PHP que lea dos números del teclado y diga cuál es el mayor y cuál es el menor
    forms_generate(
        [
            'route'=>"activity/conditionals/logistic.php",
            'function'=>'elderly'
        ],
        'Identificar Cual numero es mayor',
        [
            [
                'label'=>'Primer numero',
                'type'=>'float',
                'name'=>'primer_numero',
                'min'=>''
            ],
            [
                'label'=>'Segundo numero',
                'type'=>'float',
                'name'=>'segundo_numero',
                'min'=>''
            ]
        ],
        [
            [
                'text'=>'Identificar'
            ]
        ]
    );

    //Escriba un programa que lea tres números enteros positivos, y que calcule e imprima en pantalla el menor y el mayor de todos ellos.
    forms_generate(
        [
            'route'=>"activity/conditionals/logistic.php",
            'function'=>'elderly_minor'
        ],
        'Identificar cual numero es mayor y cual es menor',
        [
            [
                'label'=>'Primer numero',
                'type'=>'number',
                'name'=>'primer_numero',
            ],
            [
                'label'=>'Segundo numero',
                'type'=>'number',
                'name'=>'segundo_numero'
            ],
            [
                'label'=>'Tercer numero',
                'type'=>'number',
                'name'=>'tercer_numero'
            ]
        ],
        [
            [
                'text'=>'Identificar'
            ]
        ]
    );

    //Calcular el sueldo de los empleados de una empresa. Para ello se deberá pedir el nombre del empleado, las horas normales trabajadas y las horas extras. Tener en cuenta que el valor de la hora es de $40000 y que las horas extras se pagan doble. Una hora extra se paga cuando el trabajador labora más de 48 horas a la semana.
    forms_generate(
        [
            'route'=>"activity/conditionals/logistic.php",
            'function'=>'salary'
        ],
        'Conocer Cuanto debe recibir de salario un Trabajador',
        [
            [
                'label'=>'Nombre Trabajador',
                'type'=>'text',
                'name'=>'nombre_trabajador'
            ],
            [
                'label'=>'Horas Trabajadas',
                'type'=>'number',
                'name'=>'horas_trabajadas'
            ],
        ],
        [
            [
                'text'=>'Calcular'
            ]
        ]
    );

    //Dados dos números A y B encontrar el cociente entre A y B. Recordar que la división por cero no está definida, en ese caso debe aparecer una leyenda anunciando que la división no es posible.
    forms_generate(
        [
            'route'=>"activity/conditionals/logistic.php",
            'function'=>'quotient'
        ],
        'Conocer el cociente de la division entre A y B',
        [
            [
                'label'=>'Numero A',
                'type'=>'float',
                'name'=>'numero_a',
                'placeholder'=>'Inserte el dividendo'
            ],
            [
                'label'=>'Numero B',
                'type'=>'float',
                'name'=>'numero_b',
                'placeholder'=>'Inserte el divisor'
            ],
        ],
        [
            [
                'text'=>'Calcular'
            ]
        ]
    );

    //numDia es una variable numérica que puede tomar 7 valores, ellos son 1, 2, 3, 4, 5,6 o 7. Mostar el nombre el nombre del día de la semana que corresponde al valor de la variable numDia.
    forms_generate(
        [
            'route'=>"activity/conditionals/logistic.php",
            'function'=>'day_week'
        ],
        'Identificar el dia de la Semana',
        [
            [
                'label'=>'Numero de dia',
                'type'=>'number',
                'name'=>'num_dia'
            ],
        ],
        [
            [
                'text'=>'Identificar'
            ]
        ]
    );

    //Dados dos números A y B sumarlos si al menos uno de ellos es negativo en caso contrario multiplicarlos.
    forms_generate(
        [
            'route'=>"activity/conditionals/logistic.php",
            'function'=>'operations'
        ],
        'Suma o Multiplicacion entre el numero A y B',
        [
            [
                'label'=>'Numero A',
                'type'=>'float',
                'name'=>'numero_a',
                'min'=>''
            ],
            [
                'label'=>'Numero B',
                'type'=>'float',
                'name'=>'numero_b',
                'min'=>''
            ],
        ],
        [
            [
                'text'=>'Calcular'
            ]
        ]
    );

    //Pidiendo el día y el mes de nacimiento mostrar el signo
    forms_generate(
        [
            'route'=>"activity/conditionals/logistic.php",
            'function'=>'sign'
        ],
        'Identificar el signo sodiacal segun fecha de Nacimiento',
        [
            [
                'label'=>'Dia',
                'type'=>'numeric',
                'name'=>'dia_nacimiento'
            ],
            [
                'label'=>'Mes',
                'type'=>'numeric',
                'name'=>'mes_nacimiento'
            ],
        ],
        [
            [
                'text'=>'Identificar'
            ]
        ]
    );

    //Un negocio hace descuentos en las ventas de sus productos. Si la compra es inferior a $100000 el descuento es del 5%, si es mayor o igual a 100000 y menor a 200000 el descuento es del 10% sino será del 15%. Dado el precio de la venta mostrar el descuento realizado en pesos y el precio final con descuento.
    forms_generate(
        [
            'route'=>"activity/conditionals/logistic.php",
            'function'=>'descuento'
        ],
        'Procesar descuento sabiendo el precio total',
        [
            [
                'label'=>'Precio',
                'type'=>'float',
                'name'=>'precio'
            ],
        ],
        [
            [
                'text'=>'Calcular'
            ]
        ]
    );

    //Pedir el ingreso de los datos de nacimientos de un hospital: día, mes, año y sexo (1-femenino 2-masculino). Muestra el total de varones, el total de mujeres, el total general.
    forms_generate(
        [
            'route'=>"activity/conditionals/logistic.php",
            'function'=>'clasificacion_nacimientos'
        ],
        'Clasificar Nacimientos',
        [
            [
                'label'=>'Dia',
                'type'=>'numeric',
                'name'=>'dia_nacimiento[]'
            ],
            [
                'label'=>'Mes',
                'type'=>'numeric',
                'name'=>'mes_nacimiento[]'
            ],
            [
                'label'=>'Año',
                'type'=>'numeric',
                'name'=>'año_nacimiento[]'
            ],
            [
                'label'=>'Sexo',
                'type'=>'select',
                'values'=>[
                    'Masculino',
                    'Femenino'
                ],
                'name'=>'sexo[]'
            ],
        ],
        [
            [
                'text'=>'Generar Registro',
                'btn_class'=>'success',
                'onclick'=>"clonar_row('row_10','padre')",
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