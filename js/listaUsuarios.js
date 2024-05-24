
function TablaUsuarios() {
    $.ajax({
        type: 'POST',
        url: './php/listaUsuarios.php',
        dataType: 'json',
        success: function (data) {
            // Limpiar la tabla antes de cargar nuevos datos
            if ($('#UsuariosTable').length) {
                $('#UsuariosTable').DataTable().clear().destroy();
            }

            // Construir la tabla utilizando DataTables
            $('#UsuariosTable').DataTable({
                "data": data,
                "responsive": true,
                "columns": [
                    { data: "usuarioID" },
                    { data: "nombre" },
                    { data: "email" },
                    { data: "rol" },
                    {
                        data: null,
                        title: 'Acciones',
                        render: function (data, type, row) {
                            return '<button onclick="modificarUsuarioTabla(\'' + row.username + '\')">Modificar</button>' +
                                '<button onclick="eliminarUsuario(\'' + row.username + '\')">Eliminar</button>';
                        }
                    }
                ]
            });
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
            alert('Error al cargar la tabla de usuarios. Detalles: ' + xhr.responseText);
        }
    });
}

// Llamar a la función cuando la página esté lista
$(document).ready(function () {
    TablaUsuarios();
});

