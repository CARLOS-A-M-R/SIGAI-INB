<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Permiso

{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}


	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM tbl_permisos_sistema";
		return ejecutarConsulta($sql);		
	}

	/*================================================================
	Funcion para mostrar informacion del sistema
	=================================================================*/
	static public function mdlInfoSistema($tabla)
	{

		$sql = "SELECT * FROM $tabla";

		return ejecutarConsulta($sql);
	}




}

?>