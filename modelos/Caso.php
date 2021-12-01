<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Caso
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($tl_fecha,$tl_fechaL,$tl_correo_origen,$tl_asunto,$tl_descripcion,$tl_area,$tl_prueba_imagen,$tl_analista_responsable,$tl_producto,$tl_tipo_producto,$tl_cat_producto,$tl_cuenta_inversion,$asigna)
	{
		$sql="INSERT INTO tbl_levantar_caso (tl_fecha,tl_fecha_limite,tl_correo_origen,tl_asunto,tl_descripcion,tl_area,tl_prueba_imagen,tl_analista_responsable,tl_condicion,tl_producto,tl_tipo_producto,tl_cat_producto,tl_cuenta_inversion)
		VALUES ('$tl_fecha','$tl_fechaL','$tl_correo_origen','$tl_asunto','$tl_descripcion','$tl_area','$tl_prueba_imagen','$tl_analista_responsable','1','$tl_producto','$tl_tipo_producto','$tl_cat_producto','$tl_cuenta_inversion')";
		//return ejecutarConsulta($sql);
		$idusuarionew = ejecutarConsulta_retornarID($sql);
		
		$sql_detalle = "INSERT INTO tbl_consulta_caso(tcc_cod_caso,tcc_cod_sesion)VALUES('$idusuarionew','$asigna') ";
			
			return ejecutarConsulta($sql_detalle);
			
}

	public function insertarSeguimiento($rfc,$codCaso,$razonSocial,$persona,$cuenta,$situacion,$seguimiento,$observaciones)
	{
		$sql="INSERT INTO tbl_clientes_inbursa (tci_rfc,tci_cod_caso,tci_razon_social,tci_id_persona,tci_numero_cuenta,tci_situacion_actual,tci_seguimiento,tci_observaciones)VALUES ('$rfc','$codCaso','$razonSocial','$persona','$cuenta','$situacion','$seguimiento','$observaciones')";
		return ejecutarConsulta($sql);

}	

	//Implementamos un método para editar registros
	public function editar($tl_cod_caso,$tl_fechaL,$tl_area,$tl_analista_responsable,$tl_fecha,$tl_correo_origen,$tl_descripcion,$tl_prueba_imagen,$tl_producto,$tl_tipo_producto,$tl_cat_producto,$tl_cuenta_inversion)
	{
		$sql="UPDATE tbl_levantar_caso SET tl_area='$tl_area',tl_analista_responsable='$tl_analista_responsable',tl_fecha='$tl_fecha',tl_fecha_limita='$tl_fechaL',tl_correo_origen='$tl_correo_origen',tl_descripcion='$tl_descripcion',tl_prueba_imagen='$tl_prueba_imagen',tl_producto='$tl_producto',tl_tipo_producto='$tl_tipo_producto',tl_cat_producto='$tl_cat_producto',tl_cuenta_inversion='$tl_cuenta_inversion' WHERE tl_cod_caso='$tl_cod_caso'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar registros
	public function desactivar($tl_cod_caso)
	{
		$sql="UPDATE tbl_levantar_caso SET tl_condicion='0' WHERE tl_cod_caso='$tl_cod_caso'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($tl_cod_caso)
	{
		$sql="UPDATE tbl_levantar_caso SET tl_condicion='1' WHERE tl_cod_caso='$tl_cod_caso'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($tl_cod_caso)
	{
		$sql="SELECT * FROM tbl_levantar_caso WHERE tl_cod_caso='$tl_cod_caso'";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function mostrarConsCaso($tcc_cod_consulta_caso)
	{
		$sql="SELECT tcc_cod_caso,tcc_cod_consulta_caso,tl_cod_caso,tl_fecha,tl_fecha_limite,tl_asunto,
					   tl_correo_origen,tl_area,	tcp_nombre_cliente_pro,tpc_nombre_categoria_pro,tcp_nombre_clasificacion, tmp_nombre_producto,tl_descripcion,tar_nombre AS Asigna 
					  FROM tbl_consulta_caso 
				INNER JOIN tbl_levantar_caso  ON tcc_cod_caso=tl_cod_caso
				INNER JOIN tbl_cliente_producto  ON tl_producto=tcp_cod_cliente_pro
				INNER JOIN tbl_categoria_producto ON tl_tipo_producto=tcp_cod_categoria_pro 
				INNER JOIN tbl_clasificacion_producto ON tl_cat_producto=tcp_cod_clasificacion_pro 
				INNER JOIN tbl_nombre_producto  ON tl_cuenta_inversion=tmp_cod_nombre_pro
				INNER JOIN tbl_credenciales_usuarios ON tcc_cod_sesion=tcu_cod_sesion 
				INNER JOIN tbl_analista_responsable  ON tcu_usuario_sistema=tar_cod_analista
			WHERE tcc_cod_consulta_caso='$tcc_cod_consulta_caso'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT tl_cod_caso,tl_fecha,tl_fecha_limite,tl_area,tar_nombre AS analista,tl_correo_origen, tl_condicion FROM tbl_levantar_caso INNER JOIN tbl_analista_responsable ON tl_analista_responsable=tar_cod_analista";
		return ejecutarConsulta($sql);		
	}

	public function listarInfo()
	{
		$sql = "SELECT tci_cod_cliente,tci_rfc,tci_razon_social,tci_id_persona,tci_numero_cuenta,tci_situacion_actual,tci_seguimiento,tci_observaciones FROM tbl_clientes_inbursa";
		return ejecutarConsulta($sql);
	}

	public function selectP()
	{
		$sql="SELECT * FROM tbl_cliente_producto";
		return ejecutarConsulta($sql);		
	}

	public function filtrarProducto($cod_producto){
		$sql = "SELECT * FROM tbl_categoria_producto  WHERE tpc_cod_cliente_pro='$cod_producto'";
		return ejecutarConsulta($sql);
	}

	public function filtrarCatProducto($cod_catPro){

		$sql = "SELECT * FROM tbl_clasificacion_producto WHERE tcp_cod_categoria_pro='$cod_catPro'";
		return ejecutarConsulta($sql);
	}

	public function filtrarTodosPro($producto){

		$sql = "SELECT * FROM tbl_nombre_producto WHERE tmp_cod_clasificacion_pro ='$producto'";
		return ejecutarConsulta($sql);

	}

	public function seguimientoCasos($sesion_actual){
		$sql = "SELECT tcc_cod_caso,tcc_cod_consulta_caso,tl_cod_caso,tl_fecha,tl_fecha_limite,tl_asunto,
					   tcp_nombre_cliente_pro,tpc_nombre_categoria_pro,tcp_nombre_clasificacion, tmp_nombre_producto,tar_nombre AS Asigna 
					  FROM tbl_consulta_caso 
				INNER JOIN tbl_levantar_caso  ON tcc_cod_caso=tl_cod_caso
				INNER JOIN tbl_cliente_producto  ON tl_producto=tcp_cod_cliente_pro
				INNER JOIN tbl_categoria_producto ON tl_tipo_producto=tcp_cod_categoria_pro 
				INNER JOIN tbl_clasificacion_producto ON tl_cat_producto=tcp_cod_clasificacion_pro 
				INNER JOIN tbl_nombre_producto  ON tl_cuenta_inversion=tmp_cod_nombre_pro
				INNER JOIN tbl_credenciales_usuarios ON tcc_cod_sesion=tcu_cod_sesion 
				INNER JOIN tbl_analista_responsable  ON tcu_usuario_sistema=tar_cod_analista
				WHERE tl_analista_responsable = '$sesion_actual'";
		return ejecutarConsulta($sql);
	}

	//NOTIFICACIONES

	public function actualizarNot(){
		
		$sql = "UPDATE tbl_consulta_caso SET tcc_notificar_caso=1 WHERE tcc_notificar_caso=0";
		ejecutarConsulta($sql);
	}

	public function mostrarNot5(){

		$sql = "SELECT * FROM tbl_consulta_caso ORDER BY tcc_cod_consulta_caso DESC LIMIT 5";
		return ejecutarConsulta($sql);
	}

	public function mostrarNotificaciones(){

		$sql = "SELECT * FROM tbl_consulta_caso WHERE tcc_notificar_caso=0";
		return ejecutarConsulta($sql);
	}

	public function mostrarModal(){

		$sql = "SELECT * FROM tbl_consulta_caso WHERE tcc_cod_consulta_caso = '".$_POST["Mod"]."'";
		return ejecutarConsulta($sql);
	}

		public function mostrarModalTodos(){

		$sql = "SELECT * FROM tbl_consulta_caso";
		return ejecutarConsulta($sql);
	}


}

?>                