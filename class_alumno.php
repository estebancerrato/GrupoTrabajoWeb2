<?php
    class Alumnos{
        public function consultaAlumnos(){
            include 'conexion.php';      
            
            $query = mysqli_query($conexion, "SELECT *  FROM tbl_alumno_examen;")
            or die('error: '.mysqli_error($conexion));           
                  
            echo "<div style='width:1200px; margin:0 auto;'>
            <table class='table table-responsive table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>Codigo</th>
                        <th scope='col'>Nombre Completo</th>
                        <th scope='col'>Fecha de Nacimiento</th>
                        <th scope='col'>Grado</th>
                        <th scope='col'>Fecha de Matricula</th>
                        <th scope='col'>Numero de telefono</th>
                        <th scope='col'>Direccion</th>
                    </tr>
                </thead>
                <tbody>      
            ";            
           
            while($data = mysqli_fetch_assoc($query)){
                echo "<style> td{ text-align: center;}</style>
                <tr>
                    <form  method='POST' name='form1'>
                        <th scope='row'>$data[alumno_codigo]</th>
                        <td>$data[alumno_nombres] $data[alumno_apellidos]</td>
                        <td>$data[alumno_fecha_nacimiento]</td>
                        <td>$data[alumno_grado]</td>
                        <td>$data[alumno_fecha_matricula]</td>
                        <td>$data[alumno_telefono]</td>
                        
                    </form>
                </tr>
                ";
            }            
            
            echo "
                </tbody>
            </table></div>
            ";        
        }
    }


?>