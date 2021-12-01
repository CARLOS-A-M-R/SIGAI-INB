<?php 

require "../config/Conexion.php";

/**
 * 
 */
class Asesor
{
	
	function __construct()
	{
		# code...
	}

	public function insertar($nombre,$apellido,$rfc,$registro,$puesto,$sucursal,$ubicacion,$gerente,$contrato,$descripcion)
	{
		$sql="INSERT INTO tbl_asesores(ta_nombre,ta_apellido,ta_rfc,ta_numero_registro,ta_puesto,ta_sucursal,ta_ubicacion,ta_gerente,ta_numero_contrato,ta_descripcion)VALUES('$nombre','$apellido','$rfc','$registro','$puesto','$sucursal','$ubicacion','$gerente','$contrato','$descripcion')";

		return ejecutarConsulta($sql);
	}

	public function editar($cod_asesor,$nombre,$apellido,$rfc,$registro,$puesto,$sucursal,$ubicacion,$gerente,$contrato,$descripcion)
	{
		$sql="UPDATE tbl_asesores SET ta_nombre='$nombre',ta_apellido='$apellido',ta_rfc='$rfc',ta_numero_registro='$registro',ta_puesto='$puesto',ta_sucursal='$sucursal',ta_ubicacion='$ubicacion',ta_gerente='$gerente',ta_numero_contrato='$contrato',ta_descripcion='$descripcion' WHERE ta_cod_asesor='$cod_asesor'";

		return ejecutarConsulta($sql);
	}

	public function listar()
	{
		$sql="SELECT * FROM tbl_asesores";

		return ejecutarConsulta($sql);
	}

	public function mostrar($cod_asesor)
	{
		$sql="SELECT * FROM tbl_asesores WHERE ta_cod_asesor='$cod_asesor'";

		return ejecutarConsultaSimpleFila($sql);
	}
}

 ?>