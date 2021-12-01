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

if($_SESSION['casos']==1)
{
?>
<!--Contenido-->
<link rel="stylesheet" type="text/css" href="../public/css/modal.css">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Casos de investigación Seguimiento </h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistadoc" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            
                            <th></th>
                            <th></th>
                            <th>No. Caso</th>
                            <th>Fecha Origen</th>
                            <th>Fecha Limite</th>
                            <th>Asunto</th>
                            <th>Cliente</th>
                            <!--<th>Categoria Producto</th>-->
                            <!--<th>Clasificación Producto</th>-->
                            <th>Nombre Producto</th>
                            <th>Asigna Caso</th>
                      
                          
                          </thead>
                          <tbody>

                                                      
                          </tbody>
                          <tfoot>
                            
                            <th></th>
                            <th></th>
                            <th>No. Caso</th>
                            <th>Fecha Origen</th>
                            <th>Fecha Limite</th>
                            <th>Asunto</th>
                            <th>Cliente</th>
                            <!--<th>Producto</th>-->
                            <!--<th></th>-->
                            <th>Nombre Producto</th>
                            <th>Asigna Caso</th>
                            
                           
                          </tfoot>
                        </table>
                    </div>
               
                          
                        
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<!--Iniciamos un modal -->


<!-- Bootstrap Modals --> 
<!-- Modal - Add New Record/User -->
<div class="modal fullscreen-modal  fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Seguimiento caso</h4>
      </div>
      <div class="modal-body">
        
          <form name="formulario" id="formulario" method="POST">
            <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <label>No Caso:</label>
                <input type="text" class="form-control" name="uno" id="uno"  disabled>
              </div>
              <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <label>Fecha Origen:</label>
                <input type="text" class="form-control" name="dos" id="dos"  disabled>
              </div>
              <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <label>Fecha Limite:</label>
                <input style="background-color: red; color: white;" type="text" class="form-control" name="tres" id="tres"  disabled>
              </div>
              <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                
                <label>Asunto:</label>
                  <dialog id="ms" style="width:  400px; height: 150px;">
                    
 
                     <textarea style="height: 117px; width: 370px;" class="form-control" name="cuatro" id="cuatro"  disabled></textarea>
                    
                    
                  </dialog>
                  <!--onclick="document.getElementById('ms').close()-->
                <button style="background-color: blue; color: white;" class="form-control" onmousemove="document.getElementById('ms').showModal()" >Ver Asunto</button>
                
              </div>
              <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <label>Asigna Caso:</label>
                <input type="text" class="form-control" name="cinco" id="cinco"  disabled>
              </div>
              <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <label>Area:</label>
                <input type="text" class="form-control" name="seis" id="seis"  disabled>
              </div>
              <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <label>Correo Origen:</label>
                <input type="text" class="form-control" name="siete" id="siete"  disabled>
              </div>
              <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                
                <label>Descripción:</label>
                  <dialog id="ms1" style="width:  570px; height: 200px;">
                    
 
                     <textarea style="width: 540px; height: 100px;" class="form-control" name="descripcion2" id="descripcion2"  disabled></textarea>
                    
                    
                  </dialog>
                  <!--onclick="document.getElementById('ms').close()-->
                <button style="background-color: gray; color: white;" class="form-control" onmousemove="document.getElementById('ms1').showModal()" >Ver Descripción</button>
                
              </div>
              <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                
                <label>Producto:</label>
                  <dialog id="ms2" style="width:  300px; height: 350px;">
                    
                     <h3>Caracteristicas Producto</h3>
                     <label>Cliente:</label>
                     <input type="text" class="form-control" name="ocho" id="ocho"  disabled>
                     <label>Categoria:</label>
                     <input type="text" class="form-control" name="nueve" id="nueve"  disabled>
                     <label>Clasificación:</label>
                     <input type="text" class="form-control" name="diez" id="diez"  disabled>
                     <label>Nombre:</label>
                     <input type="text" class="form-control" name="once" id="once"  disabled>
                    
                    
                  </dialog>
                  <!--onclick="document.getElementById('ms').close()-->
                <button style="background-color: gray; color: white;" class="form-control" onmousemove="document.getElementById('ms2').showModal()" >Ver Producto</button>
                
              </div>
              <div id="nuevoDetalle">
              <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <label>RFC:</label>
                <input type="text" class="form-control" name="cli-rfc" id="cli-rfc" maxlength="50" placeholder="RFC" >
              </div>
              <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <label>ID Persona:</label>
                <input type="text" class="form-control" name="cli-persona" id="cli-persona" maxlength="50" placeholder="ID Persona" >
              </div>
              <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <label>Numero de Cuenta:</label>
                <input type="text" class="form-control" name="cli-ncuenta" id="cli-ncuenta" maxlength="50" placeholder="Numero Cuenta" >
              </div>
              <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <label>Nombre / Razon Social:</label>
                  <input type="text" class="form-control" name="cli-razonS" id="cli-razonS" maxlength="256" placeholder="Nombre / Razon Social">
               </div>
               <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-12">
                  <label>Buscar:</label>
                  <a data-toggle="modal" href="#cliente">           
                  <button id="btnAgregarArt"  type="button" class="btn btn-primary"> <span class="fa fa-search"></span></button>
                  </a>
               </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label>Situacion actual:</label>
                  <textarea class="form-control" name="cli-situacion" id="cli-situacion"></textarea>
               </div>
               <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label>Seguimiento:</label>
                  <textarea class="form-control" name="cli-seguimiento" id="cli-seguimiento"></textarea>
               </div>
               <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label>Observaciones:</label>
                  <textarea class="form-control" name="cli-observaciones" id="cli-observaciones"></textarea>
               </div>

               </div>

                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                  <button class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                </div>

          </form>
        
       
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<!-- // Modal --> 
   <!-- Modal -->
  <div class="modal fullscreen-modal fade" id="cliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione Cliente</h4>
        </div>
        <div class="modal-body">
          <table id="tblarticulos" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <th></th>
                <th>RFC</th>
                <th>ID Persona</th>
                <th>Numero de Cuenta</th>
                <th>Nombre/Razon Social</th>
                <th>Situación Actual</th>
                <th>Seguimiento</th>
                <th>Observaciones</th>
            </thead>
            <tbody>
              
            </tbody>
            <tfoot>
                <th></th>
                <th>RFC</th>
                <th>ID Persona</th>
                <th>Numero de Cuenta</th>
                <th>Nombre/Razon Social</th>
                <th>Situación Actual</th>
                <th>Seguimiento</th>
                <th>Observaciones</th>
            </tfoot>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>        
      </div>
    </div>
  </div>  
  <!-- Fin modal -->

  <!--Termina el modal-->



<?php
}
else
{
  require 'noacceso.php';
}
require 'footer.php';
?>

<script type="text/javascript" src="scripts/casoC.js"></script>
<script type="text/javascript" src="scripts/modal.js"></script>
<script type="text/javascript" src="scripts/consultas.js"></script>

<?php
  }
  ob_end_flush();
 ?>
