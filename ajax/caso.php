	<?php 
session_start();
require_once "../modelos/Caso.php";

$caso=new Caso();


$tl_cod_caso=isset($_POST["tl_cod_caso"])? limpiarCadena($_POST["tl_cod_caso"]):"";
$tcc_cod_consulta_caso=isset($_POST["tcc_cod_consulta_caso"])? limpiarCadena($_POST["tcc_cod_consulta_caso"]):"";
$tci_cod_cliente=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";


$tl_area=isset($_POST["tl_area"])? limpiarCadena($_POST["tl_area"]):"";
$tl_analista_responsable=isset($_POST["tl_analista_responsable"])? limpiarCadena($_POST["tl_analista_responsable"]):"";
$tl_fecha=isset($_POST["tl_fecha"])? limpiarCadena($_POST["tl_fecha"]):"";
$tl_fechaL=isset($_POST["tl_fecha_limite"])? limpiarCadena($_POST["tl_fecha_limite"]):"";
$tl_correo_origen=isset($_POST["tl_correo_origen"])? limpiarCadena($_POST["tl_correo_origen"]):"";
$tl_asunto=isset($_POST["tl_asunto"])? limpiarCadena($_POST["tl_asunto"]):"";
$tl_descripcion=isset($_POST["tl_descripcion"])? limpiarCadena($_POST["tl_descripcion"]):"";
$tl_prueba_imagen=isset($_POST["tl_prueba_imagen"])? limpiarCadena($_POST["tl_prueba_imagen"]):"";
$tl_producto=isset($_POST["tl_producto"])? limpiarCadena($_POST["tl_producto"]):"";
$tl_tipo_producto=isset($_POST["tl_tipo_producto"])? limpiarCadena($_POST["tl_tipo_producto"]):"";
$tl_cat_producto=isset($_POST["tl_cat_producto"])? limpiarCadena($_POST["tl_cat_producto"]):"";
$tl_cuenta_inversion=isset($_POST["tl_cuenta_inversion"])? limpiarCadena($_POST["tl_cuenta_inversion"]):"";



$codigo_producto=isset($_POST["codigo_producto"])? limpiarCadena($_POST["codigo_producto"]):"";
$codigo_cat_producto=isset($_POST["codigo_cat_producto"])? limpiarCadena($_POST["codigo_cat_producto"]):"";
$producto=isset($_POST["producto"])? limpiarCadena($_POST["producto"]):"";
//Variables de Seguimiento Caso
$razonSocial=isset($_POST["tci_razon_social"])? limpiarCadena($_POST["tci_razon_social"]):"";
$rfc=isset($_POST["tci_rfc"])? limpiarCadena($_POST["tci_rfc"]):"";
$persona=isset($_POST["tci_id_persona"])? limpiarCadena($_POST["tci_id_persona"]):"";
$cuenta=isset($_POST["tci_numero_cuenta"])? limpiarCadena($_POST["tci_numero_cuenta"]):"";
$situacion=isset($_POST["tci_situacion_actual"])? limpiarCadena($_POST["tci_situacion_actual"]):"";
$seguimiento=isset($_POST["tci_seguimiento"])? limpiarCadena($_POST["tci_seguimiento"]):"";
$observaciones=isset($_POST["tci_observaciones"])? limpiarCadena($_POST["tci_observaciones"]):"";
$codCaso=isset($_POST["tci_cod_caso"])? limpiarCadena($_POST["tci_cod_caso"]):"";


switch ($_GET["op"]){
	case 'guardaryeditar':

		if (!file_exists($_FILES['tl_prueba_imagen']['tmp_name']) || !is_uploaded_file($_FILES['tl_prueba_imagen']['tmp_name']))
		{
			$tl_prueba_imagen=$_POST["imagenactual"];
		}
		else 
		{
			$ext = explode(".", $_FILES["tl_prueba_imagen"]["name"]);
			if ($_FILES['tl_prueba_imagen']['type'] == "image/jpg" || $_FILES['tl_prueba_imagen']['type'] == "image/jpeg" || $_FILES['tl_prueba_imagen']['type'] == "image/png")
			{
				$tl_prueba_imagen = round(microtime(true)) . '.' . end($ext);
				move_uploaded_file($_FILES["tl_prueba_imagen"]["tmp_name"], "../files/imagenes/" . $tl_prueba_imagen);
			}
		}
		if (empty($tl_cod_caso)){
						
			$rspta=$caso->insertar($tl_fecha,$tl_fechaL,$tl_correo_origen,$tl_asunto,$tl_descripcion,$tl_area,$tl_prueba_imagen,$tl_analista_responsable,$tl_producto,$tl_tipo_producto,$tl_cat_producto,$tl_cuenta_inversion,$_SESSION['tcu_cod_sesion']);
			echo $rspta ? "Caso registrado" : "	Caso no se pudo registrar";
		}
		else {
			$rspta=$caso->editar($tl_cod_caso,$tl_area,$tl_analista_responsable,$tl_fecha,$tl_fechaL,$tl_correo_origen,$tl_descripcion,$tl_prueba_imagen,$tl_producto,$tl_tipo_producto,$tl_cat_producto,$tl_cuenta_inversion);
			echo $rspta ? "Caso actualizado" : "Caso no se pudo actualizar";
		}
	break;

	case 'guardarSeguimiento':

		
			$rspta=$caso->insertarSeguimiento($rfc, $codCaso,$razonSocial,$persona,$cuenta,$situacion,$seguimiento,$observaciones);
			echo $rspta ? "Categoría registrada" : "Categoría no se pudo registrar";

			
		
	break;

	case 'desactivar':
		$rspta=$caso->desactivar($tl_cod_caso);
 		echo $rspta ? "Caso Desactivado" : "Caso no se puede desactivar";
 		
	break;

	case 'activar':
		$rspta=$caso->activar($tl_cod_caso);
 		echo $rspta ? "Caso activado" : "Caso no se puede activar";
 		
	break;

	case 'mostrar':
		$rspta=$caso->mostrar($tl_cod_caso);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		
	break;

	case 'mostrarConsultaCaso':
		$rspta=$caso->mostrarConsCaso($tcc_cod_consulta_caso);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		
	break;

	case 'listar':			
		$rspta=$caso->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->tl_cod_caso,
 				"1"=>($reg->tl_condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->tl_cod_caso.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->tl_cod_caso.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->tl_cod_caso.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->tl_cod_caso.')"><i class="fa fa-check"></i></button>',
 				"2"=>$reg->tl_fecha,
 				"3"=>$reg->tl_fecha_limite,
 				"4"=>$reg->tl_area,
 				"5"=>$reg->analista,
 				"6"=>$reg->tl_correo_origen,
 				"7"=>($reg->tl_condicion)?'<span class="label bg-green">En tramite</span>':
 				'<span class="label bg-red">Concluido</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	 break;

		case 'listarSeguimiento':

		$_SESSION['tcu_usuario_sistema'];
		$sesion_actual=$_SESSION['tcu_usuario_sistema'];

		$rspta=$caso->seguimientoCasos($sesion_actual);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(


 				"0"=>'<button class="btn btn-warning" href="#add_new_record_modal" data-toggle="modal" onclick="GetUserDetails('.$reg->tcc_cod_consulta_caso.')"><span class="fa fa-plus"></span></button>',
 				//"0"=>'<i class="fa fa-plus-circle" aria-hidden="true"></i><a href="#add_new_record_modal" role="button" class="btn" data-toggle="modal" onclick="GetUserDetails('.$reg->tcc_cod_consulta_caso.')"></a>',
 				//"1"=>'<a href="../vistas/consultas.php" target="_blank" class="btn btn-warning" onclick="detalles('.$reg->tcc_cod_consulta_caso.')"><span class="fa fa-eye" aria-hidden="true"></span></a>',
 				//<span class="fa fa-eye" aria-hidden="true"></span>
 				"1"=>'<button class="btn btn-warning"  onclick="detalles('.$reg->tcc_cod_consulta_caso.')"><span class="fa fa-eye" aria-hidden="true"></span></button>',
 				"2"=>$reg->tl_cod_caso,
 				"3"=>$reg->tl_fecha,
 				"4"=>$reg->tl_fecha_limite,
 				"5"=>$reg->tl_asunto,
 				"6"=>$reg->tcp_nombre_cliente_pro, 
 				//"5"=>$reg->tpc_nombre_categoria_pro, 
				//"6"=>$reg->tcp_nombre_clasificacion,
				"7"=>$reg->tmp_nombre_producto,
				"8"=>$reg->Asigna
				//"9"=>'<button onclick="GetUserDetails('.$reg->tcc_cod_consulta_caso.')" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></button>'
 			//	"7"=>'<a href="#add_new_record_modal" role="button" class="btn" data-toggle="modal" onclick="GetUserDetails('.$reg->tcc_cod_consulta_caso.')"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>'
 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case 'listarClientes':
		
		

		$caso = new Caso();

		$rspta = $caso->listarInfo();

		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 			
 				"0"=>'<button class="btn btn-warning" onclick="agregarCliente('.$reg->tci_cod_cliente.')"><span class="fa fa-plus"></span></button>',
 				"1"=>$reg->tci_rfc,
 				"2"=>$reg->tci_id_persona,
 				"3"=>$reg->tci_numero_cuenta,
 				"4"=>$reg->tci_razon_social,
 				"5"=>$reg->tci_situacion_actual,
 				"6"=>$reg->tci_seguimiento,
 				"7"=>$reg->tci_observaciones
 				
 				
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);


		break;


	case "selectAnalista":
		require_once "../modelos/Analista.php";
		$analista = new Analista();

		$rspta = $analista->selectA();

		echo '<option value="0">Seleccione Analista</option>';
		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->tar_cod_analista . '>' . $reg->tar_nombre  . '</option>';
				}
	break;

	case 'selectProducto':
	$rspta = $caso->selectP();

	echo '<option value="0">Seleccione Producto</option>';

	foreach ($rspta as $key => $value) {
    echo '<option value="'.$value["tcp_cod_cliente_pro"].'">'.$value["tcp_nombre_cliente_pro"].'</option>';
      }

	break;

	case 'anidarProducto':
	
	$rspta = $caso->filtrarProducto($codigo_producto);

	echo '<option value="0">Tipo de Producto</option>';

	foreach ($rspta as $key => $value) {
    echo '<option value="'.$value["tcp_cod_categoria_pro"].'">'.$value["tpc_nombre_categoria_pro"].'</option>';
      }
		

	break;

	case 'anidarCategoriaPro':
	
	$rspta = $caso->filtrarCatProducto($codigo_cat_producto);

	echo '<option value="0">Tipo de Producto</option>';

	foreach ($rspta as $key => $value) {
    echo '<option value="'.$value["tcp_cod_clasificacion_pro"].'">'.$value["tcp_nombre_clasificacion"].'</option>';
      }
		

	 break;

		case 'anidarProductos':
    
   		 $rspta = $caso->filtrarTodosPro($producto);

    	 echo '<option value="0">Seleccione un Producto</option>';

         foreach ($rspta as $key => $value){
         echo '<option value="'.$value["tmp_cod_nombre_pro"].'">'.$value["tmp_nombre_producto"].'</option>';	
    }

	break;

	case 'fetch':
	
		if(isset($_POST["view"]))
 		{
		if($_POST["view"] != '')
 			{
 			$respuesta = $caso->actualizarNot();
 			}

 			$respuesta = $caso->mostrarNot5();
 			$output='';

 		 if(mysqli_num_rows($respuesta) > 0)
 			{
  		while($row = mysqli_fetch_array($respuesta))
  			{
   		$output .= '
   		<li>
    	<a href="#">
     	<strong>'.$row["tcc_cod_caso"].'</strong><br />
     	<small><em>'.$row["tcc_cod_sesion"].'</em></small>
    	</a>
   		</li>
   		<li class="divider"></li>
   					';
 		 }
 	}

 		else
		 {
 	 	$output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
		 }

 		$respuesta = $caso->mostrarNotificaciones();
 		$count = mysqli_num_rows($respuesta);
 		$data = array(
  		'notification'   => $output,
  		'unseen_notification' => $count
 			);
 		echo json_encode($data);
}
	
	break;

	case 'select':
	
	 if(isset($_POST["Mod"]))  
 	{  
      	$output = '';  
        $result = $caso->mostrarModal();  
      	$output .= '  
      <div>  
           <form>';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                 <div class="form-group col-md-3 mb-1">  
                     <label>Name</label>  
                     <input type="text" disabled="true" value="'.$row["tcc_cod_caso"].'">
                </div>  
         
                ';  
      }  
      $output .= "</form></div>";  
      echo $output;  
 }

	break;
	}

?>