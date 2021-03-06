<?php
session_start();
if($_SESSION['isLogin']){
	require ('conectarBD.php');
	
	$con = new ConectorBD('localhost', 'root', '');
	$response['conexion'] = $con -> initConexion('agenda');


	//validacion si la conexion es conforme
	if ($response['conexion'] == 'OK') {

		//obtener los eventos del usuario que ha ingresado
		$resultado = $con -> consultar(['evento'], ['*'], 'usuario="' . $_SESSION['userLogin']['id'] . '"');

		//si se obtiene resultado se procede a llenar los datos de los eventos encontrados
		if ($resultado->num_rows != 0) {
			$i=0;
			while ($fila = $resultado->fetch_assoc()) {
				$evento['id'] = $fila['id'];
				$evento['title'] = $fila['titulo'];
				if($fila['dia_completo'] == 1){
					$evento['start'] = $fila['fecha_inicio'];
					$evento['end'] = '';
					$evento['allDay'] = true;
				} else {
					$evento['start'] = $fila['fecha_inicio'].'T'.$fila['hora_ini'];
					$evento['end'] = $fila['fecha_fin'].'T'.$fila['hora_fin'];
					$evento['allDay'] = false;
				}
				$evento['color'] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
				$response['eventos'][$i] = $evento;
				$i++;
			}
		}
		$response['msg'] = 'OK';
	} else
		$response['msg'] = 'Problemas con la conexión a la base de datos';
} else
	$response['msg'] = 'Debe iniciar sesión';

echo json_encode($response);
?>