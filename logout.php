<?php
session_start();
require_once("administrador/config/conexion.php");
session_destroy();
header("Location:login-register");
exit();

?>