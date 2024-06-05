function TablaDonaciones() {
    $.ajax({
        type: 'POST',
        url: './php/listaDonaciones.php',
        dataType: 'json',
        success: function (data) {
            // Limpiar la tabla antes de cargar nuevos datos
            if ($('#DonacionesTable').length) {
                $('#DonacionesTable').DataTable().clear().destroy();
            }

            // Construir la tabla utilizando DataTables
            $('#DonacionesTable').DataTable({
                "data": data,
                "responsive": true,
                "columns": [
                    { data: "usuarioID" },
                    { data: "nombre" },
                    { data: "email" },
                    { data: "monto" }, 
                    { data: "fecha" },
                    { data: "mensaje" },
                    {
                        "data": "acciones",
                            "render": function (data, type, row) {
                                return '<button type="button" class="btn btn-danger eliminarDonacionBtn" data-donacion-id="' + row.donacionID + '">Cancelar</button>';
                    
                        }
                    }
                ]
            });
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
            alert('Error al cargar la tabla de donaciones. Detalles: ' + xhr.responseText);
        }
    });
}

// Llamar a la función cuando la página esté lista
$(document).ready(function () {
    TablaDonaciones();
});

$(document).ready(function () {
    // Función para eliminar un usuario
    function eliminarDonacion(donacionID) {-
        $.ajax({
            type: "POST",
            url: "./php/administracion/cancelarDonacion.php",
            data: { donacionID: donacionID },
            success: function (response) {
                alert(response);
                // Volver a cargar la DataTable después de eliminar el usuario
                TablaDonaciones();
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert("Error al eliminar usuario. Detalles: " + xhr.responseText);
            }
        });
    }

    // Escuchar clics en botones "Eliminar" en todas las DataTables
    $('body').on('click', '.eliminarDonacionBtn', function () {
        var donacionID = $(this).data('donacion-id');
        eliminarDonacion(donacionID);
    });
});
