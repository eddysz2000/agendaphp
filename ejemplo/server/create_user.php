<?php 
require('../server/lib.php');

$con = new ConectorBD();

if ($con->initConexion()=='OK'){
    $datos['nombres'] = "'Pablo Garcia'";
    $datos['correo'] = "'pablito@gmail.com'";
    $datos['password'] = "'".password_hash("123",PASSWORD_DEFAULT)."'";
    $datos['fecnac'] = "'12/05/1990'";

    if ($con->insertData('usuarios', $datos)) {
      echo "Se han registrado los datos correctamente";
    }else echo "Se ha producido un error en la actualización";

    $datos['nombres'] = "'Juan Perez'";
    $datos['correo'] = "'juancho@gmail.com'";
    $datos['password'] = "'".password_hash("123",PASSWORD_DEFAULT)."'";
    $datos['fecnac'] = "'01/05/1997'";

    if ($con->insertData('usuarios', $datos)) {
      echo "Se han registrado los datos correctamente";
    }else echo "Se ha producido un error en la actualización";

    $datos['nombres'] = "'Angel Condori'";
    $datos['correo'] = "'angeldx@gmail.com'";
    $datos['password'] = "'".password_hash("123",PASSWORD_DEFAULT)."'";
    $datos['fecnac'] = "'09/01/1986'";

    if ($con->insertData('usuarios', $datos)) {
      echo "Se han registrado los datos correctamente";
    }else echo "Se ha producido un error en la actualización";


    $con->cerrarConexion();
}else {
    echo "Se presentó un error en la conexión";
}

?>-