$(document).ready(function(){
    $('#addPictogramas').on('submit',function(e){
        e.preventDefault(); 
        
        var formData = $(this).serialize();

        const nombre = $('#nombre').val();
        const audio = $('#audio').val();
        const imagenInput = $('#imagen')[0].files[0]; 
        const imagen = imagenInput ? imagenInput : '';

        if (imagen) {
            var reader = new FileReader();
            reader.onload = function(event) {
                var imagenBase64 = event.target.result;

                console.log(nombre, audio, imagenBase64);

                $.ajax({
                    url: './php/addPictogramas.php', 
                    type: 'POST',
                    data: {nombre: nombre, audio: audio, imagen: imagenBase64},
                    success: function(response){
                        console.log(response);
                    },
                    error: function(xhr, status, error){
                        console.error(error);
                    }
                });
            };
            // Convertir la imagen a base64
            reader.readAsDataURL(imagenInput);
        } else {
            console.log("No se ha seleccionado ninguna imagen.");
        }
    });
});
