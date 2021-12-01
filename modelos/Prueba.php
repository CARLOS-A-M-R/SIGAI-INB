<?php
require "../config/Conexion.php";

class Prueba
{
	
	function __construct()
	{
		
	}

	public function insertar($subject,$comment){

		$sql =  "INSERT INTO comments(comment_subject,comment_text)VALUES('$subject', '$comment')";

 	return ejecutarConsulta($sql);
	}

	public function actualizar(){
		$sql = "UPDATE comments SET comment_status=1 WHERE comment_status=0";
		return ejecutarConsulta($sql);
	}

	public function mostrar(){
		$sql = "SELECT * FROM comments ORDER BY comment_id DESC LIMIT 5";
		return ejecutarConsulta($sql);
	}

	public function mostrardos(){
		$sql = "SELECT * FROM comments WHERE comment_status=0";
		return ejecutarConsulta($sql);
	}
}

 ?>