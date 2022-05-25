<?php 

require "../config/conexion.php";
require "../model/reportModel.php";

$reports = new Reports();

$date = '';
$month = '';
$year = '';
$month = '';
$startDate = '';
$endDate = '';
$option = '';

if(isset($_POST['option'])){
    $option = $_POST['option'];
}

if(isset($_POST['date'])){
    $date = $_POST['date'];
}

if(isset($_POST['month'])){
    $month = $_POST['month'];
}

if(isset($_POST['year'])){
    $year = $_POST['year'];
}

if(isset($_POST['startDate'])){
    $startDate = $_POST['startDate'];
}

if(isset($_POST['endDate'])){
    $endDate = $_POST['endDate'];
}

switch ($option){
    case 'report_daily':
        $report = $reports->report_daily($date);
        echo json_encode($report);
    break;
    case 'report_month':
        $report = $reports->report_month($month,$year);
        echo json_encode($report);
    break;
    case 'report_custom':
        $report = $reports->report_custom($startDate,$endDate);
        echo json_encode($report);
    break;
    default:
        echo "acceso denegado";
    break;
}

?>