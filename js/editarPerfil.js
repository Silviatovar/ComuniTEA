// Escuchamos el evento submit del formulario
document.getElementById("updateForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita que el formulario se envíe normalmente

    // Obtenemos los valores del formulario
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    // Creamos un objeto con los datos a enviar
    var data = {
        username: username,
        email: email,
        password: password
    };

    // Realizamos la llamada AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/editarPerfil.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Mostramos la respuesta del servidor
            alert(xhr.responseText);
        }
    };
    xhr.send(JSON.stringify(data));
});
