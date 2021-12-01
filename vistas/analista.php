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

if($_SESSION['usuarios']==1)
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
                          <h1 class="box-title">Agregar nuevo Analista <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Nombre</th>
                            <th>Puesto</th>
                            <th>Gerencia</th>
                            <th>No. registro</th>
                            <th>Correo</th>
                           
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Nombre</th>
                            <th>Puesto</th>
                            <th>Gerencia</th>
                            <th>No. registro</th>
                            <th>Correo</th>
                           </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre Completo(*):</label>
                            <input type="hidden" name="tar_cod_analista" id="tar_cod_analista">
                            <input type="text" class="form-control" name="tar_nombre" id="tar_nombre" placeholder="Nombre(s): y Apellidos" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <label>Puesto(*):</label>
                            <select id="tar_puesto" name="tar_puesto" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Gerencia(*):</label>
                            <select id="tar_gerencia" name="tar_gerencia" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>No. Registro(*):</label>
                            <input type="number" class="form-control" name="tar_numero_registro" id="tar_numero_registro" required placeholder="Numero de empleado">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Email(*):</label>
                            <input type="mail" class="form-control" name="tar_correo" id="tar_correo" required placeholder="Correo electronico">
                          </div>
                          
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
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
<script type="text/javascript" src="../public/js/JsBarcode.all.min.js"></script>
<script type="text/javascript" src="../public/js/jquery.PrintArea.js"></script>
<script type="text/javascript" src="scripts/analista.js"></script>
<?php
  }
  ob_end_flush();
 ?>
