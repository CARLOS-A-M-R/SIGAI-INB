

<?php //require 'header.php'; ?>

<?php

require_once "../ajax/Sigai.php"; 

$sigai = Sigai::ctrInfoSistema();

while ($reg=$sigai->fetch_object()){

	$dominio = $reg->tis_dominio;

}

echo $dominio;


 ?>

<?php require 'footer.php'; ?>