<!DOCTYPE html>
<html>
	<head>
		<?php 
			$_GET['config']='y';
			include '../config.php';
			echo $head;
		?>
	</head>
	<body id="gen_page" class="center-block">
		<?php
			session_start();
			include ($conecta);
			$sql='select * from disco, interprete where disco.idinterprete=interprete.idinterprete and Cancion != ""';
			echo '<div class="row container  col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12"><table class="table table-bordered table-hover">';
			echo '<tr class="tit"><td></td><td>T&iacute;tulo</td><td>Grupo</td><td class="hidden-xs">A&ntilde;o</td></tr>';
			$result=mysqli_query($conn, $sql);
			$i = 0;
				while ($imp = mysqli_fetch_array($result)) {
					include $interpretes.$imp['IdInterprete'].$extension;
					echo '<tr class="cam" ondblclick="parent.reproducir(\''.$img.'\', \''.$imp['Cancion'].'\',\''.$imp['IdDisco'].'\', '.$i++.', \'songs\',\'0\')"><td><span class="glyphicon glyphicon-play" aria-hidden="true"></span></td><td>'.$imp['Titulo'].'</td><td><a href="songs_aut.php?id='.$imp['IdInterprete'].'">'.$imp['Interprete'].'</a></td><td class="hidden-xs">'.$imp['Agno'].'</td></tr>';
				}
			echo '</table></div>';
			mysqli_close($conn);	
			echo $script;
		?>
		
	</body>
</html>