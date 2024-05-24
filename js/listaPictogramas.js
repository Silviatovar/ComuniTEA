
var table = "";

function dataTablePictogramas() {
    $.ajax({
        method: "POST",
        url: "../php/listaPictogramas.php",
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
            "nombre": this.etiqueta,
            "categoriaID": this.categoriaID,
            "imagenURL": this.imagenURL,
            "audioURL": this.audioURL,
            "Acciones": '<button type="button" class="btn btn-primary editar" data-toggle="modal" data-target="#editarUsuarioModal">Editar</button>' +
                '<button type="button" class="btn btn-danger eliminar">Eliminar</button>'
        };
        table.row.add(usuarios_row).draw();
    });
}

$(myTab).change(function () {
    dataTablePictogramas();
});
    $('document').ready(function () {
        table = $('#PictogramasTable').DataTable({
            "responsive": true,
            "columns": [
                { "data": "nombre" },
                { "data": "categoriaID" },
                { "data": "imagenURL" },
                { "data": "audioURL" },
                { "data": "rol" },
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
    