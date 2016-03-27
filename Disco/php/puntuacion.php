
<!DOCTYPE html>
<html>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<link rel="stylesheet" href="../css/estilos.css">
	</head>
	<body>
		<?php
	session_start();
	include ('../Estructura/conn.php');
	$sql="select Cancion, Titulo, disco.IdInterprete, Interprete, Agno, Puntuacion, disco.IdDisco from puntuacion,disco,interprete, cliente where puntuacion.IdDisco = disco.IdDisco and disco.IdInterprete = interprete.IdInterprete and cliente.Id = puntuacion.Id and cliente.Id = 2";
	
	include 'menu1.php';
	echo '<div id="songs"><table border=1 id="table_songs" cellspacing=0>';
				echo '<tr><td></td><td>T&iacute;tulo</td><td>Grupo</td><td>A&ntilde;o</td><td>Puntuaci&oacute;n</td></tr>';
				$result=mysqli_query($conn, $sql);
				while ($imp = mysqli_fetch_array($result)) {
					include "../interpretes/".$imp['IdInterprete'].".php";
					echo '<tr ondblclick="parent.reproducir(\''.$img.'\', \''.$imp['Cancion'].'\',\''.$imp['IdDisco'].'\')"><td>PLAY</td><td>'.$imp['Titulo'].'</td><td>'.$imp['Interprete'].'</td><td>'.$imp['Agno'].'</td><td>'.$imp['Puntuacion'].'</td></tr></a>';



				}
				echo '</table></div>';
		echo "</div>";
		$seguir="select * from tipo";
		$resul = mysqli_query($conn, $seguir); 
	mysqli_close($conn);	
?>

</body>
</html>