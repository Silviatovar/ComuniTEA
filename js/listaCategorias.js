function TablaCategorias() {
    $.ajax({
        type: 'POST',
        url: './php/listaCategorias.php',
        dataType: 'json',
        success: function (data) {
          
            if ($('#seccionesTable').length) {
                $('#seccionesTable').DataTable().clear().destroy();
            }

            $('#seccionesTable').DataTable({
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
