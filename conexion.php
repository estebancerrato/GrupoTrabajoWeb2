<?php 
$servidor="localhost";
$usuario="id17432575_root";
$clave="UC1@#NfBU(4As%L)";
$bd="id17432575_web2";//Nombre de la BD

$conexion=mysqli_connect($servidor,$usuario,$clave,$bd);

	if (!$conexion) 
	{
    	echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    	echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    	exit;
	}
	else 
	{
		mysqli_set_charset($conexion,"utf8");
		//mysqli_query($conexion,"SET time_zone = '-06:00'");
		echo "Conexion Exitosa a BD ";
	}

?>

