function registrar() {
    // Obtener los datos del formulario
    var email = document.getElementById("exampleInputEmail1").value;
    var confirmarEmail = document.getElementById("confirmarEmail").value;
    var contraseña = document.getElementById("exampleInputPassword1").value;
    var confirmarContraseña = document.getElementById("confirmarContraseña").value;
    var aceptarTerminos = document.getElementById("exampleCheck1").checked;

    // Validar que los campos no estén vacíos
    if (email.trim() === "" || confirmarEmail.trim() === "" || contraseña.trim() === "" || confirmarContraseña.trim() === "") {
        alert("Por favor, completa todos los campos.");
        return;
    }

    // Validar que los emails coincidan
    if (email !== confirmarEmail) {
        alert("Los correos electrónicos no coinciden.");
        return;
    }

    // Validar que las contraseñas coincidan
    if (contraseña !== confirmarContraseña) {
        alert("Las contraseñas no coinciden.");
        return;
    }

    // Validar que se acepten los términos y condiciones
    if (!aceptarTerminos) {
        alert("Debes aceptar los términos y condiciones.");
        return;
    }

    // Realizar la solicitud AJAX
    $.ajax({
        url: 'registro.php', // Ruta al script PHP que maneja el registro
        type: 'POST',
        data: {
            email: email,
            contraseña: contraseña
        },
        success: function(response){
            // Mostrar la respuesta del servidor
            alert(response);
        },
        error: function(xhr, status, error){
            // Manejar errores de la solicitud AJAX
            console.error(error);
        }
    });
}
