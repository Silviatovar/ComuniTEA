$(document).ready(function(){
    $('#loginForm').submit(function(e){
        e.preventDefault(); 

        var formData = $(this).serialize();

        // Realizar la solicitud AJAX
        $.ajax({
            url: '../php/login.php', 
            type: 'POST',
            data: formData,
            success: function(response){
                // Mostrar la respuesta del servidor
                console.log(response);
                if (response.trim() === "Inicio de sesión exitoso.") {
                 
                    window.location.href = 'pagina_principal.html'; 
                } else {
             
                    alert("Error de inicio de sesión: " + response);
                }
            },
            error: function(xhr, status, error){
                // Manejar errores de la solicitud AJAX
                console.error("Error AJAX: " + error);
                alert("Error en la solicitud. Ver consola para más detalles.");
            }
        });
    });
});
