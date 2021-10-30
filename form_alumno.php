
<?php 

include("conexion.php");
include("class_alumno.php");

$objetoconsulta = new Alumnos(); 

$accion=(isset($_POST["accion"])?$_POST["accion"]:"");

if($accion=="guardar")

	{
		$codigo_alumno = $_POST["txtcodigo"];
		$validar_registro = mysqli_query($conexion, "SELECT *  FROM tbl_alumno_examen  WHERE alumno_codigo = '".$codigo_alumno."';");
		if(mysqli_num_rows($validar_registro) <=0){
			
			$nombres=mysqli_real_escape_string($conexion,$_REQUEST["txtnomrbres"]);
			$apellidos=mysqli_real_escape_string($conexion,$_REQUEST["txtapellidos"]);
			$direccion=mysqli_real_escape_string($conexion,$_REQUEST["txtDireccion"]);
		
			$sql="insert into tbl_alumno_examen  values(
			'".$_POST["txtcodigo"]."',
			'".$nombres."',
			'".$apellidos."',
			'".$_POST["dnac"]."',
			'".$_POST["cmbgrado"]."',
			'".$_POST["dmatricula"]."',
			'".$_POST["txtTelefono"]."',
			'".$direccion."'
			)";
		
			$result=mysqli_query($conexion,$sql);
			if($result)
			{
				echo "<script>alert('Datos guardados exitosamente.');</script>";
			}else
			{
				echo "Error no se puede ejecutar ".$sql." Error ".mysqli_error($conexion);
			}

		}
		else{
			echo "<script>alert('El alumno que intenta ingresar ya existe');</script>";
		}
	

echo="HOLA MUNDO"
}




?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Esteban Cerrato" />
	<title>Formulario de Alumno</title>
	<link rel="stylesheet" type="text/css" href="estilo_formularios.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- ionicons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">	
	 <!-- Validar informacion ingresada-->
	 <script src="validar_alumno.js"></script>
</head>

<body>
	<div align='center'>
		<h2>Formulario para Mantenimiento de Alumnos</h2>
	</div>

	<form name='formulario' id='formulario' method="POST" action='form_alumno.php'>
	    <input type="hidden" name="accion" id="accion" value="">
		
		<fieldset>
			<label>Codigo de Alumno</label>
			<input type="text" name="txtcodigo" id="txtcodigo"  maxlength="45" value="">
		</fieldset>

		<fieldset>
			<label>Nombres del Alumno</label>
			<input type="text" name="txtnomrbres" id="txtnomrbres" value="" maxlength="45">
		</fieldset>
		<fieldset>
			<label>Apellidos del Alumno</label>
			<input type="text" name="txtapellidos" id="txtapellidos" value="" maxlength="45">
		</fieldset>


		<fieldset>
			<label>Fecha de Nacimiento</label>
			<input type="date" name="dnac" id="dnac" value="">
		</fieldset>

		<fieldset>
			<label>Grado del alumno</label>
			<select name="cmbgrado" id="cmbgrado">
				<option value="Septimo">Septimo</option>
				<option value="Undecimo">Undécimo</option>
			</select>
		</fieldset>

		<fieldset>
			<label>Fecha de Matricula</label>
			<input type="date" name="dmatricula" id="dmatricula" value="<?php echo date("Y-n-j");?>">
		</fieldset>

		<fieldset>
			<label>Numero de telefono</label>
			<input type="text" name="txtTelefono" id="txtTelefono" maxlength="45">
		</fieldset>

		<fieldset>
			<label>Direccion</label>
			<textarea name='txtDireccion' id='txtDireccion'></textarea>
		</fieldset>

		<fieldset>
			<button name='btnguardar' onClick="return validar();">Guardar</button>
		</fieldset>
	</form>

	<?php 

		echo $objetoconsulta->consultaAlumnos();

		 
	?>

</body>

</html>