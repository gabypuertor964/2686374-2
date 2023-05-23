<?php
    $_SESSION['title_header']="Copa Pole Position";
    require("../../header.php");
    require("../../../addons/structures.php");
?>

<div class="container text-center">
    <h1>Evento Formula Cart</h1>

    <p>
        Han sido contratados para apoyar a los coordinadores del evento FORMULA CART en la selección del ganador de a pole position, es decir, el derecho a tomar la partida en la primera posición en dicha carrera, para la carrera del circuito Road America.
    </p>

    <p>
        Para determinar el ganador de la pole position se realizan clasificaciones durante dos días. En cada uno de ellos, cada uno de los 23 pilotos debe dar dos vueltas a la pista y se lleva el registro del tiempo utilizado para cada vuelta.
    </p>

    <p>
        El ganador de la pole position será el piloto que tenga la mejor vuelta ideal.<b> Una vuelta ideal se define como la vuelta más rápida que da el piloto el día que tuvo el mejor promedio de tiempos en sus vueltas</b>. Por lo tanto, para cada piloto se determina cuál fue su vuelta ideal y <b>el ganador será el que tenga la vuelta ideal más rápida entre todos los pilotos</b>.
    </p>

    <a name="" id="" class="col-md-12 btn btn-primary" href="../../../controllers/activity/arrays/manager.php" role="button">Ver Resultado</a>

</div>

<div class="container" class="button_home">
    <a name="" id="" class="btn btn-success col-md-12" style="margin: 10px 0px 10px 0px;" href="../../../" role="button">Regresar al menu principal
    </a>
</div>

<?php
    require("../../footer.php");
?>
    