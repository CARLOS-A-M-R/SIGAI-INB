<?php

require "../config/Conexion.php";

/**
 * 
 */
class Empleado 
{
	
	function __construct()
	{
		# code...
	}

	public function insertar($nombre,$apellido,$id,$registro,$gerencia,$jefe,$ip,$dominio,$pc,$facebook,$instagram,$twitter,$linkedin,$descripcion)
	{
		$sql = "INSERT INTO tbl_empleados(te_nombre,te_apellido,te_id,te_numero_registro,te_gerencia,te_jefe,te_ip,te_dominio,te_usuarioPC,te_facebook,te_instagram,te_twitter,te_linkedin,te_descripcion)VALUES('$nombre','$apellido','$id','$registro','$gerencia','$jefe','$ip','$dominio','$pc','$facebook','$instagram','$twitter','$linkedin','$descripcion')";
		return ejecutarConsulta($sql);
	}

	public function editar($cod_empleado,$nombre,$apellido,$id,$registro,$gerencia,$jefe,$ip,$dominio,$pc,$facebook,$instagram,$twitter,$linkedin,$descripcion)
	{
		$sql = "UPDATE tbl_empleados SET te_nombre='$nombre',te_apellido='$apellido',te_id='$id',te_numero_registro='$registro',te_gerencia='$gerencia',te_jefe='$jefe',te_ip='$ip',te_dominio='$dominio',te_usuarioPC='$pc',te_facebook='$facebook',te_instagram='$instagram',te_twitter='$twitter',te_linkedin='$linkedin',te_descripcion='$descripcion' WHERE te_cod_empleado='$cod_empleado'";

		return ejecutarConsulta($sql);
	}

	public function listar()
	{
		$sql="SELECT * FROM tbl_empleados";

		return ejecutarConsulta($sql);
	}

	public function mostrar($cod_empleado)
	{
		$sql="SELECT * FROM tbl_empleados WHERE te_cod_empleado='$cod_empleado'";

		return ejecutarConsultaSimpleFila($sql);
	}
}

 ?>