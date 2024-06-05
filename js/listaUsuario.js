
                
function TablaUsu() {
    $.ajax({
        type: 'POST',
        url: './php/listaUsuarios.php',
        dataType: 'json',
        success: function (data) {
            if ($('#usuariosTable').length) {
                $('#usuariosTable').DataTable().clear().destroy();
            }

            $('#usuariosTable').DataTable({
                "data": data,
                "responsive": true,
                "columns": [
                    { "data": "usuarioID" },
                    { "data": "nombre" },
                    { "data": "email" },
                    { "data": "rol" },
                    {
                        "data": "acciones",
                        "render": function (data, type, row) {
                            return '<button type="button" class="btn btn-primary editarUsuarioaBtn" data-usuario-id="' + row.usuarioID + '">Editar</button>' +
                            " | " +
                            '<button type="button" class="btn btn-danger eliminarUsuarioBtn" data-usuario-id="' + row.usuarioID + '">Eliminar</button>';
                            
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

$(document).ready(function () {

    
    TablaUsu();
});
$(document).ready(function () {
    TablaUsu();

    $('.editar').click(function () {
        var usuarioID = $(this).closest('tr').find('.eliminarUsuarioBtn').data('usuario-id');
        $('#usuarioID').val(usuarioID);
        $('#editarUsuarioModal').modal('show');
    });

    $('body').on('click', '.eliminarUsuarioBtn', function () {
        var usuarioID = $(this).data('usuario-id');
        eliminarUsuario(usuarioID);
    });
});

// Función para editar un usuario
function editarUsuario(usuarioID, nuevoNombre, nuevoEmail, nuevoRol) {
    $.ajax({
        type: "POST",
        url: "./php/administracion/editarUsuario.php",
        data: {
            usuarioID: usuarioID,
            nuevoNombre: nuevoNombre,
            nuevoEmail: nuevoEmail,
            nuevoRol: nuevoRol
        },
        success: function (response) {
            alert(response);
            TablaUsu(); // Actualizar la tabla después de editar el usuario
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert("Error al editar usuario. Detalles: " + xhr.responseText);
        }
    });
}

// Función para eliminar un usuario
function eliminarUsuario(usuarioID) {
    $.ajax({
        type: "POST",
        url: "./php/administracion/eliminarUsuario.php",
        data: { usuarioID: usuarioID },
        success: function (response) {
            alert(response);
            TablaUsu(); // Actualizar la tabla después de eliminar el usuario
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert("Error al eliminar usuario. Detalles: " + xhr.responseText);
        }
    });
}
// Función para editar un usuario
$('#guardarEdicionUsuarioBtn').on('click', function (e) {
    e.preventDefault();

    var formData = new FormData();
    formData.append('usuarioID', $('#usuarioID').val());
    formData.append('nuevoNombre', $('#nuevoNombre').val());
    formData.append('nuevoEmail', $('#nuevoEmail').val());
    formData.append('nuevoRol', $('#nuevoRol').val());

    $.ajax({
        type: "POST",
        url: "./php/administracion/editarUsuario.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            alert(response);
            $('#editarUsuarioModal').modal('hide');
            TablaUsu(); // Actualizar la tabla de usuarios después de editar
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert("Error al editar el usuario. Detalles: " + xhr.responseText);
        }
    });
});

// Función para abrir el modal de edición de usuario
$('body').on('click', '.editarUsuarioaBtn', function () {
    var usuarioID = $(this).data('usuario-id');
    $('#usuarioID').val(usuarioID);
    $('#editarUsuarioModal').modal('show');
});
