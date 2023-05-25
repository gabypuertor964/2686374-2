<?php

    //Importacion de la clase tienda (Esto con el fin de solucionar el error __PHP_Incomplete_Class)
    require("../../../controllers/activity/store/tienda.php");

    //Activacion de la Sesion
    session_start();

    //Guardado Objeto Tienda
    //$store = $_SESSION['object_store'];

    //Guardado Individual de los datos de cada producto
    $producto_1=$_SESSION['producto_1'];
    $producto_2=$_SESSION['producto_2'];
    $producto_3=$_SESSION['producto_3'];

    $_SESSION['title_header']="Sistema Compra/Venta";
    require("../../../addons/structures.php");
    require("../../header.php");

?>

    <div class='container text-center'>                        

        <div class='card'>

            <!--Cabecera Tarjeta-->
            <div class='card-header'>
                <h4 class='card-title'>Nueva Factura</h4>
            </div>

            <!--Inicio Formulario-->
            <form action='../../../controllers/activity/store/manager.php?function=operations'' method='post'>

                <div class='card-body' id='padre'>

                    <!--Registro Producto 1-->
                    <div class='row' id='row_1'>
        
                        <div class='col-md-4'>

                            <label for='nombre_producto[]' class='form-label'>Nombre Producto</label>
                            
                            <select class='form-control' name='nombre_producto[]' id='nombre_producto[]'>

                                <option value='' style='text-align:center;'>Seleccione</option>

                                <?php
                                    //Nombre Producto 1

                                    $text_producto_1=str_replace("_"," ",$producto_1['nombre']);
                                        
                                    $value_producto_1=$producto_1['nombre'];

                                    echo("
                                        <option value='$value_producto_1' style='text-align:center;'>$text_producto_1</option>
                                    ");

                                    //Nombre Producto 2
                                    $text_producto_2=str_replace("_"," ",$producto_2['nombre']);
                                        
                                    $value_producto_2=$producto_2['nombre'];

                                    echo("
                                        <option value='$value_producto_2' style='text-align:center;'>$text_producto_2</option>
                                    ");

                                    //Nombre Producto 3
                                    $text_producto_3=str_replace("_"," ",$producto_3['nombre']);
                                        
                                    $value_producto_3=$producto_3['nombre'];

                                    echo("
                                        <option value='$value_producto_3' style='text-align:center;'>$text_producto_3</option>
                                    ");

                                ?>
                                
                            </select>

                        </div>
                        
                        <div class='col-md-4'>

                            <label for='tipo_operacion[]' class='form-label'>Tipo de Operacion</label>

                            <select class='form-control' name='tipo_operacion[]' id='tipo_operacion[]'>

                                <option value='' style='text-align:center;'>Seleccione</option>
                        
                                <option value='compra' style='text-align:center;'>Compra</option>
                                
                                <option value='venta' style='text-align:center;'>Venta</option>
                                
                            </select>

                        </div>
                        
                        <div class='col-md-4'>

                            <label for='num_unidades[]' class='form-label'>Numero de Unidades</label>

                            <input type='number' class='form-control' name='num_unidades[]' id='num_unidades[]' min='1' placeholder='' max=''  style='text-align: center'>

                        </div>
                        
                    </div>

                    <!--Registro Producto 2-->
                    <div class='row' id='row_2'>
        
                        <div class='col-md-4'>

                            <label for='nombre_producto[]' class='form-label'>Nombre Producto</label>
                            
                            <select class='form-control' name='nombre_producto[]' id='nombre_producto[]'>

                                <option value='' style='text-align:center;'>Seleccione</option>

                                <?php
                                    //Nombre Producto 1

                                    $text_producto_1=str_replace("_"," ",$producto_1['nombre']);
                                        
                                    $value_producto_1=$producto_1['nombre'];

                                    echo("
                                        <option value='$value_producto_1' style='text-align:center;'>$text_producto_1</option>
                                    ");

                                    //Nombre Producto 2
                                    $text_producto_2=str_replace("_"," ",$producto_2['nombre']);
                                        
                                    $value_producto_2=$producto_2['nombre'];

                                    echo("
                                        <option value='$value_producto_2' style='text-align:center;'>$text_producto_2</option>
                                    ");

                                    //Nombre Producto 3
                                    $text_producto_3=str_replace("_"," ",$producto_3['nombre']);
                                        
                                    $value_producto_3=$producto_3['nombre'];

                                    echo("
                                        <option value='$value_producto_3' style='text-align:center;'>$text_producto_3</option>
                                    ");

                                ?>
                                
                            </select>

                        </div>
                        
                        <div class='col-md-4'>

                            <label for='tipo_operacion[]' class='form-label'>Tipo de Operacion</label>

                            <select class='form-control' name='tipo_operacion[]' id='tipo_operacion[]'>

                                <option value='' style='text-align:center;'>Seleccione</option>
                        
                                <option value='compra' style='text-align:center;'>Compra</option>
                                
                                <option value='venta' style='text-align:center;'>Venta</option>
                                
                            </select>

                        </div>
                        
                        <div class='col-md-4'>

                            <label for='num_unidades[]' class='form-label'>Numero de Unidades</label>

                            <input type='number' class='form-control' name='num_unidades[]' id='num_unidades[]' min='1' placeholder='' max=''  style='text-align: center'>

                        </div>
                        
                    </div>

                    <!--Registro Producto 3-->
                    <div class='row' id='row_3'>
        
                        <div class='col-md-4'>

                            <label for='nombre_producto[]' class='form-label'>Nombre Producto</label>
                            
                            <select class='form-control' name='nombre_producto[]' id='nombre_producto[]'>

                                <option value='' style='text-align:center;'>Seleccione</option>

                                <?php
                                    //Nombre Producto 1

                                    $text_producto_1=str_replace("_"," ",$producto_1['nombre']);
                                        
                                    $value_producto_1=$producto_1['nombre'];

                                    echo("
                                        <option value='$value_producto_1' style='text-align:center;'>$text_producto_1</option>
                                    ");

                                    //Nombre Producto 2
                                    $text_producto_2=str_replace("_"," ",$producto_2['nombre']);
                                        
                                    $value_producto_2=$producto_2['nombre'];

                                    echo("
                                        <option value='$value_producto_2' style='text-align:center;'>$text_producto_2</option>
                                    ");

                                    //Nombre Producto 3
                                    $text_producto_3=str_replace("_"," ",$producto_3['nombre']);
                                        
                                    $value_producto_3=$producto_3['nombre'];

                                    echo("
                                        <option value='$value_producto_3' style='text-align:center;'>$text_producto_3</option>
                                    ");

                                ?>
                                
                            </select>

                        </div>
                        
                        <div class='col-md-4'>

                            <label for='tipo_operacion[]' class='form-label'>Tipo de Operacion</label>

                            <select class='form-control' name='tipo_operacion[]' id='tipo_operacion[]'>

                                <option value='' style='text-align:center;'>Seleccione</option>
                        
                                <option value='compra' style='text-align:center;'>Compra</option>
                                
                                <option value='venta' style='text-align:center;'>Venta</option>
                                
                            </select>

                        </div>
                        
                        <div class='col-md-4'>

                            <label for='num_unidades[]' class='form-label'>Numero de Unidades</label>

                            <input type='number' class='form-control' name='num_unidades[]' id='num_unidades[]' min='1' placeholder='' max=''  style='text-align: center'>

                        </div>
                        
                    </div>


                </div>

                    
                <div class='card-footer text-muted'>

                    <div class='row justify-content-center'>

                        <button type='submit' id='' class='btn btn-primary col-md-5'>Realizar Proceso</button>

                    </div>

                </div>
                
            </form>

        </div>

    </div>


<div class="container" class="button_home">
    <a name="" id="" class="btn btn-success col-md-12" style="margin: 10px 0px 10px 0px;" href="../store" role="button">Regresar al Instanciamiento</a>
</div>

<?php
    require("../../footer.php");
?>
