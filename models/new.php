<?php

    require("../addons/functions_global.php");
    require("conection.php");

    /*
        ¿Como realizo consultas en PDO?

        Paso 1: Realizar consulta
        $variable_consulta = $variable_coneccion->query("consulta");

        Paso 2: Guardar los datos como mas nos convenga
        $resultados = $consulta->metodo_guardado():

    */
    $conexion_BD = DB_conection("localhost","ejercicio","root");

    $consulta = $conexion_BD->prepare("SELECT * FROM inmuebles");

    $consulta->execute();

    $resultados = $consulta->fetchAll(PDO::FETCH_OBJ);

    var_dump($resultados);


?>