<?php
session_start();
$_SESSION['isLogged']= FALSE;
    # code...
session_destroy();
header("Location:/SistemaDeGestion/public/vista/login.html");

?>