var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})

	$.post("../ajax/analista.php?op=selectP", function(r){
	            $("#tar_puesto").html(r);
	            $('#tar_puesto').selectpicker('refresh');

	});

	$.post("../ajax/analista.php?op=selectG", function(r){
	            $("#tar_gerencia").html(r);
	            $('#tar_gerencia').selectpicker('refresh');

	});
}

//Función limpiar
function limpiar()
{
	$("#tar_nombre").val("");
	//$("#tar_puesto").val("");
	//$("#tar_gerencia").val("");
	$("#tar_numero_registro").val("");
	$("#tar_correo").val("");
	$("#tar_cod_analista").val("");
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
					url: '../ajax/analista.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 20,//Paginación
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
		url: "../ajax/analista.php?op=guardaryeditar",
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

function mostrar(tar_cod_analista)
{
	$.post("../ajax/analista.php?op=mostrar",{tar_cod_analista : tar_cod_analista}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#tar_puesto").val(data.tar_puesto);
		$('#tar_puesto').selectpicker('refresh');
		$("#tar_gerencia").val(data.tar_gerencia);
		$('#tar_gerencia').selectpicker('refresh');
		$("#tar_nombre").val(data.tar_nombre);
		$("#tar_numero_registro").val(data.tar_numero_registro);
		$("#tar_correo").val(data.tar_correo);
		$("#tar_cod_analista").val(data.tar_cod_analista);


 	})
}




init();