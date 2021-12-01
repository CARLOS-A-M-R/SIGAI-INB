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
                          <h1 class="box-title">Agregar nuevo usuario <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre sesión</th>
                            <th>Clave sesión</th>
                            <th>Usuario</th>
                            <th>Nivel</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre sesión</th>
                            <th>Clave sesión</th>
                            <th>Usuario</th>
                            <th>Nivel</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>

                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                      <form name="formulario" id="formulario" method="POST">
                        <div class="form-group col-lg-2 col-md-2col-sm-2 col-xs-2">
                            <label>Nombre sesión(*):</label>
                            <input type="hidden" name="tcu_cod_sesion" id="tcu_cod_sesion">
                            <input type="text" class="form-control" name="tcu_nombre_sesion" id="tcu_nombre_sesion" placeholder="Sesión usuario" required>
                          </div>
                           <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Clave sesión(*):</label>
                            <input type="password" class="form-control" name="tcu_clave_sesion" id="tcu_clave_sesion" placeholder="Clave usuario" required>
                          </div>
                           <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label>Analista Responsable(*):</label>
                             <select id="tcu_usuario_sistema" name="tcu_usuario_sistema" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                           <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label>Nivel de Usuario(*):</label>
                             <select id="tcu_nivel_usuario" name="tcu_nivel_usuario" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-4 col-sm-6 col-xs-6">
                            <label for="">Permisos</label>
                            <ul style="list-style: none;" id="permisos">
                              
                            </ul>
                            
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

<script type="text/javascript" src="scripts/usuario.js"></script>
<?php
  }
  ob_end_flush();
 ?>
