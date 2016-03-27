
<!DOCTYPE html>
<html>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<link rel="stylesheet" href="../css/estilos.css">
		<script src="../js/script.js"></script>
	</head>
	<body id="gen_page">
		<?php
	session_start();
	include ('../Estructura/conn.php');
	$sql="select (SUM(Puntuacion)/COUNT(puntuacion.IdDisco))*10 as Suma, Cancion, Titulo, disco.IdInterprete,Interprete, Agno, puntuacion.IdDisco, disco.IdDisco from puntuacion,disco,interprete where puntuacion.IdDisco = disco.IdDisco and disco.IdInterprete = interprete.IdInterprete and Cancion != ' ' group by puntuacion.IdDisco order by Suma DESC";
	include 'menu1.php';
	echo '<div id="songs"><table border=1 id="table_songs" cellspacing=0>';
				echo '<tr class="tit"><td></td><td>T&iacute;tulo</td><td>Grupo</td><td>A&ntilde;o</td><td>Popularidad</td></tr>';
				$result=mysqli_query($conn, $sql);
				$i=0;
				while ($imp = mysqli_fetch_array($result)) {
					$p = $imp['Suma']/10;
					include "../interpretes/".$imp['IdInterprete'].".php";
					echo '<tr class="cam" ondblclick="parent.reproducir(\''.$img.'\', \''.$imp['Cancion'].'\',\''.$imp['IdDisco'].'\', '.$i++.', \'popul\',1)"><td>PLAY</td><td>'.$imp['Titulo'].'</td><td>'.$imp['Interprete'].'</td><td>'.$imp['Agno'].'</td><td>';
					echo '<div id="color" title="'.round($p, 2).'"style="width:'.$imp['Suma'].'px; height:10px; border: 1px solid black; margin-left: 10px;background:';
					
					if ($p >= 8.5) {
						echo '#12B55E';
					}
					elseif ($p >= 7 && $p < 8.5) {
						echo ' #85C838';
					}
					elseif ($p >= 5 && $p < 7) {
						echo '#DDE028';
					}
					elseif ($p >= 2.5 && $p < 5) {
						echo '#F3AA44';
					}
					elseif ($p < 2.5) {
						echo '#E95524';
					}
					echo ';">';
					
					echo '</div></td></tr>';



				}
				echo '</table></div>';
		echo "</div>";
		$seguir="select * from tipo";
		$resul = mysqli_query($conn, $seguir); 
	mysqli_close($conn);	
?>

</body>
</html>