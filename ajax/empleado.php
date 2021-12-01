<?php

require_once "../modelos/Empleado.php";

$empleado = new Empleado();

$cod_empleado=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$nombre=isset($_POST["emp-nombres"])? limpiarCadena($_POST["emp-nombres"]):"";
$apellido=isset($_POST["emp-apellidos"])? limpiarCadena($_POST["emp-apellidos"]):"";
$id=isset($_POST["emp-ID"])? limpiarCadena($_POST["emp-ID"]):"";
$registro=isset($_POST["emp-registro"])? limpiarCadena($_POST["emp-registro"]):"";
$gerencia=isset($_POST["emp-gerencia"])? limpiarCadena($_POST["emp-gerencia"]):"";
$jefe=isset($_POST["emp-jefe"])? limpiarCadena($_POST["emp-jefe"]):"";
$ip=isset($_POST["emp-IP"])? limpiarCadena($_POST["emp-IP"]):"";
$dominio=isset($_POST["emp-dominio"])? limpiarCadena($_POST["emp-dominio"]):"";
$pc=isset($_POST["emp-PC"])? limpiarCadena($_POST["emp-PC"]):"";
$facebook=isset($_POST["redes-facebook"])? limpiarCadena($_POST["redes-facebook"]):"";
$instagram=isset($_POST["redes-insta"])? limpiarCadena($_POST["redes-insta"]):"";
$twitter=isset($_POST["redes-twitter"])? limpiarCadena($_POST["redes-twitter"]):"";
$linkedin=isset($_POST["redes-linkedin"])? limpiarCadena($_POST["redes-linkedin"]):"";
$descripcion=isset($_POST["emp-desc"])? limpiarCadena($_POST["emp-desc"]):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':
		if(empty($cod_empleado)){
			$rspta=$empleado->insertar($nombre,$apellido,$id,$registro,$gerencia,$jefe,$ip,$dominio,$pc,$facebook,$instagram,$twitter,$linkedin,$descripcion);
			echo $rspta ? "Empleado registrado" : "Empleado no se pudo Registrar";
		}
		else  {
			$rspta=$empleado->editar($cod_empleado,$nombre,$apellido,$id,$registro,$gerencia,$jefe,$ip,$dominio,$pc,$facebook,$instagram,$twitter,$linkedin,$descripcion);
			echo $rspta ? "Empleado actualizado" : "Empleado no se puede actualizar";
		}
		break;

	case 'listar':
			$rspta=$empleado->listar();
			$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->te_nombre,
 				"1"=>$reg->te_apellido,
 				"2"=>$reg->te_id,
 				"3"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->te_cod_empleado.')"><i class="fa fa-pencil"></i></button>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
		
		break;

	case 'mostrar':
				$rspta=$empleado->mostrar($cod_empleado);
				echo json_encode($rspta);
		break;		
}




 ?>