<?php 
session_start();
require_once "../modelos/Permiso.php";

$permiso=new Permiso();



switch ($_GET["op"]){

	case 'listar':
		$rspta=$permiso->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->tps_nombre_permiso
 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
}

	/*================================================================
	Funcion para mostrar informacion del sistema
	=================================================================*/


?>