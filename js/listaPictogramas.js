
                
function TablaPictogramas() {
    $.ajax({
        type: 'POST',
        url: './php/listaPictogramas.php',
        dataType: 'json',
        success: function (data) {
            // Limpiar la tabla antes de cargar nuevos datos
            if ($('#PictogramasTable').length) {
                $('#PictogramasTable').DataTable().clear().destroy();
            }

            // Construir la tabla utilizando DataTables
            $('#PictogramasTable').DataTable({
                "data": data,
                "responsive": true,
                "columns": [

                    { "data": "imagenURL" },
                    { "data": "nombre" },
                    { "data": "audioURL" },
                    { "data": "categoriaID" },
                    {
                        "data": "acciones",
                        "render": function (data, type, row) {
                            return '<button type="button" class="btn btn-danger eliminarPictoBtn" data-picto-id="' + row.pictogramaID + '">Eliminar</button>';
                
                        }
                    }
                ]
            });
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
            alert('Error al cargar la tabla de categorías. Detalles: ' + xhr.responseText);
        }
    });
}

// Llamar a la función cuando la página esté lista
$(document).ready(function () {
    TablaPictogramas();
});

$(document).ready(function () {
    // Función para eliminar un usuario
    function eliminarPicto(pictogramaID) {
        $.ajax({
            type: "POST",
            url: "./php/administracion/eliminarPictograma.php",
            data: { pictogramaID: pictogramaID },
            success: function (response) {
                alert(response);
                // Volver a cargar la DataTable después de eliminar el usuario
                TablaPictogramas();
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert("Error al eliminar el pictograma. Detalles: " + xhr.responseText);
            }
        });
    }

    // Escuchar clics en botones "Eliminar" en todas las DataTables
    $('body').on('click', '.eliminarPictoBtn', function () {
        var pictogramaID = $(this).data('picto-id');
        eliminarPicto(pictogramaID);
    });
});


