<?php


	
    $conn = new mysqli("192.168.1.72:3306","DBASIGAI","seguridad2019","bd_sigai");
    $count = 0;
    $_SESSION['tcu_usuario_sistema'];
	$sesion_actual=$_SESSION['tcu_usuario_sistema'];
    $sql2 = "SELECT tl_cod_caso,tcc_cod_sesion,tcc_fecha_alta,tar_nombre AS Asigna 
						FROM tbl_consulta_caso 
				INNER JOIN tbl_levantar_caso  ON tcc_cod_caso=tl_cod_caso
				INNER JOIN tbl_credenciales_usuarios ON tcc_cod_sesion=tcu_cod_sesion 
				INNER JOIN tbl_analista_responsable  ON tcu_usuario_sistema=tar_cod_analista
				
				WHERE tl_analista_responsable='$sesion_actual' AND tcc_notificar_caso = 0";
    $result = mysqli_query($conn, $sql2);
    $count = mysqli_num_rows($result);
