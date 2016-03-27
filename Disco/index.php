<!DOCTYPE html>
<html lang="en">

    <head>
        <?php 
            $_GET['config']='n';
            include 'config.php'; 
            echo $head;
        ?>
    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

       <nav class='navbar'>
             <div class='container'>
                <div class='navbar-header'>
                    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-main-collapse'>
                        <i class='fa fa-bars'></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top">
                        <i class="fa fa-play-circle"></i>  <span class="light">Start</span> Bootstrap
                    </a>
                </div>
                <div class='collapse navbar-collapse navbar-main-collapse'>
                    <ul class='nav nav-tabs nav-justified'>
                      
                       <li><a href='php/songs.php' target="iframe1"><span>Canciones</span></a></li>
                       <li><a href='generos.php' target="iframe1"><span>G&eacute;neros</span></a></li>
                       <li><a href='autores.php' target="iframe1"><span>Int&eacute;rpretes</span></a></li>
                       <li><a href='songs_popul.php' target="iframe1"><span>Popularidad</span></a></li>
                       <li><a href='equipos.php' target="iframe1"><span>Playlist</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="todo" class="row container" >
            <div id="iz" class="col-lg-2 col-md-2 hidden-xs hidden-sm">
                <div id="search">
                    <input type="text"/>
                </div>
                <div>
                    <span onclick="prueba();">Mis puntuaciones</span>
                </div>
                <div id="playlist">
                    <ul>
                        <li>Mis playlist
                            <ul>
                                <li>Playlist </li>
                                <li>Playlist </li>
                                <li>Playlist </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="settings">
                    <span>Ajustes</span>
                </div>
            </div>

            <div id="body" class="col-lg-8 col-md-8 col-sm-12 col-xs-12 center-block" >
                
                <div id="contenedor" >
                    <iframe id="iframe1" name="iframe1"  height="760px" class="col-lg-12 col-md-12 col-xs-11 center-block" src="php/generos.php" style="border:0"></iframe>
                </div>
                   
            </div>
                
            <div id="de" class="col-lg-2 col-md-2 ">
                <iframe name="iframe2" width="350px" height="600px" src="php/reproductor.php" scrolling="no" style="border:0"></iframe>
            </div>
        </div>
        <?php echo $footer; echo $script?>

    </body>

</html>
