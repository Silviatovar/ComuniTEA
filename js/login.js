$(document).ready(function(){
    $('#loginForm').submit(function(e){
        e.preventDefault(); 

        var formData = $(this).serialize();

        $.ajax({
            url: '../php/login.php', 
            type: 'POST',
            data: formData,
            success: function(response){
                console.log(response);
                if (response.trim() === "Inicio de sesión exitoso.") {
                    window.location.href = '../pinicio.php'; 

                } else {
             
                    alert("Error de inicio de sesión: " + response);
                }
            },
            error: function(xhr, status, error){
                console.error("Error AJAX: " + error);
                alert("Error en la solicitud. Ver consola para más detalles.");
            }
        });
    });
});

