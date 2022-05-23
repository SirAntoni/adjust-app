<?php

require "../config/conexion.php";
require "../model/saleModel.php";
require "../model/clientModel.php";

$sales = new Sales();

$sale = $sales->get_sale_id($_GET['id']);
$details = $sales->get_sale_detail_id($_GET['id']);

//MESES

$enero = "01";
$febrero = "02";
$marzo = "03";
$abril = "04";
$mayo = "05";
$junio = "06";
$julio = "07";
$agosto = "08";
$setiembre = "09";
$octubre = "10";
$noviembre = "11";
$diciembre = "12";



$fecha = explode("-", $sale['date']);
$dia = $fecha[0];
$ano = $fecha[2];
switch ($fecha[1]) {
	case $enero:
		$mes = "Enero";
		break;
	case $febrero:
		$mes = "Febrero";
		break;
	case $marzo:
		$mes = "marzo";
		break;
	case $abril:
		$mes = "Abril";
		break;
	case $mayo:
		$mes = "Mayo";
		break;
	case $junio:
		$mes = "Junio";
		break;
	case $julio:
		$mes = "Julio";
		break;
	case $agosto:
		$mes = "Agosto";
		break;
	case $setiembre:
		$mes = "Setiembre";
		break;
	case $octubre:
		$mes = "Octubre";
		break;
	case $noviembre:
		$mes = "Noviembre";
		break;
	case $diciembre:
		$mes = "Diciembre";
		break;
	default:
		$mes = "no se encontro mes";
		break;
}

/*$detalle = $_SESSION["bolsa"];
$granTotal = 0;
$granCantidad = 0;
$granIgv = 0;
$granSubtotal = 0;
foreach($_SESSION["bolsa"] as $indice => $producto){
    $granTotal += $producto['total'];
    $granCantidad += $producto['cantidad'];
    $granSubtotal += $producto['subtotal'];
    $granIgv += $producto['igv'];
}

*/
require('controller/fpdf.php');
$data = array(1 => ['Perú', 'Lima', '123.23', '123.32', 'sa'], 2 => ['Perú', 'Lima', '123.23', '123.32', 'sa'], 3 => ['Perú', 'Lima', '123.23', '123.32', 'sa'], 4 => ['Perú', 'Lima', '123.23', '123.32', 'sa']);

$fpdf = new FPDF('P', 'mm', 'A4', true);
$fpdf->SetMargins(5, 5, 5, 5);
$fpdf->AddPage();


/* $fpdf->SetFont('Courier', 'B', 5);
$fpdf->Cell(20, 2, "Empresa");
$fpdf->Cell(30, 2, 'Ninja Sample');
$fpdf->Cell(20, 2, '123 Ninja Blvd.');

$fpdf->Ln(2);
$fpdf->SetFont('Courier', '', 5);
$fpdf->Cell(20, 2, 'Antony Culqui');
$fpdf->Cell(30, 2, 'jose.jairo.fuentes@gmail.com');
$fpdf->Cell(30, 2, 'Ninjaland, 978787');

$fpdf->Ln(2);
$fpdf->Cell(20, 2, "Jefe de proyectos");
$fpdf->Cell(30, 2, '+(503)7898-9878');
$fpdf->Cell(20, 2, 'El Salvador');

$fpdf->Ln(2);
$fpdf->Cell(20, 2, '916706813');
$fpdf->Ln(2);
$fpdf->Cell(20, 2, 'Lima'); */

$fpdf->Image('../assets/images/logo-tienda.png', 10, 3, 50);


$fpdf->ln(10);
$fpdf->SetX(70);
$fpdf->SetFont('Helvetica', 'B', 8);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(70, 5, 'SHOP4USTIENDA', 0, 1, 'L', 0);

$fpdf->SetX(70);
$fpdf->SetFont('Helvetica', '', 8);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(70, 5, 'RUC 10465899129', 0, 1, 'L', 0);

$fpdf->SetX(70);
$fpdf->SetFont('Helvetica', '', 8);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(70, 5, 'Calle artesanos 150, Surco - Stand 205', 0, 1, 'L', 0);

$fpdf->SetX(70);
$fpdf->SetFont('Helvetica', '', 8);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(70, 5, 'Email: ventas@shop4ustienda.com', 0, 1, 'L', 0);

$fpdf->SetX(70);
$fpdf->SetFont('Helvetica', '', 8);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(70, 5, 'www.shop4ustienda.com', 0, 1, 'L', 0);



$fpdf->SetY(50);
$fpdf->SetX(130);
$fpdf->SetFont('Helvetica', '', 8);
$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFillColor(54, 169, 225);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(70, 5, 'NOTA DE VENTA', 'T', 1, 'C', 0);

$fpdf->SetX(130);
$fpdf->SetFont('Helvetica', 'B', 14);
$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFillColor(54, 169, 225);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(70, 5, '# T-'.$sale['voucher_serie'].'-'.$sale['voucher_number'], 'T', 1, 'C', 0);

$fpdf->ln();
$fpdf->SetX(145);
$fpdf->SetFont('Helvetica', '', 9);
$fpdf->SetTextColor(124, 124, 124);
$fpdf->Cell(70, 5, 'FECHA DE EMISIÓN: '. $sale['date'], 0, 1, 'L', 0);

/*$fpdf->SetX(135);
$fpdf->SetFont('Helvetica', '', 8);
$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFillColor(54, 169, 225);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(70, 7, 'VALIDEZ: 10 días o hasta agotar stock', 'T', 1, 'C', 0);*/


$fpdf->SetY(63);
$fpdf->SetFont('Helvetica', '', 9);
$fpdf->SetTextColor(124, 124, 124);
$fpdf->SetX(11);
$fpdf->Write(5, 'Sr(a):');
$fpdf->ln(5);
$fpdf->SetX(11);
$fpdf->Write(5, 'Cliente: '.$sale['name_client']);
$fpdf->ln(5);
$fpdf->SetX(11);
$fpdf->Write(5, 'Telefono: '.$sale['phone']);
$fpdf->ln(5);
$fpdf->SetX(11);
$fpdf->Write(5, 'DNI: '. $sale['document_number']);
$fpdf->ln(5);
$fpdf->SetX(11);
$fpdf->Write(5, 'DIRECCIÓN COMERCIAL: '.$sale['direction']);


/*$fpdf->SetY(110);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->SetX(11);
$fpdf->Write(5, 'Estimados señores,');
$fpdf->ln(5);
$fpdf->SetX(11);
$fpdf->Write(5, 'De acuerdo a lo solicitado por ustedes, sometemos a consideración nuestra propuesta.'); */

$fpdf->ln(10);
$fpdf->SetFont('Helvetica', 'B', 8);
$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFillColor(44, 62, 80);
$fpdf->SetTextColor(255, 255, 255);
$fpdf->Cell(15, 10, 'ITEM', 1, 0, 'C', 1);
$fpdf->Cell(90, 10, 'DESCRIPCIÓN', 1, 0, 'C', 1);
$fpdf->Cell(25, 10, 'CANTIDAD', 1, 0, 'C', 1);
$fpdf->Cell(35, 10, 'VALOR', 1, 0, 'C', 1);
$fpdf->Cell(35, 10, 'TOTAL', 1, 0, 'C', 1);
$fpdf->ln();
$i = 1;

foreach ($details as $indice => $detail) {

	$fpdf->SetFillColor(236, 240, 241);

	$fpdf->SetDrawColor(255, 255, 255);
	$fpdf->SetFont('Helvetica', '', 8);
	$fpdf->SetTextColor(0, 0, 0);
	$fpdf->Cell(15, 7, "1", 1, 0, 'C', 1);
	$fpdf->Cell(90, 7, $detail['name'], 1, 0, 'C', 1);
	$fpdf->Cell(25, 7, $detail['qty'], 1, 0, 'C', 1);
	$fpdf->Cell(35, 7, 'S/ '.$detail['sale_price'], 1, 0, 'C', 1);
	$fpdf->Cell(35, 7, 'S/ '.$detail['total'], 1, 0, 'C', 1);

	$fpdf->ln();
	
}


$fpdf->SetFillColor(255, 255, 255);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(130, 5, '', 0, 0, 'L', 1);
$fpdf->SetFillColor(54, 169, 225);
$fpdf->SetTextColor(255, 255, 255);
$fpdf->Cell(35, 7, 'OP. INAFECTAS', 1, 0, 'C', 1);
$fpdf->Cell(35, 7, 'S/ '.$sale['sale_subtotal'], 1, 0, 'C', 1);
$fpdf->ln();

if($sale['tax'] != 0.00){


$fpdf->SetFillColor(255, 255, 255);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(130, 5, '', 0, 0, 'L', 1);
$fpdf->SetFillColor(54, 169, 225);
$fpdf->SetTextColor(255, 255, 255);
$fpdf->Cell(35, 7, 'IGV', 1, 0, 'C', 1);
$fpdf->Cell(35, 7, 'S/ '.$sale['tax'], 1, 0, 'C', 1);
$fpdf->ln();

}

if($sale['delivery'] == 1){
	$fpdf->SetFillColor(255, 255, 255);
	$fpdf->SetTextColor(0, 0, 0);
	$fpdf->Cell(130, 5, '', 0, 0, 'L', 1);
	$fpdf->SetFillColor(54, 169, 225);
	$fpdf->SetTextColor(255, 255, 255);
	$fpdf->Cell(35, 7, 'DELIVERY', 1, 0, 'C', 1);
	$fpdf->Cell(35, 7, 'S/ '.$sale['price_delivery'], 1, 0, 'C', 1);
	$fpdf->ln();
}

$fpdf->SetFillColor(255, 255, 255);
$fpdf->Cell(130, 5, '', 0, 0, 'L', 1);
$fpdf->SetFillColor(44, 62, 80);
$fpdf->SetTextColor(255, 255, 255);
$fpdf->Cell(35, 7, 'TOTAL', 1, 0, 'C', 1);
$fpdf->Cell(35, 7, 'S/ '.$sale['sale_total'], 1, 0, 'C', 1);


/* $fpdf->ln(15);
$fpdf->SetFont('Helvetica', 'B', 10);
$fpdf->SetFillColor(255, 255, 255);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(15, 0, '', 'T', 0, 'L', 1);
$fpdf->Cell(70, 0, 'Condiciones generales:', 'T', 1, 'L', 1);
$fpdf->ln(5); */








/* $fpdf->ln(30);
$fpdf->SetFont('Helvetica', 'B', 10);
$fpdf->SetFillColor(255, 255, 255);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(2, 0, '', 'T', 1, 'C', 1);
$fpdf->Cell(66, 0, 'Erick Millar', 'T', 0, 'C', 1);
$fpdf->Cell(66, 0, 'Ernesto Morsan', 'T', 0, 'C', 1);
$fpdf->Cell(66, 0, 'Blanca Soria', 'T', 0, 'C', 1);
$fpdf->ln(5);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->Cell(66, 0, 'Jefe de ventas', 'T', 0, 'C', 1);
$fpdf->Cell(66, 0, 'Jefe de Logística', 'T', 0, 'C', 1);
$fpdf->Cell(66, 0, 'Asesora comercial', 'T', 0, 'C', 1);
$fpdf->Cell(2, 0, '', 'T', 1, 'C', 1); */

$fpdf->Output('nota-venta-'.date('YmdHis').'.pdf', 'I');
$fpdf->OutPut();
