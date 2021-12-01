<?php 

require "../config/Conexion.php";

class Notificar 
{
	
	function __construct()
	{
		# code...
	}

	public function actualizarNot(){

		$sql = "UPDATE tbl_consulta_caso SET tcc_notificar_caso = 1 WHERE tcc_notificar_caso = 0";
		return ejecutarConsulta($sql);
	}

	public function mostrar5($sesion_actual){

		$sql = "SELECT tl_cod_caso,tcc_cod_sesion,tcc_actualizar_notificacion,tar_nombre AS Asigna 
						FROM tbl_consulta_caso 
				INNER JOIN tbl_levantar_caso  ON tcc_cod_caso=tl_cod_caso
				INNER JOIN tbl_credenciales_usuarios ON tcc_cod_sesion=tcu_cod_sesion 
				INNER JOIN tbl_analista_responsable  ON tcu_usuario_sistema=tar_cod_analista
				
				WHERE tl_analista_responsable='$sesion_actual' ORDER BY tcc_cod_consulta_caso DESC LIMIT 5";
		return ejecutarConsulta($sql);
	}

	public function mostrarCero(){

		$sql = "SELECT * FROM tbl_consulta_caso WHERE tcc_notificar_caso = 0";
		return ejecutarConsulta($sql);
	}

	public function agregar($autor,$mensaje){

		$sql = "INSERT INTO datos(autor,mensaje)VALUES('$autor','$mensaje')";
		return ejecutarConsulta($sql);
	}

}

 ?>