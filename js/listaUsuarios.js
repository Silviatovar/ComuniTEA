
var table = "";

function dataTableUsuarios() {
    $.ajax({
        method: "POST",
        url: "../php/listaUsuarios.php",
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
            "usuarioID": this.usuarioID,
            "nombre": this.nombre,
            "email": this.email,
            "contraseña": this.contraseña,
            "rol": this.rol,
            "Acciones": '<button type="button" class="btn btn-primary editar" data-toggle="modal" data-target="#editarUsuarioModal">Editar</button>' +
                '<button type="button" class="btn btn-danger eliminar">Eliminar</button>'
        };
        table.row.add(usuarios_row).draw();
    });
}
    $('document').ready(function () {
        table = $('#UsuariosTable').DataTable({
            "responsive": true,
            "columns": [
                { "data": "usuarioID" },
                { "data": "nombre" },
                { "data": "email" },
                { "data": "contraseña" },
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
    