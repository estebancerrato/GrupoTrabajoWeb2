<?php
    
    if(isset($_GET['accion'],$_GET['dir'],$_GET['id'],$_GET['u'])){
        if(($_GET['accion']!="")or($_GET['dir']!="")or($_GET['id']!="")or($_GET['u']!="")){
            if($_GET['u']==1){              
                if(($_GET['accion']==1)&&($_GET['dir']=='addeditEmpleado')){
                    guardarEmpleado();
                }elseif(($_GET['accion']==2)&&($_GET['dir']=='addeditEmpleado')){  
                    editarEmpleado();
                }elseif(($_GET['accion']==3)&&($_GET['dir']=='addeditEmpleado')){
                   eliminarEmpleado();
                }
                
                //CARGOS
                elseif(($_GET['accion']==1)&&($_GET['dir']=='addeditCargos')){
                    guardarCargo();
                }elseif(($_GET['accion']==2)&&($_GET['dir']=='addeditCargos')){  
                    editarCargo();
                }elseif(($_GET['accion']==3)&&($_GET['dir']=='addeditCargos')){
                    eliminarCargo();
                } 

                //CIUDADES
                elseif(($_GET['accion']==1)&&($_GET['dir']=='addeditCiudades')){
                    guardarCiudades();
                }elseif(($_GET['accion']==2)&&($_GET['dir']=='addeditCiudades')){  
                    editarCiudad();
                }elseif(($_GET['accion']==3)&&($_GET['dir']=='addeditCiudades')){
                    eliminarCiudad();
                } 

                //RUTAS
                elseif(($_GET['accion']==1)&&($_GET['dir']=='addeditRutas')){
                    guardarRutas();
                }elseif(($_GET['accion']==2)&&($_GET['dir']=='addeditRutas')){  
                    editarRutas();
                }elseif(($_GET['accion']==3)&&($_GET['dir']=='addeditRutas')){
                    eliminarRutas();
                } 


                 //CLIENTES
                 elseif(($_GET['accion']==1)&&($_GET['dir']=='addeditClientes')){
                    guardarClientes();
                }elseif(($_GET['accion']==2)&&($_GET['dir']=='addeditClientes')){  
                    editarCliente();
                }elseif(($_GET['accion']==3)&&($_GET['dir']=='addeditClientes')){
                    eliminarCliente();
                } 
                
                    //USUARIOS
                elseif(($_GET['accion']==1)&&($_GET['dir']=='addeditUsuario')){
                    guardarUsuario();
                }elseif(($_GET['accion']==2)&&($_GET['dir']=='addeditUsuario')){  
                    editarUsuario();
                }elseif(($_GET['accion']==3)&&($_GET['dir']=='addeditUsuario')){
                    eliminarUsuario();
                } 

                //BUSSES
                elseif(($_GET['accion']==1)&&($_GET['dir']=='addeditBuses')){
                    guardarBuses();
                }elseif(($_GET['accion']==2)&&($_GET['dir']=='addeditBuses')){  
                    editarBus();
                }elseif(($_GET['accion']==3)&&($_GET['dir']=='addeditBuses')){
                    eliminarBus();
                } 

                //ESTACIONES
                elseif(($_GET['accion']==1)&&($_GET['dir']=='addeditEstaciones')){
                    guardarEstacion();
                }elseif(($_GET['accion']==2)&&($_GET['dir']=='addeditEstaciones')){  
                    editarEstacion();
                }elseif(($_GET['accion']==3)&&($_GET['dir']=='addeditEstaciones')){
                    eliminarEstacion();
                } 
                 
                //HORARIO RUTAS
                elseif(($_GET['accion']==1)&&($_GET['dir']=='addeditHorarioRutas')){
                    guardarHorarioRutas();
                }elseif(($_GET['accion']==2)&&($_GET['dir']=='addeditHorarioRutas')){  
                    editarHorarioRutas();
                }elseif(($_GET['accion']==3)&&($_GET['dir']=='addeditHorarioRutas')){
                    eliminarHorarioRutas();
                } 

                //PAQUETES
                elseif(($_GET['accion']==1)&&($_GET['dir']=='addediTipoPaquete')){
                    guardarTipoPaquete();
                }elseif(($_GET['accion']==2)&&($_GET['dir']=='addediTipoPaquete')){  
                    editarTipoPaquete();
                }elseif(($_GET['accion']==3)&&($_GET['dir']=='addediTipoPaquete')){
                    eliminarTipoPaquete();
                } 
                //Guardar Factura Boleto
                elseif(($_GET['accion']==1)&&($_GET['dir']=='addeditFactura')){
                    guardarFacturaBoleto();
                }
                                   
                
            }
        }
    }

    function guardarEmpleado(){
        include("conexion.php");
        $sql = "SELECT *  FROM tbl_empleados WHERE empleado_cedula = '".$_POST["cedula"]."';";
        $validar_registro = mysqli_query($con, $sql);

        if(mysqli_num_rows($validar_registro) <=0){
            $sql= "insert into tbl_empleados  VALUES(   
                    '".$_POST["cedula"]."',  
                    '".$_POST["txtnombre1"]."',    
                    '".$_POST["txtnombre2"]."',  
                    '".$_POST["papellido"]."',  
                    '".$_POST["sapellido"]."',  
                    '".$_POST["direcc"]."',
                    '".$_POST["cmbGenero"]."',
                    '".$_POST["txttelefono"]."',
                    '".$_POST["txtcorreoelectronico"]."',
                    '".$_POST["cmbcargo"]."',
                    '".$_POST["dfechaIngre"]."',
                    '".$_POST["txtobser"]."')";
            
        
            $result=mysqli_query($con,$sql);
            if($result)
            {
                echo "<script>alert('Datos guardados exitosamente.');</script>";
                $dir = "form_empleado.php"; //cargar de nuevo el formulario 
                header ('Location: ' . $dir);      

            }else
            {
                echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
                $dir = "form_empleado.php"; 
                header ('Location: ' . $dir);  

            }

        }
        else{
            echo "<script>alert('El Empleado que intenta ingresar ya existe');</script>";
            $dir = "form_empleado.php"; 
            header ('Location: ' . $dir);  
        }   

    }


    function editarEmpleado(){

        include("conexion.php");
  
            $sql= "
            UPDATE `tbl_empleados`
            SET
            `empleado_primer_nombre` = '".$_POST["txtnombre1"]."',
            `empleado_segundo_nombre` =  '".$_POST["txtnombre2"]."', 
            `empleado_primer_apellido` = '".$_POST["papellido"]."', 
            `empleado_segundo_apellido` = '".$_POST["sapellido"]."', 
            `empleado_direccion` = '".$_POST["direcc"]."',
            `empleado_genero` = '".$_POST["cmbGenero"]."',
            `empleado_telefono` = '".$_POST["txttelefono"]."',
            `empleado_correo_electronico` = '".$_POST["txtcorreoelectronico"]."',
            `cargo_codigo` = '".$_POST["cmbcargo"]."',
            `empleado_fecha_ingreso` = '".$_POST["dfechaIngre"]."',
            `empleado_observacion` = '".$_POST["txtobser"]."' 
            WHERE `empleado_cedula` = '".$_POST["cedula"]."' ";      
        
            $result=mysqli_query($con,$sql);
            if($result)
            {
                //echo "<script>alert('Datos actualizados exitosamente.');</script>";
                $dir = "form_empleado.php"; //cargar de nuevo el formulario 
                header ('Location: ' . $dir);      

            }else
            {
                echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
                $dir = "form_empleado.php"; 
                header ('Location: ' . $dir);  

            }

    }

    function eliminarEmpleado(){
        include("conexion.php");

        $id = $_GET["id"];
        echo "<script> alert('Entro a Editar')</script>";
            $sql= "DELETE FROM tbl_empleados WHERE empleado_cedula = '$id' ";      
        
            $result=mysqli_query($con,$sql);
            if($result)
            {
                echo "<script>alert('Datos Eliminados exitosamente.');</script>";
                $dir = "form_empleado.php"; //cargar de nuevo el formulario 
                header ('Location: ' . $dir);      

            }else
            {
                echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
                $dir = "form_empleado.php"; 
                header ('Location: ' . $dir);  

            }
    }


//----------------------------------------------------------------------------------------------

    function guardarUsuario(){
        include("conexion.php");
        $sql = "SELECT *  FROM tbl_usuarios WHERE empleado_cedula = '".$_POST["usuario_nombre"]."';";
        $validar_registro = mysqli_query($con, $sql);

        if(mysqli_num_rows($validar_registro) <=0){
            $sql= "INSERT INTO `u391525088_transportweb`.`tbl_usuarios`
            (`usuario_nombre`,
            `usuario_clave`,
            `usuario_estado`,
            `empleado_cedula`,
            `usuario_clave_temporal_activa`
            )
            VALUES
            ('".$_POST["txtusuario"]."', 
            '".$_POST["txtclave"]."', 
            '".$_POST["cmbEstado"]."', 
            '".$_POST["cmbempleado"]."',
            'SI' 
            );";
            
        
            $result=mysqli_query($con,$sql);
            if($result)
            {
                echo "<script>alert('Datos guardados exitosamente.');</script>";
                $dir = "form_usuario.php"; //cargar de nuevo el formulario de form_usuario
                header ('Location: ' . $dir);      

            }else
            {
                echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
                $dir = "form_usuario.php"; 
                header ('Location: ' . $dir);  

            }

        }
        else{
            echo "<script>alert('El Usuario que intenta ingresar ya existe');</script>";
            $dir = "form_usuario.php"; 
            header ('Location: ' . $dir);  
        }   

    }

    function editarUsuario(){
        $id = $_GET["id"];
        include("conexion.php");
        
        $sql= "
        UPDATE `u391525088_transportweb`.`tbl_usuarios`
        SET
        `usuario_clave` = '".$_POST["txtclave"]."',
        `usuario_estado` = '".$_POST["cmbEstado"]."',
        `usuario_clave_temporal_activa` = 'SI'
        WHERE `usuario_nombre` = $id ;
        
        ";

        $result=mysqli_query($con,$sql);
        if($result)
        {
            //echo "<script>alert('Datos actualizados exitosamente.');</script>";
            $dir = "form_usuario.php"; //cargar de nuevo el formulario 
            header ('Location: ' . $dir);

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_usuario.php";
            header ('Location: ' . $dir);
        }
    }

    function eliminarUsuario(){
        include("conexion.php");
    
        $id = $_GET["id"];
       
            $sql= "DELETE FROM tbl_usuarios WHERE usuario_nombre = '$id' ";      
        
            $result=mysqli_query($con,$sql);
            if($result)
            {
                echo "<script>alert('Datos Eliminados exitosamente.');</script>";
                $dir = "form_usuario.php"; //cargar de nuevo el formulario 
                header ('Location: ' . $dir);      
    
            }else
            {
                echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
                $dir = "form_usuario.php"; 
                header ('Location: ' . $dir);  
    
            }
    }



/* CARGOS */

function guardarCargo(){
    include("conexion.php");
    $sql = "SELECT *  FROM tbl_cargo WHERE cargo_nombre = '".$_POST["txtcargo"]."';";

    $validar_registro = mysqli_query($con, $sql);

    if(mysqli_num_rows($validar_registro) <=0){
        $sql= "INSERT INTO `u391525088_transportweb`.`tbl_cargo`
                (`cargo_nombre`,
                `cargo_descripcion`) 
                 VALUES(   
                '".$_POST["txtcargo"]."',  
                '".$_POST["txtDescripcion"]."')";
        
    
   
        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('Datos guardados exitosamente.');</script>";
            $dir = "form_cargos.php"; //cargar de nuevo el formulario de form_usuario
            header ('Location: ' . $dir);      

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_cargos.php"; 
            header ('Location: ' . $dir);  

        }

    }
    else{
        echo "<script>alert('El cargo que intenta ingresar ya existe');</script>";
        $dir = "form_cargos.php"; 
        header ('Location: ' . $dir);  
    }   

}


function editarCargo(){
    $id = $_GET["id"];
    include("conexion.php");

        $sql= "
        UPDATE `tbl_cargo`
        SET
        `cargo_nombre` = '".$_POST["txtcargo"]."',
        `cargo_descripcion` = '".$_POST["txtDescripcion"]."'
        WHERE `cargo_codigo` = $id ";

        $result=mysqli_query($con,$sql);
        if($result)
        {
            //echo "<script>alert('Datos actualizados exitosamente.');</script>";
            $dir = "form_cargos.php"; //cargar de nuevo el formulario 
            header ('Location: ' . $dir);

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_cargos.php";
            header ('Location: ' . $dir);
        }
}


function eliminarCargo(){
    include("conexion.php");

    $id = $_GET["id"];
   
        $sql= "DELETE FROM tbl_cargo WHERE cargo_codigo = '$id' ";      
    
        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('Datos Eliminados exitosamente.');</script>";
            $dir = "form_cargos.php"; //cargar de nuevo el formulario 
            header ('Location: ' . $dir);      

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_cargos.php"; 
            header ('Location: ' . $dir);  

        }
}


//Ciudades
function guardarCiudades(){
    include("conexion.php");
    $sql = "SELECT *  FROM tbl_ciudades WHERE ciudad_nombre = '".$_POST["txtnombreCiudad"]."';";

    $validar_registro = mysqli_query($con, $sql);

    if(mysqli_num_rows($validar_registro) <=0){
        $sql= "INSERT INTO tbl_ciudades
                (`ciudad_nombre`) 
                 VALUES(   
                '".$_POST["txtnombreCiudad"]."'  
                )";
        
    
   
        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('Datos guardados exitosamente.');</script>";
            $dir = "form_ciudades.php"; //cargar de nuevo el formulario de form_usuario
            header ('Location: ' . $dir);      

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_ciudades.php"; 
            header ('Location: ' . $dir);  

        }

    }
    else{
        echo "<script>alert('La ciudad que intenta ingresar ya existe');</script>";
        $dir = "form_cargos.php"; 
        header ('Location: ' . $dir);  
    }   

}

function editarCiudad(){
        $id = $_GET["id"];
        include("conexion.php");

        $sql= "
        UPDATE tbl_ciudades
        SET
        ciudad_nombre = '".$_POST["txtnombreCiudad"]."',
        WHERE ciudad_codigo = $id ";

        $result=mysqli_query($con,$sql);
        if($result)
        {
            //echo "<script>alert('Datos actualizados exitosamente.');</script>";
            $dir = "form_ciudades.php"; //cargar de nuevo el formulario 
            header ('Location: ' . $dir);

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_ciudades.php";
            header ('Location: ' . $dir);
        }
}


function eliminarCiudad(){
    include("conexion.php");

    $id = $_GET["id"];
   
        $sql= "DELETE FROM tbl_ciudades WHERE ciudad_codigo = $id ";      
    
        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('Datos Eliminados exitosamente.');</script>";
            $dir = "form_ciudades.php"; //cargar de nuevo el formulario 
            header ('Location: ' . $dir);      

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_ciudades.php"; 
            header ('Location: ' . $dir);  

        }
}




/*-------------------RUTAS--------------*/
function guardarRutas(){
    include("conexion.php");
    $sql = "SELECT *  FROM tbl_rutas WHERE ruta_nombre = '".$_POST["nom_ruta"]."';";

    $validar_registro = mysqli_query($con, $sql);

    if(mysqli_num_rows($validar_registro) <=0){
        $sql= "INSERT INTO `u391525088_transportweb`.`tbl_rutas`
        (`ruta_nombre`,
        `estacion_origen`,
        `estacion_destino`,
        `ruta_precio`,
        `ruta_kilometro`,
        `ruta_observacion`)
        VALUES
            (
                '".$_POST["nom_ruta"]."',
                '".$_POST["cmborigen"]."',
                '".$_POST["cmbdestino"]."',
                '".$_POST["precio_ruta"]."',
                '".$_POST["km_ruta"]."',
                '".$_POST["observaciones"]."'  
            )";



        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('Datos guardados exitosamente.');</script>";
            $dir = "form_rutas.php"; //cargar de nuevo el formulario de form_usuario
            header ('Location: ' . $dir);

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_rutas.php";
            header ('Location: ' . $dir);

        }

    }
    else{
        echo "<script>alert('El Ruta que intenta ingresar ya existe');</script>";
        $dir = "form_rutas.php";
        header ('Location: ' . $dir);
    }

}


function editarRutas(){
        $id = $_GET["id"];
        include("conexion.php");
        $sql= "
        UPDATE `tbl_rutas`
        SET
        `ruta_nombre` = '".$_POST["nom_ruta"]."',
        `estacion_origen` = '".$_POST["cmborigen"]."',
        `estacion_destino` = '".$_POST["cmbdestino"]."',
        `ruta_precio` = '".$_POST["precio_ruta"]."',
        `ruta_kilometro` = '".$_POST["km_ruta"]."',
        `ruta_observacion` = '".$_POST["observaciones"]."'
        WHERE `ruta_codigo` = '$id' ";

        $result=mysqli_query($con,$sql);
        if($result)
        {
            //echo "<script>alert('Datos actualizados exitosamente.');</script>";
            $dir = "form_rutas.php"; //cargar de nuevo el formulario 
            header ('Location: ' . $dir);

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_rutas.php";
            header ('Location: ' . $dir);
        }
}


function eliminarRutas(){
    
    include("conexion.php");

    $id = $_GET["id"];
   
        $sql= "DELETE FROM tbl_rutas WHERE ruta_codigo = $id ";      
    
        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('Datos Eliminados exitosamente.');</script>";
            $dir = "form_rutas.php"; //cargar de nuevo el formulario 
            header ('Location: ' . $dir);      

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_rutas.php"; 
            header ('Location: ' . $dir);  

        }

}


/*-------------------EDITAR CLIENTES--------------*/
function guardarClientes()
{

    include("conexion.php");
    $sql = "SELECT *  FROM tbl_clientes WHERE cliente_cedula = '".$_POST["cedul_client"]."';";
    $validar_registro = mysqli_query($con, $sql);

    if(mysqli_num_rows($validar_registro) <=0){
        $sql= "INSERT INTO `u391525088_transportweb`.`tbl_clientes`
        ( `cliente_cedula`,
        `cliente_primer_nombre`,
        `cliente_segundo_nombre`,
        `cliente_primer_apellido`,
        `cliente_segundo_apellido`,
        `cliente_rtn`,
        `cliente_telefono`,
        `cliente_observaciones`)
        VALUES
        ('".$_POST["cedul_client"]."',
        '".$_POST["prime_nombr"]."',
        '".$_POST["segun_nombr"]."',
        '".$_POST["prime_apell"]."',
        '".$_POST["segun_apelli"]."',
        '".$_POST["rtn"]."',
        '".$_POST["telefon"]."',
        '".$_POST["observaciones"]."'
        );";


        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('Datos guardados exitosamente.');</script>";
            $dir = "form_clientes.php"; //cargar de nuevo el formulario de form_usuario
            header ('Location: ' . $dir);

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_clientes.php";
            header ('Location: ' . $dir);

        }

    }
    else{
        echo "<script>alert('El cliente que intenta ingresar ya existe');</script>";
        $dir = "form_clientes.php";
        header ('Location: ' . $dir);
    }
    
}

function editarCliente(){

    include("conexion.php");

        $sql= "
        UPDATE `tbl_clientes`
        SET 
        `cliente_primer_nombre` = '".$_POST["prime_nombr"]."',
        `cliente_segundo_nombre` = '".$_POST["segun_nombr"]."',
        `cliente_primer_apellido` = '".$_POST["prime_apell"]."',
        `cliente_segundo_apellido` = '".$_POST["segun_apelli"]."',
        `cliente_rtn` = '".$_POST["rtn"]."',
        `cliente_telefono` = '".$_POST["telefon"]."',
        `cliente_observaciones` = '".$_POST["observaciones"]."'
        WHERE `cliente_cedula` = '".$_POST["cedul_client"]."'";

        $result=mysqli_query($con,$sql);
        if($result)
        {
            //echo "<script>alert('Datos actualizados exitosamente.');</script>";
            $dir = "form_clientes.php"; //cargar de nuevo el formulario 
            header ('Location: ' . $dir);

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_clientes.php";
            header ('Location: ' . $dir);
        }
}

function eliminarCliente(){
    $id = $_GET["id"];
        include("conexion.php");

        
   
        $sql= "DELETE   FROM tbl_clientes WHERE cliente_cedula = '$id' ";      
    
        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('Datos Eliminados exitosamente.');</script>";
            $dir = "form_clientes.php"; //cargar de nuevo el formulario 
            header ('Location: ' . $dir);      

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_clientes.php"; 
            header ('Location: ' . $dir);  

        }

}
    
/*-----------------------------------------------------------GUARDAR  BUSES------------------------------------------------*/
function guardarBuses(){
    include("conexion.php");
    $sql = "SELECT *  FROM tbl_buses WHERE bus_codigo = '".$_POST["cod_buses"]."';";

    $validar_registro = mysqli_query($con, $sql);

    if(mysqli_num_rows($validar_registro) <=0){
        $sql= "INSERT INTO `u391525088_transportweb`.`tbl_buses`
        (`bus_codigo`,
        `bus_marca`,
        `bus_modelo`,
        `bus_placa`,
        `ruta_codigo`,
        `empleado_cedula`)
        VALUES
            (
                '".$_POST["cod_buses"]."',
                '".$_POST["sMarca"]."',
                '".$_POST["sModelo"]."',
                '".$_POST["sPlaca"]."',
                '".$_POST["cmbrutas"]."',
                '".$_POST["cmbempleados"]."'  
            )";



        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('Datos guardados exitosamente.');</script>";
            $dir = "form_buses.php"; //cargar de nuevo el formulario de form_usuario
            header ('Location: ' . $dir);

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_buses.php";
            header ('Location: ' . $dir);

        }

    }
    else{
        echo "<script>alert('El Transporte que intenta ingresar ya existe');</script>";
        $dir = "form_buses.php";
        header ('Location: ' . $dir);
    }

}



function editarBus(){

    include("conexion.php");

        $sql= "
        UPDATE `tbl_buses`
        SET
        `bus_marca` = '".$_POST["sMarca"]."',
        `bus_modelo` = '".$_POST["sModelo"]."',
        `bus_placa` = '".$_POST["sPlaca"]."',
        `ruta_codigo` = '".$_POST["cmbrutas"]."',
        `empleado_cedula` = '".$_POST["cmbempleados"]."'
        WHERE `bus_codigo` = '".$_POST["cod_buses"]."' 
        ";

        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('Datos actualizados exitosamente.');</script>";
            $dir = "form_buses.php"; //cargar de nuevo el formulario 
            header ('Location: ' . $dir);

        }else
        {
            echo "Error no se puede ejecutar ".$sql."Error ".mysqli_error($con);
            $dir = "form_buses.php";
            header ('Location: ' . $dir);
        }
}


function eliminarBus(){
    $id = $_GET["id"];
        include("conexion.php");

        
   
        $sql= "DELETE   FROM tbl_buses WHERE bus_codigo = '$id' ";      
    
        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('Datos Eliminados exitosamente.');</script>";
            $dir = "form_buses.php"; //cargar de nuevo el formulario 
            header ('Location: ' . $dir);      

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_buses.php"; 
            header ('Location: ' . $dir);  

        }

}




/************************************************************************************************ESTACIONES*/
function guardarEstacion(){
    include("conexion.php");
    $sql = "SELECT *  FROM tbl_estaciones WHERE estacion_nombre = '".$_POST["estacion_n"]."';";

    $validar_registro = mysqli_query($con, $sql);

    if(mysqli_num_rows($validar_registro) <=0){
        $sql= "INSERT INTO `u391525088_transportweb`.`tbl_estaciones`
                (`estacion_nombre`,
                `ciudad_codigo`)
                 VALUES(
                '".$_POST["estacion_n"]."',
                '".$_POST["cmbciudad"]."')";



        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('Datos guardados exitosamente.');</script>";
            $dir = "form_estaciones.php"; //cargar de nuevo el formulario de form_usuario
            header ('Location: ' . $dir);

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_estaciones.php";
            header ('Location: ' . $dir);

        }

    }
    else{
        echo "<script>alert('El estacion que intenta ingresar ya existe');</script>";
        $dir = "form_estaciones.php";
        header ('Location: ' . $dir);
    }

}

function editarEstacion(){
        echo "<script>alert('Entro a editar')</script>";
        $id = $_GET["id"];
        include("conexion.php");
        
        $sql= "
        UPDATE `tbl_estaciones`
        SET
        `estacion_nombre` = '".$_POST["estacion_n"]."',
        `ciudad_codigo` = '".$_POST["cmbciudad"]."'
        WHERE `estacion_codigo` = $id;
        ";

        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('Datos actualizados exitosamente.');</script>";
            $dir = "form_estaciones.php"; //cargar de nuevo el formulario 
            header ('Location: ' . $dir);

        }else
        {
            echo "<script>alert('Error en actualizacion estacion');</script>";
            echo "Error no se puede ejecutar ".$sql."Error ".mysqli_error($con);
            $dir = "form_estaciones.php";
            header ('Location: ' . $dir);
        }
}

function eliminarEstacion(){
        $id = $_GET["id"];
        include("conexion.php");

        
   
        $sql= "DELETE   FROM tbl_estaciones WHERE estacion_codigo = $id ";      
    
        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('Datos Eliminados exitosamente.');</script>";
            $dir = "form_estaciones.php"; //cargar de nuevo el formulario 
            header ('Location: ' . $dir);      

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_estaciones.php"; 
            header ('Location: ' . $dir);  

        }

}

/*--------------------------------------------------------------------------------------------------- Horario de rutas*/
function guardarHorarioRutas(){
    include("conexion.php");
    $sql = "SELECT *  FROM tbl_horario_rutas WHERE horario_salida = '".$_POST["txthorasalida"]."';";

    $validar_registro = mysqli_query($con, $sql);

    if(mysqli_num_rows($validar_registro) <=0){
        $sql= "INSERT INTO `u391525088_transportweb`.`tbl_horario_rutas`
        (`horario_salida`,
        `horario_llegada`,
        `ruta_codigo`)
        VALUES
            (
                '".$_POST["txthorasalida"]."',
                '".$_POST["txthorallegada"]."',
                '".$_POST["cmbruta"]."'
            )";



        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('Datos guardados exitosamente.');</script>";
            $dir = "form_horario_rutas.php"; //cargar de nuevo el formulario de form_usuario
            header ('Location: ' . $dir);

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_horario_rutas.php";
            header ('Location: ' . $dir);

        }

    }
    else{
        echo "<script>alert('El Hora de salida que intenta ingresar ya existe');</script>";
        $dir = "form_horario_rutas.php";
        header ('Location: ' . $dir);
    }

}

function editarHorarioRutas(){
    $id = $_GET["id"];
    include("conexion.php");

        $sql= "
        UPDATE `tbl_horario_rutas`
        SET
        `horario_salida` = '".$_POST["txthorasalida"]."',
        `horario_llegada` = '".$_POST["txthorallegada"]."',
        `ruta_codigo` = '".$_POST["cmbruta"]."',
        WHERE `horario_codigo` = $id";

        $result=mysqli_query($con,$sql);
        if($result)
        {
            //echo "<script>alert('Datos actualizados exitosamente.');</script>";
            $dir = "form_horario_rutas.php"; //cargar de nuevo el formulario 
            header ('Location: ' . $dir);

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_horario_rutas.php";
            header ('Location: ' . $dir);
        }
}


function eliminarHorarioRutas(){
    $id = $_GET["id"];
    include("conexion.php");

    

    $sql= "DELETE   FROM tbl_horario_rutas WHERE horario_codigo = $id ";      

    $result=mysqli_query($con,$sql);
    if($result)
    {
        echo "<script>alert('Datos Eliminados exitosamente.');</script>";
        $dir = "form_horario_rutas.php"; //cargar de nuevo el formulario 
        header ('Location: ' . $dir);      

    }else
    {
        echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
        $dir = "form_horario_rutas.php"; 
        header ('Location: ' . $dir);  

    }

}




//-----------------------------------------------------------------------------------------------------TIPO PAQUETES
function guardarTipoPaquete(){
    include("conexion.php");
    $sql = "SELECT *  FROM tbl_tipo_paquete WHERE tipo_paquete_nombre = '".$_POST["nombre_paquet"]."';";

    $validar_registro = mysqli_query($con, $sql);

    if(mysqli_num_rows($validar_registro) <=0){
        $sql= "INSERT INTO tbl_tipo_paquete
                (tipo_paquete_nombre,
                tipo_paquete_precio) 
                 VALUES(   
                '".$_POST["nombre_paquet"]."',
                '".$_POST["precio_paquet"]."'    
                )";
        
    
   
        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('Datos guardados exitosamente.');</script>";
            $dir = "form_tipo_paquetes.php"; //cargar de nuevo el formulario de form_usuario
            header ('Location: ' . $dir);      

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_tipo_paquetes.php"; 
            header ('Location: ' . $dir);  

        }

    }
    else{
        echo "<script>alert('Error el nombre del tipo de paquete ya existe');</script>";
        $dir = "form_tipo_paquetes.php"; 
        header ('Location: ' . $dir);  
    }   

}

function editarTipoPaquete(){
        $id = $_GET["id"];
        include("conexion.php");

        $sql= "
        UPDATE tbl_tipo_paquete
        SET
        tipo_paquete_nombre = '".$_POST["nombre_paquet"]."',
        tipo_paquete_precio = '".$_POST["precio_paquet"]."'
        WHERE ciudad_codigo = '$id' ";

        $result=mysqli_query($con,$sql);
        if($result)
        {
            //echo "<script>alert('Datos actualizados exitosamente.');</script>";
            $dir = "form_tipo_paquetes.php"; //cargar de nuevo el formulario 
            header ('Location: ' . $dir);

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_tipo_paquetes.php";
            header ('Location: ' . $dir);
        }
}


function eliminarTipoPaquete(){
    include("conexion.php");

    $id = $_GET["id"];
   
        $sql= "DELETE FROM tbl_tipo_paquete WHERE tipo_paquete_codigo = $id ";      
    
        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('Datos Eliminados exitosamente.');</script>";
            $dir = "form_tipo_paquetes.php"; //cargar de nuevo el formulario 
            header ('Location: ' . $dir);      

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_tipo_paquetes.php"; 
            header ('Location: ' . $dir);  

        }
}


//-----------------------------------------------------------------------------------------------------TIPO PAQUETES
function guardarFacturaBoleto(){
    include("conexion.php");
    $sql = "SELECT *  FROM tbl_factura WHERE factura_n_factura = '".$_POST["numer_factura"]."';";

    $validar_registro = mysqli_query($con, $sql);

    if(mysqli_num_rows($validar_registro) <=0){
        $sql = "
        INSERT INTO `u391525088_transportweb`.`tbl_factura`
        (`factura_n_factura`,
        `factura_fecha`,
        `cliente_cedula`,
        `empleado_cedula`)
        VALUES
        ('".$_POST["numer_factura"]."',
        '".$_POST["fecha_factura"]."',
        '".$_POST["cbmcliente"]."',
        '".$_POST["cbmempleado"]."');
        ";

        echo "<script>alert('Datos guardados exitosamente.');</script>";
    
   
        $result=mysqli_query($con,$sql);
        if($result)
        {
            

            $sql = "
            INSERT INTO `u391525088_transportweb`.`tbl_detalle_factura_boleto`
            (`detalle_factura_boleto_correlativo`,
            `numero_factura`,
            `ruta_codigo`,
            `detalle_factura_boleto_cantidad`)
            VALUES
            ('1',
            '".$_POST["numer_factura"]."',
            '".$_POST["cmbRuta"]."',
            '".$_POST["txtCantidad"]."'
            );";
            
            mysqli_query($con,$sql);//Ejecutar el query

            $dir = "form_factura.php"; //cargar de nuevo el formulario
            header ('Location: ' . $dir);      

        }else
        {
            echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($con);
            $dir = "form_factura.php"; 
            header ('Location: ' . $dir);  

        }

    }
    else{
        echo "<script>alert('El numero de factura ya existe');</script>";
        $dir = "form_factura.php"; 
        header ('Location: ' . $dir);  
    }   

}


?>