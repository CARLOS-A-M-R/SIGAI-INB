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
	$.post("../ajax/caso.php?op=selectCategoria", function(r){
	            $("#tl_area").html(r);
	            $('#tl_area').selectpicker('refresh');

	});
	$.post("../ajax/caso.php?op=selectAnalista", function(r){
	            $("#tl_analista_responsable").html(r);
	            $('#tl_analista_responsable').selectpicker('refresh');
	});

	$.post("../ajax/caso.php?op=selectProducto", function(r){
				$("#tl_producto").html(r);
				$("#tl_producto").selectpicker('refresh');
	});            
}

//Función limpiar
function limpiar()
{
	//$("#tl_analista_responsable").val("");
	$("#tl_fecha").val("");
	$("#tl_descripcion").val("");
	$("#tl_correo_origen").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
	$("#print").hide();
	$("#tl_cod_caso").val("");
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
					url: '../ajax/caso.php?op=listar',
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
		url: "../ajax/caso.php?op=guardaryeditar",
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

function mostrar(tl_cod_caso)
{
	$.post("../ajax/caso.php?op=mostrar",{tl_cod_caso : tl_cod_caso}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#tl_area").val(data.tl_area);
		$('#tl_area').selectpicker('refresh');
		$("#tl_analista_responsable").val(data.tl_analista_responsable);
		$('#tl_analista_responsable').selectpicker('refresh');
		$("#tl_producto").val(data.tl_producto);
		$("#tl_producto").selectpicker('refresh');
		$("#tl_fecha").val(data.tl_fecha);
		$("#tl_correo_origen").val(data.tl_correo_origen);
		$("#tl_descripcion").val(data.tl_descripcion);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/imagenes/"+data.tl_prueba_imagen);
		$("#imagenactual").val(data.tl_prueba_imagen);
 		$("#tl_cod_caso").val(data.tl_cod_caso);
 		generarbarcode();

 	})
}

//Función para desactivar registros
function desactivar(tl_cod_caso)
{
	bootbox.confirm("¿Está Seguro de desactivar el Caso?", function(result){
		if(result)
        {
        	$.post("../ajax/caso.php?op=desactivar", {tl_cod_caso : tl_cod_caso}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(tl_cod_caso)
{
	bootbox.confirm("¿Está Seguro de activar el Caso?", function(result){
		if(result)
        {
        	$.post("../ajax/caso.php?op=activar", {tl_cod_caso : tl_cod_caso}, function(e){
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
function filtrarPro()
{
	var cod_producto = $("#tl_producto").val();

	$.ajax({

		url: "../ajax/caso.php?op=anidarProducto",
		method: "POST",
		data: {
			"codigo_producto":cod_producto
		},
		success: function(r){
			//console.log(r);
			$("#tl_tipo_producto").attr("disabled",false);
			$("#tl_tipo_producto").html(r);
			$('#tl_tipo_producto').selectpicker('refresh');
		} 
	})
	

}

function filtrarCategoriaPro()
{
	var cod_catPro = $("#tl_tipo_producto").val();

	$.ajax({

		url: "../ajax/caso.php?op=anidarCategoriaPro",
		method: "POST",
		data: {
			"codigo_cat_producto":cod_catPro
		},
		success: function(r){
			//console.log(r);
			$("#tl_cat_producto").attr("disabled",false);
			$("#tl_cat_producto").html(r);
			$('#tl_cat_producto').selectpicker('refresh');
		} 
	})
	

}

function filtrarProductos()
{
	var productos = $("#tl_cat_producto").val();

	$.ajax({

		url: "../ajax/caso.php?op=anidarProductos",
		method: "POST",
		data: {
			"producto":productos
		},
		success: function(r){
			$("#tl_cuenta_inversion").attr("disabled",false);
			$("#tl_cuenta_inversion").html(r);
			$("#tl_cuenta_inversion").selectpicker('refresh');
		}
	})
}


init();