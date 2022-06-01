<?php 

	$host = 'proyectoegal.c2f1vvxna4co.us-east-1.rds.amazonaws.com';
	$user = 'admin';
	$password = 'prestadores.egal.20';
	$db = 'proyectoegal';
	/*$host = 'localhost';
	$user = 'root';
	$password = '';
	$db = 'proyectoegal';*/
	$conection =@mysqli_connect($host,$user,$password,$db);

	if (!$conection) {
		echo "Error en la conexión";
	}

?>