<?php 
    require("../../../controllers/classnotes/25-04-23/math.php");

    //Activacion Sesion y Declaracion Titulo Pagina
    session_start();
    $_SESSION['title_header']="Clase 25-04-23";

    require("../../header.php");      
?>

    <div class="container">

        <div class="card">
            <div class="card-header text-center">
                <h4 class="card-title">Operaciones Artimeticas</h4>
            </div>
            <div class="card-body">
                
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Operacion</th>
                        <th>Resultado</th>
                    </tr>
                </thead>

                <tbody>
                    <?php operaciones(2,3,"suma")?>
                    <?php operaciones(2,3,"resta")?>
                    <?php operaciones(3,2,"resta")?>
                    <?php operaciones(2,3,"multiplicación")?>
                    <?php operaciones(2,3,"división")?>
                    <?php operaciones(3,2,"división")?>
                </tbody>

        </table>
                
            </div>
        </div>
    </div>


    <div class="container text-center">
        
        <form action="../../../controllers/classnotes/25-04-23/salary.php" method="post">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Calculadora Salario Trabajador</h4>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                      <label for="dias_trabajados" class="form-label">Cantidad de Dias Trabajados</label>
                      <input type="number" class="form-control" name="dias_trabajados" placeholder="Por defecto se tomara el valor de 5">
                    </div>

                    <div class="mb-3">
                      <label for="cantidad_horas" class="form-label">Cantidad de Horas diarias Trabajadas</label>
                      <input type="number"
                        class="form-control" name="cantidad_horas" placeholder="1" min=1>
                    </div>

                    <div class="mb-3">
                      <label for="valor_hora" class="form-label">Valor Hora de trabajo</label>
                      <input type="number" class="form-control" name="valor_hora" placeholder="4833" min=4833>
                    </div>


                </div>
                <div class="card-footer text-muted">
                    <button type="submit" class="btn btn-primary col-md-12">Calcular</button>
                </div>
            </div>
        </form>


    </div>

    

<?php require("../../footer.php");?>