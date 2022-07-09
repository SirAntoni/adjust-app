<?php
//mkdir("app/directorio", 0700);

//echo date("Ymdhis");

foreach(glob('../assets/images/20220703115827' . "/*") as $archivos_carpeta){
    unlink($archivos_carpeta);
}
rmdir('../assets/images/20220703115827/');

?>