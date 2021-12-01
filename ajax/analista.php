<?php
session_start(); 
require_once "../modelos/Analista.php";

$analista=new Analista();

$tar_cod_analista=isset($_POST["tar_cod_analista"])? limpiarCadena($_POST["tar_cod_analista"]):"";
$tar_nombre=isset($_POST["tar_nombre"])? limpiarCadena($_POST["tar_nombre"]):"";
$tar_puesto=isset($_POST["tar_puesto"])? limpiarCadena($_POST["tar_puesto"]):"";
$tar_gerencia=isset($_POST["tar_gerencia"])? limpiarCadena($_POST["tar_gerencia"]):"";
$tar_numero_registro=isset($_POST["tar_numero_registro"])? limpiarCadena($_POST["tar_numero_registro"]):"";
$tar_correo=isset($_POST["tar_correo"])? limpiarCadena($_POST["tar_correo"]):"";


switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($tar_cod_analista)){
			$rspta=$analista->insertar($tar_nombre,$tar_puesto,$tar_gerencia,$tar_numero_registro,$tar_correo);
			echo $rspta ? "Analista registrado" : "Analista no se pudo registrar";
		}
		else {
			$rspta=$analista->editar($tar_cod_analista,$tar_nombre,$tar_puesto,$tar_gerencia,$tar_numero_registro,$tar_correo);
			echo $rspta ? "Analista actualizado" : "Analista no se pudo actualizar";
		}
	break;

	case 'mostrar':
		$rspta=$analista->mostrar($tar_cod_analista);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$analista->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->tar_nombre,
 				"1"=>$reg->puesto,
 				"2"=>$reg->gerencia,
 				"3"=>$reg->tar_numero_registro,
 				"4"=>$reg->tar_correo
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case "selectP":

		$rspta = $analista->selectPuesto();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->tp_cod_puesto . '>' . $reg->tp_nombre_puesto . '</option>';
				}
	break;

	case "selectG":

		$rspta = $analista->selectGerencia();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->tg_cod_gerencias . '>' . $reg->tg_nombre_gerencia . '</option>';
				}
	break;
}
?>