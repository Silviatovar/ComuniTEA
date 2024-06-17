
shouldRedraw = true;
var table1 = "";      
function TablaUsu() {
    $.ajax({
        type: 'POST',
        url: './php/listaUsuarios.php',
        dataType: 'json',
        success: function (data) {
            if ($('#usuariosTable').length) {
                $('#usuariosTable').DataTable().clear().destroy();
            }

           table1= $('#usuariosTable').DataTable({
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
                ],   lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",
                    buttons: {
                        copyTitle: 'Datos copiados al portapapeles',
                        copySuccess: {
                            _: '%d registros copiados',
                            1: '1 registro copiado'
                        }
                    }
                },
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'excel', 'csv', 'pdf', 'print',
                    {
                        text: 'Filtros',
                        action: function (e, dt, node, config) {
                            shouldRedraw = false;
                            var filters = table1.settings()[0].aoPreSearchCols;
                            dt.columns().every(function (index) {
                                var filterVal = filters[index].sSearch;
                                if (filterVal) {
                                    $('#filtro-' + index).val(filterVal);
                                }
                            });
                            $('.filter-row').toggle();
                            setTimeout(() => {
                                table1.draw(true)
                            }, 10);
                        }
                    }
                ],
                drawCallback: function (settings) {
                    var api = this.api();
                    var headerWidths = [];
                    $('th', api.table().header()).each(function () {
                        headerWidths.push($(this).width());
                    });
                    if (shouldRedraw) {
                        $('.filter-row').empty();
                        var filterRow = $('<tr class="filter-row"></tr>');
                        $(api.table().header()).append(filterRow);
                        api.columns().every(function (index) {
                            if (index != api.columns().count()) {
                                var column = this;
                                var header = $(column.header());
                                var filterCell = $('<th class="text-center"></th>');
                                filterRow.append(filterCell);
                                var filterInput = $('<input type="text" placeholder="' + header.text() + '" class="form-control form-control-sm mb-2">');
                                filterCell.append(filterInput);
                                filterInput.css({
                                    'margin': '0',
                                    'box-sizing': 'border-box',
                                    'padding': '0',
                                    'text-align': 'center',
                                    'width': headerWidths[index] + 'px'
                                });
                                var timeoutId;
                                filterInput.on('input', function () {
                                    clearTimeout(timeoutId);
                                    timeoutId = setTimeout(function () {
                                        column.search(filterInput.val()).draw();
                                    }, 100);
                                });
                                $('button', filterCell).on('click', function () {
                                    filterInput.val('');
                                    filterInput.trigger('input');
                                });
                            }
                        });
                    } else {
                        $('input', api.table().header()).each(function (index) {
                            $(this).css('width', headerWidths[index] + 'px');
                        });
                    }
                    shouldRedraw = false;
                },
                initComplete: function (settings, json) {
                    $('.filter-row').hide();
                }
            });
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert("Error al cargar los pictogramas. Detalles: " + xhr.responseText);
        }
    });
}


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
