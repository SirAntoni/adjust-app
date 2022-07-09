<?php 
session_start();
require "../config/conexion.php";
require "../model/dashboardModel.php";

$d = new Dashboard();

$autos = $d->contar_autos();
$categorias = $d->contar_categorias();
$partes = $d->contar_partes();

$data = json_encode(array('autos' => $autos[0]['autos'], 'categorias' => $categorias[0]['categorias'], 'partes' => $partes[0]['partes']));
echo $data;

?>