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
			$seguir="select * from interprete";
				$resul = mysqli_query($conn, $seguir); 
				$i=0;
				include 'menu1.php';
				echo "<div id='gen'>";
				while ($row = mysqli_fetch_array($resul)) {
					include "../interpretes/".$row['IdInterprete'].".php";
						echo '<a href="songs_aut.php?id='.$row['IdInterprete'].'"><div id="genre" style="background: url(../'.$img.') center center; background-size: 150px 150px"><span id="tipo">'.$row['Interprete'].'</span></div></a>';
						
				}
				echo "</div>";
				
			mysqli_close($conn);	
		?>
	</body>
</html>