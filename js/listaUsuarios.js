$(document).ready(function() {
    // Inicializar el DataTable para la tabla de Usuarios
    var table = $('#UsuariosTable').DataTable({
        ajax: {
            url: 'obtenerUsuarios.php',
            dataSrc: ''
        },
        columns: [
            { data: 'usuarioid' },
            { data: 'username' },
            { data: 'email' },
            { data: 'password' },
            { data: 'rol' },
            {
                data: null,
                render: function(data, type, row) {
                    return '<button type="button" class="btn btn-primary editar">Editar</button>' +
                           '<button type="button" class="btn btn-danger eliminar">Eliminar</button>';
                }
            }
        ]
    });

    // Agregar evento de clic al botón de editar usuario
    $('#UsuariosTable tbody').on('click', 'button.editar', function() {
        var data = table.row($(this).parents('tr')).data();
        var usuarioID = data.usuarioid;
        cargarDatosUsuario(usuarioID);
    });
});
// Función para cargar los datos del usuario seleccionado en el modal de edición
function cargarDatosUsuario(usuarioID) {
    // Realizar una solicitud AJAX para obtener los detalles del usuario
    $.ajax({
        url: 'obtenerUsuario.php',
        method: 'POST',
        data: { id: usuarioID },
        dataType: 'json',
        success: function(data) {
            // Rellenar los campos del formulario con los datos del usuario
            $('#editUsername').val(data.username);
            $('#editEmail').val(data.email);
            $('#editPassword').val(data.password);
            $('#editRol').val(data.rol);
            $('#editUserID').val(usuarioID);

            // Mostrar el modal de edición
            $('#editarUsuarioModal').modal('show');
        },
        error: function(xhr, status, error) {
            // Manejar el error de la solicitud AJAX
            console.error('Error al obtener los detalles del usuario:', error);
        }
    });
}

// Evento de clic para el botón de "Guardar Cambios" en el modal de edición
$('#guardarCambiosUsuario').on('click', function() {
    // Obtener los datos del formulario
    var usuarioID = $('#editUserID').val();
    var username = $('#editUsername').val();
    var email = $('#editEmail').val();
    var password = $('#editPassword').val();
    var rol = $('#editRol').val();

    // Realizar una solicitud AJAX para actualizar los datos del usuario
    $.ajax({
        url: 'actualizarUsuario.php',
        method: 'POST',
        data: { id: usuarioID, username: username, email: email, password: password, rol: rol },
        success: function(response) {
            // Actualizar la fila correspondiente en el DataTable
            var rowData = table.row($('#UsuariosTable').find('tr').filter(function() {
                return $(this).find('td:first-child').text() === usuarioID;
            })).data(response).draw();
            
            // Cerrar el modal de edición
            $('#editarUsuarioModal').modal('hide');
        },
        error: function(xhr, status, error) {
            // Manejar el error de la solicitud AJAX
            console.error('Error al actualizar los datos del usuario:', error);
        }
    });
});
