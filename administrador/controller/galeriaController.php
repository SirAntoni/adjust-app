<?php 
session_start();
require "../config/conexion.php";
require "../model/galeriaModel.php";

$galeria = new Galeria();

$marca_id = '';
$tipo_id = '';
$model_id = '';
$mtma_id = '';
$mtmac_id = '';
$mtmaca_id = '';
$src_config = '';
$option = '';

if(isset($_GET['option'])){
    $option = $_GET['option'];
}

if(isset($_GET['src_config'])){
    $src_config = $_GET['src_config'];
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

if(isset($_GET['marca_id'])){
    $marca_id = $_GET['marca_id'];
}

if(isset($_GET['tipo_id'])){
    $tipo_id = $_GET['tipo_id'];
}

if(isset($_GET['model_id'])){
    $model_id = $_GET['model_id'];
}

if(isset($_GET['anio_id'])){
    $anio_id = $_GET['anio_id'];
}

if(isset($_GET['mtma_id'])){
    $mtma_id = $_GET['mtma_id'];
}

if(isset($_GET['mtmac_id'])){
    $mtmac_id = $_GET['mtmac_id'];
}

if(isset($_GET['mtmaca_id'])){
    $mtmaca_id = $_GET['mtmaca_id'];
}


switch ($option){
    case 'get_marcas':
        $marcas = $galeria->get_marcas();
        echo json_encode($marcas);
    break;
    case 'get_tipos':
        $tipos = $galeria->get_tipos($marca_id);
        echo json_encode($tipos);
    break;
    case 'get_modelos':
        $modelos = $galeria->get_modelos($marca_id,$tipo_id);
        echo json_encode($modelos);
    break;
    case 'get_anios':
        $anios = $galeria->get_anios($marca_id,$tipo_id,$model_id);
        echo json_encode($anios);
    break;
    case 'get_auto':
        $auto = $galeria->get_auto($id);
        echo json_encode($auto);
    break;
    case 'get_auto_id':
        $auto_id = $galeria->get_auto_id($marca_id,$tipo_id,$model_id,$anio_id);
        echo $auto_id;
    break;
    case 'get_categorias_auto':
        $categorias = $galeria->get_categorias_auto($id);
        echo json_encode($categorias);
    break;
    case 'get_categorias_auto_accesorios':
        $accesorios = $galeria->get_categorias_auto_accesorios($mtmac_id);
        echo json_encode($accesorios);
    break;
    case 'get_accesorio_detalle':
        $detalle_accesorio = $galeria->get_accesorio_detalle($mtmaca_id);
        echo json_encode($detalle_accesorio);
    break;
    case 'get_id_auto':
        $auto_id = $galeria->get_id_auto($id);
        echo $auto_id;
    break;
    case 'guardar_configuracion':
        $auto_id = $galeria->guardar_configuracion($id,$src_config,$_SESSION['id']);
        echo $auto_id;
    break;
    default:
        header('Location:../../home');
    break;
}

?>