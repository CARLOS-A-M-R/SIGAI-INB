<?php

require_once "../modelos/Permiso.php"; 

class Sigai
{	
	static public function ctrInfoSistema()
	{

		$tabla = "tbl_info_sistema";

		$respuesta = Permiso::mdlInfoSistema($tabla);

		return $respuesta;

	}

}	

 ?>