<?php 
require_once "../modelos/Producto.php";

$producto=new Producto();

$cod_cat_pro = isset($_POST["tcp_cod_categoria_pro"])? limpiarCadena($_POST["tcp_cod_categoria_pro"]):"";
$cliente=isset($_POST["pro-producto"])? limpiarCadena($_POST["pro-producto"]):"";
$nombre=isset($_POST["pro-categoria"])? limpiarCadena($_POST["pro-categoria"]):"";
$clasificacion=isset($_POST["pro-clas"])? limpiarCadena($_POST["pro-clas"]):"";
$pro_nombre=isset($_POST["pro-nombre"])? limpiarCadena($_POST["pro-nombre"]):"";


switch ($_GET["op"]){
	

	case 'guardaryeditar':
		if (empty($cod_cat_pro)){
			$rspta=$producto->insertar($cliente,$nombre,$clasificacion,$pro_nombre);

			echo $rspta ? "Producto registrado" : "Producto no se pudo registrar";
		}
		else {
			$rspta=$producto->editar($idcategoria,$nombre,$descripcion);
			echo $rspta ? "Producto actualizado" : "Produto no se pudo actualizar";
		}
	break;


	case 'filtrarProducto':
		
		$rspta = $producto->selectProducto();

		echo '<option value="0">Selecciona Tipo de Producto</option>';
		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->tp_cod_producto . '>' . $reg->tp_nombre_producto  . '</option>';
				}
	break;

	case 'activar':
		$rspta=$categoria->activar($idcategoria);
 		echo $rspta ? "Categoría activada" : "Categoría no se puede activar";
 		
	break;

	case 'mostrar':
		$rspta=$categoria->mostrar($idcategoria);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 
	break;

	case 'listar':
		$rspta=$producto->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				
 				"0"=>$reg->cliente,
 				"1"=>$reg->categoria,
 				"2"=>$reg->clasificacion,
 				"3"=>$reg->nombre
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
?>