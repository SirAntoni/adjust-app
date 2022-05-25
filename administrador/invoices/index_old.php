<?php
session_start();
require "../config/conexion.php";
require "../model/modelAlumnos.php";


$alumnos = new Alumnos();
$idalumno = $_GET['id'];
$idsede = $_SESSION['id_sede'];
$datos_personales = $alumnos->get_alumnosxsede_xid($idalumno, $idsede);
$registros = $alumnos->registro_alumnos($idalumno, $idsede);

$nombres_apellidos = $datos_personales[0]['nombres_apellidos_alumno'];
$nombre_sede = substr($datos_personales[0]['nombre_sede'],8);
$nombre_promocion = $datos_personales[0]['nombre_promocion'];
$direccion_alumno = $datos_personales[0]['direccion_alumno'];
$grado_estudio_alumno = $datos_personales[0]['grado_estudio_alumno'];
$celular_alumno = $datos_personales[0]['celular_alumno'];
$email_alumno = $datos_personales[0]['email_alumno'];
$dni_alumno = $datos_personales[0]['dni_alumno'];
$nombre_especialidad = $datos_personales[0]['nombre_especialidad'];
$fecha_nacimiento = $datos_personales[0][5];
$fecha_inscripcion = $datos_personales[0][11];


if($datos_personales[0]['foto_alumno'] == ''){
    if($datos_personales[0]['genero'] == 'Masculino' || $datos_personales[0]['genero'] == ''){
        $foto = 'masculino.jpg';
    }
    if($datos_personales[0]['genero'] == 'Femenino'){
        $foto = 'femenino.jpg';
    }
}else{
    $foto = $datos_personales[0]['foto_alumno'];
}


if(isset($registros[0]['numero_boleta_matricula'])){
    $numero_boleta_matricula = $registros[0]['numero_boleta_matricula'];
}else{
    $numero_boleta_matricula = '-';
}

if(isset($registros[0]['numero_boleta_m1'])){
    $numero_boleta_m1 = $registros[0]['numero_boleta_m1'];
}else{
    $numero_boleta_m1 = '-';
}

if(isset($registros[0]['numero_boleta_m2'])){
    $numero_boleta_m2 = $registros[0]['numero_boleta_m2'];
}else{
    $numero_boleta_m2 = '-';
}

if(isset($registros[0]['numero_boleta_m3'])){
    $numero_boleta_m3 = $registros[0]['numero_boleta_m3'];
}else{
    $numero_boleta_m3 = '-';
}


if(isset($registros[0]['numero_boleta_m4'])){
    $numero_boleta_m4 = $registros[0]['numero_boleta_m4'];
}else{
    $numero_boleta_m4 = '-';
}

if(isset($registros[0]['numero_boleta_m5'])){
    $numero_boleta_m5 = $registros[0]['numero_boleta_m5'];
}else{
    $numero_boleta_m5 = '-';
}


if(isset($registros[0]['numero_boleta_m6'])){
    $numero_boleta_m6 = $registros[0]['numero_boleta_m6'];
}else{
    $numero_boleta_m6 = '-';
}


if(isset($registros[0]['numero_voucher_matricula'])){
    $numero_voucher_matricula = $registros[0]['numero_voucher_matricula'];
}else{
    $numero_voucher_matricula = '-';
}

if(isset($registros[0]['numero_voucher_m1'])){
    $numero_voucher_m1 = $registros[0]['numero_voucher_m1'];
}else{
    $numero_voucher_m1 = '-';
}

if(isset($registros[0]['numero_voucher_m2'])){
    $numero_voucher_m2 = $registros[0]['numero_voucher_m2'];
}else{
    $numero_voucher_m2 = '-';
}

if(isset($registros[0]['numero_voucher_m3'])){
    $numero_voucher_m3 = $registros[0]['numero_voucher_m3'];
}else{
    $numero_voucher_m3 = '-';
}

if(isset($registros[0]['numero_voucher_m4'])){
    $numero_voucher_m4 = $registros[0]['numero_voucher_m4'];
}else{
    $numero_voucher_m4 = '-';
}

if(isset($registros[0]['numero_voucher_m5'])){
    $numero_voucher_m5 = $registros[0]['numero_voucher_m5'];
}else{
    $numero_voucher_m5 = '-';
}

if(isset($registros[0]['numero_voucher_m6'])){
    $numero_voucher_m6 = $registros[0]['numero_voucher_m6'];
}else{
    $numero_voucher_m6 = '-';
}

if(isset($registros[0]['monto_matricula'])){
    if($registros[0]['monto_matricula'] == 0.00){
        $monto_matricula = '-';
    }else{
        $monto_matricula = 'S/ '.$registros[0]['monto_matricula'];
    }
}else{
    $monto_matricula = '-';
}


if(isset($registros[0]['monto_m1'])){
    if($registros[0]['monto_m1'] == 0.00){
        $monto_m1 = '-';
    }else{
        $monto_m1 = 'S/ '.$registros[0]['monto_m1'];
    }
}else{
    $monto_m1 = '-';
}

if(isset($registros[0]['monto_m2'])){
    if($registros[0]['monto_m2'] == 0.00){
        $monto_m2 = '-';
    }else{
        $monto_m2 = 'S/ '.$registros[0]['monto_m2'];
    }
}else{
    $monto_m2 = '-';
}

if(isset($registros[0]['monto_m3'])){
    if($registros[0]['monto_m3'] == 0.00){
        $monto_m3 = '-';
    }else{
        $monto_m3 = 'S/ '.$registros[0]['monto_m3'];
    }
}else{
    $monto_m3 = '-';
}

if(isset($registros[0]['monto_m4'])){
    if($registros[0]['monto_m4'] == 0.00){
        $monto_m4 = '-';
    }else{
        $monto_m4 = 'S/ '.$registros[0]['monto_m4'];
    }
}else{
    $monto_m4 = '-';
}

if(isset($registros[0]['monto_m5'])){
    if($registros[0]['monto_m5'] == 0.00){
        $monto_m5 = '-';
    }else{
        $monto_m5 = 'S/ '.$registros[0]['monto_m5'];
    }
}else{
    $monto_m5 = '-';
}


if(isset($registros[0]['monto_m6'])){
    if($registros[0]['monto_m6'] == 0.00){
        $monto_m6 = '-';
    }else{
        $monto_m6 = 'S/ '.$registros[0]['monto_m6'];
    }
}else{
    $monto_m6 = '-';
}


if(isset($registros[0]['nota_m1'])){
    if($registros[0]['nota_m1'] == '0'){
        $nota_m1 = '-';
    }else{
        $nota_m1 = $registros[0]['nota_m1'];
    }
}else{
    $nota_m1 = '-';
}

if(isset($registros[0]['nota_m2'])){
    if($registros[0]['nota_m2'] == '0'){
        $nota_m2 = '-';
    }else{
        $nota_m2 = $registros[0]['nota_m2'];
    }
}else{
    $nota_m2 = '-';
}

if(isset($registros[0]['nota_m3'])){
    if($registros[0]['nota_m3'] == '0'){
        $nota_m3 = '-';
    }else{
        $nota_m3 = $registros[0]['nota_m3'];
    }
}else{
    $nota_m3 = '-';
}

if(isset($registros[0]['nota_m4'])){
    if($registros[0]['nota_m4'] == '0'){
        $nota_m4 = '-';
    }else{
        $nota_m4 = $registros[0]['nota_m4'];
    }
}else{
    $nota_m4 = '-';
}


if(isset($registros[0]['nota_m5'])){
    if($registros[0]['nota_m5'] == '0'){
        $nota_m5 = '-';
    }else{
        $nota_m5 = $registros[0]['nota_m5'];
    }
}else{
    $nota_m5 = '-';
}


if(isset($registros[0]['nota_m6'])){
    if($registros[0]['nota_m6'] == '0'){
        $nota_m6 = '-';
    }else{
        $nota_m6 = $registros[0]['nota_m6'];
    }
}else{
    $nota_m6 = '-';
}

if(isset($registros[0]['asistencia_matricula'])){
    if($registros[0]['asistencia_matricula'] == '-'){
        $asistencia_matricula = '-';
    }else{
        $asistencia_matricula = $registros[0]['asistencia_matricula'];
    }
}else{
    $asistencia_matricula = '-';
}

if(isset($registros[0]['asistencia_m1'])){
    if($registros[0]['asistencia_m1'] == '-'){
        $asistencia_m1 = '-';
    }else{
        $asistencia_m1 = $registros[0]['asistencia_m1'];
    }
}else{
    $asistencia_m1 = '-';
}

if(isset($registros[0]['asistencia_m2'])){
    if($registros[0]['asistencia_m2'] == '-'){
        $asistencia_m2 = '-';
    }else{
        $asistencia_m2 = $registros[0]['asistencia_m2'];
    }
}else{
    $asistencia_m2 = '-';
}


if(isset($registros[0]['asistencia_m3'])){
    if($registros[0]['asistencia_m3'] == '-'){
        $asistencia_m3 = '-';
    }else{
        $asistencia_m3= $registros[0]['asistencia_m3'];
    }
}else{
    $asistencia_m3 = '-';
}


if(isset($registros[0]['asistencia_m4'])){
    if($registros[0]['asistencia_m4'] == '-'){
        $asistencia_m4 = '-';
    }else{
        $asistencia_m4 = $registros[0]['asistencia_m4'];
    }
}else{
    $asistencia_m4 = '-';
}


if(isset($registros[0]['asistencia_m5'])){
    if($registros[0]['asistencia_m5'] == '-'){
        $asistencia_m5 = '-';
    }else{
		$asistencia_m5 = $registros[0]['asistencia_m5'];
    }
}else{
    $asistencia_m5 = '-';
}


if(isset($registros[0]['asistencia_m6'])){
    if($registros[0]['asistencia_m6'] == '-'){
        $asistencia_m6 = '-';
    }else{
        $asistencia_m6 = $registros[0]['asistencia_m6'];
    }
}else{
    $asistencia_m6 = '-';
}


if(isset($registros[0][9])){
    if($registros[0][9] == '00-00-0000'){
        $fecha_matricula = '-';
    }else{
        $fecha_matricula = $registros[0][9];
    }
}else{
    $fecha_matricula = '-';
}

if(isset($registros[0][18])){
    if($registros[0][18] == '00-00-0000'){
        $fecha_m1 = '-';
    }else{
        $fecha_m1 = $registros[0][18];
    }
}else{
    $fecha_m1 = '-';
}

if(isset($registros[0][27])){
    if($registros[0][27] == '00-00-0000'){
        $fecha_m2 = '-';
    }else{
        $fecha_m2 = $registros[0][27];
    }
}else{
    $fecha_m2 = '-';
}


if(isset($registros[0][36])){
    if($registros[0][36] == '00-00-0000'){
        $fecha_m3 = '-';
    }else{
        $fecha_m3 = $registros[0][36];
    }
}else{
    $fecha_m3 = '-';
}


if(isset($registros[0][45])){
    if($registros[0][45] == '00-00-0000'){
        $fecha_m4 = '-';
    }else{
        $fecha_m4 = $registros[0][45];
    }
}else{
    $fecha_m4 = '-';
}


if(isset($registros[0][54])){
    if($registros[0][54] == '00-00-0000'){
        $fecha_m5 = '-';
    }else{
        $fecha_m5 = $registros[0][54];
    }
}else{
    $fecha_m5 = '-';
}

if(isset($registros[0][63])){
    if($registros[0][63] == '00-00-0000'){
        $fecha_m6 = '-';
    }else{
        $fecha_m6 = $registros[0][63];
    }
}else{
    $fecha_m6 = '-';
}


/* --------------------- */

if(isset($registros[0]['numero_boleta_csp'])){
    $numero_boleta_csp = $registros[0]['numero_boleta_csp'];
}else{
    $numero_boleta_csp = '-';
}

if(isset($registros[0]['numero_boleta_epp'])){
    $numero_boleta_epp = $registros[0]['numero_boleta_epp'];
}else{
    $numero_boleta_epp = '-';
}

if(isset($registros[0]['numero_boleta_p1'])){
    $numero_boleta_p1 = $registros[0]['numero_boleta_p1'];
}else{
    $numero_boleta_p1 = '-';
}

if(isset($registros[0]['numero_boleta_p2'])){
    $numero_boleta_p2 = $registros[0]['numero_boleta_p2'];
}else{
    $numero_boleta_p2 = '-';
}


if(isset($registros[0]['numero_boleta_p3'])){
    $numero_boleta_p3 = $registros[0]['numero_boleta_p3'];
}else{
    $numero_boleta_p3 = '-';
}

if(isset($registros[0]['numero_boleta_p4'])){
    $numero_boleta_p4 = $registros[0]['numero_boleta_p4'];
}else{
    $numero_boleta_p4 = '-';
}


if(isset($registros[0]['numero_boleta_p5'])){
    $numero_boleta_p5 = $registros[0]['numero_boleta_p5'];
}else{
    $numero_boleta_p5 = '-';
}


if(isset($registros[0]['numero_voucher_csp'])){
    $numero_voucher_csp = $registros[0]['numero_voucher_csp'];
}else{
    $numero_voucher_csp = '-';
}

if(isset($registros[0]['numero_voucher_epp'])){
    $numero_voucher_epp = $registros[0]['numero_voucher_epp'];
}else{
    $numero_voucher_epp = '-';
}

if(isset($registros[0]['numero_voucher_p1'])){
    $numero_voucher_p1 = $registros[0]['numero_voucher_p1'];
}else{
    $numero_voucher_p1 = '-';
}

if(isset($registros[0]['numero_voucher_p2'])){
    $numero_voucher_p2 = $registros[0]['numero_voucher_p2'];
}else{
    $numero_voucher_p2 = '-';
}

if(isset($registros[0]['numero_voucher_p3'])){
    $numero_voucher_p3 = $registros[0]['numero_voucher_p3'];
}else{
    $numero_voucher_p3 = '-';
}

if(isset($registros[0]['numero_voucher_p4'])){
    $numero_voucher_p4 = $registros[0]['numero_voucher_p4'];
}else{
    $numero_voucher_p4 = '-';
}

if(isset($registros[0]['numero_voucher_p5'])){
    $numero_voucher_p5 = $registros[0]['numero_voucher_p5'];
}else{
    $numero_voucher_p5 = '-';
}

if(isset($registros[0]['monto_csp'])){
    if($registros[0]['monto_csp'] == 0.00){
        $monto_csp = '-';
    }else{
        $monto_csp = 'S/ '.$registros[0]['monto_csp'];
    }
}else{
    $monto_csp = '-';
}


if(isset($registros[0]['monto_epp'])){
    if($registros[0]['monto_epp'] == 0.00){
        $monto_epp = '-';
    }else{
        $monto_epp = 'S/ '.$registros[0]['monto_epp'];
    }
}else{
    $monto_epp = '-';
}

if(isset($registros[0]['monto_p1'])){
    if($registros[0]['monto_p1'] == 0.00){
        $monto_p1 = '-';
    }else{
        $monto_p1 = 'S/ '.$registros[0]['monto_p1'];
    }
}else{
    $monto_p1 = '-';
}

if(isset($registros[0]['monto_p2'])){
    if($registros[0]['monto_p2'] == 0.00){
        $monto_p2 = '-';
    }else{
        $monto_p2 = 'S/ '.$registros[0]['monto_p2'];
    }
}else{
    $monto_p2 = '-';
}

if(isset($registros[0]['monto_p3'])){
    if($registros[0]['monto_p3'] == 0.00){
        $monto_p3 = '-';
    }else{
        $monto_p3 = 'S/ '.$registros[0]['monto_p3'];
    }
}else{
    $monto_p3 = '-';
}

if(isset($registros[0]['monto_p4'])){
    if($registros[0]['monto_p4'] == 0.00){
        $monto_p4 = '-';
    }else{
        $monto_p4 = 'S/ '.$registros[0]['monto_p4'];
    }
}else{
    $monto_p4 = '-';
}

if(isset($registros[0]['monto_p5'])){
    if($registros[0]['monto_p5'] == 0.00){
        $monto_p5 = '-';
    }else{
        $monto_p5 = 'S/ '.$registros[0]['monto_p5'];
    }
}else{
    $monto_p5 = '-';
}


if(isset($registros[0]['monto_m6'])){
    if($registros[0]['monto_m6'] == 0.00){
        $monto_m6 = '-';
    }else{
        $monto_m6 = 'S/ '.$registros[0]['monto_m6'];
    }
}else{
    $monto_m6 = '-';
}


if(isset($registros[0]['nota_csp'])){
    if($registros[0]['nota_csp'] == '0'){
        $nota_csp = '-';
    }else{
        $nota_csp = $registros[0]['nota_csp'];
    }
}else{
    $nota_csp = '-';
}

if(isset($registros[0]['nota_epp'])){
    if($registros[0]['nota_epp'] == '0'){
        $nota_epp = '-';
    }else{
        $nota_epp = $registros[0]['nota_epp'];
    }
}else{
    $nota_epp = '-';
}

if(isset($registros[0]['nota_p1'])){
    if($registros[0]['nota_p1'] == '0'){
        $nota_p1 = '-';
    }else{
        $nota_p1 = $registros[0]['nota_p1'];
    }
}else{
    $nota_p1 = '-';
}

if(isset($registros[0]['nota_p2'])){
    if($registros[0]['nota_p2'] == '0'){
        $nota_p2 = '-';
    }else{
        $nota_p2 = $registros[0]['nota_p2'];
    }
}else{
    $nota_p2 = '-';
}


if(isset($registros[0]['nota_p3'])){
    if($registros[0]['nota_p3'] == '0'){
        $nota_p3 = '-';
    }else{
        $nota_p3 = $registros[0]['nota_p3'];
    }
}else{
    $nota_p3 = '-';
}


if(isset($registros[0]['nota_p4'])){
    if($registros[0]['nota_p4'] == '0'){
        $nota_p4 = '-';
    }else{
        $nota_p4 = $registros[0]['nota_p4'];
    }
}else{
    $nota_p4 = '-';
}

if(isset($registros[0]['nota_p5'])){
    if($registros[0]['nota_p5'] == '0'){
        $nota_p5 = '-';
    }else{
        $nota_p5 = $registros[0]['nota_p5'];
    }
}else{
    $nota_p5 = '-';
}

if(isset($registros[0]['asistencia_csp'])){
    if($registros[0]['asistencia_csp'] == '-'){
        $asistencia_csp = '-';
    }else{
        $asistencia_csp = $registros[0]['asistencia_csp'];
    }
}else{
    $asistencia_csp = '-';
}

if(isset($registros[0]['asistencia_epp'])){
    if($registros[0]['asistencia_epp'] == '-'){
        $asistencia_epp = '-';
    }else{
        $asistencia_epp = $registros[0]['asistencia_epp'];
    }
}else{
    $asistencia_epp = '-';
}

if(isset($registros[0]['asistencia_p1'])){
    if($registros[0]['asistencia_p1'] == '-'){
        $asistencia_p1 = '-';
    }else{
        $asistencia_p1 = $registros[0]['asistencia_p1'];
    }
}else{
    $asistencia_p1 = '-';
}


if(isset($registros[0]['asistencia_p2'])){
    if($registros[0]['asistencia_p2'] == '-'){
        $asistencia_p2 = '-';
    }else{
		$asistencia_p2 = $registros[0]['asistencia_p2'];
    }
}else{
    $asistencia_p2 = '-';
}


if(isset($registros[0]['asistencia_p3'])){
    if($registros[0]['asistencia_p3'] == '-'){
        $asistencia_p3 = '-';
    }else{
        $asistencia_p3 = $registros[0]['asistencia_p3'];
    }
}else{
    $asistencia_p3 = '-';
}


if(isset($registros[0]['asistencia_p4'])){
    if($registros[0]['asistencia_p4'] == '-'){
        $asistencia_p4 = '-';
    }else{
        $asistencia_p4 = $registros[0]['asistencia_p4'];
    }
}else{
    $asistencia_p4 = '-';
}


if(isset($registros[0]['asistencia_p5'])){
    if($registros[0]['asistencia_p5'] == '-'){
        $asistencia_p5 = '-';
    }else{
        $asistencia_p5 = $registros[0]['asistencia_p5'];
    }
}else{
    $asistencia_p5 = '-';
}


if(isset($registros[0][72])){
    if($registros[0][72] == '00-00-0000'){
        $fecha_csp = '-';
    }else{
        $fecha_csp = $registros[0][72];
    }
}else{
    $fecha_csp = '-';
}

if(isset($registros[0][81])){
    if($registros[0][81] == '00-00-0000'){
        $fecha_epp = '-';
    }else{
        $fecha_epp = $registros[0][81];
    }
}else{
    $fecha_epp = '-';
}

if(isset($registros[0][90])){
    if($registros[0][90] == '00-00-0000'){
        $fecha_p1 = '-';
    }else{
        $fecha_p1 = $registros[0][90];
    }
}else{
    $fecha_p1 = '-';
}


if(isset($registros[0][99])){
    if($registros[0][99] == '00-00-0000'){
        $fecha_p2 = '-';
    }else{
        $fecha_p2 = $registros[0][99];
    }
}else{
    $fecha_p2 = '-';
}


if(isset($registros[0][108])){
    if($registros[0][108] == '00-00-0000'){
        $fecha_p3 = '-';
    }else{
        $fecha_p3 = $registros[0][108];
    }
}else{
    $fecha_p3 = '-';
}


if(isset($registros[0][117])){
    if($registros[0][117] == '00-00-0000'){
        $fecha_p4 = '-';
    }else{
        $fecha_p4 = $registros[0][117];
    }
}else{
    $fecha_p4 = '-';
}

if(isset($registros[0][126])){
    if($registros[0][126] == '00-00-0000'){
        $fecha_p5 = '-';
    }else{
        $fecha_p5 = $registros[0][126];
    }
}else{
    $fecha_p5 = '-';
}


/* --------- */

if(isset($registros[0]['numero_boleta_p6'])){
    $numero_boleta_p6 = $registros[0]['numero_boleta_p6'];
}else{
    $numero_boleta_p6 = '-';
}

if(isset($registros[0]['numero_boleta_p7'])){
    $numero_boleta_p7 = $registros[0]['numero_boleta_p7'];
}else{
    $numero_boleta_p7 = '-';
}

if(isset($registros[0]['numero_boleta_p8'])){
    $numero_boleta_p8 = $registros[0]['numero_boleta_p8'];
}else{
    $numero_boleta_p8 = '-';
}

if(isset($registros[0]['numero_boleta_p9'])){
    $numero_boleta_p9 = $registros[0]['numero_boleta_p9'];
}else{
    $numero_boleta_p9 = '-';
}


if(isset($registros[0]['numero_boleta_p10'])){
    $numero_boleta_p10 = $registros[0]['numero_boleta_p10'];
}else{
    $numero_boleta_p10 = '-';
}

if(isset($registros[0]['numero_boleta_pa'])){
    $numero_boleta_pa = $registros[0]['numero_boleta_pa'];
}else{
    $numero_boleta_pa = '-';
}


if(isset($registros[0]['numero_boleta_cc'])){
    $numero_boleta_cc = $registros[0]['numero_boleta_cc'];
}else{
    $numero_boleta_cc = '-';
}


if(isset($registros[0]['numero_voucher_p6'])){
    $numero_voucher_p6 = $registros[0]['numero_voucher_p6'];
}else{
    $numero_voucher_p6 = '-';
}

if(isset($registros[0]['numero_voucher_p7'])){
    $numero_voucher_p7 = $registros[0]['numero_voucher_p7'];
}else{
    $numero_voucher_p7 = '-';
}

if(isset($registros[0]['numero_voucher_p8'])){
    $numero_voucher_p8 = $registros[0]['numero_voucher_p8'];
}else{
    $numero_voucher_p8 = '-';
}

if(isset($registros[0]['numero_voucher_p9'])){
    $numero_voucher_p9 = $registros[0]['numero_voucher_p9'];
}else{
    $numero_voucher_p9 = '-';
}

if(isset($registros[0]['numero_voucher_p10'])){
    $numero_voucher_p10 = $registros[0]['numero_voucher_p10'];
}else{
    $numero_voucher_p10 = '-';
}

if(isset($registros[0]['numero_voucher_pa'])){
    $numero_voucher_pa = $registros[0]['numero_voucher_pa'];
}else{
    $numero_voucher_pa = '-';
}

if(isset($registros[0]['numero_voucher_cc'])){
    $numero_voucher_cc = $registros[0]['numero_voucher_cc'];
}else{
    $numero_voucher_cc = '-';
}

if(isset($registros[0]['monto_p6'])){
    if($registros[0]['monto_p6'] == 0.00){
        $monto_p6 = '-';
    }else{
        $monto_p6 = 'S/ '.$registros[0]['monto_p6'];
    }
}else{
    $monto_p6 = '-';
}


if(isset($registros[0]['monto_p7'])){
    if($registros[0]['monto_p7'] == 0.00){
        $monto_p7 = '-';
    }else{
        $monto_p7 = 'S/ '.$registros[0]['monto_p7'];
    }
}else{
    $monto_p7 = '-';
}

if(isset($registros[0]['monto_p8'])){
    if($registros[0]['monto_p8'] == 0.00){
        $monto_p8 = '-';
    }else{
        $monto_p8 = 'S/ '.$registros[0]['monto_p8'];
    }
}else{
    $monto_p8 = '-';
}

if(isset($registros[0]['monto_p9'])){
    if($registros[0]['monto_p9'] == 0.00){
        $monto_p9 = '-';
    }else{
        $monto_p9 = 'S/ '.$registros[0]['monto_p9'];
    }
}else{
    $monto_p9 = '-';
}

if(isset($registros[0]['monto_p10'])){
    if($registros[0]['monto_p10'] == 0.00){
        $monto_p10 = '-';
    }else{
        $monto_p10 = 'S/ '.$registros[0]['monto_p10'];
    }
}else{
    $monto_p10 = '-';
}

if(isset($registros[0]['monto_pa'])){
    if($registros[0]['monto_pa'] == 0.00){
        $monto_pa = '-';
    }else{
        $monto_pa = 'S/ '.$registros[0]['monto_pa'];
    }
}else{
    $monto_pa = '-';
}

if(isset($registros[0]['monto_cc'])){
    if($registros[0]['monto_cc'] == 0.00){
        $monto_cc = '-';
    }else{
        $monto_cc = 'S/ '.$registros[0]['monto_cc'];
    }
}else{
    $monto_cc = '-';
}




if(isset($registros[0]['nota_p6'])){
    if($registros[0]['nota_p6'] == '0'){
        $nota_p6 = '-';
    }else{
        $nota_p6 = $registros[0]['nota_p6'];
    }
}else{
    $nota_p6 = '-';
}

if(isset($registros[0]['nota_p7'])){
    if($registros[0]['nota_p7'] == '0'){
        $nota_p7 = '-';
    }else{
        $nota_p7 = $registros[0]['nota_p7'];
    }
}else{
    $nota_p7 = '-';
}

if(isset($registros[0]['nota_p8'])){
    if($registros[0]['nota_p8'] == '0'){
        $nota_p8 = '-';
    }else{
        $nota_p8 = $registros[0]['nota_p8'];
    }
}else{
    $nota_p8 = '-';
}

if(isset($registros[0]['nota_p9'])){
    if($registros[0]['nota_p9'] == '0'){
        $nota_p9 = '-';
    }else{
        $nota_p9 = $registros[0]['nota_p9'];
    }
}else{
    $nota_p9 = '-';
}


if(isset($registros[0]['nota_p10'])){
    if($registros[0]['nota_p10'] == '0'){
        $nota_p10 = '-';
    }else{
        $nota_p10 = $registros[0]['nota_p10'];
    }
}else{
    $nota_p10 = '-';
}


if(isset($registros[0]['nota_pa'])){
    if($registros[0]['nota_pa'] == '0'){
        $nota_pa = '-';
    }else{
        $nota_pa = $registros[0]['nota_pa'];
    }
}else{
    $nota_pa = '-';
}

if(isset($registros[0]['nota_cc'])){
    if($registros[0]['nota_cc'] == '0'){
        $nota_cc = '-';
    }else{
        $nota_cc = $registros[0]['nota_cc'];
    }
}else{
    $nota_cc = '-';
}

if(isset($registros[0]['asistencia_p6'])){
    if($registros[0]['asistencia_p6'] == '-'){
        $asistencia_p6 = '-';
    }else{
        $asistencia_p6 = $registros[0]['asistencia_p6'];
    }
}else{
    $asistencia_p6 = '-';
}

if(isset($registros[0]['asistencia_p7'])){
    if($registros[0]['asistencia_p7'] == '-'){
        $asistencia_p7 = '-';
    }else{
        $asistencia_p7 = $registros[0]['asistencia_p7'];
    }
}else{
    $asistencia_p7 = '-';
}

if(isset($registros[0]['asistencia_p8'])){
    if($registros[0]['asistencia_p8'] == '-'){
        $asistencia_p8 = '-';
    }else{
        $asistencia_p8 = $registros[0]['asistencia_p8'];
    }
}else{
    $asistencia_p8 = '-';
}


if(isset($registros[0]['asistencia_p9'])){
    if($registros[0]['asistencia_p9'] == '-'){
        $asistencia_p9 = '-';
    }else{
        $asistencia_p9 = $registros[0]['asistencia_p9'];
    }
}else{
    $asistencia_p9 = '-';
}


if(isset($registros[0]['asistencia_p10'])){
    if($registros[0]['asistencia_p10'] == '-'){
        $asistencia_p10 = '-';
    }else{
        $asistencia_p10 = $registros[0]['asistencia_p10'];
    }
}else{
    $asistencia_p10 = '-';
}


if(isset($registros[0]['asistencia_pa'])){
    if($registros[0]['asistencia_pa'] == '-'){
        $asistencia_pa = '-';
    }else{
        $asistencia_pa = $registros[0]['asistencia_pa'];
    }
}else{
    $asistencia_pa = '-';
}


if(isset($registros[0]['asistencia_cc'])){
    if($registros[0]['asistencia_cc'] == '-'){
        $asistencia_cc = '-';
    }else{
        $asistencia_cc = $registros[0]['asistencia_cc'];
    }
}else{
    $asistencia_cc = '-';
}


if(isset($registros[0][135])){
    if($registros[0][135] == '00-00-0000'){
        $fecha_p6 = '-';
    }else{
        $fecha_p6 = $registros[0][135];
    }
}else{
    $fecha_p6 = '-';
}

if(isset($registros[0][144])){
    if($registros[0][144] == '00-00-0000'){
        $fecha_p7 = '-';
    }else{
        $fecha_p7 = $registros[0][144];
    }
}else{
    $fecha_p7 = '-';
}

if(isset($registros[0][153])){
    if($registros[0][153] == '00-00-0000'){
        $fecha_p8 = '-';
    }else{
        $fecha_p8 = $registros[0][153];
    }
}else{
    $fecha_p8 = '-';
}


if(isset($registros[0][162])){
    if($registros[0][162] == '00-00-0000'){
        $fecha_p9 = '-';
    }else{
        $fecha_p9 = $registros[0][162];
    }
}else{
    $fecha_p9 = '-';
}


if(isset($registros[0][171])){
    if($registros[0][171] == '00-00-0000'){
        $fecha_p10 = '-';
    }else{
        $fecha_p10 = $registros[0][171];
    }
}else{
    $fecha_p10 = '-';
}


if(isset($registros[0][180])){
    if($registros[0][180] == '00-00-0000'){
        $fecha_pa = '-';
    }else{
        $fecha_pa = $registros[0][180];
    }
}else{
    $fecha_pa = '-';
}

if(isset($registros[0][189])){
    if($registros[0][189] == '00-00-0000'){
        $fecha_cc = '-';
    }else{
        $fecha_cc = $registros[0][189];
    }
}else{
    $fecha_cc = '-';
}

/*  if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$cotizacion = $cotizaciones->cotizacionesxid($id);
	$detalle = $cotizaciones->detallecot($id);
	$numero = $cotizacion[0]['numerosolicitud'];
	$email = $cotizacion[0]['emailsolicitud'];
	$cliente = $cotizacion[0]['clientesolicitud'];
	$telefono = $cotizacion[0]['telefonosolicitud'];
	$tindentificacion = $cotizacion[0]['tidentificacion'];
	$identificacion = $cotizacion[0]['identificacion'];
	$direccion = $cotizacion[0]['direccionsolicitud'];
	$fecha = $cotizacion[0]['fechasolicitud'];
	$granTotal = $cotizacion[0]['totalsolicitud'];
	$granIgv = $cotizacion[0]['igvsolicitud'];
	$granSubtotal = $cotizacion[0]['subtotalsolicitud'];
} else {
	header("Location:../index.php");
	exit;
}
 */



require('controller/fpdf.php');

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

$fpdf->Image('../assets/images/logo.png', 10, 5, 30);
$fpdf->Image('../assets/images/'.$foto, 175, 20, 30);


$fpdf->ln(10);
$fpdf->SetX(75);
$fpdf->SetFont('Helvetica', 'B', 14);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(70, 5, 'FICHA DE INSCRIPCIÓN', 0, 1, 'L', 0);

/* $fpdf->SetY(70);
$fpdf->SetX(135);
$fpdf->SetFont('Helvetica', '', 8);
$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFillColor(54, 169, 225);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(70, 5, 'COTIZACIÓN', 'T', 1, 'C', 0);

$fpdf->SetX(135);
$fpdf->SetFont('Helvetica', 'B', 14);
$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFillColor(54, 169, 225);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(70, 5, '# ' . 'INS', 'T', 1, 'C', 0);

$fpdf->SetX(135);
$fpdf->SetFont('Helvetica', '', 8);
$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFillColor(54, 169, 225);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(70, 7, 'VALIDEZ: 10 días o hasta agotar stock', 'T', 1, 'C', 0); */


$fpdf->SetY(30);
$fpdf->SetFont('Helvetica', '', 9);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->SetX(7);
$fpdf->Write(5, 'SEDE: ' . $nombre_sede);
$fpdf->ln(6);
$fpdf->SetX(7);
$fpdf->Write(5, 'PROMOCIÓN: '. $nombre_promocion);
$fpdf->ln(6);
$fpdf->SetX(7);
$fpdf->Write(5, 'NOMBRES Y APELLIDOS: '.$nombres_apellidos);
$fpdf->ln(6);
$fpdf->SetX(7);
$fpdf->Write(5, 'DIRECCIÓN: ' . $direccion_alumno);
$fpdf->ln(6);
$fpdf->SetX(7);
$fpdf->Write(5, 'FECHA DE NACIMIENTO: ' . $fecha_nacimiento);
$fpdf->ln(6);
$fpdf->SetX(7);
$fpdf->Write(5, 'DNI: ' . $dni_alumno);
$fpdf->SetX(60);
$fpdf->Write(5, 'GRADO DE ESTUDIO: ' . $grado_estudio_alumno);
$fpdf->ln(6);
$fpdf->SetX(7);
$fpdf->Write(5, 'TELEFONO: ' . $celular_alumno);
$fpdf->ln(6);
$fpdf->SetX(7);
$fpdf->Write(5, 'ESPECIALIDAD: ' . $nombre_especialidad);
$fpdf->ln(6);
$fpdf->SetX(7);
$fpdf->Write(5, 'EMAIL: ' . $email_alumno);
$fpdf->ln(6);
$fpdf->SetX(7);
$fpdf->Write(5, 'FECHA DE INSCRIPCIÓN: ' . $fecha_inscripcion);


/* $fpdf->SetY(110);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->SetX(11);
$fpdf->Write(5, 'Estimados señores,');
$fpdf->ln(5);
$fpdf->SetX(11);
$fpdf->Write(5, 'De acuerdo a lo solicitado por ustedes, sometemos a consideración nuestra propuesta.'); */

/* Sección 1  */

$fpdf->ln(10);
$fpdf->SetFont('Helvetica', 'B', 10);
$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFillColor(241, 196, 15);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 8, 'Descripción', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'M', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'M1', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'M2', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'M3', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'M4', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'M5', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'M6', 1, 0, 'C', 1);
$fpdf->ln();

$fpdf->SetFillColor(236, 240, 241);

$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 7, 'Nº Boleta', 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_matricula, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_m1, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_m2, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_m3, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_m4, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_m5, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_m6, 1, 0, 'C', 1);
$fpdf->ln();

$fpdf->SetFillColor(236, 240, 241);

$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 7, 'Nº Voucher', 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_matricula, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_m1, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_m2, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_m3, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_m4, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_m5, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_m6, 1, 0, 'C', 1);
$fpdf->ln();

$fpdf->SetFillColor(236, 240, 241);

$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 7, 'Monto', 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_matricula, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_m1, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_m2, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_m3, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_m4, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_m5, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_m6, 1, 0, 'C', 1);
$fpdf->ln();

$fpdf->SetFillColor(236, 240, 241);

$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 7, 'Nota', 1, 0, 'C', 1);
$fpdf->Cell(25, 7, '-', 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $nota_m1, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $nota_m2, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $nota_m3, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $nota_m4, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $nota_m5, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $nota_m6, 1, 0, 'C', 1);
$fpdf->ln();

$fpdf->SetFillColor(236, 240, 241);

$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 7, 'Asistencia', 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_matricula, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_m1, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_m2, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_m3, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_m4, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_m5, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_m6, 1, 0, 'C', 1);
$fpdf->ln();

$fpdf->SetFillColor(236, 240, 241);

$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 7, 'Fecha', 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_matricula, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_m1, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_m2, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_m3, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_m4, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_m5, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_m6, 1, 0, 'C', 1);
$fpdf->ln();


/* Sección 2 */

$fpdf->ln(10);
$fpdf->SetFont('Helvetica', 'B', 10);
$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFillColor(241, 196, 15);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 8, 'Descripción', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'CSP', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'EPP', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'P1', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'P2', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'P3', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'P4', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'P5', 1, 0, 'C', 1);
$fpdf->ln();

$fpdf->SetFillColor(236, 240, 241);

$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 7, 'Nº Boleta', 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_csp, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_epp, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_p1, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_p2, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_p3, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_p4, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_p5, 1, 0, 'C', 1);
$fpdf->ln();

$fpdf->SetFillColor(236, 240, 241);

$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 7, 'Nº Voucher', 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_csp, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_epp, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_p1, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_p2, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_p3, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_p4, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_p5, 1, 0, 'C', 1);
$fpdf->ln();

$fpdf->SetFillColor(236, 240, 241);

$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 7, 'Monto', 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_csp, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_epp, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_p1, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_p2, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_p3, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_p4, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_p5, 1, 0, 'C', 1);
$fpdf->ln();

$fpdf->SetFillColor(236, 240, 241);

$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 7, 'Nota', 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $nota_csp, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $nota_epp, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $nota_p1, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $nota_p2, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $nota_p3, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $nota_p4, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $nota_p5, 1, 0, 'C', 1);
$fpdf->ln();

$fpdf->SetFillColor(236, 240, 241);

$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 7, 'Asistencia', 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_csp, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_epp, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_p1, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_p2, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_p3, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_p4, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_p5, 1, 0, 'C', 1);
$fpdf->ln();

$fpdf->SetFillColor(236, 240, 241);

$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 7, 'Fecha', 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_csp, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_epp, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_p1, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_p2, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_p3, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_p4, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_p5, 1, 0, 'C', 1);
$fpdf->ln();

/* Sección 3 */

$fpdf->ln(10);
$fpdf->SetFont('Helvetica', 'B', 10);
$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFillColor(241, 196, 15);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 8, 'Descripción', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'P6', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'P7', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'P8', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'P9', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'P10', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'PA', 1, 0, 'C', 1);
$fpdf->Cell(25, 8, 'CC', 1, 0, 'C', 1);
$fpdf->ln();

$fpdf->SetFillColor(236, 240, 241);

$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 7, 'Nº Boleta', 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_p6, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_p7, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_p8, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_p9, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_p10, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_pa, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_boleta_cc, 1, 0, 'C', 1);
$fpdf->ln();

$fpdf->SetFillColor(236, 240, 241);

$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 7, 'Nº Voucher', 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_p6, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_p7, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_p8, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_p9, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_p10, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_pa, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $numero_voucher_cc, 1, 0, 'C', 1);
$fpdf->ln();

$fpdf->SetFillColor(236, 240, 241);

$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 7, 'Monto', 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_p6, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_p7, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_p8, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_p9, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_p10, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_pa, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $monto_cc, 1, 0, 'C', 1);
$fpdf->ln();

$fpdf->SetFillColor(236, 240, 241);

$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 7, 'Nota', 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $nota_p6, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $nota_p7, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $nota_p8, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $nota_p9, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $nota_p10, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $nota_pa, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $nota_cc, 1, 0, 'C', 1);
$fpdf->ln();

$fpdf->SetFillColor(236, 240, 241);

$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 7, 'Asistencia', 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_p6, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_p7, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_p8, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_p9, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_p10, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_pa, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $asistencia_cc, 1, 0, 'C', 1);
$fpdf->ln();

$fpdf->SetFillColor(236, 240, 241);

$fpdf->SetDrawColor(255, 255, 255);
$fpdf->SetFont('Helvetica', '', 10);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(25, 7, 'Fecha', 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_p6, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_p7, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_p8, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_p9, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_p10, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_pa, 1, 0, 'C', 1);
$fpdf->Cell(25, 7, $fecha_cc, 1, 0, 'C', 1);
$fpdf->ln();


/* $fpdf->SetFillColor(255, 255, 255);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(130, 5, '', 0, 0, 'L', 1);
$fpdf->SetFillColor(54, 169, 225);
$fpdf->SetTextColor(255, 255, 255);
$fpdf->Cell(35, 7, 'SUBTOTAL', 1, 0, 'C', 1);
$fpdf->Cell(35, 7, 'S/ ', 1, 0, 'C', 1);
$fpdf->ln();
$fpdf->SetFillColor(255, 255, 255);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(130, 5, '', 0, 0, 'L', 1);
$fpdf->SetFillColor(54, 169, 225);
$fpdf->SetTextColor(255, 255, 255);
$fpdf->Cell(35, 7, 'IGV', 1, 0, 'C', 1);
$fpdf->Cell(35, 7, 'S/ ', 1, 0, 'C', 1);
$fpdf->ln();
$fpdf->SetFillColor(255, 255, 255);
$fpdf->Cell(130, 5, '', 0, 0, 'L', 1);
$fpdf->SetFillColor(162, 191, 26);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(35, 7, 'TOTAL', 1, 0, 'C', 1);
$fpdf->Cell(35, 7, 'S/ ', 1, 0, 'C', 1); */

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

$fpdf->Output('Cotizacion.pdf', 'I');
$fpdf->OutPut();
