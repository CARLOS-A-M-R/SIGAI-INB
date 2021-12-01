<?php 
session_start();
require_once "../modelos/Notificar.php";

$notificar=new Notificar();



switch ($_GET["op"]) {
	case 'notificaciones':
		$_SESSION['tcu_usuario_sistema'];
		$sesion_actual=$_SESSION['tcu_usuario_sistema'];
		$respuesta = $notificar->actualizarNot();
		 $respuesta;
		$respuesta = $notificar->mostrar5($sesion_actual);
		 $respuesta;
		$response='';

			while($row=mysqli_fetch_array($respuesta)) {

			/* Formate fecha */
			$fechaOriginal = $row["tcc_actualizar_notificacion"];
			$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));

			$response = $response . "<div class='notification-item'>" .
			//"<div class='notification-subject'>". $row["tl_cod_caso"] . " - <span>". $fechaFormateada . "</span> </div>" . 
			//"<div class='notification-comment'>" . $row["tcc_cod_sesion"]  . "</div>" .
			"<div class='notification-subject'>" . $row["Asigna"]  . '<b>&nbsp TE ASIGNO:   </b>'. "</div>" .
			"<div class='notification-subject'>".'<b>NUM DE CASO:&nbsp</b>'. '<b>'.$row["tl_cod_caso"] .'</b>'. "&nbsp &nbsp <b>FECHA:</b> &nbsp <span>". $fechaFormateada . "</span> </div>" . 
			"</div>";
		}
	if(!empty($response)) {
	print $response;
}

	case 'mostrar':
		$count = 0;
		$respuesta = $notificar->mostrarCero();
		$count = mysqli_num_rows($respuesta);
	break;

	case 'agregar':

			$autor=isset($_POST["autor"])? limpiarCadena($_POST["autor"]):"";
			$mensaje=isset($_POST["mensaje"])? limpiarCadena($_POST["mensaje"]):"";
		
			$respuesta = $notificar->agregar($autor,$mensaje);
			echo $respuesta ? "Notificacion registrado" : "	Notificacion no se pudo registrar";
	
		break;

}

 ?>