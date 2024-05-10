$(document).ready(function(){
    $('#registroForm').submit(function(e){
        e.preventDefault(); 
        
        var formData = $(this).serialize();

        $.ajax({
            url: '../php/registro.php', 
            type: 'POST',
            data: formData,
            success: function(response){
                console.log(response);
            },
            error: function(xhr, status, error){
                console.error(error);
            }
        });
    });
});
