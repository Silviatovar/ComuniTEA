// Esta función se encarga de cargar las categorías en el select
function cargarCategorias() {
    $.ajax({
        type: 'GET',
        url: './php/cargarCategorias.php',
        dataType: 'json',
        success: function(categorias) {
            // Limpiar el select
            $('#categoriaID').empty();
            // Añadir una opción por cada categoría
            categorias.forEach(function(categoria) {
                $('#categoriaID').append(`<option value="${categoria.categoriaID}">${categoria.nombre}</option>`);
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

$(document).ready(function() {
    // Llama a la función para cargar las categorías cuando el documento esté listo
    cargarCategorias();

    $('#addPictogramas').on('submit', function(e) {
        e.preventDefault();

        const nombre = $('#nombre').val();
        const audio = $('#audio').val();
        const categoriaID = $('#categoriaID').val(); // Obtener el categoriaID seleccionado
        const imagenInput = $('#imagen')[0].files[0];
        
        // Verificar el tamaño del archivo (en bytes)
        const maxSize = 1 * 1024 * 1024; // 10 MB (por ejemplo, ajusta según tus necesidades)
        if (imagenInput && imagenInput.size > maxSize) {
            alert('El archivo de imagen es demasiado grande. Por favor, suba uno más pequeño.');
            return;
        }

        if (imagenInput) {
            var reader = new FileReader();
            reader.onload = function(event) {
                var imagenBase64 = event.target.result;

                console.log(nombre, audio, imagenBase64, categoriaID);

                $.ajax({
                    url: './php/addPictogramas.php',
                    type: 'POST',
                    data: {
                        nombre: nombre,
                        audio: audio,
                        imagen: imagenBase64,
                        categoriaID: categoriaID
                    },
                    success: function(response) {
                        location.reload();
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
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
