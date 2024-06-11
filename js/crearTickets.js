$(document).ready(function(){
    $('#ticketForm').submit(function(e){
        e.preventDefault(); 
        
        var formData = $(this).serialize();

        $.ajax({
            url: '../php/tickets.php', 
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
