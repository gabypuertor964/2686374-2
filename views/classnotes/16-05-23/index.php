<?php 
    require("../../../controllers/classnotes/16-05-23/aprendiz.php");

    //Activacion Sesion y Declaracion Titulo Pagina
    session_start();
    $_SESSION['title_header']="Clase 16-05-23";
    $_SESSION['addons']=[
        [
            'name'=>"prefix_route",
            'value'=>"../../../"
        ]
    ];

    require("../../header.php"); 

?>

    <div class="container text-center">
        <h1>Actividad Objetos y Clases</h1>
    </div>

    <div class="container text-center">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre Item</th>
                    <th>Detallado Item</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Primera Instancia del aprendiz</td>
                    <td>
                        <?php 
                            $nuevo_aprendiz=new Aprendiz;
                            var_dump($nuevo_aprendiz)
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Adicion de Datos Manual</td>
                    <td>
                        <?php
                            $nuevo_aprendiz->agregar_datos("1","Gaby Puerto","femenino","2006-02-03",17);
                            var_dump($nuevo_aprendiz);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Actualizacion por formulario nombre Aprendiz</td>
                    <td>
                        <?php
                            if(isset($_POST['new_name'])){
                                $nuevo_aprendiz->actualizar_nombre($_POST['new_name']);
                                var_dump($nuevo_aprendiz);
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
                <h4>Actualizar el nombre del Aprendiz a través de un formulario:<h4>
            </div>
            <form action="" method="post">
                <div class="card-body">
                    <label for="new_name" class="form-label">Nuevo Nombre del aprendiz</label>
                    <input type="text" class="form-control" name="new_name" id="" placeholder="">
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
    
