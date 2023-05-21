<?php 
    require("../../../controllers/classnotes/16-05-23/centro.php");

    //Activacion Sesion y Declaracion Titulo Pagina
    session_start();
    $_SESSION['title_header']="Clase Centro";
    $_SESSION['addons']=[
        [
            'name'=>"prefix_route",
            'value'=>"../../../"
        ]
    ];

    require("../../header.php"); 

?>

    <div class="container text-center">
        <h1>Aplicacion Clase Centro</h1>
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
                    <td>Primera Instancia de Centro</td>
                    <td>
                        <?php 
                            $nuevo_centro=new Centro;
                            var_dump($nuevo_centro)
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Actualizacion de Datos manual</td>
                    <td>
                        <?php
                            $nuevo_centro->update("Centro de Servicios Financieros","Chapinero,","127.0.0.1");
                            var_dump($nuevo_centro);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Actualizacion por formulario codigo Ambiente</td>
                    <td>
                        <?php
                            if(isset($_POST['nombre_centro'])){
                                $nuevo_centro->update($_POST['nombre_centro']);
                                var_dump($nuevo_centro);
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
                <h4>Actualizar el Nombre del Centro de Formacion a través de un formulario:<h4>
            </div>
            <form action="" method="post">
                <div class="card-body">
                    <label for="nombre_centro" class="form-label">Nuevo codigo del Ambiente</label>
                    <input type="text" class="form-control" name="nombre_centro" id="" placeholder="">
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