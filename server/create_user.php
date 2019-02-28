<?php

require ('conectarBD.php');

//datos del usuario
$cod='6';
$nombre= "Eddy Sanchez";
$email= "eddy@gmail.com";
$pass= password_hash("12345", PASSWORD_DEFAULT); //encriptar la contraseña
$fechaN="1989-01-30";

$con= new ConectorBD('localhost', 'root', '');

if ($con->initConexion('agenda')=="OK") {

	//validacion si el correo existe
	$res= $con->validar($email);

	if ($res->num_rows==true) {
		echo "<h2>El correo ya se encuentra registrado</h2>";
	}else{		
		if ($con->newUser($cod, $nombre, $email, $pass, $fechaN)) {
			echo "<h2>exito en la inserción<h2>";
		}else{
			echo "<h2>Hubo un error y los datos no han sido cargados</h2>";
		}
	}

	mysqli_free_result($res);
	$con->cerrarConexion();	

}else echo "Se presentó un error en la conexión";


 ?>
