<?php
    $_SESSION['title_header']="Creacion Tienda";
    require("../../header.php");
?>

    <!--Contenedor Formulario-->
    <div class='container text-center'>    

        <!--Apertura Tarjeta-->
        <div class='card'>

            <!--Cabecera Tarjeta (Titulo)-->
            <div class='card-header'>
                <h4 class='card-title'>Generar Nueva instancia de Tienda</h4>
            </div>

            <!--Formulario De envio de Datos-->
            <form action='../../../controllers/activity/store/manager.php?function=activation' method='post'>

                <!--Cuerpo Formulario-->
                <div class='card-body' id='padre'>

                    <!--Informacion Global de la tienda-->
                    <div id='datos_tienda'>

                        <h4>Informacion de la Tienda</h4>

                        <div class="row">

                            <div class='col-md-6'>
                                <label for='nombre_tienda' class='form-label'>Nombre de la Tienda</label>
                                <input type='text' class='form-control' name='nombre_tienda' id='nombre_tienda' min='1' style='text-align: center'>
                            </div>

                            <div class='col-md-6'>
                                <label for='balance_inicial' class='form-label'>Balance Inicial de Caja</label>
                                <input type='number' class='form-control' name='balance_inicial' id='balance_inicial' min='1' style='text-align: center'>
                            </div>

                        </div>

                    </div>

                    <!--Informacion individual de cada producto-->
                    <div id='seccion_producto'>

                        <h4>Nuevo Producto</h4>

                        <div class="row">

                            <div class='col-md-6'>
                                <label for='producto[]' class='form-label'>Nombre Producto</label>
                                <input type='text' class='form-control' name='producto[]' id='producto[]' min='1' style='text-align: center'>
                            </div>
                        
                            <div class='col-md-3'>
                                <label for='valor_unitario[]' class='form-label'>Valor Unitario</label>
                                <input type='number' class='form-control' name='valor_unitario[]' id='valor_unitario[]' min='1' style='text-align: center'>
                            </div>
                        
                            <div class='col-md-3'>
                                <label for='cantidad[]' class='form-label'>Cantidad Almacenada</label>
                                <input type='number' class='form-control' name='cantidad[]' id='cantidad[]' min='1'  style='text-align: center'>
                            </div>

                        </div>

                        <div class='row'>
        
                            <div class='col-md-6'>
                                <label for='cantidad_minima[]' class='form-label'>Cantidad Minima</label>
                                <input type='number' class='form-control' name='cantidad_minima[]' id='cantidad_minima[]' min='1' style='text-align: center'>
                            </div>
                        
                            <div class='col-md-6'>
                                <label for='tipo_iva[]' class='form-label'>Tipo Iva</label>
                                <input type='text' class='form-control' name='tipo_iva[]' id='tipo_iva[]' min='1' style='text-align: center'>
                            </div>
            
                        </div>

                    </div>

                </div>

            
                <!--Pie de Pagina Tarjeta-->
                <div class='card-footer text-muted'>

                    <!--Botones de envio y duplicacion-->
                    <div class='row justify-content-center'>

                        <button  type='button' onclick="clonar_row('seccion_producto','padre')" id='add_button' class='btn btn-success col-md-5'>Añadir Producto</button>

                        <button type='submit' id='' class='btn btn-primary col-md-5'>Generar Tienda</button>
                    
                    </div>
            
                </div>

            </form>
            
        </div>        

    </div>

    <div class="container" class="button_home">
        <a name="" id="" class="btn btn-success col-md-12" style="margin: 10px 0px 10px 0px;" href="../../../" role="button">Regresar al menu principal
        </a>
    </div>

<?php
    require("../../footer.php");
?>