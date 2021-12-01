<?php 

require_once "../modelos/Prueba.php";

$prueba = new Prueba();

$subject = isset($_POST["subject"])? limpiarCadena($_POST["subject"]):"";
$comment = isset($_POST["comment"])? limpiarCadena($_POST["comment"]):"";


switch ($_GET["op"]) {
	case 'insertar':

	$respuesta = $prueba->insertar($subject,$comment);

	echo $respuesta ? "Notificacion registrada" : "	Notificacion  no se pudo registrar";
	
	break;
	
	case 'fetch':

	if(isset($_POST["view"]))
{
	if($_POST["view"] != '')
 {
 	$respuesta = $prueba->actualizar();
 }

 	$respuesta = $prueba->mostrar();
 	$output='';

 	 if(mysqli_num_rows($respuesta) > 0)
 {
  while($row = mysqli_fetch_array($respuesta))
  {
   $output .= '
   <li>
    <a href="#">
     <strong>'.$row["comment_subject"].'</strong><br />
     <small><em>'.$row["comment_text"].'</em></small>
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

 $respuesta = $prueba->mostrardos();
 $count = mysqli_num_rows($respuesta);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);


}	

	break;
}

 ?>