

shouldRedraw = true;
var table1 = "";
function TablaCategorias() {
    $.ajax({
        type: 'POST',
        url: './php/listaCategorias.php',
        dataType: 'json',
        success: function (data) {
          
            if ($('#seccionesTable').length) {
                $('#seccionesTable').DataTable().clear().destroy();
            }

        table1=    $('#seccionesTable').DataTable({
                "data": data,
                "responsive": true,
                "columns": [
                    { "data": "categoriaID" },
                    { "data": "nombre" },
                    { "data": "descripcion" },
                    {
                        data: "acciones",
                        title: '',
                        "render": function (data, type, row) {
                            return '<button type="button" class="btn btn-primary editarCategoriaBtn" data-categoria-id="' + row.categoriaID + '">Editar</button>' +
                                " | " +
                                '<button type="button" class="btn btn-danger eliminarCategoriaBtn" data-categoria-id="' + row.categoriaID + '">Eliminar</button>';
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
    TablaCategorias();
});

function eliminarCategoria(categoriaID) {
    $.ajax({
        type: "POST",
        url: "./php/administracion/eliminarCategoria.php",
        data: { categoriaID: categoriaID },
        success: function (response) {
            alert(response);
      
            TablaCategorias();
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert("Error al eliminar la categoría. Detalles: " + xhr.responseText);
        }
    });
}

$('body').on('click', '.eliminarCategoriaBtn', function () {
    var categoriaID = $(this).data('categoria-id');
    eliminarCategoria(categoriaID);
});

// Función para editar una categoría
$('#guardarEdicionCategoriaBtn').on('click', function (e) {
    e.preventDefault();
    
    var formData = new FormData();
    formData.append('categoriaID', $('#categoriaID').val());
    formData.append('nuevoNombre', $('#nuevoNombreC').val());
    formData.append('nuevaDescripcion', $('#nuevaDescripcion').val());
    $.ajax({
        type: "POST",
        url: "./php/administracion/editarCategoria.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            alert(response);
            $('#editarCategoriaModal').modal('hide');
            TablaCategorias(); // Actualizar la tabla de usuarios después de editar
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert("Error al editar el usuario. Detalles: " + xhr.responseText);
        }
    });
});

$('body').on('click', '.editarCategoriaBtn', function () {
    var categoriaID = $(this).data('categoria-id');
    $('#categoriaID').val(categoriaID);
    $('#editarCategoriaModal').modal('show');
});
