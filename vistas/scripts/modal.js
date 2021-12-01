
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var Mod = $(this).attr("tcc_cod_consulta_caso");  
           $.ajax({  
                url:"../ajax/caso.php?op=select",  
                method:"post",  
                data:{Mod:Mod},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 }); 

