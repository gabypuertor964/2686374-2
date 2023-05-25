<?php 
    require("../addons/functions_global.php");

    session_start();

    //Recuperacion de datos para construccion de tabla
    $data=$_SESSION['data'];

    //Validacion de existencia de Datos
    type_validation(
        [
            [$data,"all"]
        ],
        "../"
    );

    //Guardado titulo cabecera
    $title_header=$data['title_header'];

    //Guardado Titulo Tabla
    $title=$data['title'];

    //Guardado Filas de la cabecera de la tabla
    $thead=$data['thead'];

    //Guardado filas del cuerpo de la tabla
    $rows_columns=$data['rows'];

    //Etapa 1: Apretura etiqueta table junto a sus correspondientes clases
    $table="
        <table class='table table-bordered table-striped text-center align-items-center justify-content-center'>
    ";

    /*
        Etapa 2: Creacion Cabecera de tabla
    */
    $table.="
            <thead>
                <tr>
    ";

    foreach($thead as $column_thead){
        $content=$column_thead['content'];
        $addons_column="";

        if(isset($column_thead['addons'])){
            foreach($column_thead['addons'] as $addon_colum){
                $name=$column_thead['addons']['name'];
                $value=$column_thead['addons']['value'];

                $addons_column.="$name='$value' ";
            }
        }

        $table.="
                    <th $addons_column>$content</th>
        ";
    }

    $table.="
            </thead>
    ";

    /*
        Etapa 3: Integracion Filas del cuerpo de la tabla
    */
    $table.="
            <tbody>
    ";

    foreach($rows_columns as $rows){

        $table.="
                    <tr>
        ";
        
        foreach($rows as $column){

            $content=$column['content'];
            $addons_column="";

            if(isset($column['addons'])){
                $addons=$column['addons'];

                foreach($addons as $addon){
                    $name=$addon['name'];
                    $value=$addon['value'];

                    $addons_column.="$name='$value' ";
                }

            }

            $table.="
                            <td $addons_column class='align-middle'>$content</td>
            ";

        }

        $table.="
                    </tr>
        ";
    }
    $table.="
            </tbody>
        </table>
    ";

    /*
        Etapa 4: Insercion Boton de retorno
    */
    $route_return=$data['route_return'];

    $table.="
        <a class='btn btn-primary col-md-12' href='../$route_return' role='button'>Regresar</a>
    ";
    
    $_SESSION['title_header']=$title_header;

    if(isset($data['addons'])){
        $_SESSION['addons']=$data['addons'];
    }else{
        $_SESSION['addons']=[
            [
                'name'=>"prefix_route",
                'value'=>'../'
            ]
        ];
    }

    require("header.php");
?>

<div class="container text-center">

    <h4 class="card-title"><?php echo($title)?></h4>

    <!--Imprimir la tabla generada-->
    <?php
        echo($table);
    ?> 
</div>



