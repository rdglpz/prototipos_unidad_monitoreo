<?php 
function Conectarse(){
	if(!($link = mysqli_connect("localhost","root",""))){
		echo "Error de conexion";
		exit();
	}
	if(!mysqli_select_db($link,"contaminantes")){
		echo "Error seleccionando la BD";
		exit();
	}
	return $link;
}

 ?>