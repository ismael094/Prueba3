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
			$sql='select Cancion, Titulo, Interprete, Agno, disco.IdInterprete, disco.IdDisco from disco, interprete where disco.idinterprete=interprete.idinterprete and interprete.IdInterprete = '.$_GET['id'].'';
			
			$sql1="select * from interprete where IdInterprete =".$_GET['id']."";
			$result=mysqli_query($conn, $sql);
			$result1=mysqli_query($conn, $sql1);
			include 'menu1.php';
			echo '<div id="songs">';
			$i = 0;
			while ($row = mysqli_fetch_array($result1)) {
				include "../interpretes/".$row['IdInterprete'].".php";
				echo '<div id="genre" onclick="ira(\''.$row['IdInterprete'].'\')" style="background: url(../'.$img.') center center; background-size: 150px 150px"></div><span id="gen_nom">'.$row['Interprete'].'</span>';
			
			}
			echo '<table border=1 id="table_songs" cellspacing="0" style="margin-top: 175px;">';
			echo '<tr class="tit"><td></td><td>T&iacute;tulo</td><td>Grupo</td><td>A&ntilde;o</td></tr>';
			while ($imp = mysqli_fetch_array($result)) {
				include "../interpretes/".$imp['IdInterprete'].".php";
				
				echo '<tr class="cam" ondblclick="parent.reproducir(\''.$img.'\', \''.$imp['Cancion'].'\',\''.$imp['IdDisco'].'\', '.$i++.', \'aut\',\''.$_GET['id'].'\')"><td>PLAY</td><td>'.$imp['Titulo'].'</td><td>'.$imp['Interprete'].'</td><td>'.$imp['Agno'].'</td></tr>';
			}
				echo '</table>';
				echo "</div>";
				
			mysqli_close($conn);	
		?>
	</body>
</html>