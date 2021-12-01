<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Analista
{

	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($tar_nombre,$tar_puesto,$tar_gerencia,$tar_numero_registro,$tar_correo)
	{
		  

		$sql="INSERT INTO tbl_analista_responsable (tar_nombre,tar_puesto,tar_gerencia,tar_numero_registro,tar_correo)
		VALUES ('$tar_nombre','$tar_puesto','$tar_gerencia','$tar_numero_registro','$tar_correo')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($tar_cod_analista,$tar_nombre,$tar_puesto,$tar_gerencia,$tar_numero_registro,$tar_correo)
	{
		$sql="UPDATE tbl_analista_responsable SET tar_nombre = '$tar_nombre',tar_puesto='$tar_puesto',tar_gerencia='$tar_agencia',tar_numero_registro='$tar_numero_registro',tar_correo='$tar_correo' WHERE tar_cod_analista='$tar_cod_analista'";
		return ejecutarConsulta($sql);
	}


	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($tar_cod_analista)
	{
		$sql="SELECT * FROM tbl_analista_responsable WHERE tar_cod_analista='$tar_cod_analista'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT tar.tar_nombre, tp.tp_nombre_puesto AS puesto, tg.tg_nombre_gerencia AS gerencia, 
			tar.tar_numero_registro,tar.tar_correo FROM tbl_analista_responsable tar  
			INNER JOIN tbl_puesto tp ON tar.tar_puesto=tp.tp_cod_puesto JOIN tbl_gerencias tg ON 
			tar.tar_gerencia=tg.tg_cod_gerencias";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM categoria where condicion=1";
		return ejecutarConsulta($sql);		
	}

	public function selectPuesto()
	{
		$sql="SELECT tp_cod_puesto,tp_nombre_puesto FROM tbl_puesto";
		return ejecutarConsulta($sql);		
	}
	public function selectGerencia()
	{
		$sql="SELECT tg_cod_gerencias,tg_nombre_gerencia FROM tbl_gerencias";
		return ejecutarConsulta($sql);		
	}

	public function selectA()
	{
		$sql="SELECT tar_cod_analista,tar_nombre FROM tbl_analista_responsable";
		return ejecutarConsulta($sql);		
	}
}

?>