<?php 
    require("../addons/functions_global.php");

    //Activacion Sesion y Declaracion Titulo Pagina asi como variables addons
    session_start();

    $data=$_SESSION['data'];

    //type_validation([[$data,"all"]],"../","",['route_absolute'=>TRUE]);

    $_SESSION['title_header']=$data['title_header'];
    $_SESSION['addons']=$data['addons'];

    require("header.php");
?>

<div class="container text-center">

    <h4 class="card-title"><?php echo($data['title'])?></h4>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <?php
                    //Seleccion individual encabezado Tabla
                    foreach($data['thead'] as $thead){
                        //Mostrado individual Encabezado
                        echo("<th>$thead</th>");
                    }   
                ?>
            </tr>            
        </thead>
        <tbody>
            <?php
                //Seleccion fila columna de forma individual
                foreach($data['rows'] as $row){

                    //Seccion inicio fila
                    $fila="<tr>";

                    //Seleccion individual columna x fila
                    foreach($row as $column){
                        //Adicion columna en la fila
                        $fila.="<td>$column</td>";
                    }

                    //Cierre fila
                    $fila.="</tr>";
                    
                    //Mostrar fila
                    echo($fila);
                }   
            ?>
        </tbody>
    </table>

    <a class="btn btn-primary col-md-12" href="../" role="button">Regresar al menu principal</a>
</div>


