<?php 

require "../config/conexion.php";
require "../model/dashboardModel.php";

$dashboard = new Dashboard();

$option = '';

switch ($option){
    default:
        $dashboard = json_encode($dashboard->get_dashboard());
    break;
}

?>