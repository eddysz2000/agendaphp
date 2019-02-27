<?php
  
session_start();
if (isset($_SESSION['isLogin'])) {
	require ('conectarBD.php');
	$con= new ConectorBD('localhost', 'root', '');
	$response['conexion']= $con->initConexion('agenda');

	//alert($_POST['allDay']);

	if ($response['conexion']=="OK") {
		$datos['titulo'] = $_POST['titulo'];
		$datos['fecha_inicio'] = $_POST['start_date'];
		if($_POST['allDay']=='true')
			$datos['dia_completo'] = 1;
			//$datos['hora_ini'] = '';
			//$datos['fecha_fin'] = '';
			//$datos['hora_fin'] = '';
		else {
			$datos['dia_completo'] = 0;
			$datos['hora_ini'] = $_POST['start_hour'];
			$datos['fecha_fin'] = $_POST['end_date'];
			$datos['hora_fin'] = $_POST['end_hour'];
		}
		$datos['usuario'] = $_SESSION['userLogin']['id'];

		//print_r($_POST['allDay']);

		if ($con->insertData('evento',$datos)) {
			$response['msg'] = 'OK';
		}else
			$response['msg'] = 'Se ha producido un error al guardar el evento';
	}else
		$response['msg'] = 'Problemas con la conexión a la base de datos';

}else
	$response['msg'] = 'Debe iniciar sesión';

echo json_encode($response);

?>
