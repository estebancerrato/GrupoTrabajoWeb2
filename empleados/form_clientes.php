
<?php

    require("menu.html");
    require("funciones.php");
    $objetoTabla = new elementosPage();  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Registro de Clientes</title>

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
    <div class="border m-5" style="height:550px; justify-content-center" >
        <div>
                <h2 style="text-align:center;">Agregar Clientes</h2>
        </div>
        <?php
    if(isset($_POST['accion'],$_GET['id'])){
        if(($_POST['accion']==2)&&($_GET['id']!='')){
            $clienteID = $_GET['id'];
            $data=($objetoTabla->obtenerClientes($clienteID));  
            
            $cadena="id=.$clienteID.&accion=2&dir=addeditClientes&u=1";
            
            echo "
            <form name='formulario' id='formulario' method='POST' action='acciones.php?" . $cadena . "'> <br><br>
                        <input type='hidden' name='accion' id='accion' value=''>
        
                    
            <div class='row justify-content-center'>
                <div class='col-2'>
                <label  class='form-label'>Cedula</label>
                </div>
                <div class='col-8'>
                <input type='text' value='$data[cliente_cedula]' readonly name='cedul_client'  id='cedul_client' class='form-control' aria-label='default input example' required>
                </div>


            </div><br>

            <div class='row justify-content-center'>
                <div class='col-2'>
                <label  class='form-label'>Primer Nombre</label>
                </div>
                <div class='col-3'>
                <input class='form-control' value='$data[cliente_primer_nombre]'  name='prime_nombr' id='prime_nombr' type='text'  aria-label='default input example'>
                </div>             
            
                
                <div class='col-2'>
                <label  class='form-label'>Segundo Nombre</label>
                </div>
                <div class='col-3'>
                <input type='text' name='segun_nombr' value='$data[cliente_segundo_nombre]' id='segun_nombr' class='form-control' aria-label='default input example' required>
                </div>

            </div><br>

            <div class='row justify-content-center'>
                <div class='col-2'>
                <label  class='form-label'>Primer Apellido</label>
                </div>
                <div class='col-3'>
                <input class='form-control' value='$data[cliente_primer_apellido]'  name='prime_apell' id='prime_apell' type='text'  aria-label='default input example'>
                </div>               
            
                <div class='col-2'>
                <label  class='form-label'>Segundo Apellido</label>
                </div>
                <div class='col-3'>
                <input type='text' name='segun_apelli' value='$data[cliente_segundo_apellido]' id='segun_apelli' class='form-control' aria-label='default input example' required>
                </div>


            </div><br>

            <div class='row justify-content-center'>
                <div class='col-2'>
                <label  class='form-label'>Registro Tributario Nacional (RTN)</label>
                </div>
                <div class='col-3'>
                <input class='form-control'  value='$data[cliente_rtn]' name='rtn' id='rtn' type='text'  aria-label='default input example'>
                </div>



                <div class='col-2'>
                <label  class='form-label'>Telefono</label>
                </div>
                <div class='col-3'>
                <input type='text' name='telefon' value='$data[cliente_telefono]' id='telefon' class='form-control' aria-label='default input example' required>
                </div>

                
    
                
            </div><br>
            <div class='row justify-content-center'>
                <div class='col-2'>
                    <label  class='form-label'>Observaciones</label>
                </div>
                <div class='col-8'>
                    <textarea id='observaciones' name='observaciones' rows='6'  required class='form-control'>$data[cliente_observaciones]</textarea>
                </div>
            
            </div><br>

    
             <div class='row justify-content-center' style='padding-top:40px; margin:auto;'>
         
                <div class='col-4'>
                    <button class='btn btn-primary' onClick='return guardarClientes()'>GUARDAR</button>
                </div>
            </div>
            <div class='row'> 
                <div class='col-12'>
                    ";                   
                        echo $objetoTabla->CargarTablaClientes();
                    echo "     
                
                </div>               
            </div>
        
        </form>
        ";

        }
    }else{
        $cadena="id=x&accion=1&dir=addeditClientes&u=1";

        echo "
        <form name='formulario' id='formulario' method='POST' action='acciones.php?" . $cadena . "'> <br><br>
                        <input type='hidden' name='accion' id='accion' value=''>
        
                    
            <div class='row justify-content-center'>
                <div class='col-2'>
                <label  class='form-label'>Cedula</label>
                </div>
                <div class='col-8'>
                <input type='text' name='cedul_client'  id='cedul_client' class='form-control' aria-label='default input example' required>
                </div>


            </div><br>

            <div class='row justify-content-center'>
                <div class='col-2'>
                <label  class='form-label'>Primer Nombre</label>
                </div>
                <div class='col-3'>
                <input class='form-control'   name='prime_nombr' id='prime_nombr' type='text'  aria-label='default input example'>
                </div>             
            
                
                <div class='col-2'>
                <label  class='form-label'>Segundo Nombre</label>
                </div>
                <div class='col-3'>
                <input type='text' name='segun_nombr'  id='segun_nombr' class='form-control' aria-label='default input example' required>
                </div>

            </div><br>

            <div class='row justify-content-center'>
                <div class='col-2'>
                <label  class='form-label'>Primer Apellido</label>
                </div>
                <div class='col-3'>
                <input class='form-control'   name='prime_apell' id='prime_apell' type='text'  aria-label='default input example'>
                </div>               
            
                <div class='col-2'>
                <label  class='form-label'>Segundo Apellido</label>
                </div>
                <div class='col-3'>
                <input type='text' name='segun_apelli'  id='segun_apelli' class='form-control' aria-label='default input example' required>
                </div>


            </div><br>

            <div class='row justify-content-center'>
                <div class='col-2'>
                <label  class='form-label'>Registro Tributario Nacional (RTN)</label>
                </div>
                <div class='col-3'>
                <input class='form-control'   name='rtn' id='rtn' type='text'  aria-label='default input example'>
                </div>



                <div class='col-2'>
                <label  class='form-label'>Telefono</label>
                </div>
                <div class='col-3'>
                <input type='text' name='telefon'  id='telefon' class='form-control' aria-label='default input example' required>
                </div>

                
    
                
            </div><br>
            <div class='row justify-content-center'>
                <div class='col-2'>
                    <label  class='form-label'>Observaciones</label>
                </div>
                <div class='col-8'>
                    <textarea id='observaciones' name='observaciones' rows='6'  required class='form-control'></textarea>
                </div>
            
            </div><br>

    
             <div class='row justify-content-center' style='padding-top:40px; margin:auto;'>
         
                <div class='col-4'>
                    <button class='btn btn-primary' onClick='return guardarClientes()'>GUARDAR</button>
                </div>
            </div>
            <div class='row'> 
                <div class='col-12'>
                    ";                   
                        echo $objetoTabla->CargarTablaClientes();
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
        <script src="validar_clientes.js"></script>	


</body>
</html>