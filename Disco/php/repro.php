<?php
session_start();
	include ('../Estructura/conn.php');
	$id=$_GET['id1'];
	$limit=$_GET['limit'];
	if ($_GET['ale'] == 'si') {
		$limit=0;
		$limit_f=1000;
		$i=0;
		
	}
	else {
		$limit_f=1;
		$i=0;
	}
	if ($_GET['method'] == 'gen') {
		$sql='select Cancion, Titulo, Interprete, Agno, disco.IdInterprete, disco.IdDisco from disco, interprete,discotipo where disco.idinterprete=interprete.idinterprete and discotipo.IdDisco = disco.IdDisco and discotipo.IdTipo = '.$_GET['id1'].' and Cancion != "" limit '.$limit.','.$limit_f.'';
	}
	elseif ($_GET['method'] == 'aut') {
		$sql='select Cancion, Titulo, Interprete, Agno, disco.IdInterprete, disco.IdDisco from disco, interprete where disco.idinterprete=interprete.idinterprete and interprete.IdInterprete = '.$_GET['id1'].'  and Cancion != "" limit '.$limit.','.$limit_f.'';
	}
	elseif ($_GET['method'] == 'popul') {
		$sql="select (SUM(Puntuacion)/COUNT(puntuacion.IdDisco))*10 as Suma, Cancion, Titulo, disco.IdInterprete,Interprete, Agno, puntuacion.IdDisco, disco.IdDisco from puntuacion,disco,interprete where puntuacion.IdDisco = disco.IdDisco and disco.IdInterprete = interprete.IdInterprete and Cancion != '' group by puntuacion.IdDisco order by Suma DESC limit ".$limit.",".$limit_f."";
	}
	elseif ($_GET['method'] == 'songs') {
		$sql="select * from disco, interprete where disco.idinterprete=interprete.idinterprete and Cancion != '' limit ".$limit.",".$limit_f."";
	}
	
	
	if ($_GET['ale'] == 'si') {
		$aaa=array();
		$result=mysqli_query($conn, $sql);
		while ($imp = mysqli_fetch_array($result)) {
			
			$aaa[$i++]=$imp['IdInterprete'];
			
		}
		$cou = count($aaa)-1;
		$limit=$_GET['limit'];

		
		if ($_GET['method'] == 'gen') {
			$sql='select Cancion, Titulo, Interprete, Agno, disco.IdInterprete, disco.IdDisco from disco, interprete,discotipo where disco.idinterprete=interprete.idinterprete and discotipo.IdDisco = disco.IdDisco and discotipo.IdTipo = '.$_GET['id1'].' and Cancion != "" limit '.$limit.',1';
		}
		elseif ($_GET['method'] == 'aut') {
			$sql='select Cancion, Titulo, Interprete, Agno, disco.IdInterprete, disco.IdDisco from disco, interprete where disco.idinterprete=interprete.idinterprete and interprete.IdInterprete = '.$_GET['id1'].' and Cancion != "" limit '.$limit.',1';
		}
		elseif ($_GET['method'] == 'popul') {
			$sql="select (SUM(Puntuacion)/COUNT(puntuacion.IdDisco))*10 as Suma, Cancion, Titulo, disco.IdInterprete,Interprete, Agno, puntuacion.IdDisco, disco.IdDisco from puntuacion,disco,interprete where puntuacion.IdDisco = disco.IdDisco and disco.IdInterprete = interprete.IdInterprete and Cancion != '' group by puntuacion.IdDisco order by Suma DESC limit ".$limit.",1";
		}
		elseif ($_GET['method'] == 'songs') {
			$sql="select * from disco, interprete where disco.idinterprete=interprete.idinterprete limit ".$_GET['limit'].",1";
		}
	}
	
	$result5=mysqli_query($conn, $sql);
	while ($imp5 = mysqli_fetch_array($result5)) {

		if ($_GET['ale'] == 'si') {
			$idd=rand(0, $cou);
			if ($limit == $idd) {
				$idd=rand(0, $cou);
			}
		}

		else {
			$idd=$_GET['limit']+1;
		}

		if ($_GET['method'] == 'gen') {
			$sql1='select Cancion, Titulo, Interprete, Agno, disco.IdInterprete, disco.IdDisco from disco, interprete,discotipo where disco.idinterprete=interprete.idinterprete and discotipo.IdDisco = disco.IdDisco and discotipo.IdTipo = '.$id.' and Cancion != "" limit '.$idd.',1';
		}
		elseif ($_GET['method'] == 'aut') {
			$sql1='select Cancion, Titulo, Interprete, Agno, disco.IdInterprete, disco.IdDisco from disco, interprete where disco.idinterprete=interprete.idinterprete and interprete.IdInterprete = '.$id.' and Cancion != "" limit '.$idd.',1';
		}
		elseif ($_GET['method'] == 'popul') {
			$sql1="select (SUM(Puntuacion)/COUNT(puntuacion.IdDisco))*10 as Suma, Cancion, Titulo, disco.IdInterprete,Interprete, Agno, puntuacion.IdDisco, disco.IdDisco from puntuacion,disco,interprete where puntuacion.IdDisco = disco.IdDisco and disco.IdInterprete = interprete.IdInterprete and Cancion != '' group by puntuacion.IdDisco order by Suma DESC limit ".$idd.",1";
		}
		elseif ($_GET['method'] == 'songs') {
			$sql1="select * from disco, interprete where disco.idinterprete=interprete.idinterprete limit ".$idd.",1";
		}
		echo $sql.'++++'.$sql1;
		echo '<audio id="reprodu" autoplay="1" onended="parent.oned(\''.$idd.'\', \''.$_GET['method'].'\',\''.$_GET['id1'].'\'';
		$result1=mysqli_query($conn, $sql1);
		while ($imp1 = mysqli_fetch_array($result1)) {
			include "../interpretes/".$imp1['IdInterprete'].".php";
			echo ',\''.$img.'\')">';
		}
		echo '<source id="repro" src="../'.$imp5['Cancion'].'"  type="audio/mpeg"></audio>
			<input type="hidden" name="ima" id="ima" value=\''.$idd.'\' />
			<input type="hidden" name="ima" id="ima1" value=\''.$_GET['method'].'\' />
			<input type="hidden" name="ima" id="ima2" value=\''.$_GET['id1'].'\' />
			<input type="hidden" name="ima" id="ima3" value=\''.$img.'\' />';
	}
	
	
	
		if ($_GET['ale'] == 'si') {
		
			$idd=$_GET['limit']-1;
			if ($idd < 0) {
				$idd=0;
			}
		}

		else {
			$idd=$_GET['limit']-1;
			if ($idd < 0) {
				$idd=0;
			}
		}

		if ($_GET['method'] == 'gen') {
			$sql1='select Cancion, Titulo, Interprete, Agno, disco.IdInterprete, disco.IdDisco from disco, interprete,discotipo where disco.idinterprete=interprete.idinterprete and discotipo.IdDisco = disco.IdDisco and discotipo.IdTipo = '.$id.' and Cancion != "" limit '.$idd.',1';
		}
		elseif ($_GET['method'] == 'aut') {
			$sql1='select Cancion, Titulo, Interprete, Agno, disco.IdInterprete, disco.IdDisco from disco, interprete where disco.idinterprete=interprete.idinterprete and interprete.IdInterprete = '.$id.' and Cancion != "" limit '.$idd.',1';
		}
		elseif ($_GET['method'] == 'popul') {
			$sql1="select (SUM(Puntuacion)/COUNT(puntuacion.IdDisco))*10 as Suma, Cancion, Titulo, disco.IdInterprete,Interprete, Agno, puntuacion.IdDisco, disco.IdDisco from puntuacion,disco,interprete where puntuacion.IdDisco = disco.IdDisco and disco.IdInterprete = interprete.IdInterprete and Cancion != '' group by puntuacion.IdDisco order by Suma DESC limit ".$idd.",1";
		}
		elseif ($_GET['method'] == 'songs') {
			$sql1="select * from disco, interprete where disco.idinterprete=interprete.idinterprete limit ".$idd.",1";
		}
		
		
		$result1=mysqli_query($conn, $sql1);
		while ($imp1 = mysqli_fetch_array($result1)) {
			include "../interpretes/".$imp1['IdInterprete'].".php";
		

			echo '
			<input type="hidden" name="ima" id="ima4" value=\''.$idd.'\' />
			<input type="hidden" name="ima" id="ima5" value=\''.$_GET['method'].'\' />
			<input type="hidden" name="ima" id="ima6" value=\''.$_GET['id1'].'\' />
			<input type="hidden" name="ima" id="ima7" value=\''.$img.'\' />';
		}
			
		
			
	
	

	
	
	
	mysqli_close($conn);
?>