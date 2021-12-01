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
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                   
                    <!-- /.box-header -->
                    <!-- centro -->
                    <h3 class="text-center my-5" style="color: black;"><i class="fa fa-facebook-square" aria-hidden="true"></i>    <i class="fa fa-instagram" aria-hidden="true"></i>   BUSQUEDA DE REDES SOCIALES   <i class="fa fa-twitter" aria-hidden="true"></i>    <i class="fa fa-linkedin" aria-hidden="true"></i></h3><br><br>
                    <div class="panel-body" style="height: 5000px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-12 col-md-4">
                            <!--Monda = campo1-->
                            <select id="campo1" class="form-control">
                                <option value="" disabled selected>Usuario </option>
                                <option value="CARLOS MEJIA">CARLOS MEJIA</option>
                                <option value="LUIS">LUIS</option>
                                <option value="SAUL HERNANDEZ">SAUL HERNANDEZ</option>
                                <option value="FRIDA">FRIDA</option>
                                <option value="IVAN VALLEJO">IVAN VALLEJO</option>
                            </select>
                        </div>    
                        <div class="form-group col-12 col-md-4">
                            <!--Criptomoneda = campo2-->
                            <select id="campo2" class="form-control">
                                <option value="" disabled selected>Elige red Social</option>
                                <option value="facebook">Facebook</option>
                                <option value="instagram">Instagram</option>
                                <option value="twitter">Twitter</option>
                                <option value="linkedin">Linkedin</option>
                                <option value="youtube">Youtube</option>
                                <option value="google">Google</option>
                                <option value="all">Web</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-4">
                            <input type="submit" class="btn btn-success" value="Buscar">
                        </div>

                           <div class="panel-resultados row justify-content-center mt-5">
                    <div class="contenido-spinner">
                        <div class="spinner">
                            <div class="bounce1"></div>
                        </div>
                    </div>
                    <div class="mensajes col-12"></div>
                    <div id="resultado" class="col-12">
                      <div id="birds" class="col-12"></div>
                    </div>
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
require 'footer.php';
?>
 <script src="../api/api.js"></script>
    <script src="../api/ui.js"></script>
    <script src="../api/app.js"></script>
<?php
  }
  ob_end_flush();
 ?>
 
 <style>  
 * {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 30%;
  padding: 0 5px;
}

/* Remove extra left and right margins, due to padding in columns */
/* .row {margin: 0 -5px;}

/* Clear floats after the columns */
/*.row:after {
  content: "";
  display: table;
  clear: both;
}*/

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}

/* Responsive columns - one column layout (vertical) on small screens */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}
 </style>