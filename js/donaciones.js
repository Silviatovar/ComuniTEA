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
                        data: null,
                        title: 'Acciones',
                        render: function (data, type, row) {
                            return '<button onclick="aceptarDonacion()">Aceptar</button>' +
                                '<button onclick="confirmarEliminar()">Eliminar</button>';
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
