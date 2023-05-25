<?php

    require("../../../controllers/activity/bank/cajero.php");

    $cajero = new cajero();

    echo(var_dump($cajero)."<br><br>");

    $cajero -> realizar_consignacion(1000000);
    echo("<br><br>");

    echo(var_dump($cajero->show_attributes(['saldo']))."<br><br>");

    $cajero -> realizar_retiros(200000);

    echo("<br><br>");

    echo(var_dump($cajero->show_attributes(['saldo']))."<br><br>");

    $cajero -> update_attibutes("Sandra Gabriela Puerto Rojas",1019604623);

    echo("<br><br>");

    echo(var_dump($cajero->show_attributes(['nombre_cliente','saldo','cod_cuenta']))."<br><br>");





?>