<?php 
//Incluímos inicialmente la conexión a la base de datos

require "../config/Conexion.php";

Class Usuario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($tcu_nombre_sesion,$tcu_clave_sesion,$tcu_usuario_sistema,$tcu_nivel_usuario,$permisos)
	{
		$sql="INSERT INTO tbl_credenciales_usuarios (tcu_nombre_sesion,tcu_clave_sesion,tcu_usuario_sistema,tcu_nivel_usuario,tcu_status_usuario)
		VALUES ('$tcu_nombre_sesion','$tcu_clave_sesion','$tcu_usuario_sistema','$tcu_nivel_usuario','1')";
		//return ejecutarConsulta($sql);
		$idusuarionew = ejecutarConsulta_retornarID($sql);
		
		$num_elementos = 0;
		$sw=true;

		while($num_elementos < count($permisos))
		{
			$sql_detalle = "INSERT INTO tbl_usuario_permiso(tup_cod_usuario,tup_cod_permiso)VALUES('$idusuarionew','$permisos[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		return $sw;
	}

	//Implementamos un método para editar registros
	public function editar($tcu_cod_sesion,$tcu_nombre_sesion,$tcu_clave_sesion,$tcu_usuario_sistema,$tcu_nivel_usuario,$permisos)
	{
		$sql="UPDATE tbl_credenciales_usuarios SET tcu_nombre_sesion='$tcu_nombre_sesion',tcu_clave_sesion='$tcu_clave_sesion',tcu_usuario_sistema='$tcu_usuario_sistema',tcu_nivel_usuario='$tcu_nivel_usuario' 
		WHERE tcu_cod_sesion='$tcu_cod_sesion'";
		ejecutarConsulta($sql);

		$sqldel = "DELETE FROM tbl_usuario_permiso WHERE tup_cod_usuario='$tcu_cod_sesion'";
		ejecutarConsulta($sqldel);

		$num_elementos = 0;
		$sw=true;

		while($num_elementos < count($permisos))
		{
			$sql_detalle = "INSERT INTO tbl_usuario_permiso(tup_cod_usuario,tup_cod_permiso)VALUES('$tcu_cod_sesion','$permisos[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		return $sw;
	}

	//Implementamos un método para desactivar registros
	public function desactivar($tcu_cod_sesion)
	{
		$sql="UPDATE tbl_credenciales_usuarios SET tcu_status_usuario='0' WHERE tcu_cod_sesion='$tcu_cod_sesion'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($tcu_cod_sesion)
	{
		$sql="UPDATE tbl_credenciales_usuarios SET tcu_status_usuario='1' WHERE tcu_cod_sesion='$tcu_cod_sesion'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($tcu_cod_sesion)
	{
		$sql="SELECT * FROM tbl_credenciales_usuarios WHERE tcu_cod_sesion='$tcu_cod_sesion'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT tcu_cod_sesion,tcu_nombre_sesion,tcu_clave_sesion, tar_nombre AS usuario, tnu_nombre_nivel AS nivel, 
				tcu_status_usuario FROM tbl_credenciales_usuarios  INNER JOIN tbl_analista_responsable ON 
				tcu_usuario_sistema=tar_cod_analista INNER JOIN tbl_niveles_usuario  ON 
				tcu_nivel_usuario=tnu_cod_niveles";
		return ejecutarConsulta($sql);		
	}

	public function selectNivelU()
	{
		$sql="SELECT * FROM tbl_niveles_usuario";
		return ejecutarConsulta($sql);
	}

	public function listarmarcados($cod_usuario)
	{
		$sql = "SELECT * FROM tbl_usuario_permiso WHERE tup_cod_usuario='$cod_usuario'";
		return ejecutarConsulta($sql);
	}

	public function verificar($nombre_sesion,$clave_sesion)
	{
		$sql = "SELECT tar_nombre,tcu_cod_sesion,tcu_nombre_sesion,tcu_usuario_sistema,tcu_nivel_usuario FROM tbl_credenciales_usuarios INNER JOIN tbl_analista_responsable ON tcu_usuario_sistema=tar_cod_analista WHERE tcu_nombre_sesion = '$nombre_sesion' AND tcu_clave_sesion = '$clave_sesion' AND tcu_status_usuario='1'";
		return ejecutarConsulta($sql);
	}

	public function informacion(){
		
		if (isset($_SERVER["HTTP_CLIENT_IP"])){

            return $_SERVER["HTTP_CLIENT_IP"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){

            return $_SERVER["HTTP_X_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED"])){

            return $_SERVER["HTTP_X_FORWARDED"];

        }elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){

            return $_SERVER["HTTP_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_FORWARDED"])){

            return $_SERVER["HTTP_FORWARDED"];

        }else{

            return $_SERVER["REMOTE_ADDR"];
	}
}

	public function insertarIP($variable,$agente){

		$sql="INSERT INTO tbl_bitacora (tb_ip,tb_agente,tb_evento)VALUES('$variable','$agente','HA INICIADO CONEXION')";

		return ejecutarConsulta($sql);

		
	}

	public function ingreso($variable,$agente,$usuario){

		$sql="INSERT INTO tbl_bitacora (tb_ip,tb_agente,tb_evento,tb_usuario_sistema)VALUES('$variable','$agente','INICIO SESION','$usuario')";

		return ejecutarConsulta($sql);

		
	}

	public function salir($variable,$agente,$usuario){

		$sql="INSERT INTO tbl_bitacora (tb_ip,tb_agente,tb_evento,tb_usuario_sistema)VALUES('$variable','$agente','HA TERMINADO LA SESION','$usuario')";

		return ejecutarConsulta($sql);

		
	}

}

?>