
$('document').ready(function(){
    $('#pepe').on("click",function(){
        // e.preventDefault(); 
        
        // var formData = $(this).serialize();
  
        $.ajax({
            url: 'php/enviarEmail.php',
            type: 'POST',
            data: 'formData',
            success: function(response){
                console.log(response);
            },
            error: function(xhr, status, error){
                console.error(error);
            }
        });
    });


var table = "";

function dataTableDonaciones() {
    $.ajax({
        method: "POST",
        url: "../php/listaDonaciones.php",
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
            "email": this.email,
            "monto": this.monto,
            "fecha": this.fecha,
            "mensaje": this.mensaje,
            "estado": this.estado,
            "Acciones": '<button type="button" class="btn btn-primary editar" data-toggle="modal" data-target="#editarUsuarioModal">Aceptar</button>' +
                '<button type="button" class="btn btn-danger eliminar">Rechazar</button>'
        };
        table.row.add(usuarios_row).draw();
    });
}
    $('document').ready(function () {
        table = $('#DonacionesTable').DataTable({
            "responsive": true,
            "columns": [
                { "data": "nombre" },
                { "data": "email" },
                { "data": "monto" },
                { "data": "fecha" },
                { "data": "mensaje" },
                { "data": "estado" },
                {
                    "data": "acciones",
                    "render": function (data, type, row) {
                        return '<button type="button" class="btn btn-primary editar" data-toggle="modal" data-target="#editarUsuarioModal">Aceptar</button>' +
                            '<button type="button" class="btn btn-danger eliminar">Rechazar</button>';
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
});

