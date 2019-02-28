<?php

//cerrado de la sesion y redireccion a la pagina de inicio
session_start();
session_destroy();
header('location:../client');
exit();

?>
