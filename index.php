<?php
    
    session_start();
    $_SESSION['title_header']="Cuaderno Ficha";
    $_SESSION['addons']=[
        [
            'name'=>"prefix_route",
            'value'=>""
        ]
    ];

    require("views/header.php");
?>
    <div class="container text-center">

        <a class="btn btn-primary col-md-12" href="views/activity/operations/index.php" role="button">Actividad Operaciones</a>

    </div>

    <div class="container">

        <a class="btn btn-primary col-md-12" href="views/classnotes/25-04-23/index.php" role="button">Actividad Salario</a>
        
    </div>

<?php
    require("views/footer.php");
?>