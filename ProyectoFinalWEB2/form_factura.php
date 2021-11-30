
<?php

    require("menu.html");
    require("funciones.php");
    $objetoTabla = new elementosPage();  
    

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Registro de Empleado</title>

    <!-- Libreria para iconos -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- DataTable CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

    <link rel="stylesheet" href="style.css">


    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
        
  
  </head>

<body>
    
<div class="container">
    <div class="border m-5 p-4" style="height:550px; justify-content-center" >
        <div>
                <h3 style="text-align:center;">Facturaciòn de Boletos</h3>
        </div>
        <?php
            if(isset($_POST['accion'],$_GET['id'])){
                if(($_POST['accion']==2)&&($_GET['id']!='')){
                    $cargoID = $_GET['id'];
                    $data=($objetoTabla->obtenerCargos($cargoID));  
                    
                    $cadena="id=x&accion=2&dir=addeditFactura&u=1";


                }
            }else{

                $cadena="id=x&accion=1&dir=addeditFactura&u=1";

            echo "
            <form name='formulario' id='formulario' method='POST' action='acciones.php?" . $cadena . "'> <br><br>
                        
                        <div class='row '>
                        <div class='col-2 '>
                        <label  class='form-label '>Numero de Factura</label>
                            </div>
                        <div class='col-4'>
                            <input class='form-control'   name='numer_factura' id='numer_factura' type='text'  aria-label='default input example'>
                        </div>

                        <div class='col-2'>
                            <label  class='form-label'>Fecha Factura</label>
                        </div>
                        <div class='col-4'>
                            <input class='form-control'   name='fecha_factura' id='fecha_factura' type='date'  aria-label='default input example'>
                        </div>
                    </div><br>

                    <div class='row '>
                            <div class='col-2'>
                                <label  class='form-label'>Cliente</label>
                            </div>
                            <div class='col-4'>
                            <select name='cbmcliente' id='cbmcliente'  class='form-control'>
                                <option value='0' disabled selected > Seleccionar</option>
                                ";
                                echo  $objetoTabla-> obtenerClientesCombobox();
                            echo "
                            </select>
                        </div>

                        <div class='col-2'>
                        <label  class='form-label'>Empleado (cajero)</label>
                        </div>
                        <div class='col-4'>
                        <select name='cbmempleado' id='cbmempleado'  class='form-control'>
                                <option value='0' disabled selected > Seleccionar</option>
                                ";
                                    echo  $objetoTabla-> obtenerCajeroCombobox();
                                    echo "
                    </select>
                    </div>
                    </div><br>
                    <div class='row '>
                        <div class='col-2'>
                            <label  class='form-label'>Ruta</label>
                        </div>         
                        <div class='col-4'>         
                            <select name='cmbRuta' id='cmbRuta'  class='form-control'> 
                                <option value='0' disabled selected > Seleccionar ruta</option>
                                ";
                                    echo  $objetoTabla-> obtenerRutasCombobox();
                                    echo "
                            </select>
                        </div>
                        <div class='col-2'>
                            <label  class='form-label'>Cantidad de Boleto</label>
                        </div>
                        <div class='col-4'>
                            <input class='form-control'   name='txtCantidad' id='txtCantidad' type='number'  aria-label='default input example'>
                        </div>

                    </div><br><br>
                    <div class='row '>
                        <h4 align='center'>TABLA DE PRECIOS</h4>
                        <div class='col-12'>
                        ";                
                                echo $objetoTabla->CargarTablaRuta();
                                echo " 
                        
                        </div> 
                    </div>



                <div class='row justify-content-center' style='padding-top:40px; margin:auto;'>
                
                <div class='col-5'>
                    <button class='btn btn-primary' onClick='return guardar()'>GUARDAR</button> <br><br>
                </div>
                
                <div class='row'>
                
                <h4 align='center'>LISTADO DE FACTURA DE BOLETERIA</h4>
                <div class='col-12'>
                ";                
                        echo $objetoTabla->CargarTablaFacturaBoleto();
                        echo " 
                
                </div> 
            </div>
            </div>
            </form>
            
            ";

            }
        ?>
    </div>
</div>

    <!-- ajax -->
    <script scr="jquery-3.6.0.min.js"></script>
    <script scr="ajax_factura.js"></script>
    <script type="text/javascript" src="ajax_factura.js"></script>                     

</body>
</html>