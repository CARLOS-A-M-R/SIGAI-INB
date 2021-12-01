function ventana() {
   
   var tab = window.open('consultas.php', '_blank');



   //console.log(tab);

   //if(tab){

//   	tab.focus();
  // }else{
   	//alert("Pestañas bloquedas, activa las ventanas emergentes (Popups)");
   	//return false;
   //}
}

function detalles(tcc_cod_consulta_caso) {
    // Add User ID to the hidden field for furture usage

   var tab = window.open('consultas.php', '_blank');
   

    $.post("../ajax/caso.php?op=mostrarConsultaCaso", {
            tcc_cod_consulta_caso: tcc_cod_consulta_caso
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
           
            
            $("#hola").val(user.tcc_cod_caso);
           
           console.log(user.tcc_cod_caso);
            
        }
    );
    // Abrir modal popup
    //$("#myModal").modal("show");
   // ventana();
}