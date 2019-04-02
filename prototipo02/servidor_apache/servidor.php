<?php 
$conexion = mysqli_connect("localhost","root","");
mysqli_select_db($conexion,"contaminantes");
$query = "INSERT INTO registros(Fecha,Hora,Temperatura,Humedad) VALUES ('2019-03-21','11:10:15','".$_GET['Temperatura']."','".$_GET['Humedad']."') ";
$ejecuta=mysqli_query($conexion,$query);
mysqli_close($conexion);
?>
