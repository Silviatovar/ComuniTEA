$(document).ready(function(){
    $('#loginForm').submit(function(e){
        e.preventDefault(); 
        var formData = $(this).serialize();

        $.ajax({
            url: '../php/login.php', 
            type: 'POST',
            data: formData,
            success: function(response){
               
                if (response.status === 'success') {
                    window.location.href = 'proyecto.html'; 
                } else {
                   
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr, status, error){
               
                console.error(error);
            }
        });
    });
});
