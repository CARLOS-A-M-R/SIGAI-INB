<?php 

require_once "../modelos/Usuario.php";

$usuario = new Usuario();

$respuesta=$usuario->informacion();

$rspta=$usuario->insertarIP($respuesta);

 ?>