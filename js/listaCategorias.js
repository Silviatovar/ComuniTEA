var table = "";

function dataTableCategorias() {
    $.ajax({
        method: "POST",
        url: "../php/listaCategorias.php",
        data: {}
    }).done(function (msg) {
        let usuarios = JSON.parse(msg);
        populateTable(usuarios);
    });
}
function populateTable(usuarios) {
    table.clear().draw();
    $.each(usuarios, function () {
        var usuarios_row = {
            "nombre": this.nombre,
            "Acciones": '<button type="button" class="btn btn-primary editar" data-toggle="modal" data-target="#editarUsuarioModal">Editar</button>' +
                '<button type="button" class="btn btn-danger eliminar">Eliminar</button>'
        };
        table.row.add(usuarios_row).draw();
    });
}
    $('document').ready(function () {
        table = $('#seccionesTable').DataTable({
            "responsive": true,
            "columns": [
                { "data": "nombre" },
                {
                    "data": "acciones",
                    "render": function (data, type, row) {
                        return '<button type="button" class="btn btn-primary editar" data-toggle="modal" data-target="#editarUsuarioModal">Editar</button>' +
                            '<button type="button" class="btn btn-danger eliminar">Eliminar</button>';
                    }
                }
            ],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            dom: 'lBfrtip',
          
        });
    });
    