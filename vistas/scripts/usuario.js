var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})

	//Cargamos los items al select categoria

	$.post("../ajax/usuario.php?op=permisos&id=", function(r){
	            $("#permisos").html(r);
	          
	});
	
	$.post("../ajax/usuario.php?op=selectAnalista", function(r){
	            $("#tcu_usuario_sistema").html(r);
	            $('#tcu_usuario_sistema').selectpicker('refresh');
	});

	$.post("../ajax/usuario.php?op=selectNU", function(r){
	            $("#tcu_nivel_usuario").html(r);
	            $('#tcu_nivel_usuario').selectpicker('refresh');
	});
          
}

//Función limpiar
function limpiar()
{
	$("#tcu_nombre_sesion").val("");
	$("#tcu_clave_sesion").val("");
	$("#tcu_cod_sesion").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/usuario.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/usuario.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}

function mostrar(tcu_cod_sesion)
{
	$.post("../ajax/usuario.php?op=mostrar",{tcu_cod_sesion : tcu_cod_sesion}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#usuarioCuenta").val(data.tcu_usuario_sistema);
		$('#usuarioCuenta').selectpicker('refresh');
		$("#tcu_nivel_usuario").val(data.tcu_nivel_usuario);
		$('#tcu_nivel_usuario').selectpicker('refresh');
		$("#tcu_nombre_sesion").val(data.tcu_nombre_sesion);
		$("#tcu_clave_sesion").val(data.tcu_clave_sesion);
 		$("#tcu_cod_sesion").val(data.tcu_cod_sesion);
 		

 	});

 		$.post("../ajax/usuario.php?op=permisos&id="+tcu_cod_sesion, function(r){
	            $("#permisos").html(r);
	          
	});


}

//Función para desactivar registros
function desactivar(tcu_cod_sesion)
{
	bootbox.confirm("¿Está Seguro de desactivar Usuario?", function(result){
		if(result)
        {
        	$.post("../ajax/usuario.php?op=desactivar", {tcu_cod_sesion : tcu_cod_sesion}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(tcu_cod_sesion)
{
	bootbox.confirm("¿Está Seguro de activar al Usuario?", function(result){
		if(result)
        {
        	$.post("../ajax/usuario.php?op=activar", {tcu_cod_sesion : tcu_cod_sesion}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//función para generar el código de barras
/*function generarbarcode()
{
	tl_analista_responsable=$("#tl_analista_responsable").val();
	JsBarcode("#barcode", tl_analista_responsable);
	$("#print").show();
}

//Función para imprimir el Código de barras
function imprimir()
{
	$("#print").printArea();
}*/

init();