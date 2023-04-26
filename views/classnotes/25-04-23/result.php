<?php 
    //Activacion Sesion y Declaracion Titulo Pagina
    session_start();
    $_SESSION['title']="Salario Trabajador";

    $valor_total=$_SESSION['valor_total'];
    $dias_trabajados=$_SESSION['dias_trabajados'];
    $horas_diarias=$_SESSION['horas_diarias'];
    $salario_base=$_SESSION['salario_base'];

    require("../../header.php");
?>

<div class="container text-center">

    <h4 class="card-title">Resultado Operación</h4>

    <table class="table table-bordered table-striped table-light">
        <thead>
            <tr>
                <th>Dato</th>
                <th>Valor Ingresado</th>
            </tr>            
        </thead>
        <tbody>
            <tr>
                <td>Dias trabajados</td>
                <td><?php echo($dias_trabajados)?></td>
            </tr>
            <tr>
                <td>Horas Diarias Trabajadas</td>
                <td><?php echo($horas_diarias)?></td>
            </tr>
            <tr>
                <td>Salario base</td>
                <td>$<?php echo($salario_base)?></td>
            </tr>
            <tr>
                <td>Salario total</td>
                <td>$<?php echo($valor_total)?></td>
            </tr>
        </tbody>

    </table>
</div>


