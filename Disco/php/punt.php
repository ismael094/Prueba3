<?php
session_start();
	include ('../Estructura/conn.php');
	$sql="select (SUM(Puntuacion)/COUNT(puntuacion.IdDisco)) as Suma, Cancion, Titulo, disco.IdInterprete,Interprete, Agno, disco.IdDisco from puntuacion,disco,interprete where puntuacion.IdDisco = disco.IdDisco and disco.IdInterprete = interprete.IdInterprete and disco.IdDisco = ".$_GET['id']." group by puntuacion.IdDisco order by Suma DESC";
	$sql1="select (SUM(Puntuacion)/COUNT(puntuacion.IdDisco)) as Suma, Cancion, Titulo, disco.IdInterprete,Interprete, Agno, disco.IdDisco, puntuacion from puntuacion,disco,interprete,cliente where puntuacion.IdDisco = disco.IdDisco and disco.IdInterprete = interprete.IdInterprete and disco.IdDisco = ".$_GET['id']." and cliente.id = puntuacion.idcliente and cliente.id = ".$_SESSION['id']." group by puntuacion.IdDisco order by Suma DESC";
	$result1=mysqli_query($conn, $sql1);
	$result=mysqli_query($conn, $sql);

	if (mysqli_num_rows($result1) > 0) {

	
		while ($imp1 = mysqli_fetch_array($result1)) {
			$iddd=$imp1['IdDisco'];
		echo '<div id="form">

				Has puntuado esta canci&oacute;n con un '.$imp1['puntuacion'].'<br />
				<input type="number" id="num_punt" name="num_pun" min="0" max="10" maxlength="2" value="'.$imp1['puntuacion'].'"/>
				<span onclick="parent.punt_modif(\''.$_SESSION['id'].'\',\''.$imp1['IdDisco'].'\')">Modificar</span>
			</div>';
		}
	}
	else {
		echo '<div id="form">

				Escucha y punt&uacute;a!<br />
				<input type="number" id="num_punt" name="num_pun" min="0" max="10" maxlength="2"/>
				<span onclick="parent.ana_punt(\''.$_SESSION['id'].'\',\''.$_GET['id'].'\')">Puntuar</span>
			</div>';
	}
	if (mysqli_num_rows($result) > 0) {
			while ($imp = mysqli_fetch_array($result)) {
				echo '<div id="punt_media">La nota media de esta canci&oacute;n es de: '.round($imp['Suma'], 2);
			echo '</div>';
			}
	}
	else {
		echo '<div id="punt_media">No se han hecho puntuaciones de esta canci&oacute;n';
			echo '</div>';
	}

	
	
	
	mysqli_close($conn);
?>