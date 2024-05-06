
$(document).ready(function(){
    $('#formularioDonacion').submit(function(e){
        e.preventDefault(); // Evitar el envío del formulario tradicional
        
        var formData = $(this).serialize();
  
        $.ajax({
            url: '../php/donaciones.php', // Ruta al script PHP que maneja el registro
            type: 'POST',
            data: formData,
            success: function(response){
                // Mostrar la respuesta del servidor
                console.log(response);
            },
            error: function(xhr, status, error){
                // Manejar errores de la solicitud AJAX
                console.error(error);
            }
        });
    });
  });
  