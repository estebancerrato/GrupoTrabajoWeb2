
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

    <title>Registro de Ciudades</title>

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
    <div class="border m-5" style="height:400px; justify-content-center" >
     <div>
         <h2 style="text-align:center;">Añadir Ciudad</h2>
     </div>
    
<?php
    if(isset($_POST['accion'],$_GET['id'])){
        if(($_POST['accion']==2)&&($_GET['id']!='')){
            $ciudadId= $_GET['id'];
            $data=($objetoTabla->obtenerCiudades($ciudadId));  
            
            $cadena="id=.$ciudadId.&accion=2&dir=addeditCiudades&u=1";

            echo"
            <form name='formulario' id='formulario' method='POST' action='acciones.php?" . $cadena . "'>
                 <br><br>
            
     
                <div class='row justify-content-center'>
    
                    <div class='col-2'>
                    <label  class='col-form-label'>Ciudad Nombre</label>
                    </div>
                    <div class='col-3'>
                    <input type='text' value='$data[ciudad_nombre]' name='txtnombreCiudad' id='txtnombreCiudad' class='form-control' required>
                    </div>
    
                </div><br>
               
                <div class='row justify-content-center' style='padding-top:40px'>
                        
                        <div class='col-4'>
                            <button class='btn btn-primary' onClick='return guardar()'>GUARDAR</button>
                        </div>
                </div>
                <br><br>
                <div class='row'> 
                    <div class='col-12'>
                        ";                   
                            echo $objetoTabla->CargarTablaCiudades();
                        echo "     
                    
                    </div>               
                </div>
            </form>
            ";

        }
    }else{
        $cadena="id=x&accion=1&dir=addeditCiudades&u=1";

        echo"
        <form name='formulario' id='formulario' method='POST' action='acciones.php?" . $cadena . "'>
             <br><br>
            <input type='hidden' name='accion' id='accion' value=''>
        
 
            <div class='row justify-content-center'>

                <div class='col-2'>
                <label  class='col-form-label'>Ciudad Nombre</label>
                </div>
                <div class='col-3'>
                <input type='text' name='txtnombreCiudad' id='txtnombreCiudad' class='form-control' required>
                </div>

            </div><br>
           
            <div class='row justify-content-center' style='padding-top:40px'>
                    
                    <div class='col-4'>
                        <button class='btn btn-primary' onClick='return guardar()'>GUARDAR</button>
                    </div>
            </div>
            <br><br>
            <div class='row'> 
                <div class='col-12'>
                    ";                   
                        echo $objetoTabla->CargarTablaCiudades();
                    echo "     
                
                </div>               
            </div>
        </form>
        ";


    }
?>



    
    </div>
</div>

     <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha256-t9UJPrESBeG2ojKTIcFLPGF7nHi2vEc7f5A2KpH/UBU=" crossorigin="anonymous"></script>

        <!-- DataTable JS -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

        <!-- validar datos -->
        <script src="validar_ciudad.js"></script>	

      	
</body>
</html>