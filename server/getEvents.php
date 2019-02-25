<?php
session_start();
require('../server/conector.php');
$con = new ConectorBD('localhost','root','');

  $response['conexion'] = $con->initConexion('agenda');

  //print_r($response['conexion']);

  if ($response['conexion']=='OK') {
    $resultado_consulta = $con->consultar(['evento'],['id','title','color','start','end'], '');

    if ($resultado_consulta->num_rows != 0) {
      	$response['msg']='OK';

      	for($i = 0; $response[$i]['eventos'] = mysqli_fetch_assoc($resultado_consulta); $i++) ;

      	
    }else $response=array("msg"=>"NO existe el Usuario","data"=>"2"); 
  }  

  //print_r($response);
  echo json_encode($response,JSON_FORCE_OBJECT);

  $con->cerrarConexion();




 ?>

