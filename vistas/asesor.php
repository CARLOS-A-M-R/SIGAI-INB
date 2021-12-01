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
                          <h1 class="box-title">Agregar un nuevo Asesor <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>RFC</th>
                            <th>Opciones</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>RFC</th>
                            <th>Opciones</th>
                          </tfoot>
                        </table>
                    </div>
                     <div class="panel-body" style="height: 600px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                      <!--<p class="panel-title" align="center">Datos</p>-->
                      <fieldset>
                        <legend align="center"><i class="fa fa-user" aria-hidden="true"></i> Datos del Asesor</legend>

                          <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>Nombre(s):</label>
                           <input type="hidden" name="codigo" id="codigo">
                            <input type="text" class="form-control" name="asesor-nombres" id="asesor-nombres" maxlength="50" placeholder="Nombre(s)" >
                          </div>                         
                          <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>Apellidos:</label>
                           
                            <input type="text" class="form-control" name="asesor-apellidos" id="asesor-apellidos" maxlength="50" placeholder="Paterno y Materno" >
                          </div>
                          <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>RFC:</label>
                           
                            <input type="text" class="form-control" name="asesor-RFC" id="asesor-RFC" maxlength="50" placeholder="RFC" >
                          </div>
                           <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>Numero de Registro:</label>
                           
                            <input type="text" class="form-control" name="asesor-registro" id="asesor-registro" maxlength="50" placeholder="Numero de Registro" >
                          </div>
                          <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>Puesto:</label>
                           
                            <input type="text" class="form-control" name="asesor-puesto" id="asesor-puesto" maxlength="50" placeholder="Puesto" >
                          </div>
                      
                        </fieldset>
                        <fieldset>
                          <legend align="center"><i class="fa fa-university" aria-hidden="true"></i> Informacion de la Sucursal</legend>
                        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label>Nombre Sucursal:</label>
                            <input type="text" class="form-control" name="asesor-sucursal" id="asesor-sucursal" maxlength="50" placeholder="Nombre de la Sucursal" > 
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Ubicacion:</label>
                            <input type="text" class="form-control" name="asesor-ubicacion" id="asesor-ubicacion" maxlength="100" placeholder="Ubicacion Sucursal" > 
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label>Gerente:</label>
                            <input type="text" class="form-control" name="asesor-gerente" id="asesor-gerente" maxlength="50" placeholder="Nombre del Gerente" > 
                          </div>
                          </fieldset>

                          <fieldset>
                            <legend align="center"><i class="fa fa-file" aria-hidden="true"></i> Contratos</legend>
                              <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <label>Numero Contrato</label>
                                <input type="text" class="form-control" name="asesor-contrato" id="asesor-contrato" maxlength="50" placeholder="Numero de Contrato" > 
                            </div>
                           
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label>Descripcion</label>
                                <textarea name="asesor-desc" id="asesor-desc" class="form-control" rows="3" placeholder="Descripcion"></textarea> 
                            </div>
                          </fieldset>                   
                         
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
<script type="text/javascript" src="scripts/asesor.js"></script>
<?php
  }
  ob_end_flush();
 ?>
