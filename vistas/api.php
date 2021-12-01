<?php 
require 'header.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Social </title>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
    
    
   
</head>
<body>
    <h3 class="text-center my-5" style="color: white;"><i class="fa fa-facebook-square" aria-hidden="true"></i>    <i class="fa fa-instagram" aria-hidden="true"></i>   BUSQUEDA DE REDES SOCIALES   <i class="fa fa-twitter" aria-hidden="true"></i>    <i class="fa fa-linkedin" aria-hidden="true"></i></h3><br><br>
    <div class="container contenido-principal">

        <div class="row justify-content-center">
            <form class="col-10 col-md-8" id="formulario">
                <div class="formulario-cotizar row">
                        <div class="form-group col-12 col-md-4">
                            <!--Monda = campo1-->
                            <select id="campo1" class="form-control">
                                <option value="" disabled selected>Usuario </option>
                                <option value="FRIDA SOPHIA COBA">FRIDA SOPHIA COBA</option>
                                <option value="LUIS">LUIS</option>
                                <option value="SAUL">SAUL</option>
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
                                <option value="web">Web</option>
                            </select>
                        </div>
                     
                        <div class="form-group col-12 col-md-4">
                            <input type="submit" class="btn btn-success" value="Buscar">
                        </div>
                </div><!--.formulario-cotizar-->

                <div class="panel-resultados row justify-content-center mt-5">
                    <div class="contenido-spinner">
                        <div class="spinner">
                            <div class="bounce1"></div>
                        </div>
                    </div>
                    <div class="mensajes col-12"></div>
                    <div id="resultado" class="col-12"></div>
                </div><!--panel-resultados-->
            </form>
        </div> 
    </div>




</body>
</html>
<?php require 'footer.php'; ?>
    <script src="../api/api.js"></script>
    <script src="../api/ui.js"></script>
    <script src="../api/app.js"></script>


<style>
#contenedor {
  width: 700px;
}
#cabecera {
}
#menu {
  float: left;
  width: 150px;
}
#contenido {
  float: left;
  width: 550px;
}
#pie {
  clear: both;
}
.contenedores{
    width: 90;
    overflow: hidden;
    margin: 20px auto;
    padding: 20px;
}

.contenedores ul{
    padding: : 0px;
    margin: 8px;
}

.contenedores ul li{
    list-style: none;
    float: left;
    width: 20%;
    height: 300px;
    background: white;
    margin: 40px 40px 0px 55px;
}


</style>