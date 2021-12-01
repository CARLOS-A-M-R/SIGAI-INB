<?php

require_once "../ajax/Sigai.php";

$sigai = Sigai::ctrInfoSistema();

while ($reg=$sigai->fetch_object()){

  $dominio = $reg->tis_dominio;

}

if(strlen(session_id()) < 1)
  session_start(); 
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGAI</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->

  
    <link rel="stylesheet" href="<?php echo $dominio; ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $dominio; ?>public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $dominio; ?>public/css/animate.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $dominio; ?>public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $dominio; ?>public/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo $dominio; ?>public/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo $dominio; ?>public/css/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo $dominio; ?>public/css/_all-skins.css">
    <link rel="apple-touch-icon" href="<?php echo $dominio; ?>public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="<?php echo $dominio; ?>public/img/favicon.ico">

    <!--DATA TABLES -->

    <link rel="stylesheet" type="text/css" href="<?php echo $dominio; ?>public/datatables/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"  href="<?php echo $dominio; ?>public//datatables/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $dominio; ?>public/datatables/responsive.dataTables.min.css">
    <link href="<?php echo $dominio; ?>public/css/estilos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $dominio; ?>public/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo $dominio; ?>public/css/jquery-ui.min.css">
    <!--PENDIENTE CAMBIAR XDDD-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" crossorigin="anonymous"></script>


  </head>

    <body onload="startTime()" class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>SI</b>GAI</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>..:SIGAI:..</b></span>
        </a>

        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
             <span class="sr-only">Navegación</span>
           </a>
           
           <a class="navbar-brand" href="#"><?php echo $_SESSION['tar_nombre']; ?></a>
           <a href="../ajax/usuario.php?op=salir" class="navbar-brand" ><i class="fa fa-power-off" aria-hidden="true"></i></a>
           <a id="date" class="navbar-brand" ></a>
           <a id="clock" class="navbar-brand" ></a>
            
             <div class="navbar-brand">
              <?php
              include("../modelos/conexion.php");
              ?>                        

             <div class="demo-content">
            <div id="notification-header">
              <div style="position:relative;">
                <button id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count"><?php if($count>0) { echo $count; } ?></span><img style="border-color: red;" src="../img/icono.png" /></button>
                <div id="notification-latest"></div>
              </div>          
            </div>
          </div>
              </div> 
          </nav>

      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <?php

          
            //if(){
                  if($_SESSION['escritorio']==1)
                  {
                  echo '<li>
                    <a href="escritorio.php">
                      <i class="fa fa-tasks"></i> <span>Escritorio</span>
                    </a>
                  </li>';
                }
                     if($_SESSION['casos']==1)
                    {
                    echo '<li class="treeview">
                    <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span> Casos</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a> 
                    <ul class="treeview-menu">
                      <li><a href="caso.php"><i class="fa fa-circle-o"></i> Agregar Casos</a></li>
                      <li><a href="Consultacaso.php"><i class="fa fa-circle-o"></i> Consulta Casos</a></li>
                    </ul>
                    
                  </li>';
                  }
                      if($_SESSION['usuarios']==1)
                      {
                      echo '<li class="treeview">
                    <a href="#">
                      <i class="fa fa-users"></i>
                      <span> Usuarios</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a> 
                    <ul class="treeview-menu">
                      <li><a href="usuario.php"><i class="fa fa-circle-o"></i> Consulta Usuarios</a></li>
                      <li><a href="analista.php"><i class="fa fa-circle-o"></i> Consulta Analistas</a></li>
                    </ul>
                  </li>
      ';
                    }
                        if($_SESSION['productos']==1)
                      {
                      echo '<li class="treeview">
                    <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span> Productos</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="producto.php"><i class="fa fa-circle-o"></i> Productos</a></li>
                    </ul>
                  </li>';
                    }
                        if($_SESSION['empleados']==1)
                      {
                      echo '<li class="treeview">
                    <a href="#">
                      <i class="fa fa-th"></i>
                      <span> Empleados</span>
                       <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="empleado.php"><i class="fa fa-circle-o"></i> Consulta Empleados</a></li>
                    </ul>
                  </li>';
                    }
                          if($_SESSION['asesores']==1)
                        {
                        echo '<li class="treeview">
                    <a href="#">
                      <i class="fa fa-user" ></i>
                      <span> Asesores</span>
                       <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="asesor.php"><i class="fa fa-circle-o"></i> Consulta Asesor</a></li>
                    </ul>
                  </li>  ';
                      }
                          if($_SESSION['historico']==1)
                      {
                      echo '<li class="treeview">
                    <a href="#">
                      <i class="fa fa-folder"></i> <span> Historico</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href=""><i class="fa fa-circle-o"></i> Consulta Historica</a></li>
                      <li><a href=""><i class="fa fa-circle-o"></i> Registro Reporte</a></li>
                      <li><a href=""><i class="fa fa-circle-o"></i> Alta Bloqueo</a></li>
                      
                    </ul>
                  </li>';
                    }
                          if($_SESSION['configuracionWeb']==1)
                        {
                        echo '<li class="treeview">
                    <a href="#">
                      <i class="fa fa-bar-chart"></i> <span>Configuracion Web</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href=""><i class="fa fa-circle-o"></i> Administratar sitio web</a></li>                
                    </ul>
                  </li>';
                      }
                             if($_SESSION['permisos']==1)
                        {
                        echo '<li class="treeview">
                    <a href="#">
                      <i class="fa fa-folder"></i> <span> Permisos</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="permiso.php"><i class="fa fa-circle-o"></i> Permisos SIGAI</a></li>     
                    </ul>
                  </li>';
                      }

                           if($_SESSION['pruebas']==1)
                        {
                        echo '<li class="treeview">
                    <a href="#">
                      <i class="fa fa-folder"></i> <span> Pruebas</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="pruebas.php"><i class="fa fa-circle-o"></i> Pruebas SIGAI</a></li>     
                    </ul>
                  </li>';
                      }
                //}      
                  ?>            
             
        
       
            <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <script type="text/javascript" src="<?php echo $dominio; ?>vistas/scripts/reloj.js"></script>
      <script type="text/javascript" src="<?php echo $dominio; ?>vistas/scripts/noti.js"></script>

    
    
      
 
    

