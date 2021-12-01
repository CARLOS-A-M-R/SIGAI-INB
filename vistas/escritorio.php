<?php 

ob_start();
session_start();

if(!isset($_SESSION["tcu_usuario_sistema"]))
{
  header("Location: login.html");
}
else
{

require 'header.php';


if($_SESSION['escritorio']==1)
{

?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Escritorio </h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    
                 	<div class="panel-body">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                      <div class="small-box bg-green">
                        <div class="inner">
                          <h4 style="font-size: 17px;">
                            <strong></strong>
                          </h4>
                          <p>En tramite</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="caso.php" class="small-box-footer">Casos <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                      <div class="small-box bg-yellow">
                        <div class="inner">
                          <h4 style="font-size: 17px;">
                            <strong></strong>
                          </h4>
                          <p>Pendiente</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="caso.php" class="small-box-footer">Casos <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h4 style="font-size: 17px;">
                            <strong></strong>
                          </h4>
                          <p>Concluido</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="caso.php" class="small-box-footer">Casos <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>    
                  </div>


                  <div class="panel body" style="height: 400px;">
                    
                  </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php

}
else
{
require 'noacceso.php';
}
require 'footer.php';
?>

<?php
  }
  ob_end_flush();
 ?>