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
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Agregar nuevo caso <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>No. Caso</th>
                            <th>Opciones</th>
                            <th>Fecha Origen</th>
                            <th>Fecha Limite</th>
                            <th>Area</th>
                            <th>Analista Responsable</th>
                            <th>Correo Origen</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>No. Caso</th>
                            <th>Opciones</th>
                            <th>Fecha Origen</th>
                            <th>Fecha Limite</th>
                            <th>Area</th>
                            <th>Analista Responsable</th>
                            <th>Correo Origen</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="panel panel-default">
                            <div class="panel-body">
                              <div class="form-group col-md-3 mb-1">
                              
                              <label for="tl_fecha">Fecha Origen(*):</label>
                              <input class="form-control" type="date" id="tl_fecha" name="tl_fecha"  required>
                              </div>
                              <div class="form-group col-md-3 mb-1">
                             
                              <label for="tl_fecha">Fecha Limite(*):</label>
                              <input class="form-control" type="date" id="tl_fecha_limite" name="tl_fecha_limite"  required>
                              </div>
                              <div class="form-group col-md-3 md-1">
                              <label for="">Correo Origen(*)</label>
                              <input type="mail" class="form-control" name="tl_correo_origen" id="tl_correo_origen" required>
                              </div>
                              <div class="form-group col-md-3 md-1">
                              <label for="">Area(*)</label>
                              <input type="text" class="form-control" name="tl_area" id="tl_area" required>
                              </div>
                            <div class="form-group col-md-3 md-1">
                              <label for="">Asunto(*)</label>
                              <input type="text" class="form-control" name="tl_asunto" id="tl_asunto" required>
                            </div>
                            </div>
                          </div>

                    <div class="panel-primary">
                          <div class="panel-heading">
                              <h3 class="panel-title" align="center">Productos</h3>
                          </div>
                        <div class="panel-body">
                          <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-12">
                            <label>Agregar:</label>
                              <a data-toggle="modal" href="../vistas/producto.php">           
                              <button id="btnAgregarArt"  type="button" class="btn btn-primary"> <span class="fa fa-plus"></span></button>
                              </a>
                          </div>
                        <div class="form-group col-md-2">
                              <label for="">Cliente(*):</label>
                              <select id="tl_producto" name="tl_producto" class="form-control selectpicker" data-live-search="true" onchange="filtrarPro()" required>
                                
                             </select>

                          </div>
                              <div class="form-group col-md-3 ">
                              <label for="">Categoria Producto(*):</label>
                              <select id="tl_tipo_producto" name="tl_tipo_producto" class="form-control selectpicker" data-live-search="true" onchange="filtrarCategoriaPro()" disabled ></select>
                           </div>
                          

                          <div class="form-group col-md-3 ">
                              <label for="">Clasificación Producto(*):</label>
                              <select id="tl_cat_producto" name="tl_cat_producto" class="form-control selectpicker" data-live-search="true" onchange="filtrarProductos()" disabled ></select>
                            </div>

                            <div class="form-group col-md-3">
                              <label>Nombre del Producto(*):</label>
                              <select id="tl_cuenta_inversion" name="tl_cuenta_inversion" class="form-control selectpicker" data-live-search="true" disabled></select>
                            </div>




                          </div>
                              
                          </div>

                      <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group col-md-4 mb-1">
                              <label for="">Analista Responsable(*):</label>
                              <select id="tl_analista_responsable" name="tl_analista_responsable" class="form-control selectpicker" data-live-search="true" required></select>
                            </div>

                            <div class="form-group">
                              <textarea name="tl_descripcion" id="tl_descripcion" class="form-control" rows="3" placeholder="Descripcion"></textarea>
                          </div>
                          <div class="form-group col-md-4 mb-1">
                            <label for="">Evidencias:</label>
                            <input type="file" class="form-control" name="tl_prueba_imagen" id="tl_prueba_imagen">
                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <img src="" width="150px" height="120px" id="imagenmuestra">
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                          
                        </div>
                      </div>
                      </form>    
                      </div>

                          
                        
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

<script type="text/javascript" src="<?php echo $dominio; ?>vistas/scripts/caso.js"></script>
<?php
  }
  ob_end_flush();
 ?>
