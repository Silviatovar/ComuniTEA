document.getElementById("updateForm").addEventListener("submit", function(event) {
    event.preventDefault(); 


    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;


    var data = {
        username: username,
        email: email,
        password: password
    };

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/editarPerfil.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText);
        }
    };
    xhr.send(JSON.stringify(data));
});
