
<?php

$servidor="156.67.74.101";
$usuario="u391525088_merayema";
$clave="Proyecto01";
$bd="u391525088_transportweb";//Nombre de la BD

$con=mysqli_connect($servidor,$usuario,$clave,$bd);

	if (!$con) 
	{
    	echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    	echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    	exit;
	}
	else 
	{
		mysqli_set_charset($con,"utf8");

	}

?>
