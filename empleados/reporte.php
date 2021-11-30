<?php 
//$factura=$_POST["factnum"];
//$factura=$_SESSION["factnum"];
include("conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Vista de Impresion para Factura</title>

<!--Librerias para Imprimir PDF-->
<script src="jspdf/dist/html2canvas.js"></script>
<script src="jspdf/dist/jspdf.min.js"></script>

	<script type="text/javascript">
		function print()
		{
			var win = window.open('', 'print', 'height=720,width=600');
			win.document.write(document.getElementById("tabla").innerHTML);
			win.document.close(); 
			win.focus();
			win.print(); 
		}
	</script>

<!-------------------------------->
</head>
<body>

<button onClick='print();'>Imprimir</button>

	<div id="tabla" width="80%">
		<table id="tabla_id" border="0">
		<tr align="center">
			<td colspan=3><font size=3><b>FACTURA</b></font></td>
		</tr>
<?php 
$sql="SELECT `vista_DatosFactura`.`numerofactura`,
`vista_DatosFactura`.`fechafactura`,
`vista_DatosFactura`.`ClienteNombre`,
`vista_DatosFactura`.`ClienteRTN`,
`vista_DatosFactura`.`CajeroNombre`,
`vista_DatosFactura`.`nombreRuta`,
`vista_DatosFactura`.`distancia`,
`vista_DatosFactura`.`PrecioRuta`,
`vista_DatosFactura`.`CantidadBoleto`,
`vista_DatosFactura`.`SubTotal`,
`vista_DatosFactura`.`ISV15`,
`vista_DatosFactura`.`Total`
FROM `u391525088_transportweb`.`vista_DatosFactura`";

$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result))
{
	echo "
	<tr>
		<td><b>Num Factura:</b></td>
		<td colspan=2>".$row["numerofactura"]."</td>
	</tr>";

	echo "
	<tr>
		<td><b>Fecha Factura:</b></td>
		<td colspan=2>".$row["fechafactura"]."</td>
	</tr>";

	echo "
	<tr>
		<td><b>Cliente:</b></td>
		<td colspan=2>".$row["ClienteNombre"]."</td>
	</tr>";

	echo "
	<tr>
		<td><b>RTN:</b></td>
		<td colspan=2>".$row["ClienteRTN"]."</td>
	</tr>";

	echo "
	<tr>
		<td><b>Cajero:</b></td>
		<td colspan=2>".$row["CajeroNombre"]."</td>
	</tr>";




	$subtotal=$row["SubTotal"];
	$impuesto=$row["ISV15"];
	$total=$row["Total"];
}
?>
	<tr>
	</tr>
	<tr>
		<td align='center'><b>Nº</b></td>
		<td><b>Descripcion</b></td>
		<td><b>Cantidad </b></td>
		<td><b>Precio</b></td>
	</tr>	
		
	
<?php //aqui tengo que filtrar
$sql="SELECT *
FROM `u391525088_transportweb`.`vista_DatosFactura` ;";
$result=mysqli_query($con,$sql);

$x = 0;

while($row=mysqli_fetch_assoc($result))
{
	$x++;
	echo 
	"<tr>
		<td align='center'>".$x."</td>
		<td>".$row["nombreRuta"]."</td>
		<td align='center'>".$row["CantidadBoleto"]."</td>
		<td>".$row["PrecioRuta"]."</td>
		
	</tr>
		
	";
}
?>
	<tr>
		<td colspan=2 align='right'>Subtotal</td>
		<td colspan=2 align='right'><?php echo number_format($subtotal,2);?></td>
	<tr>

	<tr>
		<td colspan=2 align='right'>Impuesto 15%</td>
		<td colspan=2 align='right'><?php echo number_format($impuesto,2);?></td>
	<tr>

	<tr>
		<td colspan=2 align='right'>Total</td>
		<td colspan=2 align='right'><?php echo number_format($total,2);?></td>
	<tr>

	</table>
	</div>

<?php 
//Mostrar la Impresion del Navegador.
echo "<script>print();</script>";
?>

</body>
</html>