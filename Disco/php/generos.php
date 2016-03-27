<!DOCTYPE html>
<html>
	<head>
		<?php $_GET['config']='y';include '../config.php'; echo $head;?>
	</head>
	<body id="gen_page">
		
		<?php
			session_start();
			include ($conecta);
			$seguir="select * from tipo";
			$resul = mysqli_query($conn, $seguir); 
			$i=0;
		
			echo "<div class='row container col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2 gen' >";
			while ($row = mysqli_fetch_array($resul)) {
				if (file_exists($genero.$row['IdTipo'].$extension)) {
					include $genero.$row['IdTipo'].$extension;
					echo '<a href="songs_gen.php?id='.$row['IdTipo'].'"><div class="col-lg-2 col-md-3 col-sm-4 col-xs-12" onclick="ira(\''.$row['IdTipo'].'\')"><img src="'.$ruta_img_gen.$img.'" class="img-responsive gen_img center-block "/></div></a>';
				}
				else {
					echo '<div id="genre" onclick="ira(\''.$row['IdTipo'].'\')">'.$row['tipo'].'</div>';
				}
			}
			echo "</div>";
			$seguir="select * from tipo";
			$resul = mysqli_query($conn, $seguir); 
			mysqli_close($conn);
			echo $script;	
?>

</body>
</html>