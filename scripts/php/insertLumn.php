<?php 
	$conexion = mysqli_connect("localhost","root","");
	mysqli_select_db($conexion,"contaminantes");
	$query = "INSERT INTO luminancia(Fecha,Hora,Luminancia) VALUES ('2019-03-21','11:10:15','".$_GET['Luminancia']."') ";
	$ejecuta=mysqli_query($conexion,$query);
	mysqli_close($conexion);
 ?>