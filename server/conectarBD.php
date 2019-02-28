<?php  
	
	/**
	* 
	*/
	class ConectorBD{

		private $host;
		private $user;
		private $pass;
		private $conexion;
		private $baseDatos;
		
		function __construct($host, $user, $pass){
			$this->host= $host;
			$this->user= $user;
			$this->pass= $pass;
		}

		function initConexion($baseDatos) {
		$this ->conexion = new mysqli($this ->host, $this ->user, $this ->pass, $baseDatos);
		if ($this -> conexion -> connect_error) {
			return "Error:" . $this -> conexion -> connect_error;
		} else {
			return "OK";
		}
	}

	function getConexion() {
		return $this -> conexion;
	}

	function ejecutarQuery($query) {
		return $this -> conexion -> query($query);
	}

	function cerrarConexion() {
		$this -> conexion -> close();
	}

	function validar($email){
		$sql= "select email from usuario where email='".$email."';";
		return $this->ejecutarQuery($sql);
	}

	function newUser($id, $nom, $correo, $cont, $naci){
		$sql= "CALL guardarUser ('".$id."', '".$nom."', '".$correo."', '".$cont."', '".$naci."');";
		return $this->ejecutarQuery($sql);
	}

	function insertData($tabla, $data) {
		$sql = 'INSERT INTO ' . $tabla . ' (';
		$i = 1;
		foreach ($data as $key => $value) {
			$sql .= $key;
			if ($i < count($data)) {
				$sql .= ', ';
			} else
				$sql .= ')';
			$i++;
		}
		$sql .= ' VALUES (';
		$i = 1;
		foreach ($data as $key => $value) {
			$sql .= "'" . $value . "'";
			if ($i < count($data)) {
				$sql .= ', ';
			} else
				$sql .= ');';
			$i++;
		}
		return $this -> ejecutarQuery($sql);
	}

	function actualizarRegistro($tabla, $data, $condicion) {
		$sql = 'UPDATE ' . $tabla . ' SET ';
		$i = 1;
		foreach ($data as $key => $value) {
			$sql .= $key . '="' . $value. '"';
			if ($i < sizeof($data)) {
				$sql .= ', ';
			} else
				$sql .= ' WHERE ' . $condicion . ';';
			$i++;
		}
		return $this -> ejecutarQuery($sql);
	}

	function eliminarRegistro($tabla, $condicion) {
		$sql = 'DELETE FROM ' . $tabla . ' WHERE ' . $condicion . ';';
		return $this -> ejecutarQuery($sql);
	}

	function consultar($tablas, $campos, $condicion = "") {
		$sql = "SELECT ";
		$tmp_campos = array_keys($campos);
		$tmp_tablas = array_keys($tablas);
		$ultima_key = end($tmp_campos);
		foreach ($campos as $key => $value) {
			$sql .= $value;
			if ($key != $ultima_key) {
				$sql .= ", ";
			} else
				$sql .= " FROM ";
		}
		$ultima_key = end($tmp_tablas);
		foreach ($tablas as $key => $value) {
			$sql .= $value;
			if ($key != $ultima_key) {
				$sql .= ", ";
			} else
				$sql .= " ";
		}
		if ($condicion == "") {
			$sql .= ";";
		} else {
			$sql .= ' WHERE ' . $condicion . ";";
		}
		return $this -> ejecutarQuery($sql);
	}



}


?>