<?php
session_start();
	include ('../Estructura/conn.php');
	$sql="INSERT into puntuacion(idcliente, iddisco,puntuacion,fecha) values (".$_GET['idc'].",".$_GET['idd'].",".$_GET['punt'].",NOW() ) ";
	$result=mysqli_query($conn, $sql);
	$sql1="select (SUM(Puntuacion)/COUNT(puntuacion.IdDisco)) as Suma, Cancion, Titulo, disco.IdInterprete,Interprete, Agno, disco.IdDisco from puntuacion,disco,interprete,cliente where puntuacion.IdDisco = disco.IdDisco and disco.IdInterprete = interprete.IdInterprete and disco.IdDisco = ".$_GET['idd']." group by puntuacion.IdDisco order by Suma DESC";
	$result1=mysqli_query($conn, $sql1);

	echo 'Has puntuado esta canci&oacute;n con un '.$_GET['punt'].'<br />';

	while ($imp = mysqli_fetch_array($result1)) {

		echo 'La nota media de esta canci&oacute;n es de: '.round($imp['Suma'], 2);
	
	}
	 
	
	mysqli_close($conn);
?>
	
