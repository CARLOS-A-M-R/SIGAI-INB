      function myFunction() {
        $.ajax({
          url: "../ajax/notificar.php?op=notificaciones",
          type: "POST",
          processData:false,
          success: function(data){
            $("#notification-count").remove();                  
            $("#notification-latest").show();$("#notification-latest").html(data);
          },
          error: function(){}           
        });
      }

      function agregar(e)
{
  e.preventDefault(); //No se activará la acción predeterminada del evento
  $("#btnGuardar").prop("disabled",true);
  var formData = new FormData($("#frmNotification")[0]);

  $.ajax({
    url: "../ajax/notificar.php?op=agregar",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,

      success: function(datos)
      {                    
            console.log(datos);          
            
      }

  });
  //limpiar();
}
                                 
      $(document).ready(function() {
        $('body').click(function(e){
          if ( e.target.id != 'notification-icon'){
            $("#notification-latest").hide();
          }
        });
      });  