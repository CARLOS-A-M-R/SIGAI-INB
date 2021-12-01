<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

class Producto
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($cod_cliente,$nombre_cat,$nombre_clas,$nom_pro)
	{
		$sql="INSERT INTO tbl_categoria_producto (tpc_cod_cliente_pro,tpc_nombre_categoria_pro)
		VALUES ('$cod_cliente','$nombre_cat')";
		//return ejecutarConsulta($sql);
		$sql2=ejecutarConsulta_retornarID($sql);

		$sql3="INSERT INTO tbl_clasificacion_producto(tcp_cod_categoria_pro,tcp_nombre_clasificacion)
		VALUES('$sql2','$nombre_clas')";
		//return ejecutarConsulta($sql3);
		$sql4=ejecutarConsulta_retornarID($sql3);
		$sql5="INSERT INTO tbl_nombre_producto(tmp_cod_clasificacion_pro,tmp_nombre_producto)
		VALUES('$sql4','$nom_pro')";
		return ejecutarConsulta($sql5);
	}

	public function listar()
	{
		$sql="SELECT cp.tcp_nombre_cliente_pro as cliente,cat.tpc_nombre_categoria_pro as categoria,clas.tcp_nombre_clasificacion as clasificacion, np.tmp_nombre_producto as nombre 
			FROM tbl_cliente_producto cp 
			INNER JOIN tbl_categoria_producto cat ON cat.tpc_cod_cliente_pro=cp.tcp_cod_cliente_pro 
			INNER JOIN tbl_clasificacion_producto clas ON clas.tcp_cod_categoria_pro=cat.tcp_cod_categoria_pro
			INNER JOIN tbl_nombre_producto np ON np.tmp_cod_clasificacion_pro=clas.tcp_cod_clasificacion_pro";
		return ejecutarConsulta($sql);
	}
}






?>