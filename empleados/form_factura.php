
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
            <form name='formulario' id='formulario' method="POST" action='clientes.php'> <br><br>
                        <input type="hidden" name="accion" id="accion" value="">
        
                    
            <div class="row ">
                <div class="col-2 ">
                <label  class="form-label ">Numero de Factura</label>
                    </div>
                <div class="col-4">
                    <input class="form-control"   name="numer_factura" id="numer_factura" type="text"  aria-label="default input example">
                </div>

                <div class="col-2">
                    <label  class="form-label">Fecha Factura</label>
                </div>
                <div class="col-4">
                    <input class="form-control"   name="numer_factura" id="numer_factura" type="date"  aria-label="default input example">
                </div>
            </div><br>

            <div class="row ">
                    <div class="col-2">
                        <label  class="form-label">Cliente</label>
                    </div>
                    <div class="col-4">
                    <select name="cbmcliente" id="cbmcliente"  class="form-control">
                          <option value="0" disabled selected > Seleccionar</option>
                        <?php
                          include("conexion.php");
                          $sql = "select 
                          cliente_cedula,
                          concat(cliente_primer_nombre, ' ',cliente_segundo_nombre,' ',cliente_primer_apellido, ' ',cliente_segundo_apellido) as nombres
                          from tbl_clientes ";
                          $query = mysqli_query($con, $sql)
                          or die('error: '.mysqli_error($con));  
                          while($columna = mysqli_fetch_assoc($query)){
                          echo "
                          <option value='".$columna["cliente_cedula"]."'>".$columna["nombres"]."</option>
                              ";
                          }
                      ?>
                     </select>
                </div>

                <div class="col-2">
                <label  class="form-label">Seleccionar Empleado (cajero)</label>
                </div>
                <div class="col-4">
                <select name="cbmempleado" id="cbmempleado"  class="form-control">
                          <option value="0" disabled selected > Seleccionar</option>
                    <?php
                          include("conexion.php");
                          $sql = "select 
                          empleado_cedula,
                          concat(empleado_primer_nombre, ' ',empleado_segundo_nombre,' ',empleado_primer_apellido, ' ',empleado_segundo_apellido) as nombres
                          from tbl_empleados e 
                          INNER JOIN tbl_cargo c on e.cargo_codigo = c.cargo_codigo
                          WHERE UPPER(c.cargo_nombre)  = UPPER('CAJERO') ";
                          $query = mysqli_query($con, $sql)
                          or die('error: '.mysqli_error($con));  
                          while($columna = mysqli_fetch_assoc($query)){
                              echo "
                              <option value='".$columna["empleado_cedula"]."'>".$columna["nombres"]."</option>
                              ";
                          }
                      ?>
             </select>
            </div>
            </div><br>
            <div class="row ">
                 <div class="col-2">
                    <label  class="form-label">Ruta</label>
                </div>         
                <div class="col-4">         
                    <select name="cmbRuta" id="cmbRuta"  class="form-control"> 
                        <option value="0" disabled selected > Seleccionar ruta</option>
                        <?php
                            echo  $objetoTabla-> obtenerRutasCombobox();
                        ?>
                    </select>
                </div>
                <div class="col-2">
                    <label  class="form-label">Cantidad de Boleto</label>
                </div>
                <div class="col-4">
                    <input class="form-control"   name="txtCantidad" id="txtCantidad" type="number"  aria-label="default input example">
                </div>

            </div><br><br>
            <div class="row ">
                <h4 align="center">TABLA DE PRECIOS</h4>
                <div class='col-12'>
                    <?php                  
                        echo $objetoTabla->CargarTablaRuta();
                    ?>  
                
                </div> 
            </div>


        <div class="row justify-content-center" style="padding-top:40px; margin:auto;">
         
          <div class="col-4">
              <button class="btn btn-primary" type="button"  onClick="return eliminar()">CANCELAR</button>
              <button class="btn btn-primary" onClick="return guardarClientes()">GUARDAR</button>
          </div>
       </div>
    </form>
    </div>
</div>

    <!-- ajax -->
    <script scr="jquery-3.6.0.min.js"></script>
    <script scr="ajax_factura.js"></script>
    <script type="text/javascript" src="ajax_factura.js"></script>                     

</body>
</html>