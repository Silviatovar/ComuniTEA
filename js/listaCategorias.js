// var table = "";

// function dataTableCategorias() {
//     $.ajax({
//         method: "POST",
//         url: "../php/listaCategorias.php",
//         data: {}
//     }).done(function (msg) {
//         let usuarios = JSON.parse(msg);
//         populateTable(usuarios);
//     });
// }
// function populateTable(usuarios) {
//     table.clear().draw();
//     $.each(usuarios, function () {
//         var usuarios_row = {
//             "nombre": this.nombre,
//             "Acciones": '<button type="button" class="btn btn-primary editar" data-toggle="modal" data-target="#editarUsuarioModal">Editar</button>' +
//                 '<button type="button" class="btn btn-danger eliminar">Eliminar</button>'
//         };
//         table.row.add(usuarios_row).draw();
//     });
// }
//     $('document').ready(function () {
//         table = $('#seccionesTable').DataTable({
//             "responsive": true,
//             "columns": [
//                 { "data": "nombre" },
//                 {
//                     "data": "acciones",
//                     "render": function (data, type, row) {
//                         return '<button type="button" class="btn btn-primary editar" data-toggle="modal" data-target="#editarUsuarioModal">Editar</button>' +
//                             '<button type="button" class="btn btn-danger eliminar">Eliminar</button>';
//                     }
//                 }
//             ],
//             "lengthMenu": [
//                 [10, 25, 50, -1],
//                 [10, 25, 50, "All"]
//             ],
//             "language": {
//                 "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
//             },
//             dom: 'lBfrtip',
          
//         });
//     });
function TablaCategorias() {
    $.ajax({
        type: 'POST',
        url: './php/listaCategorias.php',
        dataType: 'json',
        success: function (data) {
            // Limpiar la tabla antes de cargar nuevos datos
            if ($('#seccionesTable').length) {
                $('#seccionesTable').DataTable().clear().destroy();
            }

            // Construir la tabla utilizando DataTables
            $('#seccionesTable').DataTable({
                "data": data,
                "responsive": true,
                "columns": [
                    { "data": "nombre" },
                    { "data": "descripcion" },
                    {
                        data:" acciones",
                        title: '',
                        render: function (data, type, row) {
                            return '<button onclick="modificarCategoria(\'' + row.categoriaID + '\')">Modificar</button>' +
                                '<button onclick="eliminarCategoria(\'' + row.categoriaID + '\')">Eliminar</button>';
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

// Llamar a la función cuando la página esté lista
$(document).ready(function () {
    TablaCategorias();
});
