shouldRedraw = true;
var table1 = "";
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
         table1=   $('#DonacionesTable').DataTable({
                "data": data,
                "responsive": true,
                "columns": [
                    { 
                        data: "usuarioID",
                        render: function(data, type, row) {
                            // Si el usuarioID es 0, mostrar "Invitado"
                            return data === 0 ? "Invitado" : data;
                        }
                    },
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
