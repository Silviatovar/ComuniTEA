$(document).ready(function() {
    $('#historyModal').click(function() {
        // Limpiar el contenido previo del modal
        $('#cuerpoMsj').empty();

        // Hacer la solicitud AJAX para obtener los tickets del usuario
        $.ajax({
            method: "POST",
            url: "./php/obtenerTicketsUsuario.php",
            success: function(response) {
                let allDataFromUser = JSON.parse(response);

                $.each(allDataFromUser, function() {
                    // Iterar sobre los mensajes de cada ticket
                    for (let i = 0; i < this.mensaje.length; i++) {
                        if (this.mensaje[i] != null) {
                            $('#cuerpoMsj').append($('<p>', {
                                html: this.id_ticket + " " + this.fecha_inicio + " : " + "<br/>" + this.mensaje[i] + "<br/>" + "Enviado por: " + " <span class='write'>" + this.open_by + "  </span>" + " <span class='status'>(" + this.status + ")</span>",
                                class: "p-2"
                            }));
                        }
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error("Error al obtener datos:", error);
            }
        });
    });
});