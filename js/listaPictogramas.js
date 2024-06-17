shouldRedraw = true;
var table2 = "";
$(document).ready(function() {
    function TablaPictogramas() {
        $.ajax({
            type: 'POST',
            url: './php/listaPictogramas.php',
            dataType: 'json',
            success: function(data) {
                if ($.fn.DataTable.isDataTable('#pictogramasTable')) {
                    $('#pictogramasTable').DataTable().clear().destroy();
                }

              table2=  $('#pictogramasTable').DataTable({
                    data: data,
                    columns: [
                        { data: 'nombre' },
                        { data: 'audioURL' },
                        { data: 'categoriaID' },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return '<button type="button" class="btn btn-danger eliminarPictoBtn" data-picto-id="' + row.pictogramaID + '">Eliminar</button>';
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
                                var filters = table2.settings()[0].aoPreSearchCols;
                                dt.columns().every(function (index) {
                                    var filterVal = filters[index].sSearch;
                                    if (filterVal) {
                                        $('#filtro-' + index).val(filterVal);
                                    }
                                });
                                $('.filter-row').toggle();
                                setTimeout(() => {
                                    table2.draw(true)
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

    TablaPictogramas();

    $('body').on('click', '.eliminarPictoBtn', function() {
        var pictogramaID = $(this).data('picto-id');
        $.ajax({
            type: 'POST',
            url: './php/eliminarPictograma.php',
            data: { pictogramaID: pictogramaID },
            success: function(response) {
                alert(response);
                TablaPictogramas();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Error al eliminar el pictograma. Detalles: " + xhr.responseText);
            }
        });
    });
});