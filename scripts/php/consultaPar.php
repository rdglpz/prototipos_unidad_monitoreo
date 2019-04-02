<?php 
include_once("conectores/localConector.php");
$link = Conectarse();
mysqli_set_charset($link,'utf8');
$consulta = "SELECT * FROM registros";
$resultado = mysqli_query($link,$consulta);
$row = mysqli_fetch_assoc($resultado);
$respuesta = array('v1' => $row['Fecha'],
	'v2' => $row['Hora'], 'v3' => $row['Temperatura'], 'v4' =>$row['Humedad']);
echo json_encode($respuesta);
 ?>