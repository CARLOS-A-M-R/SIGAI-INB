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
                <h4>
                  <i class="fa fa-globe"></i> Administrador, Inbursa
                  <small class="float-left">Fecha: 09/06/2020</small>
                </h4>
              </div>
            </div>
             <?php 

             require_once "../modelos/Caso.php";

             $caso=new Caso();

              $_SESSION['tcu_usuario_sistema'];
              $sesion_actual=$_SESSION['tcu_usuario_sistema'];

              $rspta=$caso->seguimientoCasos($sesion_actual);
              //Vamos a declarar un array
             while ($reg = $rspta->fetch_object())
              {
              $asigna =$reg->Asigna;

               }
   
            ?>
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                Caso: 
                <address>
                  <strong>No. caso: <?php echo $asigna; ?></strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                </address>
              </div>
              <div class="col-sm-4 invoice-col">
                To
                  <address>
                    <strong>John Doe</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                    Email: john.doe@example.com
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
<script type="text/javascript" src="scripts/categoria.js"></script>
<?php
  }
  ob_end_flush();
 ?>