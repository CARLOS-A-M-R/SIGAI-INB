<?php 

ob_start();
session_start();

if(!isset($_SESSION["tcu_usuario_sistema"]))
{
  header("Location: login.html");
}
else
{

 ?>

<?php
require 'header.php';
?>

<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         
          <div class="invoice p-3 mb-3">
            <div class="row">
              <div class="col-12">
                 <div class="box-header with-border">
                    <h1 class="box-title"><button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></h1>
                        <div class="box-tools pull-right">
                 </div>
              </div>
              <div class="col-12">
                <h4>
                  <i class="fa fa-globe"></i> Administrador, Inbursa
                  <small class="float-left">Fecha: 09/06/2020</small>
                </h4>
              </div>
            </div>
      
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                <input type="text" id="hola"> 
                <address>
                  <strong>Asunto: FRAUDE COMERCIAL POR TARJETA DE CREDITO.</strong><br>
                    FECHA ALTA: 2020-01-01<br>
                    FECHA LIMITE: 2020-05-01<br>
                    ASIGNO CASO: HECTOR GUSTAVO GUTIERREZ SANCHEZ<br>
                    AREA: PREVENCION DE FRAUDE DELICTIVOS<br>
                    CORREO: FRAUDE@INBURSA.COM
                    PRODUCTO: TARJETA DE CREDTIO CT
                </address>
              </div>
              <div class="col-sm-4 invoice-col">
                
                  <address>
                    <strong>Descripcion</strong><br>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam consequatur quam delectus distinctio, nemo quasi doloremque eum optio pariatur enim hic illum fuga sunt non, blanditiis maxime eligendi expedita sapiente.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab dolores eveniet cupiditate reiciendis corrupti necessitatibus, impedit labore at, ratione nostrum assumenda minus consequatur vitae alias et earum consequuntur quae laboriosam.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio id libero soluta harum et consequuntur natus nisi fugit, cumque obcaecati iure itaque a recusandae illum ab dolores veniam quisquam, unde!
                  </address>
              </div>
              <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
                </div>  
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--Fin-Contenido-->

<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/consultas.js"></script>
<?php
  }
  ob_end_flush();
 ?>