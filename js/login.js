$(document).ready(function(){
    $('#loginForm').submit(function(e){
        e.preventDefault(); // Evitar el envío del formulario de forma tradicional

        // Obtener los datos del formulario
        var formData = $(this).serialize();

        // Realizar la solicitud AJAX
        $.ajax({
            url: '../php/login.php', // Asegúrate de que esta ruta es correcta y accesible
            type: 'POST',
            data: formData,
            success: function(response){
                // Mostrar la respuesta del servidor
                console.log(response);
                if (response.trim() === "Inicio de sesión exitoso.") {
                    // Si el inicio de sesión es exitoso, puedes redirigir al usuario a otra página
                    window.location.href = 'pagina_principal.html'; // Cambia esto a la página a la que deseas redirigir al usuario
                } else {
                    // Si hay un error de inicio de sesión, muestra un mensaje de error
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
