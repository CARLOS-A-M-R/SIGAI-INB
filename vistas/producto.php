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

if($_SESSION['productos']==1)
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
                          <h1 class="box-title">Agregar un nuevo producto <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            
                            <th>Producto</th>
                            <th>Categoria Producto</th>
                            <th>Clasificacion Producto</th>
                            <th>Nombre Producto</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            
                            <th>Producto</th>
                            <th>Categoria Producto</th>
                            <th>Clasificacion Producto</th>
                            <th>Nombre Producto</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label>Producto:</label>
                           
                            <select type="text" class="form-control" name="pro-producto" id="pro-producto" >
                              <option value="">Seleccione Producto</option>
                              <option value="1">PERSONAS</option>
                              <option value="2">EMPRESAS</option>
                              <option value="3">SERVICIOS</option>
                            </select>
                          </div>
                         
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label>Categoria Producto:</label>
                           
                            <input type="text" class="form-control" name="pro-categoria" id="pro-categoria" maxlength="50" placeholder="Nombre" >
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label>Clasificacion Producto:</label>
                           
                            <input type="text" class="form-control" name="pro-clas" id="pro-clas" maxlength="50" placeholder="Nombre" >
                          </div>
                           <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label>Nombre Producto:</label>
                           
                            <input type="text" class="form-control" name="pro-nombre" id="pro-nombre" maxlength="50" placeholder="Nombre" >
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
<script type="text/javascript" src="scripts/producto.js"></script>
<?php
  }
  ob_end_flush();
 ?>
