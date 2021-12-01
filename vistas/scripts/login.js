info();
$('#frmAcceso').on('submit',function(e)
{

	e.preventDefault();
	logina=$("#logina").val();
	clavea=$("#clavea").val();

	$.post("../ajax/usuario.php?op=verificar",
	{
		"logina":logina, "clavea":clavea
	},
	function(data)
	{

		if(data!="null")
		{
			//var mensaje = '<h1>HOLA QUE PASA<h1>';
	
			//ingreso();
			$(location).attr("href","escritorio.php");
			ingreso();
			//bootbox.alert("HOLA");
			//console.log("HOLA QUE PASE"+logina);
			//'<div class="alert alert-primary" role="alert">HOLA QUE PASA</div>';
		}else{

			var nombre = '<p class="text-center mb-0"><i class="fa fa-cog fa-spin fa-2x fa-fw"></i> <span>Usuario y/o Contraseña incorrectos</span></p>';

			//bootbox.alert("Usuario y/o Contraseña incorrectos");
			bootbox.alert(nombre);
		}

	});

	});

function info()
{

$.post( "../ajax/usuario.php?op=informacion", function( data ) {
  //alert( "Data Loaded: " + data );
});
	
	}

function ingreso()
{
	$.post( "../ajax/usuario.php?op=ingreso", function( data ) {
	  //alert( "Data Loaded: " + data );
});
	
}




	

	

