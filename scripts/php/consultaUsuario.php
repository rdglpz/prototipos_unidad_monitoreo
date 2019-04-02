<?php 

include_once("conectores/localConector.php");
$link = Conectarse();
mysqli_set_charset($link,'utf8');
$consulta = "SELECT * FROM usuario WHERE Id = 1";
$resultado = mysqli_query($link,$consulta);
$row = mysqli_fetch_assoc($resultado);
echo $row['Nombre'].'</BR>';
echo $row['Edad'].'</BR>';
echo $row['Direccion'].'</BR>';
 ?>