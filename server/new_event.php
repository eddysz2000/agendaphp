<?php
  
session_start();
if (isset($_SESSION['isLogin'])) {
	require ('conectarBD.php');
	$con= new ConectorBD('localhost', 'root', '');
	$response['conexion']= $con->initConexion('agenda');

	//validacion si la conexion es conforme para proceder a preparar los datos a grabar
	if ($response['conexion']=="OK") {
		$datos['titulo'] = $_POST['titulo'];
		$datos['fecha_inicio'] = $_POST['start_date'];

		//dependiendo si el evento dura todo el dia o no, se preparan los datos
		if($_POST['allDay']=='1')
			$datos['dia_completo'] = 1;
		else {
			$datos['dia_completo'] = 0;
			$datos['hora_ini'] = $_POST['start_hour'];
			$datos['fecha_fin'] = $_POST['end_date'];
			$datos['hora_fin'] = $_POST['end_hour'];

		}
		
		//identificacion de pertenencia del evento ingresado
		$datos['usuario'] = $_SESSION['userLogin']['id'];

		//validacion si el registro es conforme
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
