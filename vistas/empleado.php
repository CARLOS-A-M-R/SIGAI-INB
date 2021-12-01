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

if($_SESSION['empleados']==1)
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
                          <h1 class="box-title">Agregar un nuevo empleado <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            
                            <th>Nombre(s)</th>
                            <th>Apellidos</th>
                            <th>ID</th>
                            <th>opciones</th>
                            
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            
                            <th>Nombre(s)</th>
                            <th>Apellidos</th>
                            <th>ID</th>
                            <th>opciones</th>
                            
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 700px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                      <!--<p class="panel-title" align="center">Datos</p>-->
                      <fieldset>
                        <legend align="center"><i class="fa fa-user" aria-hidden="true"></i> Datos del empleado</legend>

                          <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>Nombre(s):</label>
                           <input type="hidden" name="codigo" id="codigo">
                            <input type="text" class="form-control" name="emp-nombres" id="emp-nombres" maxlength="50" placeholder="Nombre(s)" >
                          </div>                         
                          <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>Apellidos:</label>
                           
                            <input type="text" class="form-control" name="emp-apellidos" id="emp-apellidos" maxlength="50" placeholder="Paterno y Materno" >
                          </div>
                          <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>ID:</label>
                           
                            <input type="text" class="form-control" name="emp-ID" id="emp-ID" maxlength="50" placeholder="ID" >
                          </div>
                           <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>Numero de Registro:</label>
                           
                            <input type="text" class="form-control" name="emp-registro" id="emp-registro" maxlength="50" placeholder="Numero de Registro" >
                          </div>
                           <div class="form-group col-lg-3 col-md-3 col-sm-3   col-xs-12">
                            <label>Gerencia:</label>
                           
                            <input type="text" class="form-control" name="emp-gerencia" id="emp-gerencia" maxlength="50" placeholder="Gerencia" >
                          </div>
                           <div class="form-group col-lg-3 col-md-3 col-sm-3   col-xs-12">
                            <label>Jefe a Cargo:</label>
                           
                            <input type="text" class="form-control" name="emp-jefe" id="emp-jefe" maxlength="50" placeholder="Jefe a cargo" >
                        
                          </div>
                          <div class="form-group col-md-4 mb-1">
                            <label for="">Fotografia:</label>
                            <input type="file" class="form-control" name="emp-foto" id="emp-foto">
                            <input type="hidden" name="emp-foto-actual" id="emp-foto-actual">
                            <img src="" width="150px" height="120px" id="emp-foto-muestra">
                          </div>


                        </fieldset>
                        <fieldset>
                          <legend align="center"><i class="fa fa-desktop" aria-hidden="true"></i> Informacion de Trabajo</legend>
                        <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>Direcion IP:</label>
                            <input type="text" class="form-control" name="emp-IP" id="emp-IP" maxlength="50" placeholder="Direccion IP" > 
                          </div>
                          <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>Dominio:</label>
                            <input type="text" class="form-control" name="emp-dominio" id="emp-dominio" maxlength="50" placeholder="Nombre del Dominio" > 
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label>Usuario PC:</label>
                            <input type="text" class="form-control" name="emp-PC" id="emp-PC" maxlength="50" placeholder="Usuario PC" > 
                          </div>
                          </fieldset>

                          <fieldset>
                            <legend align="center"><i class="fa fa-laptop" aria-hidden="true"></i> Redes Sociales</legend>
                              <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label><i class="fa fa-facebook-square" aria-hidden="true"></i>  Facebook:</label>
                                <input type="text" class="form-control" name="redes-facebook" id="redes-facebook" maxlength="50" placeholder="Url Facebook" > 
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label><i class="fa fa-instagram" aria-hidden="true"></i>  Instagram:</label>
                                <input type="text" class="form-control" name="redes-insta" id="redes-insta" maxlength="50" placeholder="Url Instagram" > 
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label><i class="fa fa-twitter" aria-hidden="true"></i> Twitter:</label>
                                <input type="text" class="form-control" name="redes-twitter" id="redes-twitter" maxlength="50" placeholder="Url Twitter" > 
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label><i class="fa fa-linkedin" aria-hidden="true"></i> Linkedin:</label>
                                <input type="text" class="form-control" name="redes-linkedin" id="redes-linkedin" maxlength="50" placeholder="Url Linkedin" > 
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label>Descripcion</label>
                                <textarea name="emp-desc" id="emp-desc" class="form-control" rows="3" placeholder="Descripcion"></textarea> 
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
<script type="text/javascript" src="scripts/empleado.js"></script>
<?php
  }
  ob_end_flush();
 ?>
