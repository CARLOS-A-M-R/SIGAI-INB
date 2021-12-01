<?php
session_start(); 
require_once "../modelos/Usuario.php";
require_once "../modelos/Agente.php";

$usuario=new Usuario();



$tcu_nombre_sesion=isset($_POST["tcu_nombre_sesion"])? limpiarCadena($_POST["tcu_nombre_sesion"]):"";
$tcu_clave_sesion=isset($_POST["tcu_clave_sesion"])? limpiarCadena($_POST["tcu_clave_sesion"]):"";
$tcu_usuario_sistema=isset($_POST["tcu_usuario_sistema"])? limpiarCadena($_POST["tcu_usuario_sistema"]):"";
$tcu_nivel_usuario=isset($_POST["tcu_nivel_usuario"])? limpiarCadena($_POST["tcu_nivel_usuario"]):"";
$tcu_status_usuario=isset($_POST["tcu_status_usuario"])? limpiarCadena($_POST["tcu_status_usuario"]):"";
$tcu_cod_sesion=isset($_POST["tcu_cod_sesion"])? limpiarCadena($_POST["tcu_cod_sesion"]):"";
$nombre_pc= gethostbyaddr($_SERVER['REMOTE_ADDR']);


switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($tcu_cod_sesion)){
			$rspta=$usuario->insertar($tcu_nombre_sesion,$tcu_clave_sesion,$tcu_usuario_sistema,$tcu_nivel_usuario,$_POST['permiso']);
			echo $rspta ? "Usuario registrado" : "	No se pudieron registrar todos los datos del Usuario";
		}
		else {
			$rspta=$usuario->editar($tcu_cod_sesion,$tcu_nombre_sesion,$tcu_clave_sesion,$tcu_usuario_sistema,$tcu_nivel_usuario,$_POST['permiso']);
			echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$usuario->desactivar($tcu_cod_sesion);
 		echo $rspta ? "Usuario Desactivado" : "Usuario no se puede desactivar";
 		
	break;

	case 'activar':
		$rspta=$usuario->activar($tcu_cod_sesion);
 		echo $rspta ? "Usuario activado" : "Usuario no se puede activar";
 		
	break;

	case 'mostrar':
		$rspta=$usuario->mostrar($tcu_cod_sesion);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$usuario->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				//"0"=>$reg->tcu_cod_sesion,
 				"0"=>($reg->tcu_status_usuario)?'<button class="btn btn-warning" onclick="mostrar('.$reg->tcu_cod_sesion.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->tcu_cod_sesion.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->tcu_cod_sesion.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->tcu_cod_sesion.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->tcu_nombre_sesion,
 				"2"=>$reg->tcu_clave_sesion,
 				"3"=>$reg->usuario,
 				"4"=>$reg->nivel,
 				"5"=>($reg->tcu_status_usuario)?'<span class="label bg-green">Activo</span>':
 				'<span class="label bg-red">Inactivo</span>'
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

	case 'selectNU':
		
		$rspta = $usuario->selectNivelU();

			echo '<option value="0">Seleccione nivel de usuario</option>';
				
			foreach ($rspta as $key => $value) {
    		echo '<option value="'.$value["tnu_cod_niveles"].'">'.$value["tnu_nombre_nivel"].'</option>';
     		 }

		break;

	case 'permisos':
		
		require_once "../modelos/Permiso.php";
		$permiso = new Permiso();
		
		$rspta = $permiso->listar();

		$id = $_GET['id'];
		$marcados = $usuario->listarmarcados($id);

		$valores = array();

		while($per = $marcados->fetch_object())
		{
			array_push($valores, $per->tup_cod_permiso);
		}

		while($reg = $rspta->fetch_object())
		{
			$sw = in_array($reg->tps_cod_permiso, $valores)?'checked':'';
			echo '<li><input type="checkbox" '.$sw.'  name="permiso[]" value="'.$reg->tps_cod_permiso.'">'.$reg->tps_nombre_permiso.'</li>';

		}

	break;

	case 'verificar':


	
		$logina=$_POST['logina'];
		$clavea=$_POST['clavea'];

		$rspta = $usuario->verificar($logina,$clavea);

		$fetch=$rspta->fetch_object();

		if(isset($fetch))
		{
			$_SESSION['tcu_cod_sesion']=$fetch->tcu_cod_sesion;
			$_SESSION['tcu_usuario_sistema']=$fetch->tcu_usuario_sistema;
			$_SESSION['tcu_nombre_sesion']=$fetch->tcu_nombre_sesion;
			$_SESSION['tar_nombre']=$fetch->tar_nombre;

			$marcados = $usuario->listarmarcados($fetch->tcu_cod_sesion);

			$valores=array();

			while ($per = $marcados->fetch_object()) 
				{
					array_push($valores, $per->tup_cod_permiso);
				}

				in_array(1, $valores)?$_SESSION['escritorio']=1:$_SESSION['escritorio']=0;
				in_array(2, $valores)?$_SESSION['casos']=1:$_SESSION['casos']=0;
				in_array(3, $valores)?$_SESSION['usuarios']=1:$_SESSION['usuarios']=0;
				in_array(4, $valores)?$_SESSION['productos']=1:$_SESSION['productos']=0;
				in_array(5, $valores)?$_SESSION['empleados']=1:$_SESSION['empleados']=0;
				in_array(6, $valores)?$_SESSION['asesores']=1:$_SESSION['asesores']=0;
				in_array(7, $valores)?$_SESSION['historico']=1:$_SESSION['historico']=0;
				in_array(8, $valores)?$_SESSION['configuracionWeb']=1:$_SESSION['configuracionWeb']=0;
				in_array(9, $valores)?$_SESSION['permisos']=1:$_SESSION['permisos']=0;
				in_array(10, $valores)?$_SESSION['pruebas']=1:$_SESSION['pruebas']=0;
		}
		echo json_encode($fetch);	

	break;

	

	case 'informacion':
	
		$agente=new Agente();

		$rspta=$usuario->informacion();
		$so=$agente->obtenerSO();
		$usr = $so ."  ". $nombre_pc;


		//echo json_encode($so);
		//echo json_encode($rspta);

		$rspta2=$usuario->insertarIP($rspta,$usr);
		//echo json_encode($rspta2);


		break;

	case 'ingreso':
		
		$_SESSION['tcu_usuario_sistema'];
		$sesion_actual=$_SESSION['tcu_usuario_sistema'];

		$agente=new Agente();

		$rspta=$usuario->informacion();
		$so=$agente->obtenerSO();
		$usr = $so ."  ". $nombre_pc;


		//echo json_encode($so);
		//echo json_encode($rspta);

		$rspta2=$usuario->ingreso($rspta,$usr,$sesion_actual);
		echo json_encode($rspta2);

		break;

	case 'salir':

		$_SESSION['tcu_usuario_sistema'];
		$sesion_actual=$_SESSION['tcu_usuario_sistema'];
	
		session_unset();
		session_destroy();
		
		
		$agente=new Agente();

		$rspta=$usuario->informacion();
		$so=$agente->obtenerSO();
		$usr = $so ."  ". $nombre_pc;


		//echo json_encode($so);
		//echo json_encode($rspta);

		$rspta2=$usuario->salir($rspta,$usr,$sesion_actual);
		//echo json_encode($rspta2);

		header('Location: ../index.php');		

	break;	
}
?>