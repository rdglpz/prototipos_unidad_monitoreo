<?php 
include_once("conectores/localConector.php");
$link = Conectarse();
$data_points = array();
mysqli_set_charset($link,'utf8');
$consulta = "SELECT * FROM registros";
$resultado = mysqli_query($link,$consulta);
while ($row = mysqli_fetch_array($resultado)) {
        $point = array("valorx" => $row['Id'], "valory" => $row['Temperatura']);
        array_push($data_points, $point);
    }
echo json_encode($data_points);
 ?>