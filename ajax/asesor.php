<?php 

require_once "../modelos/Asesor.php";

$asesor = new Asesor();

$cod_asesor=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$nombre=isset($_POST["asesor-nombres"])? limpiarCadena($_POST["asesor-nombres"]):"";
$apellido=isset($_POST["asesor-apellidos"])? limpiarCadena($_POST["asesor-apellidos"]):"";
$rfc=isset($_POST["asesor-RFC"])? limpiarCadena($_POST["asesor-RFC"]):"";
$registro=isset($_POST["asesor-registro"])? limpiarCadena($_POST["asesor-registro"]):"";
$puesto=isset($_POST["asesor-puesto"])? limpiarCadena($_POST["asesor-puesto"]):"";
$sucursal=isset($_POST["asesor-sucursal"])? limpiarCadena($_POST["asesor-sucursal"]):"";
$ubicacion=isset($_POST["asesor-ubicacion"])? limpiarCadena($_POST["asesor-ubicacion"]):"";
$gerente=isset($_POST["asesor-gerente"])? limpiarCadena($_POST["asesor-gerente"]):"";
$contrato=isset($_POST["asesor-contrato"])? limpiarCadena($_POST["asesor-contrato"]):"";
$descripcion=isset($_POST["asesor-desc"])? limpiarCadena($_POST["asesor-desc"]):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':
		
		if(empty($cod_asesor)){
			$rspta=$asesor->insertar($nombre,$apellido,$rfc,$registro,$puesto,$sucursal,$ubicacion,$gerente,$contrato,$descripcion);
			echo $rspta ? "Asesor Registrado" : "Asesor no se pudo registrar";
		} else {
			$rspta=$asesor->editar($cod_asesor,$nombre,$apellido,$rfc,$registro,$puesto,$sucursal,$ubicacion,$gerente,$contrato,$descripcion);
			echo $rspta ? "Asesor Actualizado" : "Asesor no se pudo Actualizar";
		}
		
		break;

	case 'listar':
			
			$rspta=$asesor->listar();
			$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->ta_nombre,
 				"1"=>$reg->ta_apellido,
 				"2"=>$reg->ta_rfc,
 				"3"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->ta_cod_asesor.')"><i class="fa fa-pencil"></i></button>'
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

			$rspta=$asesor->mostrar($cod_asesor);
			echo json_encode($rspta);

		break;		
}

 ?>