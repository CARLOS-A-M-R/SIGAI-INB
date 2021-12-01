var tabla;
var tablon;


function init(){
	listarSeguimiento();
  listarClientes();
	

	
}

function listarSeguimiento()
{
	tabla=$('#tbllistadoc').dataTable(
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
					url: '../ajax/caso.php?op=listarSeguimiento',
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

/*function mostrarC(tcc_cod_consulta_caso)
{
	$.post("../ajax/caso.php?op=mostrarConsultaCaso",{tcc_cod_consulta_caso : tcc_cod_consulta_caso}, function(data, status)
	{
		data = JSON.parse(data);		
	

		$("#uno").val(data.tcc_cod_caso);
		$("#dos").val(data.tcc_cod_sesion);
		$("#tres").val(data.tcc_notificar_caso);
		$("#cuatro").val(data.tcc_fecha_alta);
		$("#cinco").val(data.tcc_estado_caso);
 		$("#tcc_cod_consulta_caso").val(data.tcc_cod_consulta_caso);
 		

 	});


}*/

function GetUserDetails(tcc_cod_consulta_caso) {
    // Add User ID to the hidden field for furture usage

    $.post("../ajax/caso.php?op=mostrarConsultaCaso", {
            tcc_cod_consulta_caso: tcc_cod_consulta_caso
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
           
            
            $("#uno").val(user.tcc_cod_caso);
            $("#dos").val(user.tl_fecha);
            $("#tres").val(user.tl_fecha_limite);
            $("#cuatro").val(user.tl_asunto);
            $("#cinco").val(user.Asigna);
            $("#seis").val(user.tl_area);
            $("#siete").val(user.tl_correo_origen);
            $("#ocho").val(user.tcp_nombre_cliente_pro);
            $("#nueve").val(user.tpc_nombre_categoria_pro);
            $("#diez").val(user.tcp_nombre_clasificacion);
            $("#once").val(user.tmp_nombre_producto);
            $("#descripcion2").val(user.tl_descripcion);

           
            
        }
    );
    // Abrir modal popup
    //$("#myModal").modal("show");
}



function listarClientes()
{

  var prueba = $('#uno').val();
  tablon=$('#tblarticulos').dataTable(
  {
    "aProcessing": true,//Activamos el procesamiento del datatables
      "aServerSide": true,//Paginación y filtrado realizados por el servidor
      dom: 'Bfrtip',//Definimos los elementos del control de tabla
      buttons: [              
                
            ],
    "ajax":
        {
          url: '../ajax/caso.php?op=listarClientes',
          type : "get", 
          dataType : "json",
          data: {
      "informacion":prueba
    },
          error: function(e){
            console.log(e.responseText); 

          }
        },
    "bDestroy": true,
    "iDisplayLength":10,//Paginación
      "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
  }).DataTable();
  
}


 function hacer_click()
    {
        //alert("Me haz dado un click");
        //$("#dialog").modal("show");
        console.log("enviando....");
    }

     function abrirModal()
    {
        console.log("enviando...")
        //alert("Me haz dado un click");
        //$("#myModal").modal("show");
    }


    function hacer_hover()
    {
         alert("Estas sobre mi!");
    }

    function salir_del_hover()
    {
        alert("Adios!");
    }

    function cargar_pagina()
    {
        alert("Ya se ha cargado el sitio web");
    }


  
    const formulario = document.querySelector('#formulario');

      formulario.addEventListener('submit',(e) => {
      e.preventDefault();



  //console.log('enviando...');


  
          const campo_rfc = document.querySelector('#cli-rfc').value;
          const campo_razonS = document.querySelector('#cli-razonS').value;
          const campo_persona = document.querySelector('#cli-persona').value;
          const campo_cuenta = document.querySelector('#cli-ncuenta').value;
          const campo_situacion = document.querySelector('#cli-situacion').value;
          const campo_seguimiento = document.querySelector('#cli-seguimiento').value;
          const campo_observaciones = document.querySelector('#cli-observaciones').value;
          const campo_uno = document.querySelector('#uno').value;


          if(campo_rfc === '' || campo_razonS === '' ){
       
            bootbox.alert('Nombre y/o Razon Social no son validas ')
              }

            else{
              //console.log('existe');
            $.ajax({
            url: "../ajax/caso.php?op=guardarSeguimiento",
            type: "post",
            data: { tci_rfc: campo_rfc, tci_razon_social: campo_razonS, tci_id_persona: campo_persona, tci_numero_cuenta: campo_cuenta,
            tci_situacion_actual: campo_situacion, tci_seguimiento: campo_seguimiento, tci_observaciones: campo_observaciones,
            tci_cod_caso: campo_uno},
            success: function (datos) {
            
            //console.log(data);  
         
            bootbox.alert(datos);  
          
            }
          });

}

} );

      function agregarCliente(id_cliente)
      {

    $("table tbody tr").click(function() {

    var uno = $(this).find("td:eq(1)").text();  
    var dos = $(this).find("td:eq(2)").text();  
    var tres = $(this).find("td:eq(3)").text();
    var cuatro = $(this).find("td:eq(4)").text();  
    var cinco = $(this).find("td:eq(5)").text();  
    var seis= $(this).find("td:eq(6)").text();
    var siete= $(this).find("td:eq(7)").text();
  
    //var total = uno+'\n'+dos +'\n'+tres+'\n'+cuatro+'\n'+cinco+'\n'+seis;

 
  $('#cli-rfc').val(uno);
  $('#cli-persona').val(dos);
  $('#cli-ncuenta').val(tres);
  $('#cli-razonS').val(cuatro);
  $('#cli-situacion').val(cinco);
  $('#cli-seguimiento').val(seis);
  $('#cli-observaciones').val(siete);



  $("#cliente").modal("hide");
});



      }

      function cargarControlador()
    {

      const valornuevo = querySelector('#cliente').values;
      const valorRemplazo = querySelector('#bloqueo').value;






    }

      
  


  

/*$(function (e) {

          e.preventDefault();

        $('#btnGuardar').click(function () {



          var campo_rfc = $('#cli-rfc').val();
          var campo_razonS = $('#cli-razonS').val();
          var campo_persona = $('#cli-persona').val();
          var campo_cuenta = $('#cli-ncuenta').val();
          var campo_situacion = $('#cli-situacion').val();
          var campo_seguimiento = $('#cli-seguimiento').val();
          var campo_observaciones = $('#cli-observaciones').val();
          var campo_uno = $('#uno').val();
          //var password2 = $('#password').val();
         // var gender2 = $('#gender').val();
          console.log('starting ajax');
          //console.log(name2);
          //console.log(email2);
          $.ajax({
            url: "../ajax/caso.php?op=guardarSeguimiento",
            type: "post",
            data: { tci_rfc: campo_rfc, tci_razon_social: campo_razonS, tci_id_persona: campo_persona, tci_numero_cuenta: campo_cuenta,
              tci_situacion_actual: campo_situacion, tci_seguimiento: campo_seguimiento, tci_observaciones: campo_observaciones,
              tci_cod_caso: campo_uno},
            success: function (data) {
            
            //console.log(data);  
            bootbox.alert(data);
            }
          });

        });
      });

*/
init();