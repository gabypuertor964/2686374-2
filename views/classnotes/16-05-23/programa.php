<?php 
    require("../../../controllers/classnotes/16-05-23/programa.php");

    //Activacion Sesion y Declaracion Titulo Pagina
    session_start();
    $_SESSION['title_header']="Clase Programa";
    $_SESSION['addons']=[
        [
            'name'=>"prefix_route",
            'value'=>"../../../"
        ]
    ];

    require("../../header.php"); 

?>

    <div class="container text-center">
        <h1>Aplicacion Clase Programa</h1>
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
                    <td>Primera Instancia de Programa</td>
                    <td>
                        <?php 
                            $nuevo_programa=new Programa;
                            var_dump($nuevo_programa)
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Actualizacion de Datos manual</td>
                    <td>
                        <?php
                            $nuevo_programa->update("Tecnologo en Analisis y Desarrollo de Software","2022-01-01","2024-01-01","Tecnologo");
                            var_dump($nuevo_programa);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Actualizacion por formulario codigo Ambiente</td>
                    <td>
                        <?php
                            if(isset($_POST['nombre_programa'])){
                                $nuevo_programa->update($_POST['nombre_programa']);
                                var_dump($nuevo_programa);
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
                <h4>Actualizar el Nombre del Programa a través de un formulario:<h4>
            </div>
            <form action="" method="post">
                <div class="card-body">
                    <label for="nombre_programa" class="form-label">Nuevo Nombre del Programa</label>
                    <input type="text" class="form-control" name="nombre_programa" id="" placeholder="">
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