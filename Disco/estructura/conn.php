<?php
/* OJO!!!!! 
	MODIFICAR LOS DATOS DE ACCESO CON LOS QUE CORRESPONDAN 
	A TU SERVIDOR Y BASE DE DATOS.
*/
$host = "localhost"; //database location
$username = "root";
$password = ""; //database password
$db_name = "Discos"; //database name
//database connection
$conn = mysqli_connect($host, $username, $password) or
    die("No ha sido posible conectarse: " . mysqli_error());;
mysqli_select_db($conn, $db_name);
?>