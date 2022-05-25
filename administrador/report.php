<?php
    require "config/conexion.php";
    require "model/reportModel.php";
    require 'vendor/autoload.php';

    $reports = new Reports();

    if(!isset($_GET['option'])){
        header("Location:main");
        exit;
    }

    $date = '';
    $month = '';
    $year = '';
    $startDate = '';
    $endDate = '';

    if(isset($_GET['date'])){
        $date = $_GET['date'];
    }

    if(isset($_GET['month'])){
        $month = $_GET['month'];
    }

    if(isset($_GET['year'])){
        $year = $_GET['year'];
    }

    if(isset($_GET['startDate'])){
        $startDate = $_GET['startDate'];
    }

    if(isset($_GET['endDate'])){
        $endDate = $_GET['endDate'];
    }

    $dollar = $reports->get_dollar();

    switch($_GET['option']){
        case 'report_daily':
            $report = $reports->report_daily($date);
            $title = "REPORTE DIARIO " . date("d-m-Y");
        break;
        case 'report_month':
            $report = $reports->report_month($month,$year);
            $title = "REPORTE MENSUAL " . date("d-m-Y");
        break;
        case 'report_custom':
            $report = $reports->report_custom($startDate,$endDate);
            $title = "REPORTE " . date("d-m-Y");
        break;
        default:
            header("Location:main");
        break;
    }


    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Style\Alignment;
    use PhpOffice\PhpSpreadsheet\Style\Color;
    use PhpOffice\PhpSpreadsheet\Style\Fill;
    use PhpOffice\PhpSpreadsheet\Style\Border;
    //use PhpOffice\PhpSpreadsheet\Worksheet\ColumnDimension;
    $tablehead = [

        "font" => [
            "color" => [
                "rgb" => "FFFFFF"
            ],
        ],
        "fill" => [
            "fillType" => Fill::FILL_SOLID,
            "startColor" => [
                "rgb" => "2C3E50"
            ],
        ],
        "borders" => [
            "allBorders" => [
                "borderStyle" => Border::BORDER_THIN,
                "color" => ["rgb" => "000000"],
            ],
        ],
        "alignment" =>[
            "horizontal" => "center",
            "vertical" => "center",
        ],
        
    ]; 
    
    $tablebody = [

        "font" => [
            "color" => [
                "rgb" => "000000"
            ],
        ],
        "fill" => [
            "fillType" => Fill::FILL_SOLID,
            "startColor" => [
                "rgb" => "FFFFFF"
            ],
        ],
        "borders" => [
            "allBorders" => [
                "borderStyle" => Border::BORDER_THIN,
                "color" => ["rgb" => "000000"],
            ],
        ],
        "alignment" =>[
            "horizontal" => "center",
            "vertical" => "center",
        ],
        
    ]; 

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    $drawing->setName('Paid');
    $drawing->setDescription('Paid');
    $drawing->setPath('assets/images/logo.png'); /* put your path and image here */
    $drawing->setCoordinates('A1');
    $drawing->setOffsetY(10);
    $drawing->setOffsetX(10);
    $drawing->setWidth(150);
    //$drawing->setRotation(25);
    //$drawing->getShadow()->setVisible(true);
    //$drawing->getShadow()->setDirection(45);
    $drawing->setWorksheet($spreadsheet->getActiveSheet());

    $sheet->getColumnDimension('A')->setWidth(30);
    $sheet->getColumnDimension('B')->setWidth(20);
    $sheet->getColumnDimension('C')->setWidth(15);
    $sheet->getColumnDimension('D')->setWidth(40);
    $sheet->getColumnDimension('E')->setWidth(15);
    $sheet->getColumnDimension('F')->setWidth(20);
    $sheet->getColumnDimension('G')->setWidth(15);
    $sheet->getColumnDimension('H')->setWidth(15);
    $sheet->getColumnDimension('I')->setWidth(15);
    $sheet->getColumnDimension('J')->setWidth(40);
    $sheet->getColumnDimension('K')->setWidth(15);
    $sheet->getColumnDimension('L')->setWidth(15);
    $sheet->getColumnDimension('M')->setWidth(20);
    $sheet->getRowDimension('6')->setRowHeight(40);   
    $sheet->setCellValue('F3', $title);
    $sheet->setCellValue('A6', 'Compro');
    $sheet->setCellValue('B6', 'Fecha');
    $sheet->setCellValue('C6', 'Marca');
    $sheet->setCellValue('D6', 'Nombre');
    $sheet->setCellValue('E6', 'Cantidad');
    $sheet->setCellValue('F6', 'PVP (S/.)');
    $sheet->setCellValue('G6', 'En dolares ($)');
    $sheet->setCellValue('H6', 'Costo ($)');
    $sheet->setCellValue('I6', 'Ganancia ($)');
    $sheet->setCellValue('J6', 'Cliente');
    $sheet->setCellValue('K6', 'Número');
    $sheet->setCellValue('L6', 'Contacto');
    $sheet->setCellValue('M6', 'Forma de pago');

    $sheet->getStyle('A6:M6')->getFont()->setSize('14');
    $sheet->getStyle('F3:G3')->getFont()->setSize('24');
    $sheet->getStyle('F3:G3')->getFont()->setBold(true);
    $sheet->getStyle('A6:M6')->getFont()->setBold(true);
    $sheet->getStyle('A6:M6')->applyFromArray($tablehead);

    $i = 7;
    foreach ($report as $r){

        $sheet->getStyle('A'.$i.':'.'M'.$i)->applyFromArray($tablebody);
        $sheet->getRowDimension($i)->setRowHeight(20); 
        $pvp = $r['qty'] * $r['sale_price'];
        $indollar = $pvp / $dollar;
        $charge = $r['qty'] * $r['purchase_price'];
        $gain = $indollar - $charge;


        $sheet->setCellValue('A'.$i, $r['shopper']);
        $sheet->setCellValue('B'.$i, $r['created_at']);
        $sheet->setCellValue('C'.$i, $r['brand']);
        $sheet->setCellValue('D'.$i, $r['name_article']);
        $sheet->setCellValue('E'.$i, $r['qty']);
        $sheet->setCellValue('F'.$i, number_format($pvp,2));
        $sheet->setCellValue('G'.$i, number_format($indollar,2));
        $sheet->setCellValue('H'.$i, number_format($charge,2));
        $sheet->setCellValue('I'.$i, number_format($gain,2));
        $sheet->setCellValue('J'.$i, $r['name']);
        $sheet->setCellValue('K'.$i, $r['phone']);
        $sheet->setCellValue('L'.$i, $r['contact']);
        $sheet->setCellValue('M'.$i, $r['contact']);
        $i++;
    }

    
    $nombreDelDocumento = "Reporte-". date('Y-m-d-His').".xlsx";
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
    header('Cache-Control: max-age=0');
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    exit;
    