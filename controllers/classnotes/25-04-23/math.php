<?php
    /**
        *@Autor: Gaby Puerto
        *@Fecha: 25/04/23
        *@Tema: Operaciones Matematicas
    **/

    //Funcion generadora de filas
    function operaciones($num_1,$num_2,$operacion){

        //Conversion a minuscula
        $operacion=strtolower($operacion);

        switch($operacion){
            case "suma" OR '+':

                if($operacion=="+"){
                    $operacion="suma";
                }

                $resultado=($num_1+$num_2);
            break;

            case "resta" OR '-':

                if($operacion=="-"){
                    $operacion="resta";
                }

                $resultado=($num_1-$num_2);
            break;

            case "multiplicación" OR 'x':

                if($operacion=="x"){
                    $operacion="multiplicación";
                }

                $resultado=($num_1*$num_2);
            break;

            case "división" OR '/':

                if($operacion=="/"){
                    $operacion="división";
                }

                $resultado=($num_1/$num_2);
            break;


        }

        $operacion=ucfirst($operacion);

        echo(
            "
                <tr>
                    <td>$operacion ($num_1 y $num_2)</td>
                    <td>$resultado</td>
                </tr>
            "
        );
    }
?>