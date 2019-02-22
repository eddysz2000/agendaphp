<?php
session_start();
require('../server/conector.php');
$con = new ConectorBD('localhost','root','');

  $response['conexion'] = $con->initConexion('agenda');

  if ($response['conexion']=='OK') {
    $resultado_consulta = $con->consultar(['usuarios'],
    ['correo', 'password'], 'WHERE correo="'.$_POST['username'].'" AND password="'.$_POST['password'].'"');

    if ($resultado_consulta->num_rows != 0) {
      $response=array("msg"=>"OK","data"=>"2");  
    }else $response=array("msg"=>"NO existe el Usuario","data"=>"2"); 
  }

  echo json_encode($response,JSON_FORCE_OBJECT);

  $con->cerrarConexion();



 ?>
