<?php 
    require("../../../controllers/classnotes/16-05-23/ambiente.php");

    //Activacion Sesion y Declaracion Titulo Pagina
    session_start();
    $_SESSION['title_header']="Clase Ambiente";
    $_SESSION['addons']=[
        [
            'name'=>"prefix_route",
            'value'=>"../../../"
        ]
    ];

    require("../../header.php"); 

?>

    <div class="container text-center">
        <h1>Aplicacion Clase Ambiente</h1>
    </div>

    <div class="container text-center">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>codigo Item</th>
                    <th>Detallado Item</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Primera Instancia de Ambiente</td>
                    <td>
                        <?php 
                            $nuevo_ambiente=new Ambiente;
                            var_dump($nuevo_ambiente)
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Actualizacion de Datos manual</td>
                    <td>
                        <?php
                            $nuevo_ambiente->update("702",30,"Septimo Piso","20x20m");
                            var_dump($nuevo_ambiente);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Actualizacion por formulario codigo Ambiente</td>
                    <td>
                        <?php
                            if(isset($_POST['codigo_ambiente'])){
                                $nuevo_ambiente->update($_POST['codigo_ambiente']);
                                var_dump($nuevo_ambiente);
                            }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

    <div class="container text-center">

        <div class="card">
            <div class="card-header">
                <h4>Actualizar el codigo del Ambiente a través de un formulario:<h4>
            </div>
            <form action="" method="post">
                <div class="card-body">
                    <label for="codigo_ambiente" class="form-label">Nuevo codigo del Ambiente</label>
                    <input type="text" class="form-control" name="codigo_ambiente" id="" placeholder="">
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" class="btn btn-primary">Actualizar Datos</button>
                </div>
            </form>
            
        </div>
        
    </div>

    

<?php
    require("../../footer.php");
?>