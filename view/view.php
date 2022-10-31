<?php 
include "../model/conexion.php";

$id = $_GET["id"];
$sql = "select * from archivo where ARCid=$id";
$db = new Connect;
$data = $db->sentenciaSimple($sql);

header("Content-Type:$data->ARCnombre");
echo $data->ARCpdf;

?>