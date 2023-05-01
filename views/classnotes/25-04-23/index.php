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

    <div class="container">
        
        <div class="card">
            <div class="card-header text-center">
                <h4 class="card-title">Calculadora de Salario segun horas y dias</h4>
            </div>

            <form action="../../../controllers/classnotes/25-04-23/salary.php" method="POST">

                <div class="card-body">
                    <div class="mb-3">
                        <label for="dias_trabajados" class="form-label">Ingrese la cantidad de dias trabajados:</label>

                        <input type="number" class="form-control" name="dias_trabajados" aria-describedby="helpId" placeholder="Por defecto se tomara el valor de 5 dias" min=1>
                    </div>

                    <div class="mb-3">
                        <label for="horas_diarias" class="form-label">Ingrese la cantidad de Horas diarias trabajadas:</label>

                        <input type="number" class="form-control" name="horas_diarias" aria-describedby="helpId" placeholder="1" min=1 >
                    </div>

                    <div class="mb-3">
                        <label for="salario_base" class="form-label">Ingrese la cantidad de Horas diarias trabajadas:</label>

                        <input type="number" class="form-control" name="salario_base" aria-describedby="helpId" placeholder="4833" min=4833>
                    </div>
            
                </div>

                <div class="card-footer text-muted">
                    <button type="submit" class="btn btn-primary col-md-12">Calcular</button>
                </div>

            </form>

        </div>

    </div>

<?php require("../../footer.php");?>