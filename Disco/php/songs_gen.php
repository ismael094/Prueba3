<!DOCTYPE html>
<html>
	<head>
		<?php $_GET['config']='y';include '../config.php'; echo $head;?>
	</head>
	<body id="gen_page">
<?php
	session_start();
	
	include ($conecta);
	$sql='select Cancion, Titulo, Interprete, Agno, disco.IdInterprete, disco.IdDisco from disco, interprete,discotipo where disco.idinterprete=interprete.idinterprete and discotipo.IdDisco = disco.IdDisco and Cancion <> "" and discotipo.IdTipo = '.$_GET['id'].' ;';
	
	$sql1="select * from tipo where IdTipo = ".$_GET['id']."";
	$result1=mysqli_query($conn, $sql1);
	
	echo "<div class='row container col-lg-10 col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-1 col-xs-12 '>";
	while ($row= mysqli_fetch_array($result1)) {
		include $genero.$row['IdTipo'].$extension;

		echo '<div id="genre" class="row container hidden-xs col-lg-2 col-md-2 col-md-offset-1 col-sm-8  col-xs-12"><img src="'.$ruta_img_gen.$img.'" class="img-responsive center-block  gen_img2 hidden-xs"/></div><span class="col-lg-2 col-md-2 col-md-offset-1 col-sm-8 col-xs-12 no">'.$row['tipo'].'</span>';
	}
	
	echo '<div id="prueba"><table border=1 id="table_songs" cellspacing="0" >';
				echo '<tr class="tit"><td class="agno"></td><td>T&iacute;tulo</td><td>Grupo</td><td class="agno">A&ntilde;o</td></tr>';
				$result=mysqli_query($conn, $sql);
				$i=0;
				$aaa=array();
				while ($imp = mysqli_fetch_array($result)) {
					 $aaa[$i]=$imp['IdInterprete'];
					include $interpretes.$imp['IdInterprete'].$extension;
					echo '<tr class="cam" data-id="'.$imp['IdDisco'].'" data-value="../'.$imp['Cancion'].'" data-index="'.$i++.'" data-img="../'.$img.'" ><td class="agno">PLAY</td><td>'.$imp['Titulo'].'</td><td>'.$imp['Interprete'].'</td><td class="agno">'.$imp['Agno'].'</td></tr></a>';
				}
				echo '<tr id="casm" data-value="'.$ruta_img_inter.$img.'"><td>sdasd</td></tr></table></div>';
		echo "</div></div>";
		
	mysqli_close($conn);	
?>
<script> 
		
		
		var bla = '';
		var s = parent.window.frames[1];
		function onesd(limit, mov) {
			var ale = s.document.getElementById('aleat').value;
			if (mov == 'n') {
				limit = limit+1;
			}
			else if (mov == 'b') {
				limit = limit-1;
				if (limit < 0) {
					limit = 0;
				}
			}
			if (ale == 'si') {
				var len = window.parent.array1[0];
				len = len -1;
				limit = Math.floor((Math.random() * len) + 0);
			}
			
			
			var id = window.parent.array[limit][0];
			var image = window.parent.array[limit][1];
			var song = window.parent.array[limit][2];
			var index = window.parent.array[limit][3];
			
			s.document.getElementById('play').innerHTML = '<span id="play1" onclick="parent.window.frames[0].onesd('+limit+', \'n\')">';
			s.document.getElementById('back').innerHTML = '<span id="back1" onclick="parent.window.frames[0].onesd('+index+', \'b\')">';
			s.document.getElementById('reproductor').style.background = "url("+image+") center center";
			s.document.getElementById('reproductor').style.backgroundSize =  "275px 275px";
			$.ajax({
	            type: "GET",
	            url: "punt.php",
	            data: {    	
	            	id : id,
	            	
	        },	
	            success: function (data) {
	            	s.document.getElementById('punt_song').innerHTML = data;
	            	
	            	
	        }})	
			s.document.getElementById('reproductor').innerHTML = '<audio id="reprodu" autoplay="1" onended="parent.window.frames[0].onesd('+limit+', \'n\')"><source id="repro" src="'+song+'"  type="audio/mpeg"></audio>';
			s.document.getElementById('reprodu').play();
		}
		
		function plaay() {
		s.document.getElementById('reprodu').play();
		} 
		
		$('.cam').dblclick(function() {
			var romel = window.parent.array5();
			var id = $(this).data('id');
			var image = $(this).data('img');
			var song = $(this).data('value');
			var index = $(this).data('index');
			var io = document.getElementsByClassName("cam");

		    var leno = io.length;
			if (bla != 1) {
				
				s.document.getElementById('controladores').innerHTML = "<div id='control'><div id='anterior'></div><div id='repeat'><span id='repeat1' onclick='parent.repeat(1)'></span></div><div id='play'><span id='play1' onclick='parent.window.frames[0].onesd("+index+")'></div><div id='stop'><span id='stop1' onclick='parent.parar()'></span></div><div id='ale'><span id='ale1'  onclick='parent.aleatorio()'></span><input type='hidden' name='aleat' id='aleat' value='no'/></div><div id='back'><span id='back1'  onclick='parent.oda(2)'></span></div></div>";
			}
			s.document.getElementById('play').innerHTML = '<span id="play1" onclick="parent.window.frames[0].onesd('+index+', \'n\')">';
			s.document.getElementById('back').innerHTML = '<span id="back1" onclick="parent.window.frames[0].onesd('+index+', \'b\')">';
			s.document.getElementById('reproductor').style.background = "url("+image+") center center";
			s.document.getElementById('reproductor').style.backgroundSize =  "275px 275px";
			$.ajax({
	            type: "GET",
	            url: "punt.php",
	            data: {    	
	            	id : id,
	            	
	        },	
	            success: function (data) {
	            	s.document.getElementById('punt_song').innerHTML = data;
	            	
	            	
	        }})	
			s.document.getElementById('reproductor').innerHTML = '<audio id="reprodu" autoplay="1" onended="parent.window.frames[0].onesd('+index+',\'n\')"><source id="repro" src="'+song+'"  type="audio/mpeg"></audio>';
			bla = 1;
		});
		$('.cam').doubletap(function() { 

		var romel = window.parent.array5();
			var id = $(this).data('id');
			var image = $(this).data('img');
			var song = $(this).data('value');
			var index = $(this).data('index');
			var io = document.getElementsByClassName("cam");

		    var leno = io.length;
			if (bla != 1) {
				
				s.document.getElementById('controladores').innerHTML = "<div id='control'><div id='anterior'></div><div id='repeat'><span id='repeat1' onclick='parent.repeat(1)'></span></div><div id='play'><span id='play1' onclick='parent.window.frames[0].onesd("+index+")'></div><div id='stop'><span id='stop1' onclick='parent.parar()'></span></div><div id='ale'><span id='ale1'  onclick='parent.aleatorio()'></span><input type='hidden' name='aleat' id='aleat' value='no'/></div><div id='back'><span id='back1'  onclick='parent.oda(2)'></span></div></div>";
			}
			s.document.getElementById('play').innerHTML = '<span id="play1" onclick="parent.window.frames[0].onesd('+index+', \'n\')">';
			s.document.getElementById('back').innerHTML = '<span id="back1" onclick="parent.window.frames[0].onesd('+index+', \'b\')">';
			s.document.getElementById('reproductor').style.background = "url("+image+") center center";
			s.document.getElementById('reproductor').style.backgroundSize =  "275px 275px";
			$.ajax({
	            type: "GET",
	            url: "punt.php",
	            data: {    	
	            	id : id,
	            	
	        },	
	            success: function (data) {
	            	s.document.getElementById('punt_song').innerHTML = data;
	            	
	            	
	        }})	
			s.document.getElementById('reproductor').innerHTML = '<audio id="reprodu" onended="parent.window.frames[0].onesd('+index+',\'n\')"><source id="repro" src="'+song+'"  type="audio/mpeg"></audio>';
			plaay();
			bla = 1;
}		);
		
		
</script>
</body>
</html>