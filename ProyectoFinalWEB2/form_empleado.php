
<?php

    require("menu.html");



    require("funciones.php");
    $objetoTabla = new elementosPage();  

?>


<!doctype html>
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

<?php
    if(isset($_POST['accion'],$_GET['id'])){

        if(($_POST['accion']==2)&&($_GET['id']!='')){
            $empleadoID = $_GET['id'];
            $data=($objetoTabla->obtenerEmpleado($empleadoID));  
            
            $cadena="id=".$empleadoID."&accion=2&dir=addeditEmpleado&u=1";


        echo 
        "
        <form name='formulario' id='formulario' method='POST' action='acciones.php?" . $cadena . "'> <br><br>
        <div class='container'>
            <div>
                    <h2 style='text-align:center;'>Modificar Empleado</h2> <br>
            </div>
                <div class='row'>
  
                        <div class='col-2'>
                            <label  class='form-label'>Cedula</label>
                        </div>
                        <div class='col-4'>
                            <input name='cedula'  id='cedula' readonly value='$data[empleado_cedula]' class='form-control' type='text' placeholder='Ingresar cedula del empleado' aria-label='default input example'>
                        </div>
                  
                </div><br>


                <div class='row'>
    
                    <div class='col-2'>
                        <label  class='form-label' name='pnombre' id='pnombre' >Primer Nombre</label>
                    </div>
                    <div class='col-4'>
                        <input value='$data[empleado_primer_nombre]' name='txtnombre1' id='txtnombre1' class='form-control' type='text' placeholder='Ingrese Primer Nombre' aria-label='default input example'>  
                    </div>
                    <div class='col-2'>
                        <label  class='form-label'>Segundo Nombre</label>
                    </div>
                    <div class='col-4'>
                        <input value='$data[empleado_segundo_nombre]' name='txtnombre2' id='txtnombre2' class='form-control' type='text' placeholder='Ingrese Segundo Nombre' aria-label='default input example'>
                    </div>

                </div><br>


                <div class='row'>
                    <div class='col-2'>
                        <label  class='form-label'>Primer Apellido</label>
                    </div>
                    <div class='col-4'>
                        <input  value='$data[empleado_primer_apellido]' name='papellido' id='papellido' class='form-control' type='text' placeholder='Ingrese Primer Apellido' aria-label='default input example'>
                    </div>
                    <div class='col-2'>
                        <label  class='form-label' >Segundo Apellido</label>
                    </div>
                    <div class='col-4'>
                        <input value='$data[empleado_segundo_apellido]' class='form-control' name='sapellido' id='sapellido'type='text' placeholder='Ingrese Segundo Apellido' aria-label='default input example'>
                    </div>

                </div><br>

                
                <div class='row'>
                    <div class='col-2'>
                        <label  class='form-label'>Genero</label>
                    </div>
                    <div class='col-4'>
                        <select class='form-control' aria-label='Default select example' name='cmbGenero' id='cmbGenero'>
                            <option value='$data[empleado_genero]'>$data[empleado_genero]</option>
                            <option value='Masculino'>Masculino</option>
                            <option value='Femenino'>Femenino</option>
                        </select>
                    </div>
                    <div class='col-2'>
                        <label  class='form-label'>Telefono</label>
                    </div>
                    <div class='col-4'>
                        <input value='$data[empleado_telefono]' class='form-control' type='text' name='txttelefono' id='txttelefono' placeholder='Default input' aria-label='default input example'>
                    </div>                   
                </div> <br>


                <div class='row'>  
                    <div class='col-2'>
                        <label  class='form-label'>Correo Electronico</label>
                    </div>
                    <div class='col-4'>
                        <input value='$data[empleado_correo_electronico]'  type='email' name='txtcorreoelectronico' id='txtcorreoelectronico' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp'>
                    </div>

                    <div class='col-2'>
                        <label  class='form-label'>Cargo</label>
                    </div>
                    <div class='col-4'>
                        <select name='cmbcargo' id='cmbcargo'  class='form-control'>
                                <option value='0' disabled selected > Seleccionar</option>";
                                  echo $objetoTabla->ObtenerCargoCombobox();
                             echo "
                        </select>

                    </div>



                </div>
            <br>    
            <div class='row'>
        
                    <div class='col-2'>
                        <label  class='form-label'>Fecha de Ingreso</label>
                    </div>
                    <div class='col-4'>
                        <input value='$data[empleado_fecha_ingreso]' class='form-control' name='dfechaIngre' id='dfechaIngre' type='date' placeholder='Default input' aria-label='default input example'>
                    </div>

                        

            </div><br>

             
                <div class='row'>
                    <div class='col-2'>
                        <label for='exampleFormControlTextarea1' class='form-label'>Direcciòn</label>
                        
                    </div>
                    <div class='col-4'>
                        <textarea  name='direcc' id='direcc' class='form-control'  rows='3'>$data[empleado_direccion]</textarea> 
                    </div>                    


               
                    <div class='col-2'>
                        <label  class='form-label'>Observacion</label>
                    </div>
                    <div class='col-4'>
                        <textarea id='txtobser' name='txtobser' class='form-control'  rows='3'>$data[empleado_observacion]</textarea> 
                    </div>
                </div> <br>

                <div class='row justify-content-end'>
                    <div class='col-4'>
                         
                    </div>
                    <div class='col-4'>
                        <button class='btn btn-primary' onClick='return modificar()'>Modificar</button>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-12'>";                       
                             echo $objetoTabla->CargarTablaEmpleados();
                    echo "    
                    </div>               
                </div>
                                    
            </div>                          
        </form>
        ";
        }

    }else{

        $cadena="id=x&accion=1&dir=addeditEmpleado&u=1";
        echo 
        "
        <form name='formulario' id='formulario' method='POST'  action='acciones.php?" . $cadena . "'> <br><br>
        <div class='container'>
             
                <div>
                    <h2 style='text-align:center;'>Registro de Empleados</h2> <br>
                </div>
                <div class='row'>
  
                        <div class='col-2'>
                            <label  class='form-label'>Cedula</label>
                        </div>
                        <div class='col-4'>
                            <input name='cedula'  id='cedula' class='form-control' type='text' placeholder='Ingresar cedula del empleado' aria-label='default input example'>
                        </div>
                  
                </div><br>


                <div class='row'>
    
                    <div class='col-2'>
                        <label  class='form-label' name='pnombre' id='pnombre' >Primer Nombre</label>
                    </div>
                    <div class='col-4'>
                        <input name='txtnombre1' id='txtnombre1' class='form-control' type='text' placeholder='Ingrese Primer Nombre' aria-label='default input example'>  
                    </div>
                    <div class='col-2'>
                        <label  class='form-label'>Segundo Nombre</label>
                    </div>
                    <div class='col-4'>
                        <input name='txtnombre2' id='txtnombre2' class='form-control' type='text' placeholder='Ingrese Segundo Nombre' aria-label='default input example'>
                    </div>

                </div><br>


                <div class='row'>
                    <div class='col-2'>
                        <label  class='form-label'>Primer Apellido</label>
                    </div>
                    <div class='col-4'>
                        <input  name='papellido' id='papellido' class='form-control' type='text' placeholder='Ingrese Primer Apellido' aria-label='default input example'>
                    </div>
                    <div class='col-2'>
                        <label  class='form-label' >Segundo Apellido</label>
                    </div>
                    <div class='col-4'>
                        <input class='form-control' name='sapellido' id='sapellido'type='text' placeholder='Ingrese Segundo Apellido' aria-label='default input example'>
                    </div>

                </div><br>

                
                <div class='row'>
                    <div class='col-2'>
                        <label  class='form-label'>Genero</label>
                    </div>
                    <div class='col-4'>
                        <select class='form-control' aria-label='Default select example' name='cmbGenero' id='cmbGenero'>
                            <option value='0' disabled selected>Seleccionar</option>
                            <option value='Masculino'>Masculino</option>
                            <option value='Femenino'>Femenino</option>
                        </select>
                    </div>
                    <div class='col-2'>
                        <label  class='form-label'>Telefono</label>
                    </div>
                    <div class='col-4'>
                        <input class='form-control' type='text' name='txttelefono' id='txttelefono' placeholder='Default input' aria-label='default input example'>
                    </div>                   
                </div> <br>


                <div class='row'>  
                    <div class='col-2'>
                        <label  class='form-label'>Correo Electronico</label>
                    </div>
                    <div class='col-4'>
                        <input type='email' name='txtcorreoelectronico' id='txtcorreoelectronico' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp'>
                    </div>

                    <div class='col-2'>
                        <label  class='form-label'>Cargo</label>
                    </div>
                    <div class='col-4'>
                        <select name='cmbcargo' id='cmbcargo'  class='form-control'>
                                <option value='0' disabled selected > Seleccionar</option>";
                                  echo $objetoTabla->ObtenerCargoCombobox();
                             echo "
                        </select>

                    </div>



                </div>
            <br>    
            <div class='row'>
        
                    <div class='col-2'>
                        <label  class='form-label'>Fecha de Ingreso</label>
                    </div>
                    <div class='col-4'>
                        <input class='form-control' name='dfechaIngre' id='dfechaIngre' type='date' placeholder='Default input' aria-label='default input example'>
                    </div>

                        

            </div><br>

             
                <div class='row'>
                    <div class='col-2'>
                        <label for='exampleFormControlTextarea1' class='form-label'>Direcciòn</label>
                        
                    </div>
                    <div class='col-4'>
                        <textarea name='direcc' id='direcc' class='form-control'  rows='3'></textarea> 
                    </div>                    


               
                    <div class='col-2'>
                        <label  class='form-label'>Observacion</label>
                    </div>
                    <div class='col-4'>
                        <textarea id='txtobser' name='txtobser' class='form-control'  rows='3'></textarea> 
                    </div>
                </div> <br>

                <div class='row justify-content-end'>
                    <div class='col-4'>
                         
                    </div>
                    <div class='col-4'>
                        <button class='btn btn-primary' onClick='return guardar()'>GUARDAR</button>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-12'>";                       
                             echo $objetoTabla->CargarTablaEmpleados();
                    echo "    
                    </div>               
                </div>
                                    
            </div>                          
        </form>
        ";
    }
?>


 
        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha256-t9UJPrESBeG2ojKTIcFLPGF7nHi2vEc7f5A2KpH/UBU=" crossorigin="anonymous"></script>

        <!-- DataTable JS -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

        <!-- validar datos -->
        <script src="validar_empleado.js"></script>	


  </body>
</html>